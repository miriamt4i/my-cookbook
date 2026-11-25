<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">

  <header id="masthead" class="site-header">
    <div class="site-branding">
      <?php get_template_part('template-parts/components/logo'); ?>
    </div>

    <button
      class="menu-backdrop"
      type="button"
      aria-label="Close menu"
      tabindex="-1"
      hidden
    ></button>

    <nav id="site-navigation" class="main-navigation">
      <button
        class="menu-toggle"
        type="button"
        aria-controls="primary-menu-panel"
        aria-expanded="false"
        aria-label="Open menu"
      >
        <span class="menu-toggle-label">Menu</span>

        <span class="menu-toggle-icon" aria-hidden="true">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </button>

      <div id="primary-menu-panel" class="main-menu-container">
        <div class="mobile-menu-brand">
          <?php get_template_part('template-parts/components/logo'); ?>
        </div>

        <?php
        wp_nav_menu([
          'theme_location' => 'menu-main',
          'menu_id'        => 'menu-main',
          'menu_class'     => 'main-menu',
          'container'      => false,
        ]);
        ?>
      </div>
    </nav>
  </header>

  <div id="content" class="site-content">