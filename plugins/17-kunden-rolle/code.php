<?php
function kunden_rolle_init(){
    add_role(
        'kunde',
        'Kunde',
        array( 'read' => true, 'buy' => true)
    );
}
$root_datei = __DIR__ . '/index.php';
register_activation_hook( $root_datei, 'kunden_rolle_init' );