<?php
add_action( 'init', 'registriere_meinen_posttype' );
function registriere_meinen_posttype(){
    $args = array(
        'label'  => 'Produkte',
        'public' => true,
    );
    register_post_type( 'products', $args );
}