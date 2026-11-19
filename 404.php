<?php
require_once __DIR__ . '/includes/config.php';
if (!headers_sent()) {
    http_response_code(404);
}
$page_title = 'Page not found';
$page_desc = 'The page you were looking for does not exist.';
$canonical_path = '/';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero page-hero-tall">
  <div class="wrap narrow">
    <h1>This page doesn't exist</h1>
    <p class="lead">The link may be out of date or the address mistyped. Try one of these instead.</p>
    <div class="hero-actions">
      <a class="btn btn-primary" href="/">Go to the home page</a>
      <a class="btn btn-ghost" href="/services">See our services</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
