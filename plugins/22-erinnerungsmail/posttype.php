<?php

add_action(
    'init',
    function() {
        register_post_type(
            'kleinanzeigen',
            array(
                'public' => true,
                'label' => 'Kleinanzeigen',
            )
        );
    }
);
