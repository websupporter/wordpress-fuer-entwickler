<?php
/**
 * Plugin Name: Editierbare Blöcke
 * Author: Websupporter
 * Author URI: https://websupporter.net
 **/

function register_editierbare_bloecke() {
    wp_register_script(
        'block-rezeptzeiten',
        plugins_url( 'assets/js/blocks/rezeptzeiten.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element' )
    );
    register_block_type( 'rezepte/zeiten', array(
        'editor_script' => 'block-rezeptzeiten',
    ) );


    wp_register_script(
        'block-richtext',
        plugins_url( 'assets/js/blocks/richtext.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-editor' )
    );
    register_block_type( 'plugin/richtext', array(
        'editor_script' => 'block-richtext',
    ) );


    wp_register_script(
        'block-mediaupload',
        plugins_url( 'assets/js/blocks/mediaupload.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-editor' )
    );
    register_block_type( 'plugin/mediaupload', array(
        'editor_script' => 'block-mediaupload',
    ) );


    wp_register_script(
        'block-alignment',
        plugins_url( 'assets/js/blocks/alignment.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-editor' )
    );
    register_block_type( 'plugin/alignment', array(
        'editor_script' => 'block-alignment',
    ) );


    wp_register_script(
        'block-spacing',
        plugins_url( 'assets/js/blocks/spacing.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' )
    );
    register_block_type( 'plugin/spacing', array(
        'editor_script' => 'block-spacing',
    ) );


    wp_register_script(
        'block-inspector',
        plugins_url( 'assets/js/blocks/inspector.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' )
    );
    register_block_type( 'plugin/blockwithinspector', array(
        'editor_script' => 'block-inspector',
    ) );
}
add_action( 'init', 'register_editierbare_bloecke' );
