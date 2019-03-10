jQuery(document).ready(
    function () {
        "use strict";

        jQuery('#wp-admin-bar-statify-delete a').click(
            function (event) {
                event.preventDefault();
                jQuery.ajax({
                    url: StatifyRest.route,
                    method: 'DELETE',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader(
                            'X-WP-Nonce',
                            StatifyRest.nonce
                        );
                    }
                }).done(function (response) {
                    if (response.success) {
                        alert('Statify data deleted.');
                        return;
                    }
                    alert('An error occurred.');
                }).fail(function (xhr) {
                    var response = JSON.parse(xhr.responseText);
                    alert(response.message);
                });
            }
        );
    }
);