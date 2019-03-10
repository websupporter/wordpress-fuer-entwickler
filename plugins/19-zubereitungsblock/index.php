<?php
/**
 * Plugin Name: Zubereitungsblock (Ein Block in ES6/JSX)
 * Author: Websupporter
 * Author URI: https://websupporter.net
 **/

function register_zubereitung_block() {
    wp_register_script(
        'block-zubereitung',
        plugins_url( 'assets/js/blocks/zubereitung.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element' )
    );
    register_block_type( 'rezepte/zubereitung', array(
        'editor_script' => 'block-zubereitung',
    ) );
}
add_action( 'init', 'register_zubereitung_block' );
