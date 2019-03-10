<?php
function post_formats() {
  add_theme_support( 'post-formats', array( 'link' ) );
}
add_action( 'after_setup_theme', 'post_formats' );