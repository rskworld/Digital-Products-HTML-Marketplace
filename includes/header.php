<?php
  /*
  Support / Licensing / Custom Dev: help@rskworld.in
  Phone/WhatsApp: +91 9330539277
  Website: rskworld.in
  Business Inquiries: help@rskworld.in
  🤝 Suggestions and improvements are welcome!
  */
  require_once __DIR__ . '/config.php';
  require_once __DIR__ . '/helpers.php';
  if (!isset($navLinks) || !is_array($navLinks) || count($navLinks) === 0) {
    $navLinks = [
      ['label' => 'Home', 'href' => 'index.php'],
      ['label' => 'Products', 'href' => 'products.php'],
      ['label' => 'Authors', 'href' => 'authors.php'],
      ['label' => 'Dashboard', 'href' => 'dashboard.php'],
      ['label' => 'Affiliates', 'href' => 'affiliates.php'],
      ['label' => 'Contact', 'href' => 'contact.php'],
    ];
  }
  $fullTitle = ($pageTitle ?? 'Page') . ' • ' . $template['title'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo h($template['description']); ?>">
    <title><?php echo h($fullTitle); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              brand: '#0d6efd',
              brandDark: '#0b5ed7',
            }
          }
        }
      }
    </script>
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'><text y='14' font-size='14'>💾</text></svg>">
  </head>
  <body class="bg-slate-50">
    <?php if (!check_attribution_signature()): ?>
      <div class="alert alert-danger rounded-0 m-0 text-center small">
        Template attribution missing. Please restore the header comments with support info (help@rskworld.in).
      </div>
    <?php endif; ?>
    <nav class="navbar navbar-dark bg-dark sticky-top shadow-sm">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php" aria-label="Home">
          <img src="assets/images/logo.svg" alt="Logo" height="28" class="me-2" />
        </a>
        <div class="d-flex align-items-center flex-grow-1">
          <ul class="nav ms-auto">
            <?php foreach ($navLinks as $nav): ?>
              <li class="nav-item">
                <a class="nav-link text-white px-2 <?php echo isActiveNav($nav['href']) ? 'active' : ''; ?>" href="<?php echo h($nav['href']); ?>"><?php echo h($nav['label']); ?></a>
              </li>
            <?php endforeach; ?>
            <li class="nav-item">
              <a class="nav-link text-white px-2" href="cart.php" title="Support / Licensing / Custom Dev: <?php echo h($template['contact']['support_email']); ?> | Phone/WhatsApp: <?php echo h($template['contact']['phone_whatsapp']); ?> | Website: <?php echo h($template['contact']['website_name']); ?>">Cart <span class="badge bg-primary"><?php echo (int)cart_count(); ?></span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container py-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo h($pageTitle ?? ''); ?></li>
        </ol>
      </nav>
    </div>
    

