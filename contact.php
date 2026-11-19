<?php
require_once __DIR__ . '/includes/config.php';
session_start();

if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

$budgets = ['Under $5,000', '$5,000 – $15,000', '$15,000 – $50,000', 'Over $50,000', 'Not sure yet'];
$errors = [];
$old = [
    'name' => '', 'email' => '', 'phone' => '', 'company' => '',
    'service' => isset($_GET['service']) && isset($SERVICES[$_GET['service']]) ? $_GET['service'] : '',
    'budget' => '', 'message' => '',
];
$sent = isset($_GET['sent']);
$mailFailed = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($old as $key => $_) {
        $old[$key] = trim((string) ($_POST[$key] ?? ''));
    }

    $isBot = !empty($_POST['website'])                                     // honeypot field
        || (time() - (int) ($_POST['ts'] ?? 0)) < 3;                     // submitted too fast
    $tokenOk = hash_equals($_SESSION['csrf'], (string) ($_POST['csrf'] ?? ''));

    if (!$tokenOk) {
        $errors['form'] = 'Your session expired. Please submit the form again.';
    }
    if ($old['name'] === '' || mb_strlen($old['name']) > 100) {
        $errors['name'] = 'Enter your name.';
    }
    if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Enter a valid email address, like name@company.com.';
    }
    if ($old['phone'] !== '' && !preg_match('/^[0-9+().\-\s]{7,25}$/', $old['phone'])) {
        $errors['phone'] = 'Enter a valid phone number, or leave this blank.';
    }
    if ($old['service'] !== '' && $old['service'] !== 'other' && !isset($SERVICES[$old['service']])) {
        $old['service'] = '';
    }
    if ($old['budget'] !== '' && !in_array($old['budget'], $budgets, true)) {
        $old['budget'] = '';
    }
    if (mb_strlen($old['message']) < 10) {
        $errors['message'] = 'Tell us a little about your project (at least 10 characters).';
    } elseif (mb_strlen($old['message']) > 5000) {
        $errors['message'] = 'Keep your message under 5,000 characters.';
    }

    // Simple per-session rate limit: one message per 60 seconds.
    if (!$errors && !empty($_SESSION['last_sent']) && time() - $_SESSION['last_sent'] < 60) {
        $errors['form'] = 'You just sent a message. Wait a minute before sending another.';
    }

    if (!$errors) {
        if ($isBot) {
            // Pretend success so bots don't retry.
            header('Location: /contact?sent=1', true, 303);
            exit;
        }

        $serviceName = $old['service'] === 'other' ? 'Something else'
            : ($old['service'] !== '' ? $SERVICES[$old['service']]['name'] : 'Not specified');
        $clean = fn($v) => str_replace(["\r", "\n"], ' ', $v);

        $body  = "New enquiry from thubsolutions.net\n\n";
        $body .= "Name:    {$clean($old['name'])}\n";
        $body .= "Email:   {$clean($old['email'])}\n";
        $body .= "Phone:   " . ($old['phone'] ?: '—') . "\n";
        $body .= "Company: " . ($old['company'] !== '' ? $clean($old['company']) : '—') . "\n";
        $body .= "Service: {$serviceName}\n";
        $body .= "Budget:  " . ($old['budget'] ?: 'Not specified') . "\n\n";
        $body .= "Message:\n{$old['message']}\n\n";
        $body .= "Sent " . date('Y-m-d H:i T') . " from IP " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown') . "\n";

        $subject = 'Website enquiry: ' . $serviceName . ' — ' . $clean($old['name']);
        $headers = [
            'From: ' . SITE_NAME . ' Website <' . MAIL_FROM . '>',
            'Reply-To: ' . $clean($old['name']) . ' <' . $clean($old['email']) . '>',
            'Content-Type: text/plain; charset=UTF-8',
            'X-Mailer: PHP/' . phpversion(),
        ];

        $ok = @mail(CONTACT_EMAIL, '=?UTF-8?B?' . base64_encode($subject) . '?=', $body, implode("\r\n", $headers), '-f' . MAIL_FROM);

        // Keep a backup copy of every enquiry outside the web root if possible.
        $logDir = dirname(__DIR__) . '/thub-enquiries';
        if (!is_dir($logDir)) {
            @mkdir($logDir, 0750, true);
        }
        if (is_dir($logDir) && is_writable($logDir)) {
            @file_put_contents($logDir . '/enquiries.log', str_repeat('=', 60) . "\n" . $body, FILE_APPEND | LOCK_EX);
        }

        if ($ok) {
            $_SESSION['last_sent'] = time();
            $_SESSION['csrf'] = bin2hex(random_bytes(32));
            header('Location: /contact?sent=1', true, 303);
            exit;
        }
        $mailFailed = true;
    }
}

$active = 'contact';
$page_title = 'Contact us';
$page_desc = 'Get a free quote from THub Solutions. Call ' . PHONE_DISPLAY . ' or send us a message about your software, app, cloud or AI project.';
$canonical_path = '/contact';
require __DIR__ . '/includes/header.php';

$fieldError = function (string $field) use ($errors) {
    return isset($errors[$field])
        ? '<p class="field-error" id="' . $field . '-error">' . e($errors[$field]) . '</p>'
        : '';
};
$describedBy = fn(string $field) => isset($errors[$field]) ? ' aria-invalid="true" aria-describedby="' . $field . '-error"' : '';
?>

<section class="page-hero">
  <div class="wrap">
    <h1>Let's talk about your project</h1>
    <p class="lead">Call us or send a message. We reply to every enquiry within one business day with next steps and, where possible, a rough estimate.</p>
  </div>
</section>

<section class="section section-tight">
  <div class="wrap contact-grid">
    <aside class="contact-details">
      <h2 class="h3">Call us</h2>
      <a class="contact-phone" href="tel:<?= e(PHONE_TEL) ?>"><?= e(PHONE_DISPLAY) ?></a>
      <p><?= e(BUSINESS_HOURS) ?></p>

      <h2 class="h3">Email us</h2>
      <p><a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a></p>

      <h2 class="h3">What happens next</h2>
      <ol class="mini-steps">
        <li>We read your message and reply within one business day.</li>
        <li>We set up a free 30-minute call at a time that suits you.</li>
        <li>You receive a written plan and a fixed quote for the first phase.</li>
      </ol>
    </aside>

    <div class="contact-form-wrap">
      <?php if ($sent): ?>
        <div class="notice notice-success" role="status">
          <h2 class="h3">Message sent</h2>
          <p>Thanks for getting in touch. We'll reply within one business day. If it's urgent, call us on <a href="tel:<?= e(PHONE_TEL) ?>"><?= e(PHONE_DISPLAY) ?></a>.</p>
        </div>
      <?php else: ?>

        <?php if ($mailFailed): ?>
          <div class="notice notice-error" role="alert">
            <p>Your message couldn't be sent because of a problem with our mail server. Please email <a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a> or call <a href="tel:<?= e(PHONE_TEL) ?>"><?= e(PHONE_DISPLAY) ?></a>.</p>
          </div>
        <?php elseif (isset($errors['form'])): ?>
          <div class="notice notice-error" role="alert"><p><?= e($errors['form']) ?></p></div>
        <?php elseif ($errors): ?>
          <div class="notice notice-error" role="alert"><p>Some fields need attention. Check the highlighted fields below.</p></div>
        <?php endif; ?>

        <form class="contact-form" method="post" action="/contact" novalidate>
          <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">
          <input type="hidden" name="ts" value="<?= time() ?>">
          <div class="hp" aria-hidden="true">
            <label for="website">Leave this field empty</label>
            <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
          </div>

          <div class="field-row">
            <div class="field">
              <label for="name">Your name</label>
              <input type="text" id="name" name="name" required maxlength="100" autocomplete="name" value="<?= e($old['name']) ?>"<?= $describedBy('name') ?>>
              <?= $fieldError('name') ?>
            </div>
            <div class="field">
              <label for="company">Company <span class="optional">(optional)</span></label>
              <input type="text" id="company" name="company" maxlength="120" autocomplete="organization" value="<?= e($old['company']) ?>">
            </div>
          </div>

          <div class="field-row">
            <div class="field">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" required maxlength="150" autocomplete="email" value="<?= e($old['email']) ?>"<?= $describedBy('email') ?>>
              <?= $fieldError('email') ?>
            </div>
            <div class="field">
              <label for="phone">Phone <span class="optional">(optional)</span></label>
              <input type="tel" id="phone" name="phone" maxlength="25" autocomplete="tel" value="<?= e($old['phone']) ?>"<?= $describedBy('phone') ?>>
              <?= $fieldError('phone') ?>
            </div>
          </div>

          <div class="field-row">
            <div class="field">
              <label for="service">What do you need help with?</label>
              <select id="service" name="service">
                <option value="">Choose a service</option>
                <?php foreach ($SERVICES as $slug => $svc): ?>
                  <option value="<?= e($slug) ?>" <?= $old['service'] === $slug ? 'selected' : '' ?>><?= e($svc['name']) ?></option>
                <?php endforeach; ?>
                <option value="other" <?= $old['service'] === 'other' ? 'selected' : '' ?>>Something else</option>
              </select>
            </div>
            <div class="field">
              <label for="budget">Estimated budget <span class="optional">(optional)</span></label>
              <select id="budget" name="budget">
                <option value="">Choose a range</option>
                <?php foreach ($budgets as $b): ?>
                  <option value="<?= e($b) ?>" <?= $old['budget'] === $b ? 'selected' : '' ?>><?= e($b) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="field">
            <label for="message">Tell us about your project</label>
            <textarea id="message" name="message" rows="6" required maxlength="5000" placeholder="What are you trying to achieve, and is there a deadline?"<?= $describedBy('message') ?>><?= e($old['message']) ?></textarea>
            <?= $fieldError('message') ?>
          </div>

          <button type="submit" class="btn btn-primary">Send message</button>
          <p class="form-note">By sending this form you agree to our <a href="/privacy">privacy policy</a>. We never share your details.</p>
        </form>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
