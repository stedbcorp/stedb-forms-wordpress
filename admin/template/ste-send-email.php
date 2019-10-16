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


		<!-- <div class="ste-autosponder-creator ste-mt-2 ste-py-2 ste-px-1-5 ste-pos-relative"> -->
			<img id="loader1" src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/giphy.gif' ); ?>" />
			<!-- <span class="ste-form-stiky-tag ste-font-2-2 ste-fontweight-6 ste-pos-absolute"><?php esc_html_e( 'Create your autoresponder', 'ste-social-form-builder' ); ?></span> -->
			<div class="ste-row ste-flex ste-m-all">
				<div class="ste-ac-left ste-flexb-35 ste-border-4 ste-p-2-5 ste-border-secondary ste-clr-wh ste-mr-1 ste-flexb-m-100">
						<div class="ste-font-2-2 ste-fontweight-6 ste-mb-1 ste-h-auto ste-mb-1">	
						<span class="ste-font-2-2 ste-fontweight-6 ste-my-5 ste-h-auto ste-mb-1">	<?php esc_html_e( 'Create your autoresponder', 'ste-social-form-builder' ); ?></span>
						</div>
						<div class="ste-sc-form-name-container ste-flex ste-align-center ste-mb-0-4">
							<label class="ste-flexb-16 ste-form-color ste-flexb-m-100"><?php esc_html_e( 'Form Name', 'ste-social-form-builder' ); ?></label>
						</div>
							<!--------name="ste-sc-form-name"-------->
							<div class="ste-sc-form-name-container ste-flex ste-align-center ste-mb-0-4">	
								<input type="text" id="from_name" name="from_name" class="ste-sc-form-name ste-border-1 ste-height-r-2 ste-p-rm-0-5 ste-flexb-100 ste-flexb-m-100" >
							</div>
						<div class="ste-sc-subject-container ste-flex ste-align-center ste-mb-0-4">
							<label class="ste-flexb-16 ste-form-color ste-flexb-m-100"><?php esc_html_e( 'Subject', 'ste-social-form-builder' ); ?></label>
						</div>
							<!--------name="ste-sc-subject"-------->
							<div class="ste-sc-subject-container ste-flex ste-align-center ste-mb-0-4">	
								<input type="text"  id="subject" name="subject" class="ste-sc-subject ste-border-1 ste-height-r-2 ste-p-rm-0-5 ste-flexb-100 ste-flexb-m-100" >
							</div>
						<div class="ste-sc-ckeditor-container ste-flex ste-align-center">
							<label class="ste-flexb-15 ste-m-dnone ste-flexb-m-100"></label>
							<!--------name="ste-sc-ckeditor" id="ste-sc-ckeditor"-------->
							<textarea name="txtFT_Content" id="txtFT_Content" class="ste-sc-ckeditor ckeditor ste-border-2 ste-height-r-2 ste-p-rm-0-5 ste-flexb-80 ste-flexb-m-100"></textarea>
						</div>
				</div>
					<!-- right container start -->
					<div class="ste-ac-right ste-flexb-60 ste-p-1 ste-clr-wh ste-border-4 ste-border-secondary ste-flexb-m-100">
						<div class="ste-send-email-container ">
							<div class="ste-send-email-mini-container">
								<div class="ste-minheight-2">
									<div class="ste-send-email-tbl-reponsive">
										<div class="ste-send-email-tbl ste-col-100" id="form_data_table">
											<div class="ste-se-thead">
												<div class="ste-se-tr ste-p-rm-0-2">
													<div class="ste-se-td ste-se-td-16-66"><?php esc_html_e( 'Form Name', 'ste-social-form-builder' ); ?></div>
													<div class="ste-se-td ste-se-td-16-66"><?php esc_html_e( 'Status', 'ste-social-form-builder' ); ?></div>
													<div class="ste-se-td ste-se-td-16-66"><?php esc_html_e( 'Form Creation Date', 'ste-social-form-builder' ); ?></div>
													<div class="ste-se-td ste-se-td-16-66"><?php esc_html_e( 'Type', 'ste-social-form-builder' ); ?></div>
													<div class="ste-se-td ste-se-td-16-66"><?php esc_html_e( 'Date Run', 'ste-social-form-builder' ); ?></div>
													<div class="ste-se-td ste-se-td-16-66"><?php esc_html_e( 'Short Code', 'ste-social-form-builder' ); ?></div>
												</div>
											</div>
											<div class="ste-se-body email_list">
											</div>
										</div>
									</div>
								</div> 
					</div>
				<!-- right container end -->	
		</div>
	</div>
						<!-- buttons -->
				<div class="cont ste-mt-1  ste-col-100">
					<div class="row">
								<div class="w-100 "></div>
								<div class="col "></div>
						<div class="col">
							<div class="ste-se-multi-btn-container ">
									<button type="button" class="btn btn-light ste-btn-cancel ste-mr-1 icon icon icon-close clear_form ste-p-2-5" name="ste-btn-cancel"><?php esc_html_e( ' Cancel', 'ste-social-form-builder' ); ?></button>
									<button type="button" class="btn btn-success icon icon-auto-response ste-mr-1 ste-btn-autoresponder ste-p-2-5" name="ste-btn-autoresponder"><?php esc_html_e( ' Run Autoresponder', 'ste-social-form-builder' ); ?></button>
									<button type="button" class="btn btn-primary ste-btn-send-email icon icon-send send_regular_email ste-p-2-5" name="ste-btn-send-email"><?php esc_html_e( ' Send Email', 'ste-social-form-builder' ); ?></button>
										<!-- <button class="ste-btn-cancel icon icon icon-close clear_form" name="ste-btn-cancel" type="button"><?php esc_html_e( ' Cancel', 'ste-social-form-builder' ); ?></button>
										<button id="getdata" class="ste-btn-autoresponder icon icon-auto-response ste-mr-1" name="ste-btn-autoresponder" type="button"><?php esc_html_e( ' Run Autoresponder', 'ste-social-form-builder' ); ?></button>
										<button class="ste-btn-send-email icon icon-send send_regular_email" name="ste-btn-send-email" type="button"><?php esc_html_e( ' Send Email', 'ste-social-form-builder' ); ?></button> -->
							</div>
						</div>
					</div>
				</div>
				<!-- buttons end -->
			</div>
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
