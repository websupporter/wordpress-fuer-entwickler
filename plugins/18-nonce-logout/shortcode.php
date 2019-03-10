<?php
add_shortcode( 'logoutlink', 'logoutlink' );
function logoutlink(){
    $link = wp_nonce_url(
        get_permalink() . '?logout=1',
        'logout-' . get_current_user_id(),
        'logout_nonce'
    );
    return '<a href="' . $link . '">Logout</a>';
}
