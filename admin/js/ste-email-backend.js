/* Ajax url*/
var ajax_url = ste_email.ajax_url;
/* site url*/
var site_url = ste_email.plugin_url;
var web_url  = ste_email.site_url;

/********* CK Editor ************/
// (function( $ ) {
// $(document).ready(function(){
// CKEDITOR.replace('txtFT_Content', {
//       height: 130,
//     });
// });

// })( jQuery );
/******************form Data****************/
(function( $ ) {
$(document).ready(function(){
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
	
	$.ajax({
		// url:'../wp-admin/admin-ajax.php',
		url:ajax_url,
		type:'post',
		data:{action: 'ste_get_form_data'},
		dataType:'JSON',
		success:function(response)
		{                
			if(response.success)
			{                  
				var emailList = response.result;
				console.log(emailList);
				for (var i = 0; i < emailList.length; i++) {
					if(emailList[i].status == 4){
						var status = "Running";
					} 
					if(emailList[i].type == 1){
						var type = "Autoresponder";
					}
					if(emailList[i].status == 1){
						var status = "Draft";
					}
					if(emailList[i].status == 3){
						var status = "Scheduled";
					}  
					if(emailList[i].type == 0){
						var type = "Regular Email";
					}
					if(emailList[i].type == null || emailList[i].type == ''){
						var type = '';
					}
					if(emailList[i].status == null  || emailList[i].status == ''){
						var status = '';
					}
					var run_date = (emailList[i].run_date == null) ? '' : emailList[i].run_date;
					// html_content += '<tr id='+emailList[i].form_id+'>'+
					// 					'<td><a href="'+site_url+'/wp-admin/admin.php?page=STEdb-form-plugin&action=form_creation_div&id='+emailList[i].form_id+'">'+emailList[i].form_name+'</a></td>'+
					// 					 '<td id = "status">'+status+'</td>'+ 
					// 					'<td>'+emailList[i].creation_date+'</td>'+
					// 					'<td id = "type"><a style="cursor: pointer;" onclick="ste_get_email_data('+emailList[i].form_id+')">'+type+'</a></td>'+
					// 					'<td id = "run_date">'+run_date+'</td>'+
					// 					'<td>'+emailList[i].shortcode+'</td>'+
					// 				'</tr>';
					
					if(i % 2 == 0){
						var tr_class = "ste-se-tr-odd"; 
					}
					else {
						var tr_class = "ste-se-tr-even"; 
					} 
					html_content += '<div id='+emailList[i].id+' data-list-id="'+emailList[i].form_id+'"class="ste-se-tr '+ tr_class +' ste-p-rm-0-2">'
									+'<div class="ste-se-td ste-se-td-16-66"><a href="'+web_url+'/wp-admin/admin.php?page=ste-form-builder&action=form_creation_div&id='+emailList[i].id+'">'+emailList[i].form_name+'</a></div>'
									+'<div class="ste-se-td ste-se-td-16-66">'+status+'</div>'
									+'<div class="ste-se-td ste-se-td-16-66">'+emailList[i].creation_date+'</div>'
									+'<div class="ste-se-td ste-se-td-16-66"><a style="cursor: pointer;" onclick="ste_get_email_data('+emailList[i].form_id+')">'+type+'</a></div>'
									+'<div class="ste-se-td ste-se-td-16-66">'+run_date+'</div>'
									+'<div class="ste-se-td ste-se-td-16-66">'+emailList[i].shortcode+'</div>'
									+'</div>';
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
		var email_subject = $("#subject").val();
		var email_status = 4; //Running status
		var email_type = 1; //Autoresponder type
		var new_list_id = $("#form_data_table .email_list .selected_form_list_tr").attr('id');
		/*****list_id ******/
		var list_id = $("#form_data_table .email_list .selected_form_list_tr").attr('data-list-id');
		if(list_id == '' || list_id == undefined){
			alert("Please select the form to which you would like to broadcast your message, to do that  just click at any part of the above rows"); return false;
		}
		$.ajax({
			// url:site_url+'/wp-admin/admin-ajax.php',
			url:ajax_url,
			type:'post',
			data:{'action': 'stedb_create_campaign', 'email_content':email_content,'from_name':from_name,'email_subject':email_subject,'email_status':email_status,'email_type':email_type,'list_id':list_id,'form_id':new_list_id},
			dataType:'JSON',
			beforeSend: function() {
				$("#loader1").show();
			},
			success:function(response)
			{
				if(response.success){
					if(response.status == 'updated'){
					alert("Autoresponder updated successfully");
				}
				if(response.status == 'created'){
				alert("Autoresponder created successfully"); }
				if(response.status == 'not_updated'){
				   alert("Cannot update, Already in running or scheduled state"); 
				}
				$("#loader1").hide();
				$('.ste-sc-form-name-container #from_name').val('');
				$('.ste-sc-subject-container #subject').val('');
				// $("#create_autoresponder")[0].reset();
				CKEDITOR.instances["txtFT_Content"].setData('');
				$("#form_data_table .email_list .ste-se-tr.selected_form_list_tr").find(".ste-se-td:eq(1)").text("Running");
				$("#form_data_table .email_list .ste-se-tr.selected_form_list_tr").find(".ste-se-td:eq(3)").html('<a style="cursor: pointer;" onclick="ste_get_email_data('+list_id+')">Autoresponder</a>');
				var d = new Date();
				var month = d.getMonth()+1;
				var day = d.getDate();
				var output = d.getFullYear() + '-' +
				(month<10 ? '0' : '') + month + '-' +
				(day<10 ? '0' : '') + day;
				$("#form_data_table .email_list .ste-se-tr.selected_form_list_tr").find(".ste-se-td:eq(4)").text(output);
				$("#form_data_table .email_list .ste-se-tr").removeClass('selected_form_list_tr');
				$("#form_data_table .email_list .ste-se-tr ").removeClass('ste_selected_tr');
				}
				
			}
		});
	});
$(document).on('click', '.send_regular_email', function (e) {
		e.preventDefault();
        var from_name = $("#from_name").val();
		var email_subject = $("#subject").val();
		var email_message = CKEDITOR.instances["txtFT_Content"].getData();
		var email_status = 3; //Scheduled status
		var email_type = 0; //Regular email
		var new_list_id = $("#form_data_table .email_list .selected_form_list_tr").attr('id');
		var list_id = $("#form_data_table .email_list .selected_form_list_tr").attr('data-list-id');
		if(list_id == '' || list_id == undefined){
			alert("Please select the form to which you would like to broadcast your message, to do that  just click at any part of the above rows"); return false;
		}
		$.ajax({
			// url:site_url+'/wp-admin/admin-ajax.php',
			url:ajax_url,
			type:'post',
			data:{'action': 'ste_send_regular_email', 'from_name':from_name,'email_subject':email_subject,'email_message':email_message,'email_status':email_status, 'list_id':list_id, 'email_type':email_type,'form_id':new_list_id},
			dataType:'JSON',
			beforeSend: function() {
				$("#loader1").show();
			},
			success:function(response)
			{
				if(response.success){
				    if(response.status == 'updated'){
						alert("Regular email has been updated.");
				    }
					if(response.status == 'created'){
						alert("Regular email has been sent."); }
						if(response.status == 'not_updated'){
				   alert("Cannot update, Already in running or scheduled state"); 
				}
					$("#loader1").hide();
					$('.ste-sc-form-name-container #from_name').val('');
					$('.ste-sc-subject-container #subject').val('');
					// $("#create_autoresponder")[0].reset();
					CKEDITOR.instances["txtFT_Content"].setData('');
					$("#form_data_table .email_list .ste-se-tr.selected_form_list_tr").find(".ste-se-td:eq(1)").text("Scheduled");
					$("#form_data_table .email_list .ste-se-tr.selected_form_list_tr").find(".ste-se-td:eq(3)").html('<a style="cursor: pointer;" onclick="ste_get_email_data('+list_id+')">Regular Email</a>');
					var d = new Date();
					var month = d.getMonth()+1;
					var day = d.getDate();
                    var output = d.getFullYear() + '-' +
					(month<10 ? '0' : '') + month + '-' +
					(day<10 ? '0' : '') + day;
					$("#form_data_table .email_list .ste-se-tr.selected_form_list_tr").find(".ste-se-td:eq(4)").text(output);
					$("#form_data_table .email_list .ste-se-tr").removeClass('selected_form_list_tr');
					$("#form_data_table .email_list .ste-se-tr").removeClass('ste_selected_tr');
                }
			}
		});
    });
$(document).on('click', '.set_email_draft', function (e) {
		e.preventDefault();
        var from_name = $('#from_name').val();
		var email_subject = $("#subject").val();
		var email_message = CKEDITOR.instances["txtFT_Content"].getData();
		var email_status = 1; //Draft status
		var email_type = 0; //Regular email
		var new_list_id = $("#form_data_table .email_list .selected_form_list_tr").attr('id');
		var list_id = $("#form_data_table .email_list .selected_form_list_tr").attr('data-list-id');
		if(list_id == '' || list_id == undefined){
			alert("Please select the form to which you would like to broadcast your message, to do that  just click at any part of the above rows"); return false;
		}
		$.ajax({
			// url:site_url+'/wp-admin/admin-ajax.php',
			url:ajax_url,
			type:'post',
			data:{'action': 'ste_set_email_draft', 'from_name':from_name,'email_subject':email_subject,'email_message':email_message,'email_status':email_status, 'list_id':list_id, 'email_type':email_type,'form_id':new_list_id},
			dataType:'JSON',
			beforeSend: function() {
				$("#loader1").show();
			},
			success:function(response)
			{
				// console.log(response);
				// return false;
				if(response.success){
					 if(response.status == 'updated'){
						alert("Draft email has been updated.");
				    }
					if(response.status == 'created'){
					alert("Email has been set as draft.");
					}
					$("#loader1").hide();
					
					// $("#create_autoresponder")[0].reset();
					$('.ste-sc-form-name-container #from_name').val('');
					$('.ste-sc-subject-container #subject').val('');
					CKEDITOR.instances["txtFT_Content"].setData('');
					$("#form_data_table .email_list .ste-se-tr.selected_form_list_tr").find(".ste-se-td :eq(1)").text("Draft");
					$("#form_data_table .email_list .ste-se-tr.selected_form_list_tr").find(".ste-se-td :eq(3)").html('<a style="cursor: pointer;" onclick="ste_get_email_data('+list_id+')">Regular Email</a>');
					var d = new Date();
					var month = d.getMonth()+1;
					var day = d.getDate();
                    var output = d.getFullYear() + '-' +
					(month<10 ? '0' : '') + month + '-' +
					(day<10 ? '0' : '') + day;
					$("#form_data_table .email_list .ste-se-tr.selected_form_list_tr").find(".ste-se-td :eq(4)").text(output);
					$("#form_data_table .email_list .ste-se-tr").removeClass('selected_form_list_tr');
					$("#form_data_table .email_list .ste-se-tr").removeClass('ste_selected_tr');
                }
			}
		});
    });

$(document).on('click', '.clear_form', function () {
		alert("Clear data?");
		// $("#create_autoresponder")[0].reset();
		$('.ste-sc-form-name-container #from_name').val('');
		$('.ste-sc-subject-container #subject').val('');
		CKEDITOR.instances["txtFT_Content"].setData('');
		$("#form_data_table .email_list .ste-se-tr ").removeClass('selected_form_list_tr');
		$("#form_data_table .email_list .ste-se-tr ").removeClass('ste_selected_tr');
	});
$('body').on('click','#form_data_table .email_list .ste-se-tr', function (event) {
		$(this).addClass('selected_form_list_tr').siblings().removeClass('selected_form_list_tr');
		$(this).addClass('ste_selected_tr').siblings().removeClass('ste_selected_tr');
	});

$(document).ready(function(){  
CKEDITOR.replace( 'txtFT_Content' );  
    ste_get_email_data = function (list_id){
		$.ajax({
			// url:site_url+'/wp-admin/admin-ajax.php',
			url:ajax_url,
			type:'post',
			data:{'action': 'ste_get_email_data', 'list_id' : list_id},
			dataType:'JSON',
			success:function(response) {
				if(response.success){
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

$(document).on('click', '#show_preview', function () {
	// $("#email_preview").modal('show');
	// $("#email_preview").css({'display' :'flex','flex-wrap':'wrap'});
	 $("#email_preview").css({'display' :'block'});
	var from_name = $('#from_name').val();
	var subject = $("#subject").val();
	var editor_data = CKEDITOR.instances["txtFT_Content"].getData();
	var d = new Date();
	var current_date = d.toDateString();
	$(".t3 .tb3 .tr3 .td3 .from_name").text("From : " + from_name);
	$(".t3 .tb3 .tr3 .td3 .subject").text("Subject : " + subject);
	$("#explanation-preview").html(editor_data);
	$(".t1 .tb1 .tr1 .td1 .current_date").text(current_date);
	
});

// Get the modal
var modal = document.getElementById("email_preview");

// Get the button that opens the modal
var btn = document.getElementById("show_preview");

// Get the <span> element that closes the modal
var span_close = document.getElementsByClassName("email_preview_close")[0];
var span = document.getElementsByClassName("email_preview_close_1")[0];

// When the user clicks on <span> (x), close the modal
span_close.onclick = function() {
  modal.style.display = "none";
}
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
})( jQuery );