<?php
function custom_header(){
  $url = get_template_directory_uri();
  $default_image = "$url/assets/images/header.jpg";
  $args = array(
    'width'         => 980,
    'height'        => 60,
    'default-image' => $default_image,
  );
  add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'custom_header' );