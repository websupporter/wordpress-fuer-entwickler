<?php
add_action( 'after_setup_theme', 'thumbnail_aendern' );
function thumbnail_aendern(){
  set_post_thumbnail_size( 120, 120, true );
}