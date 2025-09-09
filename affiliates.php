<?php
  /*
  Support / Licensing / Custom Dev: help@rskworld.in
  Phone/WhatsApp: +91 9330539277
  Website: rskworld.in
  Business Inquiries: help@rskworld.in
  🤝 Suggestions and improvements are welcome!
  */
  $pageTitle = 'Affiliates';
  include __DIR__ . '/includes/header.php';
?>
<main class="container my-4">
  <h1 class="h3 mb-4">Affiliate Marketing Tools</h1>
  <div class="row g-4">
    <div class="col-lg-6">
      <div class="card h-100">
        <div class="card-body">
          <h2 class="h6">Referral Links</h2>
          <p class="text-muted">Share your unique referral link and earn commissions.</p>
          <div class="input-group">
            <input type="text" class="form-control" value="https://example.com/?ref=YOURCODE" readonly>
            <button class="btn btn-outline-secondary" type="button">Copy</button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card h-100">
        <div class="card-body">
          <h2 class="h6">Banners & Assets</h2>
          <div class="d-flex flex-wrap gap-2">
            <img class="rounded border" src="https://via.placeholder.com/320x100?text=Banner+320x100" alt="Banner 320x100">
            <img class="rounded border" src="https://via.placeholder.com/468x60?text=Banner+468x60" alt="Banner 468x60">
            <img class="rounded border" src="https://via.placeholder.com/120x600?text=Skyscraper+120x600" alt="Banner 120x600">
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>


