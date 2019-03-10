jQuery( document ).ready( function(){
    if( jQuery( '#latest-post-wrapper' ).length == 0 )
        return false;

    window.setInterval( function(){
        var GMT =  new Date().toUTCString();
        jQuery.get(
            latestPostObjekt.ajaxURL,
            {
                action:'get-latest-post',
                date:GMT
            },
            function( response ){
                jQuery( '#latest-post-wrapper' ).html( response );
            }
        );
    }, 5000 );
});