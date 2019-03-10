<?php
/**
 * Plugin Name: Eine Beitrags-API
 **/

add_filter( 'query_vars', 'mba_query_vars', 0 );
function mba_query_vars( $vars ){
  $vars[] = 'output';
  return $vars;
}
add_action( 'init', 'mba_rewrite' );
function mba_rewrite(){
  add_rewrite_endpoint( 'output', EP_PERMALINK );
}
add_action( 'template_redirect', 'mba_redirect', 0 );
function mba_redirect(){
  $json = get_query_var( 'output' );
  if( 'json' != $json  )
    return;

  if( ! is_search() && ! is_single() )
    return;

  mba_output();
  exit;
}

function mba_output(){
  global $wp_query;
  $response = (object) array(
    'status' => 404,
    'msg' => 'Not found',
    'type' => 'overview',
    'posts' => array()
  );
  if( is_single() ){
    $response->type = 'single';
  } else {
    $response->type = 'overview';
  }
  if( $wp_query->found_posts > 0 ){
    $posts = array();
    foreach( $wp_query->posts as $key => $val ){
      $post = array();
      $post['ID'] = $val->ID;
      $post['title'] = get_the_title( $val->ID );
      if( is_single() )
        $post['content'] = apply_filters(
          'the_content',
          $val->post_content
        );
      if( is_single() && has_post_thumbnail( $val->ID ) )
        $post['image'] = wp_get_attachment_image_src(
          get_post_thumbnail_id( $val->ID )
        );

      if( ! is_single() )
        $post['link'] = get_permalink( $val->ID ) . 'output/json/';
      else
        $post['link'] = get_permalink( $val->ID );
      $posts[] = $post;
    }
    $response->status = 200;
    $response->msg = 'found';
    $response->posts = $posts;
  }
  header('content-type: application/json; charset=utf-8');
  echo json_encode( $response );
}