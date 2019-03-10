<?php
add_action( 'template_redirect', 'logout_check' );
function logout_check(){
    if( isset( $_GET['logout'] ) ){
        if (
            !isset($_GET['logout_nonce']) ||
            !wp_verify_nonce(
                $_GET['logout_nonce'],
                'logout-' . get_current_user_id()
            )
        )
            wp_die( 'Fehlerhafter Zugriff' );

        wp_logout();
        wp_redirect( home_url(), 301 );
        die();
    }
}