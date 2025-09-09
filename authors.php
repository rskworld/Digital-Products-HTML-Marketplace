<?php
  /*
  Support / Licensing / Custom Dev: help@rskworld.in
  Phone/WhatsApp: +91 9330539277
  Website: rskworld.in
  Business Inquiries: help@rskworld.in
  🤝 Suggestions and improvements are welcome!
  */
  $pageTitle = 'Authors';
  include __DIR__ . '/includes/header.php';
?>
<main class="container my-4">
  <h1 class="h3 mb-4">Authors & Creators</h1>
  <div class="row g-3">
    <?php for ($i = 1; $i <= 8; $i++): ?>
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="card h-100">
          <div class="card-body d-flex align-items-center">
            <img class="rounded-circle me-3" src="https://i.pravatar.cc/64?img=<?php echo $i; ?>" alt="Author" width="48" height="48" />
            <div>
              <div class="fw-semibold">Creator <?php echo $i; ?></div>
              <div class="text-muted small">250+ sales • 4.8 rating</div>
            </div>
          </div>
        </div>
      </div>
    <?php endfor; ?>
  </div>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>


