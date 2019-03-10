jQuery( document ).ready( function() {
    var file_frame;
    jQuery('#change_thumbnail').on('click', function( event ){
        event.preventDefault();

        if ( file_frame ) {
            file_frame.open();
            return;
        }

        file_frame = wp.media({
            title: 'Wähle ein Kategorienbild',
            button: {
                text: 'Nutze dieses Bild',
            },
            multiple: false
        });
        file_frame.on( 'select', function() {
            var attachment = file_frame.state().get('selection')
                .first().toJSON();

            jQuery( '#thumbnail' ).attr(
                'src', attachment.sizes.thumbnail.url
            );
            jQuery( '#thumbnail_id' ).val( attachment.id );
        });
        file_frame.open();
    });
});