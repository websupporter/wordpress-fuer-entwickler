<?php
add_action( 'admin_menu', 'wpadminpage' );
function wpadminpage() {
    add_menu_page(
        'Neuer Punkt',
        'Neuer Punkt',
        'edit_posts',
        'np',
        'np_output'
    );
}

function np_output(){
    ?>
    <div class="wrap">
        <h1>Hallo Welt</h1>
    </div>
    <?php
}