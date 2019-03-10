<?php
function editor_font_size() {
  add_theme_support(
    'editor-font-sizes',
    array(
      array(
        'name' => 'klein',
        'shortName' => 'K',
        'size' => 10,
        'slug' => 'klein'
      ),
      array(
        'name' => 'normal',
        'shortName' => 'N',
        'size' => 16,
        'slug' => 'normal'
      ),
      array(
        'name' => 'groß',
        'shortName' => 'G',
        'size' => 36,
        'slug' => 'gross'
      ),
    )
  );
}
add_action( 'after_setup_theme', 'editor_font_size' );