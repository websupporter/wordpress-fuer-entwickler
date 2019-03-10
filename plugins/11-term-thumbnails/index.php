<?php
/**
 * Plugin Name: Ein Bild für eine Kategorie
 **/

add_action( 'category_edit_form', 'add_form', 10, 2 );
function add_form( $term, $taxonomy ) {
    $image_id = (int) get_term_meta(
        $term->term_id,
        '_thumbnail_id',
        true
    );
    $image = wp_get_attachment_image_src( $image_id );
    if ( ! $image ) {
        $image = array(
            admin_url( '/images/media-button.png' )
        );
    }

    ?>
    <table class="form-table">
        <tbody>
        <tr class="form-field">
            <th scope="row">Bild:</th>
            <td>

                <input
                    name="thumbnail"
                    type="hidden"
                    id="thumbnail_id"
                    value="<?php echo $image_id; ?>"
                >
                <img
                    id="thumbnail"
                    src="<?php echo $image[0]; ?>"
                    alt="Bild">
                </div>
                <button class="button" id="change_thumbnail">
                    Bild auswählen
                </button>
            </td>
        </tr>
        </tbody>
    </table>
    <?php
}




add_action( 'admin_enqueue_scripts', 'add_scripts' );
function add_scripts( $hook ) {

    if( 'term.php' !== $hook ) {
        return;
    }

    wp_enqueue_media();
    wp_enqueue_script(
        'term-thumbnail-script',
        plugins_url( '/script.js', __FILE__ ),
        array( 'jquery' )
    );
}

add_action( 'edit_category', 'save_image' );
function save_image( $term_id ) {

    if ( ! isset( $_POST['thumbnail'] ) ) {
        return;
    }

    update_term_meta(
        $term_id,
        '_thumbnail_id',
        (int) $_POST['thumbnail']
    );
}