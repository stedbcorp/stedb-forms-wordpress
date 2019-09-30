<?php
	/**
	 * The admin-specific functionality of the plugin.
	 *
	 * @link       https://stedb.com
	 * @since      1.0.0
	 *
	 * @package    ste-form-builder.php
	 * @subpackage ste-form-builder/admin/template
	 */

?>
<div class="ste-form-builder ste-col-100 ste-block ste-m-auto ste-my-1">
	<div class="updated_base gform_editor_status" id="after_update_dialog" style="display: none;">
		<strong><?php esc_html_e( 'Form updated successfully.', 'ste-social-form-builder' ); ?></strong>
	</div>
		<div class="ste-row ste-flex ste-flex-center-">
			<div class="ste-col-70">
				<div class="ste-form-inpt-container">
				<div class="ste-form-name-field ste-flex ste-align-center ste-my-0-5">
						<label class="ste-form-label ste-font-2-2 ste-flexb-16"><?php esc_html_e( 'Form Name', 'ste-social-form-builder' ); ?></label>
						<!--name="ste-form-name" --->
						<input type="text" name="form_name" id="form_name" class="ste-form-name ste-flexb-70 ste-border-2 ste-height-r-2-3 ste-p-rm-0-5" placeholder=" Enter the name of your form">
					</div>

					<div class="ste-form-reciver-field ste-flex ste-align-center ste-my-0-5">
						<label class="ste-form-label ste-font-2-2 ste-flexb-16"><?php esc_html_e( 'Receiver', 'ste-social-form-builder' ); ?></label>
						<!--name="ste-form-receiver" --->
						<input type="email"  name="receiver" id="receiver"  class="ste-form-receiver ste-flexb-70 ste-border-2 ste-height-r-2-3 ste-p-rm-0-5" placeholder="Enter the email where you want to receive the form submissions">
					</div>
				</div>

				<div class="ste-form-creator-container ste-pos-relative ste-block ste-my-1 ste-border-2 ste-p-rm-0-5 ">
					<span class="ste-form-stiky-tag ste-font-2-2 ste-fontweight-6 ste-pos-absolute"><?php esc_html_e( 'Drag & Drop here', 'ste-social-form-builder' ); ?></span>
						<!-- <div id="ste-sortable" class="box1 sortable"> -->
							<!-- <ul id="sortable"> -->
						<div id="sortable" class="box1 sortable">
							<ul id="ste-sortable">
								<li style="visibility: hidden;" class="ui-state-default appendableDiv"></li>
							</ul>
						</div>
				</div>

				<div class="ste-form-btns-container ste-text-center ste-col-70 ste-m-auto ste-block">
					<!-- <div class="ste-btn-box ste-my-2">
						<button type="button" name="ste-form-btn-show-shortcode" class="ste-form-btn-show-shortcode ste-btn-success ste-border-2 ste-font-2-5 ste-py-rm-0-4 ste-px-1 ste-border-dark ste-col-100">Done, show me the shortcode</button>
						<button type="button" class="preview_form ste-form-btn-show-shortcode ste-btn-primary ste-border-2 ste-font-2-5 ste-py-rm-0-4 ste-px-1 ste-border-dark ste-col-40">Preview</button>
					</div>-->
					<div class="ste-flex ste-justify-space ste-btn-box ste-my-0-5">
						<button type="button" name="ste-form-btn-show-shortcode" class="ste-form-btn-show-shortcode ste-form-btn-show-shortcode-disable ste-btn-success ste-border-2 ste-font-2-2 ste-py-rm-0-4 ste-px-1 ste-border-dark ste-flexb-60 create_form"><?php esc_html_e( 'Done, show me the shortcode', 'ste-social-form-builder' ); ?></button>

						<button type="button" class="preview_form ste-form-btn-show-shortcode ste-btn-primary ste-border-2 ste-font-2-2 ste-py-rm-0-4 ste-px-1 ste-border-dark ste-flexb-30"><?php esc_html_e( 'Preview', 'ste-social-form-builder' ); ?></button>
						<img id="loader" src="<?php echo esc_url( plugins_url( 'images/giphy.gif', dirname( __FILE__ ) ) ); ?>" />
					</div>
					<div class="ste-inpt-box ste-flex ste-justify-space">
						<input type="text" id="shortcode" name="ste-form-shortcode-display" class="shortcode ste-form-shortcode-display ste-height-r-2 ste-flexb-60 ste-border-2" disabled="disabled">
						<button type="button" id="shortcode"  name="copy_shortcode" class="ste-form-btn-show-shortcode ste-btn-primary ste-border-2 ste-font-2-2 ste-py-rm-0-4 ste-px-1 ste-border-dark ste-flexb-30"><?php esc_html_e( 'Copy Shortcode', 'ste-social-form-builder' ); ?></button>
					</div>
				</div>
			</div>
			<div class="ste-col-30 ste-px-rm-1-2">
				<div class="ste-pos-relative ste-block  ste-border-2 ste-my-1">
					<span class="ste-form-stiky-tag ste-font-2-2 ste-fontweight-6 ste-pos-absolute"><?php esc_html_e( 'Availabel Fields', 'ste-social-form-builder' ); ?></span>
					<div class="ste-flex ste-fields ste-col-75 ste-m-auto ste-mt-1">
						<ul class="ste-m-0">
							<li id="text_box" class="ste-drag-text-box ste-m-0 draggable text_box"><img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/text-box.png' ); ?>" ></li>

							<li id="text_area" class="ste-drag-text-area draggable ste-m-0  text_area"><img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/textarea.png' ); ?>" ></li>

							<li id="radio_button" class="ste-drag-radio draggable ste-m-0 radio_button"><img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/radio.png' ); ?>"></li>

							<li id="checkbox" class="ste-drag-check draggable ste-m-0  checkbox"><img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/checkbox.png' ); ?>"></li>

							<li id="select_box" class="ste-drag-select draggable ste-m-0 select_box"><img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/select-box.png' ); ?>"></li>

							<li id="date_box" class="ste-drag-date draggable ste-m-0 date_box"><img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/date-chooser.png' ); ?>"></li>
						</ul>
					</div>
				</div>

				<div class="ste-h-auto ste-pos-relative ste-block  ste-border-2 ste-px-0-5">
					<span class="ste-form-stiky-tag ste-font-2-2 ste-fontweight-6 ste-pos-absolute"><?php esc_html_e( ' Email Fields', 'ste-social-form-builder' ); ?></span>
					<div class="ste-flex ste-justify-space ste-align-center">
						<ul class="social_buttons ste-col-70">
							<li class="sign-up-button yh">
								<a href="javascript:void(0);" class="social_yahoo ste-flex ste-align-center">
									<img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/yh.png' ); ?>" class="ste-admin-icon"><img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/vertical_yh.png' ); ?>" class="ste-admin-icon-vertical"><span><?php esc_html_e( 'Send with yahoo!', 'ste-social-form-builder' ); ?></span>
								</a>
							</li>
							<li class="sign-up-button gp">
								<a href="javascript:void(0);" class="social_gmail ste-flex ste-align-center">
								<img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/gp.png' ); ?>" class="ste-admin-icon"><img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/vertical_gp.png' ); ?>" class="ste-admin-icon-vertical"><span><?php esc_html_e( 'Send with Gmail', 'ste-social-form-builder' ); ?></span>
								</a>
							</li>
							<li class="sign-up-button ln">
								<a href="javascript:void(0);" class="social_linkedin ste-flex ste-align-center">
								<img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/ln.png' ); ?>" class="ste-admin-icon"><img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/vertical_ln.png' ); ?>" class="ste-admin-icon-vertical"><span><?php esc_html_e( 'Send with Linkedin', 'ste-social-form-builder' ); ?></span>
								</a>
							</li>
						</ul>
						<div class="img-g ste-col-25">
							<img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/gurantee_logo.jpg' ); ?>" class="ste-img">
						</div>
					</div>
						<div class="text-pera">
							<p><?php esc_html_e( 'Instead of the traditional email field, we use social integration to guarantee no fake leads, and no fake emails submitting through your forms.', 'ste-social-form-builder' ); ?></p>
						</div>
				</div>
			</div>
		</div>
	</div>
