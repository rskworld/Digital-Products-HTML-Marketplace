<?php
  /*
  Support / Licensing / Custom Dev: help@rskworld.in
  Phone/WhatsApp: +91 9330539277
  Website: rskworld.in
  Business Inquiries: help@rskworld.in
  🤝 Suggestions and improvements are welcome!
  */
  $pageTitle = 'Contact';
  include __DIR__ . '/includes/header.php';
?>
<main class="container my-4">
  <div class="row g-4">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h1 class="h5">Contact Us</h1>
          <p class="text-muted">For support, licensing, or custom development inquiries:</p>
          <ul class="list-unstyled">
            <li><strong>Support / Licensing / Custom Dev:</strong> <a href="mailto:<?php echo h($template['contact']['support_email']); ?>"><?php echo h($template['contact']['support_email']); ?></a></li>
            <li><strong>Phone/WhatsApp:</strong> <?php echo h($template['contact']['phone_whatsapp']); ?></li>
            <li><strong>Website:</strong> <a href="<?php echo h($template['contact']['website_url']); ?>" target="_blank" rel="noopener"><?php echo h($template['contact']['website_name']); ?></a></li>
            <li><strong>Business Inquiries:</strong> <a href="mailto:<?php echo h($template['contact']['business_email']); ?>"><?php echo h($template['contact']['business_email']); ?></a></li>
          </ul>
          <p>🤝 <?php echo h($template['contributing']); ?></p>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h2 class="h6">Send a Message</h2>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Name</label>
              <input class="form-control" type="text" placeholder="Your name" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input class="form-control" type="email" placeholder="you@example.com" />
            </div>
            <div class="col-12">
              <label class="form-label">Message</label>
              <textarea class="form-control" rows="4" placeholder="How can we help?"></textarea>
            </div>
            <div class="col-12 d-grid">
              <button class="btn btn-primary" type="button">Send</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>


