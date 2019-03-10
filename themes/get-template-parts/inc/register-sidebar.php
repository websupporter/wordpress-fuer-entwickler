<?php
function sidebar_registrieren() {
    register_sidebar( array(
        'name' => 'Haupt-Sidebar',
        'id' => 'sidebar-1',
        'description' => 'Beschreibung der Hauptsidebar.',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
        'before_widget' => '<li>',
        'after_widget' => '</li>' ,
    ) );
}
add_action( 'widgets_init', 'sidebar_registrieren' );