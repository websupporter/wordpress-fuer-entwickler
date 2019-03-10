<?php
function neue_metabox() {
    add_meta_box(
        'laengen-und-breitengrad', // ID
        'Längen- und Breitengrad',  // Titel
        'metabox_render', // Render Callback
        'post' // Screen, bzw. Post Type
    );
}
add_action( 'add_meta_boxes', 'neue_metabox' );