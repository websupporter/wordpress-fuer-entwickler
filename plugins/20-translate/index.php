<?php
/**
 * Plugin Name: Übersetzbares Plugin
 * Author: Websupporter
 * Author URI: https://websupporter.net
 * Text Domain: 20-translate
 * Domain Path: /language
 **/

require_once __DIR__ . '/register.php';
require_once __DIR__ . '/localize-script.php';
require_once __DIR__ . '/set-script-translation.php';


add_shortcode('uebersetzbar', function() {
    ob_start();
    require __DIR__ . '/strings.php';
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
});