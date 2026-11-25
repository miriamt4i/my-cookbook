  </div><!-- #content -->

  <footer id="colophon" class="site-footer">
    <div class="footer-content container-lg">

      <div class="footer-logo">
        My Cookbook
      </div>

      <nav
        class="footer-navigation"
        aria-label="Footer navigation"
      >
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'menu-footer',
            'menu_id'        => 'menu-footer',
            'container'      => false,
            'fallback_cb'    => false,
          )
        );
        ?>
      </nav>

      <div class="footer-illustration">
        <?php
        $footer_cat = is_page(201)
          ? 'footer-cat-light.png'
          : 'footer-cat-dark.png';
        ?>

        <img
          src="<?php echo esc_url(
            get_theme_file_uri('assets/images/' . $footer_cat)
          ); ?>"
          alt=""
          loading="lazy"
          decoding="async"
        >
      </div>

    </div>
  </footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>