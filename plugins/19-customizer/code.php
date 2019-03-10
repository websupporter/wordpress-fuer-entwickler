<?php
add_action( 'customize_register', 'schriftarten_customizer' );
function schriftarten_customizer( $wp_customize ){
    $wp_customize->add_section(
        'schriftarten',
        array(
            'title' => 'Schriftarten',
            'priority' => 30,
            'description' => 'Wählen Sie hier die Schriftarten aus',
        )
    );
    $wp_customize->add_setting(
        'schriftart_ueberschriften',
        array(
            'default' => 'Times New Roman',
            'type' => 'theme_mod',
            'capability' => 'manage_options',
            'theme_supports' => false,
            'transport' => 'refresh'
        )
    );

    $wp_customize->add_setting(
        'schriftart_fliesstext',
        array(
            'default' => 'Times New Roman',
            'type' => 'theme_mod',
            'capability' => 'manage_options',
            'theme_supports' => false,
            'transport' => 'refresh'
        )
    );
    $schriftarten = array(
        'Arial'           => 'Arial',
        'Helvetica'       => 'Helvetica',
        'Times New Roman' => 'Times New Roman'
    );

    $wp_customize->add_control(
        'schriftarten_ueberschriften_control',
        array(
            'label'    => 'Schriftart für Überschriften',
            'section'  => 'schriftarten',
            'settings' => 'schriftart_ueberschriften',
            'type'     => 'select',
            'choices'  => $schriftarten
        )
    );

    $wp_customize->add_control(
        'schriftarten_fliesstext_control',
        array(
            'label'    => 'Schriftart für Fließtexte',
            'section'  => 'schriftarten',
            'settings' => 'schriftart_fliesstext',
            'type'     => 'select',
            'choices'  => $schriftarten
        )
    );

    $wp_customize->add_setting(
        'ueberschriften_farbe',
        array(
            'default' => '#000'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'ueberschriften_farbe_control',
            array(
                'label'    => 'Farbe der Überschriften',
                'section'  => 'schriftarten',
                'settings' => 'ueberschriften_farbe',
            )
        )
    );
}

function schriftarten_styles(){
    ?>
    <style type="text/css">
        h1,h2,h3,h4,h5,h6 {
            color:<?php echo get_theme_mod('ueberschriften_farbe', '#000' ); ?>;
            font-family:<?php
	echo get_theme_mod(
		'schriftart_ueberschriften',
		'Times New Roman'
	); ?>; }
        p, li{ font-family:<?php
	echo get_theme_mod(
		'schriftart_fliesstext',
		'Times New Roman'
	); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'schriftarten_styles');