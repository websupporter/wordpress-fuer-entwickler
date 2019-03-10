<?php
add_shortcode( 'angesehen', 'mein_shortcode' );
function mein_shortcode( $attr ){
    $string  = '<p>Angesehen am: ';
    $string .= date( $attr['format'], time() );
    $string .= '</p>';
    return $string;
}