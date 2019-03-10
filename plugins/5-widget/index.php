<?php
/**
 * Plugin Name: The Widget
 * Author: Websupporter
 * Author URI: https://websupporter.net
 **/
add_action( 'widgets_init', 'mein_widget' );
function mein_widget(){
	register_widget( 'Mein_Widget' );
}

require_once __DIR__ . '/widget.php';