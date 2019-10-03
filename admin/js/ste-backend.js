/* Ajax url*/
var ajax_url = ste.ajax_url;
/* site url*/
var site_url = ste.plugin_url;
var web_url  = ste.site_url;


(function( $ ) {
    'use strict';
	/* draggable jquery*/
	$(".text_box").draggable({
		helper: function () {
			$('.btn-shortcode').show();
			return getTextFieldHTML();
		},
		connectToSortable: "#ste-sortable"
	});
	$(".text_area").draggable({
		helper: function () {
			$('.btn-shortcode').show();
			return getTextAreaFieldHTML();
		},
		connectToSortable: "#ste-sortable"
	});
	$(".radio_button").draggable({
		helper: function () {
			$('.btn-shortcode').show();
			return getRadioFieldHTML();
		},
		connectToSortable: "#ste-sortable"
	});
	$(".checkbox").draggable({
		helper: function () {
			$('.btn-shortcode').show();
			return getCheckboxFieldHTML();
		},
		connectToSortable: "#ste-sortable"
	});
	$(".select_box").draggable({
		helper: function () {
			$('.btn-shortcode').show();
			return getSelectFieldHTML();
		},
		connectToSortable: "#ste-sortable"
	});
	$(".date_box").draggable({
		helper: function () {
			$('.btn-shortcode').show();
			return getDateFieldHTML();
		},
		connectToSortable: "#ste-sortable"
	});
	$(".social_yahoo").draggable({
		helper: function () {
			$('.btn-shortcode').show();
			return getYahooHTML();
		},
		connectToSortable: "#ste-sortable"
	});
	$(".social_gmail").draggable({
		helper: function () {
			$('.btn-shortcode').show();
			return getGmailHTML();
		},
		connectToSortable: "#ste-sortable"
	});
	$(".social_linkedin").draggable({
		helper: function () {
			$('.btn-shortcode').show();
			return getLinkedinHTML();
		},
		connectToSortable: "#ste-sortable"
	});

	$("#ste-sortable").sortable({
		cursor: 'move',
		placeholder: 'placeholder',
		start: function (e, ui) {
			ui.placeholder.height(ui.helper.outerHeight());
		},
		stop: function (ev, ui) {
			// getPreview();
		}
	});

	$("#ste-sortable").disableSelection();

})( jQuery );


var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),    
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};

// edit form ajax

/**
 * Draggable fields function HMTL
 */
function generateField() {
    return Math.floor(Math.random() * (100000 - 1 + 1) + 57);
}
function getTextFieldHTML() {
	var field = generateField();
    var	html ='<div class="li_'+field+' ste-builder-field ste-row ste-col-50">'
				+'<div class="ste-flex ste-justify-space ste-align-center">'
					+'<label class="">Text Field</label>'
					+'<button class="ste-remove-field remove_bal_field" data-field="'+field+'">x</button>'
				+'</div>'
				+'<div class="li_row form_output" data-type="text" data-field="' + field + '">'
					+'<input type="text" name="label_' + field + '" class="ste-field form_input_label" placeholder="Label" data-field="'+field+'">'
				+'</div>'
			+'</div>';
    return html;
}

function getTextAreaFieldHTML() {
    var field = generateField();
    //var html = '<div class="li_'+field+' form_builder_field"><div class="all_div"> Textarea Field <div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button></div></div></div><div class="row li_row form_output" data-type="textarea" data-field="' + field + '"><div class="col-md-12"><div class="form-group"><input type="text" name="label_' + field + '" class="form-control form_input_label" value="" placeholder="Label" data-field="' + field + '"/></div></div></div></div>';
 	var	html ='<div class="li_'+field+' ste-builder-field ste-row ste-col-50">'
				+'<div class="ste-flex ste-justify-space ste-align-center">'
					+'<label class="">Textarea Field</label>'
					+'<button class="ste-remove-field remove_bal_field" data-field="'+field+'">x</button>'
				+'</div>'
				+'<div class="li_row form_output" data-type="textarea" data-field="' + field + '">'
					+'<input type="text" name="label_' + field + '" class="ste-field form_input_label" placeholder="Label" data-field="'+field+'">'
				+'</div>'
			+'</div>';
   // return html;   
    return html;
}

function getRadioFieldHTML() {
    var field = generateField();
    var opt1 = generateField();
    var	html ='<div class="li_'+field+' ste-builder-field ste-row ste-col-50">'
				+'<div class="ste-flex ste-justify-space ste-align-center">'
					+'<label class="">Radio Button Field</label>'
					+'<button class="ste-remove-field remove_bal_field" data-field="'+field+'">x</button>'
				+'</div>'
				+'<div class="li_row form_output" data-type="radio" data-field="' + field + '">'
					+'<input type="text" name="label_' + field + '" class="ste-field form_input_label" placeholder="Label" data-field="'+field+'">'
				// +'</div>'
				+'<div class="field_extra_info_' + field + '">'
				+'<div class="ste-radio-list  ste-my-0-5 radio_row_' + field + '" data-field="'+field+'" data-opt="' + opt1 + '"> '
					+'<div class=" ste-flex mt-radio ste-align-center ste-justify-space radio_list_' + field + '">'
						+'<label class="ste-custom-input ste-flex ste-flexb-7 ste-mt-0-2">'
							+'<input data-opt="' + opt1 + '" type="radio" name="radio_' + field + '" class=" r_opt_name_' + opt1 + '">'
							+'<span class="checkmark-radio ste-pos-relative"></span>'
						+'</label>'
						+'<input type="text" name="ste-radio-value" class="r_opt ste-radio-value ste-flexb-80">'
						+'<button class="ste-add-more ste-flexb-5 ste-btn-add-option add_more_radio" data-field="'+field+'">+</button>'
					+'</div>'
				+'</div>'
				+'</div>'
				+'</div>'
			+'</div>';
    return html;
}

function getCheckboxFieldHTML() {
    var field = generateField();
    var opt1 = generateField();
    var html ='<div class="li_'+field+' ste-builder-field ste-row ste-col-50">'
    			+'<div class="ste-flex ste-justify-space ste-align-center">'
    				+'<label class="">Check Box Field</label>'
    				+'<button class="ste-remove-field remove_bal_field" data-field="'+field+'">x</button>'
    			+'</div>'
    			+'<div class="li_row form_output" data-type="checkbox" data-field="' + field + '">'
    				+'<input type="text" name="label_' + field + '" class="ste-field form_input_label" placeholder="Label" data-field="'+field+'">'
    			// +'</div>'
    			+'<div class="field_extra_info_' + field + '">'
    			+'<div class="ste-checkbox-list ste-my-0-5 checkbox_row_' + field + '" data-field="'+field+'" data-opt="' + opt1 + '">'
    				+'<div class="ste-flex mt-checkbox ste-align-center ste-justify-space checkbox_list_' + field + '">'
    					+'<label class="ste-custom-input ste-flex ste-flexb-7">'
							+'<input data-opt="' + opt1 + '" type="checkbox" name="checkbox_' + field + '" class=" c_opt_name_' + opt1 + '">'
							+'<span class="checkmark-checkbox ste-pos-relative"></span>'
						+'</label>'
						+'<input type="text" name="ste-checkbox-value" class="c_opt ste-checkbox-value ste-flexb-80">'
						+'<button class="ste-add-more ste-flexb-5 ste-btn-add-option add_more_checkbox" data-field="'+field+'">+</button>'
					+'</div>'
				+'</div>'
				+'</div>'
				+'</div>'
			+'</div>';
    return html;
}

    function getSelectFieldHTML() {
    var field = generateField();
    var opt1 = generateField();
    // var html = '<div class="li_'+field+' form_builder_field"><div class="all_div"> Dropdown Field <div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button></div></div><div class="row li_row form_output" data-type="select" data-field="' + field + '"><div class="col-md-12"><div class="form-group"><input type="text" name="label_' + field + '" class="form-control form_input_label" value="" placeholder="Label" data-field="' + field + '"/></div></div><div class="col-md-12"><div class="form-group"><select name="select_' + field + '" class="form-control"><option data-opt="' + opt1 + '" value="Value">Option</option></select></div></div></div><div class="row li_row"><div class="col-md-12"><div class="field_extra_info_' + field + '"><div data-field="' + field + '" class="row select_row_' + field + '" data-opt="' + opt1 + '"><div class="col-md-4"><div class="form-group"><input type="text" value="Option" class="s_opt form-control"/></div></div><div class="col-md-4"><div class="form-group"><input type="text" value="Value" class="s_val form-control hidden"/></div></div><div class="col-md-4"><i class="margin-top-5 fa fa-plus-circle fa-2x default_blue add_more_select" data-field="' + field + '"></i></div></div></div></div></div></div></div>';
    var html ='<div class="li_'+field+' ste-builder-field ste-row ste-col-50">'
    			+'<div class="ste-flex ste-justify-space ste-align-center">'
    				+'<label class="">Select Box Field</label>'
    				+'<button class="ste-remove-field remove_bal_field" data-field="'+field+'">x</button>'
    			+'</div>'
    			+'<div class="li_row form_output" data-type="select" data-field="' + field + '">'
    				+'<input type="text" name="label_' + field + '" class="ste-field form_input_label" placeholder="Label" data-field="'+field+'">'
    			// +'</div>'
    			+'<div class="ste-selectbox-list ste-my-0-5">'
    				+'<div class="ste-flex ste-align-center ste-justify-space">'
    					+'<select name="select_' + field + '" class="ste-selectbox ste-selectbox-value ste-flexb-90">'
    						+'<option value="">Select Option</option>'
    						+'<option data-opt="' + opt1 + '" value="Value">Option 1</option>'
    					+'</select>'
    					+'<button class="ste-add-more ste-flexb-5 ste-btn-add-option add_more_select" data-field="'+field+'">+</button>'
    				+'</div>'
    				+'<div class="field_extra_info_' + field + '">'
    				+'<div data-field="' + field + '" class="row select_row_' + field + '" data-opt="' + opt1 + '">'
    					//+'<div class="ste-flex ">' 
    						+'<label class="ste-selectbox-inputbox ste-flex ste-py-rm-0-4">'
    							+'<input type="text" name="ste-selectbox-options" class="s_opt ste-selectbox-options ste-flexb-90">'
    						+'</label>'
    					//+'</div>'
    				+'</div>'
    				+'</div>'
    			+'</div>'
    			+'</div>'
    		+'</div>';
    return html;
 }

  function getDateFieldHTML() {
    var field = generateField();
    var opt1 = generateField();
    // var html = '<div class="li_'+field+' form_builder_field"><div class="all_div"> Date Field <div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button></div></div></div><div class="row li_row form_output" data-type="date" data-field="' + field + '"><div class="col-md-12"><div class="form-group"><input type="text" name="label_' + field + '" class="form-control form_input_label" value="" placeholder="Label" data-field="' + field + '"/></div></div></div></div>';
    var	html ='<div class="li_'+field+' ste-builder-field ste-row ste-col-50">'
				+'<div class="ste-flex ste-justify-space ste-align-center">'
					+'<label class="">Date Field</label>'
					+'<button class="ste-remove-field remove_bal_field" data-field="'+field+'">x</button>'
				+'</div>'
				+'<div class="li_row form_output" data-type="date" data-field="' + field + '">'
					+'<input type="text" name="label_' + field + '" class="ste-field form_input_label" placeholder="Label" data-field="'+field+'">'
				+'</div>'
			+'</div>';
    return html;
} 

 function getYahooHTML() {
    var field = generateField();
    // var html = '<div class="li_'+field+' form_builder_field btn-width"><div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right btn-pos" data-field="' + field + '"><i class="fa fa-times"></i></button></div></div></div><div class="row li_row form_output" data-type="social_yahoo" data-field="' + field + '"><div class="col-md-12"><div class="form-group"><div class="sign-up-button yh"><a class="form_save" social-yahoo="s_yahoo"><img src="'+ site_url+ 'admin/images/yh.png"><img src="'+site_url+'admin/images/vertical_yh.png"><span>Send with yahoo!</span></a></div></div></div></div></div>';
     var html ='<div class="li_'+field+' ste-builder-field ste-row ste-col-50 ste-height-auto">'
				+'<div class="ste-flex ste-justify-space ste-align-center">'
					+'<label class=""></label>'
					+'<button class="ste-remove-field remove_bal_field" data-field="'+field+'">x</button>'
				+'</div>'
				+'<div class="li_row form_output ste-my-0-5" data-type="social_yahoo" data-field="' + field + '">'
					+'<div class="sign-up-button ste-sign-up-button yh">'
						+'<a class="form_save" social-yahoo="s_yahoo">'
							+'<img src="'+site_url+ 'admin/images/yh.png">'
							+'<img src="'+site_url+'admin/images/vertical_yh.png">'
								+'<span>Send with yahoo!</span>'
						+'</a>'
					+'</div>'
				+'</div>'
			+'</div>';
    return html;
}

  function getGmailHTML() {
    var field = generateField();
    // var html = '<div class="li_'+field+' form_builder_field btn-width"><div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right btn-pos" data-field="' + field + '"><i class="fa fa-times"></i></button></div></div></div><div class="row li_row form_output" data-type="social_gmail" data-field="' + field + '"><div class="col-md-12"><div class="form-group"><div class="sign-up-button gp"><a class="form_save" social-gmail="s_gmail"><img src="'+site_url+'admin/images/gp.png"><img src="'+site_url+'admin/images/vertical_gp.png"><span>Send with Gmail</span></a></div></div></div></div></div>';
    var html ='<div class="li_'+field+' ste-builder-field ste-row ste-col-50 ste-height-auto">'
				+'<div class="ste-flex ste-justify-space ste-align-center">'
					+'<label class=""></label>'
					+'<button class="ste-remove-field remove_bal_field" data-field="'+field+'">x</button>'
				+'</div>'
				+'<div class="li_row form_output ste-my-0-5" data-type="social_gmail" data-field="' + field + '">'
					+'<div class="sign-up-button ste-sign-up-button gp">'
						+'<a class="form_save" social-gmail="s_gmail">'
							+'<img src="'+site_url+ 'admin/images/gp.png">'
							+'<img src="'+site_url+'admin/images/vertical_gp.png">'
								+'<span>Send with Gmail</span>'
						+'</a>'
					+'</div>'
				+'</div>'
			+'</div>';
    return html;
}

 function getLinkedinHTML() {
    var field = generateField();
    // var html = '<div class="li_'+field+' form_builder_field btn-width"><div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right btn-pos" data-field="' + field + '"><i class="fa fa-times"></i></button></div></div></div><div class="row li_row form_output" data-type="social_linkedin" data-field="' + field + '"><div class="col-md-12"><div class="form-group"><div class="sign-up-button ln"><a class="form_save" social-linkedin="s_linkedin"><img src="'+site_url+'admin/images/ln.png"><img src="'+site_url+'admin/images/vertical_ln.png"><span>Send with Linkedin</span></a></div></div></div></div></div>';
    var html ='<div class="li_'+field+' ste-builder-field ste-row ste-col-50 ste-height-auto">'
				+'<div class="ste-flex ste-justify-space ste-align-center">'
					+'<label class=""></label>'
					+'<button class="ste-remove-field remove_bal_field" data-field="'+field+'">x</button>'
				+'</div>'
				+'<div class="li_row form_output ste-my-0-5" data-type="social_linkedin" data-field="' + field + '">'
					+'<div class="sign-up-button ste-sign-up-button ln">'
						+'<a class="form_save" social-linkedin="s_linkedin">'
							+'<img src="'+site_url+ 'admin/images/ln.png">'
							+'<img src="'+site_url+'admin/images/vertical_ln.png">'
								+'<span>Send with Linkedin</span>'
						+'</a>'
					+'</div>'
				+'</div>'
			+'</div>';
    return html;
}
(function( $ ) {
 $(document).on('click', '.remove_bal_field', function (e) {
        e.preventDefault();
        var field = $(this).attr('data-field');
        $(this).closest('.li_' + field).hide('400', function () {
            $(this).remove();
            var len = $('.form_builder_field').length;
            if(len == 0)
            {
                $('.btn-shortcode').hide();
            }
        });
    });

  $(document).on('click', '.add_more_radio', function () {
        $(this).closest('.ste-builder-field').css('height', 'auto');
        var field = $(this).attr('data-field');
        var option = generateField();
        $('.field_extra_info_' + field).append(
        	'<div class="mt-radio ste-my-0-5 radio_row_' + field + '"  data-field="' + field + '" data-opt="' + option  + '">'
					+'<div class=" ste-flex ste-align-center ste-justify-space radio_list_' + field + '">'
						+'<label class="ste-custom-input ste-flex ste-flexb-7 ste-mt-0-2">'
							+'<input data-opt="' + option  + '" type="radio" name="radio_' + field + '" class="r_opt_name_' +  option + '">'
							+'<span class="checkmark-radio ste-pos-relative"></span>'
						+'</label>'
						+'<input type="text" name="ste-radio-value" class="r_opt ste-radio-value ste-flexb-80">'
						+'<button class="ste-add-more ste-flexb-5 ste-btn-add-option remove_more_radio" data-field="'+field+'">x</button>'
					+'</div>'
				+'</div>'
        	// '<div data-opt="' + option + '" data-field="' + field + '" class="row radio_row_' + field + '"><div class="col-md-4"><div class="form-group"><input type="text" value="Option" class="r_opt form-control"/></div></div><div class="col-md-4"><div class="form-group"><input type="text" value="Value" class="r_val form-control hidden"/></div></div><div class="col-md-4"><i class="margin-top-5 fa fa-plus-circle fa-2x default_blue add_more_radio" data-field="' + field + '"></i><i class="margin-top-5 margin-left-5 fa fa-times-circle default_red fa-2x remove_more_radio" data-field="' + field + '"></i></div></div>'
        	);
        // var options = '';
        // $('.radio_row_' + field).each(function () {
        //     var opt = $(this).find('.r_opt').val();
        //     var val = $(this).find('.r_val').val();
        //     var s_opt = $(this).attr('data-opt');
        //     options += '<label class="mt-radio mt-radio-outline"><input data-opt="' + s_opt + '" type="radio" name="radio_' + field + '" value="' + val + '"> <p class="r_opt_name_' + s_opt + '">' + opt + '</p><span></span></label>';
        // });
        // $('.radio_list_' + field).html(options);
    });

   $(document).on('click', '.add_more_checkbox', function () {
        $(this).closest('.ste-builder-field').css('height', 'auto');
        var field = $(this).attr('data-field');
        var option = generateField();
        $('.field_extra_info_' + field).append(
        	'<div class="ste-checkbox-list ste-my-0-5 checkbox_row_' + field + '" data-field="'+field+'" data-opt="' + option + '">'
    				+'<div class="ste-flex mt-checkbox ste-align-center ste-justify-space checkbox_list_' + field + '">'
    					+'<label class="ste-custom-input ste-flex ste-flexb-7">'
							+'<input data-opt="' + option + '" type="checkbox" name="checkbox_' + field + '" class=" c_opt_name_' + option + '">'
							+'<span class="checkmark-checkbox ste-pos-relative"></span>'
						+'</label>'
						+'<input type="text" name="ste-checkbox-value" class="c_opt ste-checkbox-value ste-flexb-80">'
						+'<button class="ste-add-more ste-flexb-5 ste-btn-add-option remove_more_checkbox" data-field="'+field+'">x</button>'
					+'</div>'
				+'</div>'

        //'<div data-opt="' + option + '" data-field="' + field + '" class="row checkbox_row_' + field + '"><div class="col-md-4"><div class="form-group"><input type="text" value="Option" class="c_opt form-control"/></div></div><div class="col-md-4"><div class="form-group"><input type="text" value="Value" class="c_val form-control hidden"/></div></div><div class="col-md-4"><i class="margin-top-5 fa fa-plus-circle fa-2x default_blue add_more_checkbox" data-field="' + field + '"></i><i class="margin-top-5 margin-left-5 fa fa-times-circle default_red fa-2x remove_more_checkbox" data-field="' + field + '"></i></div></div>'
        	);
        // var options = '';
        // $('.checkbox_row_' + field).each(function () {
        //     var opt = $(this).find('.c_opt').val();
        //     var val = $(this).find('.c_val').val();
        //     var s_opt = $(this).attr('data-opt');
        //     options += '<label class="mt-checkbox mt-checkbox-outline"><input data-opt="' + s_opt + '" name="checkbox_' + field + '" type="checkbox" value="' + val + '"> <p class="c_opt_name_' + s_opt + '">' + opt + '</p><span></span></label>';
        // });
        // $('.checkbox_list_' + field).html(options);
    });

    $(document).on('click', '.add_more_select', function () {
        $(this).closest('.ste-builder-field').css('height', 'auto');
        var field = $(this).attr('data-field');
        var option = generateField();
        $('.field_extra_info_' + field).append(
        	'<div data-field="' + field + '" class="row select_row_' + field + '" data-opt="' + option + '">'
    			+'<div class="ste-flex ste-my-0-5 ste-align-center ste-justify-space">' 
    				+'<input type="text" name="ste-selectbox-options" class="s_opt ste-selectbox-options ste-flexb-90 ">'
    				+'<button class="ste-add-more ste-flexb-5 ste-btn-add-option remove_more_select" data-field="'+field+'" data-opt="' + option + '" >x</button>'
    			+'</div>'
    		+'</div>'
        	// '<div data-field="' + field + '" class="row select_row_' + field + '" data-opt="' + option + '"><div class="col-md-4"><div class="form-group"><input type="text" value="Option" class="s_opt form-control"/></div></div><div class="col-md-4"><div class="form-group"><input type="text" value="Value" class="s_val form-control hidden"/></div></div><div class="col-md-4"><i class="margin-top-5 fa fa-plus-circle fa-2x default_blue add_more_select" data-field="' + field + '"></i><i class="margin-top-5 margin-left-5 fa fa-times-circle default_red fa-2x remove_more_select" data-field="' + field + '"></i></div></div>'
        	);
        var options = '';
        $('.select_row_' + field).each(function () {
            var opt = $(this).find('.s_opt').val();
            // var val = $(this).find('.s_val').val();
            var val = 'option';
            var s_opt = $(this).attr('data-opt');
            options += '<option data-opt="' + s_opt + '" value="' + val + '">' + opt + '</option>';
        });
        $('select[name=select_' + field + ']').html(options);
    });
   $(document).on('click', '.remove_more_radio', function () {
        var field = $(this).attr('data-field');
        $(this).closest('.radio_row_' + field).hide('400', function () {
            $(this).remove();
            var options = '';
            $('.radio_row_' + field).each(function () {
                var opt = $(this).find('.r_opt').val();
                var val = $(this).find('.r_val').val();
                var s_opt = $(this).attr('data-opt');
                options += '<label class="mt-radio mt-radio-outline"><input data-opt="' + s_opt + '" type="radio" name="radio_' + field + '" value="' + val + '"> <p class="r_opt r_opt_name_' + s_opt + '">' + opt + '</p><span></span></label>';
            });
            // $('.radio_list_' + field).html(options);
        });
    });
    $(document).on('click', '.remove_more_checkbox', function () {
        var field = $(this).attr('data-field');
        $(this).closest('.checkbox_row_' + field).hide('400', function () {
            $(this).remove();
            var options = '';
            $('.checkbox_row_' + field).each(function () {
                var opt = $(this).find('.c_opt').val();
                var val = $(this).find('.c_val').val();
                var s_opt = $(this).attr('data-opt');
                options += '<label class="mt-checkbox mt-checkbox-outline"><input data-opt="' + s_opt + '" name="checkbox_' + field + '" type="checkbox" value="' + val + '"> <p class="c_opt r_opt_name_' + s_opt + '">' + opt + '</p><span></span></label>';
            });
            // $('.checkbox_list_' + field).html(options);
        });
    });
    $(document).on('click', '.remove_more_select', function () {
        var field = $(this).attr('data-field');
        var opt =$(this).attr('data-opt');
        $(this).closest('.select_row_' + field).hide('400', function () {
        $(this).remove();
        var remove_opt =$('select[name=select_' + field + '] option[data-opt='+opt+']'); 
        remove_opt.remove(); 
            var options = '';
            $('.select_row_' + field).each(function () {
                var opt = $(this).find('.s_opt').val();
                var val = $(this).find('.s_val').val();
                var s_opt = $(this).attr('data-opt');
                options += '<option data-opt="' + s_opt + '" value="' + val + '">' + opt + '</option>';
                console.log(options);
            });
            // $('select[name=select_' + field + ']').html(options);
        });
    });

    $(document).on('keyup', '.s_opt', function () {
        var op_val = $(this).val();
        $(this).attr('value', op_val);
        var field = $(this).closest('.row').attr('data-field');
        var option = $(this).closest('.row').attr('data-opt');
        $('select[name=select_' + field + ']').find('option[data-opt=' + option + ']').html(op_val);
    });
    $(document).on('keyup', '.s_val', function () {
        var op_val = $(this).val();
        $(this).attr('value', op_val);
        var field = $(this).closest('.row').attr('data-field');
        var option = $(this).closest('.row').attr('data-opt');
        $('select[name=select_' + field + ']').find('option[data-opt=' + option + ']').val(op_val);
    });


     $(document).on('keyup', '.r_opt', function () {
        var op_val = $(this).val();
        $(this).attr('value', op_val);
        var field = $(this).closest('.row').attr('data-field');
        var option = $(this).closest('.row').attr('data-opt');
        $('.radio_list_' + field).find('.r_opt_name_' + option).html(op_val);
    });
    $(document).on('keyup', '.r_val', function () {
        var op_val = $(this).val();
        $(this).attr('value', op_val);
        var field = $(this).closest('.row').attr('data-field');
        var option = $(this).closest('.row').attr('data-opt');
        $('.radio_list_' + field).find('input[data-opt=' + option + ']').val(op_val);
    });
    $(document).on('keyup', '.c_opt', function () {
        var op_val = $(this).val();
        $(this).attr('value', op_val);
        var field = $(this).closest('.row').attr('data-field');
        var option = $(this).closest('.row').attr('data-opt');
        $('.checkbox_list_' + field).find('.c_opt_name_' + option).html(op_val);
    });
    $(document).on('keyup', '.c_val', function () {
        var op_val = $(this).val();
        $(this).attr('value', op_val);
        var field = $(this).closest('.row').attr('data-field');
        var option = $(this).closest('.row').attr('data-opt');
        $('.checkbox_list_' + field).find('input[data-opt=' + option + ']').val(op_val);
    });

    $(document).on('keyup', '.form_input_label', function () {
        var label = $(this).val();
        $(this).attr('value', label);

        // field slug
        var str = label.toLowerCase();
        str = str.replace(/ /g,"_");
        $(this).parents('.form_output').find('.form_input_name').attr('value', str);
    });

    $(document).on('keyup', '.form_input_name', function () {
        var name = $(this).val();
        $(this).attr('value', name);
    });

    function getPreview(plain_html = '') {
    	
        var el = $('.sortable .form_output');
        var html = '';
        var field_detail_array= {};
        var sel_value= {};

        var $full_html = '';
        var full_html_code = '';
        // field_detail_array['text'] = {};
        // field_detail_array['textarea'] = {};
        // field_detail_array['date'] = {};
        // field_detail_array['select'] = {};
        // field_detail_array['radio'] = {};
        // field_detail_array['checkbox'] = {};

        el.each(function (i) {
            var data_type = $(this).attr('data-type');  
            var label = $(this).find('.form_input_label').val();             
            var name = $(this).find('.form_input_name').val(); 

            if(data_type === 'text') {
              html += '<div class="ste-mb-1 form-group form_builder_field_preview" data-group_name="'+ label.toLowerCase().replace(/ /g,"_") +'" data-group_type="'+ data_type +'" ><div class=""><label class="control-label ste-public-form-label-text ">' + label + '</label></div><div class=""><input type="text" name="' + label.toLowerCase().replace(/ /g,"_") + '" class="ste-col-60 form-control text-field" /></div></div>';
               field_detail_array[i] = { 'field_name' : label.toLowerCase().replace(/ /g,"_"), 'field_type' : data_type, 'default_value' : label};               
               
            }
            if(data_type === 'textarea') {
              html += '<div class="ste-mb-1 form-group form_builder_field_preview" data-group_name="'+ label.toLowerCase().replace(/ /g,"_") +'" data-group_type="'+ data_type +'" ><div class=""><label class="control-label ste-public-form-label-text ">' + label + '</label></div><div class=""><textarea rows="5" name="' + label.toLowerCase().replace(/ /g,"_") + '" class="ste-col-60 form-control textarea-field" /></textarea></div></div>';
               field_detail_array[i] = { 'field_name' : label.toLowerCase().replace(/ /g,"_"), 'field_type' : data_type, 'default_value' : label};
            }
            if(data_type === 'date') {
              html += '<div class="ste-mb-1 form-group form_builder_field_preview" data-group_name="'+ label.toLowerCase().replace(/ /g,"_") +'" data-group_type="'+ data_type +'" ><div class=""><label class="control-label ste-public-form-label-text ste-flexb-20">' + label + '</label></div><div class=""><input type="date" name="' + label.toLowerCase().replace(/ /g,"_") + '" class="ste-col-60 form-control date-field" /></div></div>';
              field_detail = { 'field_name' : label, 'field_type' : data_type, 'default_value' : label.toLowerCase().replace(/ /g,"_")};
              field_detail_array[i] = { 'field_name' : label.toLowerCase().replace(/ /g,"_"), 'field_type' : data_type, 'default_value' : label};
            }
          
            if (data_type === 'select') {
                var opt_arr =[];
                var option_html = '';
                $(this).find('select option').each(function () {
                    var opt = $(this).html();
                    var value = $(this).val();
                    option_html += '<option value="' + opt + '">' + opt + '</option>';
                    opt_arr.push({'label':opt,'value':opt});
                });             
                
                html += '<div class="ste-mb-1 form-group form_builder_field_preview" data-group_name="'+ label.toLowerCase().replace(/ /g,"_") +'" data-group_type="'+ data_type +'" ><div class=""><label class="control-label ste-public-form-label-text ste-flexb-20">' + label + '</label></div><div class=""><select class="ste-col-60 form-control form-dropdown-field" name="' + label.toLowerCase().replace(/ /g,"_") + '">' + option_html + '</select></div></div>';
                field_detail_array[i] = { 'field_name' : label.toLowerCase().replace(/ /g,"_"), 'field_type' : data_type, 'default_value' : opt_arr};
            }
            if (data_type === 'radio') {
                var option_html = '';
                 var radio_arr =[];
                $(this).find('.mt-radio').each(function () {
                    // var option = $(this).find('p').html();
                    var option = $(this).find('input[type=text]').val();
                    // var value = $(this).find('input[type=radio]').val();
                    option_html += '<div class="form-check ste-mr-0-5"><label class="form-check-label"><input style="margin: 0px 5px 0px 0px; vertical-align: middle;" type="radio" class="form-radio-field" name="' + label.toLowerCase().replace(/ /g,"_") + '" value="' + option + '">' + option + '</label></div>';
                    radio_arr.push({'label':option,'value':label.toLowerCase().replace(/ /g,"_")});
                });
                html += '<div class="ste-mb-1 form-group form_builder_field_preview" data-group_name="'+ label.toLowerCase().replace(/ /g,"_") +'" data-group_type="'+ data_type +'"><label class=" ste-public-form-label-text control-label">' + label + '</label>' + option_html + '</div>';
                field_detail_array[i] = { 'field_name' : label.toLowerCase().replace(/ /g,"_"), 'field_type' : data_type, 'default_value' : radio_arr};
            }
            if (data_type === 'checkbox') {
                var option_html = '';
                var checkbox_arr =[];
                $(this).find('.mt-checkbox').each(function () {
                    // var option = $(this).find('p').html();
                    var option = $(this).find('input[type=text]').val();
                    // var value = $(this).find('input[type=checkbox]').val();
                    option_html += '<div class="form-check ste-mr-0-5"><label class="form-check-label "><input style="margin: 0px 5px 0px 0px; vertical-align: middle;" type="checkbox" data-name="'+ label.toLowerCase().replace(/ /g,"_") +'" class="form-checkbox-field" name="' + label.toLowerCase().replace(/ /g,"_") + '[]" value="' + option + '">' + option + '</label></div>';
                    checkbox_arr.push({'label':option,'value':label.toLowerCase().replace(/ /g,"_")});
                });
                html += '<div class="ste-mb-1 form-group form_builder_field_preview" data-group_name="'+ label.toLowerCase().replace(/ /g,"_") +'" data-group_type="'+ data_type +'" ><label class=" ste-public-form-label-text control-label">' + label + '</label>' + option_html + '</div>';
                field_detail_array[i] = { 'field_name' : label.toLowerCase().replace(/ /g,"_"), 'field_type' : data_type, 'default_value' : checkbox_arr};
            }
			if(data_type === 'social_yahoo') {
              html += '<div class="ste-mb-1 form-group form_builder_field_preview" data-group_name="social_yahoo" data-group_type="'+ data_type +'" ><div class="sign-up-button ste-col-60 ste-sign-up-button yh"><a class="form_save" social-yahoo="s_yahoo"><img src="'+site_url+ 'admin/images/yh.png"><img src="'+site_url+'admin/images/vertical_yh.png"><span>Send with yahoo!</span></a></div></div>';
               field_detail_array[i] = {'field_type' : data_type};               
               
            }
			if(data_type === 'social_gmail') {
              html += '<div class="ste-mb-1 form-group form_builder_field_preview" data-group_name="social_gmail" data-group_type="'+ data_type +'"><div class="sign-up-button ste-col-60  ste-sign-up-button gp"><a class="form_save" social-gmail="s_gmail"><img src="'+site_url+ 'admin/images/gp.png"><img src="'+site_url+'admin/images/vertical_gp.png"><span>Send with Gmail</span></a></div></div>';
               field_detail_array[i] = {'field_type' : data_type};               
               
            }
			if(data_type === 'social_linkedin') {
              html += '<div class="ste-mb-1 form-group form_builder_field_preview" data-group_name="social_linkedin" data-group_type="'+ data_type +'" ><div class="sign-up-button ste-col-60 ste-sign-up-button ln"><a class="form_save" social-linkedin="s_linkedin"><img src="'+site_url+ 'admin/images/ln.png"><img src="'+site_url+'admin/images/vertical_ln.png"><span>Send with Linkedin</span></a></div></div>';
               field_detail_array[i] = {'field_type' : data_type};               
               
            } 
            // $full_html = $('#sortable').clone();
            $full_html = $('#ste-sortable').clone();
            $full_html.find('.appendableDiv').remove();
            full_html_code = $.trim($full_html.html());
			
		});
        if (plain_html === 'html') {           
            var form_name = $('#form_name').val();           
            var receiver = $('#receiver').val();
            var form_id = getUrlParameter('id');
			if(full_html_code.indexOf("social_yahoo") != -1 || full_html_code.indexOf("social_gmail") != -1 || full_html_code.indexOf("social_linkedin") != -1){
				if(form_id != undefined) {
                    $.ajax({
                        // url:site_url+'/wp-admin/admin-ajax.php',
                        url:ajax_url,
                        type:'post',
                        data:{action: 'ste_update_form_builder_data', nonce:ste.nonce, form_id : form_id, html_code : html, full_html_code : full_html_code, form_name : form_name, receiver : receiver , field_detail_array : field_detail_array},
                        dataType:'json',
						beforeSend: function(){
						$("#loader").show();
					    },
                        success:function(response){
                            if(response.success){
								$("#loader").hide();
                                $('#after_update_dialog').css('display','block');
                            }
                        }
                    });
                }
                else{ 
		            $.ajax({
						// url:site_url+'/wp-admin/admin-ajax.php',
						url:ajax_url,
						type:'post',
						data:{action: 'ste_create_form_builder_data', nonce:ste.nonce, html_code : html, full_html_code : full_html_code, form_name : form_name, receiver : receiver, field_detail_array : field_detail_array},
						dataType:'json',
						beforeSend: function() {
						$("#loader").show();
						},
						success:function(response){
							console.log(response);
							if(response.success){
							$("#loader").hide();
							// $('.shortcode').text(response.shortcode);
							$('.shortcode').val(response.shortcode);
							// window.location.href = web_url+'/wp-admin/admin.php?page=ste-form-builder&id='+response.form_id;
							window.location.href = web_url+'/wp-admin/admin.php?page=ste-form-builder&action=form_creation_div&id='+response.form_id;
						    }
						}
				    });
			    }
			 }
			else {
				alert("Please select at least one social button from Email fields section");
				return false;
			}
		} else {
            // $('#sortable').html(html);
            $('#ste-sortable').html(html);
        }
    }

    $(document).ready(function(){
        var action = getUrlParameter('action'); 
        // if(action == undefined || action == 'form_listing_div')
        // {
        //     $('.form_creation_div').hide();
        //     $('.form_listing_div').show();
        // }
        // if(action == 'form_creation_div')
        // {
        //     $('.form_listing_div').hide();
        //     $('.form_creation_div').show();
        // }

        // var filter = getUrlParameter('filter');
        // if(filter == 'trash')
        // {
        //     $('#trash').find("a").addClass("make-bold");
        // }
        // else
        // {
        //     $('#all').find("a").addClass("make-bold");
        // }
        
        // for update form
        $(document).on('click','.update_form',function(){
            var form_id = $(this).attr('id');
            var filter = $(this).data('target');
            $.ajax({
                    // url:site_url+'/wp-admin/admin-ajax.php',
                    url:ajax_url,
                    type:'post',
                    data:{action: 'ste_update_form_builder_data', form_id : form_id, nonce:ste.nonce, filter : filter},
                    dataType:'json',
                    success:function(response)
                    {
                        if(response.success)
                        {
                            if(filter != undefined && (filter == 'restore' || filter == 'delete_permanent'))
                            {
                                window.location.href = site_url+'/wp-admin/admin.php?page=ste-form-builder&filter=trash';
                            }
                            else
                            {
                                window.location.href = site_url+'/wp-admin/admin.php?page=ste-form-builder';
                            }
                        }
                    }
            });
        });

        // for delete form
        $(document).on('click','.delete_form',function(){
            var form_id = $(this).attr('id');
            $.ajax({
                    // url:site_url+'/wp-admin/admin-ajax.php',
                    url:ajax_url,
                    type:'post',
                    data:{action: 'ste_delete_form_builder_data', nonce:ste.nonce, form_id : form_id},
                    dataType:'json',
                    success:function(response)
                    {
                        if(response.success)
                        {
                            window.location.href = site_url+'/wp-admin/admin.php?page=ste-form-builder&filter=trash';
                        }
                    }
            });
        });

        $(document).on('click','#bulk_action',function(){
            var action = $('#bulk-action-selector-top').val();
            if(action == 'move_to_trash' || action == 'restore')
            {
                var val = [];
                $('.gform_list_checkbox:checked').each(function(i){
                    val[i] = $(this).val();
                });
                
                $.ajax({
                        // url:site_url+'/wp-admin/admin-ajax.php',
                        url:ajax_url,
                        type:'post',
                        data:{action: 'ste_update_form_builder_data', nonce:ste.nonce, form_id : val, filter : action},
                        dataType:'json',
                        success:function(response)
                        {
                            if(response.success)
                            {
                                if(action != undefined && action == 'restore')
                                {
                                    window.location.href = site_url+'/wp-admin/admin.php?page=ste-form-builder&filter=trash';
                                }
                                else
                                {
                                    window.location.href = site_url+'/wp-admin/admin.php?page=ste-form-builder';
                                }
                            }
                        }
                });
            }
            else if(action == 'delete_entries')
            {
                var val = [];
                $('.gform_list_checkbox:checked').each(function(i){
                    val[i] = $(this).val();
                });
                
                $.ajax({
                        // url:site_url+'/wp-admin/admin-ajax.php',
                        url:ajax_url,
                        type:'post',
                        data:{action: 'ste_delete_form_builder_data', nonce:ste.nonce, form_id : val},
                        dataType:'json',
                        success:function(response)
                        {
                            if(response.success)
                            {
                                window.location.href = site_url+'/wp-admin/admin.php?page=ste-form-builder';
                            }
                        }
                });
            }
        });
        
        var $full_html = full_html_code = '';
        $(document).on('click', '.preview_form', function () {
            var btnText = $('.preview_form').text();
            if(btnText == 'Preview')
            {
                // $full_html = $('#sortable').clone();
                $full_html = $('#ste-sortable').clone();
                full_html_code = $full_html.html();
                getPreview();
                $('.preview_form').html('Back');
				$('.create_form').prop('disabled', true);
            }
            else
            {
                // $('#sortable').html(full_html_code);
                $('#ste-sortable').html(full_html_code);
                $('.preview_form').html('Preview');
				$('.create_form').prop('disabled', false);
            }
        });
	}); 

	$(document).ready(function(){
	$("button[name=copy_shortcode]").click(function() {
		 var shortcode = $("#shortcode").val();
		 var copied_text = $('<input>').val(shortcode).appendTo('body').select()
		document.execCommand('copy');
		alert("Shortcode copied.");
		return false;
	});
});

 $(document).on('click', '.create_form', function (event) {

        getPreview('html');
    });


 	var len = $('.form_builder_field').length;        
	var formID = getUrlParameter('id');
	if(formID != undefined)
	{
		$.ajax({
				// url:site_url+'/wp-admin/admin-ajax.php',
				url:ajax_url,
				type:'post',
		        data:{action: 'ste_get_edit_form_data',nonce:ste.nonce, form_id : formID},
				dataType:'JSON',
				success:function(response)
				{
					console.log("responce",response);
					if(response.success)
					{
						form_name = response.result[0].form_name;
						receiver = response.result[0].receiver;
						html_code = response.result[0].html_code;
						full_html_code = response.result[0].full_html_code.replace(/\\/g, '');
						shortcode = response.result[0].shortcode;

						$('#form_name').val(form_name);
						$('#receiver').val(receiver);
						$('.shortcode').val(shortcode);
						// $('.shortcode').text(shortcode);
						$('.shortcode').prop('readonly', true);
						$('.appendableDiv').before(full_html_code);
						$('.btn-shortcode').show();
						$(".shrt_btn").show();
					}
				}
			});
	}
	else
	{
		$('.btn-shortcode').hide();
	}


	})( jQuery );

	