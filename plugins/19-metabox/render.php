<?php
function metabox_render( $post ){
    $lon = get_post_meta( $post->ID, 'lon', true );
    $lat = get_post_meta( $post->ID, 'lat', true )
    ?>
    <p>Bitte geben Sie hier den Längen-
        und Breitengrad an.</p>

    <p>
        <label for="lon">Längengrad</label>
        <input
            name="lon"
            id="lon"
            value="<?php echo esc_attr( $lon ); ?>"
        />
    </p>

    <p>
        <label for="lat">Breitengrad</label>
        <input
            name="lat"
            id="lat"
            value="<?php echo esc_attr( $lat ); ?>"
        />
    </p>
    <?php
}