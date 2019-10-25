<?php
	/**
	 * The admin-specific functionality of the plugin.
	 *
	 * @link       https://stedb.com
	 * @since      1.0.0
	 *
	 * @package    Ste-send-email.php
	 * @subpackage Ste-send-email/admin/template
	 */

?>
<div class="row send-email-main-box">
		<!-- left container -->
		<div class="col-5 ste-auto-responder p-4">
			<div class="ste-auto-responder-title">	
				<span><?php esc_html_e( 'Create your autoresponder', 'ste-social-form-builder' ); ?></span>
			</div>
			<div class="ste-form-field-label ste-sc-form-name-container">
				<label><?php esc_html_e( 'Form Name:', 'ste-social-form-builder' ); ?></label>
			</div>
			<div class="ste-form-field-input ste-sc-form-name-container">	
				<input type="text" id="from_name" name="from_name" class="ste-sc-form-name" >
			</div>
			<div class="ste-form-field-label ste-sc-subject-container">
				<label><?php esc_html_e( 'Subject:', 'ste-social-form-builder' ); ?></label>
			</div>
			<div class="ste-form-field-input ste-sc-subject-container">	
				<input type="text"  id="subject" name="subject" class="ste-sc-subject" >
			</div>
			<div class="ste-sc-ckeditor-container">
				<label class="ste-m-dnone"></label>
					<!--------name="ste-sc-ckeditor" id="ste-sc-ckeditor"-------->
				<textarea name="txtFT_Content" id="txtFT_Content" class="ste-sc-ckeditor ckeditor "></textarea>
			</div>
			<div class="ste-se-multi-btn-container  py-4">
				<button type="button" class="btn btn-primary ste-btn-send-email mr-2 px-4 send_regular_email " name="ste-btn-send-email"><span class="icon icon-send"></span><?php esc_html_e( ' Send Email', 'ste-social-form-builder' ); ?></button>
				<button type="button" class="btn btn-success mr-2 px-4 ste-btn-autoresponder " name="ste-btn-autoresponder" id="getdata"><span class="icon icon-auto-response"></span><?php esc_html_e( ' Run Autoresponder', 'ste-social-form-builder' ); ?></button>
				<button type="button" class="btn btn-light ste-btn-cancel px-4 clear_form " name="ste-btn-cancel"><span class="icon icon-close"></span><?php esc_html_e( ' Cancel', 'ste-social-form-builder' ); ?></button>		
			</div>
		</div>
		<!-- right container -->
		<div class="col-7 ste-send-email-container p-4">    
		<div class="ste-send-email-mini-container">
		<div class="ste-send-email-tbl-reponsive">
			<div class="ste-send-email-tbl" id="form_data_table">
					<div class="ste-se-thead ">
						<div class="ste-se-tr ">
							<div class="ste-se-td  ste-se-td-15"><?php esc_html_e( 'Form Name', 'ste-social-form-builder' ); ?></div>
							<div class="ste-se-td  ste-se-td-15"><?php esc_html_e( 'Status', 'ste-social-form-builder' ); ?></div>
							<div class="ste-se-td  ste-se-td-15"><?php esc_html_e( 'Form Creation Date', 'ste-social-form-builder' ); ?></div>
							<div class="ste-se-td  ste-se-td-15"><?php esc_html_e( 'Type', 'ste-social-form-builder' ); ?></div>
							<div class="ste-se-td  ste-se-td-15"><?php esc_html_e( 'Date Run', 'ste-social-form-builder' ); ?></div>
							<div class="ste-se-td  ste-se-td-20"><?php esc_html_e( 'Short Code', 'ste-social-form-builder' ); ?></div>
						</div>
					</div>
					<div class="ste-se-body email_list">
					</div>
			</div>
		</div>
		</div> 
		</div>
		<!-- <div class="col p-4">
			<div class="ste-se-multi-btn-container ">
				<button type="button" class="btn btn-primary ste-btn-send-email mr-2 send_regular_email " name="ste-btn-send-email"><span class="icon icon-send"></span><?php esc_html_e( ' Send Email', 'ste-social-form-builder' ); ?></button>
				<button type="button" class="btn btn-success mr-2 ste-btn-autoresponder " name="ste-btn-autoresponder" id="getdata"><span class="icon icon-auto-response"></span><?php esc_html_e( ' Run Autoresponder', 'ste-social-form-builder' ); ?></button>
				<button type="button" class="btn btn-light ste-btn-cancel  clear_form " name="ste-btn-cancel"><span class="icon icon-close"></span><?php esc_html_e( ' Cancel', 'ste-social-form-builder' ); ?></button>		
			</div>
		</div> -->
</div>

<!-- Modal -->
<div class="modal fade  ste-modal" id="email_preview" role="dialog">
		<div class="modal-dialog ste-modal-dialog">

	<!-- Modal content-->
		<div class="modal-content">
		<div class="modal-header ste-text-right ste-modal-header">
			<button type="button" class="close email_preview_close" id="email_preview_close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title ste-text-center"><img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/ste_mainlogo.png' ); ?>"></h4>
		</div>
			<div class="modal-body ste-modal-body">
			<html>
				<head>
					<style>
						.banner-color {
						background-color: #eb681f;
						}
						.title-color {
						color: #0066cc;
						}
						.button-color {
						background-color: #0066cc;
						}
						@media screen and (min-width: 500px) {
						.banner-color {
						background-color: #0066cc;
						}
						.title-color {
						color: #eb681f;
						}
						.button-color {
						background-color: #eb681f;
						}
						}
					</style>
				</head>
				<body>
					<div style="background-color:#ececec;padding:0;margin:0 auto;font-weight:200;width:100%!important">
						<table align="center" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
							<tbody>
								<tr>
									<td align="center">
										<center style="width:100%">
										<table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:512px;font-weight:200;width:inherit;font-family:Helvetica,Arial,sans-serif" width="512">
											<tbody>
												<tr>
													<td bgcolor="#F3F3F3" width="100%" style="background-color:#f3f3f3;padding:12px;border-bottom:1px solid #ececec">
														<table class="t1" border="0" cellspacing="0" cellpadding="0" style="font-weight:200;width:100%!important;font-family:Helvetica,Arial,sans-serif;min-width:100%!important" width="100%">
															<tbody class="tb1">
																<tr class="tr1">
																	<td align="left" valign="middle" width="50%"><span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px"><?php esc_html_e( 'STEDB Forms', 'ste-social-form-builder' ); ?></span></td>
																	<td valign="middle" class="td1" width="50%" align="right" style="padding:0 0 0 10px"><span class="current_date" style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px"></span></td>
																	<td width="1">&nbsp;</td>
																</tr>
														</tbody>
														</table>
													</td>
												</tr>
												<tr>
													<td align="left">
														<table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
															<tbody>
																<tr>
																	<td width="100%">
																		<table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
	<tbody>
		<tr>
			<td align="center" bgcolor="#8BC34A" style="padding:20px 48px;color:#ffffff;background-color: rgb(139, 195, 74);" class="banner-color">
				<table class="t3" border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
					<tbody class="tb3">
						<tr class="tr3" >
							<td class="td3" width="100%">
							<p class="from_name"></p>
							<p class="subject"></p>
							</td>
						</tr>

					</tbody>
				</table>
			</td>
		</tr>
		<tr style="background-color:#f3f3f3;">
			<td align="center" style="padding:20px 0 10px 0">
				<table class="t2" border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
					<tbody class="tb2">
						<tr class="tr2">
							<td class="td2" align="center" width="100%" style="padding: 0 15px;text-align: justify;color: rgb(76, 76, 76);font-size: 12px;line-height: 18px;">
								<div style="margin: 20px 0 30px 0;font-size: 15px;text-align: center;" id="explanation-preview"></div>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</center>
</td>
</tr>
</tbody>
</table>
</div>
</body>
</html>
</div>
	<div class="modal-footer ste-text-right ste-modal-footer">
		<button type="button" class="btn btn-default email_preview_close_1" data-dismiss="modal"><?php esc_html_e( 'Close', 'ste-social-form-builder' ); ?></button>
	</div>
	</div>
</div>
</div>
