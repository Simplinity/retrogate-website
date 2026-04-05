<?php
/**
 * RetroGate Website — Header Include
 * Because even time-traveling proxy servers need proper HTML headers.
 */

$site_title = $page_title ?? 'RetroGate';
$full_title = ($page_title ?? false) ? "$page_title — RetroGate" : 'RetroGate — Browse the Modern Web on Vintage Macs';
$meta_description = $page_description ?? 'RetroGate is a macOS proxy server that bridges the gap between classic Macintosh computers (1984–2005) and today\'s internet. Time travel for your beige plastic friends.';
$current_page = basename($_SERVER['PHP_SELF'], '.php');
$canonical_path = ($current_page === 'index') ? '/' : '/' . $current_page . '.php';
$canonical_url = 'https://retrogate.app' . $canonical_path;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= htmlspecialchars($meta_description) ?>">
  <meta name="keywords" content="RetroGate, vintage Mac, classic Macintosh, retro computing, proxy server, Wayback Machine, HTML 3.2, Mac OS 9, System 7, Netscape Navigator, old Mac internet, SheepShaver, iCab, Netscape Navigator, classic Mac OS">
  <meta name="author" content="Bruno van Branden">
  <link rel="canonical" href="<?= $canonical_url ?>">

  <!-- Open Graph -->
  <meta property="og:title" content="<?= htmlspecialchars($full_title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($meta_description) ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?= $canonical_url ?>">
  <meta property="og:image" content="https://retrogate.app/assets/img/appicon-256.png">
  <meta property="og:site_name" content="RetroGate">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="<?= htmlspecialchars($full_title) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($meta_description) ?>">
  <meta name="twitter:image" content="https://retrogate.app/assets/img/appicon-256.png">

  <title><?= htmlspecialchars($full_title) ?></title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="64x64" href="/assets/img/favicon-64.png?v=200">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32.png?v=200">
  <link rel="apple-touch-icon" href="/assets/img/appicon-128.png">

  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<!-- The marquee. Yes, we went there. -->
<div class="retro-marquee">
  <span>&#9733; WELCOME TO RETROGATE &#9733; Your portal to the vintage web &#9733; Now with 100% more beige &#9733; Web 1.0 forever &#9733; JavaScript is just a fad &#9733; Webmaster: hello@retrogate.app &#9733;</span>
</div>

<!-- Navigation -->
<nav class="site-nav">
  <div class="nav-inner">
    <a href="/" class="nav-logo">
      RETROGATE
    </a>

    <button class="nav-toggle" onclick="document.querySelector('.nav-links').classList.toggle('open')" aria-label="Toggle menu">&#9776;</button>

    <ul class="nav-links">
      <li><a href="/" class="<?= $current_page === 'index' ? 'active' : '' ?>">Home</a></li>
      <li><a href="/manual.php" class="<?= $current_page === 'manual' ? 'active' : '' ?>">Manual</a></li>
      <li><a href="/faq.php" class="<?= $current_page === 'faq' ? 'active' : '' ?>">FAQ</a></li>
      <li><a href="/download.php" class="<?= $current_page === 'download' ? 'active' : '' ?>">Download</a></li>
      <li><a href="/contact.php" class="<?= $current_page === 'contact' ? 'active' : '' ?>">Contact</a></li>
    </ul>
  </div>
</nav>
