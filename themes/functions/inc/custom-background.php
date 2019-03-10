<?php
function background(){
  add_theme_support( 'custom-background' );
}
add_action( 'after_setup_theme', 'background' );