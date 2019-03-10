<?php
add_filter( 'the_content', 'change_content' );
function change_content( $content ){
    $add = '<p>Abruf des Blogposts: ';
    $add .= date( 'd.m.Y h:i:s', time() ) . '</p>';
    $content = $add . $content;
    return $content;
}