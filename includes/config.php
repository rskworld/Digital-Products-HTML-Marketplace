<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } ?>
<?php /*
Support / Licensing / Custom Dev: help@rskworld.in
Phone/WhatsApp: +91 9330539277
Website: rskworld.in
Business Inquiries: help@rskworld.in
🤝 Suggestions and improvements are welcome!
*/ ?>
<?php
// Template configuration and shared data
$template = [
  'title' => 'Digital Products HTML Marketplace',
  'description' => 'Comprehensive HTML template for selling ebooks, courses, software, and digital downloads. Clean, professional, and easy to implement.',
  'image' => 'digital-products-marketplace/digital-products-marketplace.png',
  'url' => 'digital-products-marketplace/index.php',
  // Removed downloadable zip metadata per request
  'category' => ['digital', 'free'],
  'badge' => 'Free HTML Template',
  'badgeClass' => 'bg-success',
  'features' => [
    'Modern Hero with Illustration',
    'Multiple File Type Support',
    'Responsive Product Grid and Filters',
    'Secure Payment Integration Placeholders',
    'Author/Creator Profiles Section',
    'Sales Analytics Dashboard Layout',
    'Affiliate Marketing Tools Design',
    'Testimonials and Trust Badges',
    'Accessible Components and Keyboard Navigation',
    'Tailwind CSS Utilities & AOS Animations',
    'Micro-interactions and Hover States',
    'Sticky Header with Mobile Menu'
  ],
  'tags' => ['ebooks', 'courses', 'software', 'html5', 'tailwindcss', 'aos', 'bootstrap5', 'responsive'],
  'contact' => [
    'support_email' => 'help@rskworld.in',
    'business_email' => 'help@rskworld.in',
    'phone_whatsapp' => '+91 9330539277',
    'website_name' => 'rskworld.in',
    'website_url' => 'https://rskworld.in',
  ],
  'contributing' => 'Suggestions and improvements are welcome!'
];

$navLinks = [
  ['label' => 'Home', 'href' => 'index.php'],
  ['label' => 'Products', 'href' => 'products.php'],
  ['label' => 'Authors', 'href' => 'authors.php'],
  ['label' => 'Dashboard', 'href' => 'dashboard.php'],
  ['label' => 'Affiliates', 'href' => 'affiliates.php'],
  ['label' => 'Contact', 'href' => 'contact.php'],
];

function currentUrlPath(): string {
  $uri = $_SERVER['REQUEST_URI'] ?? '';
  return trim(parse_url($uri, PHP_URL_PATH), '/');
}

function isActiveNav(string $href): bool {
  $path = currentUrlPath();
  $basename = basename($path);
  if ($basename === '') {
    $basename = 'index.php';
  }
  return strtolower($basename) === strtolower($href);
}
