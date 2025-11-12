<?php get_header(); ?>

<main>
  <!-- top-kv -->
  <div class="top-kv"></div>
  <!-- end top-kv -->
  <!-- top-consept -->
  <section class="top-consept u-ptb">
    <div class="l-container-s">
      <h2 class="c-title-level2 c-title-level2--center">consept</h2>

      <div class="u-mt">
        <div class="top-consept-img">
          <img width="1920" height="954"
            src="<?php echo get_template_directory_uri(); ?>/assets/img/pic-top-consept.jpg" alt="" loading="lazy" />
        </div>

        <p class="top-consept-text u-mt">一杯一杯まごころをこめて調製し、新鮮な香りと豊かな 風味のコーヒーを提供します。</p>

        <p class="top-consept-text02">
          <span>親譲りの無鉄砲で小供の時から損ばかりしている。</span><span>小学校に居る時分学校の二階から飛び降りて一週間ほど腰を抜かした事がある。</span><span>なぜそんな無闇をしたと聞く人があるかも知れぬ。</span>
        </p>

        <div class="u-mt">
          <a href="<?php echo esc_url(home_url('/consept/')); ?>" class="c-button c-button--center">more</a>
        </div>
      </div>
    </div>
  </section>
  <!-- end top-consept -->

  <!-- top-menu -->
  <section class="top-menu u-ptb">
    <div class="l-container">
      <div class="top-menu-inner">
        <h2 class="c-title-level2 c-title-level2--white c-title-level2--center">menu</h2>

        <div class="top-menu-body u-mt">
          <section class="top-menu-block">
            <h3 class="top-menu-list-title">drip</h3>

            <ul class="top-menu-list">
              <li class="top-menu-item">
                <span class="top-menu-item-name">エントランスブレンド</span>
                <span class="top-menu-item-price">¥800</span>
              </li>
              <li class="top-menu-item">
                <span class="top-menu-item-name">エチオピア ウォッシュド</span>
                <span class="top-menu-item-price">¥800</span>
              </li>
              <li class="top-menu-item">
                <span class="top-menu-item-name">エチオピア ナチュラル</span>
                <span class="top-menu-item-price">¥800</span>
              </li>
              <li class="top-menu-item">
                <span class="top-menu-item-name">グアテマラ</span>
                <span class="top-menu-item-price">¥800</span>
              </li>
              <li class="top-menu-item">
                <span class="top-menu-item-name">ブラジル</span>
                <span class="top-menu-item-price">¥800</span>
              </li>
              <li class="top-menu-item">
                <span class="top-menu-item-name">タンザニア</span>
                <span class="top-menu-item-price">¥800</span>
              </li>
              <li class="top-menu-item">
                <span class="top-menu-item-name">フスクブレンド</span>
                <span class="top-menu-item-price">¥800</span>
              </li>
            </ul>
          </section>

          <section class="top-menu-block">
            <h3 class="top-menu-list-title">espresso</h3>

            <ul class="top-menu-list">
              <li class="top-menu-item">
                <span class="top-menu-item-name">エントランスブレンド</span>
                <span class="top-menu-item-price">¥800</span>
              </li>
              <li class="top-menu-item">
                <span class="top-menu-item-name">エチオピア ウォッシュド</span>
                <span class="top-menu-item-price">¥800</span>
              </li>
              <li class="top-menu-item">
                <span class="top-menu-item-name">エチオピア ナチュラル</span>
                <span class="top-menu-item-price">¥800</span>
              </li>
              <li class="top-menu-item">
                <span class="top-menu-item-name">グアテマラ</span>
                <span class="top-menu-item-price">¥800</span>
              </li>
              <li class="top-menu-item">
                <span class="top-menu-item-name">ブラジル</span>
                <span class="top-menu-item-price">¥800</span>
              </li>
              <li class="top-menu-item">
                <span class="top-menu-item-name">タンザニア</span>
                <span class="top-menu-item-price">¥800</span>
              </li>
              <li class="top-menu-item">
                <span class="top-menu-item-name">フスクブレンド</span>
                <span class="top-menu-item-price">¥800</span>
              </li>
            </ul>
          </section>
        </div>

        <div class="u-mt">
          <a href="<?php echo esc_url(home_url('/menu/')); ?> "
            class="c-button c-button--white c-button--center">more</a>
        </div>
      </div>
    </div>
  </section>
  <!-- end top-menu -->

  <!-- top-shoplist -->
  <section class="top-shoplist u-ptb">
    <div class="l-container-s">
      <h2 class="c-title-level2 c-title-level2--center">shop list</h2>
      <p class="top-shoplist-copy"><span>首都圏を中心に6店舗展開しています。</span><span>お近くの店舗でお待ちしています。</span></p>

      <div class="u-mt">
        <ul class="top-shoplist-list">
          <li class="top-shoplist-item">北千住店</li>
          <li class="top-shoplist-item">代官山店</li>
          <li class="top-shoplist-item">新宿店</li>
          <li class="top-shoplist-item">八王子店</li>
          <li class="top-shoplist-item">銀座店</li>
          <li class="top-shoplist-item">渋谷店</li>
        </ul>
      </div>

      <div class="u-mt">
        <a href="<?php echo esc_url(home_url('/shoplist/')); ?>" class="c-button c-button--center">more</a>
      </div>
    </div>
  </section>
  <!-- end top-shoplist -->

  <!-- top-blog -->
  <?php
  $blog_query = new WP_Query(array(
    "post_type" => "post",
    "posts_per_page" => 3,
  ));
  ?>
  <?php if ( $blog_query->have_posts() ) : ?>
  <div class="top-blog">
    <section class="u-ptb">
      <div class="l-container-s">
        <h2 class="c-title-level2 c-title-level2--center">blog & news</h2>

        <div class="u-mt">
          <div class="c-posts c-posts--col3">
            <?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>

            <?php get_template_part("template-parts/loop", "blog"); ?>

            <?php endwhile; ?>
          </div>
        </div>

        <div class="u-mt">
          <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="c-button c-button--center">more</a>
        </div>
      </div>
    </section>
  </div>
  <?php
  wp_reset_postdata(); // カスタムクエリ後のリセット
  endif;
  ?>
  <!-- end top-blog -->
</main>

<?php get_footer(); ?>