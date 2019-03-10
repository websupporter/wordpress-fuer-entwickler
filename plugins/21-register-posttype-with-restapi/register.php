<?php
add_action( 'init', 'registriere_meinen_posttype' );
function registriere_meinen_posttype(){
    $args = array(
        'label'        => 'Produkte',
        'public'       => true,
        'show_in_rest' => true,
    );
    register_post_type( 'products', $args );
}