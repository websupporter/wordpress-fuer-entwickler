<?php
/**
 * Plugin Name: Prevent Double Images
 */
add_action('enqueue_block_editor_assets', 'double_images_script');
function double_images_script() {
    wp_enqueue_script(
        'doppelte-bilder',
        plugins_url( '/script.js', __FILE__ ),
        array( 'wp-data', 'wp-editor', 'wp-notices' )
    );
}