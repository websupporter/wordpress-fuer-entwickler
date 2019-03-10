<?php
function theme_scripts() {
  $template = get_template_directory_uri();
  $url = "$template/style.css";
  wp_enqueue_style(
    'theme-styles',
    $url,
    array(),
    '1.0'
  );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );