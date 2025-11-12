<?php get_header(); ?>
<main>
  <!-- page-kv -->
  <div class="c-page-kv c-page-kv--menu">
    <div class="l-container-l">
      <h1 class="c-title-level1 c-title-level1--white">menu</h1>
    </div>
  </div>
  <!-- end page-kv -->

  <!-- menu -->
  <div class="u-ptb">
    <div class="l-container-s">
      <p class="menu-head-text">使用しているコーヒー豆を紹介します</p>
      <p class="menu-head-text02"><span>SUPPLEでは上質なコーヒー豆を</span><span>世界中から直接輸入しています。</span></p>
      <div class="u-mt menu-block-wrapper">
        <?php
        // Category Order and Taxonomy Terms Order プラグインに対応
        $coffee_terms = get_terms([
            "taxonomy" => "coffee",
            "orderby" => "term_order", // プラグインが管理する順序
            "order" => "ASC", // 昇順
            "hide_empty" => false, // 空のタームも表示
            ]);


        if ( !empty($coffee_terms) ):
        ?>
        <?php foreach ($coffee_terms as $coffee): ?>

        <div class="menu-block">
          <h2 class="menu-title"><?php echo esc_html(strtoupper($coffee->slug)); ?></h2>
          <div class="menu-list">

            <?php
                        // 投稿タイプ
                        $args = [
                            "post_type" => "menu",
                            "posts_per_page" => -1, // 全ての投稿を取得する
                            
                            // カスタム投稿の順序（管理画面のメニューオーダーで調整）
                            "orderby" => "menu_order",
                            "order" => "ASC",
                            ];

                        // 種類で絞り込む
                        $args["tax_query"] = [
                            [
                                "taxonomy" => "coffee",
                                "terms" => $coffee->slug,
                                "field" => "slug",
                            ]
                        ];

                            $the_query = new WP_Query($args);
                            
                        if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <section class="menu-item">
              <?php get_template_part("template-parts/loop", "menu"); ?>
            </section>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>

      </div>
    </div>
  </div>

  <!-- end menu -->
</main>

<?php get_footer(); ?>