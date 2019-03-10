<?php
add_action( 'init', 'registriere_meine_taxonomie' );
function registriere_meine_taxonomie() {
    $args = array(
        'label'        => 'Regionen',
        'hierarchical' => true,
    );
    register_taxonomy( 'region', 'post', $args );
}