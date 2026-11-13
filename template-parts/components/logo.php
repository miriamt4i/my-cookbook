<?php
/**
 * Site logo component.
 *
 */

$site_name = get_bloginfo( 'name' );
?>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="<?php echo esc_attr( $site_name ); ?>">
    My Cookbook
  </a>
