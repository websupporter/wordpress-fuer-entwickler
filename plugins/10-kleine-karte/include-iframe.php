<?php
add_filter( 'the_content', 'karte_vor_content' );
function karte_vor_content( $content ){
  $lat = get_post_meta( get_the_ID(), 'lat', true );
  $lon = get_post_meta( get_the_ID(), 'lon', true );

  if( empty( $lat ) || empty( $lon ) )
      return $content;

  $url  = 'https://www.bing.com/maps/embed?h=400&w=500&lvl=12&cp=';
  $url .= $lat . '~' . $lon;
  $map  = '<iframe 
    scrolling="no" 
    style="width:500px;height:400px;"
    src="' . $url . '">
    </iframe>
  ';

  return $map . $content;
}