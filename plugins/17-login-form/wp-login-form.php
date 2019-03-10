<?php
add_shortcode( 'login', 'my_login' );
function my_login(){
    if( is_user_logged_in() )
        return;
    return wp_login_form( array( 'echo' => false ) );
}