<?php
add_action('wp_ajax_get-latest-post', 'ajax_latestpost');
add_action('wp_ajax_nopriv_get-latest-post', 'ajax_latestpost');
function ajax_latestpost(){
  the_latest_post( $_GET['date'] );
  die();
}

function the_latest_post( $time = false){
  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'orderby' => 'date',
    'order' => 'DESC',
    'ignore_sticky_posts' => true
  );
  if( ! $time )
    $time = get_gmt_from_date( date( 'Y-m-d h:i:s', time() ) );

  $query = new WP_Query( $args );
  if( $query->have_posts() ):
    while( $query->have_posts() ):
      $query->the_post();
      $veroeffentlicht = strtotime( get_post_time( 'r', true ) );
      $currentDate = strtotime( $time );
      $interval = $currentDate - $veroeffentlicht;
      if( $interval <= 60 )
        $int_string = 'Vor einer Minute veröffentlicht';
      elseif( $interval <= 5*60 )
        $int_string = 'Vor fünf Minuten veröffentlicht';
      else
        $int_string = '';
      ?>
      <p><?php echo $int_string; ?></p>
      <h3>
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
        </a>
      </h3>
      <?php the_excerpt(); ?>
      <a href="<?php the_permalink(); ?>">weiterlesen</a>
      <?php
    endwhile;
  endif;
  wp_reset_query();
}