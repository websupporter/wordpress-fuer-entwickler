<?php
/**
 * Plugin Name: Nonce Login
 **/

add_shortcode( 'login', 'neuer_login' );
function neuer_login() {
    $string  = '<form method="post">';
    $string .= '
    <input type="hidden" name="action" value="neuer_login" />';
    $string .= '<p><label for="user">Benutzername</label>';
    $string .= '<input type="text" id="user" name="user" /></p>';
    $string .= '<p><label for="pwd">Passwort</label>';
    $string .= '<input type="password" id="pwd" name="pwd" /></p>';
    $string .= wp_nonce_field(
        'neuer_login',
        'nonce_field',
        false,
        false
    );
    $string .= '<button>Login</button>';
    $string .= '</form>';
    return $string;
}

function login_prozess() {
    if(
        !isset( $_POST['action'] ) ||
        $_POST['action'] != 'neuer_login'
    )
        return;
    if(
        ! isset( $_POST['nonce_field'] ) ||
        ! wp_verify_nonce( $_POST['nonce_field'], 'neuer_login' )
    )
        return;
    $creds = array();
    $creds['user_login'] = $_POST['user'];
    $creds['user_password'] = $_POST['pwd'];
    $creds['remember'] = false;
    $user = wp_signon( $creds, false );
    if ( is_wp_error( $user ) )
        return;

    wp_redirect( admin_url(), 301 );
    die();
}
add_action( 'template_redirect', 'login_prozess' );