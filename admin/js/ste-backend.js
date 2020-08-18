/* Ajax url*/
var ajax_url = ste.ajax_url;
/* site url*/
var site_url = ste.plugin_url;
var web_url = ste.site_url;

/* 
 * Find Parent Objet
 */
var getParentId = function(row) {
    var parentElem = jQuery(row).find('.li_row[data-field]');
    var parentId = 0;
    if (parentElem.length > 0) {
        parentId = parentElem.attr('data-field');
    }
    return parentId;
};

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] == sParam) {
            return sParameterName[1] == undefined ? true : decodeURIComponent(sParameterName[1]);
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

function getHTMLRow() {
    var field = generateField();
    var html = '<div class="li_' + field + ' ste-builder-field ste-row-full html_item_row_container html_row">' +
        '<div class="ste-row ste-flex ste-align-center control-box">' +
        '<button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="' + field + '"></button>' +
        '</div>' +
        '<div class="li_row stedb-li-row-flex" data-type="row" data-field="' + field + '"></div>' +
        '</div>';
    return html;
}

function getTextFieldHTML(parentId) {
    var field = generateField();
    var html = '<div class="li_' + field + '  ste-builder-field ste-row stedb-col">' +
        '<div class="ste-flex ste-justify-space ste-align-center">' +
        '<button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="' + field + '"></button>'

    +'</div>' +
    '<div id="text-box" class="li_row  form_output" data-type="text" data-field="' + field + '" data-parent-field="' + parentId + '">' +
        '<input type="text" name="label_' + field + '" class="ste-field form-control form_input_label" placeholder="Enter your label here" data-field="' + field + '">' +
        '</div>' +
        '</div>';
    return html;
}

function getTextAreaFieldHTML(parentId) {
    var field = generateField();
    var html = '<div class="li_' + field + ' ste-builder-field ste-row stedb-col">' +
        '<div class="ste-flex ste-justify-space ste-align-center">' +
        '<button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="' + field + '"></button>' +
        '</div>' +
        '<div class="li_row form_output" data-type="textarea" data-field="' + field + '" data-parent-field="' + parentId + '">' +
        '<input type="text" name="label_' + field + '" class="ste-field form-control form_input_label" placeholder="Enter your label here" data-field="' + field + '">' +
        '</div>' +
        '</div>';
    return html;
}

function getNumberFieldHTML(parentId) {
    var field = generateField();
    var html = '<div class="li_' + field + ' ste-builder-field ste-row stedb-col">' +
        '<div class="ste-flex ste-justify-space ste-align-center">' +
        '<button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="' + field + '"></button>' +
        '</div>' +
        '<div class="li_row form_output" data-type="number" data-field="' + field + '" data-parent-field="' + parentId + '">' +
        '<input type="text" name="label_' + field + '" class="ste-field form-control form_input_label" placeholder="Enter your label here" data-field="' + field + '">' +
        '</div>' +
        '</div>';
    // return html;   
    return html;
}

function getLinkFieldHTML(parentId) {
    var field = generateField();
    var html = '<div class="li_' + field + ' ste-builder-field ste-row stedb-col">' +
        '<div class="ste-flex ste-justify-space ste-align-center">' +
        '<button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="' + field + '"></button>' +
        '</div>' +
        '<div class="li_row form_output" data-type="url" data-field="' + field + '" data-parent-field="' + parentId + '">' +
        '<input type="text" name="label_' + field + '" class="ste-field form-control form_input_label" placeholder="Enter your label here" data-field="' + field + '">' +
        '</div>' +
        '</div>';
    // return html;   
    return html;
}

function getRadioFieldHTML(parentId) {
    var field = generateField();
    var opt1 = generateField();
    var html = '<div class="li_' + field + ' ste-builder-field ste-row stedb-col">' +
        '<div class="ste-justify-space ste-align-center">' +
        '<button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="' + field + '"></button>' +
        '</div>' +
        '<div class="li_row form_output" data-type="radio" data-field="' + field + '" data-parent-field="' + parentId + '">' +
        '<input type="text" name="label_' + field + '" class="ste-field form-control form_input_label" placeholder="Enter your label here" data-field="' + field + '">'
        // +'</div>'
        +
        '<div class="field_extra_info_' + field + '">' +
        '<div class="ste-radio-list my-3 radio_row_' + field + '" data-field="' + field + '" data-opt="' + opt1 + '"> ' +
        '<div class=" ste-flex mt-radio radio_list_' + field + '">' +
        '<label class="ste-custom-input ste-flex ste-mt-0-2">' +
        '<input data-opt="' + opt1 + '" type="radio" name="radio_' + field + '" class=" r_opt_name_' + opt1 + '">' +
        '<span class="checkmark-radio ste-pos-relative"></span>' +
        '</label>' +
        '<input type="text" name="ste-radio-value" class="r_opt ste-radio-value form-control col-3 mx-3" placeholder="Enter option">' +
        '<button class="ste-add-more ste-btn-add-option add_more_radio" data-field="' + field + '">+ Add</button>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>';
    return html;
}

function getCheckboxFieldHTML() {
    var field = generateField();
    var opt1 = generateField();
    var html = '<div class="li_' + field + ' ste-builder-field ste-row stedb-col">' +
        '<div class="ste-justify-space ste-align-center">' +
        '<button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="' + field + '"></button>' +
        '</div>' +
        '<div class="li_row form_output" data-type="checkbox" data-field="' + field + '">' +
        '<input type="text" name="label_' + field + '" class="ste-field form-control form_input_label" placeholder="Enter your label here" data-field="' + field + '">'
        // +'</div>'
        +
        '<div class="field_extra_info_' + field + '">' +
        '<div class="ste-checkbox-list my-3 checkbox_row_' + field + '" data-field="' + field + '" data-opt="' + opt1 + '">' +
        '<div class="ste-flex mt-checkbox checkbox_list_' + field + '">' +
        '<label class="ste-custom-input ste-flex">' +
        '<input data-opt="' + opt1 + '" type="checkbox" name="checkbox_' + field + '" class=" c_opt_name_' + opt1 + '" >' +
        '<span class="checkmark-checkbox ste-pos-relative"></span>' +
        '</label>' +
        '<input type="text" name="ste-checkbox-value" class="c_opt ste-checkbox-value form-control col-3 mx-3" placeholder="Enter option">' +
        '<button class="ste-add-more ste-btn-add-option add_more_checkbox" data-field="' + field + '">+ Add</button>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>';
    return html;
}

function getSelectFieldHTML() {
    var field = generateField();
    var opt1 = generateField();
    var html = '<div class="li_' + field + ' ste-builder-field ste-row stedb-col">' +
        '<div class="ste-justify-space ste-align-center">' +
        '<button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="' + field + '"></button>' +
        '</div>' +
        '<div class="li_row form_output" data-type="select" data-field="' + field + '">' +
        '<input type="text" name="label_' + field + '" class="ste-field form_input_label form-control" placeholder="Enter your label here" data-field="' + field + '">'
        // +'</div>'
        +
        '<div class="ste-selectbox-list my-3">' +
        '<div class="ste-flex">' +
        '<select name="select_' + field + '" class="ste-selectbox form-control mb-3  ste-selectbox-value col-3 mr-3">' +
        '<option value="">Select Option</option>' +
        '<option data-opt="' + opt1 + '" value="Value">Option 1</option>' +
        '</select>' +
        '<button class="ste-add-more ste-btn-add-option add_more_select" data-field="' + field + '">+ Add</button>' +
        '</div>' +
        '<div class="field_extra_info_' + field + '">' +
        '<div data-field="' + field + '" class="row select_row_' + field + '" data-opt="' + opt1 + '">'
        //+'<div class="ste-flex ">' 
        +
        '<label class="ste-selectbox-inputbox ste-flex ste-py-rm-0-4">' +
        '<input type="text" name="ste-selectbox-options" class="s_opt ste-selectbox-options form-control ste-flexb-90 "placeholder="Enter option">' +
        '</label>'
        //+'</div>'
        +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>';
    return html;
}

function getDateFieldHTML(parentId) {
    var field = generateField();
    var opt1 = generateField();
    var html = '<div class="li_' + field + ' ste-builder-field ste-row stedb-col">' +
        '<div class="ste-flex ste-justify-space ste-align-center">' +
        '<button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="' + field + '"></button>' +
        '</div>' +
        '<div class="li_row form_output" data-type="date" data-field="' + field + '" data-parent-field="' + parentId + '">' +
        '<input type="text" name="label_' + field + '" class="ste-field form_input_label form-control" placeholder="Enter your label here" data-field="' + field + '">' +
        '</div>' +
        '</div>';
    return html;
}

function getYahooHTML(parentId) {
    var field = generateField();
    var html = '<div class="li_' + field + ' ste-builder-field ste-row  stedb-col">' +
        '<div class="li_row form_output ste-flex ste-my-0-5" data-type="social_yahoo" data-field="' + field + '" data-parent-field="' + parentId + '">' +
        '<div class="sign-up-button ste-sign-up-button yh">' +
        '<a class="form_save" social-yahoo="s_yahoo">' +
        '<img src="' + site_url + 'admin/images/yahoo.png">' +
        // '<img src="' + site_url + 'admin/images/vertical_yh.png">' +
        '<span class="align-self-center">Submit via Yahoo!</span>' +
        '</a>' +
        '</div>' +
        '<button class="ste-remove-field ste-icon-field icon icon-close remove_social_bal_field" data-field="' + field + '"></button>' +
        '</div>' +
        '</div>';
    return html;
}

function getGmailHTML(parentId) {
    var field = generateField();
    var html = '<div class="li_' + field + ' ste-builder-field ste-row ste-height-auto stedb-col">' +
        '<div class="li_row form_output ste-flex ste-my-0-5" data-type="social_gmail" data-field="' + field + '" data-parent-field="' + parentId + '">' +
        '<div class="sign-up-button ste-sign-up-button gp">' +
        '<a class="form_save" social-gmail="s_gmail">' +
        '<img src="' + site_url + 'admin/images/gmail.png">' +
        // '<img src="' + site_url + 'admin/images/vertical_gp.png">' +
        '<span class="align-self-center">Submit via Gmail</span>' +
        '</a>' +
        '</div>' +
        '<button class="ste-remove-field ste-icon-field icon icon-close remove_social_bal_field" data-field="' + field + '"></button>' +
        '</div>' +
        '</div>';
    return html;
}

function getLinkedinHTML(parentId) {
    var field = generateField();
    var html = '<div class="li_' + field + ' ste-builder-field ste-row ste-height-auto stedb-col">' +
        '<div class="li_row form_output ste-flex ste-my-0-5" data-type="social_linkedin" data-field="' + field + '" data-parent-field="' + parentId + '">' +
        '<div class="sign-up-button ste-sign-up-button ln">' +
        '<a class="form_save" social-linkedin="s_linkedin">' +
        '<img src="' + site_url + 'admin/images/linkedin.png">' +
        // '<img src="' + site_url + 'admin/images/vertical_ln.png">' +
        '<span class="align-self-center">Submit via Linkedin</span>' +
        '</a>' +
        '</div>' +
        '<button class="ste-remove-field ste-icon-field icon icon-close remove_linkedin_bal_field" data-field="' + field + '"></button>' +
        '</div>' +
        '</div>';
    return html;
}
(function($) {

    var addDroppableListener = function() {
            $(".html_item_row_container").droppable({
                accept: ".draggable, .social_gmail, .social_yahoo, .social_linkedin",
                classes: {
                    "ui-droppable-active": "ui-state-active",
                    "ui-droppable-hover": "ui-state-hover",
                },
                drop: function(event, ui) {
                    $("#sortable").removeClass('ste-bg-drag-img');
                    var elem;
                    var parentId = getParentId(this);
                    if (ui.helper.find('[data-type]').attr('data-type') == 'text') {
                        elem = getTextFieldHTML(parentId);
                    }
                    if (ui.helper.find('[data-type]').attr('data-type') == 'textarea') {
                        elem = getTextAreaFieldHTML(parentId);
                    }
                    if (ui.helper.find('[data-type]').attr('data-type') == 'number') {
                        elem = getNumberFieldHTML(parentId);
                    }
                    if (ui.helper.find('[data-type]').attr('data-type') == 'url') {
                        elem = getLinkFieldHTML(parentId);
                    }
                    if (ui.helper.find('[data-type]').attr('data-type') == 'radio') {
                        elem = getRadioFieldHTML(parentId);
                    }
                    if (ui.helper.find('[data-type]').attr('data-type') == 'checkbox') {
                        elem = getCheckboxFieldHTML(parentId);
                    }
                    if (ui.helper.find('[data-type]').attr('data-type') == 'select') {
                        elem = getSelectFieldHTML(parentId);
                    }
                    if (ui.helper.find('[data-type]').attr('data-type') == 'date') {
                        elem = getDateFieldHTML(parentId);
                    }
                    if (ui.helper.find('[data-type]').attr('data-type') == 'social_yahoo') {
                        elem = getYahooHTML(parentId);
                        if ('.social_yahoo' != -1) {
                            jQuery(".social_gmail").draggable('disable');
                            jQuery(".social_yahoo").draggable('disable');
                            jQuery(".social_yahoo").closest(".ste-social-icon").append("<a href='javascript:void(0);' title='Due to some technical restrictions, Yahoo and Gmail cannot be used together in one form.' class='help'>&#8505;</a>");
                            jQuery(".social_gmail").closest(".ste-social-icon").append("<a href='javascript:void(0);' title='Due to some technical restrictions, Yahoo and Gmail cannot be used together in one form.' class='help'>&#8505;</a>");
                            $("[title]").tooltip({
                                position: {
                                    my: "left top",
                                    at: "right+5 top-5",
                                    collision: "none"
                                }
                            });
                        }
                    }
                    if (ui.helper.find('[data-type]').attr('data-type') == 'social_gmail') {
                        elem = getGmailHTML(parentId);
                        if ('social_gmail' != -1) {
                            jQuery(".social_gmail").draggable('disable');
                            jQuery(".social_yahoo").draggable('disable');
                            jQuery(".social_yahoo").closest(".ste-social-icon").append("<a href='javascript:void(0);' title='Due to some technical restrictions, Yahoo and Gmail cannot be used together in one form.' class='help'>&#8505;</a>");
                            jQuery(".social_gmail").closest(".ste-social-icon").append("<a href='javascript:void(0);' title='Due to some technical restrictions, Yahoo and Gmail cannot be used together in one form.' class='help'>&#8505;</a>");
                            $("[title]").tooltip({
                                position: {
                                    my: "left top",
                                    at: "right+5 top-5",
                                    collision: "none"
                                }
                            });
                        }
                    }
                    if (ui.helper.find('[data-type]').attr('data-type') == 'social_linkedin') {
                        elem = getLinkedinHTML(parentId);
                        if ('.social_linkedin' != -1) {
                            jQuery(".social_linkedin").draggable('disable');
                        }
                    }
                    $(this).find('[data-type=row]').append(elem);
                },
            });
        }
        /* draggable jquery*/
    $(".html_row").draggable({
        helper: function() {
            return getHTMLRow();
        },
        connectToSortable: "#ste-sortable"
    });
    $(".text_box").draggable({
        stop: function(event, ui) {
            $('.message-box').remove();
        },
        helper: function() {
            $('.btn-shortcode').show();
            return getTextFieldHTML();
        },
        connectToSortable: ".html_item_row_container"
    });
    $(".text_area").draggable({
        helper: function() {
            $('.btn-shortcode').show();
            return getTextAreaFieldHTML();
        },
        connectToSortable: ".html_item_row_container"
    });
    $(".number_box").draggable({
        helper: function() {
            $('.btn-shortcode').show();
            return getNumberFieldHTML();
        },
        connectToSortable: ".html_item_row_container"
    });
    $(".radio_button").draggable({
        helper: function() {
            $('.btn-shortcode').show();
            return getRadioFieldHTML();
        },
        connectToSortable: ".html_item_row_container"
    });
    $(".checkbox").draggable({
        helper: function() {
            $('.btn-shortcode').show();
            return getCheckboxFieldHTML();
        },
        connectToSortable: ".html_item_row_container"
    });
    $(".select_box").draggable({
        helper: function() {
            $('.btn-shortcode').show();
            return getSelectFieldHTML();
        },
        connectToSortable: ".html_item_row_container"
    });
    $(".date_box").draggable({
        helper: function() {
            $('.btn-shortcode').show();
            return getDateFieldHTML();
        },
        connectToSortable: ".html_item_row_container"
    });
    $(".link_box").draggable({
        helper: function() {
            $('.btn-shortcode').show();
            return getLinkFieldHTML();
        },
        connectToSortable: ".html_item_row_container"
    });
    $(".social_yahoo").draggable({
        helper: function() {
            $('.btn-shortcode').show();
            return getYahooHTML();
        },
        connectToSortable: ".html_item_row_container",
    });
    $(".social_gmail").draggable({
        helper: function() {
            $('.btn-shortcode').hide();
            return getGmailHTML();
        },
        connectToSortable: ".html_item_row_container",
    });
    $(".social_linkedin").draggable({
        helper: function() {
            $('.btn-shortcode').show();
            return getLinkedinHTML();
        },
        connectToSortable: ".html_item_row_container",
    });
    $(".text_box, .text_area, .number_box, .number_box, .radio_button, .checkbox, .select_box, .date_box, .link_box, .social_yahoo, .social_gmail, .social_linkedin").draggable({
        start: function(event, ui) {
            if (jQuery("#ste-sortable").find("[data-type='row']").length <= 0) {
                $(".text_box, .text_area, .number_box, .number_box, .radio_button, .checkbox, .select_box, .date_box, .link_box").draggable('disable')
                $(".sp-container").show();
                $(".arrow_message").show();
                var full_html_code = '<div class="sp-container"><div class="sp-content"><div class="sp-globe"></div><h2 class="frame-1">Please Drag The Row First !</h2></div></div>'
                $('.appendableDiv').before(full_html_code);

            }
        },
        stop: function() {
            $('.sp-container').remove();
            $(".text_box, .text_area, .number_box, .number_box, .radio_button, .checkbox, .select_box, .date_box, .link_box").draggable('enable')
            $(".arrow_message").hide();
        }
    });

    $("#ste-sortable").sortable({
        cursor: 'move',
        placeholder: 'placeholder',
        start: function(e, ui) {
            ui.placeholder.height(ui.helper.outerHeight());
            //$("#sortable").removeClass('ste-bg-drag-img');
        },
        receive: function(ev, ui) {
            if ('add_row_item' == ui.item.attr('id')) {
                /**row container droppable*/
                addDroppableListener();
            }
        },
        stop: function(ev, ui) {
            if (!$('.sortable .form_output').length > 0) {

                $("#sortable").addClass('ste-bg-drag-img');
            }
        }
    });
    $("#ste-sortable").disableSelection();

    $(document).on('click', '.remove_bal_field', function(e) {
        e.preventDefault();
        var field = $(this).attr('data-field');
        $(this).closest('.li_' + field).hide('400', function() {

            var len = $('.form_builder_field').length;
            if (len == 0) {
                $('.btn-shortcode').hide();
            }
            if ($(this).hasClass("html_row")) {
                if ($(this).find("[data-type='social_gmail'],[data-type='social_yahoo']").length > 0) {
                    jQuery(".social_gmail").draggable('enable');
                    jQuery(".social_yahoo").draggable('enable');
                    jQuery(".ste-social-icon").find(".help").remove();
                }
            }
            if ($(this).hasClass("html_row")) {
                if ($(this).find("[data-type='social_linkedin']").length > 0) {
                    jQuery(".social_linkedin").draggable('enable');
                }
            }
            $(this).remove();
        });

    });
    $(document).on('click', '.remove_social_bal_field', function(e) {
        e.preventDefault();
        var field = $(this).attr('data-field');
        $(this).closest('.li_' + field).hide('400', function() {
            $(this).remove();
            var len = $('.form_builder_field').length;
            if (len == 0) {
                $('.btn-shortcode').hide();
            }
        });
        jQuery(".social_gmail").draggable('enable');
        jQuery(".social_yahoo").draggable('enable');
        jQuery(".ste-social-icon").find(".help").remove();


    });
    $(document).on('click', '.remove_linkedin_bal_field', function(e) {
        e.preventDefault();
        var field = $(this).attr('data-field');
        $(this).closest('.li_' + field).hide('400', function() {
            $(this).remove();
            var len = $('.form_builder_field').length;
            if (len == 0) {
                $('.btn-shortcode').hide();
            }
        });
        jQuery(".social_linkedin").draggable('enable');

    });
    $(document).on('click', '.add_more_radio', function() {
        $(this).closest('.ste-builder-field').css('height', 'auto');
        var field = $(this).attr('data-field');
        var option = generateField();
        $('.field_extra_info_' + field).append(
            '<div class="mt-radio ste-my-0-5 radio_row_' + field + '"  data-field="' + field + '" data-opt="' + option + '">' +
            '<div class=" ste-flex radio_list_' + field + '">' +
            '<label class="ste-custom-input ste-flex  ste-mt-0-2">' +
            '<input data-opt="' + option + '" type="radio" name="radio_' + field + '" class="r_opt_name_' + option + '">' +
            '<span class="checkmark-radio ste-pos-relative"></span>' +
            '</label>' +
            '<input type="text" name="ste-radio-value" class="r_opt ste-radio-value form-control col-3 mx-3">' +
            '<button class="ste-add-more ste-btn-remove-option remove_more_radio" data-field="' + field + '">x</button>' +
            '</div>' +
            '</div>'
        );

    });

    $(document).on('click', '.add_more_checkbox', function() {
        $(this).closest('.ste-builder-field').css('height', 'auto');
        var field = $(this).attr('data-field');
        var option = generateField();
        $('.field_extra_info_' + field).append(
            '<div class="ste-checkbox-list  checkbox_row_' + field + '" data-field="' + field + '" data-opt="' + option + '">' +
            '<div class="ste-flex mt-checkbox my-3 checkbox_list_' + field + '">' +
            '<label class="ste-custom-input ste-flex ">' +
            '<input data-opt="' + option + '" type="checkbox" name="checkbox_' + field + '" class=" c_opt_name_' + option + '">' +
            '<span class="checkmark-checkbox ste-pos-relative"></span>' +
            '</label>' +
            '<input type="text" name="ste-checkbox-value" class="c_opt ste-checkbox-value form-control col-3 mx-3">' +
            '<button class="ste-add-more  ste-btn-remove-option remove_more_checkbox" data-field="' + field + '">x</button>' +
            '</div>' +
            '</div>'
        );
    });

    $(document).on('click', '.add_more_select', function() {
        $(this).closest('.ste-builder-field').css('height', 'auto');
        var field = $(this).attr('data-field');
        var option = generateField();
        $('.field_extra_info_' + field).append(
            '<div data-field="' + field + '" class="row select_row_' + field + '" data-opt="' + option + '">' +
            '<div class="ste-flex mb-3 ">' +
            '<input type="text" name="ste-selectbox-options" class="s_opt form-control ste-selectbox-options col-8 mr-3 ">' +
            '<button class="ste-add-more ste-btn-remove-option remove_more_select" data-field="' + field + '" data-opt="' + option + '" >x</button>' +
            '</div>' +
            '</div>'
        );
        var options = '';
        $('.select_row_' + field).each(function() {
            var opt = $(this).find('.s_opt').val();
            var val = 'option';
            var s_opt = $(this).attr('data-opt');
            options += '<option data-opt="' + s_opt + '" value="' + val + '">' + opt + '</option>';
        });
        $('select[name=select_' + field + ']').html(options);
    });
    $(document).on('click', '.remove_more_radio', function() {
        var field = $(this).attr('data-field');
        $(this).closest('.radio_row_' + field).hide('400', function() {
            $(this).remove();
            var options = '';
            $('.radio_row_' + field).each(function() {
                var opt = $(this).find('.r_opt').val();
                var val = $(this).find('.r_val').val();
                var s_opt = $(this).attr('data-opt');
                options += '<label class="mt-radio mt-radio-outline"><input data-opt="' + s_opt + '" type="radio" name="radio_' + field + '" value="' + val + '"> <p class="r_opt r_opt_name_' + s_opt + '">' + opt + '</p><span></span></label>';
            });
        });
    });
    $(document).on('click', '.remove_more_checkbox', function() {
        var field = $(this).attr('data-field');
        $(this).closest('.checkbox_row_' + field).hide('400', function() {
            $(this).remove();
            var options = '';
            $('.checkbox_row_' + field).each(function() {
                var opt = $(this).find('.c_opt').val();
                var val = $(this).find('.c_val').val();
                var s_opt = $(this).attr('data-opt');
                options += '<label class="mt-checkbox mt-checkbox-outline"><input data-opt="' + s_opt + '" name="checkbox_' + field + '" type="checkbox" value="' + val + '"> <p class="c_opt r_opt_name_' + s_opt + '">' + opt + '</p><span></span></label>';
            });
        });
    });
    $(document).on('click', '.remove_more_select', function() {
        var field = $(this).attr('data-field');
        var opt = $(this).attr('data-opt');
        $(this).closest('.select_row_' + field).hide('400', function() {
            $(this).remove();
            var remove_opt = $('select[name=select_' + field + '] option[data-opt=' + opt + ']');
            remove_opt.remove();
            var options = '';
            $('.select_row_' + field).each(function() {
                var opt = $(this).find('.s_opt').val();
                var val = $(this).find('.s_val').val();
                var s_opt = $(this).attr('data-opt');
                options += '<option data-opt="' + s_opt + '" value="' + val + '">' + opt + '</option>';
            });
        });
    });

    $(document).on('keyup', '.s_opt', function() {
        var op_val = $(this).val();
        $(this).attr('value', op_val);
        var field = $(this).closest('.row').attr('data-field');
        var option = $(this).closest('.row').attr('data-opt');
        $('select[name=select_' + field + ']').find('option[data-opt=' + option + ']').html(op_val);
    });
    $(document).on('keyup', '.s_val', function() {
        var op_val = $(this).val();
        $(this).attr('value', op_val);
        var field = $(this).closest('.row').attr('data-field');
        var option = $(this).closest('.row').attr('data-opt');
        $('select[name=select_' + field + ']').find('option[data-opt=' + option + ']').val(op_val);
    });


    $(document).on('keyup', '.r_opt', function() {
        var op_val = $(this).val();
        $(this).attr('value', op_val);
        var field = $(this).closest('.row').attr('data-field');
        var option = $(this).closest('.row').attr('data-opt');
        $('.radio_list_' + field).find('.r_opt_name_' + option).html(op_val);
    });
    $(document).on('keyup', '.r_val', function() {
        var op_val = $(this).val();
        $(this).attr('value', op_val);
        var field = $(this).closest('.row').attr('data-field');
        var option = $(this).closest('.row').attr('data-opt');
        $('.radio_list_' + field).find('input[data-opt=' + option + ']').val(op_val);
    });
    $(document).on('keyup', '.c_opt', function() {
        var op_val = $(this).val();
        $(this).attr('value', op_val);
        var field = $(this).closest('.row').attr('data-field');
        var option = $(this).closest('.row').attr('data-opt');
        $('.checkbox_list_' + field).find('.c_opt_name_' + option).html(op_val);
    });
    $(document).on('keyup', '.c_val', function() {
        var op_val = $(this).val();
        $(this).attr('value', op_val);
        var field = $(this).closest('.row').attr('data-field');
        var option = $(this).closest('.row').attr('data-opt');
        $('.checkbox_list_' + field).find('input[data-opt=' + option + ']').val(op_val);
    });

    $(document).on('keyup', '.form_input_label', function() {
        var label = $(this).val();
        $(this).attr('value', label);

        // field slug
        var str = label.toLowerCase();
        str = str.replace(/ /g, "_");
        $(this).parents('.form_output').find('.form_input_name').attr('value', str);
    });

    $(document).on('keyup', '.form_input_name', function() {
        var name = $(this).val();
        $(this).attr('value', name);
    });

    function getPreview(plain_html = '') {

        var el = $('.sortable .form_output');
        var formRows = $('.html_item_row_container');
        var html = '';
        var field_detail_array = {};
        var sel_value = {};

        var $full_html = '';
        var full_html_code = '';
        var index = 0;
        formRows.each(function() {
            var elTmp = $(this).find('.form_output');
            html += '<div class="li_row stedb-li-row-flex">';
            elTmp.each(function(i) { //elements form output process[started]
                var data_type = $(this).attr('data-type');
                var label = $(this).find('.form_input_label').val();
                var name = $(this).find('.form_input_name').val();
                if (data_type == 'text') {
                    html += '<div class="ste-mb-1 stedb-col form-group form_builder_field_preview" data-group_name="' + label.toLowerCase().replace(/ /g, "_") + '" data-group_type="' + data_type + '" ><div class=""><label class="control-label ste-public-form-label-text ">' + label + '</label></div><div class=" text-field"><input type="text" name="' + label.toLowerCase().replace(/ /g, "_") + '" class="form-control ste-container-alpha text-field" /></div></div>';
                    field_detail_array[index++] = { 'field_name': label.toLowerCase().replace(/ /g, "_"), 'field_type': data_type, 'default_value': label };
                }
                if (data_type == 'textarea') {
                    html += '<div class="ste-mb-1 stedb-col form-group form_builder_field_preview" data-group_name="' + label.toLowerCase().replace(/ /g, "_") + '" data-group_type="' + data_type + '" ><div class=""><label class="control-label ste-public-form-label-text ">' + label + '</label></div><div class="ste-textbox textarea-field"><textarea rows="5" name="' + label.toLowerCase().replace(/ /g, "_") + '" class="form-control textarea-field" /></textarea></div></div>';
                    field_detail_array[index++] = { 'field_name': label.toLowerCase().replace(/ /g, "_"), 'field_type': data_type, 'default_value': label }
                }
                if (data_type == 'number') {
                    html += '<div class="ste-mb-1 stedb-col form-group form_builder_field_preview" data-group_name="' + label.toLowerCase().replace(/ /g, "_") + '" data-group_type="' + data_type + '" ><div class=""><label class="control-label ste-public-form-label-text ">' + label + '</label></div><div class=" number-field"><input type="number" name="' + label.toLowerCase().replace(/ /g, "_") + '" class="form-control number-field" /></div></div>';
                    field_detail_array[index++] = { 'field_name': label.toLowerCase().replace(/ /g, "_"), 'field_type': data_type, 'default_value': label };
                }
                if (data_type == 'url') {
                    html += '<div class="ste-mb-1 stedb-col form-group form_builder_field_preview" data-group_name="' + label.toLowerCase().replace(/ /g, "_") + '" data-group_type="' + data_type + '" ><div class=""><label class="control-label ste-public-form-label-text ">' + label + '</label></div><div class=" link-field"><input type="url" name="' + label.toLowerCase().replace(/ /g, "_") + '" class="form-control link-field" /></div></div>';
                    field_detail_array[index++] = { 'field_name': label.toLowerCase().replace(/ /g, "_"), 'field_type': data_type, 'default_value': label };
                }
                if (data_type == 'date') {
                    html += '<div class="ste-mb-1 stedb-col form-group form_builder_field_preview" data-group_name="' + label.toLowerCase().replace(/ /g, "_") + '" data-group_type="' + data_type + '" ><div class=""><label class="control-label ste-public-form-label-text ste-flexb-20">' + label + '</label></div><div class=" dat-field"><input type="date" name="' + label.toLowerCase().replace(/ /g, "_") + '" class="form-control date-field" /></div></div>';
                    field_detail = { 'field_name': label, 'field_type': data_type, 'default_value': label.toLowerCase().replace(/ /g, "_") };
                    field_detail_array[index++] = { 'field_name': label.toLowerCase().replace(/ /g, "_"), 'field_type': data_type, 'default_value': label };
                }
                if (data_type == 'select') {
                    var opt_arr = [];
                    var option_html = '';
                    $(this).find('select option').each(function() {
                        var opt = $(this).html();
                        var value = $(this).val();
                        option_html += '<option value="' + opt + '">' + opt + '</option>';
                        opt_arr.push({ 'label': opt, 'value': opt });
                    });
                    html += '<div class="ste-mb-1 form-group form_builder_field_preview stedb-col" data-group_name="' + label.toLowerCase().replace(/ /g, "_") + '" data-group_type="' + data_type + '" ><div class=""><label class="control-label ste-public-form-label-text ste-flexb-20">' + label + '</label></div><div class=""><select class="form-control form-dropdown-field ste-select" name="' + label.toLowerCase().replace(/ /g, "_") + '">' + option_html + '</select></div></div>';
                    field_detail_array[index++] = { 'field_name': label.toLowerCase().replace(/ /g, "_"), 'field_type': data_type, 'default_value': opt_arr };
                }
                if (data_type == 'radio') {
                    var option_html = '';
                    var radio_arr = [];
                    $(this).find('.mt-radio').each(function() {
                        var option = $(this).find('input[type=text]').val();
                        option_html += '<div class="form-check ste-mr-0-5 stedb-col"><label class="form-check-label"><input style="margin: 0px 5px 0px 0px;  vertical-align: middle;" type="radio" class="form-radio-field" name="' + label.toLowerCase().replace(/ /g, "_") + '" value="' + option + '">' + option + '</label></div>';
                        radio_arr.push({ 'label': option, 'value': label.toLowerCase().replace(/ /g, "_") });
                    });
                    html += '<div class="ste-mb-1 form-group form_builder_field_preview" data-group_name="' + label.toLowerCase().replace(/ /g, "_") + '" data-group_type="' + data_type + '"><label class=" ste-public-form-label-text control-label">' + label + '</label>' + option_html + '</div>';
                    field_detail_array[index++] = { 'field_name': label.toLowerCase().replace(/ /g, "_"), 'field_type': data_type, 'default_value': radio_arr };
                }
                if (data_type == 'checkbox') {
                    var option_html = '';
                    var checkbox_arr = [];
                    $(this).find('.mt-checkbox').each(function() {
                        var option = $(this).find('input[type=text]').val();
                        option_html += '<div class="form-check ste-mr-0-5 stedb-col"><label class="form-check-label "><input style="margin: 0px 5px 0px 0px; border-radius:5px; vertical-align: middle;" type="checkbox" data-name="' + label.toLowerCase().replace(/ /g, "_") + '" class="form-checkbox-field" name="' + label.toLowerCase().replace(/ /g, "_") + '[]" value="' + option + '">' + option + '</label></div>';
                        checkbox_arr.push({ 'label': option, 'value': label.toLowerCase().replace(/ /g, "_") });
                    });
                    html += '<div class="ste-mb-1 form-group form_builder_field_preview" data-group_name="' + label.toLowerCase().replace(/ /g, "_") + '" data-group_type="' + data_type + '" ><label class=" ste-public-form-label-text control-label">' + label + '</label>' + option_html + '</div>';
                    field_detail_array[index++] = { 'field_name': label.toLowerCase().replace(/ /g, "_"), 'field_type': data_type, 'default_value': checkbox_arr };
                }
                if (data_type == 'social_yahoo') {
                    html += '<div class="ste-mb-1 form-group form_builder_field_preview stedb-col" data-group_name="social_yahoo" data-group_type="' + data_type + '" ><div class="sign-up-button ste-sign-up-button yh"><a style="text-decoration:none" class="form_save" social-yahoo="s_yahoo"><img src="' + site_url + 'admin/images/yahoo.png"><span class="align-self-center">Submit via Yahoo!</span></a></div></div>';
                    field_detail_array[index++] = { 'field_type': data_type };

                }
                if (data_type == 'social_gmail') {
                    html += '<div class="ste-mb-1 form-group form_builder_field_preview stedb-col" data-group_name="social_gmail" data-group_type="' + data_type + '"><div class="sign-up-button ste-sign-up-button gp"><a style="text-decoration:none" class="form_save" social-gmail="s_gmail"><img src="' + site_url + 'admin/images/gmail.png"><span class="align-self-center">Submit via Gmail</span></a></div></div>';
                    field_detail_array[index++] = { 'field_type': data_type };

                }
                if (data_type == 'social_linkedin') {
                    html += '<div class="ste-mb-1 form-group form_builder_field_preview stedb-col" data-group_name="social_linkedin" data-group_type="' + data_type + '" ><div class="sign-up-button  ste-sign-up-button ln"><a style="text-decoration:none" class="form_save" social-linkedin="s_linkedin"><img src="' + site_url + 'admin/images/linkedin.png"><span class="align-self-center">Submit via Linkedin</span></a></div></div>';
                    field_detail_array[index++] = { 'field_type': data_type };

                }


            }); //elements form output process[done]
            html += '</div>';
        });
        $full_html = $('#ste-sortable').clone();
        $full_html.find('.appendableDiv').remove();
        full_html_code = $.trim($full_html.html());

        if (plain_html == 'html') {
            var form_name = $('#form_name').val();
            var receiver = $('#receiver').val();
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var form_id = getUrlParameter('id');
            if (form_name == '') {
                alert("Please Enter Form Name!");
                return;
            }
            if (receiver == '') {
                alert("Please Enter Receiver Email!");
                return;
            }
            if (receiver != '') {
                if (!regex.test(receiver)) {
                    alert('Please Enter a Valid Email');
                    return;
                }
            }

            if (full_html_code.indexOf("social_yahoo") != -1 || full_html_code.indexOf("social_gmail") != -1 || full_html_code.indexOf("social_linkedin") != -1) {
                if (form_id != undefined) {
                    $.ajax({
                        url: ajax_url,
                        type: 'post',
                        data: { action: 'ste_update_form_builder_data', nonce: ste.nonce, form_id: form_id, html_code: html, full_html_code: full_html_code, form_name: form_name, receiver: receiver, field_detail_array: field_detail_array },
                        dataType: 'json',
                        beforeSend: function() {
                            $("#loader").show();
                            $(".create_form").prop("disabled", true);
                        },
                        success: function(response) {
                            if (response.success) {
                                $("#loader").hide();
                                $(".create_form").prop("disabled", false);
                                $('#after_update_dialog').css('display', 'block');
                            }
                        }
                    });
                } else {
                    $.ajax({
                        url: ajax_url,
                        type: 'post',
                        data: { action: 'ste_create_form_builder_data', nonce: ste.nonce, html_code: html, full_html_code: full_html_code, form_name: form_name, receiver: receiver, field_detail_array: field_detail_array },
                        dataType: 'json',
                        beforeSend: function() {
                            $("#loader").show();
                            $(".create_form").prop("disabled", true);
                        },
                        success: function(response) {
                            if (response.success) {
                                $("#loader").hide();
                                $(".create_form").prop("disabled", false);
                                $('.shortcode').val(response.shortcode);
                                window.location.href = web_url + '/wp-admin/admin.php?page=ste-form-builder&action=form_creation_div&id=' + response.form_id;
                            }
                        }
                    });
                }
            } else {
                alert("Please select at least one social button from Email fields section");
                return false;
            }
        } else {
            $('#ste-sortable').html(html);
        }
    }

    $(document).ready(function() {
        var action = getUrlParameter('action');
        // for update form
        $(document).on('click', '.update_form', function() {
            var form_id = $(this).attr('id');
            var filter = $(this).data('target');
            $.ajax({
                url: ajax_url,
                type: 'post',
                data: { action: 'ste_update_form_builder_data', form_id: form_id, nonce: ste.nonce, filter: filter },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        if (filter != undefined && (filter == 'restore' || filter == 'delete_permanent')) {
                            window.location.href = site_url + '/wp-admin/admin.php?page=ste-form-builder&filter=trash';
                        } else {
                            window.location.href = site_url + '/wp-admin/admin.php?page=ste-form-builder';
                        }
                    }
                }
            });
        });

        // for delete form
        $(document).on('click', '.delete_form', function() {
            var form_id = $(this).attr('id');
            $.ajax({
                url: ajax_url,
                type: 'post',
                data: { action: 'ste_delete_form_builder_data', nonce: ste.nonce, form_id: form_id },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        window.location.href = site_url + '/wp-admin/admin.php?page=ste-form-builder&filter=trash';
                    }
                }
            });
        });

        $(document).on('click', '#bulk_action', function() {
            var action = $('#bulk-action-selector-top').val();
            if (action == 'move_to_trash' || action == 'restore') {
                var val = [];
                $('.gform_list_checkbox:checked').each(function(i) {
                    val[i] = $(this).val();
                });
                $.ajax({
                    url: ajax_url,
                    type: 'post',
                    data: { action: 'ste_update_form_builder_data', nonce: ste.nonce, form_id: val, filter: action },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            if (action != undefined && action == 'restore') {
                                window.location.href = site_url + '/wp-admin/admin.php?page=ste-form-builder&filter=trash';
                            } else {
                                window.location.href = site_url + '/wp-admin/admin.php?page=ste-form-builder';
                            }
                        }
                    }
                });
            } else if (action == 'delete_entries') {
                var val = [];
                $('.gform_list_checkbox:checked').each(function(i) {
                    val[i] = $(this).val();
                });

                $.ajax({
                    url: ajax_url,
                    type: 'post',
                    data: { action: 'ste_delete_form_builder_data', nonce: ste.nonce, form_id: val },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            window.location.href = site_url + '/wp-admin/admin.php?page=ste-form-builder';
                        }
                    }
                });
            }
        });

        var $full_html = full_html_code = '';
        $(document).on('click', '.preview_form', function() {
            var btnText = $('.preview_form').text();
            if (btnText == 'Preview') {
                $full_html = $('#ste-sortable').clone();
                full_html_code = $full_html.html();
                getPreview();
                $('.preview_form').html('<span class="icon">&#8592;</span>Back');
                $('.create_form').prop('disabled', true);
            } else {
                $('#ste-sortable').html(full_html_code);
                /**row container droppable*/
                addDroppableListener();
                $('.preview_form').html('<span class="icon icon-view"></span>Preview');
                $('.create_form').prop('disabled', false);
            }
        });
    });

    $(document).ready(function() {
        $("button[name=copy_shortcode]").click(function() {
            var shortcode = $("#shortcode_box").val();
            var copied_text = $('<input>').val(shortcode).appendTo('body').select()
            document.execCommand('copy');
            alert("Shortcode copied.");
            return false;
        });
    });

    $(document).on('click', '.create_form', function(event) {

        getPreview('html');
    });


    var len = $('.form_builder_field').length;
    var formID = getUrlParameter('id');
    if (formID != undefined) {
        $.ajax({
            url: ajax_url,
            type: 'post',
            data: { action: 'ste_get_edit_form_data', nonce: ste.nonce, form_id: formID },
            dataType: 'JSON',
            success: function(response) {
                if (response.success) {
                    form_name = response.result[0].form_name;
                    receiver = response.result[0].receiver;
                    html_code = response.result[0].html_code;
                    full_html_code = response.result[0].full_html_code.replace(/\\/g, '');
                    shortcode = response.result[0].shortcode;

                    $('#form_name').val(form_name);
                    $('#receiver').val(receiver);
                    $('.shortcode').val(shortcode);
                    $('.shortcode').prop('readonly', true);
                    $('.appendableDiv').before(full_html_code);
                    $("#sortable").removeClass('ste-bg-drag-img');
                    $('.btn-shortcode').show();
                    $(".shrt_btn").show();
                    /**row container droppable*/
                    addDroppableListener();
                    //Disable Gmail and Yahoo Button if either of them is loaded.
                    if ($("#ste-sortable").find("[data-type='social_gmail'],[data-type='social_yahoo']").length > 0) {
                        jQuery(".social_gmail").draggable('disable');
                        jQuery(".social_yahoo").draggable('disable');
                        jQuery(".social_linkedin").draggable('disable');
                        jQuery(".social_yahoo").closest(".ste-social-icon").append("<a href='javascript:void(0);' title='Due to some technical restrictions, Yahoo and Gmail cannot be used together in one form.' class='help'>&#8505;</a>");
                        jQuery(".social_gmail").closest(".ste-social-icon").append("<a href='javascript:void(0);' title='Due to some technical restrictions, Yahoo and Gmail cannot be used together in one form.' class='help'>&#8505;</a>");
                        $("[title]").tooltip({
                            position: {
                                my: "left top",
                                at: "right+5 top-5",
                                collision: "none"
                            }
                        });
                    }

                }
                //Disable LinkedIn if linkedin button is loaded.
                if ($("#ste-sortable").find("[data-type='social_linkedin']").length > 0) {
                    jQuery(".social_linkedin").draggable('disable');
                }


            }
        });
    } else {
        $('.btn-shortcode').hide();
        if (jQuery('#formTemplateChoiceModal').length > 0) {
            jQuery('#formTemplateChoiceModal').modal('show');
        }

    }

    $(document).on('click', 'input[name="form_hide_checkbox"]', function() {
        $.ajax({
            url: ajax_url,
            type: 'post',
            data: { action: 'ste_dont_show' },
            dataType: 'json',
            beforeSend: function() {},
            success: function(response) {}
        });
        $("#formTemplateChoiceModal").modal('hide');
    });
    $(document).on('click', '#contact_form', function() {

        var full_html_code = '<div class="li_68708 ste-builder-field ste-row-full html_item_row_container html_row ui-droppable" style="width: 291px; right: auto; height: 183px; bottom: auto;"><div class="ste-row ste-flex ste-align-center control-box"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="68708"></button></div><div class="li_row stedb-li-row-flex" data-type="row" data-field="68708"><div class="li_52171  ste-builder-field ste-row stedb-col"><div class="ste-flex ste-justify-space ste-align-center"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="52171"></button></div><div id="text-box" class="li_row  form_output" data-type="text" data-field="52171" data-parent-field="68708"><input type="text" name="label_52171" class="ste-field form-control form_input_label" placeholder="Enter your label here" data-field="52171" value="First Name"></div></div><div class="li_31260  ste-builder-field ste-row stedb-col"><div class="ste-flex ste-justify-space ste-align-center"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="31260"></button></div><div id="text-box" class="li_row  form_output" data-type="text" data-field="31260" data-parent-field="68708"><input type="text" name="label_31260" class="ste-field form-control form_input_label" placeholder="Enter your label here" data-field="31260" value="Last Name"></div></div></div></div><div class="li_61915 ste-builder-field ste-row-full html_item_row_container html_row ui-droppable" style="width: 291px; right: auto; height: 183px; bottom: auto;"><div class="ste-row ste-flex ste-align-center control-box"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="61915"></button></div><div class="li_row stedb-li-row-flex" data-type="row" data-field="61915"><div class="li_28948 ste-builder-field ste-row stedb-col" style="height: auto;"><div class="ste-justify-space ste-align-center"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="28948"></button></div><div class="li_row form_output" data-type="select" data-field="28948"><input type="text" name="label_28948" class="ste-field form_input_label form-control" placeholder="Enter your label here" data-field="28948" value="You can contact us at"><div class="ste-selectbox-list my-3"><div class="ste-flex"><select name="select_28948" class="ste-selectbox form-control mb-3  ste-selectbox-value col-3 mr-3"><option data-opt="4525" value="option">Facebook</option><option data-opt="59073" value="option">Twitter</option><option data-opt="80025" value="option">Instagram</option></select><button class="ste-add-more ste-btn-add-option add_more_select" data-field="28948">+ Add</button></div><div class="field_extra_info_28948"><div data-field="28948" class="row select_row_28948" data-opt="4525"><label class="ste-selectbox-inputbox ste-flex ste-py-rm-0-4"><input type="text" name="ste-selectbox-options" class="s_opt ste-selectbox-options form-control ste-flexb-90 " placeholder="Enter option" value="Facebook"></label></div><div data-field="28948" class="row select_row_28948" data-opt="59073"><div class="ste-flex mb-3 "><input type="text" name="ste-selectbox-options" class="s_opt form-control ste-selectbox-options col-8 mr-3 " value="Twitter"><button class="ste-add-more ste-btn-remove-option remove_more_select" data-field="28948" data-opt="59073">x</button></div></div><div data-field="28948" class="row select_row_28948" data-opt="80025"><div class="ste-flex mb-3 "><input type="text" name="ste-selectbox-options" class="s_opt form-control ste-selectbox-options col-8 mr-3 " value="Instagram"><button class="ste-add-more ste-btn-remove-option remove_more_select" data-field="28948" data-opt="80025">x</button></div></div></div></div></div></div></div></div><div class="li_44828 ste-builder-field ste-row-full html_item_row_container html_row ui-droppable" style="width: 291px; right: auto; height: 183px; bottom: auto;"><div class="ste-row ste-flex ste-align-center control-box"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="44828"></button></div><div class="li_row stedb-li-row-flex" data-type="row" data-field="44828"><div class="li_79732 ste-builder-field ste-row stedb-col"><div class="ste-flex ste-justify-space ste-align-center"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="79732"></button></div><div class="li_row form_output" data-type="textarea" data-field="79732" data-parent-field="44828"><input type="text" name="label_79732" class="ste-field form-control form_input_label" placeholder="Enter your label here" data-field="79732" value="Message"></div></div></div></div><div class="li_8747 ste-builder-field ste-row-full html_item_row_container html_row ui-droppable" style="width: 291px; right: auto; height: 183px; bottom: auto;"><div class="ste-row ste-flex ste-align-center control-box"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="8747"></button></div><div class="li_row stedb-li-row-flex" data-type="row" data-field="8747"><div class="li_16706 ste-builder-field ste-row ste-height-auto stedb-col"><div class="li_row form_output ste-flex ste-my-0-5" data-type="social_linkedin" data-field="16706" data-parent-field="8747"><div class="sign-up-button ste-sign-up-button ln"><a class="form_save" social-linkedin="s_linkedin"><img src="' + site_url + 'admin/images/linkedin.png"><span class="align-self-center">Submit via Linkedin</span></a></div><button class="ste-remove-field ste-icon-field icon icon-close remove_linkedin_bal_field" data-field="16706"></button></div></div><div class="li_85539 ste-builder-field ste-row ste-height-auto stedb-col"><div class="li_row form_output ste-flex ste-my-0-5" data-type="social_gmail" data-field="85539" data-parent-field="8747"><div class="sign-up-button ste-sign-up-button gp"><a class="form_save" social-gmail="s_gmail"><img src="' + site_url + 'admin/images/gmail.png"><span class="align-self-center">Submit via Gmail</span></a></div><button class="ste-remove-field ste-icon-field icon icon-close remove_social_bal_field" data-field="85539"></button></div></div></div></div>';
        $('#form_name').val('');
        $('#receiver').val('');
        $('.appendableDiv').before(full_html_code);
        $("#sortable").removeClass('ste-bg-drag-img');
        if ($("#ste-sortable").find("[data-type='social_gmail'],[data-type='social_yahoo'],[data-type='social_linkedin']").length > 0) {
            jQuery(".social_gmail").draggable('disable');
            jQuery(".social_yahoo").draggable('disable');
            jQuery(".social_linkedin").draggable('disable');
            /**row container droppable*/
            addDroppableListener();
            jQuery(".social_yahoo").closest(".ste-social-icon").append("<a href='javascript:void(0);' title='Due to some technical restrictions, Yahoo and Gmail cannot be used together in one form.' class='help'>&#8505;</a>");
            jQuery(".social_gmail").closest(".ste-social-icon").append("<a href='javascript:void(0);' title='Due to some technical restrictions, Yahoo and Gmail cannot be used together in one form.' class='help'>&#8505;</a>");
            $("[title]").tooltip({
                position: {
                    my: "left top",
                    at: "right+5 top-5",
                    collision: "none"
                }
            });
        }
    });

    $(document).on('click', '#simple_form', function() {
        var full_html_code = '<div class="li_28345 ste-builder-field ste-row-full html_item_row_container html_row ui-droppable" style="width: 291px; right: auto; height: 183px; bottom: auto;"><div class="ste-row ste-flex ste-align-center control-box"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="28345"></button></div><div class="li_row stedb-li-row-flex" data-type="row" data-field="28345"><div class="li_10555  ste-builder-field ste-row stedb-col"><div class="ste-flex ste-justify-space ste-align-center"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="10555"></button></div><div id="text-box" class="li_row  form_output" data-type="text" data-field="10555" data-parent-field="28345"><input type="text" name="label_10555" class="ste-field form-control form_input_label" placeholder="Enter your label here" data-field="10555" value="First Name"></div></div><div class="li_57169  ste-builder-field ste-row stedb-col"><div class="ste-flex ste-justify-space ste-align-center"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="57169"></button></div><div id="text-box" class="li_row  form_output" data-type="text" data-field="57169" data-parent-field="28345"><input type="text" name="label_57169" class="ste-field form-control form_input_label" placeholder="Enter your label here" data-field="57169" value="Last Name"></div></div></div></div><div class="li_97713 ste-builder-field ste-row-full html_item_row_container html_row ui-droppable" style="width: 291px; right: auto; height: 183px; bottom: auto;"><div class="ste-row ste-flex ste-align-center control-box"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="97713"></button></div><div class="li_row stedb-li-row-flex" data-type="row" data-field="97713"><div class="li_71367 ste-builder-field ste-row stedb-col"><div class="ste-flex ste-justify-space ste-align-center"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="71367"></button></div><div class="li_row form_output" data-type="textarea" data-field="71367" data-parent-field="97713"><input type="text" name="label_71367" class="ste-field form-control form_input_label" placeholder="Enter your label here" data-field="71367" value="Message"></div></div></div></div><div class="li_69667 ste-builder-field ste-row-full html_item_row_container html_row ui-droppable" style="width: 291px; right: auto; height: 183px; bottom: auto;"><div class="ste-row ste-flex ste-align-center control-box"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="69667"></button></div><div class="li_row stedb-li-row-flex" data-type="row" data-field="69667"><div class="li_21048 ste-builder-field ste-row ste-height-auto stedb-col"><div class="li_row form_output ste-flex ste-my-0-5" data-type="social_linkedin" data-field="21048" data-parent-field="69667"><div class="sign-up-button ste-sign-up-button ln"><a class="form_save" social-linkedin="s_linkedin"><img src="' + site_url + 'admin/images/linkedin.png"><span class="align-self-center">Submit via Linkedin</span></a></div><button class="ste-remove-field ste-icon-field icon icon-close remove_linkedin_bal_field" data-field="21048"></button></div></div><div class="li_29836 ste-builder-field ste-row ste-height-auto stedb-col"><div class="li_row form_output ste-flex ste-my-0-5" data-type="social_gmail" data-field="29836" data-parent-field="69667"><div class="sign-up-button ste-sign-up-button gp"><a class="form_save" social-gmail="s_gmail"><img src="' + site_url + 'admin/images/gmail.png"><span class="align-self-center">Submit via Gmail</span></a></div><button class="ste-remove-field ste-icon-field icon icon-close remove_social_bal_field" data-field="29836"></button></div></div></div></div>';
        $('#form_name').val('');
        $('#receiver').val('');
        $('.appendableDiv').before(full_html_code);
        $("#sortable").removeClass('ste-bg-drag-img');
        /**row container droppable*/
        addDroppableListener();
        if ($("#ste-sortable").find("[data-type='social_gmail'],[data-type='social_yahoo'],[data-type='social_linkedin']").length > 0) {
            jQuery(".social_gmail").draggable('disable');
            jQuery(".social_yahoo").draggable('disable');
            jQuery(".social_linkedin").draggable('disable');
            jQuery(".social_yahoo").closest(".ste-social-icon").append("<a href='javascript:void(0);' title='Due to some technical restrictions, Yahoo and Gmail cannot be used together in one form.' class='help'>&#8505;</a>");
            jQuery(".social_gmail").closest(".ste-social-icon").append("<a href='javascript:void(0);' title='Due to some technical restrictions, Yahoo and Gmail cannot be used together in one form.' class='help'>&#8505;</a>");
            $("[title]").tooltip({
                position: {
                    my: "left top",
                    at: "right+5 top-5",
                    collision: "none"
                }
            });
        }

    });

    $(document).on('click', '#shipping_form', function() {
        var full_html_code = '<div class="li_66748 ste-builder-field ste-row-full html_item_row_container html_row ui-droppable" style="width: 291px; right: auto; height: 183px; bottom: auto;"><div class="ste-row ste-flex ste-align-center control-box"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="66748"></button></div><div class="li_row stedb-li-row-flex" data-type="row" data-field="66748"><div class="li_64171  ste-builder-field ste-row stedb-col"><div class="ste-flex ste-justify-space ste-align-center"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="64171"></button></div><div id="text-box" class="li_row  form_output" data-type="text" data-field="64171" data-parent-field="66748"><input type="text" name="label_64171" class="ste-field form-control form_input_label" placeholder="Enter your label here" data-field="64171" value="First Name"></div></div><div class="li_85762  ste-builder-field ste-row stedb-col"><div class="ste-flex ste-justify-space ste-align-center"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="85762"></button></div><div id="text-box" class="li_row  form_output" data-type="text" data-field="85762" data-parent-field="66748"><input type="text" name="label_85762" class="ste-field form-control form_input_label" placeholder="Enter your label here" data-field="85762" value="Last Name"></div></div></div></div><div class="li_73976 ste-builder-field ste-row-full html_item_row_container html_row ui-droppable" style="width: 291px; right: auto; height: 183px; bottom: auto;"><div class="ste-row ste-flex ste-align-center control-box"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="73976"></button></div><div class="li_row stedb-li-row-flex" data-type="row" data-field="73976"><div class="li_4034 ste-builder-field ste-row stedb-col"><div class="ste-flex ste-justify-space ste-align-center"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="4034"></button></div><div class="li_row form_output" data-type="textarea" data-field="4034" data-parent-field="73976"><input type="text" name="label_4034" class="ste-field form-control form_input_label" placeholder="Enter your label here" data-field="4034" value="Message"></div></div></div></div><div class="li_10829 ste-builder-field ste-row-full html_item_row_container html_row ui-droppable" style="width: 291px; right: auto; height: 183px; bottom: auto;"><div class="ste-row ste-flex ste-align-center control-box"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="10829"></button></div><div class="li_row stedb-li-row-flex" data-type="row" data-field="10829"><div class="li_7870 ste-builder-field ste-row stedb-col"><div class="ste-flex ste-justify-space ste-align-center"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="7870"></button></div><div class="li_row form_output" data-type="date" data-field="7870" data-parent-field="10829"><input type="text" name="label_7870" class="ste-field form_input_label form-control" placeholder="Enter your label here" data-field="7870" value="Departure Date"></div></div><div class="li_3437 ste-builder-field ste-row stedb-col"><div class="ste-flex ste-justify-space ste-align-center"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="3437"></button></div><div class="li_row form_output" data-type="date" data-field="3437" data-parent-field="10829"><input type="text" name="label_3437" class="ste-field form_input_label form-control" placeholder="Enter your label here" data-field="3437" value="Arrival Date"></div></div></div></div><div class="li_20535 ste-builder-field ste-row-full html_item_row_container html_row ui-droppable" style="width: 291px; right: auto; height: 183px; bottom: auto;"><div class="ste-row ste-flex ste-align-center control-box"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="20535"></button></div><div class="li_row stedb-li-row-flex" data-type="row" data-field="20535"><div class="li_41528 ste-builder-field ste-row stedb-col" style="height: auto;"><div class="ste-justify-space ste-align-center"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="41528"></button></div><div class="li_row form_output" data-type="checkbox" data-field="41528"><input type="text" name="label_41528" class="ste-field form-control form_input_label" placeholder="Enter your label here" data-field="41528" value="Status"><div class="field_extra_info_41528"><div class="ste-checkbox-list my-3 checkbox_row_41528" data-field="41528" data-opt="43155"><div class="ste-flex mt-checkbox checkbox_list_41528"><label class="ste-custom-input ste-flex"><input data-opt="43155" type="checkbox" name="checkbox_41528" class=" c_opt_name_43155"><span class="checkmark-checkbox ste-pos-relative"></span></label><input type="text" name="ste-checkbox-value" class="c_opt ste-checkbox-value form-control col-3 mx-3" placeholder="Enter option" value="Pending"><button class="ste-add-more ste-btn-add-option add_more_checkbox" data-field="41528">+ Add</button></div></div><div class="ste-checkbox-list  checkbox_row_41528" data-field="41528" data-opt="25071"><div class="ste-flex mt-checkbox my-3 checkbox_list_41528"><label class="ste-custom-input ste-flex "><input data-opt="25071" type="checkbox" name="checkbox_41528" class=" c_opt_name_25071"><span class="checkmark-checkbox ste-pos-relative"></span></label><input type="text" name="ste-checkbox-value" class="c_opt ste-checkbox-value form-control col-3 mx-3" value="Shipped"><button class="ste-add-more  ste-btn-remove-option remove_more_checkbox" data-field="41528">x</button></div></div><div class="ste-checkbox-list  checkbox_row_41528" data-field="41528" data-opt="70798"><div class="ste-flex mt-checkbox my-3 checkbox_list_41528"><label class="ste-custom-input ste-flex "><input data-opt="70798" type="checkbox" name="checkbox_41528" class=" c_opt_name_70798"><span class="checkmark-checkbox ste-pos-relative"></span></label><input type="text" name="ste-checkbox-value" class="c_opt ste-checkbox-value form-control col-3 mx-3" value="Canceled"><button class="ste-add-more  ste-btn-remove-option remove_more_checkbox" data-field="41528">x</button></div></div></div></div></div></div></div><div class="li_81921 ste-builder-field ste-row-full html_item_row_container html_row ui-droppable" style="width: 291px; right: auto; height: 183px; bottom: auto;"><div class="ste-row ste-flex ste-align-center control-box"><button class="ste-remove-field ste-icon-field icon icon-close remove_bal_field" data-field="81921"></button></div><div class="li_row stedb-li-row-flex" data-type="row" data-field="81921"><div class="li_44309 ste-builder-field ste-row ste-height-auto stedb-col"><div class="li_row form_output ste-flex ste-my-0-5" data-type="social_linkedin" data-field="44309" data-parent-field="81921"><div class="sign-up-button ste-sign-up-button ln"><a class="form_save" social-linkedin="s_linkedin"><img src="' + site_url + 'admin/images/linkedin.png"><span class="align-self-center">Submit via Linkedin</span></a></div><button class="ste-remove-field ste-icon-field icon icon-close remove_linkedin_bal_field" data-field="44309"></button></div></div><div class="li_50787 ste-builder-field ste-row ste-height-auto stedb-col"><div class="li_row form_output ste-flex ste-my-0-5" data-type="social_gmail" data-field="50787" data-parent-field="81921"><div class="sign-up-button ste-sign-up-button gp"><a class="form_save" social-gmail="s_gmail"><img src="' + site_url + 'admin/images/gmail.png"><span class="align-self-center">Submit via Gmail</span></a></div><button class="ste-remove-field ste-icon-field icon icon-close remove_social_bal_field" data-field="50787"></button></div></div></div></div>';
        $('#form_name').val('');
        $('#receiver').val(' ');
        $('.appendableDiv').before(full_html_code);
        $("#sortable").removeClass('ste-bg-drag-img');
        /**row container droppable*/
        addDroppableListener();
        if ($("#ste-sortable").find("[data-type='social_gmail'],[data-type='social_yahoo'],[data-type='social_linkedin']").length > 0) {
            jQuery(".social_gmail").draggable('disable');
            jQuery(".social_yahoo").draggable('disable');
            jQuery(".social_linkedin").draggable('disable');
            jQuery(".social_yahoo").closest(".ste-social-icon").append("<a href='javascript:void(0);' title='Due to some technical restrictions, Yahoo and Gmail cannot be used together in one form.' class='help'>&#8505;</a>");
            jQuery(".social_gmail").closest(".ste-social-icon").append("<a href='javascript:void(0);' title='Due to some technical restrictions, Yahoo and Gmail cannot be used together in one form.' class='help'>&#8505;</a>");
            $("[title]").tooltip({
                position: {
                    my: "left top",
                    at: "right+5 top-5",
                    collision: "none"
                }
            });
        }

    });

    $("[title]").tooltip({
        position: {
            my: "down",
            collision: "none"
        }
    });

    // Address start
    $(document).on('click', '.update_send_address', function(e) {
        e.preventDefault();
        var address = $("#address").val();

        var address2 = $("#address2").val();
        var city = $("#city").val();
        var state_province = $("#state_province").val();
        var zip_code = $("#zip_code").val();
        var country = $("#country").val();
        var valid = true;
        $('#submit-setting-update').find('input[type=text]').each(function() {
            $(this).removeClass('input-field-error');
            var string = $(this).val();
            if (string == '' && $(this).attr('name') != 'address2') {
                $(this).addClass('input-field-error');
                valid = false;
            }
        });
        if ($('#submit-setting-update').find('select').val() === null) {
            valid = false;
            $('#submit-setting-update').find('select').addClass('input-field-error')
        } else {
            $('#submit-setting-update').find('select').removeClass('input-field-error')
        }
        $('#submit-setting-update').find('.input-field-error:first').focus();
        if (!valid)
            return false;
        $.ajax({
            url: ajax_url,
            type: 'post',
            data: { 'action': 'ste_send_update_address', 'address': address, 'address2': address2, 'city': city, 'state_province': state_province, 'zip_code': zip_code, 'country': country, nonce: ste.nonce },
            dataType: 'JSON',
            beforeSend: function() {
                $("#loader1").show();
            },
            success: function(response) {
                $("#loader1").hide();
                if (response.success) {
                    $('.ajax-message-settings').html('<div style="margin:15px 0px"><b style="color:green;font-size: 15px;">Successfully Saved</b></div>')
                } else {
                    $('.ajax-message-settings').html('<div style="margin:15px 0px"><b style="color:red;font-size: 15px;">' + response.message + '</b></div>')
                }
            },
        });
    });

})(jQuery);