<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tel K. Ganesan — Founder • Investor • Producer</title>
  <meta name="description"
    content="Official personal site of Tel K. Ganesan — Founder of Kyyba & Kyyba Films. Ventures, awards, media, speaking, articles and photos." />

  <link rel="preconnect" href="https://upload.wikimedia.org" crossorigin>
  
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  
  <!-- ===== NAVBAR ===== -->
  <header class="nav">
    <div class="nav-container">
      <a href="<?php echo home_url(); ?>" class="brand">
          <?php
          $custom_logo_id = get_theme_mod( 'custom_logo' );
          $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
          if ( has_custom_logo() ) {
              echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '" class="brand__logo">';
          } else {
              // Fallback
              echo '<img src="' . get_template_directory_uri() . '/img/Tel-K.-Ganesan-logo.webp" alt="Tel K. Ganesan Logo" class="brand__logo">';
          }
          ?>
      </a>
      <nav class="nav__links">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary-menu',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'walker'         => new Tek_Desktop_Walker(),
            'fallback_cb'    => false,
        ) );
        ?>
      </nav>
      <button class="nav__menu button button--ghost" id="menuBtn" aria-label="Open menu">
        <i data-lucide="menu"></i>
      </button>
    </div>
  </header>

  <!-- ===== MOBILE MENU ===== -->
  <dialog id="mobileNav" class="modal">
    <div class="modal__card">
      <div class="modal__header">
        <?php
        if ( has_custom_logo() ) {
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '" class="brand__logo" style="height:30px">';
        } else {
            echo '<img src="' . get_template_directory_uri() . '/img/Tel-K.-Ganesan-logo.webp" alt="Tel K. Ganesan Logo" class="brand__logo" style="height:30px">';
        }
        ?>
        <strong>Menu</strong>
        <button class="button button--ghost" data-close><i data-lucide="x"></i></button>
      </div>
      <div class="modal__body">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary-menu',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'walker'         => new Tek_Mobile_Walker(),
            'fallback_cb'    => false,
        ) );
        ?>
      </div>
    </div>
  </dialog>

  <main id="top">
