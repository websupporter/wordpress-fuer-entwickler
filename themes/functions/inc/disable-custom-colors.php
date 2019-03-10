<?php
function entferne_farbwaehler() {
  add_theme_support( 'disable-custom-colors');
}
add_action( 'after_setup_theme', 'entferne_farbwaehler' );