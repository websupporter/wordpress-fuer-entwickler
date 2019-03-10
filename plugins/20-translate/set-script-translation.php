<?php
add_action('wp_enqueue_scripts', 'uebersetzbare_scripte');
function uebersetzbare_scripte() {
    wp_enqueue_script(
        'uebersetzbar',
        plugins_url('assets/js/with-wp-i18n.js', __FILE__),
        array('wp-i18n')
    );

    $verzeichnis = dirname(__FILE__) . '/language/';
    wp_set_script_translations(
        'uebersetzbar',
        '20-translate',
        $verzeichnis
    );
}