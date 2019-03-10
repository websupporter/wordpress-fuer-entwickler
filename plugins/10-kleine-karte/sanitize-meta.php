<?php
function sanitize_lat_lon_meta( $val ) {
    $val = str_replace( ',', '.', $val );
    if( !is_numeric( $val ) )
        return 0;
    return $val;
}

add_filter( 'sanitize_post_meta_lat', 'sanitize_lat_lon_meta' );
add_filter( 'sanitize_post_meta_lon', 'sanitize_lat_lon_meta' );