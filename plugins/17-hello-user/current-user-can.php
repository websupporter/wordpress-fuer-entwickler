<?php
add_action( 'wp_footer', 'kannIch' );
function kannIch(){
    if( current_user_can( 'edit_post', 1 ) ){
        echo 'Der Nutzer kann den Post "' .
            get_the_title( 1 ) . '" editieren.';
    }
}