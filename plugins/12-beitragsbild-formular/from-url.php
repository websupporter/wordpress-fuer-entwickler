<?php
add_action( 'save_post', 'get_beitragsbild' );
function get_beitragsbild( $post_id ){
    $url = get_post_meta( $post_id, 'beitragsbild', true );
    if( filter_var( $url, FILTER_VALIDATE_URL) === FALSE )
        return;
    $file_array['tmp_name'] = download_url( $url );
    if( is_wp_error( $file_array['tmp_name'] ) ){
        unlink( $file_array['tmp_name'] );
        return;
    }
    $file_array['name'] = basename( $url );
    $attachment_id = media_handle_sideload(
        $file_array,
        $post_id,
        ''
    );
    unlink( $file_array['tmp_name'] );
    update_post_meta( $post_id, '_thumbnail_id', $attachment_id );
    delete_post_meta( $post_id, 'beitragsbild' );
}