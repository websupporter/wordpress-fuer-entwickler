<?php
/**
 * Plugin Name: Login Form
 * Plugin URI: http://websupporter.net/
 **/

if( !session_id() )
    session_start();
require_once __DIR__ . '/wp-login-form.php';
require_once __DIR__ . '/secure-question.php';