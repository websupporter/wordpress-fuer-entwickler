<?php
function adminscripts( $hook ){
    if ( 'toplevel_page_np' !== $hook )
        return;

    wp_enqueue_script(
        'my_custom_script',
        plugin_dir_url( __FILE__ ) . 'myscript.js'
    );
}
add_action( 'admin_enqueue_scripts', 'adminscripts' );