<?php
$file = __DIR__ . '/index.php';
function ext_activate() {
    ext_init();
    flush_rewrite_rules();
}
register_activation_hook( $file, 'ext_activate' );
function ext_deactivate() {
    flush_rewrite_rules();
}
register_deactivation_hook( $file, 'ext_deactivate' );
