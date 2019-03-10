<?php
function register_zutaten_block() {
    wp_register_script(
        'block-zutaten',
        plugins_url( 'block.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element' )
    );
    register_block_type( 'rezepte/zutaten', array(
        'editor_script' => 'block-zutaten',
    ) );
}
add_action( 'init', 'register_zutaten_block' );
