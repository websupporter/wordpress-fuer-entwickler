<?php
/**
 * Plugin Name: Secure my Login
 * Plugin URI: http://websupporter.net/
 * Description: This plugin secures your login with a question.
 * Author: David Remer
 * Version: 1.0
 * Author URI: http://websupporter.net/
 **/

function create_secure_question(){
    if( !session_id() )
        session_start();

    $fragen = array(
        array(
            'frage' => 'Wieviel ist eins minus 2?',
            'antwort' => '-1',
        ),
        array(
            'frage' => 'Welches Element passt nicht?<br />
         "Dreieck", "Viereck", "Linie", "Rechteck"',
            'antwort' => 'Linie',
        ),
        array(
            'frage' => 'Wieviel ist acht mal 1?',
            'antwort' => '8',
        ),
    );

    $_SESSION['sec_fragen'] = $fragen;
    shuffle( $_SESSION['sec_fragen'] );

    $key = mt_rand( 0, count( $_SESSION['sec_fragen'] ) -1 );

    return array(
        'key' => $key,
        'frage' => $_SESSION['sec_fragen'][ $key ]['frage']
    );
}

add_action( 'login_form', 'secure_form' );
function secure_form(){
    $sec = create_secure_question();
    ?>
    <p>
        <label for="sec_input"><?php echo $sec['frage']; ?></label>
        <input type="text" name="secure" id="sec_input" />
        <input type="hidden" name="securekey" value="<?php
        echo $sec['key']; ?>" />
    </p>
    <?php
}

add_filter( 'authenticate', 'secure_authenticate', 99, 3 );
function secure_authenticate( $user, $username, $password ){
    if( !session_id() )
        session_start();


    if( isset( $_POST['log'] ) && (
            !isset( $_POST['securekey'] ) ||
            !isset( $_POST['secure'] )
        ) ){
        $error = new WP_Error();
        $error->add(
            'wrong_sec',
            '<strong>ERROR</strong>: 
    Die Sicherheitsfrage wurde falsch beantwortet.'
        );
        return $error;
    }

    if(
        !isset( $_POST['securekey'] )
        || !isset( $_POST['secure'] )
    ){
        return $user;
    }

    $sec_key = (int) $_POST['securekey'];
    if(
        $_SESSION['sec_fragen'][ $sec_key ]['antwort'] ==
        $_POST['secure']
    ){
        $user = get_user_by( 'login', $username );

        if (
        !wp_check_password($password, $user->user_pass, $user->ID)
        )
            return null;

        return $user;
    }

    $error = new WP_Error();
    $error->add('wrong_sec', '<strong>ERROR</strong>: 
  Die Sicherheitsfrage wurde falsch beantwortet.');
    return $error;
}