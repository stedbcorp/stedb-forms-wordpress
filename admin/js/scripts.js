//pop-start
(function() {
    'use strict';
    jQuery('#exampleModalCenter').on('shown.bs.modal', function() {
        jQuery('input[name="code[]"]').get(0).focus(); //focus on first index
        jQuery('input[name="code[]"]').on('keyup', function(e) { // move to next fields

            var key = e.which,
                t = jQuery(e.target),
                sib = t.next('input[name="code[]"]');

            if (key != 9 && (key < 48 || key > 57) && (key < 96 || key > 105)) {
                e.preventDefault();
                return false;
            }

            if (key === 9) {
                return true;
            }
            // no more field found return to button
            if (!sib || !sib.length) {
                sib = jQuery('button[name="stedb-verify"]');
            }
            sib.select().focus();
        });
        // keydown
        jQuery('input[name="code[]"]').on('keydown', function(e) {

            var key = e.which;

            if (key === 9 || (key >= 48 && key <= 57) || (key >= 96 && key <= 105)) {
                return true;
            }

            e.preventDefault();
            return false;
        });
        // select
        jQuery('input[name="code[]"]').on('click', function(e) {

            jQuery(e.target).select();
        });
        // on press backspace return previous field
    });

    /////start//

    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            if (form.checkValidity() === false) {

                event.stopPropagation();
                form.classList.add('was-validated');

            } else {

                var postData = jQuery(form).serializeArray();
                postData.push({ name: 'action', value: 'ste_verify_code' });
                postData.push({ name: 'nonce', value: ste.nonce });
                jQuery.ajax({
                    url: ajax_url,
                    type: 'post',
                    data: postData,
                    dataType: 'json',
                    beforeSend: function() {
                        jQuery('#stedb_modal_error_wrong_code').hide();
                        jQuery("#modal_loader").show();
                    },
                    success: function(response) {
                        console.log(response);
                        jQuery("#modal_loader").hide();
                        if (response.success) {
                            jQuery('#stedb_modal_success_code').show();
                            document.location.reload(true);
                        } else {
                            jQuery('#stedb_modal_error_wrong_code').show();
                        }
                    }
                });
            }
        }, false);
    });
    jQuery(window).load(function() {
    jQuery('#exampleModalCenter').modal({
        keyboard: false,
        backdrop: 'static',
    });
});
    
    (jQuery);

    
    //Pop-up end//

})();

