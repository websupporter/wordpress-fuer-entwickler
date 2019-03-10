<?php
add_action( 'after_setup_theme', 'registriere_bildgroessen');
function registriere_bildgroessen() {
    add_image_size( 'vorschau', 220, 180 );
}

add_filter( 'image_size_names_choose', 'bildergroessen_benennen' );
function bildergroessen_benennen( $groessen ) {
    return array_merge(
        $groessen,
        array(
            'vorschau' => 'Vorschau',
        ) );
}