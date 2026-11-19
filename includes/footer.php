</main>

<section class="call-band">
  <div class="wrap call-band-inner">
    <div>
      <h2>Tell us what you want to build.</h2>
      <p>A 30-minute call is free. You'll leave with a clear next step, whether or not we work together.</p>
    </div>
    <div class="call-band-actions">
      <a class="call-number" href="tel:<?= e(PHONE_TEL) ?>"><?= e(PHONE_DISPLAY) ?></a>
      <a class="btn btn-light" href="/contact">Send a message instead</a>
    </div>
  </div>
</section>

<footer class="site-footer">
  <div class="wrap footer-grid">
    <div class="footer-about">
      <a class="brand brand-footer" href="/">
        <svg class="brand-mark" viewBox="0 0 32 32" aria-hidden="true">
          <path d="M16 16 L5 5 M16 16 L27 5 M16 16 L5 27 M16 16 L27 27" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/>
          <circle cx="5" cy="5" r="3.2" fill="currentColor"/><circle cx="27" cy="5" r="3.2" fill="currentColor"/>
          <circle cx="5" cy="27" r="3.2" fill="currentColor"/><circle cx="27" cy="27" r="3.2" fill="currentColor"/>
          <circle cx="16" cy="16" r="6" fill="#ffb627" stroke="currentColor" stroke-width="2.4"/>
        </svg>
        <span class="brand-name">THub<span> Solutions</span></span>
      </a>
      <p><?= e(SITE_TAGLINE) ?>. Working with businesses across the United States.</p>
    </div>

    <div>
      <h3>Services</h3>
      <ul>
        <?php foreach ($SERVICES as $slug => $svc): ?>
          <li><a href="/services/<?= e($slug) ?>"><?= e($svc['name']) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div>
      <h3>Company</h3>
      <ul>
        <li><a href="/about">About us</a></li>
        <li><a href="/contact">Contact</a></li>
        <li><a href="/privacy">Privacy policy</a></li>
        <li><a href="/terms">Terms of service</a></li>
      </ul>
    </div>

    <div>
      <h3>Contact</h3>
      <ul class="footer-contact">
        <li><a href="tel:<?= e(PHONE_TEL) ?>"><?= e(PHONE_DISPLAY) ?></a></li>
        <li><a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a></li>
        <li><?= e(BUSINESS_HOURS) ?></li>
      </ul>
    </div>
  </div>
  <div class="wrap footer-base">
    <p>&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?>. All rights reserved.</p>
  </div>
</footer>

<script src="/assets/js/main.js?v=1" defer></script>
</body>
</html>
