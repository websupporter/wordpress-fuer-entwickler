<?php
/**
 * Plugin Name: TopTenComments (2)
 * Plugin URI: http://websupporter.net/
 * Description: Eine Liste der am meisten kommentierten Beitraege.
 * Author: Websupporter
 * Version: 1.0
 * Author URI: http://websupporter.net/
 **/

add_shortcode( 'toptencomments', 'toptencomments' );
require_once __DIR__ . '/code.php';