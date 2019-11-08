// jQuery(function() {
//     jQuery('#stedb_form_submitter').click(function() {
//         jQuery('#stedb_acct_reg_form').submit();
//     })
//     jQuery('#stedb_acct_reg_form').submit(function(e) {

//         alert('yes')
//         e.preventDefault();
//         console.log(jQuery('#stedb_acct_reg_form').serialize());
//     });
// });



//pop-start
(function() {
    'use strict';

    jQuery('#stedbPopup').on('shown.bs.modal', function() {
        // alert('yes')
        jQuery('input[name="code[]"]').get(0).focus(); //focus on first index
        jQuery('input[name="code[]"]').on('keyup', function(e) { // move to next fields

            var key = e.which,
                t = jQuery(e.target),
                sib = t.next('input[name="code[]"]');

            if (key != 9 && (key < 48 || key > 57)) {
                e.preventDefault();
                return false;
            }

            if (key === 9) {
                return true;
            }
            // no more field found return to index 0
            if (!sib || !sib.length) {
                sib = jQuery('input[name="code[]"]').eq(0);
            }
            sib.select().focus();
        });
        // keydown
        jQuery('input[name="code[]"]').on('keydown', function(e) {

            var key = e.which;

            if (key === 9 || (key >= 48 && key <= 57)) {
                return true;
            }

            e.preventDefault();
            return false;
        });
        // select
        jQuery('input[name="code[]"]').on('click', function(e) {

            jQuery(e.target).select();
        });
    })
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    form.classList.add('was-validated');
                }
                // form.classList.add('was-validated');
            }, );
        });
    }, );
})();
//pop-end