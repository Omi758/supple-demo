    <?php get_header(); ?>
    <main>
      <!-- page-kv -->
      <div class="c-page-kv c-page-kv--blog">
        <div class="l-container-l">
          <p class="c-title-level1 c-title-level1--white">blog & news</p>
        </div>
      </div>
      <!-- end page-kv -->

      <!-- single -->
      <div class="u-ptb">
        <div class="l-container-s">
          <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
          <article class="single-article">
            <div class="single-thumbnail">
              <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail("large", array('alt' => esc_attr(get_the_title()), 'loading' => 'lazy')); ?>
              <?php else : ?>
              <img width="1920" height="1180"
                src="<?php echo esc_url( get_template_directory_uri(). "/assets/img/single-thumb-post.jpg" ); ?>"
                alt="<?php echo esc_attr(get_the_title()); ?>" loading="lazy" />
              <?php endif; ?>
            </div>

            <div class="single-date">
              <time datetime="<?php the_time("Y-m-d"); ?>" class="c-date"><?php the_time("Y/m/d"); ?></time>
            </div>

            <h1 class="single-title"><?php echo esc_html(get_the_title()); ?></h1>

            <div class="single-contents">
              <?php the_content(); ?>
            </div>
          </article>
          <?php endwhile ?>
          <?php endif; ?>
        </div>
      </div>
      <!-- end single -->
    </main>
    <?php get_footer(); ?>