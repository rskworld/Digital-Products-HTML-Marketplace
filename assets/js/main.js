// Main JS for Digital Products HTML Marketplace
// Support / Licensing / Custom Dev: help@rskworld.in
// Phone/WhatsApp: +91 9330539277
// Website: rskworld.in
// Business Inquiries: help@rskworld.in
// 🤝 Suggestions and improvements are welcome!
document.addEventListener('DOMContentLoaded', () => {
  // Placeholder: smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(el => {
    el.addEventListener('click', ev => {
      const targetId = el.getAttribute('href');
      const target = document.querySelector(targetId);
      if (target) {
        ev.preventDefault();
        target.scrollIntoView({ behavior: 'smooth' });
      }
    });
  });

  // Micro-interactions: elevate cards on hover (non-Tailwind fallback)
  document.querySelectorAll('.card-product').forEach(card => {
    card.addEventListener('mouseenter', () => card.classList.add('shadow'));
    card.addEventListener('mouseleave', () => card.classList.remove('shadow'));
  });
});

// Initialize Masonry layouts after images load for proper floating
window.addEventListener('load', () => {
  if (typeof Masonry !== 'undefined') {
    document.querySelectorAll('.js-masonry').forEach(grid => {
      new Masonry(grid, {
        itemSelector: '.masonry-item',
        percentPosition: true,
        horizontalOrder: true,
        gutter: 12
      });
    });
  }
});
