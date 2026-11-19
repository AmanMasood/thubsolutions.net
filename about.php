<?php
require_once __DIR__ . '/includes/config.php';
$active = 'about';
$page_title = 'About us';
$page_desc = 'THub Solutions is a technology services company helping US businesses build software, apps, cloud infrastructure and AI automation.';
$canonical_path = '/about';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="wrap">
    <h1>A tech hub for businesses that don't have one</h1>
    <p class="lead">Most growing businesses don't need a full in-house engineering department. They need a dependable team that can build the right thing, keep it running and explain it in plain English. That's what THub Solutions is for.</p>
  </div>
</section>

<section class="section section-tight">
  <div class="wrap two-col">
    <div>
      <h2>What we do</h2>
      <p>We bring software development, app design, cloud engineering and AI automation together under one roof. Instead of juggling separate freelancers and agencies, you work with one team that sees the whole picture, from the app your customers use to the servers it runs on and the automations behind it.</p>
      <p>We work with small and mid-sized businesses across the United States, in fields such as professional services, healthcare, retail, logistics and real estate.</p>
    </div>
    <div>
      <h2>How we work</h2>
      <dl class="outcome-list">
        <div>
          <dt>Plain language</dt>
          <dd>We explain options, costs and trade-offs without jargon, so you can make decisions with confidence.</dd>
        </div>
        <div>
          <dt>Small steps, visible progress</dt>
          <dd>We deliver in two-week cycles and show you working software at the end of each one.</dd>
        </div>
        <div>
          <dt>Built to last</dt>
          <dd>Clean, documented code and sensible infrastructure mean your software stays easy to change for years.</dd>
        </div>
        <div>
          <dt>Honest advice</dt>
          <dd>If an off-the-shelf tool will do the job better than custom work, we'll tell you.</dd>
        </div>
      </dl>
    </div>
  </div>
</section>

<section class="section section-ink section-tight">
  <div class="wrap">
    <div class="section-head">
      <h2>Our services</h2>
    </div>
    <ul class="service-rows">
      <?php foreach ($SERVICES as $slug => $svc): ?>
        <li class="service-row">
          <h3><a href="/services/<?= e($slug) ?>"><?= e($svc['name']) ?></a></h3>
          <p><?= e($svc['short']) ?></p>
          <a class="text-link" href="/services/<?= e($slug) ?>" aria-label="Learn more about <?= e($svc['name']) ?>">Learn more</a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
