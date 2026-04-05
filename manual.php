<?php
/**
 * RetroGate — Manual Page
 * The full manual, lovingly formatted for humans who read documentation.
 * (We know you exist. All seven of you.)
 */
$page_title = 'Manual';
$page_description = 'The complete RetroGate manual. A portal through time for your beige plastic friends. Setup guide, configuration, Wayback Machine mode, troubleshooting, and more.';
require_once __DIR__ . '/includes/header.php';
?>

<!-- Page Header -->
<section class="page-header">
  <h1>The Manual</h1>
  <p class="subtitle">A Portal Through Time for Your Beige Plastic Friends</p>
</section>


<!-- Download Bar -->
<div class="manual-content">
  <div class="download-bar">
    <p>&#x1F4D6; Prefer to read offline? Download the full manual.</p>
    <a href="/downloads/MANUAL.md" download class="btn btn-on-light" style="font-size: 1rem; padding: 0.5rem 1.5rem;">&#x2B07; Download (.md)</a>
  </div>

  <!-- Table of Contents -->
  <div class="manual-toc">
    <h3>&#x1F4CB; Table of Contents</h3>
    <ol>
      <li><a href="#1-getting-started">Getting Started (The 90-Second Setup)</a></li>
      <li><a href="#2-the-dashboard">The Dashboard (Mission Control)</a></li>
      <li><a href="#3-choosing-your-vintage-machine">Choosing Your Vintage Machine</a></li>
      <li><a href="#4-wayback-machine-mode">Wayback Machine Mode (Time Travel)</a></li>
      <li><a href="#5-the-built-in-start-page">The Built-In Start Page</a></li>
      <li><a href="#6-the-request-log">The Request Log (Snooping on Your Own Traffic)</a></li>
      <li><a href="#7-the-wayback-timeline">The Wayback Timeline (Temporal Forensics)</a></li>
      <li><a href="#8-what-retrogate-does-to-your-pages">What RetroGate Does to Your Pages</a></li>
      <li><a href="#9-image-transcoding-and-dithering">Image Transcoding &amp; Dithering</a></li>
      <li><a href="#10-advanced-settings">Advanced Settings (Here Be Dragons)</a></li>
      <li><a href="#11-the-menu-bar">The Menu Bar (For Minimalists)</a></li>
      <li><a href="#12-keyboard-shortcuts">Keyboard Shortcuts (For Power Users)</a></li>
      <li><a href="#13-dead-services">Dead Services &amp; Redirect Magic</a></li>
      <li><a href="#14-sheepshaver-users">SheepShaver Users (Read This)</a></li>
      <li><a href="#15-troubleshooting">Troubleshooting (When Things Go Sideways)</a></li>
      <li><a href="#16-faq">FAQ (Frequently Argued Questions)</a></li>
    </ol>
  </div>

  <!-- ============== A MANIFESTO ============== -->
  <h2>A Manifesto</h2>

  <p>Somewhere in a landfill, a PowerBook 520 is crying.</p>

  <p>
    Not because it&rsquo;s broken &mdash; it still boots, still runs, still has that satisfying <em>bong</em> &mdash;
    but because the entire internet has left it behind. Every website now requires JavaScript frameworks
    that weigh more than the PowerBook&rsquo;s entire hard drive. Every image is in a format invented
    two decades after its last system update. Every page assumes you have more RAM than this machine has atoms.
  </p>

  <p><strong>RetroGate exists because we refuse to accept this.</strong></p>

  <p>
    We believe that a Macintosh Plus deserves to browse Wikipedia. That a Windows 95 machine should be able
    to search DuckDuckGo. That Mac OS 9 &mdash; the last truly great Classic Mac OS, fight me &mdash;
    should be able to reach the entire World Wide Web, including the parts that didn&rsquo;t exist when it was alive.
  </p>

  <p>
    RetroGate is a proxy server that sits between your vintage computer and the modern internet. It translates.
    It transcodes. It strips away twenty years of web bloat and delivers the content your old machine actually
    asked for, in a format it can actually understand.
  </p>

  <p>
    It also has a Wayback Machine mode, because sometimes the best way to browse the web on a 1999 computer
    is to browse the 1999 web.
  </p>

  <p><strong>This is not nostalgia. This is <em>infrastructure</em>.</strong></p>

  <hr style="border: none; border-top: 3px solid var(--beige-dark); margin: 3rem 0;">

  <!-- ============== 1. GETTING STARTED ============== -->
  <h2 id="1-getting-started">1. Getting Started</h2>

  <p>
    RetroGate takes about 90 seconds to set up. The hardest part is typing an IP address on a vintage keyboard,
    which &mdash; depending on your keyboard &mdash; might take the remaining 85 of those seconds.
  </p>

  <h3>Step 1: Launch RetroGate</h3>
  <p>
    Open the app. The proxy server starts automatically. You&rsquo;ll see a gold antenna icon gently pulsing
    in the hero card, which is RetroGate&rsquo;s way of saying <em>&ldquo;I&rsquo;m ready, send me your
    decrepit HTTP requests.&rdquo;</em>
  </p>

  <h3>Step 2: Note the Proxy Address</h3>
  <p>The dashboard shows your proxy address, something like:</p>
  <pre>192.168.0.130:8080</pre>
  <p>
    There&rsquo;s a handy copy button next to it. It looks like two overlapping documents, because that&rsquo;s
    the universal icon for &ldquo;copy&rdquo; and we are not here to reinvent semiotics.
  </p>

  <h3>Step 3: Configure Your Vintage Browser</h3>
  <p>On your vintage Mac or PC, open your browser&rsquo;s proxy settings and enter:</p>
  <ul style="margin: 1rem 0 1rem 2rem;">
    <li><strong>HTTP Proxy:</strong> the IP address shown in RetroGate</li>
    <li><strong>Port:</strong> 8080 (or whatever you&rsquo;ve configured)</li>
  </ul>
  <p>
    If you&rsquo;re running <strong>SheepShaver</strong>, the host machine is reachable at
    <code>10.0.2.2</code> from inside the VM.
  </p>

  <h3>Step 4: Browse</h3>
  <p>
    Type a URL. Any URL. Watch in awe as a website built with React, Tailwind, and the hopes and dreams
    of a thousand npm packages gets lovingly downgraded into something your Quadra 605 can render.
  </p>

  <h3>The PAC File Shortcut</h3>
  <p>Don&rsquo;t want to manually configure proxy settings? Point your browser&rsquo;s auto-proxy-configuration to:</p>
  <pre>http://retrogate/proxy.pac</pre>
  <p>
    This serves a PAC file that routes all HTTP traffic through RetroGate automatically.
    It&rsquo;s the lazy option, and we respect that.
  </p>

  <!-- ============== 2. THE DASHBOARD ============== -->
  <h2 id="2-the-dashboard">2. The Dashboard</h2>

  <p>The Dashboard is your command center. It tells you everything about what RetroGate is doing without you having to wonder.</p>

  <h3>The Hero Card</h3>
  <p>At the top, a status card shows:</p>
  <ul style="margin: 1rem 0 1rem 2rem;">
    <li><strong>Proxy status</strong> &mdash; &ldquo;Proxy running&rdquo; or &ldquo;Proxy running in Wayback mode&rdquo;</li>
    <li><strong>Your proxy address</strong> &mdash; with a copy button</li>
    <li><strong>Current preset</strong> &mdash; e.g., &ldquo;Mac OS 9&rdquo;</li>
    <li><strong>Screen resolution</strong> &mdash; e.g., &ldquo;1024 &times; 768&rdquo;</li>
  </ul>
  <p>
    The animated antenna icon pulses gently when the proxy is running. It does not pulse when stopped.
    We considered making it droop sadly, but decided that was too emotionally manipulative.
  </p>

  <h3>The Four Stat Cards</h3>
  <table>
    <thead>
      <tr><th>Card</th><th>What It Shows</th></tr>
    </thead>
    <tbody>
      <tr><td><strong>Requests</strong></td><td>Total requests served this session, plus page count</td></tr>
      <tr><td><strong>Bandwidth</strong></td><td>Total bytes delivered to your vintage browser</td></tr>
      <tr><td><strong>Saved</strong></td><td>How much bandwidth transcoding saved you. This number tends to be impressive. You&rsquo;re welcome.</td></tr>
      <tr><td><strong>Uptime</strong></td><td>How long the proxy has been running</td></tr>
    </tbody>
  </table>

  <h3>The Detail Cards</h3>
  <ul style="margin: 1rem 0 1rem 2rem;">
    <li><strong>Top Domains</strong> &mdash; Your top 5 most-visited domains. Useful for realizing you&rsquo;ve been reading the same Wikipedia article for three hours.</li>
    <li><strong>Content Mix</strong> &mdash; Breakdown of HTML, images, CSS, and other content.</li>
    <li><strong>Image Transcoding</strong> &mdash; Original vs. transcoded size and compression ratio. This card exists so you can appreciate the sheer violence RetroGate inflicts on modern WebP files.</li>
    <li><strong>Wayback Mode / Status</strong> &mdash; Target date, tolerance, and era.</li>
  </ul>

  <!-- ============== 3. CHOOSING YOUR VINTAGE MACHINE ============== -->
  <h2 id="3-choosing-your-vintage-machine">3. Choosing Your Vintage Machine</h2>

  <p>
    Navigate to <strong>Configure &rarr; Vintage Computer</strong> in the sidebar.
    RetroGate ships with 10 presets spanning two platforms. Each preset configures the transcoding level,
    image quality, output encoding, and screen resolution automatically &mdash; because you have better things to
    do than figure out whether Mac OS 8 used MacRoman or ISO-8859-1. (It used MacRoman. They all used MacRoman.
    Except the PCs. The PCs used ISO-8859-1. See? You didn&rsquo;t want to know that.)
  </p>

  <h3>Mac Presets</h3>
  <table>
    <thead>
      <tr><th>Preset</th><th>Year</th><th>Resolution</th><th>Colors</th><th>HTML Level</th></tr>
    </thead>
    <tbody>
      <tr><td>System 6</td><td>1988</td><td>512 &times; 342</td><td>B&amp;W (1-bit)</td><td>Aggressive</td></tr>
      <tr><td>System 7</td><td>1991</td><td>640 &times; 480</td><td>256 Colors</td><td>Aggressive</td></tr>
      <tr><td>Mac OS 8</td><td>1997</td><td>832 &times; 624</td><td>Thousands</td><td>Moderate</td></tr>
      <tr><td>Mac OS 9</td><td>1999</td><td>1024 &times; 768</td><td>Millions</td><td>Moderate</td></tr>
      <tr><td>Mac OS X</td><td>2001</td><td>1024 &times; 768</td><td>Thousands</td><td>Minimal</td></tr>
    </tbody>
  </table>

  <h3>PC Presets</h3>
  <table>
    <thead>
      <tr><th>Preset</th><th>Year</th><th>Resolution</th><th>Colors</th><th>HTML Level</th></tr>
    </thead>
    <tbody>
      <tr><td>Windows 3.1</td><td>1992</td><td>640 &times; 480</td><td>16 Colors</td><td>Aggressive</td></tr>
      <tr><td>Windows 95</td><td>1995</td><td>800 &times; 600</td><td>256 Colors</td><td>Moderate</td></tr>
      <tr><td>Windows 98</td><td>1998</td><td>800 &times; 600</td><td>Thousands</td><td>Moderate</td></tr>
      <tr><td>Windows 2000</td><td>2000</td><td>1024 &times; 768</td><td>Thousands</td><td>Minimal</td></tr>
      <tr><td>Windows XP</td><td>2001</td><td>1024 &times; 768</td><td>Thousands</td><td>Minimal</td></tr>
    </tbody>
  </table>

  <h3>Color Depth</h3>
  <p>Each preset supports a range of color depths. Choose the one that matches your vintage display:</p>
  <ul style="margin: 1rem 0 1rem 2rem;">
    <li><strong>B&amp;W (1-bit)</strong> &mdash; For the Mac Plus, SE, and Classic. Images are dithered using Floyd-Steinberg, producing that gorgeous halftone newspaper look that makes everything feel important.</li>
    <li><strong>16 Colors</strong> &mdash; Standard VGA palette. Includes such classics as &ldquo;dark cyan&rdquo; and &ldquo;bright magenta.&rdquo;</li>
    <li><strong>256 Colors</strong> &mdash; The golden age of pixel art. Everything looks slightly posterized.</li>
    <li><strong>Thousands (16-bit)</strong> &mdash; Good enough for most things, slightly banded on gradients. The &ldquo;I have a nice monitor but not <em>that</em> nice&rdquo; option.</li>
    <li><strong>Millions (24-bit)</strong> &mdash; Full color JPEG. For the Mac OS 9 users who splurged on that 17-inch Apple Studio Display. You earned this.</li>
  </ul>

  <!-- ============== 4. WAYBACK MACHINE MODE ============== -->
  <h2 id="4-wayback-machine-mode">4. Wayback Machine Mode</h2>

  <p>
    Navigate to <strong>Configure &rarr; Wayback Machine</strong> in the sidebar, or press <strong>Cmd+Shift+W</strong>.
    This is where RetroGate transcends &ldquo;proxy server&rdquo; and becomes &ldquo;time machine.&rdquo;
  </p>

  <h3>How It Works</h3>
  <p>
    When Wayback mode is enabled, RetroGate fetches pages from the Internet Archive&rsquo;s Wayback Machine
    instead of the live internet. Want to see what Apple.com looked like in 1999? What Google looked like
    before it had a logo? What GeoCities looked like before Yahoo killed it? This is your feature.
  </p>

  <h3>Configuration</h3>
  <ul style="margin: 1rem 0 1rem 2rem;">
    <li><strong>Target Date</strong> &mdash; Pick any date. RetroGate auto-suggests the midpoint of your vintage preset&rsquo;s era.</li>
    <li><strong>Date Tolerance</strong> &mdash; How far the Wayback Machine is allowed to stray: 1, 3, 6, 9, or 12 months, or &ldquo;Any date.&rdquo;</li>
  </ul>

  <h3>Temporal Consistency</h3>
  <p>
    When you load a page, RetroGate resolves the actual snapshot date and loads all sub-resources from that same date.
    This prevents the cursed scenario where your page is from 1999 but the images are from 2003 and the CSS is from 2007.
  </p>

  <h3>Date Drift Guard</h3>
  <p>
    If the closest snapshot is too far from your target date, RetroGate shows a warning with links to nearby snapshots.
  </p>

  <h3>Auto-Fallback</h3>
  <p>
    Even outside Wayback mode, if a live website returns a 403, 404, 410, or 451 error, RetroGate automatically
    checks the Wayback Machine for an archived version. The internet remembers even when webmasters don&rsquo;t.
  </p>

  <!-- ============== 5. THE BUILT-IN START PAGE ============== -->
  <h2 id="5-the-built-in-start-page">5. The Built-In Start Page</h2>

  <p>Point your vintage browser to:</p>
  <pre>http://retrogate/</pre>
  <p>
    This is RetroGate&rsquo;s portal page &mdash; a lovingly crafted start page in HTML 3.2
    that actually looks good in Internet Explorer 3.
  </p>
  <p>Features: a DuckDuckGo search box, popular sites (Apple, Google, Wikipedia, Hacker News),
    retro sites (68kMLA, Macintosh Garden, System 7 Today), and Wayback status display.</p>

  <!-- ============== 6. THE REQUEST LOG ============== -->
  <h2 id="6-the-request-log">6. The Request Log</h2>

  <p>
    Navigate to <strong>Monitor &rarr; Request Log</strong> in the sidebar.
    This is the full, unfiltered firehose of every request your vintage browser makes through RetroGate.
  </p>

  <table>
    <thead>
      <tr><th>Column</th><th>Description</th></tr>
    </thead>
    <tbody>
      <tr><td><strong>Time</strong></td><td>When the request happened</td></tr>
      <tr><td><strong>Method</strong></td><td>GET, POST, etc. (it&rsquo;s almost always GET &mdash; vintage browsers were simple creatures)</td></tr>
      <tr><td><strong>URL</strong></td><td>The full URL, truncated if too long</td></tr>
      <tr><td><strong>Status</strong></td><td>HTTP status code. Green if under 400, red if 400+.</td></tr>
      <tr><td><strong>Size</strong></td><td>Response size after transcoding</td></tr>
    </tbody>
  </table>

  <!-- ============== 7. WAYBACK TIMELINE ============== -->
  <h2 id="7-the-wayback-timeline">7. The Wayback Timeline</h2>

  <p>
    Navigate to <strong>Monitor &rarr; Wayback Timeline</strong>. This tab shows only HTML pages served from the
    Wayback Machine and compares your target date with the actual archive date.
  </p>

  <p>The Delta column tells you how far the actual snapshot strayed:</p>
  <ul style="margin: 1rem 0 1rem 2rem;">
    <li>&#x1F7E2; <strong>Green</strong> &mdash; Within 7 days. &ldquo;Exact&rdquo; if perfect match.</li>
    <li>&#x1F7E1; <strong>Gold</strong> &mdash; 8 to 90 days off. Close enough.</li>
    <li>&#x1F534; <strong>Red</strong> &mdash; More than 90 days off. The Wayback Machine did its best.</li>
  </ul>

  <!-- ============== 8. WHAT RETROGATE DOES ============== -->
  <h2 id="8-what-retrogate-does-to-your-pages">8. What RetroGate Does to Your Pages</h2>

  <p>
    RetroGate doesn&rsquo;t just forward web pages. It <em>translates</em> them from the language of 2026
    to the language your browser speaks.
  </p>

  <h3>Aggressive (HTML 3.2) &mdash; System 6, System 7, Windows 3.1</h3>
  <p>The full time-warp treatment:</p>
  <ul style="margin: 1rem 0 1rem 2rem;">
    <li>All CSS is stripped &mdash; every last rule</li>
    <li>HTML5 semantic tags become <code>&lt;div&gt;</code>s</li>
    <li><code>&lt;strong&gt;</code> becomes <code>&lt;b&gt;</code>, <code>&lt;em&gt;</code> becomes <code>&lt;i&gt;</code></li>
    <li>Inline CSS is converted to HTML 3.2 attributes</li>
    <li>Navigation lists become table-based layouts</li>
    <li>Body content gets wrapped in layout tables, because in HTML 3.2, tables <em>are</em> the layout engine</li>
  </ul>

  <h3>Moderate (CSS Stripped) &mdash; Mac OS 8/9, Windows 95/98</h3>
  <p>A gentler approach. HTML stays modern-ish, but CSS gets removed. Semantic tags downgraded.</p>

  <h3>Minimal (CSS Preserved) &mdash; Mac OS X, Windows 2000/XP</h3>
  <p>The lightest touch. JavaScript stripped, <code>&lt;noscript&gt;</code> content preserved, web fonts removed,
    vendor prefixes injected. Java <code>&lt;applet&gt;</code> tags stripped (they crash SheepShaver),
    but <code>&lt;embed&gt;</code> and <code>&lt;object&gt;</code> preserved (QuickTime is eternal).</p>

  <h3>Applied at All Levels</h3>
  <ul style="margin: 1rem 0 1rem 2rem;">
    <li>HTTPS &rarr; HTTP downgrade</li>
    <li>Cookie <code>Secure</code> flag stripping</li>
    <li>Unicode smart character cleanup (curly quotes &rarr; straight, em-dashes &rarr; <code>--</code>)</li>
    <li>Character encoding conversion (UTF-8 &rarr; MacRoman or ISO-8859-1)</li>
    <li>Tracking redirect resolution</li>
  </ul>

  <!-- ============== 9. IMAGE TRANSCODING ============== -->
  <h2 id="9-image-transcoding-and-dithering">9. Image Transcoding &amp; Dithering</h2>

  <table>
    <thead>
      <tr><th>Color Depth</th><th>Dithering</th><th>Result</th></tr>
    </thead>
    <tbody>
      <tr><td>B&amp;W (1-bit)</td><td>Floyd-Steinberg</td><td>Gorgeous halftone &mdash; like reading a newspaper, but on a $4000 computer from 1986</td></tr>
      <tr><td>16 Colors</td><td>Bayer 4&times;4</td><td>Classic VGA crosshatch. Very Windows 3.1.</td></tr>
      <tr><td>256 Colors</td><td>GIF palette quantization</td><td>If it was good enough for the Dancing Baby, it&rsquo;s good enough for you.</td></tr>
      <tr><td>Thousands+</td><td>None needed</td><td>Full-color JPEG. Living the dream.</td></tr>
    </tbody>
  </table>

  <p style="margin-top: 1.5rem;">
    All images are resized to fit your configured screen resolution. A 4000&times;3000 pixel photograph gets
    thoughtfully shrunk to 600 pixels. The original bytes never even reach your vintage machine.
  </p>
  <p>
    RetroGate also prefetches images in parallel, so by the time your browser requests each image, it&rsquo;s already cached.
    When images fail to load, RetroGate returns a transparent 1&times;1 GIF instead of a broken image icon.
  </p>

  <!-- ============== 10. ADVANCED SETTINGS ============== -->
  <h2 id="10-advanced-settings">10. Advanced Settings</h2>

  <p>Open <strong>Settings</strong> (Cmd+,) to access the advanced configuration.</p>

  <h3>General</h3>
  <ul style="margin: 1rem 0 1rem 2rem;">
    <li><strong>Port</strong> &mdash; Change the proxy port (default: 8080).</li>
    <li><strong>Minify HTML</strong> &mdash; Strips comments, collapses whitespace. Reduces page size by 20&ndash;40%.</li>
  </ul>

  <h3>Advanced</h3>
  <ul style="margin: 1rem 0 1rem 2rem;">
    <li><strong>Transcoding Bypass Domains</strong> &mdash; Some sites are already retro-friendly. Default: <code>68kmla.org</code>, <code>system7today.com</code>, <code>macintoshgarden.org</code>.</li>
    <li><strong>Dead Endpoint Redirects</strong> &mdash; Custom redirects for dead services.</li>
  </ul>

  <!-- ============== 11. MENU BAR ============== -->
  <h2 id="11-the-menu-bar">11. The Menu Bar</h2>

  <p>
    RetroGate puts a small antenna icon in your macOS menu bar. Click it for proxy status, start/stop toggle,
    Wayback Machine toggle, current preset info, and request stats. The icon pulses when running.
    It&rsquo;s like a heartbeat for your proxy server, except less alarming.
  </p>

  <!-- ============== 12. KEYBOARD SHORTCUTS ============== -->
  <h2 id="12-keyboard-shortcuts">12. Keyboard Shortcuts</h2>

  <table>
    <thead>
      <tr><th>Shortcut</th><th>Action</th></tr>
    </thead>
    <tbody>
      <tr><td><strong>&#x2318;&#x21E7;S</strong></td><td>Start/Stop proxy server</td></tr>
      <tr><td><strong>&#x2318;&#x21E7;W</strong></td><td>Toggle Wayback Machine mode</td></tr>
      <tr><td><strong>&#x2318;K</strong></td><td>Clear the request log</td></tr>
      <tr><td><strong>&#x2318;,</strong></td><td>Open Settings</td></tr>
    </tbody>
  </table>

  <p style="margin-top: 1rem;">Memorize them and you&rsquo;ll never need to click anything again, which is good, because clicking is so <em>2025</em>.</p>

  <!-- ============== 13. DEAD SERVICES ============== -->
  <h2 id="13-dead-services">13. Dead Services &amp; Redirect Magic</h2>

  <p>
    The internet of 1999 had services that no longer exist. When Netscape Navigator tries to reach
    <code>home.netscape.com</code>, it gets nothing. Digital silence.
  </p>

  <p>RetroGate fixes this:</p>

  <table>
    <thead>
      <tr><th>Dead Service</th><th>Redirected To</th></tr>
    </thead>
    <tbody>
      <tr><td>home.netscape.com</td><td>Wayback Machine archive</td></tr>
      <tr><td>home.microsoft.com</td><td>Wayback Machine archive</td></tr>
      <tr><td>www.msn.com</td><td>Wayback Machine archive</td></tr>
      <tr><td>itools.mac.com</td><td>Wayback Machine archive</td></tr>
      <tr><td>www.geocities.com</td><td>Wayback Machine archive</td></tr>
      <tr><td>www.altavista.com</td><td>Wayback Machine archive</td></tr>
      <tr><td>www.excite.com</td><td>Wayback Machine archive</td></tr>
      <tr><td>www.icq.com</td><td>Wayback Machine archive</td></tr>
      <tr><td>www.real.com</td><td>Wayback Machine archive</td></tr>
    </tbody>
  </table>

  <p style="margin-top: 1rem;">
    RetroGate also detects redirect loops (6+ requests in 10 seconds) and resolves tracking redirects
    by checking 15+ common redirect parameter names.
  </p>

  <!-- ============== 14. SHEEPSHAVER ============== -->
  <h2 id="14-sheepshaver-users">14. SheepShaver Users</h2>

  <ul style="margin: 1rem 0 1rem 2rem;">
    <li><strong>Host IP:</strong> Your Mac host is reachable at <code>10.0.2.2</code> from inside the VM.</li>
    <li><strong>Networking drops:</strong> SheepShaver&rsquo;s slirp networking is, shall we say, <em>temperamental</em>. If browsing stops working, restart SheepShaver. This is not a RetroGate bug. This is a SheepShaver feature. (It&rsquo;s a bug. It&rsquo;s definitely a bug.)</li>
    <li><strong>Java applets:</strong> RetroGate strips <code>&lt;applet&gt;</code> tags because they crash SheepShaver&rsquo;s MRJ. QuickTime embeds are preserved because QuickTime is eternal.</li>
  </ul>

  <!-- ============== 15. TROUBLESHOOTING ============== -->
  <h2 id="15-troubleshooting">15. Troubleshooting</h2>

  <h3>&ldquo;Pages aren&rsquo;t loading&rdquo;</h3>
  <ol style="margin: 1rem 0 1rem 2rem;">
    <li>Is the proxy running? Check the dashboard &mdash; the antenna should be pulsing.</li>
    <li>Is your vintage browser configured with the correct IP and port?</li>
    <li>If using SheepShaver, restart it. Seriously, just restart it.</li>
  </ol>

  <h3>&ldquo;Pages look weird&rdquo;</h3>
  <p>
    Check your preset matches your actual vintage machine. If you&rsquo;re running Mac OS 9 with the System 6 preset,
    you&rsquo;re going to have a bad time.
  </p>

  <h3>&ldquo;The Wayback Machine is slow&rdquo;</h3>
  <p>
    That&rsquo;s not RetroGate &mdash; that&rsquo;s the Internet Archive. It serves billions of archived pages
    from a non-profit&rsquo;s server room. It&rsquo;s doing its best. RetroGate caches responses and prefetches images to help.
  </p>

  <h3>&ldquo;Text characters look wrong&rdquo;</h3>
  <p>
    Make sure your preset platform matches your actual machine. Mac presets output MacRoman,
    PC presets output ISO-8859-1. Wrong encoding = garbled characters.
  </p>

  <!-- ============== 16. FAQ ============== -->
  <h2 id="16-faq">16. FAQ</h2>

  <p><strong>Q: Does it work with actual vintage hardware, or just emulators?</strong></p>
  <p>Both. SheepShaver, Basilisk II, QEMU, PCem, 86Box, or genuine beige hardware &mdash; RetroGate doesn&rsquo;t discriminate.</p>

  <p><strong>Q: Can I run it on a Raspberry Pi?</strong></p>
  <p>No. RetroGate requires macOS 14+. It&rsquo;s built with SwiftUI, SwiftNIO, and CoreGraphics.</p>

  <p><strong>Q: Why can&rsquo;t I use the Wayback Machine directly?</strong></p>
  <p>Because the Wayback Machine&rsquo;s website is a modern web application requiring JavaScript, CSS, and HTTPS &mdash; none of which your vintage browser supports.</p>

  <p><strong>Q: Will this work with HTTPS sites?</strong></p>
  <p>Yes. Your vintage browser sends HTTP to RetroGate, which makes the HTTPS request with modern TLS. If cert verification fails, it falls back to plain HTTP.</p>

  <p><strong>Q: Why &ldquo;RetroGate&rdquo;?</strong></p>
  <p>Because it&rsquo;s a <em>gate</em> between the <em>retro</em> internet and the modern one. Also because every good project needs a name that sounds vaguely like a political scandal.</p>

  <hr style="border: none; border-top: 3px solid var(--beige-dark); margin: 3rem 0;">

  <p style="text-align: center; font-style: italic; color: #888;">
    <em>RetroGate is made with love, SwiftNIO, and an irrational attachment to beige plastic.</em><br>
    <em>If you made it this far, you&rsquo;re our kind of person. Now go browse something.</em>
  </p>

</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
