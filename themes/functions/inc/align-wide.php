<?php
function support_align_wide() {
  add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'support_align_wide' );