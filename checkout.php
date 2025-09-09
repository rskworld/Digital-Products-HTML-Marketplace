<?php
  /*
  Support / Licensing / Custom Dev: help@rskworld.in
  Phone/WhatsApp: +91 9330539277
  Website: rskworld.in
  Business Inquiries: help@rskworld.in
  🤝 Suggestions and improvements are welcome!
  */
  $pageTitle = 'Checkout';
  include __DIR__ . '/includes/header.php';
  $productId = (int)($_GET['product_id'] ?? 0);
  $selected = $productId ? findProductById($productId) : null;
  $cart = cart_items();
  $payAmount = $selected ? (float)$selected['price'] : (float)cart_total();
?>
<main class="container my-4">
  <div class="row g-4">
    <div class="col-lg-7">
      <div class="card">
        <div class="card-body">
          <h1 class="h5">Payment Details (Placeholder)</h1>
          <div class="row g-3 mt-1">
            <div class="col-md-6">
              <label class="form-label">Name on card</label>
              <input class="form-control" type="text" placeholder="Jane Doe" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Card number</label>
              <input class="form-control" type="text" placeholder="1234 5678 9012 3456" />
            </div>
            <div class="col-md-4">
              <label class="form-label">Expiry</label>
              <input class="form-control" type="text" placeholder="MM/YY" />
            </div>
            <div class="col-md-4">
              <label class="form-label">CVC</label>
              <input class="form-control" type="text" placeholder="123" />
            </div>
            <div class="col-md-4">
              <label class="form-label">Email</label>
              <input class="form-control" type="email" placeholder="you@example.com" />
            </div>
          </div>
          <div class="form-check mt-3">
            <input class="form-check-input" type="checkbox" id="terms">
            <label class="form-check-label" for="terms">I agree to the terms and license.</label>
          </div>
          <div class="d-grid mt-3">
            <button class="btn btn-primary" type="button">Pay $<?php echo number_format($payAmount, 2); ?></button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="card">
        <div class="card-body">
          <h2 class="h6">Order Summary</h2>
          <?php if ($selected): ?>
            <div class="d-flex align-items-center mb-2">
              <div class="me-2" style="width:56px;height:56px;">
                <img class="object-fit-cover rounded border" src="<?php echo h($selected['thumb']); ?>" alt="<?php echo h($selected['title']); ?>" />
              </div>
              <div class="flex-grow-1">
                <div class="small fw-semibold"><?php echo h($selected['title']); ?></div>
                <div class="text-muted small"><?php echo h($selected['category']); ?></div>
              </div>
              <div class="ms-2">$<?php echo number_format($selected['price'], 2); ?></div>
            </div>
          <?php elseif (!empty($cart)): ?>
            <?php foreach ($cart as $p): ?>
              <div class="d-flex align-items-center mb-2">
                <div class="me-2" style="width:56px;height:56px;">
                  <img class="object-fit-cover rounded border" src="<?php echo h(product_image_src($p, '1x1')); ?>" alt="<?php echo h($p['title']); ?>" />
                </div>
                <div class="flex-grow-1">
                  <div class="small fw-semibold"><?php echo h($p['title']); ?></div>
                  <div class="text-muted small"><?php echo h($p['category']); ?> • Qty: <?php echo (int)$p['qty']; ?></div>
                </div>
                <div class="ms-2">$<?php echo number_format($p['line_total'], 2); ?></div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="text-muted small">No items selected. <a href="products.php">Add products</a>.</div>
          <?php endif; ?>
          <hr />
          <div class="d-flex justify-content-between fw-semibold">
            <div>Total</div>
            <div>
              $<?php echo number_format($selected ? $selected['price'] : cart_total(), 2); ?>
            </div>
          </div>
          <div class="small text-muted mt-2">Secure Payment Integration Placeholder</div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>


