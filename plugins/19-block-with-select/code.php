<?php
add_action( 'init', 'register_zubereitung_block' );
function register_zubereitung_block() {
    wp_register_script(
        'block-zubereitung',
        plugins_url( 'assets/js/blocks/zubereitung.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-data', 'wp-editor' )
    );
    register_block_type( 'rezepte/zubereitung', array(
        'editor_script' => 'block-zubereitung',
        'render_callback' => function($args) {
            $vegan_category = 5;
            if ( in_category($vegan_category) ) {
                return '<h2>Vegane Zubereitung</h2>';
            }
            return '<h2>Zubereitung</h2>';
        },
    ) );
}