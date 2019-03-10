<?php
add_action( 'user_register', 'erinnerung_schedule' );
function erinnerung_schedule( $user_id ){
    $in_drei_tagen = 60 * 60 * 24 * 3 + time();
    wp_schedule_single_event(
        $in_drei_tagen,
        'erinnerung_cron',
        array( $user_id )
    );
}

add_action( 'erinnerung_cron', 'erinnerung_cron_exec' );
function erinnerung_cron_exec( $user_id ){
    $args = array(
        'post_type' => 'kleinanzeigen',
        'author' => $user_id
    );
    $query = new WP_Query( $args );

    if( $query->have_posts() )
        return;

    $user = get_user_by( 'id', $user_id );
    $mail = file_get_contents(
        dirname( __FILE__ ) . '/mail.txt'
    );
    $mail = preg_replace(
        '^#username#^',
        $user->first_name,
        $mail
    );
    $betreff = 'Brauchst Du Hilfe?';

    wp_mail( $user->data->email, $betreff, $mail );
}