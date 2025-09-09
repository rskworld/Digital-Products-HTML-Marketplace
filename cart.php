<?php
  /*
  Support / Licensing / Custom Dev: help@rskworld.in
  Phone/WhatsApp: +91 9330539277
  Website: rskworld.in
  Business Inquiries: help@rskworld.in
  🤝 Suggestions and improvements are welcome!
  */
  $pageTitle = 'Cart';
  include __DIR__ . '/includes/header.php';

  // Handle actions
  $action = $_POST['action'] ?? '';
  if ($action === 'add') {
    cart_add((int)$_POST['product_id'], max(1, (int)($_POST['qty'] ?? 1)));
    header('Location: cart.php');
    exit;
  } elseif ($action === 'remove') {
    cart_remove((int)$_POST['product_id']);
    header('Location: cart.php');
    exit;
  } elseif ($action === 'clear') {
    cart_clear();
    header('Location: cart.php');
    exit;
  }

  $items = cart_items();
?>
<main class="container my-4">
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h1 class="h4 m-0">Your Cart</h1>
    <?php if (!empty($items)): ?>
      <form method="post">
        <input type="hidden" name="action" value="clear" />
        <button class="btn btn-sm btn-outline-danger" type="submit">Clear Cart</button>
      </form>
    <?php endif; ?>
  </div>

  <?php if (empty($items)): ?>
    <div class="alert alert-info">Your cart is empty. Browse products to add items.</div>
  <?php else: ?>
    <div class="list-group mb-3">
      <?php foreach ($items as $p): ?>
        <div class="list-group-item d-flex align-items-center">
          <img src="<?php echo h(product_image_src($p, '1x1')); ?>" alt="<?php echo h($p['title']); ?>" class="rounded border me-3" style="width:56px;height:56px;object-fit:cover;" />
          <div class="flex-grow-1">
            <div class="fw-semibold"><?php echo h($p['title']); ?></div>
            <div class="text-muted small"><?php echo h($p['category']); ?> • Qty: <?php echo (int)$p['qty']; ?></div>
          </div>
          <div class="me-3">$<?php echo number_format($p['line_total'], 2); ?></div>
          <form method="post">
            <input type="hidden" name="action" value="remove" />
            <input type="hidden" name="product_id" value="<?php echo (int)$p['id']; ?>" />
            <button class="btn btn-sm btn-outline-secondary" type="submit">Remove</button>
          </form>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="d-flex justify-content-between align-items-center">
      <div class="fw-semibold">Total</div>
      <div class="h5 m-0">$<?php echo number_format(cart_total(), 2); ?></div>
    </div>
    <div class="d-flex gap-2 mt-3">
      <a class="btn btn-outline-primary" href="products.php">Continue Shopping</a>
      <a class="btn btn-primary" href="checkout.php">Proceed to Checkout</a>
    </div>
  <?php endif; ?>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>


