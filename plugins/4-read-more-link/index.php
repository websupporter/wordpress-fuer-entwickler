<?php
/**
* Plugin Name: Inline Read More
* Plugin URI: http://www.websupporter.net/plugin/
* Description: Beschreibung des Plugins
* Version: 1.0
* Author: Websupporter
* Author URI: http://www.websupporter.net/
* License: GPL2
*/

add_shortcode( 'read_more_inline', 'rm_inline' );
function rm_inline( $attr, $content ){
    $string  = '<span class="read_more_inline">';
    $string .= '<a href="#" class="read_more_title">';
    $string .= $attr['title'];
    $string .= '</a><span class="read_more_body">';
    $string .= $content;
    $string .= '</span></span>';

    return $string;
}

require_once __DIR__ . '/enqueue-scripts.php';