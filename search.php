<?php get_header(); ?>
<main>
  <!-- page-kv -->
  <div class="c-page-kv c-page-kv--shoplist">
    <div class="l-container-l">
      <h1 class="c-title-level1 c-title-level1--white">shoplist</h1>
    </div>
  </div>
  <!-- end page-kv -->

  <div class="u-ptb">
    <div class="l-container-l">

      <!-- shop-search -->
      <div class="c-search">
        <p>店舗検索</p>

        <form method="get" action="<?php echo esc_url( home_url( "/" ) ); ?>">
          <!-- 検索結果ページでもpost_typeを維持 -->
          <input type="hidden" name="post_type" value="shoplist">

          <div class="c-search-form-inner">
            <div class="c-search-text">
              <input type="text" name="s" placeholder="検索" value="<?php echo esc_attr( get_search_query() ); ?>">
            </div>

            <?php
            // 現在選択されているエリアを取得_三項演算子
            $selected_area = isset($_GET['area']) ? sanitize_text_field($_GET['area']) : '';
             ?>

            <select size="1" id="area-select" class="c-search-area-select" name="area">
              <option value="" <?php echo $selected_area === "" ? 'selected' : '';?>>---</option>
              <option value="北海道" <?php echo $selected_area === "北海道" ? 'selected' : '';?>>北海道</option>
              <option value="東北" <?php echo $selected_area === "東北" ? 'selected' : '';?>>東北</option>
              <option value="関東" <?php echo $selected_area === "関東" ? 'selected' : '';?>>関東</option>
              <option value="中部" <?php echo $selected_area === "中部" ? 'selected' : '';?>>中部</option>
              <option value="近畿" <?php echo $selected_area === "近畿" ? 'selected' : '';?>>近畿</option>
              <option value="中国" <?php echo $selected_area === "中国" ? 'selected' : '';?>>中国</option>
              <option value="四国" <?php echo $selected_area === "四国" ? 'selected' : '';?>>四国</option>
              <option value="九州沖縄" <?php echo $selected_area === "九州沖縄" ? 'selected' : '';?>>九州沖縄</option>
            </select>

            <div class="c-search-button">
              <input type="submit" value="検索">
            </div>
          </div>
        </form>
      </div>
      <!-- end shop-search -->


      <!-- shoplist -->
      <div class="shoplist-list">
        <?php if( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part("template-parts/loop", "shoplist"); ?>
        <?php endwhile; ?>
        <?php else : ?>
        <?php
            // 検索が実行されていて結果が0件の場合
            if ( get_search_query() || isset($_GET['area']) ) :
            ?>
        <p>検索条件にヒットする店舗はありません。</p>
        <?php endif; ?>
        <?php endif; ?>
      </div>
      <!-- end shoplist -->

    </div>
  </div>
</main>

<?php get_footer(); ?>