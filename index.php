<?php
  /*
  Support / Licensing / Custom Dev: help@rskworld.in
  Phone/WhatsApp: +91 9330539277
  Website: rskworld.in
  Business Inquiries: help@rskworld.in
  🤝 Suggestions and improvements are welcome!
  */
  $pageTitle = 'Home';
  include __DIR__ . '/includes/header.php';
  $popular = filterSortProducts(['sort' => 'popular']);
  $popular = array_slice($popular, 0, 6);
?>

<main class="container my-4">
  <section class="p-4 p-md-5 hero mb-4 rounded-3 shadow-sm" data-aos="fade-up">
    <div class="row align-items-center">
      <div class="col-lg-7" data-aos="fade-right">
        <h1 class="display-5 fw-bold mb-3 tracking-tight"><?php echo h($template['title']); ?></h1>
        <p class="lead mb-4 text-slate-600"><?php echo h($template['description']); ?></p>
        <div class="d-flex gap-2 flex-wrap">
          <a class="btn btn-primary btn-lg" href="products.php">Browse Products</a>
          <a class="btn btn-outline-primary btn-lg" href="checkout.php">Start Selling</a>
        </div>
        <div class="mt-4" data-aos="fade-up" data-aos-delay="100">
          <?php foreach ($template['tags'] as $tag): ?>
            <span class="tag">#<?php echo h($tag); ?></span>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="col-lg-5 mt-4 mt-lg-0" data-aos="fade-left">
        <div class="ratio ratio-16x9 bg-white rounded border d-flex align-items-center justify-content-center shadow-sm">
          <img class="img-fluid p-3" src="assets/images/hero-illustration.svg" alt="Marketplace Illustration" onerror="this.onerror=null; this.src='https://via.placeholder.com/800x450.png?text=Digital+Products+Marketplace';" />
        </div>
      </div>
    </div>
  </section>

  <section class="mb-5" data-aos="fade-up" data-aos-delay="50">
    <div class="row g-3">
      <div class="col-lg-6">
        <div class="p-3 border rounded bg-white h-100">
          <h2 class="h5 mb-3">Features</h2>
          <ul class="feature-list ps-4 mb-0">
            <?php foreach ($template['features'] as $feature): ?>
              <li class="mb-2"><?php echo h($feature); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="p-3 border rounded bg-white h-100">
          <h2 class="h5 mb-3">Trusted by creators</h2>
          <div class="d-flex flex-column gap-3">
            <div class="d-flex align-items-start">
              <span class="badge bg-success me-2">4.9★</span>
              <div><strong>“Slick and easy to customize.”</strong><div class="text-muted small">— Alex</div></div>
            </div>
            <div class="d-flex align-items-start">
              <span class="badge bg-success me-2">4.8★</span>
              <div><strong>“Perfect for my course sales.”</strong><div class="text-muted small">— Priya</div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="mb-5" data-aos="fade-up">
    <div class="d-flex align-items-center justify-content-between mb-3">
      <h2 class="h4 m-0">Popular Digital Products</h2>
      <a class="btn btn-sm btn-outline-secondary" href="products.php">View all</a>
    </div>
    <div class="row g-3" data-aos="fade-up" data-aos-delay="100">
      <?php foreach ($popular as $i => $p): ?>
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="card h-100 card-product hover:shadow transition-shadow" data-aos="zoom-in" data-aos-delay="<?php echo ($i+1) * 50; ?>">
            <div class="ratio ratio-16x9 bg-light">
              <img class="object-fit-cover" src="<?php echo h(product_image_src($p, '16x9')); ?>" alt="<?php echo h($p['title']); ?>" />
            </div>
            <div class="card-body d-flex flex-column">
              <h3 class="h6"><?php echo h($p['title']); ?></h3>
              <p class="text-muted small mb-3"><?php echo h($p['category']); ?> • $<?php echo number_format($p['price'], 2); ?></p>
              <div class="mt-auto d-flex gap-2">
                <a class="btn btn-sm btn-outline-primary" href="product.php?id=<?php echo (int)$p['id']; ?>">View</a>
                <form method="post" action="cart.php" class="m-0">
                  <input type="hidden" name="action" value="add" />
                  <input type="hidden" name="product_id" value="<?php echo (int)$p['id']; ?>" />
                  <button class="btn btn-sm btn-primary" type="submit">Add to Cart</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="mb-5">
    <div class="p-3 p-md-4 border rounded bg-white d-flex flex-column flex-md-row align-items-md-center justify-content-between">
      <div class="mb-3 mb-md-0">
        <div class="fw-semibold">Launch your marketplace faster</div>
        <div class="text-muted">Use the prebuilt pages and start selling today.</div>
      </div>
      <a class="btn btn-success" href="products.php">Explore Products</a>
    </div>
  </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>


