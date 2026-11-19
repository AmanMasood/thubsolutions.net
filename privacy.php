<?php
require_once __DIR__ . '/includes/config.php';
$page_title = 'Privacy policy';
$page_desc = 'How THub Solutions collects, uses and protects your information.';
$canonical_path = '/privacy';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="wrap narrow">
    <h1>Privacy policy</h1>
    <p class="lead">Last updated <?= e(date('F j, Y', filemtime(__FILE__))) ?></p>
  </div>
</section>

<section class="section section-tight">
  <div class="wrap narrow prose">
    <p>This policy explains what information <?= e(SITE_NAME) ?> ("we", "us") collects when you use thubsolutions.net or contact us, and how we use it.</p>

    <h2>Information we collect</h2>
    <p>When you fill in our contact form or email or call us, we collect the details you give us: your name, email address, phone number, company name and the content of your message.</p>
    <p>Like most websites, our hosting provider automatically records basic technical information such as your IP address, browser type and the pages you visit. We use this only to keep the site secure and working.</p>

    <h2>How we use your information</h2>
    <ul>
      <li>To reply to your enquiry and discuss your project</li>
      <li>To prepare quotes, proposals and contracts</li>
      <li>To deliver and support services you have hired us for</li>
      <li>To protect our website from spam and abuse</li>
    </ul>
    <p>We do not sell, rent or trade your personal information. We do not send marketing emails unless you ask us to.</p>

    <h2>Cookies</h2>
    <p>Our website uses a single session cookie so the contact form can protect against spam. It is deleted when you close your browser. We do not use advertising or tracking cookies.</p>

    <h2>Who we share information with</h2>
    <p>We share information only with service providers that help us run our business, such as our web host and email provider, and only as needed for them to provide that service. We may also disclose information if required by law.</p>

    <h2>How long we keep it</h2>
    <p>We keep enquiry details for as long as needed to respond and for our business records, and delete them when they are no longer needed.</p>

    <h2>Your choices</h2>
    <p>You can ask us to show you, correct or delete the personal information we hold about you. California residents have additional rights under the California Consumer Privacy Act (CCPA), including the right to know what information we collect and to request its deletion. To make a request, email <a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a>.</p>

    <h2>Children</h2>
    <p>Our website and services are intended for businesses and are not directed at children under 13. We do not knowingly collect information from children.</p>

    <h2>Changes to this policy</h2>
    <p>We may update this policy from time to time. The date at the top of this page shows when it was last changed.</p>

    <h2>Contact</h2>
    <p>Questions about this policy? Email <a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a> or call <a href="tel:<?= e(PHONE_TEL) ?>"><?= e(PHONE_DISPLAY) ?></a>.</p>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
