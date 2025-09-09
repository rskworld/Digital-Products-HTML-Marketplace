# Digital Products HTML Marketplace

Comprehensive HTML/PHP template for selling ebooks, courses, software, and digital downloads. Modern UI with Tailwind + Bootstrap utilities, animations, charts, and a session cart.

## Features
- Tailwind CSS (CDN) + Bootstrap 5 utilities
- AOS scroll animations and subtle 3D tilt effects
- Chart.js dashboard (line, bar, doughnut, stacked, radar, bubble)
- Masonry floating grid for product cards
- Data-driven products with server-side search/filter/sort (PHP)
- Category-based product images (SVG placeholders)
- Session cart (add/remove/clear) with header badge
- Dynamic checkout total (single product or full cart)
- Sticky, responsive header with logo

## Pages
- Home: `index.php`
- Products: `products.php` (supports `?q=`, `&category=`, `&sort=`)
- Product detail: `product.php?id=...`
- Cart: `cart.php` (POST add/remove/clear)
- Checkout: `checkout.php` (`?product_id=` optional; otherwise uses cart)
- Authors: `authors.php`
- Dashboard: `dashboard.php`
- Affiliates: `affiliates.php`
- Contact: `contact.php`

## Includes
- `includes/config.php` – session_start, site metadata, nav links
- `includes/data.php` – sample products dataset
- `includes/helpers.php` – escaping, product lookup, search/filter/sort, cart utils, image helper
- `includes/header.php`, `includes/footer.php` – layout, scripts, styles

## Assets
- CSS: `assets/css/style.css`
- JS: `assets/js/main.js`
- Images: `assets/images/hero-illustration.svg`, `assets/images/logo.svg`, `assets/images/products/*.svg`

## Quick start
Serve with PHP, then open the homepage.

```bash
php -S localhost:8000 -t digital-products-marketplace
```

## Usage tips
- Search products: `/products.php?q=tailwind`
- Filter by category: `&category=Courses`
- Sort: `&sort=price_asc | price_desc | newest | popular`
- Add to cart from Home/Products/Product; view `cart.php`; proceed to `checkout.php`

## Customize
- Colors: tweak Tailwind config in `includes/header.php`
- Logo: replace `assets/images/logo.svg`
- Product images: replace SVGs in `assets/images/products/` or set real URLs in `includes/data.php`

## Demo
- Live demo: https://rskworld.in/web/html-templates/ecommerce-templates/digital-products-marketplace/index.php
- Home: `http://localhost:8000`
- Products: `http://localhost:8000/products.php`
- Cart: `http://localhost:8000/cart.php`
- Dashboard: `http://localhost:8000/dashboard.php`

## Contact
For support, licensing, or custom development inquiries: help@rskworld.in  
Phone/WhatsApp: +91 9330539277  
Website: rskworld.in  
Business Inquiries: help@rskworld.in  
🤝 Contributing: Suggestions and improvements are welcome!

