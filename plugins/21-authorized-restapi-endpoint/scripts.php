<?php
add_action( 'wp_enqueue_scripts', 'statify_rest_api_scripts' );
add_action( 'admin_enqueue_scripts', 'statify_rest_api_scripts' );
function statify_rest_api_scripts() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    wp_enqueue_script(
        'statify-rest-delete',
        plugins_url( 'assets/js/script.js', __FILE__ ),
        array( 'jquery' )
    );

    wp_localize_script(
        'statify-rest-delete',
        'StatifyRest',
        array(
            'route' => esc_url_raw(
                rest_url( 'statify/v1/delete' )
            ),
            'nonce' => wp_create_nonce( 'wp_rest' ),
        )
    );
}

add_action( 'admin_bar_menu', 'statify_add_delete_button', 80 );
function statify_add_delete_button( $wp_admin_bar ) {

    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    $wp_admin_bar->add_menu(
        array(
            'id'    => 'statify-delete',
            'title' => 'Delete',
            'href'  => '#',
        )
    );
}