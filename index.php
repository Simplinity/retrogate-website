<?php
/**
 * RetroGate — Home Page
 * The front door to the most important proxy server since 1997.
 */
$page_title = null; // Use default
$page_description = 'RetroGate is a macOS proxy server that lets vintage Macs and PCs browse the modern web. TLS bridging, HTML transcoding, image conversion, and Wayback Machine time travel. Because your PowerBook deserves better.';
require_once __DIR__ . '/includes/header.php';
?>

<!-- ====== HERO ====== -->
<section class="hero">
  <div class="hero-content">
    <div class="hero-badge">&#x1F4E1; NOW SERVING HTTP/1.0 SINCE 2025</div>

    <h1>Retro<span class="highlight">Gate</span></h1>
    <p class="hero-subtitle">Browse the modern web on vintage Macs.</p>

    <p class="hero-description">
      A macOS proxy server that bridges the gap between classic Macintosh computers (1984&ndash;2005)
      and today&rsquo;s internet. It runs on your modern Mac and handles all the heavy lifting &mdash;
      TLS, HTML5, modern image formats &mdash; so your old Mac doesn&rsquo;t have to.
    </p>

    <div class="hero-cta-group">
      <a href="/download.php" class="btn btn-primary">&#x2B07; Download</a>
      <a href="/manual.php" class="btn btn-secondary">&#x1F4D6; Read the Manual</a>
    </div>

    <pre class="ascii-computer">
         ___________________________________
        |   _____________________________   |
        |  |                             |  |
        |  |    $ curl -x retrogate      |  |
        |  |      http://apple.com       |  |
        |  |                             |  |
        |  |    200 OK  (HTML 3.2)       |  |
        |  |    Size: 12KB (was 4.7MB)   |  |
        |  |    Images: 23 transcoded    |  |
        |  |    Time: 0.8s              |  |
        |  |                             |  |
        |  |    Your Quadra 605 says:    |  |
        |  |    "Finally."              |  |
        |  |_____________________________|  |
        |  _  _ _ _ _ _ _ _ _ _ _ _ _ _  _  |
        | |_||_|_|_|_|_|_|_|_|_|_|_|_||_|| |
        |   _  ___ _ _  ___ _  _ _ ___  _  |
        |  |_||___| | ||___| ||_|_|___||_|  |
        |___________________________________|
        \     ________________________      /
         \   /                        \    /
          \_/  Macintosh Classic II     \__/
              ________________________
    </pre>
  </div>
</section>

<!-- ====== WHAT IT DOES ====== -->
<section class="features">
  <div class="features-header">
    <h2>What It Does</h2>
    <p class="tagline">Five miracles of modern engineering, performed at 8080 requests per hour.</p>
  </div>

  <div class="feature-grid">
    <div class="feature-card">
      <span class="feature-icon">&#x1F512;</span>
      <h3>TLS Bridge</h3>
      <p>
        Old Macs can&rsquo;t do TLS 1.2, let alone 1.3. RetroGate fetches HTTPS sites with modern
        encryption and serves them back as plain HTTP. Your Quadra doesn&rsquo;t need to know about
        certificate chains. It has enough problems.
      </p>
    </div>

    <div class="feature-card">
      <span class="feature-icon">&#x1F4C4;</span>
      <h3>HTML Transcoder</h3>
      <p>
        Converts modern HTML5/CSS3/JS pages into clean HTML 3.2 that Netscape 2, MacWeb, and iCab can
        actually render. React components go in, &lt;table&gt; layouts come out. It&rsquo;s beautiful.
        In a 1996 kind of way.
      </p>
    </div>

    <div class="feature-card">
      <span class="feature-icon">&#x1F5BC;</span>
      <h3>Image Transcoder</h3>
      <p>
        Converts WebP/AVIF to JPEG/GIF, resizes images to vintage-friendly dimensions, and applies
        dithering for low-color displays. A 4000&times;3000 DSLR photo becomes a 600px GIF that
        your Mac Plus displays with gorgeous halftone elegance.
      </p>
    </div>

    <div class="feature-card">
      <span class="feature-icon">&#x231B;</span>
      <h3>Wayback Machine Mode <span class="badge-new">NEW!</span></h3>
      <p>
        Set a date, and RetroGate fetches every page from the Internet Archive&rsquo;s Wayback Machine.
        Browse the web as it was in 1997. See Apple.com before the iMac. See Google before the logo.
        See GeoCities before Yahoo killed it. Weep accordingly.
      </p>
    </div>

    <div class="feature-card">
      <span class="feature-icon">&#x1F6E0;</span>
      <h3>Dead Service Redirects</h3>
      <p>
        When Netscape Navigator tries to reach home.netscape.com and finds only the void,
        RetroGate redirects it to the Wayback Machine archive. The internet of 1999 lives on,
        even if Netscape doesn&rsquo;t.
      </p>
    </div>

    <div class="feature-card">
      <span class="feature-icon">&#x1F50D;</span>
      <h3>Search Gateway</h3>
      <p>
        A built-in search page powered by DuckDuckGo, stripped of JavaScript and served in HTML 3.2.
        It&rsquo;s like Google in 1998, except it actually respects your privacy. And works on a
        Power Mac 6100.
      </p>
    </div>
  </div>
</section>

<!-- ====== STATS ====== -->
<section class="stats-bar">
  <div class="stats-grid">
    <div class="stat-item">
      <span class="stat-number" data-target="10" data-suffix="">10</span>
      <span class="stat-label">Vintage Presets</span>
    </div>
    <div class="stat-item">
      <span class="stat-number" data-target="6" data-suffix="">6</span>
      <span class="stat-label">Browsers Supported</span>
    </div>
    <div class="stat-item">
      <span class="stat-number" data-target="99" data-suffix="%">99%</span>
      <span class="stat-label">Less JavaScript</span>
    </div>
    <div class="stat-item">
      <span class="stat-number" data-target="100" data-suffix="%">100%</span>
      <span class="stat-label">More Beige</span>
    </div>
  </div>
</section>

<!-- ====== HOW IT WORKS ====== -->
<section class="how-it-works">
  <h2>How It Works</h2>
  <p class="tagline">90 seconds to time travel. The hardest part is typing on a vintage keyboard.</p>

  <div class="steps">
    <div class="step">
      <h3>Launch</h3>
      <p>Open RetroGate on your modern Mac. The proxy server starts automatically. A gold antenna icon gently pulses, which is RetroGate&rsquo;s way of saying <em>&ldquo;I&rsquo;m ready, send me your decrepit HTTP requests.&rdquo;</em></p>
    </div>
    <div class="step">
      <h3>Configure</h3>
      <p>Note the proxy address (e.g. 192.168.0.130:8080). On your vintage Mac, set the HTTP proxy to this address. If you&rsquo;re using SheepShaver, the host is at 10.0.2.2. Easy.</p>
    </div>
    <div class="step">
      <h3>Browse</h3>
      <p>Type a URL. Any URL. Watch in awe as a website built with React, Tailwind, and the hopes of a thousand npm packages gets lovingly downgraded into something your Quadra 605 can render.</p>
    </div>
    <div class="step">
      <h3>Time Travel</h3>
      <p>Enable Wayback Machine mode, pick a date, and browse the web as it actually existed. Temporal consistency included &mdash; no cursed pages where the HTML is from 1999 but the images are from 2007.</p>
    </div>
  </div>
</section>

<!-- ====== WAYBACK SECTION ====== -->
<section class="wayback-section">
  <div class="wayback-inner">
    <div class="wayback-text">
      <h2>Wayback Machine Mode</h2>
      <p>
        This is where RetroGate transcends &ldquo;proxy server&rdquo; and becomes &ldquo;time machine.&rdquo;
      </p>
      <p>
        When enabled, RetroGate fetches pages from the Internet Archive instead of the live internet.
        You&rsquo;re not just transcoding modern pages &mdash; you&rsquo;re browsing the actual web
        <em>as it existed in the past</em>.
      </p>
      <p>
        Temporal consistency ensures all sub-resources (images, CSS) load from the same date.
        Date drift guard warns you when snapshots stray too far. Response caching means archived pages
        load instantly after the first fetch &mdash; because a page from June 15, 1999 will be the
        same page from June 15, 1999 after the heat death of the universe.
      </p>
      <a href="/manual.php#4-wayback-machine-mode" class="btn btn-on-light" style="margin-top: 1rem;">Learn More &#x2192;</a>
    </div>
    <div class="wayback-visual">
      <div class="terminal-line"><span class="prompt">$</span> retrogate --wayback --date=1999-06-15</div>
      <div class="terminal-line">&nbsp;</div>
      <div class="terminal-line">&#x1F4E1; Proxy running on 0.0.0.0:8080</div>
      <div class="terminal-line">&#x231B; Wayback mode: June 15, 1999</div>
      <div class="terminal-line">&#x1F50D; Tolerance: &plusmn;3 months</div>
      <div class="terminal-line">&nbsp;</div>
      <div class="terminal-line">[10:32:01] GET apple.com</div>
      <div class="terminal-line">  &#x2192; web.archive.org/.../19990615/apple.com</div>
      <div class="terminal-line">  &#x2713; Snapshot: Jun 14, 1999 (delta: 1 day)</div>
      <div class="terminal-line">  &#x2713; HTML transcoded: 847KB &#x2192; 23KB</div>
      <div class="terminal-line">  &#x2713; Images: 14 prefetched, 9 transcoded</div>
      <div class="terminal-line">&nbsp;</div>
      <div class="terminal-line">[10:32:03] GET google.com</div>
      <div class="terminal-line">  &#x2192; Fetching from the before-times...</div>
      <div class="terminal-line">  &#x2713; When Google had no logo.<span class="cursor"></span></div>
    </div>
  </div>
</section>

<!-- ====== SUPPORTED BROWSERS ====== -->
<section class="browsers">
  <div class="browser-table-wrap">
    <h2>Vintage Presets</h2>
    <p class="tagline">We support operating systems older than most of our interns.</p>

    <table class="retro-table">
      <thead>
        <tr>
          <th>Preset</th>
          <th>Year</th>
          <th>Resolution</th>
          <th>Colors</th>
          <th>HTML Level</th>
        </tr>
      </thead>
      <tbody>
        <tr><td>System 6</td><td>1988</td><td>512 &times; 342</td><td>B&amp;W (1-bit)</td><td>Aggressive</td></tr>
        <tr><td>System 7</td><td>1991</td><td>640 &times; 480</td><td>256 Colors</td><td>Aggressive</td></tr>
        <tr><td>Mac OS 8</td><td>1997</td><td>832 &times; 624</td><td>Thousands</td><td>Moderate</td></tr>
        <tr><td>Mac OS 9</td><td>1999</td><td>1024 &times; 768</td><td>Millions</td><td>Moderate</td></tr>
        <tr><td>Mac OS X</td><td>2001</td><td>1024 &times; 768</td><td>Thousands</td><td>Minimal</td></tr>
        <tr><td>Windows 3.1</td><td>1992</td><td>640 &times; 480</td><td>16 Colors</td><td>Aggressive</td></tr>
        <tr><td>Windows 95</td><td>1995</td><td>800 &times; 600</td><td>256 Colors</td><td>Moderate</td></tr>
        <tr><td>Windows 98</td><td>1998</td><td>800 &times; 600</td><td>Thousands</td><td>Moderate</td></tr>
        <tr><td>Windows 2000</td><td>2000</td><td>1024 &times; 768</td><td>Thousands</td><td>Minimal</td></tr>
        <tr><td>Windows XP</td><td>2001</td><td>1024 &times; 768</td><td>Thousands</td><td>Minimal</td></tr>
      </tbody>
    </table>

    <p style="text-align: center; margin-top: 1.5rem; font-size: 0.85rem; color: #888;">
      <strong>Historical note:</strong> System 6 (1988) and Windows 3.1 (1992) technically predate the World Wide Web.
      But they <em>can</em> run early browsers like MacWWW and Mosaic, so we&rsquo;re being generous.
    </p>
  </div>
</section>

<!-- ====== TESTIMONIALS ====== -->
<section class="testimonials">
  <h2>What Beige Machines Are Saying</h2>

  <div class="quote-grid">
    <div class="quote-card">
      <p>I haven&rsquo;t been this excited since MacWorld 1998. My iMac G3 just loaded Wikipedia. WIKIPEDIA. I&rsquo;m crying into my hockey puck mouse.</p>
      <span class="attribution">&mdash; A Bondi Blue iMac, age 27</span>
    </div>
    <div class="quote-card">
      <p>For 25 years I&rsquo;ve stared at a &ldquo;This page requires JavaScript&rdquo; message. RetroGate showed me the actual content. I can die happy now. Well, die happier. My PRAM battery died in 2004.</p>
      <span class="attribution">&mdash; A PowerBook 520, emotionally compromised</span>
    </div>
    <div class="quote-card">
      <p>They said I was too old. They said 512&times;342 wasn&rsquo;t enough. They said 1-bit was &ldquo;limiting.&rdquo; But look at me now &mdash; browsing Hacker News in gorgeous Floyd-Steinberg halftone. WHO&rsquo;S LIMITING NOW?</p>
      <span class="attribution">&mdash; A Macintosh Plus, still bitter</span>
    </div>
    <div class="quote-card">
      <p>RetroGate converted a 4.7MB React SPA into 12KB of clean HTML 3.2. That&rsquo;s a 99.7% reduction. I don&rsquo;t know what React is but I know I don&rsquo;t need it.</p>
      <span class="attribution">&mdash; A Quadra 605, doing just fine</span>
    </div>
    <div class="quote-card">
      <p>The Wayback Machine mode let me browse Apple.com from June 1999. Steve was still wearing the black turtleneck. The store had colored iMacs. I saw the future before it happened. Then I went back to 1999 because it was better.</p>
      <span class="attribution">&mdash; An original iMac G3, getting nostalgic</span>
    </div>
    <div class="quote-card">
      <p>SheepShaver users: the host is at 10.0.2.2. You&rsquo;re welcome. Also, yes, the networking drops after a while. That&rsquo;s not a RetroGate bug. That&rsquo;s a SheepShaver feature. (It&rsquo;s a bug.)</p>
      <span class="attribution">&mdash; The SheepShaver FAQ, being honest</span>
    </div>
  </div>
</section>

<!-- ====== CTA ====== -->
<section class="cta-section">
  <div class="container">
    <h2>Ready to Give Your Old Mac a Second Life?</h2>
    <p>
      RetroGate is free, open source (MIT license), and takes about 90 seconds to set up.
      The other 85 of those seconds are spent typing an IP address on a vintage keyboard.
    </p>
    <div class="hero-cta-group">
      <a href="/download.php" class="btn btn-primary">&#x2B07; Download RetroGate</a>
      <a href="https://github.com/brunoscheufler/retrogate" class="btn btn-secondary" target="_blank">&#x2B50; Star on GitHub</a>
    </div>
  </div>
</section>

<!-- ====== UNDER CONSTRUCTION ====== -->
<div class="construction-banner">
  <span>&#x1F6A7; THIS WEBSITE IS PERMANENTLY UNDER CONSTRUCTION &#x1F6A7;</span>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
