<?php
add_action( 'user_register', 'neue_benutzer_ext', 10, 1 );
function neue_benutzer_ext( $user_id ) {
    if ( isset( $_POST['mobil_telefon'] ) ) {
        update_user_meta(
            $user_id,
            'mobil_telefon',
            sanitize_text_field( $_POST['mobil_telefon'] )
        );
    }
}