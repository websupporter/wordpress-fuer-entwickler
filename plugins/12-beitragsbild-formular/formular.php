<?php
add_filter( 'the_content', 'beitragsbild_formular' );
function beitragsbild_formular( $content ){
  $post_type = get_post_type( get_the_ID() );
  if(
    is_user_logged_in() &&
    post_type_supports( $post_type, 'thumbnail' )
  ){
    $form  = '<div><p>Laden Sie ein Beitragsbild hoch.</p>';
    $form .= '<form method="post" enctype="multipart/form-data">';
    $form .= '<input type="file" name="beitragsbild" />';
    $form .= '<input type="hidden" name="post_id" value="' .
      get_the_ID() . '" />';
    $form .= '<p><button>Hochladen</button></p>';
    $form .= '</form></div>';
    $content = $content . $form;
  }
  return $content;
}