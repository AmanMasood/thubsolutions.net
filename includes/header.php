<?php
require_once __DIR__ . '/config.php';

$page_title = isset($page_title) ? $page_title . ' | ' . SITE_NAME : SITE_NAME . ' — ' . SITE_TAGLINE;
$page_desc  = $page_desc ?? 'THub Solutions builds custom software, web and mobile apps, cloud infrastructure and AI automation for businesses across the United States. Call ' . PHONE_DISPLAY . '.';
$active     = $active ?? '';
$canonical  = SITE_URL . ($canonical_path ?? '/');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($page_title) ?></title>
<meta name="description" content="<?= e($page_desc) ?>">
<link rel="canonical" href="<?= e($canonical) ?>">
<meta property="og:type" content="website">
<meta property="og:title" content="<?= e($page_title) ?>">
<meta property="og:description" content="<?= e($page_desc) ?>">
<meta property="og:url" content="<?= e($canonical) ?>">
<meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
<meta name="theme-color" content="#16224a">
<link rel="icon" href="/assets/img/favicon.svg" type="image/svg+xml">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700;12..96,800&family=IBM+Plex+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/style.css?v=1">
<script type="application/ld+json">
<?= json_encode([
    '@context'  => 'https://schema.org',
    '@type'     => 'Organization',
    'name'      => SITE_NAME,
    'url'       => SITE_URL,
    'telephone' => PHONE_TEL,
    'email'     => CONTACT_EMAIL,
    'areaServed'=> 'US',
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
</script>
</head>
<body>
<a class="skip-link" href="#main">Skip to content</a>

<header class="site-header">
  <div class="wrap header-inner">
    <a class="brand" href="/" aria-label="THub Solutions home">
      <svg class="brand-mark" viewBox="0 0 32 32" aria-hidden="true">
        <path d="M16 16 L5 5 M16 16 L27 5 M16 16 L5 27 M16 16 L27 27" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/>
        <circle cx="5" cy="5" r="3.2" fill="currentColor"/><circle cx="27" cy="5" r="3.2" fill="currentColor"/>
        <circle cx="5" cy="27" r="3.2" fill="currentColor"/><circle cx="27" cy="27" r="3.2" fill="currentColor"/>
        <circle cx="16" cy="16" r="6" fill="#ffb627" stroke="currentColor" stroke-width="2.4"/>
      </svg>
      <span class="brand-name">THub<span> Solutions</span></span>
    </a>

    <button class="nav-toggle" aria-expanded="false" aria-controls="site-nav">
      <span class="nav-toggle-bar"></span><span class="visually-hidden">Menu</span>
    </button>

    <nav id="site-nav" class="site-nav" aria-label="Main">
      <ul>
        <li><a href="/services" <?= $active === 'services' ? 'aria-current="page"' : '' ?>>Services</a></li>
        <li><a href="/about" <?= $active === 'about' ? 'aria-current="page"' : '' ?>>About</a></li>
        <li><a href="/contact" <?= $active === 'contact' ? 'aria-current="page"' : '' ?>>Contact</a></li>
      </ul>
      <a class="header-phone" href="tel:<?= e(PHONE_TEL) ?>"><?= e(PHONE_DISPLAY) ?></a>
      <a class="btn btn-primary btn-small" href="/contact">Get a free quote</a>
    </nav>
  </div>
</header>

<main id="main">
