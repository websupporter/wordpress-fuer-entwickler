<?php
add_action( 'wp_footer', 'userinfo' );
function userinfo(){
    if( ! is_user_logged_in() ){
        echo 'Nicht eingeloggt';
        return;
    }
    $user = wp_get_current_user();
    echo 'Hallo ' . $user->first_name;
}