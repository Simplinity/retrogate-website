<?php
/**
 * RetroGate — Contact form anti-spam
 *
 * No CAPTCHA, no third-party service, no JavaScript required. Instead, a few
 * cheap checks layered on top of each other:
 *
 *   1. Honeypot fields  — hidden from humans, irresistible to bots.
 *   2. Signed timestamp — the form carries an HMAC-signed render time, so a
 *                         bot has to fetch the page first and then wait at
 *                         least ANTISPAM_MIN_SECONDS before posting. Scripts
 *                         post in milliseconds; humans take a while to type.
 *   3. Enum validation  — a real browser can only submit the <option> values
 *                         we rendered. Anything else came from a script.
 *   4. Content checks   — patterns from the spam that actually hits this form:
 *                         the same text pasted into every field, link
 *                         shorteners, BBCode, messages that are only a URL.
 *
 * Bots get a fake "Message Sent!" page so they don't learn what tripped them.
 * The one time-based rule a human can realistically trip (a token that
 * expired because the tab sat open for hours) gives a friendly error instead
 * and keeps their text.
 *
 * Blocked submissions are written to the PHP error log, prefixed with
 * "[retrogate-contact]", so you can see what is being caught and why.
 */

const ANTISPAM_MIN_SECONDS = 3;          // faster than this = script
const ANTISPAM_MAX_SECONDS = 6 * 3600;   // older than this = stale tab (or a replayed token)
const ANTISPAM_MAX_LINKS   = 5;          // bug reports may list a few broken sites; spam dumps dozens

/** Hosts that only ever show up in spam on this form. Subdomains match too. */
const ANTISPAM_BLOCKED_HOSTS = [
  'telegra.ph', 't.me', 'bit.ly', 'bitly.com', 'tinyurl.com', 'goo.gl', 'is.gd',
  'cutt.ly', 'rb.gy', 'shorturl.at', 'tiny.cc', 'rebrand.ly', 'ow.ly', 'buff.ly',
  'clck.ru', 'vk.cc', 'u.to', 't.ly', 'shorte.st', 'adf.ly',
];

/**
 * Run every check against a POST payload.
 *
 * $config keys:
 *   honeypots     — field names that must be empty
 *   enums         — field name => list of allowed values (the <option>s we rendered)
 *   text_fields   — free-text fields; two of them holding identical text means a bot
 *   message_field — the main textarea, checked for spammy links
 *
 * @return array{0: 'clean'|'bot'|'stale', 1: string}  verdict + human-readable reason
 */
function antispam_check(array $post, array $config): array
{
  // 1. Honeypots — humans can't see them, so they stay empty.
  foreach ($config['honeypots'] ?? [] as $field) {
    if (!empty($post[$field])) {
      return ['bot', "honeypot '$field' filled"];
    }
  }

  // 2. Signed timestamp — must exist, must verify, must not be too fresh.
  $age = antispam_token_age((string) ($post['form_token'] ?? ''));
  if ($age === null) {
    return ['bot', 'missing or invalid form token'];
  }
  if ($age < ANTISPAM_MIN_SECONDS) {
    return ['bot', "posted {$age}s after the form was rendered"];
  }
  if ($age > ANTISPAM_MAX_SECONDS) {
    return ['stale', 'form token expired'];
  }

  // 3. Select values — a browser can only send what we put in the <option>s.
  foreach ($config['enums'] ?? [] as $field => $allowed) {
    $value = (string) ($post[$field] ?? '');
    if (!in_array($value, $allowed, true)) {
      return ['bot', "unknown value for '$field'"];
    }
  }

  // 4. Content — collect the non-empty free-text fields.
  $texts = [];
  foreach ($config['text_fields'] ?? [] as $field) {
    $value = trim((string) ($post[$field] ?? ''));
    if ($value !== '') {
      $texts[$field] = $value;
    }
  }

  // Bots paste one string into every text input ("Name: X, Vintage Machine: X").
  $seen = [];
  foreach ($texts as $field => $value) {
    $key = strtolower($value);
    if (isset($seen[$key])) {
      return ['bot', "'$field' is identical to '{$seen[$key]}'"];
    }
    $seen[$key] = $field;
  }

  $message_field = $config['message_field'] ?? null;
  $message = $message_field !== null ? ($texts[$message_field] ?? '') : '';

  // URLs belong in the message, not in a name or machine model.
  foreach ($texts as $field => $value) {
    if ($field !== $message_field && preg_match('~https?://|www\.~i', $value)) {
      return ['bot', "URL in '$field'"];
    }
  }

  if ($message !== '') {
    if (preg_match('~\[/?(?:url|link)\b|<a\s[^>]*href~i', $message)) {
      return ['bot', 'BBCode or HTML link in message'];
    }
    if (preg_match('~^(?:https?://|www\.)\S+$~i', $message)) {
      return ['bot', 'message is nothing but a URL'];
    }

    $hosts = antispam_extract_hosts($message);
    if (count($hosts) >= ANTISPAM_MAX_LINKS) {
      return ['bot', count($hosts) . ' links in message'];
    }
    foreach ($hosts as $host) {
      foreach (ANTISPAM_BLOCKED_HOSTS as $blocked) {
        if ($host === $blocked || str_ends_with($host, '.' . $blocked)) {
          return ['bot', "link to $host"];
        }
      }
    }
  }

  return ['clean', ''];
}

/** Lower-cased hostnames of every http(s):// or www. link in a piece of text. */
function antispam_extract_hosts(string $text): array
{
  preg_match_all('~(?:https?://|www\.)([^\s/<>"\'?#]+)~i', $text, $matches);
  $hosts = [];
  foreach ($matches[1] as $raw) {
    $host = strtolower(rtrim($raw, '.,;:!)'));
    $host = preg_replace('~^www\.~', '', $host);
    $host = preg_replace('~:\d+$~', '', $host);   // strip :port
    if ($host !== '') {
      $hosts[] = $host;
    }
  }
  return $hosts;
}

/** A fresh signed token for a form rendered right now. */
function antispam_token(): string
{
  $issued = (string) time();
  return $issued . '.' . antispam_sign($issued);
}

/**
 * Token to put in the form on (re-)render. If the request carried a valid,
 * unexpired token (e.g. a resubmit after a validation error) we hand it back
 * unchanged so the human's original render time is preserved and they don't
 * trip the "too fast" rule when they fix a typo and press SEND again.
 */
function antispam_token_for_form(?string $posted): string
{
  if ($posted !== null) {
    $age = antispam_token_age($posted);
    if ($age !== null && $age <= ANTISPAM_MAX_SECONDS) {
      return $posted;
    }
  }
  return antispam_token();
}

/** Seconds since the token was issued, or null when it is missing or forged. */
function antispam_token_age(string $token): ?int
{
  $parts = explode('.', $token, 2);
  if (count($parts) !== 2 || !ctype_digit($parts[0]) || $parts[1] === '') {
    return null;
  }
  [$issued, $signature] = $parts;
  if (!hash_equals(antispam_sign($issued), $signature)) {
    return null;
  }
  return time() - (int) $issued;
}

function antispam_sign(string $data): string
{
  return hash_hmac('sha256', $data, antispam_secret());
}

/**
 * Per-install secret for signing tokens. Generated on first use and stored in
 * data/ (already git-ignored and used by the visitor counter). It is stored as
 * a PHP file so a direct request to /data/antispam-secret.php executes and
 * returns an empty page instead of leaking the secret.
 */
function antispam_secret(): string
{
  static $secret = null;
  if ($secret !== null) {
    return $secret;
  }

  $file = __DIR__ . '/../data/antispam-secret.php';
  $stored = antispam_read_secret_file($file);
  if ($stored !== null) {
    return $secret = $stored;
  }

  $dir = dirname($file);
  if (!is_dir($dir)) {
    @mkdir($dir, 0755, true);
  }
  $fresh = bin2hex(random_bytes(32));
  // 'x' mode fails if the file exists, so two first requests racing each other
  // can't overwrite one another's secret; the loser just re-reads the winner's.
  $handle = @fopen($file, 'x');
  if ($handle !== false) {
    fwrite($handle, "<?php return '" . $fresh . "';\n");
    fclose($handle);
    return $secret = $fresh;
  }
  $stored = antispam_read_secret_file($file);
  if ($stored !== null) {
    return $secret = $stored;
  }

  // data/ is not writable: fall back to a per-server fingerprint. Weaker than
  // a random secret, but still not something a form-spam bot can guess.
  return $secret = hash('sha256', php_uname() . __DIR__ . PHP_VERSION . PHP_OS);
}

function antispam_read_secret_file(string $file): ?string
{
  if (!is_file($file)) {
    return null;
  }
  $stored = @include $file;
  return (is_string($stored) && strlen($stored) >= 32) ? $stored : null;
}

/** One line in the PHP error log per blocked submission. */
function antispam_log(string $verdict, string $reason): void
{
  error_log(sprintf(
    '[retrogate-contact] %s: %s | ip=%s | ua=%s',
    $verdict,
    $reason,
    $_SERVER['REMOTE_ADDR'] ?? '-',
    substr($_SERVER['HTTP_USER_AGENT'] ?? '-', 0, 120)
  ));
}
