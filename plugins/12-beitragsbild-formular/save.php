<?php
add_action( 'init', 'beitragsbild_save' );
function beitragsbild_save(){
    if(
        ! is_user_logged_in() ||
        ! isset( $_FILES['beitragsbild'] )
    )
        return;


    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    require_once( ABSPATH . 'wp-admin/includes/media.php' );

    $post_id = (int) $_POST['post_id'];
    $attachment_id = media_handle_upload(
        'beitragsbild',
        $post_id
    );

    if ( ! is_wp_error( $attachment_id ) ) {
        update_post_meta(
            $post_id,
            '_thumbnail_id',
            $attachment_id
        );
    }
}