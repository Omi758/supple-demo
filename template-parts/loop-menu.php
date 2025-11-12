<div class="menu-item-img">
  <?php if ( has_post_thumbnail() ): ?>
  <?php the_post_thumbnail("medium"); ?>
  <?php else: ?>
  <img width="560" height="560"
    src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/pic-menu-coffee.jpg'); ?>"
    alt="エントランスブレンドのコーヒー豆の画像" loading="lazy" />
  <?php endif; ?>
</div>

<div class="menu-item-info">
  <h2 class="menu-item-name"><?php the_title(); ?></h2>
  <p class="menu-item-price"><?php the_field("price"); ?></p>
  <p class="menu-item-description"><?php the_content(); ?>
  </p>
</div>