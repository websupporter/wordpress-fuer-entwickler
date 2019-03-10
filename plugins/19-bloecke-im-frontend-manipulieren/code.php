<?php
add_filter('render_block', 'bilder_fuer_nutzer', 10, 2 );
function bilder_fuer_nutzer( $content, $block ) {

  if ('core/image' != $block['blockName'] || is_user_logged_in()) {
      return $content;
  }
  return '';
}