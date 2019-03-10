<?php
add_action( 'init', 'produkte_posttype', 11 );
function produkte_posttype(){
    add_post_type_support(
        'products',
        array( 'thumbnail', 'comments' )
    );
}