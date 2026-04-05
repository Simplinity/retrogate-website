<?php
/**
 * RetroGate — Contact Page
 * A guestbook AND a contact form. Because it's 1997 and we can have both.
 */
$page_title = 'Contact';
$page_description = 'Get in touch with the RetroGate team. Bug reports, feature requests, love letters from vintage Macs — we read them all.';

$form_submitted = false;
$form_errors = [];
$form_data = [
  'name' => '',
  'email' => '',
  'vintage_machine' => '',
  'subject' => '',
  'message' => '',
  'favorite_os' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $form_data = [
    'name' => trim($_POST['name'] ?? ''),
    'email' => trim($_POST['email'] ?? ''),
    'vintage_machine' => trim($_POST['vintage_machine'] ?? ''),
    'subject' => trim($_POST['subject'] ?? ''),
    'message' => trim($_POST['message'] ?? ''),
    'favorite_os' => trim($_POST['favorite_os'] ?? ''),
  ];

  // Validation
  if (empty($form_data['name'])) {
    $form_errors[] = 'Please enter your name (or your Mac\'s name — we don\'t judge).';
  }
  if (empty($form_data['email']) || !filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
    $form_errors[] = 'Please enter a valid email address. AOL addresses are welcome.';
  }
  if (empty($form_data['message'])) {
    $form_errors[] = 'Please enter a message. Even "bong" counts.';
  }

  // Honeypot check
  if (!empty($_POST['website_url'])) {
    // Bot detected — silently "succeed"
    $form_submitted = true;
  }

  if (empty($form_errors) && !$form_submitted) {
    // In production, you'd send an email or save to DB here.
    // For now, we just celebrate.
    $form_submitted = true;
  }
}

require_once __DIR__ . '/includes/header.php';
?>

<section class="page-header">
  <h1>Contact Us</h1>
  <p class="subtitle">Bug reports, feature requests, and love letters from vintage Macs.</p>
</section>


<div class="contact-content">

  <?php if ($form_submitted): ?>
    <!-- Success State -->
    <div style="text-align: center; padding: 3rem 0;">
      <div style="font-size: 4rem; margin-bottom: 1rem;">&#x1F4E8;</div>
      <h2>Message Sent!</h2>
      <p style="margin: 1rem auto; max-width: 500px;">
        Your message has been transmitted via HTTP/1.0 to our inbox.
        We&rsquo;ll read it on a genuine PowerBook 520 for maximum authenticity.
      </p>
      <p style="color: #888; font-family: var(--font-pixel);">
        Estimated response time: faster than a 14.4k modem, slower than a T1 line.
      </p>
      <a href="/" class="btn btn-on-light" style="margin-top: 2rem;">&#x2190; Back to Home</a>
    </div>

  <?php else: ?>

    <p style="margin-bottom: 2rem;">
      Found a bug? Have a feature request? Want to tell us about the time your Performa 6400
      survived a lightning strike? We&rsquo;d love to hear from you.
    </p>

    <?php if (!empty($form_errors)): ?>
      <div style="background: #fff0f0; border: 2px solid #cc0000; padding: 1rem 1.5rem; margin-bottom: 1.5rem; font-family: var(--font-pixel);">
        <strong style="color: #cc0000;">&#x26A0; ERROR 418: I'm a teapot</strong>
        <p style="color: #cc0000; margin: 0.5rem 0 0;">Just kidding. But there were some issues:</p>
        <ul style="margin: 0.5rem 0 0 1.5rem; color: #cc0000;">
          <?php foreach ($form_errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <div class="retro-form">
      <div style="font-family: var(--font-pixel); color: var(--amber-dark); margin-bottom: 1.5rem; font-size: 1.1rem;">
        &#x1F4DD; COMPOSE NEW MESSAGE
      </div>

      <form method="POST" action="/contact.php">
        <!-- Honeypot field — hidden from humans, visible to bots -->
        <div style="position: absolute; left: -9999px;" aria-hidden="true">
          <label for="website_url">Leave this empty</label>
          <input type="text" name="website_url" id="website_url" tabindex="-1" autocomplete="off">
        </div>

        <div class="form-group">
          <label for="name">Your Name *</label>
          <input type="text" id="name" name="name" placeholder="e.g., Steve, or 'Macintosh LC 475'"
                 value="<?= htmlspecialchars($form_data['name']) ?>" required>
          <div class="field-hint">Human names and Mac model numbers both accepted.</div>
        </div>

        <div class="form-group">
          <label for="email">Email Address *</label>
          <input type="email" id="email" name="email" placeholder="you@aol.com"
                 value="<?= htmlspecialchars($form_data['email']) ?>" required>
          <div class="field-hint">We promise not to sell this to any dot-com startups. It's not 1999 anymore. Wait...</div>
        </div>

        <div class="form-group">
          <label for="vintage_machine">Your Vintage Machine</label>
          <input type="text" id="vintage_machine" name="vintage_machine"
                 placeholder="e.g., Power Macintosh 7200, Quadra 605, SheepShaver on M2"
                 value="<?= htmlspecialchars($form_data['vintage_machine']) ?>">
          <div class="field-hint">Optional, but it helps us cry happy tears.</div>
        </div>

        <div class="form-group">
          <label for="favorite_os">Favorite Vintage OS</label>
          <select id="favorite_os" name="favorite_os">
            <option value="" <?= $form_data['favorite_os'] === '' ? 'selected' : '' ?>>-- Choose wisely --</option>
            <option value="system6" <?= $form_data['favorite_os'] === 'system6' ? 'selected' : '' ?>>System 6 (the purist's choice)</option>
            <option value="system7" <?= $form_data['favorite_os'] === 'system7' ? 'selected' : '' ?>>System 7 (the golden age)</option>
            <option value="macos8" <?= $form_data['favorite_os'] === 'macos8' ? 'selected' : '' ?>>Mac OS 8 (the Platinum era)</option>
            <option value="macos9" <?= $form_data['favorite_os'] === 'macos9' ? 'selected' : '' ?>>Mac OS 9 (the GOAT, fight me)</option>
            <option value="macosx" <?= $form_data['favorite_os'] === 'macosx' ? 'selected' : '' ?>>Mac OS X (Aqua baby!)</option>
            <option value="win31" <?= $form_data['favorite_os'] === 'win31' ? 'selected' : '' ?>>Windows 3.1 (bravery)</option>
            <option value="win95" <?= $form_data['favorite_os'] === 'win95' ? 'selected' : '' ?>>Windows 95 (Start me up!)</option>
            <option value="win98" <?= $form_data['favorite_os'] === 'win98' ? 'selected' : '' ?>>Windows 98 (peak Windows)</option>
            <option value="other" <?= $form_data['favorite_os'] === 'other' ? 'selected' : '' ?>>Other (please specify in message)</option>
            <option value="all" <?= $form_data['favorite_os'] === 'all' ? 'selected' : '' ?>>I love them all equally (liar)</option>
          </select>
        </div>

        <div class="form-group">
          <label for="subject">Subject</label>
          <select id="subject" name="subject">
            <option value="" <?= $form_data['subject'] === '' ? 'selected' : '' ?>>-- Select --</option>
            <option value="bug" <?= $form_data['subject'] === 'bug' ? 'selected' : '' ?>>&#x1F41B; Bug Report</option>
            <option value="feature" <?= $form_data['subject'] === 'feature' ? 'selected' : '' ?>>&#x1F4A1; Feature Request</option>
            <option value="help" <?= $form_data['subject'] === 'help' ? 'selected' : '' ?>>&#x1F198; Help / Support</option>
            <option value="love" <?= $form_data['subject'] === 'love' ? 'selected' : '' ?>>&#x2764;&#xFE0F; Fan Mail / Love Letter</option>
            <option value="vintage" <?= $form_data['subject'] === 'vintage' ? 'selected' : '' ?>>&#x1F4BB; Vintage Mac Story</option>
            <option value="other" <?= $form_data['subject'] === 'other' ? 'selected' : '' ?>>&#x2753; Other</option>
          </select>
        </div>

        <div class="form-group">
          <label for="message">Message *</label>
          <textarea id="message" name="message" placeholder="Tell us everything. We have time. Our proxy server handles the requests while we read."
                    required><?= htmlspecialchars($form_data['message']) ?></textarea>
          <div class="field-hint">Pro tip: including your Mac's startup chime sound ("bong!") counts as a valid message.</div>
        </div>

        <div style="margin-top: 2rem;">
          <button type="submit" class="btn btn-primary" style="border: 3px solid var(--amber); cursor: pointer; font-family: var(--font-pixel);">
            &#x1F4E8; SEND MESSAGE
          </button>
        </div>

        <p style="margin-top: 1.5rem; font-size: 0.8rem; color: #999; font-family: var(--font-pixel);">
          &#x1F512; This form is served over HTTP because we practice what we preach.
          Your data is handled with the same care we give to a Macintosh SE &mdash; gently and with great reverence.
        </p>
      </form>
    </div>

  <?php endif; ?>

  <!-- Guestbook Section -->
  <div style="margin-top: 4rem;">
    <h2 style="text-align: center; margin-bottom: 0.5rem;">&#x1F4D3; The Guestbook</h2>
    <p style="text-align: center; font-style: italic; color: var(--brown-light); margin-bottom: 2rem;">
      Because no self-respecting 90s website is complete without one.
    </p>

    <div class="guestbook-entries">
      <div class="guestbook-entry">
        <span class="entry-name">PowerBook_G3_Lombard</span>
        <span class="entry-date"> &mdash; March 15, 2025</span>
        <p class="entry-text">Finally, someone who understands that I&rsquo;m not obsolete &mdash; I&rsquo;m <em>vintage</em>. RetroGate let me browse Wikipedia for the first time in 20 years. I cried. My trackpad got wet. Worth it.</p>
      </div>

      <div class="guestbook-entry">
        <span class="entry-name">iMac_G3_Bondi</span>
        <span class="entry-date"> &mdash; March 8, 2025</span>
        <p class="entry-text">HELLO YES I AM BACK ON THE INTERNET. IT HAS BEEN 23 YEARS. WHY IS EVERYTHING SO... FLAT? WHERE ARE THE BEVELS? WHERE ARE THE DROP SHADOWS? Anyway, RetroGate is great, 5 stars.</p>
      </div>

      <div class="guestbook-entry">
        <span class="entry-name">Quadra_950_Server</span>
        <span class="entry-date"> &mdash; February 28, 2025</span>
        <p class="entry-text">I have been running continuously since 1993. I have never been restarted. I have seen the rise and fall of Netscape, the birth of Google, and the death of GeoCities. RetroGate is the first new software I&rsquo;ve been excited about in 30 years.</p>
      </div>

      <div class="guestbook-entry">
        <span class="entry-name">anonymous_486dx2</span>
        <span class="entry-date"> &mdash; February 20, 2025</span>
        <p class="entry-text">I&rsquo;m a PC and I&rsquo;m using RetroGate. Yes, there are PC presets. No, I&rsquo;m not ashamed. Windows 95 was a great operating system and I will die on this hill. The Start button was revolutionary.</p>
      </div>

      <div class="guestbook-entry">
        <span class="entry-name">SheepShaver_User_42</span>
        <span class="entry-date"> &mdash; February 14, 2025</span>
        <p class="entry-text">Step 1: Configure proxy. Step 2: Browse. Step 3: Network drops. Step 4: Restart SheepShaver. Step 5: Goto Step 1. It&rsquo;s a feature, not a bug. Happy Valentine&rsquo;s Day to my favorite temperamental VM.</p>
      </div>
    </div>
  </div>

</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
