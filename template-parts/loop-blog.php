<!-- blog thumbnail -->
<article id="post-<?php the_ID(); ?>" <?php post_class("c-post"); ?>>
  <a href="<?php the_permalink(); ?>" class="c-post-thumbnail">
    <?php if ( has_post_thumbnail() ): ?>
    <?php the_post_thumbnail("medium", array("alt" => esc_attr(get_the_title()))); ?>
    <?php else: ?>
    <img src="<?php echo esc_url( get_template_directory_uri() . "/assets/img/noimage.png" ) ?>" alt="">
    <?php endif; ?>
  </a>
  <div class="c-post-date">
    <time datetime="<?php the_time("c"); ?>" class="c-date"><?php the_time("Y/m/d"); ?></time>
  </div>
  <h3 class="c-post-title">
    <a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title()); ?></a>
  </h3>
</article>