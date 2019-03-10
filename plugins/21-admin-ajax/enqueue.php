<?php
function latestposts_scripts(){
    wp_enqueue_script(
        'latest-post-script',
        plugins_url( 'assets/js/script.js', __FILE__ ),
        array( 'jquery' )
    );

    $latestPostObjekt = array(
        'ajaxURL' => admin_url('admin-ajax.php')
    );

    wp_localize_script(
        'latest-post-script',
        'latestPostObjekt',
        $latestPostObjekt
    );
}
add_action( 'wp_enqueue_scripts', 'latestposts_scripts' );