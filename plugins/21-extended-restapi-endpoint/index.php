<?php
/**
 * Plugin Name: Erweiterter Rest API Endpoint
 * Author: Websupporter
 * Author URI: https://websupporter.net
 **/
require_once __DIR__ . '/endpoint.php';
require_once __DIR__ . '/validate.php';

add_action(
    'rest_api_init',
    function () {

        require_once __DIR__ . '/register.php';
    }
);
