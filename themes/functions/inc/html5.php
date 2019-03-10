<?php
function html5_support(){
  add_theme_support(
    'html5',
    array(
      'comment-list',
      'comment-form',
      'search-form',
    )
  );
}
add_action( 'after_setup_theme', 'html5_support' );