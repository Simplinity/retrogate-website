<?php
/**
 * RetroGate — FAQ Page
 * Frequently Argued Questions.
 * (Because "Frequently Asked" implies politeness we can't guarantee.)
 */
$page_title = 'FAQ';
$page_description = 'Frequently Argued Questions about RetroGate. Everything you wanted to know about browsing the modern web on a Macintosh Plus but were too afraid to ask.';
require_once __DIR__ . '/includes/header.php';
?>

<section class="page-header">
  <h1>Frequently Argued Questions</h1>
  <p class="subtitle">Everything you wanted to know but were too afraid to ask your Quadra.</p>
</section>

<div class="breadcrumb">
  <a href="/">Home</a> &#x2192; FAQ
</div>

<div class="faq-content">

  <p style="margin-bottom: 2rem; color: #666;">
    We call these &ldquo;Frequently <em>Argued</em> Questions&rdquo; because most of them come from
    heated debates on vintage computing forums at 2 AM. We appreciate your passion. We share it.
    That&rsquo;s why we&rsquo;re all here.
  </p>

  <!-- General -->
  <h2 style="margin-bottom: 1.5rem; border-left: 5px solid var(--amber); padding-left: 1rem;">General</h2>

  <div class="faq-item">
    <button class="faq-question">What exactly IS RetroGate?</button>
    <div class="faq-answer">
      <p>RetroGate is a macOS proxy server that sits between your vintage computer and the modern internet.
        It handles TLS encryption, converts HTML5 to HTML 3.2, transcodes modern image formats to JPEG/GIF,
        and generally performs twenty years of technological regression so your old Mac doesn&rsquo;t have to.</p>
      <p>Think of it as a universal translator between your Macintosh Plus and the year 2026.
        Except instead of translating Klingon, it translates React components into &lt;table&gt; layouts.</p>
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-question">Does it work with real hardware or just emulators?</button>
    <div class="faq-answer">
      <p>Both! If your vintage Mac or PC can make HTTP requests through a proxy, RetroGate handles the rest.
        SheepShaver, Basilisk II, QEMU, PCem, 86Box, or genuine beige hardware that has survived
        the fall of empires, the rise of the iPhone, and at least two office moves &mdash; RetroGate loves them all equally.</p>
      <p>We don&rsquo;t discriminate based on age, color depth, or how loud the hard drive sounds.</p>
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-question">Why "RetroGate"? Isn't that a bit... scandalous?</button>
    <div class="faq-answer">
      <p>Because it&rsquo;s a <em>gate</em> between the <em>retro</em> internet and the modern one.
        Also because every good project needs a name that sounds vaguely like a political scandal.
        RetroGate: the controversy of making old computers useful again.</p>
      <p>We considered &ldquo;Proxy McProxyFace&rdquo; but felt it lacked gravitas.</p>
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-question">Is this legal?</button>
    <div class="faq-answer">
      <p>Yes. RetroGate is a proxy server running on your local network. It&rsquo;s no different from any other HTTP proxy.
        The Wayback Machine integration uses the Internet Archive&rsquo;s public API and respects robots.txt.</p>
      <p>The only law you might be breaking is the unwritten one about spending your Saturday night
        configuring TCP/IP on a Power Macintosh 7200 instead of going outside. We won&rsquo;t judge.</p>
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-question">Can I run RetroGate on a Raspberry Pi?</button>
    <div class="faq-answer">
      <p>No. RetroGate is a macOS app built with SwiftUI, SwiftNIO, and CoreGraphics. It requires macOS 14+ on Apple Silicon.</p>
      <p>We know this is slightly ironic &mdash; a proxy for old computers that requires the newest computer.
        But SwiftNIO is really fast, CoreGraphics handles image transcoding beautifully, and frankly,
        your M1/M2/M3/M4 Mac isn&rsquo;t doing anything else productive while it serves HTML 3.2 to a Quadra.</p>
    </div>
  </div>

  <!-- Technical -->
  <h2 style="margin-top: 2.5rem; margin-bottom: 1.5rem; border-left: 5px solid var(--amber); padding-left: 1rem;">Technical</h2>

  <div class="faq-item">
    <button class="faq-question">Will this work with HTTPS sites?</button>
    <div class="faq-answer">
      <p>Yes! Your vintage browser sends a plain HTTP request to RetroGate. RetroGate then makes the HTTPS
        request on its behalf, using modern TLS 1.3. If the HTTPS connection fails (expired cert, etc.),
        RetroGate falls back to plain HTTP automatically.</p>
      <p>Your Mac OS 9 machine never needs to know about certificate chains, OCSP stapling, or
        any of that TLS handshake business. It has enough problems.</p>
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-question">Why can't I just use the Wayback Machine directly?</button>
    <div class="faq-answer">
      <p>Because the Wayback Machine&rsquo;s website is itself a modern web application. It uses JavaScript,
        modern CSS, HTTPS &mdash; none of which your vintage browser supports.</p>
      <p>It&rsquo;s like asking why you can&rsquo;t read a book through a window &mdash; technically the words are there,
        but there&rsquo;s a pane of glass (and 25 years of web standards) in the way.
        RetroGate is the person who opens the window for you.</p>
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-question">What's the maximum page size?</button>
    <div class="faq-answer">
      <p>RetroGate caps responses at 10 MB. In practice, no page from 1999 was anywhere near this limit.
        In 2026, some JavaScript bundles exceed it. We don&rsquo;t talk about those.</p>
      <p>A typical transcoded page is 10&ndash;50 KB. For reference, the original Mac OS 9 installer
        was 15 MB. You could fit hundreds of transcoded web pages in the space of one operating system.
        What a time to be alive.</p>
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-question">Can I browse modern SPAs (Single Page Applications)?</button>
    <div class="faq-answer">
      <p>You can certainly try. Sites that are mostly text (Wikipedia, news articles, forums) work great.
        Sites that are mostly JavaScript-rendered (Twitter, modern Reddit, Gmail) will give you a blank page
        with perhaps a sad <code>&lt;noscript&gt;</code> message.</p>
      <p>RetroGate preserves <code>&lt;noscript&gt;</code> content by default, so you&rsquo;ll at least see
        <em>something</em>. Usually it&rsquo;s a polite suggestion to enable JavaScript, which is
        adorably naive given that your browser thinks ECMAScript is a skin condition.</p>
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-question">What encoding does RetroGate use?</button>
    <div class="faq-answer">
      <p>Mac presets output <strong>MacRoman</strong>. PC presets output <strong>ISO-8859-1</strong>.
        Unicode characters are converted with lossy encoding &mdash; curly quotes become straight quotes,
        em-dashes become <code>--</code>, ellipses become <code>...</code>, and trademark symbols become <code>(TM)</code>.</p>
      <p>If you&rsquo;re seeing garbled characters, you probably have a Mac preset on a PC browser or vice versa.
        This is the &ldquo;you had one job&rdquo; of character encoding, and it&rsquo;s been causing problems since 1991.</p>
    </div>
  </div>

  <!-- Wayback -->
  <h2 style="margin-top: 2.5rem; margin-bottom: 1.5rem; border-left: 5px solid var(--amber); padding-left: 1rem;">Wayback Machine</h2>

  <div class="faq-item">
    <button class="faq-question">Why is the Wayback Machine so slow?</button>
    <div class="faq-answer">
      <p>That&rsquo;s not RetroGate &mdash; that&rsquo;s the Internet Archive. It serves <em>billions</em>
        of archived pages from a non-profit&rsquo;s server room. It&rsquo;s doing its best with the digital
        equivalent of duct tape and idealism.</p>
      <p>RetroGate helps by caching Wayback responses locally (archived content is immutable, so this is safe)
        and by prefetching images in parallel. After the first load, subsequent visits should be nearly instant.</p>
      <p>Consider <a href="https://archive.org/donate" target="_blank">donating to the Internet Archive</a>.
        They&rsquo;re literally preserving human knowledge. That&rsquo;s worth a few bucks.</p>
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-question">Some pages have images from the wrong year. What gives?</button>
    <div class="faq-answer">
      <p>RetroGate has &ldquo;temporal consistency&rdquo; built in &mdash; when a page loads from a specific snapshot date,
        all sub-resources (images, CSS) are fetched from that same date. But sometimes the Internet Archive
        simply didn&rsquo;t crawl a particular image on that date, and the closest match is from a different year.</p>
      <p>The Wayback Timeline tab (Monitor &rarr; Wayback Timeline) shows you the actual delta between your
        target date and each fetched resource. Green means exact match, gold means close, red means the Archive
        is doing its best with limited data. We live in an imperfect world, and so does time travel.</p>
    </div>
  </div>

  <!-- SheepShaver -->
  <h2 style="margin-top: 2.5rem; margin-bottom: 1.5rem; border-left: 5px solid var(--amber); padding-left: 1rem;">SheepShaver &amp; Emulators</h2>

  <div class="faq-item">
    <button class="faq-question">SheepShaver keeps losing network connectivity. Help!</button>
    <div class="faq-answer">
      <p>SheepShaver&rsquo;s slirp networking is, shall we say, <em>temperamental</em>. If browsing
        suddenly stops working, restart SheepShaver. This is not a RetroGate bug.
        This is a SheepShaver feature.</p>
      <p>(It&rsquo;s a bug. It&rsquo;s definitely a bug. But calling it a feature makes everyone feel better.)</p>
      <p>Your host machine is reachable at <code>10.0.2.2</code> from inside the VM.
        Configure this as your HTTP proxy address with port 8080.</p>
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-question">Why do Java applets crash?</button>
    <div class="faq-answer">
      <p>RetroGate strips <code>&lt;applet&gt;</code> tags because they crash SheepShaver&rsquo;s
        MRJ (Mac OS Runtime for Java). This is a known SheepShaver issue, not a RetroGate issue.</p>
      <p>QuickTime embeds (<code>&lt;embed&gt;</code> and <code>&lt;object&gt;</code>) are preserved because
        QuickTime is eternal and beautiful and works perfectly in SheepShaver. Unlike Java. Because Java.</p>
    </div>
  </div>

  <!-- Philosophy -->
  <h2 style="margin-top: 2.5rem; margin-bottom: 1.5rem; border-left: 5px solid var(--amber); padding-left: 1rem;">Philosophy</h2>

  <div class="faq-item">
    <button class="faq-question">Isn't this just nostalgia?</button>
    <div class="faq-answer">
      <p>No. This is <em>infrastructure</em>.</p>
      <p>Nostalgia is looking at pictures of old Macs on Instagram (on your iPhone). RetroGate is actually
        <em>using</em> those old Macs to access the modern internet. There&rsquo;s a difference between
        &ldquo;remember when things were simpler&rdquo; and &ldquo;I have made things simpler again with
        a 3000-line Swift proxy server.&rdquo;</p>
      <p>Also, if nostalgia is wrong, explain why you still have a box of SCSI cables in your closet.
        Exactly.</p>
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-question">Why would anyone actually use this?</button>
    <div class="faq-answer">
      <p>Because a Macintosh Plus deserves to browse Wikipedia. Because a PowerBook 520 shouldn&rsquo;t
        cry in a landfill just because the web moved on. Because Mac OS 9 &mdash; the last truly great
        Classic Mac OS, fight me &mdash; should be able to reach the entire World Wide Web.</p>
      <p>But also: because it&rsquo;s fun. Because seeing a modern website rendered in HTML 3.2 on a CRT
        is genuinely delightful. Because the internet was better when pages were 12 KB and loaded instantly
        and didn&rsquo;t need consent banners for 47 different tracking cookies.</p>
      <p>Because some of us remember when the web was <em>fun</em>, and we want it back.</p>
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-question">Can I contribute to RetroGate?</button>
    <div class="faq-answer">
      <p>Absolutely! RetroGate is open source under the MIT license. The code is on
        <a href="https://github.com/brunoscheufler/retrogate" target="_blank">GitHub</a>.
        We welcome pull requests, bug reports, feature suggestions, and strongly-worded opinions
        about whether Mac OS 8 or Mac OS 9 was better.</p>
      <p>(It was Mac OS 9. This is not up for debate. The FAQ has spoken.)</p>
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-question">What's on the roadmap?</button>
    <div class="faq-answer">
      <p>So many things:</p>
      <ul style="margin: 1rem 0 1rem 2rem;">
        <li>DNS interception mode &mdash; no proxy config needed</li>
        <li>Settings page accessible from the vintage browser itself</li>
        <li>FTP-to-HTTP bridge for classic Mac FTP clients like Fetch</li>
        <li>Protoweb integration for hand-restored vintage sites</li>
        <li>Server-side rendering with ISMAP as nuclear fallback</li>
        <li>Multi-protocol suite (IRC, NNTP, AIM revival)</li>
        <li>Site-specific gateways for Wikipedia, Reddit, search engines</li>
        <li>Video transcoding pipeline (yt-dlp + ffmpeg &rarr; QuickTime)</li>
        <li>Configurable rule engine with regex find/replace</li>
      </ul>
      <p>We have more ideas than any reasonable person should. Send help. Or pull requests. Preferably both.</p>
    </div>
  </div>

  <!-- Divider -->
  <div style="text-align: center; margin: 3rem 0; font-family: var(--font-pixel); color: var(--amber);">
    &#x2605; &#x2605; &#x2605;
  </div>

  <p style="text-align: center; font-style: italic; color: #888;">
    Got a question we haven&rsquo;t answered? <a href="/contact.php">Send us a message</a>.
    We promise to read it on a vintage Mac for authenticity.
  </p>

</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
