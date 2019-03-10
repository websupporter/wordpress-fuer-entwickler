<?php
function i18n_init() {
    $verzeichnis = dirname( plugin_basename( __FILE__ ) );
    $verzeichnis .= '/language/';
    load_plugin_textdomain( '20-translate', false, $verzeichnis );
}
add_action('plugins_loaded', 'i18n_init');