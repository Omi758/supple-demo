  <!-- instagram -->
  <section class="c-instagram u-ptb">
    <h2 class="c-title-level2 c-title-level2--center">instagram</h2>

    <ul class="c-instagram-list">
      <li class="c-instagram-item">
        <img width="402" height="402"
          src="<?php echo esc_url(get_template_directory_uri() .'/assets/img/pic-instagram-post.jpg'); ?>" alt=" 〇〇の写真"
          loading="lazy" />
      </li>
      <li class="c-instagram-item">
        <img width="402" height="402"
          src="<?php echo esc_url(get_template_directory_uri() .'/assets/img/pic-instagram-post02.jpg'); ?>" alt="〇〇の写真"
          loading="lazy" />
      </li>
      <li class="c-instagram-item">
        <img width="402" height="402"
          src="<?php echo esc_url(get_template_directory_uri() .'/assets/img/pic-instagram-post03.jpg'); ?>" alt="〇〇の写真"
          loading="lazy" />
      </li>
      <li class="c-instagram-item">
        <img width="402" height="402"
          src="<?php echo esc_url(get_template_directory_uri() .'/assets/img/pic-instagram-post04.jpg'); ?>" alt="〇〇の写真"
          loading="lazy" />
      </li>
      <li class="c-instagram-item">
        <img width="402" height="402"
          src="<?php echo esc_url(get_template_directory_uri() .'/assets/img/pic-instagram-post05.jpg'); ?>" alt="〇〇の写真"
          loading="lazy" />
      </li>
      <li class="c-instagram-item">
        <img width="402" height="402"
          src="<?php echo esc_url(get_template_directory_uri() .'/assets/img/pic-instagram-post06.jpg'); ?>" alt="〇〇の写真"
          loading="lazy" />
      </li>
    </ul>

    <div class="c-instagram-button">
      <a href="https://www.instagram.com/?hl=ja" target="_blank" rel="noopener noreferrer"
        class="c-button c-button--center">instagram</a>
    </div>
  </section>
  <!-- end instagram -->

  <!-- footer -->
  <footer class="footer">
    <div class="l-container">
      <div class="footer-logo">
        <a href="<?php echo esc_url(home_url( '/' )); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-white.svg" width="200" height="26"
            alt="supple" loading="lazy" />
        </a>
      </div>

      <nav class="footer-shop-nav">
        <ul class="footer-shop-list">
          <li class="footer-shop-item">北千住店</li>
          <li class="footer-shop-item">代官山店</li>
          <li class="footer-shop-item">新宿店</li>
          <li class="footer-shop-item">八王子店</li>
          <li class="footer-shop-item">銀座店</li>
          <li class="footer-shop-item">渋谷店</li>
        </ul>
      </nav>

      <div class="footer-company-info">
        <span>株式会社 SUPPLE</span>
        <span>〒123-4567 東京都渋谷区ABC</span>
      </div>

      <small class="footer-copyright">&copy; 2024 SUPPLE</small>
    </div>
  </footer>
  <!-- end footer -->
  <?php wp_footer(); ?>
  </body>

  </html>