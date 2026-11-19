<?php
require_once __DIR__ . '/includes/config.php';

$slug = isset($_GET['slug']) ? preg_replace('/[^a-z0-9-]/', '', strtolower($_GET['slug'])) : '';
if (!isset($SERVICES[$slug])) {
    http_response_code(404);
    require __DIR__ . '/404.php';
    exit;
}

$svc = $SERVICES[$slug];
$active = 'services';
$page_title = $svc['name'];
$page_desc = $svc['short'];
$canonical_path = '/services/' . $slug;
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="wrap">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/services">Services</a> <span aria-hidden="true">/</span> <span aria-current="page"><?= e($svc['name']) ?></span>
    </nav>
    <h1><?= e($svc['title']) ?></h1>
    <p class="lead"><?= e($svc['intro']) ?></p>
    <div class="hero-actions">
      <a class="btn btn-primary" href="/contact?service=<?= e($slug) ?>">Get a quote for this</a>
      <a class="btn btn-ghost" href="tel:<?= e(PHONE_TEL) ?>">Call <?= e(PHONE_DISPLAY) ?></a>
    </div>
  </div>
</section>

<section class="section section-tight">
  <div class="wrap two-col">
    <div>
      <h2>What we build</h2>
      <ul class="check-list">
        <?php foreach ($svc['builds'] as $item): ?>
          <li><?= e($item) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div>
      <h2>What changes for your business</h2>
      <dl class="outcome-list">
        <?php foreach ($svc['outcomes'] as [$head, $body]): ?>
          <div>
            <dt><?= e($head) ?></dt>
            <dd><?= e($body) ?></dd>
          </div>
        <?php endforeach; ?>
      </dl>
    </div>
  </div>
</section>

<section class="section section-ink section-tight">
  <div class="wrap">
    <h2>Technologies we use</h2>
    <ul class="tag-list">
      <?php foreach ($svc['stack'] as $tech): ?>
        <li><?= e($tech) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<section class="section">
  <div class="wrap narrow">
    <h2>Common questions</h2>
    <div class="faq">
      <?php foreach ($svc['faqs'] as [$q, $a]): ?>
        <details>
          <summary><?= e($q) ?></summary>
          <p><?= e($a) ?></p>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-tight">
  <div class="wrap">
    <h2 class="h3">Other services</h2>
    <ul class="service-rows service-rows-compact">
      <?php foreach ($SERVICES as $otherSlug => $other): if ($otherSlug === $slug) continue; ?>
        <li class="service-row">
          <h3><a href="/services/<?= e($otherSlug) ?>"><?= e($other['name']) ?></a></h3>
          <p><?= e($other['short']) ?></p>
          <a class="text-link" href="/services/<?= e($otherSlug) ?>" aria-label="Learn more about <?= e($other['name']) ?>">Learn more</a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
