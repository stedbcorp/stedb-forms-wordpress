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
	<div class="ste-form-builder ste-clr-bg ste-col-100 ste-block">
		<div class="updated_base gform_editor_status" id="after_update_dialog" style="display: none;">
			<strong><?php esc_html_e( 'Form updated successfully.', 'ste-social-form-builder' ); ?></strong>
		</div>
		<div class="ste-row ste-flex ste-flex-center">
				<div class="ste-col-70 ste-my-2">
					<div class="ste-form-creator-container ste-pos-relative ste-block ste-my-1 ste-border-2 ste-clr-wh ste-border-secondary  ste-p-rm-0-5 ">
						<span class="ste-form-stiky-tag ste-font-2-2 ste-fontweight-6 ste-pos-absolute"></span>
							<!-- <div id="ste-sortable" class="box1 sortable"> -->
								<!-- <ul id="sortable"> -->
							<div id="sortable" class="box1 sortable">
								<!-- <div class="bg-data-placeholder ste-my-5 ste-text-center">
											<div class="ste-bg-add-img  ste-text-center icon icon-add"></div>
											<span class="ste-bg-add-text">Drag and Drop item from the sidebar</span>
								</div> -->
								<ul id="ste-sortable">
								<li style="visibility: hidden;" class="ui-state-default appendableDiv"></li>
								</ul>
							</div>
					</div>
					<!-- buttons -->
					<div class="container">
								<div class="row">
									<div class="w-100"></div>
									<div class="col"></div>
									<div class="col  ste-justify-center">
									<button type="button" id="shortcode" class="btn btn-success ste-form-btn-show-shortcode white" name="copy_shortcode"> <span class="icon icon-add "></span> <?php esc_html_e( ' Copy Shortcode', 'ste-social-form-builder' ); ?></button>
									<button type="button" class="btn btn-primary ste-form-btn-show-shortcode ste-form-btn-show-shortcode-disable create_form white" id="shortcode"><span class="icon icon-code "></span><?php esc_html_e( ' Done with shortcode', 'ste-social-form-builder' ); ?></button>
									<!-- <button type="button" class="preview_form ste-form-btn-show-shortcode ste-btn-primary ste-border-2 ste-font-2-2 ste-py-rm-0-4 ste-px-1 ste-border-dark ste-flexb-30"><?php esc_html_e( 'Preview', 'ste-social-form-builder' ); ?></button> -->

									</div>
								</div>
					</div>
						<!-- <div class="ste-form-btns-container ste-text-center ste-col-70 ste-m-auto ste-block">
							-- <div class="ste-btn-box ste-my-2">
								<button type="button" name="ste-form-btn-show-shortcode" class="ste-form-btn-show-shortcode ste-btn-success ste-border-2 ste-font-2-5 ste-py-rm-0-4 ste-px-1 ste-border-dark ste-col-100">Done, show me the shortcode</button>
								<button type="button" class="preview_form ste-form-btn-show-shortcode ste-btn-primary ste-border-2 ste-font-2-5 ste-py-rm-0-4 ste-px-1 ste-border-dark ste-col-40">Preview</button>
							</div>--
							<div class="ste-flex ste-justify-space ste-btn-box ste-my-0-5">
								<button type="button" name="ste-form-btn-show-shortcode" class="ste-form-btn-show-shortcode ste-form-btn-show-shortcode-disable ste-btn-success ste-border-2 ste-font-2-2 ste-py-rm-0-4 ste-px-1 ste-border-dark ste-flexb-60 create_form"><?php esc_html_e( 'Done, show me the shortcode', 'ste-social-form-builder' ); ?></button>
								<button type="button" class="preview_form ste-form-btn-show-shortcode ste-btn-primary ste-border-2 ste-font-2-2 ste-py-rm-0-4 ste-px-1 ste-border-dark ste-flexb-30"><?php esc_html_e( 'Preview', 'ste-social-form-builder' ); ?></button>
								<img id="loader" src="<?php //echo esc_url( plugins_url( 'images/giphy.gif', dirname( __FILE__ ) ) ); ?>" />
							</div>
							<div class="ste-inpt-box ste-flex ste-justify-space">
								<input type="text" id="shortcode" name="ste-form-shortcode-display" class="shortcode ste-form-shortcode-display ste-height-r-2 ste-flexb-60 ste-border-2" disabled="disabled">
								<button type="button" id="shortcode"  name="copy_shortcode" class="ste-form-btn-show-shortcode ste-btn-primary ste-border-2 ste-font-2-2 ste-py-rm-0-4 ste-px-1 ste-border-dark ste-flexb-30"><?php esc_html_e( 'Copy Shortcode', 'ste-social-form-builder' ); ?></button>
							</div>
						</div> -->
				</div>
				<!-- buttons end -->
				<!-- right side tab container -->
				<div class="ste-col-20 ste-clr-wh ste-ml-4 stedb-fields">
					<div class="ste-pos-relative ste-block">
						<!-- Advanced Tabset -->
						<ul class="nav nav-tabs " id="myTab" role="tablist">
							<li class="nav-item ">
								<a class="nav-link active " id="fields-tab" data-toggle="tab" href="#stedb_fields" role="tab" aria-controls="home" aria-selected="true">Fields</a>
							</li>
							<li class="nav-item">
								<a class="nav-link " id="property-tab" data-toggle="tab" href="#stedb_property" role="tab" aria-controls="Property" aria-selected="false">Properties</a>
							</li>
						</ul>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane  fade show active" id="stedb_fields" role="tabpanel" aria-labelledby="home-tab">
									<!-- icons fields start -->
									<div class="container">
										<div class="row ">
											<div id="text_box"  class="col ste-fields-icon ste-drag-text-box draggable text_box">
												<div class="inner-col">
													<div class="icon icon-text"></div>
													<span class="word"> Text </span>
												</div>
											</div>
											<div id="text_area" class="col ste-fields-icon ste-drag-text-area draggable  text_area">
												<div class="inner-col">
													<div class="icon icon-text-area"></div>
													<span class="word"> Text Area </span>
												</div>
											</div>
											<div class="w-100"></div>
											<div id="text_area" class="col ste-fields-icon ste-drag-text-area draggable text_area">
												<div class="inner-col">
													<div class="icon icon-hashtag"></div>
													<span class="word"> Numbers </span>
												</div>
											</div>	
											<div id="radio_button" class="col ste-fields-icon ste-drag-radio draggable  radio_button">
												<div class="inner-col">
													<div class="icon icon-radio-button"></div>
													<span class="word"> Radio Button </span>
												</div>
											</div>
												<div class="w-100"></div>
											<div id="select_box" class="col ste-fields-icon ste-drag-select draggable  select_box">
												<div class="inner-col">
													<div class="icon icon-dropdown"></div>
													<span class="word"> Dropdown </span>
												</div>
											</div>	
											<div id="date_box" class="col ste-fields-icon ste-drag-date draggable date_box">
												<div class="inner-col">
													<div class="icon icon-calendar"></div>
													<span class="word"> Date </span>
												</div>
											</div>
												<div class="w-100"></div>
											<div id="checkbox" class="col  ste-fields-icon ste-drag-check draggable checkbox">
												<div class="inner-col">
													<div class="icon icon-check-box-1"></div>
													<span class="word"> Checkbox </span>
												</div>
											</div>	
											<div id="link" class="col ste-fields-icon ste-drag-text-area draggable link">
												<div class="inner-col">
													<div class="icon icon-link"></div>
													<span class="word"> Link </span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane  fade" id="stedb_property" role="tabpanel" aria-labelledby="property-tab">
									<div class="container-2 ste-m-all"> Coming Soon... </div>
								</div>
							</div>
							<div class="ste-h-auto ste-border-3 ste-pos-relative ste-block ste-col-100 ">
								<span class="ste-header-email-label ste-mt-2 ste-font-2-2 ste-fontweight-6 ste-ml-1">Send Email</span>
										<div class="ste-flex ste-justify-space ste-align-center ste-mr-1 ste-ml-1">
											<div class="img-g ste-col-20 ">
												<img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/gurantee_logo.png' ); ?>" class="ste-img">
											</div>
											<div class="text-pera ste-col-80 ">
												<p><?php esc_html_e( 'Instead of the traditional email field, we use social integration to guarantee no fake leads, and no fake emails submitting through your forms.', 'ste-social-form-builder' ); ?></p>
											</div>
										</div>
										<div class="social_buttons ste-border-3 ste-text-center ste-col-100 ">
											<ul class="ste-mb-0">
												<li class="sign-up-button ste-col-30 ste-ml-1 ste-py-1">
													<a href="javascript:void(0);" class="social_yahoo">
														<img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/yahoo.png' ); ?>" class="ste-admin-icon">
													</a>
												</li>
												<li class="sign-up-button ste-col-30 ste-text-center ste-py-1">
													<a href="javascript:void(0);" class="social_gmail">
													<img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/gmail.png' ); ?>" class="ste-admin-icon">
													</a>
												</li>
												<li class="sign-up-button ste-col-30 ste-text-center ste-py-1">
													<a href="javascript:void(0);" class="social_linkedin">
													<img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/linkedin.png' ); ?>" class="ste-admin-icon">
													</a>
												</li>
											</ul>
										</div>
							</div>
							<!-- Advanced tabset -->
					</div>
					<!-- <div class="ste-h-auto ste-pos-relative ste-block  ste-border-2 ste-px-0-5">
						<span class="ste-form-stiky-tag ste-font-2-2 ste-fontweight-6 ste-pos-absolute"></span>
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
					</div> -->
				</div>
		</div>
	</div>
