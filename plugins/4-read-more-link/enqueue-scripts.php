<?php
add_action( 'wp_enqueue_scripts', 'irm_scripts' );
function irm_scripts() {
  $plugin_url = plugins_url( '/', __FILE__ );
  wp_enqueue_style(
	'irm-style',
	$plugin_url . 'style.css'
  );

  wp_enqueue_script(
	'irm-script',
	$plugin_url . 'script.js',
	array( 'jquery' ),
	'1.0.0',
	true
  );
}