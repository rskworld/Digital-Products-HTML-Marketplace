<?php
function h(?string $text): string {
  return htmlspecialchars((string)$text, ENT_QUOTES, 'UTF-8');
}

function asset(string $path): string {
  return $path;
}

// Download url removed

function getAllProducts(): array {
  require __DIR__ . '/data.php';
  return $products ?? [];
}

function findProductById(int $id): ?array {
  $all = getAllProducts();
  foreach ($all as $p) {
    if ((int)$p['id'] === $id) return $p;
  }
  return null;
}

function filterSortProducts(array $opts): array {
  $q = trim((string)($opts['q'] ?? ''));
  $cat = (string)($opts['category'] ?? '');
  $sort = (string)($opts['sort'] ?? 'popular');
  $all = getAllProducts();

  $filtered = array_values(array_filter($all, function ($p) use ($q, $cat) {
    $matchesQ = $q === '' || stripos($p['title'] . ' ' . $p['description'], $q) !== false;
    $matchesC = $cat === '' || $cat === 'All' || strcasecmp($p['category'], $cat) === 0;
    return $matchesQ && $matchesC;
  }));

  usort($filtered, function ($a, $b) use ($sort) {
    switch ($sort) {
      case 'newest':
        return strcmp($b['created_at'], $a['created_at']);
      case 'price_asc':
        return $a['price'] <=> $b['price'];
      case 'price_desc':
        return $b['price'] <=> $a['price'];
      case 'popular':
      default:
        return $b['sales'] <=> $a['sales'];
    }
  });

  return $filtered;
}

function product_image_src(array $product, string $aspect = '16x9'): string {
  $cat = strtolower($product['category'] ?? '');
  $name = 'software';
  if ($cat === 'ebooks' || $cat === 'ebook') $name = 'ebooks';
  if ($cat === 'courses' || $cat === 'course') $name = 'courses';
  $aspectName = $aspect === '1x1' ? '1x1' : '16x9';
  return 'assets/images/products/' . $name . '-' . $aspectName . '.svg';
}

// Cart utilities (session based)
function cart_get(): array {
  return $_SESSION['cart'] ?? [];
}

function cart_add(int $productId, int $qty = 1): void {
  $cart = cart_get();
  $cart[$productId] = ($cart[$productId] ?? 0) + max(1, $qty);
  $_SESSION['cart'] = $cart;
}

function cart_remove(int $productId): void {
  $cart = cart_get();
  unset($cart[$productId]);
  $_SESSION['cart'] = $cart;
}

function cart_clear(): void {
  unset($_SESSION['cart']);
}

function cart_count(): int {
  return array_sum(cart_get());
}

function cart_items(): array {
  $items = [];
  foreach (cart_get() as $id => $qty) {
    $p = findProductById((int)$id);
    if ($p) {
      $p['qty'] = (int)$qty;
      $p['line_total'] = $p['qty'] * $p['price'];
      $items[] = $p;
    }
  }
  return $items;
}

function cart_total(): float {
  $sum = 0;
  foreach (cart_items() as $p) { $sum += $p['line_total']; }
  return $sum;
}

// Attribution signature enforcement
function check_attribution_signature(): bool {
  if (isset($_SESSION['sig_ok'])) {
    return (bool)$_SESSION['sig_ok'];
  }
  $base = dirname(__DIR__);
  $filesToCheck = [
    '/includes/config.php','/includes/header.php','/includes/footer.php','/includes/helpers.php',
    '/index.php','/products.php','/product.php','/cart.php','/checkout.php','/authors.php','/dashboard.php','/affiliates.php','/contact.php',
    '/assets/css/style.css','/assets/js/main.js'
  ];
  foreach ($filesToCheck as $rel) {
    $path = $base . $rel;
    if (!is_file($path)) { $_SESSION['sig_ok'] = false; return false; }
    $fh = @fopen($path, 'r');
    if ($fh === false) { $_SESSION['sig_ok'] = false; return false; }
    $chunk = @fread($fh, 1024);
    @fclose($fh);
    if ($chunk === false) { $_SESSION['sig_ok'] = false; return false; }
    // Require the standardized attribution header comment near the top of each file
    $mustContain = ['Support / Licensing / Custom Dev:', 'help@rskworld.in'];
    foreach ($mustContain as $needle) {
      if (stripos($chunk, $needle) === false) {
        $_SESSION['sig_ok'] = false;
        return false;
      }
    }
  }
  $_SESSION['sig_ok'] = true;
  return true;
}
