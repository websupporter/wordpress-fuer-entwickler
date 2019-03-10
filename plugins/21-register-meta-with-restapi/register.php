<?php
$args = array(
    'type' => 'integer',
    'description' => 'The number of hits.',
    'single' => true,
    'show_in_rest' => true,
);
register_meta( 'post', 'hits', $args );