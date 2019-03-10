<?php
register_rest_route(
  'statify/v1',
  'popular',
  array(
    array(
      'methods'  => 'GET',
      'callback' => 'statify_rest_callback',
      'args'   => array(
        'post_type' => array(
          'validate_callback' => 'statify_validate_post_type',
        ),
      ))));