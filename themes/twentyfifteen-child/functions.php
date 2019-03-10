<?php
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles' );
function child_enqueue_styles() {
    wp_enqueue_style(
        'eltern-style',
        get_template_directory_uri() . '/style.css'
    );
    wp_enqueue_style(
        'style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'eltern-style' )
    );
}