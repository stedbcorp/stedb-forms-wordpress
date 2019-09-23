<div class="ste-send-email-container ste-border-2 ste-my-2">

	<div class="ste-send-email-mini-container ste-p-2-5 ste-p-m-1">
		<div class="ste-send-email-tbl-container ste-minheight-2">
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
						<?php //for($i=1;$i<=11;$i++){ ?>
							<?php if($i % 2 == 0){ ?>
								<?php $tr_class = "ste-se-tr-odd"; ?>
							<?php }
							else { ?>
								<?php $tr_class = "ste-se-tr-even"; ?>
							<?php } ?>
							<!-- <div class="ste-se-tr <?php echo $tr_class; ?>">
								<div class="ste-se-td ste-se-td-20">Schedul a Call 1</div>
								<div class="ste-se-td ste-se-td-20">Draft</div>
								<div class="ste-se-td ste-se-td-20">11/01/2019</div>
								<div class="ste-se-td ste-se-td-20">Autoresponder</div>
								<div class="ste-se-td ste-se-td-20">11/06/2019</div>
							</div> -->
						<?php // } ?>
					</div>
				</div>
			</div>
		</div>

		<div class="ste-autosponder-creator ste-mt-2 ste-py-2 ste-px-1-5 ste-pos-relative">
			<img id="loader1" src="<?php echo esc_url(stedb_plugin_url().'admin/images/giphy.gif');?>" />
			<span class="ste-form-stiky-tag ste-font-2-2 ste-fontweight-6 ste-pos-absolute"><?php esc_html_e( 'Create your autoresponder', 'ste-social-form-builder' ); ?></span>
			<div class="ste-row ste-flex">
				<div class="ste-ac-left ste-flexb-65 ste-flexb-m-100">
					<div class="ste-sc-form-name-container ste-flex ste-align-center ste-mb-0-4">
						<label class="ste-flexb-16 ste-flexb-m-100"><?php esc_html_e( 'Form Name', 'ste-social-form-builder' ); ?></label>
						<!--------name="ste-sc-form-name"-------->
						<input type="text" id="from_name" name="from_name" class="ste-sc-form-name ste-border-2 ste-height-r-2 ste-p-rm-0-5 ste-flexb-70 ste-flexb-m-100" >
					</div>
					<div class="ste-sc-subject-container ste-flex ste-align-center ste-mb-0-4">
						<label class="ste-flexb-16 ste-flexb-m-100"><?php esc_html_e( 'Subject', 'ste-social-form-builder' ); ?></label>
						<!--------name="ste-sc-subject"-------->
						<input type="text"  id="subject" name="subject" class="ste-sc-subject ste-border-2 ste-height-r-2 ste-p-rm-0-5 ste-flexb-70 ste-flexb-m-100" >
					</div>
					<div class="ste-sc-ckeditor-container ste-flex ste-align-center">
						<label class="ste-flexb-15 ste-m-dnone ste-flexb-m-100"></label>
						<!--------name="ste-sc-ckeditor" id="ste-sc-ckeditor"-------->
						<textarea name="txtFT_Content" id="txtFT_Content" class="ste-sc-ckeditor ckeditor ste-border-2 ste-height-r-2 ste-p-rm-0-5 ste-flexb-80 ste-flexb-m-100"></textarea>
					</div>
				</div>
				<div class="ste-ac-right ste-flexb-35 ste-flexb-m-100">
					<div class="ste-btn-preview-container">
						<!--------name="ste-btn-preview"-------->
						<button class="ste-btn-preview" id="show_preview" type="button" name="show_preview"><?php esc_html_e( 'Preview', 'ste-social-form-builder' ); ?></button>
					</div>
					<div class="ste-btn-draft-cotainer">
						<button name="ste-btn-draft" class="ste-btn-draft set_email_draft" type="button"><?php esc_html_e( 'Set as Draft', 'ste-social-form-builder' ); ?></button>
					</div>
					<div class="ste-se-multi-btn-container ste-flex ste-justify-space">
						<div class="ste-btn-autoresponder-container ste-flexb-49 ste-flexb-m-100">
							<button id="getdata" class="ste-btn-autoresponder" name="ste-btn-autoresponder" type="button"><?php esc_html_e( 'Run Autoresponder', 'ste-social-form-builder' ); ?></button>
						</div>
						<div class="ste-btn-send-email-container ste-flexb-49 ste-flexb-m-100">
							<button class="ste-btn-send-email send_regular_email" name="ste-btn-send-email" type="button"><?php esc_html_e( 'Send Email', 'ste-social-form-builder' ); ?></button>
						</div>
					</div>
					<div class="ste-cancel-btn-container">
						<button class="ste-btn-cancel clear_form" name="ste-btn-cancel" type="button"><?php esc_html_e( 'Cancel', 'ste-social-form-builder' ); ?></button>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- Modal -->
  <div class="modal fade  ste-modal" id="email_preview" role="dialog">
    <div class="modal-dialog ste-modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header ste-text-right ste-modal-header">
          <button type="button" class="close email_preview_close" id="email_preview_close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title ste-text-center"><img src="<?php echo esc_url(stedb_plugin_url().'admin/images/ste_mainlogo.png'); ?>"></h4>
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