<?php
/**
 * Plugin Name: Use the_content to make keywords strong.
 * Author: Websupporter
 * Author URI: https://websupporter.net
 **/

add_filter( 'the_content', 'make_it_strong' );
function make_it_strong( $content ) {
	$keys = array( 'PHP ', 'WordPress ' );
	foreach ( $keys as $key ) {
		$content = preg_replace(
			'^(' . preg_quote( $key ) . ')^',
			'<strong>$1</strong>',
			$content
		);
	}
	return $content;
}