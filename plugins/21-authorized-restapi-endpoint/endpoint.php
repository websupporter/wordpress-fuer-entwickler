<?php

add_action('rest_api_init', 'statify_register_delete_rest_route');
function statify_register_delete_rest_route() {
    if ( ! class_exists( Statify_Dashboard::class ) ) {
        return;
    }


    register_rest_route(
        'statify/v1',
        'delete',
        array(
            array(
                'methods'  => 'DELETE',
                'callback' => 'statify_delete_rest_callback',
            ),
        )
    );
}

function statify_delete_rest_callback() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return new WP_Error(
            'not_authorized',
            'You are not allowed to delete entries.',
            array( 'status' => 401 )
        );
    }

    global $wpdb;
    $sql    = 'truncate ' . $wpdb->statify;
    $result = $wpdb->query( $sql );

    if ( false === $result ) {
        return rest_ensure_response(
            array(
                'success' => false,
            )
        );
    }

    return rest_ensure_response(
        array(
            'success' => true,
        )
    );
}
