<?php
/**
 * Plugin Name: Ausgehende Links maskieren
 **/

add_action( 'init', 'ext_init' );
function ext_init(){
    add_rewrite_rule(
        'ext/([^/]+)/?$',
        'index.php?ext=$matches[1]',
        'top'
    );

    add_rewrite_tag('%ext%','([^/]*)');
}