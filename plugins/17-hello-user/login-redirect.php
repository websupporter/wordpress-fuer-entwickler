<?php
add_filter( 'login_redirect', 'faehig_pruefen', 10, 3 );
function faehig_pruefen( $redirect_to, $request, $user ) {
    if( ! isset( $user->ID ) )
        return $redirect_to;

    if( ! $user->has_cap( 'edit_posts' ) )
        return get_home_url();
    return $redirect_to;
}