<?php
/**
 * Plugin Name: Mobil Telefon bei Registrierung angeben
 * Author: Websupporter
 * Author URI: https://websupporter.net
 **/

add_action(
    'register_form',
    'mobil_telefon_feld'
);

function mobil_telefon_feld() {
    ?>
    <p>
        <label
            for="mobil"
        >
            Mobiltelefon
        </label>
    </p>
    <input
        id="mobil"
        name="mobil_telefon"
        type="text"
    >
    <?php
}
require_once __DIR__ . '/user-register.php';