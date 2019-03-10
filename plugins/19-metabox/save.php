<?php
add_action( 'save_post', 'metabox_speichern' );
function metabox_speichern( $post_id ){
    if( isset( $_POST['lat'] ) )
        update_post_meta(
            $post_id,
            'lat',
            floatval( $_POST['lat'] )
        );

    if( isset( $_POST['lon'] ) )
        update_post_meta(
            $post_id,
            'lon',
            floatval( $_POST['lon'] )
        );
}