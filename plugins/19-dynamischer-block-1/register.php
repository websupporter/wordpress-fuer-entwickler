<?php
function register_current_time_block() {
    wp_register_script(
        'current-time',
        plugins_url( 'assets/js/blocks/block.js', __FILE__ ),
        array( 'wp-blocks', 'wp-components' )
    );

    register_block_type( 'example/current-time', array(
        'editor_script'   => 'current-time',
        'render_callback' => 'render_current_time',
    ) );
}
add_action( 'init', 'register_current_time_block');


function render_current_time( $args ) {
    $string = '<p>Angesehen am: ';
    $string .= date( 'Y-m-d H:i:s', time() );
    $string .= '</p>';
    return $string;
}