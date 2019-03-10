<?php
function plugin_scripts(){
    wp_enqueue_script(
        'my-script',
        plugins_url( 'assets/js/translate.js', __FILE__ )
    );

    $texte = array(
        'hello_world' => __( 'Hello world!', '20-translate' )
    );
    wp_localize_script( 'my-script', 'textObjekt', $texte );
}
add_action( 'wp_enqueue_scripts', 'plugin_scripts' );