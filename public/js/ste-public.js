/* Ajax url*/
var ajax_url = ste.ajax_url;
/* site url*/
var site_url = ste.plugin_url;
var web_url = ste.site_url;

(function($) {
    $(document).ready(function() {

        $(document).on('click', '.form_save', function(e) {
            e.preventDefault();
            var form_id = $('.form_id').val();
            var href = $(this).attr('href');
            var postArray = {};
            var el = $('.form-group');
            el.each(function() {
                var data_type = $(this).data('group_type');
                if (data_type != undefined) {
                    postArray[data_type] = [];
                }
            });
            el.each(function() {
                var group = $(this);
                var data_type = group.data('group_type');
                var name = group.data('group_name');
                if (data_type != undefined && name != undefined) {
                    if (data_type == 'text') {
                        group.find('input.text-field').each(function() {
                            postArray[data_type].push({ 'name': name, 'value': $(this).val() });
                        });
                    } else if (data_type == 'radio') {
                        group.find('input.form-radio-field:checked').each(function() {
                            postArray[data_type].push({ 'name': name, 'value': $(this).val() });
                        });
                    } else if (data_type == 'number') {
                            group.find('input.number-field:checked').each(function() {
                                postArray[data_type].push({ 'name': name, 'value': $(this).val() });
                            });
                    } else if (data_type == 'link') {
                            group.find('input.link-field:checked').each(function() {
                                postArray[data_type].push({ 'name': name, 'value': $(this).val() });
                            });
                    } else if (data_type == 'checkbox') {
                        sel_val = [];
                        group.find('input.form-checkbox-field:checked').each(function() {
                            sel_val.push($(this).val());
                        });
                        var sel_str_val = sel_val.toString();
                        // postArray[data_type].push({'name':name,'value':$(this).val()});
                        postArray[data_type].push({ 'name': name, 'value': sel_str_val });
                    } else if (data_type == 'select') {
                        group.find('.form-dropdown-field option:selected').each(function() {
                            postArray[data_type].push({ 'name': name, 'value': $(this).val() });
                        });
                    } else if (data_type == 'date') {
                        group.find('input.date-field').each(function() {
                            postArray[data_type].push({ 'name': name, 'value': $(this).val() });
                        });
                    } else if (data_type == 'textarea') {
                        group.find('textarea.textarea-field').each(function() {
                            postArray[data_type].push({ 'name': name, 'value': $(this).val() });
                        });
                    } else if (data_type == 'social_yahoo') {
                        postArray[data_type].push({ 'name': name, 'value': 'social_yahoo' });
                    } else if (data_type == 'social_gmail') {
                        postArray[data_type].push({ 'name': name, 'value': 'social_gmail' });
                    } else if (data_type == 'social_linkedin') {
                        postArray[data_type].push({ 'name': name, 'value': 'social_linkedin' });
                    }
                }
            });
            var array_data = JSON.stringify(postArray);
            $.ajax({
                // url:site_url+'/wp-admin/admin-ajax.php',
                url: ajax_url,
                type: 'post',
                data: { action: 'ste_save_form_data', 'form_id': form_id, 'form_data': array_data, nonce: ste.nonce },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        window.location.href = href + '&u=' + page_link;
                        /* var thankYouMessage = '<div class="thank-you-message">Thanks for contacting us! We will get in touch with you shortly.</div>';
                        $('.entry-content').html(thankYouMessage); */
                    }
                }
            });

        });
    });
})(jQuery);