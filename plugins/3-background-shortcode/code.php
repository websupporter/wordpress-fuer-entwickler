<?php
add_shortcode( 'hintergrund', 'mein_shortcode' );
function mein_shortcode( $attr, $content ){
  $string = '<span style="background-color:'.$attr['farbe'].'">';
  $string .= $content;
  $string .= '</span>';
  return $string;
}