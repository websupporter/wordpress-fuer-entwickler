<?php
add_action( 'template_redirect', 'ext_redirect', 0 );
function ext_redirect(){
  $ext_query = get_query_var( 'ext' );
  if( ! empty( $ext_query ) ){
    $args = array(
      'name' => $ext_query
    );
    $query = new WP_Query( $args );
    if( $query->have_posts() ){
      while( $query->have_posts() ){
        $query->the_post();
        $link = get_post_meta(get_the_ID(), 'externer-link', true);
        if( ! empty( $link ) ){
          wp_redirect( $link, 301 );
          die();
        }
      }
    }
  }
}