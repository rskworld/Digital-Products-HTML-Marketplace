    <?php /*
    Support / Licensing / Custom Dev: help@rskworld.in
    Phone/WhatsApp: +91 9330539277
    Website: rskworld.in
    Business Inquiries: help@rskworld.in
    🤝 Suggestions and improvements are welcome!
    */ ?>
    <footer class="bg-dark text-light mt-5 pt-4 pb-5">
      <div class="container">
        <div class="row g-4">
          <div class="col-md-6">
            <h5 class="mb-3">About</h5>
            <p class="text-secondary mb-0">Digital marketplace HTML template for ebooks, courses, software, and more. Clean, professional, and easy to implement.</p>
          </div>
          <div class="col-md-6">
            <h5 class="mb-3">Contact</h5>
            <ul class="list-unstyled small m-0">
              <li><strong>Support / Licensing / Custom Dev:</strong> <a class="footer-link" href="mailto:<?php echo h($template['contact']['support_email']); ?>"><?php echo h($template['contact']['support_email']); ?></a></li>
              <li><strong>Phone/WhatsApp:</strong> <?php echo h($template['contact']['phone_whatsapp']); ?></li>
              <li><strong>Website:</strong> <a class="footer-link" href="<?php echo h($template['contact']['website_url']); ?>" target="_blank" rel="noopener"><?php echo h($template['contact']['website_name']); ?></a></li>
              <li><strong>Business Inquiries:</strong> <a class="footer-link" href="mailto:<?php echo h($template['contact']['business_email']); ?>"><?php echo h($template['contact']['business_email']); ?></a></li>
              <li class="mt-2">🤝 <?php echo h($template['contributing']); ?></li>
            </ul>
          </div>
        </div>
        <hr class="border-secondary my-4" />
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between small text-secondary">
          <div>
            &copy; <?php echo date('Y'); ?> <?php echo h($template['contact']['website_name']); ?>. All rights reserved.
          </div>
          <div>
            <a class="text-decoration-none text-secondary" href="checkout.php">Checkout</a>
          </div>
        </div>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js" crossorigin="anonymous"></script>
    <script>
      AOS.init({ once: true, duration: 600, easing: 'ease-out-quart' });
    </script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
<?php /* end */ ?>


