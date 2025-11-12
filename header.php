<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="format-detection" content="telephone=no" />

  <!-- favicon/webclipicon -->
  <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri(). '/favicon.png' ); ?>" />
  <link rel=" apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri().'/webclip.png' ); ?>" />

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <!-- header -->
  <header class="header">
    <h1 class="header-logo">
      <a href="<?php echo home_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" width="200" height="26"
          alt="supple" />
      </a>
    </h1>

    <a href="https://www.google.com/" class="header-onlineshop" target="_blank" rel="noopener noreferrer">online
      shop</a>


    <nav class="header-nav">
      <?php
    wp_nav_menu(array(
        'theme_location' => 'header',
        'menu_class' => 'header-list',
        'container' => false,
        'fallback_cb' => false,
        'walker' => new Custom_Header_Walker()
    ));
    ?>
    </nav>



  </header>
  <!-- end header -->