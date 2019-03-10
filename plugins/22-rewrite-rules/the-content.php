<?php
add_filter( 'the_content', 'ext_add_link' );
function ext_add_link( $content ){
    global $post;
    $link = get_post_meta( get_the_ID(), 'externer-link', true );
    if( ! empty( $link ) ){
        $link = '<a href="';
        $link .= get_bloginfo('url').'/ext/'.$post->post_name.'/"';
        $link .= 'rel="nofollow">';
        $link .= 'Linktext';
        $link .= '</a>';
        $content .= $link;
    }
    return $content;
}