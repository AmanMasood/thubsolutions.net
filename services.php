<?php
require_once __DIR__ . '/includes/config.php';
$active = 'services';
$page_title = 'Services';
$page_desc = 'Custom software development, web and mobile apps, cloud and DevOps, and AI automation from THub Solutions.';
$canonical_path = '/services';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="wrap">
    <h1>Services</h1>
    <p class="lead">Four ways we help businesses get more out of technology. Pick one, or combine them. Every project starts with a free call and a fixed quote.</p>
  </div>
</section>

<section class="section section-tight">
  <div class="wrap">
    <?php foreach ($SERVICES as $slug => $svc): ?>
      <article class="service-overview">
        <div>
          <h2><a href="/services/<?= e($slug) ?>"><?= e($svc['name']) ?></a></h2>
          <p><?= e($svc['intro']) ?></p>
          <a class="btn btn-ghost" href="/services/<?= e($slug) ?>">See <?= e(strtolower($svc['name'])) ?></a>
        </div>
        <ul class="check-list">
          <?php foreach (array_slice($svc['builds'], 0, 4) as $item): ?>
            <li><?= e($item) ?></li>
          <?php endforeach; ?>
        </ul>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
