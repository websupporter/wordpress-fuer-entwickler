<?php
/**
 * The template for displaying the header
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <!--[if lt IE 9]>
  <script src="<?php
  echo esc_url( get_template_directory_uri() );
  ?>/js/html5.js"></script>
  <![endif]-->
  <script>
    (function(){document.documentElement.className='js'})();
  </script>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <a
        href="<?php echo home_url(); ?>"
        title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
        <img
            alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
            src="<?php header_image(); ?>"
            height="<?php echo get_custom_header()->height; ?>"
            width="<?php echo get_custom_header()->width; ?>" />
    </a>
</header><main>