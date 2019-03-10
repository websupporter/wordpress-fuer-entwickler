<?php
add_shortcode( 'registerform', 'registerform' );
function registerform(){
  if( is_user_logged_in() ){
    $string = '<div class="message">Du bist schon';
    $string .= ' eingeloggt.</div>';
    return $string;
  }

  $errormsg = array();
  $new_user = false;
  if(
    isset( $_POST['action'] )
    && 'reg' === $_POST['action']
  ){
    $user = trim( sanitize_text_field( $_POST['username'] ) );
    $email = trim( sanitize_text_field( $_POST['email'] ) );
    $telefon = trim( sanitize_text_field( $_POST['telefon'] ) );

    if( false !== username_exists( $user ) )
      $errormsg[] = 'Der Nutzer existiert schon';
    if( false !== email_exists( $_POST['email'] ) )
      $errormsg[] = 'Diese Email-Adresse ist registriert';
    if( ! is_email( $email ) )
      $errormsg[] = 'Bitte gebe Deine Email an.';
    if( empty( $telefon ) )
      $errormsg[] = 'Bitte gebe Dein Telefon an.';

    if( count( $errormsg ) == 0 ){
      $pwd = wp_generate_password();
      $user_id = wp_create_user(
        $user, $pwd, $email
      );

      if( is_wp_error( $user_id ) )
        $errormsg[] = 'Unbekannter Fehler.';
      else{
        update_post_meta(
          $user_id, 'telefon', $telefon
        );
        $new_user = true;
        wp_new_user_notification(
          $user_id
        );
      }
    }
  }


  $string = '';
  if( count( $errormsg ) > 0 ){
    $string .= '<ul class="error">';
    foreach( $errormsg as $e )
      $string .= '<li>' . $e . '</li>';
    $string .= '</ul>';
  }

  if( $new_user ) {
    $string .= '<p>Sie haben Post.</p>';
    return $string;
  }

  $string .= '<form method="post">';
  $string .= '<input type="hidden" name="action" value="reg" />';
  $string .= '<p><label for="username">Username</label>';
  $string .= '<input id="username" name="username" /></p>';
  $string .= '<p><label for="email">Email</label>';
  $string .= '<input id="email" name="email" /></p>';
  $string .= '<p><label for="telefon">Telefon</label>';
  $string .= '<input id="telefon" name="telefon" /></p>';
  $string .= '<button>Registrieren</button>';
  $string .= '</form>';
  return $string;
}