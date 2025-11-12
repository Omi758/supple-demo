<?php
get_header(); ?>
<main>
  <!-- page-kv -->
  <div class="c-page-kv c-page-kv--blog">
    <div class="l-container-l">
      <h1 class="c-title-level1 c-title-level1--white">blog & news</h1>
    </div>
  </div>
  <!-- end page-kv -->

  <!-- blog -->
  <div class="u-ptb">
    <div class="l-container">
      <?php if ( have_posts() ) : ?>
      <div class="c-posts c-posts--col3">
        <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( "template-parts/loop", "blog"); ?>

        <?php endwhile; ?>
      </div>

      <!-- pagination -->
      <?php 
       $pagination = paginate_links(array(
        "prev_text" => '<span class="u-visually-hidden">前のページ</span>',
        "next_text" => '<span class="u-visually-hidden">次のページ</span>',
        "type" => "array"
       ));

       if($pagination) : ?>
      <nav class="c-pagination">
        <?php foreach ($pagination as $page) : ?>
        <?php
if (strpos($page, 'prev') !== false) {
  $page = preg_replace('/class="[^"]*prev[^"]*"/', 'class="c-pagination-item c-pagination-item--prev"', $page);
}
elseif (strpos($page, 'next') !== false) {
  $page = preg_replace('/class="[^"]*next[^"]*"/', 'class="c-pagination-item c-pagination-item--next"', $page);
}
elseif (strpos($page, 'current') !== false) {
  $page = preg_replace('/class="[^"]*current[^"]*"/', 'class="c-pagination-item is-pagination-active"', $page);
}
else {
  $page = str_replace('class="page-numbers"', 'class="c-pagination-item"', $page);
}          echo $page;
          ?>
        <?php endforeach; ?>
      </nav>
      <?php endif; ?>
      <!-- end pagination -->

      <?php else : ?>
      <p>投稿が見つかりませんでした。</p>
      <?php endif; ?>
    </div>
  </div>
  <!-- end blog -->
</main>

<?php get_footer(); ?>