<?php
function standard_farbpalette() {
  add_theme_support( 'editor-color-palette',
    array(
      array(
        'name'  => 'Schwarz',
        'slug'  => 'black',
        'color' => '#000',
      ),

      array(
        'name'  => 'Rot',
        'slug'  => 'red',
        'color' => '#f00',
      ),
      array(
        'name'  => 'Grün',
        'slug'  => 'green',
        'color' => '#0f0',
      ),
      array(
        'name'  => 'Blau',
        'slug'  => 'blue',
        'color' => '#00f',
      ),
    )
  );
}
add_action( 'after_setup_theme', 'standard_farbpalette' );