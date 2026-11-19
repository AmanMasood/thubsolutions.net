<?php
require_once __DIR__ . '/includes/config.php';
$active = 'home';
$canonical_path = '/';
require __DIR__ . '/includes/header.php';

$hubNodes = [
    'custom-software' => ['label' => 'Custom software',   'x' => 8,   'y' => 40,  'trace' => 'M240 200 L180 140 H115 V96'],
    'web-mobile-apps' => ['label' => 'Web & mobile apps', 'x' => 307, 'y' => 40,  'trace' => 'M280 200 L340 140 H405 V96'],
    'cloud-devops'    => ['label' => 'Cloud & DevOps',    'x' => 8,   'y' => 344, 'trace' => 'M240 240 L180 300 H115 V344'],
    'ai-automation'   => ['label' => 'AI & automation',   'x' => 307, 'y' => 344, 'trace' => 'M280 240 L340 300 H405 V344'],
];
?>

<section class="hero">
  <div class="wrap hero-grid">
    <div class="hero-copy">
      <h1>One tech hub for the software your business runs on.</h1>
      <p class="lead">THub Solutions designs and builds custom software, web and mobile apps, cloud infrastructure and AI automation for growing US businesses. You get one team, one plan and one number to call.</p>
      <div class="hero-actions">
        <a class="btn btn-primary" href="/contact">Get a free quote</a>
        <a class="btn btn-ghost" href="tel:<?= e(PHONE_TEL) ?>">Call <?= e(PHONE_DISPLAY) ?></a>
      </div>
    </div>

    <div class="hero-hub">
      <svg class="hub" viewBox="0 0 520 440" role="img" aria-labelledby="hub-title">
        <title id="hub-title">THub Solutions connects four services: custom software, web and mobile apps, cloud and DevOps, and AI and automation.</title>
        <defs>
          <pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse">
            <circle cx="2" cy="2" r="1.2" class="hub-dot"/>
          </pattern>
        </defs>
        <rect width="520" height="440" fill="url(#dots)"/>

        <?php foreach ($hubNodes as $n): ?>
          <path class="hub-trace" d="<?= $n['trace'] ?>" pathLength="1"/>
        <?php endforeach; ?>

        <g class="hub-core">
          <circle cx="260" cy="220" r="66" class="hub-core-ring"/>
          <circle cx="260" cy="220" r="54" class="hub-core-fill"/>
          <text x="260" y="230" text-anchor="middle" class="hub-core-text">THub</text>
        </g>

        <?php $i = 0; foreach ($hubNodes as $slug => $n): $i++; ?>
          <a href="/services/<?= e($slug) ?>" class="hub-node" style="--i:<?= $i ?>">
            <rect x="<?= $n['x'] ?>" y="<?= $n['y'] ?>" width="205" height="56" rx="10"/>
            <circle cx="<?= $n['x'] + 24 ?>" cy="<?= $n['y'] + 28 ?>" r="5" class="hub-led"/>
            <text x="<?= $n['x'] + 40 ?>" y="<?= $n['y'] + 34 ?>"><?= e($n['label']) ?></text>
          </a>
        <?php endforeach; ?>
      </svg>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head">
      <h2>Four services, one team</h2>
      <p>Most projects touch more than one of these. Because the same team handles all four, your app, your cloud setup and your automations are built to work together from day one.</p>
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

<section class="section section-ink">
  <div class="wrap">
    <div class="section-head">
      <h2>How a project runs</h2>
      <p>No long contracts before you've seen progress. You see working software every two weeks.</p>
    </div>
    <ol class="steps">
      <li>
        <h3>Discovery call</h3>
        <p>A free 30-minute call to understand your goals, your current tools and what success looks like.</p>
      </li>
      <li>
        <h3>Scope and quote</h3>
        <p>Within a few days you get a written plan with features, timeline and a fixed price for the first phase.</p>
      </li>
      <li>
        <h3>Build in short cycles</h3>
        <p>We build in two-week cycles and demo working software at the end of each one, so you can steer as we go.</p>
      </li>
      <li>
        <h3>Launch and support</h3>
        <p>We launch, train your team and stay on for fixes, updates and new features through a monthly support plan.</p>
      </li>
    </ol>
  </div>
</section>

<section class="section">
  <div class="wrap why-grid">
    <div class="section-head">
      <h2>Why businesses work with THub</h2>
      <p>We keep things simple: clear prices, plain language and a team that answers the phone.</p>
    </div>
    <dl class="why-list">
      <div>
        <dt>Fixed quotes before work starts</dt>
        <dd>You know the cost of each phase up front. If scope changes, we agree on it in writing first.</dd>
      </div>
      <div>
        <dt>You own everything we build</dt>
        <dd>Source code, designs, cloud accounts and data are yours. No lock-in, no licensing traps.</dd>
      </div>
      <div>
        <dt>One point of contact</dt>
        <dd>A dedicated project lead keeps you updated and is reachable by phone and email during US business hours.</dd>
      </div>
      <div>
        <dt>Support that continues after launch</dt>
        <dd>Monitoring, security updates and improvements, so your software keeps working as your business grows.</dd>
      </div>
    </dl>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
