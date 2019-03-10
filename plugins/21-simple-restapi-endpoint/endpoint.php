<?php
add_action( 'rest_api_init', 'statify_register_rest_route' );
function statify_register_rest_route() {
  if ( ! class_exists( Statify_Dashboard::class ) ) {
    return;
  }
  register_rest_route(
    'statify/v1',
    'popular',
    array(
      array(
        'methods'  => 'GET',
        'callback' => 'statify_rest_callback',
      ),
    )
  );
}

function statify_rest_callback() {
  if ( ! class_exists( Statify_Dashboard::class ) ) {
    return;
  }

  $popular = [];
  $stats   = Statify_Dashboard::get_stats();
  if ( ! $stats ) {
    return rest_ensure_response( $popular );
  }
  $popular = array_map(
    function ( $item ) {

      $post_id = url_to_postid( $item['url'] );
      if ( ! $post_id || 'post' !== get_post_type( $post_id ) ) {
        return false;
      }

      return [
        'title'   => get_the_title( $post_id ),
        'permalink' => get_permalink( $post_id ),
        'count'   => (int) $item['count'],
      ];
    }, $stats['target']
  );
  $popular = array_filter( $popular,
    function ( $item ) {
      return is_array( $item );
    }
  );

  return rest_ensure_response( $popular );
}