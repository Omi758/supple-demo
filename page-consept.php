    <?php get_header(); ?>

    <main>
      <!-- page-kv -->
      <div class="c-page-kv c-page-kv--consept">
        <div class="l-container-l">
          <h1 class="c-title-level1 c-title-level1--white"><?php echo strtoupper($post->post_name); ?></h1>
        </div>
      </div>
      <!-- end page-kv -->

      <!-- consept -->
      <div class="u-ptb">
        <div class="l-container">
          <div class="consept-img">
            <img width="2160" height="540"
              src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/pic-consept.jpg'); ?>"
              alt="suppleに関する4枚の写真。1枚目は..." loading="lazy" />
          </div>

          <p class="consept-text u-mt">一杯一杯まごころをこめて調製し、新鮮な香りと豊かな風味のコーヒーを提供します。</p>

          <p class="consept-text02">
            <span>親譲りの無鉄砲で小供の時から損ばかりしている。</span><span>小学校に居る時分学校の二階から飛び降りて一週間ほど腰を抜かした事がある。</span><span>なぜそんな無闇をしたと聞く人があるかも知れぬ。</span>
          </p>

          <div class="consept-img u-mt">
            <img width="2160" height="540"
              src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/pic-consept02.jpg'); ?>"
              alt="suppleに関する4枚の写真。1枚目は..." loading="lazy" />
          </div>
        </div>
      </div>
      <!-- end consept -->
    </main>

    <?php get_footer(); ?>