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
<?php
if(	 get_option('stedb_form_popup_hide') != 1 ){?>
<div class="modal fade temp_form_main" id="formTemplateChoiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header temp_form_header ">
				<h5 class="modal-title" id="exampleModalLabel">Please Choose Any STEdb Form Template.</h5>
			</div>
		<div class="modal-body">
			<div class="row" id="contact_form" data-dismiss="modal" style="cursor:pointer">
				<div class="col-3 form_thumb"> <img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/form.png' ); ?>"></div>
				<div class="col-9 form_content align-self-center" >Contact Form</div>
			</div>
			<div class="row" id="simple_form" data-dismiss="modal" style="cursor:pointer">	
				<div class="col-3 form_thumb"><img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/form.png' ); ?>"></div>
				<div class="col-9 form_content align-self-center" >Simple Form</div>
			</div>
			<div class="row"  id="shipping_form" data-dismiss="modal" style="cursor:pointer">
				<div class="col-3 form_thumb"><img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/form.png' ); ?>"></div>
				<div class="col-9 form_content align-self-center">Shipping Form</div>
			</div>
		</div>
	<div class="modal-footer" style="display:block">
		<div>
			<span class="tag_line popup-skip">No, I would like to create my own form. </span>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Skip</button>
		</div>
		<div>
			<input type="checkbox" name="form_hide_checkbox"/>
			<span class="tag_line popup-dont-show" id="donot-show-checkbox">Do not show again</span>
		</div>
		
	</div>
</div>
</div>
</div>
<?php } ?>
<!-- Modal -->
<div class="ste-form-builder container-fluid form-builder-box ste-block">
	<div class="row updated_base gform_editor_status" id="after_update_dialog" style="display: none;">
		<strong><?php esc_html_e( 'Form updated successfully.', 'ste-social-form-builder' ); ?></strong>
	</div> 
	<div class="row">
		<div class="col-9  draggable-area">
			<!-- input form fields  -->
			<div class="row">
				<div class="card mb-4 col">
					<div class="row card-body">
						<div class="col-6 form-group">
							<label class="ste-form-label"><?php esc_html_e( 'Form Name:', 'ste-social-form-builder' ); ?></label>
							<input type="text" id="form_name" name="form_name" class="ste-form-name" placeholder="Type a name for your form" required >
						</div>
						<div class="col-6 form-group">
							<label class="ste-form-label "><?php esc_html_e( 'Receiver:', 'ste-social-form-builder' ); ?></label>
							<input type="email" title="Please enter your email address at which you would like to receive the information."  id="receiver" name="receiver" class="ste-form-receiver" placeholder="Type an email to get a copy of the data" required>
						</div>
					</div>
				</div>
			</div>
			<!-- Draggable Area -->
			<div class="row">
				<div id="sortable" class="box1 col ste-bg-drag-img sortable p-4">
					<div id="ste-sortable">
						<div style="visibility: hidden;" class="ui-state-default appendableDiv"></div>
					</div>
				</div>
			</div>
			<div class="row ste-form-builder-btn">
				<div class="col py-3">
					<button type="button" class="btn btn-primary ste-form-btn-show-shortcode  ste-form-btn-show-shortcode-disable create_form " id="shortcode"><span class="icon icon-code "></span><?php esc_html_e( 'Save my form', 'ste-social-form-builder' ); ?></button>
					<button type="button"  class="preview_form btn btn-secondary  ste-btn-preview ste-form-btn-show-shortcode"><span class="icon icon-view"></span><?php esc_html_e( 'Preview', 'ste-social-form-builder' ); ?></button>
					<?php if(isset($_GET['id'])){ ?>
					<button type="button" id="shortcode" class="btn btn-success mr-2 ste-form-btn-show-shortcode " name="copy_shortcode"> <span class="icon icon-copy "></span> <?php esc_html_e( 'Copy Shortcode', 'ste-social-form-builder' ); ?></button>
					<input type="text" id="shortcode_box" name="ste-form-shortcode-display" class="shortcode-show-input shortcode ste-form-shortcode-display mr-2" disabled="disabled">								
					<?php } ?>
					<img id="loader" src="<?php echo esc_url( plugins_url( 'images/giphy.gif', dirname( __FILE__ ) ) ); ?>">
				</div> 
			</div>
		</div>
		<!-- Draggable Area -->
		<div class="col-3 toolbar">
			<!-- Advanced Tabset -->
			<ul class="nav col nav-tabs " id="myTab" role="tablist">
				<li class="nav-item col-6">
					<a class="nav-link active " id="fields-tab" data-toggle="tab" href="#stedb_fields" role="tab" aria-controls="home" aria-selected="true">Fields</a>
				</li>
				<li class="nav-item col-6">
					<a class="nav-link " id="property-tab" data-toggle="tab" href="#stedb_property" role="tab" aria-controls="Property" aria-selected="false">Properties</a>
				</li>
			</ul>
			<div class="tab-content stedb-fields" id="myTabContent">
				<div class="tab-pane  fade show active" id="stedb_fields" role="tabpanel" aria-labelledby="home-tab">
					<!-- icons fields start -->
					<div class="container">
					<div class="row">
							<div id="add_row_item"  class="col ste-fields-icon ste-drag-text-box draggable html_row">
								<div class="inner-col">
									<div class="icon icon-add-row"></div>
									<span class="word"> Row 
									<a href="#" class="arrow down arrow_message text-primary" style="display: none;">Down</a>
									</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div id="text_box"  class="col ste-field-border-c-1 ste-fields-icon ste-drag-text-box draggable text_box">
								<div class="inner-col">
									<div class="icon icon-text"></div>
									<span class="word"> Text </span>
								</div>
							</div>

							<div id="text_area" class="col ste-field-border-c-2 ste-fields-icon ste-drag-text-area draggable  text_area">
								<div class="inner-col">
									<div class="icon icon-text-area"></div>
									<span class="word"> Text Area </span>
								</div>
							</div>
						</div>
						<div class="row">
							<div id="number" class="col ste-field-border-c-1 ste-fields-icon ste-drag-text-area draggable number_box">
								<div class="inner-col">
									<div class="icon icon-hashtag"></div>
									<span class="word"> Numbers </span>
								</div>
							</div>	

							<div id="radio_button" class="col ste-field-border-c-2 ste-fields-icon ste-drag-radio draggable  radio_button">
								<div class="inner-col">
									<div class="icon icon-radio-button"></div>
									<span class="word"> Radio Button </span>
								</div>
							</div>
						</div>
						<div class="row ">
							<div id="select_box" class="col ste-field-border-c-1 ste-fields-icon ste-drag-select draggable  select_box">
								<div class="inner-col">
									<div class="icon icon-dropdown"></div>
									<span class="word"> Dropdown </span>
								</div>
							</div>	
							<div id="date_box" class="col ste-field-border-c-2 ste-fields-icon ste-drag-date draggable date_box">
								<div class="inner-col">
									<div class="icon icon-calendar"></div>
									<span class="word"> Calendar </span>
								</div>
							</div>
						</div>	
						<div class="row no-bottom-border">
							<div id="checkbox" class="col ste-field-border-c-1 ste-fields-icon ste-drag-check draggable checkbox">
								<div class="inner-col">
									<div class="icon icon-check-box"></div>
									<span class="word"> Checkbox </span>
								</div>
							</div>	
							<div id="link" class="col ste-field-border-c-2 ste-fields-icon ste-drag-text-area draggable link_box">
								<div class="inner-col">
									<div class="icon icon-link"></div>
									<span class="word"> Link </span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane  fade" id="stedb_property" role="tabpanel" aria-labelledby="property-tab">
					<div class="container-2  ste-coming-soon p-2 m-3 icon icon-time mb-9"> 		
						<?php esc_html_e( 'Coming soon in our next release...', 'ste-social-form-builder' ); ?>
					</div>
				</div>
			</div>
			<div class="send-email-section">
								<div class="send-email-label"> 
									<span>Send Email</span> 
								</div>
							<div class="row">
								<div class="col-3 p-2 gurantee-logo ">
									<img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/gurantee_logo.png' ); ?>" class="ste-img">	
								</div>
								<div class="col-9 p-2">
									<span class="ste-text"><?php esc_html_e( 'Instead of the traditional email field, we use social integration to guarantee no fake leads, and no fake emails submitting through your forms.', 'ste-social-form-builder' ); ?></span>
								</div>
							</div>
							<div class="row ste-social-icon-section mt-2" >
								<div class="col-4 ste-social-icon  ste-b-r" >
										<a href="javascript:void(0);" class="social_yahoo" >
											<img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/yahoo.png' ); ?>" class="ste-admin-icon">
										</a>
								</div>
								<div class="col-4 ste-social-icon ste-b-r">
										<a href="javascript:void(0);" class="social_gmail" >
											<img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/gmail.png' ); ?>" class="ste-admin-icon">
										</a>
								</div>
								<div class="col-4 ste-social-icon">
										<a href="javascript:void(0);" class="social_linkedin">
											<img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/linkedin.png' ); ?>" class="ste-admin-icon">
										</a>
								</div>
							</div>
			</div>
			<!-- Advanced tabset -->
		</div>
	</div>
</div>
