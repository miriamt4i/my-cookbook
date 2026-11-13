</div><!-- #content -->

<footer id="colophon" class="site-footer">
  <div class="footer-content container-lg">
    <div class="footer-logo">My Cookbook</div>

    <nav aria-labelledby="footer-navigation-title">
      <p id="footer-navigation-title">Navigation</p>

      <?php
      wp_nav_menu( array(
        'theme_location' => 'menu-footer',
        'menu_id'        => 'menu-footer',
      ) );
      ?>
    </nav>
  </div>
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>