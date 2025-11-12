<section class="shoplist-item">
  <div class="shoplist-item-img">
    <?php if (has_post_thumbnail()) : ?>
    <?php the_post_thumbnail("medium"); ?>
    <?php else: ?>
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/noimage.png' ); ?>" alt="イメージ画像がありません。"
      width="648" height="410" loading="lazy" />
    <?php endif ?>
  </div>

  <div class="shoplist-item-info">
    <h2 class="shoplist-item-name"><?php the_title(); ?></h2>

    <?php if( get_field("address") ): ?>
    <p class="shoplist-item-adress"><?php the_field("address"); ?></p>
    <?php endif; ?>
    <?php if( get_field("tel") ): ?>
    <p class="shoplist-item-tel"><?php the_field("tel"); ?></p>
    <?php endif; ?>

    <ul class="shoplist-item-detail">
      <?php 
      $open_time = get_field("business_hours_open");
      $close_time = get_field("business_hours_close");
      if( $open_time && $close_time ): ?>
      <li class="shoplist-item-detail-item">営業時間／<?php echo esc_html($open_time); ?> -
        <?php echo esc_html($close_time); ?></li>
      <?php endif; ?>

      <?php if( get_field("seats") ): ?>
      <li class="shoplist-item-detail-item">席数／<?php the_field("seats"); ?></li>
      <?php endif; ?>

      <?php if( get_field("smoking") ): ?>
      <li class="shoplist-item-detail-item">喫煙／<?php the_field("smoking");?></li>
      <?php endif; ?>

      <!-- 検索結果表示時のみエリア情報を一番最後に表示 -->
      <?php if (is_search() && get_field("area")) : ?>
      <li class="shoplist-item-detail-item">エリア／<?php the_field("area"); ?></li>
      <?php endif; ?>
    </ul>

  </div>
</section>