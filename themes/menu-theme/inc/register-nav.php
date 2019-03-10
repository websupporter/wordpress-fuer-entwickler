<?php
function register_menu(){
    register_nav_menu( 'header', 'Top Menü' );
}
add_action( 'after_setup_theme', 'register_menu' );