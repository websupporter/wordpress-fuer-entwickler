<?php
function statify_validate_post_type( $param, $request ) {
    return null !== get_post_type_object( $param );
}