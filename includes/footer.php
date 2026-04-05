<!-- Footer -->
<footer class="site-footer">
  <div class="footer-inner">
    <div class="footer-grid">
      <div class="footer-brand">
        <span class="logo-text">RETROGATE</span>
        <p>Made with love, SwiftNIO, and an irrational attachment to beige plastic.</p>
        <p style="margin-top: 0.5rem;">If your computer was manufactured before the Euro existed, we've got you covered.</p>
      </div>
      <div class="footer-links">
        <h4>Navigate</h4>
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/manual.php">Manual</a></li>
          <li><a href="/faq.php">FAQ</a></li>
          <li><a href="/download.php">Download</a></li>
          <li><a href="/contact.php">Contact</a></li>
        </ul>
      </div>
      <div class="footer-links">
        <h4>Resources</h4>
        <ul>
          <li><a href="https://github.com/Simplinity/retrogate" target="_blank">GitHub</a></li>
          <li><a href="https://68kmla.org" target="_blank">68kMLA Forum</a></li>
          <li><a href="https://macintoshgarden.org" target="_blank">Macintosh Garden</a></li>
          <li><a href="https://web.archive.org" target="_blank">Wayback Machine</a></li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <p>&copy; <?= date('Y') ?> Bruno van Branden (Simplinity) &mdash; MIT License</p>
      <div class="visitor-counter">
        VISITORS: <?= str_pad(rand(13337, 99999), 5, '0', STR_PAD_LEFT) ?>
      </div>
    </div>
  </div>
</footer>

<!-- JavaScript -->
<script src="/assets/js/main.js"></script>
</body>
</html>
