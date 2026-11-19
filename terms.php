<?php
require_once __DIR__ . '/includes/config.php';
$page_title = 'Terms of service';
$page_desc = 'Terms for using the THub Solutions website.';
$canonical_path = '/terms';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="wrap narrow">
    <h1>Terms of service</h1>
    <p class="lead">Last updated <?= e(date('F j, Y', filemtime(__FILE__))) ?></p>
  </div>
</section>

<section class="section section-tight">
  <div class="wrap narrow prose">
    <p>These terms apply to your use of thubsolutions.net. By using this website you agree to them. If you don't agree, please don't use the site.</p>

    <h2>Website content</h2>
    <p>The content on this website is for general information about our services. It is not a binding offer. Prices, timelines and deliverables for any project are set out in a written proposal or agreement signed by both parties.</p>

    <h2>Project agreements</h2>
    <p>Work we carry out for clients is governed by a separate written agreement. If anything in that agreement conflicts with these terms, the agreement applies.</p>

    <h2>Intellectual property</h2>
    <p>The design, text, graphics and logo on this website belong to <?= e(SITE_NAME) ?> and may not be copied or reused without our written permission. Ownership of work created for clients is defined in each client agreement.</p>

    <h2>Acceptable use</h2>
    <p>You agree not to misuse this website, including by attempting to gain unauthorized access, sending spam through our forms, or interfering with how the site works.</p>

    <h2>Links to other websites</h2>
    <p>This website may link to sites run by others. We are not responsible for their content or privacy practices.</p>

    <h2>Disclaimer and limitation of liability</h2>
    <p>This website is provided "as is". We work to keep it accurate and available but make no guarantees that it will always be error-free or uninterrupted. To the extent permitted by law, we are not liable for any loss arising from your use of the website.</p>

    <h2>Governing law</h2>
    <p>These terms are governed by the laws of the State of California, United States.</p>

    <h2>Contact</h2>
    <p>Questions about these terms? Email <a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a> or call <a href="tel:<?= e(PHONE_TEL) ?>"><?= e(PHONE_DISPLAY) ?></a>.</p>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
