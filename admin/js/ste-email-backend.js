/* Ajax url*/
var ajax_url = ste_email.ajax_url;
/* site url*/
var site_url = ste_email.plugin_url;
var web_url = ste_email.site_url;

/********* CK Editor ************/
// (function( $ ) {
// $(document).ready(function(){
// CKEDITOR.replace('txtFT_Content', {
//       height: 130,
//     });
// });

// })( jQuery );
/******************form Data****************/
(function($) {
    $(document).ready(function() {
            var address = $("#address").val();
            if (address == '') {
                    $("#exampleModal").modal('show');
                    return false;
                }
        // CKEDITOR.replace('txtFT_Content', {
        //      allowedContent: true
        //    });

        // $("#form-page").click();
        var form_name = '';
        var receiver = '';
        var html_code = '';
        var full_html_code = '';
        var shortcode = '';
        var html_content = '';
        var html_content_short = '';

        $.ajax({
            // url:'../wp-admin/admin-ajax.php',
            url: ajax_url,
            type: 'post',
            data: { action: 'ste_get_form_data', nonce: ste.nonce },
            dataType: 'JSON',
            success: function(response) {
                if (response.success) {
                    var emailList = response.result;
                    for (var i = 0; i < emailList.length; i++) {
                        if (emailList[i].status == 4) {
                            var status = "Running";
                        }
                        if (emailList[i].type == 1) {
                            var type = "Autoresponder";
                        }
                        if (emailList[i].status == 1) {
                            var status = "Draft";
                        }
                        if (emailList[i].status == 3) {
                            var status = "Scheduled";
                        }
                        if (emailList[i].type == 0) {
                            var type = "Regular Email";
                        }
                        if (emailList[i].type == null || emailList[i].type == '') {
                            var type = '';
                        }
                        if (emailList[i].status == null || emailList[i].status == '') {
                            var status = '';
                        }
                        var run_date = (emailList[i].run_date == null) ? '' : emailList[i].run_date;

                        if (i % 2 == 0) {
                            var tr_class = "ste-se-tr-odd";
                        } else {
                            var tr_class = "ste-se-tr-even";
                        }
                        html_content += '<div id=' + emailList[i].id + ' data-list-id="' + emailList[i].form_id + '"class="ste-se-tr ' + tr_class + '">' +
                            '<div class="ste-se-td  ste-se-td-15 shouldShowWhenMinified">' + emailList[i].form_name + '</div>' +
                            '<div class="ste-se-td ste-b-clr ste-se-td-15 shouldNotShowWhenMinified">' + status + '</div>' +
                            '<div class="ste-se-td  ste-se-td-15 shouldShowWhenMinified">' + emailList[i].creation_date + '</div>' +
                            '<div class="ste-se-td ste-b-clr  ste-se-td-15 shouldNotShowWhenMinified"><a style="cursor: pointer;" onclick="ste_get_email_data(' + emailList[i].form_id + ')">' + type + '</a></div>' +
                            '<div class="ste-se-td  ste-se-td-15 shouldNotShowWhenMinified">' + run_date + '</div>' +
                            '<div class="ste-se-td  ste-se-td-20 shouldNotShowWhenMinified">' + emailList[i].shortcode + '</div>' +
                            // '<div class="dropdown ste-se-td btn-group ste-se-td-5  ">' +
                            // '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">hello</button>' +
                            // '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">' +
                            // '<a class="dropdown-item" href="#">Edit</a>' +
                            // '<a class="dropdown-item" href="#">Delete</a>' +
                            // '</div>' +
                            // '</div>' +
                            '</div>';
                    }
                    $('.email_list').html(html_content);
                }
            }
        });
    });
    /*********************** Run Autoresponder  **************************/
    document.getElementById('getdata').addEventListener('click', () => {
        var email_content = CKEDITOR.instances["txtFT_Content"].getData();
        var from_name = $("#from_name").val();
        var address = $("#address").val();
        var from_email = $("#from_email").val();
        var email_subject = $("#subject").val();
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var email_status = 4; //Running status
        var email_type = 1; //Autoresponder type
        var new_list_id = $("#form_data_table .email_list .selected_form_list_tr").attr('id');
        /*****list_id ******/
        var list_id = $("#form_data_table .email_list .selected_form_list_tr").attr('data-list-id');
        if (from_name == '') {
            alert("Please Enter Form Name!");
            return false;
        }
        if (from_email == '') {
                alert('Please Enter From Email');
                return;
        }
        if (from_email != '') {
            if (!regex.test(from_email)) {
                alert('Please Enter a Valid From Email');
                return;
            }
        }
        if (email_subject == '') {
            alert("Please Enter Autoresponder Subject!");
            return false;
        }
        if (email_content == '') {
            alert("Please Enter Autoresponder Content!");
            return false;
        }
        if (list_id == '' || list_id == undefined) {
            alert("Please select the form to which you would like to broadcast your message, to do that  just click at any part of the above rows");
            return false;
        }
        if (address == '') {
            $("#exampleModal").modal('show');
            return false;
        }
        $.ajax({
            url: ajax_url,
            type: 'post',
            data: { 'action': 'stedb_create_campaign', 'email_content': email_content, 'from_name': from_name, 'email_subject': email_subject, 'email_status': email_status, 'email_type': email_type, 'list_id': list_id, 'form_id': new_list_id, nonce: ste.nonce },
            dataType: 'JSON',
            beforeSend: function() {
                $("#loader1").show();
            },
            success: function(response) {
                if (response.success) {
                    if (response.status == 'updated') {
                        alert("Autoresponder updated successfully");
                    }
                    if (response.status == 'created') {
                        alert("Autoresponder created successfully");
                    }
                    if (response.status == 'not_updated') {
                        alert("Cannot update, Already in running or scheduled state");
                    }
                    $("#loader1").hide();
                    $('.ste-sc-form-name-container #from_name').val('');
                    $('.ste-sc-subject-container #subject').val('');
                    // $("#create_autoresponder")[0].reset();
                    CKEDITOR.instances["txtFT_Content"].setData('');
                    $("#form_data_table .email_list .ste-se-tr.selected_form_list_tr").find(".ste-se-td:eq(1)").text("Running");
                    $("#form_data_table .email_list .ste-se-tr.selected_form_list_tr").find(".ste-se-td:eq(3)").html('<a style="cursor: pointer;" onclick="ste_get_email_data(' + list_id + ')">Autoresponder</a>');
                    var d = new Date();
                    var month = d.getMonth() + 1;
                    var day = d.getDate();
                    var output = d.getFullYear() + '-' +
                        (month < 10 ? '0' : '') + month + '-' +
                        (day < 10 ? '0' : '') + day;
                    $("#form_data_table .email_list .ste-se-tr.selected_form_list_tr").find(".ste-se-td:eq(4)").text(output);
                    $("#form_data_table .email_list .ste-se-tr").removeClass('selected_form_list_tr');
                    $("#form_data_table .email_list .ste-se-tr ").removeClass('ste_selected_tr');
                }

            }
        });
    });
    function is_email_valid_check(from_email){
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (from_email == '') {
            $('.error-msg-email').text('Please Enter Email Address');
            return false;
        }
        if (from_email != '') {
            if (!regex.test(from_email)) {
                $('.error-msg-email').text('Please Enter a Valid From Email');
                return false;
            }
        }
        return true;
    }
    $(document).on('click', '#verify_email_stedb', function(e) {
        var from_email = $("#from_email").val();
        var validate_email = is_email_valid_check(from_email);
        if(!validate_email){
            return;
        }
        $('#emailVerifyPopup .stedb_popup_email span').text(from_email);
        //$('#emailVerifyPopup .stedb_popup .stedb_popup_code_field input[name="code_email[]"]').val('');
        $('#emailVerifyPopup .stedb_popup_code_field').find(':input[name="code_email[]"]').each(function(){
            $(this).val('');
          })
        jQuery('.needs-validation-email-form #stedb_modal_error_wrong_code').hide();
        jQuery('.needs-validation-email-form #stedb_modal_success_code').hide();
        jQuery("#emailVerifyPopup").modal('show');
        
    });
    $("#from_email").focusin(function(){
        $('.error-msg-email').text('');
    });
    $("#from_email").focusout(function(){
        var from_email = $("#from_email").val();
        var validate_email = is_email_valid_check(from_email);
        if(!validate_email){
            return;
        }
        $('.error-msg-email').text('');
        $.ajax({
            url: ajax_url,
            type: 'post',
            data: { action: 'check_stedb_email_exist', 'nonce': ste.nonce, 'from_email':from_email },
            dataType: 'JSON',
            beforeSend: function() {
                $("#loader1").show();
            },
            success: function(response) {
                $("#loader1").hide();
                if(response.success && response.message=='From email saved, confirmation message sent'){
                    $('.error-msg-email').html('<button class="btn btn-success ste-btn-autoresponder " id="verify_email_stedb">Verify Email</button>'); 
                }
                if(response.error){
                    $('.error-msg-email').text(response.message); 
                }
            }
        });

    }); 
    $(document).on('click', '#send_regular_email', function(e) {
        e.preventDefault();
        var address = $("#address").val();
        var from_name = $("#from_name").val();
        var from_email = $("#from_email").val();
        var email_subject = $("#subject").val();
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var email_message = CKEDITOR.instances["txtFT_Content"].getData();
        var email_status = 3; //Scheduled status
        var email_type = 0; //Regular email
        var new_list_id = $("#form_data_table .email_list .selected_form_list_tr").attr('id');
        var list_id = $("#form_data_table .email_list .selected_form_list_tr").attr('data-list-id');
        if (from_name == '') {
            alert("Please Enter Form Name!");
            return false;
        }
        if (from_email == '') {
            alert('Please Enter a From Email');
            return;
        }
        if (from_email != '') {
            if (!regex.test(from_email)) {
                alert('Please Enter a Valid From Email');
                return;
            }
        }
        if (email_subject == '') {
            alert("Please Enter Email Subject!");
            return false;
        }
        if (email_message == '') {
            alert("Please Enter Email Messsage Content!");
            return false; 
        }
        if (list_id == '' || list_id == undefined) {
            alert("Please select the form to which you would like to broadcast your message, to do that  just click at any part of the above rows");
            return false;
        }
        if (address == '') {
            $("#exampleModal").modal('show');
            return false;
        }
        $.ajax({
            url: ajax_url,
            type: 'post',
            data: { 'action': 'ste_send_regular_email', 'from_name': from_name, 'from_email':from_email,'email_subject': email_subject, 'email_message': email_message, 'email_status': email_status, 'list_id': list_id, 'email_type': email_type, 'form_id': new_list_id, nonce: ste.nonce },
            dataType: 'JSON',
            beforeSend: function() {
                $("#loader1").show();
            },
            success: function(response) {
                if (response.success) {
                    if (response.status == 'updated') {
                        alert("Regular email has been updated.");
                    }
                    if (response.status == 'created') {
                        alert("Regular email has been sent.");
                    }
                    if (response.status == 'not_updated') {
                        alert("Cannot update, Already in running or scheduled state");
                    }
                    $("#loader1").hide();
                    $('.ste-sc-form-name-container #from_name').val('');
                    $('.ste-sc-subject-container #subject').val('');
                    // $("#create_autoresponder")[0].reset();
                    CKEDITOR.instances["txtFT_Content"].setData('');
                    $("#form_data_table .email_list .ste-se-tr.selected_form_list_tr").find(".ste-se-td:eq(1)").text("Scheduled");
                    $("#form_data_table .email_list .ste-se-tr.selected_form_list_tr").find(".ste-se-td:eq(3)").html('<a style="cursor: pointer;" onclick="ste_get_email_data(' + list_id + ')">Regular Email</a>');
                    var d = new Date();
                    var month = d.getMonth() + 1;
                    var day = d.getDate();
                    var output = d.getFullYear() + '-' +
                        (month < 10 ? '0' : '') + month + '-' +
                        (day < 10 ? '0' : '') + day;
                    $("#form_data_table .email_list .ste-se-tr.selected_form_list_tr").find(".ste-se-td:eq(4)").text(output);
                    $("#form_data_table .email_list .ste-se-tr").removeClass('selected_form_list_tr');
                    $("#form_data_table .email_list .ste-se-tr").removeClass('ste_selected_tr');
                }
            }
        });
    });
    $(document).on('click', '.set_email_draft', function(e) {
        e.preventDefault();
        var from_name = $('#from_name').val();
        var email_subject = $("#subject").val();
        var email_message = CKEDITOR.instances["txtFT_Content"].getData();
        var email_status = 1; //Draft status
        var email_type = 0; //Regular email
        var new_list_id = $("#form_data_table .email_list .selected_form_list_tr").attr('id');
        var list_id = $("#form_data_table .email_list .selected_form_list_tr").attr('data-list-id');
        if (list_id == '' || list_id == undefined) {
            alert("Please select the form to which you would like to broadcast your message, to do that  just click at any part of the above rows");
            return false;
        }
        $.ajax({
            // url:site_url+'/wp-admin/admin-ajax.php',
            url: ajax_url,
            type: 'post',
            data: { 'action': 'ste_set_email_draft', 'from_name': from_name, 'email_subject': email_subject, 'email_message': email_message, 'email_status': email_status, 'list_id': list_id, 'email_type': email_type, 'form_id': new_list_id, nonce: ste.nonce },
            dataType: 'JSON',
            beforeSend: function() {
                $("#loader1").show();
            },
            success: function(response) {
                if (response.success) {
                    if (response.status == 'updated') {
                        alert("Draft email has been updated.");
                    }
                    if (response.status == 'created') {
                        alert("Email has been set as draft.");
                    }
                    $("#loader1").hide();

                    // $("#create_autoresponder")[0].reset();
                    $('.ste-sc-form-name-container #from_name').val('');
                    $('.ste-sc-subject-container #subject').val('');
                    CKEDITOR.instances["txtFT_Content"].setData('');
                    $("#form_data_table .email_list .ste-se-tr.selected_form_list_tr").find(".ste-se-td :eq(1)").text("Draft");
                    $("#form_data_table .email_list .ste-se-tr.selected_form_list_tr").find(".ste-se-td :eq(3)").html('<a style="cursor: pointer;" onclick="ste_get_email_data(' + list_id + ')">Regular Email</a>');
                    var d = new Date();
                    var month = d.getMonth() + 1;
                    var day = d.getDate();
                    var output = d.getFullYear() + '-' +
                        (month < 10 ? '0' : '') + month + '-' +
                        (day < 10 ? '0' : '') + day;
                    $("#form_data_table .email_list .ste-se-tr.selected_form_list_tr").find(".ste-se-td :eq(4)").text(output);
                    $("#form_data_table .email_list .ste-se-tr").removeClass('selected_form_list_tr');
                    $("#form_data_table .email_list .ste-se-tr").removeClass('ste_selected_tr');
                }
            }
        });
    });

    $(document).on('click', '.clear_form', function() {
        alert("Clear data?");
        // $("#create_autoresponder")[0].reset();
        $('.ste-sc-form-name-container #from_name').val('');
        $('.ste-sc-subject-container #subject').val('');
        CKEDITOR.instances["txtFT_Content"].setData('');
        $("#form_data_table .email_list .ste-se-tr ").removeClass('selected_form_list_tr');
        $("#form_data_table .email_list .ste-se-tr ").removeClass('ste_selected_tr');
    });
    $('body').on('click', '#form_data_table .email_list .ste-se-tr', function(event) {
        $(this).addClass('selected_form_list_tr').siblings().removeClass('selected_form_list_tr');
        $(this).addClass('ste_selected_tr').siblings().removeClass('ste_selected_tr');
    });

    $(document).ready(function() {
        CKEDITOR.replace('txtFT_Content');
        ste_get_email_data = function(list_id) {
            $.ajax({
                // url:site_url+'/wp-admin/admin-ajax.php',
                url: ajax_url,
                type: 'post',
                data: { 'action': 'ste_get_email_data', 'list_id': list_id },
                dataType: 'JSON',
                success: function(response) {
                    if (response.success) {
                        $("#from_name").val(response.result[0].from_name);
                        $("#subject").val(response.result[0].subject);
                        // var ck_content = response.result[0].content;
                        // var new_ck_content = ck_content.replace(/\\/g,'');
                        CKEDITOR.instances["txtFT_Content"].setData(response.result[0].content);
                        // CKEDITOR.instances["txtFT_Content"].setData(new_ck_content);
                    }
                }
            });
        }
    });

    $(document).on('click', '#show_preview', function() {
        $("#emailPreviewModal").modal('show');
        
        var from_name = $('#from_name').val();
        var subject = $("#subject").val();
        var editor_data = CKEDITOR.instances["txtFT_Content"].getData();
        var d = new Date();
        var current_date = d.toDateString();
        $(".from_name").text("From : " + from_name);
        $(".subject").text("Subject : " + subject);
        $(".email-body").html(editor_data);
        $(".current_date").text(current_date);
    });

// Address start
$(document).on('click', '.send_address', function(e) {
    e.preventDefault();
    $('#exampleModal .modal-body .ajax-message').html('');
    var address = $("#address").val();
    var address2    = $("#address2").val();
    var city = $("#city").val();
    var state_province = $("#state_province").val();
    var zip_code = $("#zip_code").val();
    var country = $("#country").val();
    var valid = true;
    $('#exampleModal .modal-body').find(':input').each(function(){
        $(this).removeClass('input-field-error');
        var string = $(this).val();
        if( string== '' && $(this).attr('name') !='address2'){
            $(this).addClass('input-field-error');
            valid =false;
        }
      });
      if($('#exampleModal .modal-body').find('select').val()===null){
        valid =false;
        $('#exampleModal .modal-body').find('select').addClass('input-field-error')
      }else{
        $('#exampleModal .modal-body').find('select').removeClass('input-field-error') 
      }
      $('#exampleModal .modal-body').find('.input-field-error:first').focus();
      if(!valid)
      return false;

            $.ajax({
                url: ajax_url,
                type: 'post',
                data: { 'action': 'ste_send_address', 'address': address, 'address2': address2, 'city': city, 'state_province': state_province, 'zip_code': zip_code, 'country': country, nonce: ste.nonce },
                dataType: 'JSON',
                success: function(response) {
                    if (response.success) {
                        $('#exampleModal .modal-body .ajax-message').html('<b style="color:green;font-size: 15px;">Successfully Saved</b>')
                    }else{
                        $('#exampleModal .modal-body .ajax-message').html('<b style="color:red;font-size: 15px;">'+response.message+'</b>')
                    }
                },
            });
});

// Address End

})(jQuery);


function openNav() {

    if (jQuery("#mySidenav").hasClass('mini')) {
        jQuery("#mySidenav").removeClass('mini').addClass('normal');
    } else {
        jQuery("#mySidenav").removeClass('normal').addClass('mini');
    }
}
