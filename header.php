<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="header">
  <div class="container">
    <div class="header-wrapper">
      <?php
        if( is_front_page() ){
            $logo_img = '';
          if( $custom_logo_id = get_theme_mod('custom_logo') ){
            $logo_img = wp_get_attachment_image( $custom_logo_id, 'full', false, array(
              'class'    => 'custom-logo',
              'itemprop' => 'logo',
            ) );
            echo '<div class="logo">' . $logo_img . '<span class="logo-name">' . get_bloginfo( 'name' ) . '</span></div>'; 
          } else {
              echo '<span class="logo-name">' . get_bloginfo( 'name' ) . '</span></div>';
          }
        }
        
        wp_nav_menu( [
          'theme_location'  => 'header_menu',
          'container'       => 'nav', 
          'container_class' => 'header-nav', 
          'menu_class'      => 'header-menu', 
          'echo'            => true,
        ] );
      ?>
      <?php echo get_search_form(); ?>
      <a href="#" class="header-menu-toggle">
      <span></span>
      <span></span>
      <span></span>
      </a>
    </div>
    <!-- header-wrapper -->
  </div>
  <!-- container -->
</header>