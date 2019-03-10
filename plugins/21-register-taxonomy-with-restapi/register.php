<?php
add_action( 'init', 'registriere_meine_taxonomie' );
function registriere_meine_taxonomie() {
    $args = array(
        'label'        => 'Regionen',
        'show_in_rest' => true,
        'rest_base'    => 'location',
    );
    register_taxonomy( 'region', 'post', $args );
}