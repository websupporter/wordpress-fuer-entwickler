<?php
/**
 * Plugin Name: Rezepte
 * Author: Websupporter
 */

add_action( 'init', 'rezept_register_posttype' );
function rezept_register_posttype() {

  register_post_type(
    'rezepte',
    array(
      'label'        => 'Rezepte',
      'show_in_rest' => true,
      'public'       => true,
      'template'     => array(
        array(
          'core/gallery',
          array(
            'align'     => 'center',
            'columns'   => 2,
            'imageCrop' => false,
            'linkTo'    => 'attachment',
            'images'    => array(
              array(
                'url'     => 'https://picsum.photos/g/300/200/',
                'alt'     => 'Der Alternativtext',
                'caption' => 'Der Caption Text',
                'link'    => 'https://picsum.photos',
              ),
              array(
                'url'     => 'https://picsum.photos/g/300/200/',
                'alt'     => 'Der Alternativtext',
                'caption' => 'Der Caption Text',
                'link'    => 'https://picsum.photos',
              ),
              array(
                'url'     => 'https://picsum.photos/g/300/200/',
                'alt'     => 'Der Alternativtext',
                'caption' => 'Der Caption Text',
                'link'    => 'https://picsum.photos',
              ),
              array(
                'url'     => 'https://picsum.photos/g/300/200/',
                'alt'     => 'Der Alternativtext',
                'caption' => 'Der Caption Text',
                'link'    => 'https://picsum.photos',
              ),
            ),
          ),
        ),


        array(
          'core/heading',
          array(
            'content' => 'Zutaten',
          ),
        ),
        array(
          'core/list',
          array(
            'ordered' => false,
            'values'  => '<li>Mehl</li><li>Zucker</li>',
          ),
        ),
        array(
          'core/separator',
        ),
        array(
          'core/heading',
          array(
            'content' => 'Zubereitung',
          ),
        ),
        array(
          'core/paragraph',
          array(
            'placeholder' => 'Füge die Kochschritte hinzu.',
          ),
        ),
      ),
      'template_lock' => 'all',
    )
  );
}
