<?php
  /*
  Support / Licensing / Custom Dev: help@rskworld.in
  Phone/WhatsApp: +91 9330539277
  Website: rskworld.in
  Business Inquiries: help@rskworld.in
  🤝 Suggestions and improvements are welcome!
  */
  $pageTitle = 'Product';
  include __DIR__ . '/includes/header.php';
  $id = (int)($_GET['id'] ?? 1);
  $p = findProductById($id);
?>
<main class="container my-4" data-aos="fade-up">
  <?php if (!$p): ?>
    <div class="alert alert-warning">Product not found. <a href="products.php">Back to products</a>.</div>
  <?php else: ?>
  <div class="row g-4">
    <div class="col-lg-7" data-aos="fade-right">
      <div class="ratio ratio-16x9 bg-light rounded border shadow-sm">
        <img class="object-fit-cover" src="<?php echo h($p['image']); ?>" alt="<?php echo h($p['title']); ?>" />
      </div>
      <div class="mt-3">
        <h2 class="h5">About this product</h2>
        <p><?php echo h($p['description']); ?></p>
        <ul>
          <li>Category: <?php echo h($p['category']); ?></li>
          <li>Includes lifetime updates</li>
          <li>Secure checkout</li>
        </ul>
      </div>
    </div>
    <div class="col-lg-5" data-aos="fade-left">
      <div class="card shadow-sm">
        <div class="card-body">
          <h1 class="h4 mb-1"><?php echo h($p['title']); ?></h1>
          <div class="text-muted small mb-3">By <a href="authors.php"><?php echo h($p['author']['name']); ?></a></div>
          <div class="h3">$<?php echo number_format($p['price'], 2); ?></div>
          <div class="d-grid gap-2 mt-3">
            <form method="post" action="cart.php">
              <input type="hidden" name="action" value="add" />
              <input type="hidden" name="product_id" value="<?php echo (int)$p['id']; ?>" />
              <button class="btn btn-primary" type="submit">Add to Cart</button>
            </form>
          </div>
          <hr />
          <div class="small text-muted">Secure Payment Integration Placeholder</div>
        </div>
      </div>

      <div class="card mt-3 shadow-sm" data-aos="fade-up" data-aos-delay="100">
        <div class="card-body">
          <h2 class="h6">Author</h2>
          <div class="d-flex align-items-center">
            <img class="rounded-circle me-3" src="<?php echo h($p['author']['avatar']); ?>" alt="Author" width="48" height="48" />
            <div>
              <div class="fw-semibold"><?php echo h($p['author']['name']); ?></div>
              <div class="text-muted small"><?php echo (int)$p['sales']; ?>+ sales • <?php echo number_format($p['rating'], 1); ?> rating</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>

