<?php
/**
 * Plugin Name: TopTenComments (1)
 * Plugin URI: http://websupporter.net/
 * Description: Eine Liste der am meisten kommentierten Beitraege.
 * Author: Websupporter
 * Version: 1.0
 * Author URI: http://websupporter.net/
 **/
add_shortcode( 'toptencomments', 'toptencomments' );
function toptencomments(){
  $args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 10,
    'order'          => 'desc',
    'orderby'        => 'comment_count',
  );
  $the_query = new WP_Query( $args );

  $string = '';
  if ( $the_query->have_posts() ) {
    $string .= '<ol>';
    while ( $the_query->have_posts() ) {
      $the_query->the_post();
      $string .= '<li>';
      $string .= '<a href="' . get_permalink() . '">';
      $string .= get_the_title();
      $string .= '</a></li>';
    }
    $string .= '</ol>';
  }
  wp_reset_postdata();
  return $string;
}