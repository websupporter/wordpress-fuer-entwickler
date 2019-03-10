<?php
function thumbails() {
    add_theme_support( 'post-thumbnails', array( 'post' ) );
}
add_action( 'after_setup_theme', 'thumbails' );