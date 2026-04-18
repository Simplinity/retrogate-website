<?php
/**
 * RetroGate — Download Page
 * Get the app, get the manual, get emotional about beige computers.
 */
$page_title = 'Download';
$page_description = 'Download RetroGate for macOS. Free, open source, and ready to bridge the gap between your vintage Mac and the modern internet.';
require_once __DIR__ . '/includes/header.php';
?>

<section class="page-header">
  <h1>Download RetroGate</h1>
  <p class="subtitle">Free. Open Source. GPLv3 Licensed. Because vintage Macs deserve nice things.</p>
</section>


<div class="faq-content" style="max-width: 750px;">

  <!-- Main Download -->
  <div style="background: var(--white); border: 3px solid var(--amber); padding: 2.5rem; text-align: center; margin-bottom: 2rem;">
    <div style="margin-bottom: 1rem;"><img src="/assets/img/appicon-128.png" alt="RetroGate" width="128" height="128"></div>
    <h2 style="margin-bottom: 0.5rem;">RetroGate v1.2.0</h2>
    <p style="font-family: var(--font-display); font-style: italic; color: var(--brown-light); margin-bottom: 0.5rem;">
      Browse the modern web on vintage Macs
    </p>
    <p style="color: #666; margin-bottom: 2rem;">
      macOS 13+ (Ventura) &mdash; Universal Binary (Apple Silicon &amp; Intel)<br>
      <code>RetroGate-1.2.0-universal.dmg</code> &mdash; 7.5 MB &mdash; drag-to-Applications
    </p>

    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
      <a href="https://github.com/Simplinity/retrogate/releases/download/v1.2.0/RetroGate-1.2.0-universal.dmg" class="btn btn-primary">
        &#x2B07; Download DMG
      </a>
      <a href="https://github.com/Simplinity/retrogate/releases/tag/v1.2.0" class="btn btn-on-light" target="_blank">
        Release Notes
      </a>
    </div>

    <p style="margin-top: 1.5rem; font-size: 0.8rem; color: #999; font-family: var(--font-pixel); text-align: center; max-width: 100%;">
      Or build from source: <code style="background: var(--beige); padding: 0.2rem 0.5rem;">swift build &amp;&amp; swift run RetroGate</code>
    </p>
  </div>

  <!-- What's New in v1.2 -->
  <div style="background: var(--charcoal); border: 3px solid var(--amber); padding: 2rem; margin-bottom: 2rem; color: var(--beige);">
    <h3 style="font-family: var(--font-pixel); color: var(--amber-glow); margin-bottom: 1rem;">
      What&rsquo;s New in v1.2 <span style="font-size: 0.7em; color: var(--amber-glow); animation: blink 1s step-end infinite;">&nbsp;NEW!</span>
    </h3>

    <ul style="list-style: none; padding: 0; margin: 0; line-height: 2;">
      <li>&#x1F4BE; <strong style="color: var(--amber);">Smart Cache</strong> &mdash;
        Pages you&rsquo;ve already seen load instantly. The Wayback Machine is a non-profit. Cache responsibly.</li>
      <li>&#x1F4E6; <strong style="color: var(--amber);">Capsules</strong> &mdash;
        Bundle archived pages into <code>.retrogate-capsule</code> files. Like mixtapes, but for websites that no longer exist.</li>
      <li>&#x1F50D; <strong style="color: var(--amber);">Full-Text Search</strong> &mdash;
        SQLite FTS5 with Porter stemming over every page you&rsquo;ve cached. You can finally find that HyperCard page. In milliseconds. From 1996.</li>
      <li>&#x1F4E1; <strong style="color: var(--amber);">Prefetch</strong> &mdash;
        Paste a list of URLs, RetroGate warms the cache at one request per second. Polite to archive.org. Respectful, like a 1999 web crawler.</li>
      <li>&#x2708; <strong style="color: var(--amber);">Offline Mode</strong> &mdash;
        Demoing on a plane with no Wi-Fi? Already-cached pages still work. Everything else politely 404s. Your PowerBook has been training for this its whole life.</li>
      <li>&#x1F4CA; <strong style="color: var(--amber);">Better Logs</strong> &mdash;
        Request log and Wayback timeline now sortable, filterable, and occasionally informative. Hero stats up top, because we felt fancy.</li>
      <li>&#x2699; <strong style="color: var(--amber);">Sidebar Settings</strong> &mdash;
        General and Advanced settings now live in the sidebar. One less window. Your 4:3 display thanks you.</li>
    </ul>

    <p style="margin-top: 1.5rem; font-size: 0.85rem; color: var(--beige-dark);">
      Full changelog on <a href="https://github.com/Simplinity/retrogate/releases/tag/v1.2.0" style="color: var(--amber);" target="_blank">GitHub</a>.
      Upgrading from v1.1? Just replace the app in your Applications folder. Your existing settings survive. Your Quadra won&rsquo;t notice a thing &mdash; until it does.
    </p>
  </div>

  <!-- System Requirements -->
  <div style="background: var(--cream); border: 3px solid var(--beige-dark); padding: 2rem; margin-bottom: 2rem;">
    <h3 style="font-family: var(--font-pixel); color: var(--amber-dark); margin-bottom: 1rem;">System Requirements</h3>

    <table class="retro-table" style="font-size: 0.9rem;">
      <tbody>
        <tr>
          <td style="font-weight: bold; width: 40%;">Operating System</td>
          <td>macOS 13+ (Ventura or later)</td>
        </tr>
        <tr>
          <td style="font-weight: bold;">Processor</td>
          <td>Apple Silicon or Intel (Universal Binary)</td>
        </tr>
        <tr>
          <td style="font-weight: bold;">RAM</td>
          <td>256 MB (yes, really &mdash; it&rsquo;s a proxy, not Chrome)</td>
        </tr>
        <tr>
          <td style="font-weight: bold;">Disk Space</td>
          <td>7.5 MB app + cache &amp; capsules (you set the limit)</td>
        </tr>
        <tr>
          <td style="font-weight: bold;">Network</td>
          <td>Vintage Mac on same LAN (or SheepShaver at 10.0.2.2)</td>
        </tr>
        <tr>
          <td style="font-weight: bold;">Patience</td>
          <td>Moderate (the Wayback Machine is a non-profit)</td>
        </tr>
        <tr>
          <td style="font-weight: bold;">Emotional attachment<br>to beige plastic</td>
          <td>Required</td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Build from Source -->
  <div style="background: var(--white); border: 3px solid var(--beige-dark); padding: 2rem; margin-bottom: 2rem;">
    <h3 style="font-family: var(--font-pixel); color: var(--amber-dark); margin-bottom: 1rem;">Build From Source</h3>

    <p>For developers who like to see what&rsquo;s under the hood (spoiler: it&rsquo;s SwiftNIO all the way down):</p>

    <pre>git clone https://github.com/Simplinity/retrogate.git
cd retrogate
swift build
swift run RetroGate</pre>

    <p style="margin-top: 1rem;">Or open in Xcode:</p>

    <pre>open Package.swift</pre>

    <p style="margin-top: 1rem; font-size: 0.85rem; color: #888;">
      Requires Swift 5.9+ (included with Xcode 15+).
      The project has 50 tests across 9 suites. Run them with <code>swift test</code>.
      They all pass. We&rsquo;re very proud of this.
    </p>
  </div>

  <!-- Architecture Overview -->
  <div style="background: var(--charcoal); border: 3px solid var(--brown); padding: 2rem; margin-bottom: 2rem; color: var(--beige);">
    <h3 style="font-family: var(--font-pixel); color: var(--amber-glow); margin-bottom: 1rem;">Architecture</h3>

    <pre style="border: none; margin: 0; padding: 0; background: transparent; box-shadow: none;">
Sources/
├── RetroGate/         # SwiftUI app + CLI entry point
├── ProxyServer/       # SwiftNIO HTTP proxy listener
├── HTMLTranscoder/    # HTML5 → HTML 3.2 conversion
├── WaybackBridge/     # Wayback Machine integration
└── ImageTranscoder/   # Image format conversion &amp; resizing</pre>
  </div>

  <!-- Documentation Downloads -->
  <h2 style="margin-top: 3rem; margin-bottom: 1.5rem; border-left: 5px solid var(--amber); padding-left: 1rem;">Documentation</h2>

  <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 2rem;">
    <div style="background: var(--white); border: 3px solid var(--beige-dark); padding: 1.5rem; text-align: center;">
      <h3 style="font-family: var(--font-pixel); font-size: 1.1rem; color: var(--amber-dark); margin-bottom: 0.5rem;">User Manual</h3>
      <p style="font-size: 0.85rem; color: #666; margin-bottom: 1rem;">
        The complete guide. Setup, configuration, Wayback mode, troubleshooting, and existential questions about beige plastic.
      </p>
      <a href="/manual.php" class="btn btn-on-light" style="font-size: 0.9rem; padding: 0.4rem 1rem;">Read Online</a>
      <br>
      <a href="/downloads/MANUAL.md" download style="font-size: 0.8rem; margin-top: 0.5rem; display: inline-block; color: var(--amber-dark);">&#x2B07; Download .md</a>
    </div>

    <div style="background: var(--white); border: 3px solid var(--beige-dark); padding: 1.5rem; text-align: center;">
      <h3 style="font-family: var(--font-pixel); font-size: 1.1rem; color: var(--amber-dark); margin-bottom: 0.5rem;">Architecture Docs</h3>
      <p style="font-size: 0.85rem; color: #666; margin-bottom: 1rem;">
        Technical deep-dive. Module overview, request flow, design decisions, and why HTTP/1.0 responses only.
      </p>
      <a href="https://github.com/Simplinity/retrogate/tree/main/docs" class="btn btn-on-light" style="font-size: 0.9rem; padding: 0.4rem 1rem;" target="_blank">View on GitHub</a>
    </div>
  </div>

  <!-- Quick Start -->
  <div style="background: var(--cream); border: 3px solid var(--beige-dark); padding: 2rem; margin-bottom: 2rem;">
    <h3 style="font-family: var(--font-pixel); color: var(--amber-dark); margin-bottom: 1rem;">Quick Start (90 Seconds)</h3>
    <ol style="padding-left: 1.5rem; line-height: 2;">
      <li>Download <code>RetroGate-1.2.0-universal.dmg</code>, open it, drag to Applications</li>
      <li>Launch RetroGate &mdash; note the proxy address (e.g., <code>192.168.0.130:8080</code>)</li>
      <li>On your vintage Mac, set HTTP proxy to that address</li>
      <li>Browse. Marvel. Tell your Quadra it&rsquo;s not obsolete after all.</li>
    </ol>
    <p style="margin-top: 1rem; font-size: 0.85rem; color: #888;">
      For the full setup guide with PAC file shortcuts, SheepShaver tips, and emotional support,
      see the <a href="/manual.php" style="color: var(--amber-dark);">complete manual</a>.
    </p>
  </div>

  <!-- Fun footer note -->
  <div style="text-align: center; margin: 3rem 0; padding: 2rem; border: 2px dashed var(--beige-dark);">
    <p style="font-family: var(--font-pixel); color: var(--amber-dark); font-size: 1.1rem;">
      Fun fact: This entire download page weighs less than a single
      modern cookie consent banner.
    </p>
    <p style="font-size: 0.85rem; color: #888; margin-top: 0.5rem;">
      RetroGate itself is smaller than the average npm <code>node_modules</code> folder
      by approximately four orders of magnitude.
    </p>
  </div>

</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
