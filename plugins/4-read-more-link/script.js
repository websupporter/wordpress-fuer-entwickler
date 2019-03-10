jQuery( document ).ready( function(){
    jQuery( 'a.read_more_title' ).click( function(event){
        event.preventDefault();
        jQuery( this ).
        parent().
        children( '.read_more_body' ).
        slideToggle();
    });
});