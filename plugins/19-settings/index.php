<?php
/**
 * Plugin Name: Settings
 * Author: Websupporter
 * Author URI: https://websupporter.net
 **/
add_action( 'admin_init', 'einstellungen' );
function einstellungen(){
    register_setting( 'optionen-gruppe', 'opt' );
    add_settings_section(
        'schriftarten',
        'Schriftarten',
        'schriftarten_render',
        'optionen-gruppe'
    );
    add_settings_section(
        'schriftfarben',
        'Schriftfarben',
        'schriftfarben_render',
        'optionen-gruppe'
    );
    add_settings_field(
        'sa_ueberschrift',
        'Überschrift',
        'sa_feld_render',
        'optionen-gruppe',
        'schriftarten',
        array( 'id' => 'sa_ueberschrift' )
    );
    add_settings_field(
        'sa_text',
        'Text',
        'sa_feld_render',
        'optionen-gruppe',
        'schriftarten',
        array( 'id' => 'sa_text' )
    );
    add_settings_field(
        'sf_ueberschrift',
        'Überschrift',
        'sf_feld_render',
        'optionen-gruppe',
        'schriftfarben',
        array( 'id' => 'sf_ueberschrift' )
    );
    add_settings_field(
        'sf_text',
        'Text',
        'sf_feld_render',
        'optionen-gruppe',
        'schriftfarben',
        array( 'id' => 'sf_text' )
    );
}

function schriftarten_render(){
    ?>
    <p>Bitte wählen Sie die Schriftarten aus.</p>
    <?php
}

function schriftfarben_render(){
    ?>
    <p>Bitte wählen Sie die Schriftfarben aus.</p>
    <?php
}

function sa_feld_render( $args ){
    $option = get_option( 'opt' );
    $schriftarten = array(
        'Arial',
        'Helvetica',
        'Times New Roman'
    );
    ?>
    <select name="opt[<?php echo $args['id']; ?>]">
        <?php foreach( $schriftarten as $s ): ?>
            <option <?php
            selected( $option[ $args['id'] ], $s );
            ?>><?php echo $s; ?></option>
        <?php endforeach; ?>
    </select>
    <?php
}

function sf_feld_render( $args ){
    $option = get_option( 'opt' );
    ?>
    <input name="opt[<?php echo $args['id']; ?>]" value="<?php
    echo $option[ $args['id'] ];
    ?>" class="color" />
    <?php
}

add_action( 'admin_enqueue_scripts', 'farbwaehler_laden' );
function farbwaehler_laden( $hook ) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script(
        'color-script',
        plugins_url( 'script.js', __FILE__ ),
        array( 'wp-color-picker' ),
        false,
        true
    );
}

add_action( 'admin_menu', 'options_menu' );
function options_menu() {
    add_submenu_page(
        'options-general.php',
        'Optionsseite',
        'Optionsseite',
        'manage_options',
        'optionsseite',
        'options_page'
    );
}

function options_page(){
    ?>
    <form action='options.php' method='post'>
        <h1>Optionen</h1>
        <?php
        settings_fields( 'optionen-gruppe' );
        do_settings_sections( 'optionen-gruppe' );
        submit_button();
        ?>
    </form>
    <?php
}