<?php
function toptencomments(){
  $paged = ( isset( $_GET['tcPage'] ) ) ? (int)$_GET['tcPage'] : 1;
  $link = add_query_arg(array(
        '%_%' => '',
  ), get_the_permalink());

  $args = array(
    'paged'               => $paged,
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => 10,
    'order'               => 'desc',
    'orderby'             => 'comment_count',
    'ignore_sticky_posts' => true,
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
  $string .= paginate_links( array(
    'base'    => $link,
    'format'  => 'tcPage=%#%',
    'current' => $paged,
    'total'   => $the_query->max_num_pages
  ) );
  wp_reset_postdata();
  return $string;
}