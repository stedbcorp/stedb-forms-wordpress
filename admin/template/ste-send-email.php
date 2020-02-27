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

<div class="row ste-send-email-main" >
<img id="loader1" src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/giphy.gif' ); ?>" />
		<!-- left container -->
		<div class="col-9 p-4" >
			<div class="ste-auto-responder p-4">
				<div class="ste-auto-responder-title">	
					<span><?php esc_html_e( 'Create your message', 'ste-social-form-builder' ); ?></span>
				</div>
				<div class="ste-form-field-label ste-sc-form-name-container">
					<label><?php esc_html_e( 'From Name:', 'ste-social-form-builder' ); ?></label>
				</div>
				<div class="ste-form-field-input ste-sc-form-name-container">	
					<input type="text" id="from_name" name="from_name" class="ste-sc-form-name" >
				</div>
				<div class="ste-form-field-label ste-sc-form-name-container">
					<label><?php esc_html_e( 'From E-mail:', 'ste-social-form-builder' ); ?></label>
				</div>
				<div class="ste-form-field-input ste-sc-form-name-container">	
					<input type="text" id="from_email" name="from_email" class="ste-sc-form-name" value="<?php
					global $current_user;
					wp_get_current_user();
					$email = $current_user->user_email;
					echo( $email );?>">
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

				<div class="row">
					<div class="ste-se-multi-btn-container  pt-4 col-9">
						<button type="button" class="btn btn-primary ste-btn-send-email   send_regular_email " name="ste-btn-send-email"><span class="icon icon-send"></span><?php esc_html_e( 'Email Entire List', 'ste-social-form-builder' ); ?></button>
						<button type="button" class="btn btn-success ste-btn-autoresponder " name="ste-btn-autoresponder" id="getdata"><span class="icon icon-auto-response"></span><?php esc_html_e( 'Run Autoresponder', 'ste-social-form-builder' ); ?></button>
						<button type="button" id="show_preview" name="show_preview" class="btn btn-secondary  ste-btn-preview ste-form-btn-show-shortcode"><span class="icon icon-view"></span><?php esc_html_e( 'Preview', 'ste-social-form-builder' ); ?></button>
						<button type="button" class="btn btn-light ste-btn-cancel  clear_form  " name="ste-btn-cancel"><span class="icon icon-close"></span><?php esc_html_e( 'Cancel', 'ste-social-form-builder' ); ?></button>
					</div>
					<div class="col-3 mt-4 text-right">
						<ul>
						<li><span class="ste-tool-tips" data-title="The emails that you have captured from your web forms are stored based on the name of your form list.">Select a Form List ?</span></li>
						<li><span class="ste-tool-tips" data-title="Email all the emails stored in each of the form lists.">Email Entire form list ?</span></li>
						<li><span class="ste-tool-tips" data-title="Only new submission from your form will immediately receive a this message. Existing users in the list will not receive this email.">Run autoresponder ?</span></li>
						</ul>
					</div>
				</div>	
			</div>
		</div>
		<!-- side nav -->
		<div id="mySidenav"  class="sidenav mini">
			<div class="sticky-icon-bar" onclick="openNav()">
				<span href="javascript:void(0)" class="nav-icon  mx-2 px-2 " ></span>
				<span class="email-list-title px-4 py-0" >Select a Form List</span>
			</div>
			<div class="col ste-send-email-container p-2"> 	  
				<div class="ste-send-email-mini-container">
					<div class="ste-send-email-tbl-reponsive">
						<div class="ste-send-email-tbl" id="form_data_table">
								<div class="ste-se-thead ">
									<div class="ste-se-tr ">
										<div class="ste-se-td  ste-se-td-15 shouldShowWhenMinified"><?php esc_html_e( 'Form Name', 'ste-social-form-builder' ); ?></div>
										<div class="ste-se-td  ste-se-td-15 shouldNotShowWhenMinified"><?php esc_html_e( 'Status', 'ste-social-form-builder' ); ?></div>
										<div class="ste-se-td  ste-se-td-15 shouldShowWhenMinified"><?php esc_html_e( 'Create Date', 'ste-social-form-builder' ); ?></div>
										<div class="ste-se-td  ste-se-td-15 shouldNotShowWhenMinified"><?php esc_html_e( 'Type', 'ste-social-form-builder' ); ?></div>
										<div class="ste-se-td  ste-se-td-15 shouldNotShowWhenMinified"><?php esc_html_e( 'Date Run', 'ste-social-form-builder' ); ?></div>
										<div class="ste-se-td  ste-se-td-20 shouldNotShowWhenMinified"><?php esc_html_e( 'Short Code', 'ste-social-form-builder' ); ?></div>
									</div>
								</div>
								<div class="send-email-list email_list">
								</div>
						</div>
					</div>
				</div> 
			</div>
		</div>
		<!-- side nav -->
</div>
<div class="modal fade bd-example-modal-xl" id="emailPreviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header temp_form_header ">
				<h5 class="modal-title" id="exampleModalLabel">Email Preview</h5>
			</div>
		<div class="modal-body">
		<div class="row gray">	
			<div class="col from_name" > </div>
			<div class="col current_date"> </div>
		</div>
		<div class="row gray">	
			<div class="col subject" > </div>
		</div>
		<div class="row bordered">	
			<div class="col email-body"> </div>
		</div>
	</div>
	<div class="modal-footer"><span class="tag_line">Your email preview will  look like above content. </span>
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!-- Modal -->
