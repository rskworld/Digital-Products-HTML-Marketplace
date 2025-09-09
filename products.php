<?php
  /*
  Support / Licensing / Custom Dev: help@rskworld.in
  Phone/WhatsApp: +91 9330539277
  Website: rskworld.in
  Business Inquiries: help@rskworld.in
  🤝 Suggestions and improvements are welcome!
  */
  $pageTitle = 'Products';
  include __DIR__ . '/includes/header.php';
  // Read query params
  $q = trim((string)($_GET['q'] ?? ''));
  $category = (string)($_GET['category'] ?? 'All');
  $sort = (string)($_GET['sort'] ?? 'popular');
  // Build category options
  $allProducts = getAllProducts();
  $categoryNames = array_values(array_unique(array_map(fn($p) => $p['category'], $allProducts)));
  sort($categoryNames);
  // Fetch results
  $results = filterSortProducts(['q' => $q, 'category' => $category, 'sort' => $sort]);
?>
<main class="container my-4" data-aos="fade-up">
  <div class="d-flex align-items-center justify-content-between mb-3" data-aos="fade-up" data-aos-delay="50">
    <h1 class="h3 m-0">All Digital Products</h1>
    <form class="d-flex gap-2" role="search" method="get" action="">
      <input class="form-control form-control-sm" style="max-width: 240px;" type="search" name="q" value="<?php echo h($q); ?>" placeholder="Search products" aria-label="Search">
      <select class="form-select form-select-sm" style="max-width: 180px;" name="category">
        <option value="All" <?php echo ($category === 'All' || $category === '') ? 'selected' : ''; ?>>All Categories</option>
        <?php foreach ($categoryNames as $cat): ?>
          <option value="<?php echo h($cat); ?>" <?php echo ($category === $cat) ? 'selected' : ''; ?>><?php echo h($cat); ?></option>
        <?php endforeach; ?>
      </select>
      <select class="form-select form-select-sm" style="max-width: 160px;" name="sort">
        <option value="popular" <?php echo ($sort==='popular')?'selected':''; ?>>Sort: Popular</option>
        <option value="newest" <?php echo ($sort==='newest')?'selected':''; ?>>Newest</option>
        <option value="price_asc" <?php echo ($sort==='price_asc')?'selected':''; ?>>Price: Low to High</option>
        <option value="price_desc" <?php echo ($sort==='price_desc')?'selected':''; ?>>Price: High to Low</option>
      </select>
      <button class="btn btn-sm btn-primary" type="submit">Apply</button>
    </form>
  </div>
  <div class="d-flex justify-content-between align-items-center mb-2">
    <div class="text-muted small"><?php echo count($results); ?> results</div>
  </div>
  <div class="row g-3 js-masonry" data-aos="fade-up" data-aos-delay="100">
    <?php if (empty($results)): ?>
      <div class="col-12">
        <div class="alert alert-warning">No products found. Try clearing filters.</div>
      </div>
    <?php else: ?>
      <?php foreach ($results as $idx => $p): ?>
        <div class="col-12 col-sm-6 col-lg-3 masonry-item">
          <div class="card h-100 card-product hover:shadow transition-shadow" data-aos="zoom-in" data-aos-delay="<?php echo ($idx+1) * 40; ?>">
            <div class="ratio ratio-1x1 bg-light">
              <img class="object-fit-cover" src="<?php echo h(product_image_src($p, '1x1')); ?>" alt="<?php echo h($p['title']); ?>" />
            </div>
            <div class="card-body d-flex flex-column">
              <h3 class="h6 mb-1"><?php echo h($p['title']); ?></h3>
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
    <?php endif; ?>
  </div>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>

