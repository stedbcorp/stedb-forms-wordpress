<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://stedb.com
 * @since      1.0.0
 *
 * @package    ste-top-bar
 * @subpackage ste-top-bar/admin/template
 */

$args         = wp_unslash( $_GET );
$current_page = $args['page'];

?>
<div class="ste-container">
	<div class="ste-header-section">

		<div class="ste-row ste-flex ste-flex-center">

			<!-- <div class="ste-col-25"></div> -->
			<div class="ste-col-70 ste-my-m-1">
				<p class="ste-header-title"><?php esc_html_e( "Easy drag & drop STEdb's form builder", 'ste-social-form-builder' ); ?></p>
			</div>
			<div class="ste-col-25">
				<div class="ste-header-info-container ste-col-100 ste-text-right ste-text-m-center ste-text-m-center ste-mt-1">
					<div class="icon icon-phone-call  ste-header-tel ste-my-p3">
						<a class="ste_underline_none" href="tel:+15612285630"><?php esc_html_e( '+1 (561) 228-5630', 'ste-social-form-builder' ); ?></a>
					</div>
					<div class="ste-header-email ste-my-p3">
						<a class="ste_underline_none" href="mailto:support@stedbcorp.com"><?php esc_html_e( 'support@stedbcorp.com', 'ste-social-form-builder' ); ?></a>
					</div>
				</div>
			</div>
			<div class="icon icon-settings ste-ml-1 ste-flex ste-round-setting"></div>

		</div>
				<!-- links -->
				<div class="cont ste-mt-1 ste-clr-wh ste-col-100">
					<div class="row">
						<div class="w-100"></div>
						<div class="col">
							<div class="ste-header-tabs-container ste-clr-wh ste-h-auto ste-col-100 ste-flex ste-flex-left ste-flexb-55 ">
								<div class="ste-header-tab-item ste-tab-item-1" id="form-page">
										<a href="<?php echo esc_url( admin_url( 'admin.php?page=ste-form-builder' ) ); ?>" class="ste-tab-item-title">
											<p class="ste-tab-item-title ste-m-0 ste-py-rm-0-2 ste-px-rm-1-2 ste-px-rm-m-1 ste-font-1-5 <?php echo ( 'ste-form-builder' == $current_page ) ? 'ste-btn-success' : ''; ?>"><?php esc_html_e( 'Form Builder', 'ste-social-form-builder' ); ?></p>
										</a>
								</div>
							<div class="ste-header-tab-item ste-tab-item-1">
									<a href="<?php echo esc_url( admin_url( 'admin.php?page=ste-send-email-template' ) ); ?>" class="ste-tab-item-title">
										<p class="ste-tab-item-title ste-m-0 ste-py-rm-0-2 ste-px-rm-1-2 ste-px-rm-m-1 ste-font-1-5 <?php echo ( 'ste-send-email-template' == $current_page ) ? 'ste-btn-success' : ''; ?>"><?php esc_html_e( 'Send Email', 'ste-social-form-builder' ); ?></p>
									</a>
							</div>
							<div class="ste-header-tab-item ste-tab-item-1">
									<a href="<?php echo esc_url( admin_url( 'admin.php?page=ste-report-template' ) ); ?>" class="ste-tab-item-title">
									<p class="ste-tab-item-title ste-m-0 ste-py-rm-0-2 ste-px-rm-1-2 ste-px-rm-m-1 ste-font-1-5 <?php echo ( 'ste-report-template' == $current_page ) ? 'ste-btn-success' : ''; ?>"><?php esc_html_e( 'Report', 'ste-social-form-builder' ); ?></p>
									</a>
							</div>
						</div>
					</div>
						<div class="col">
							<div class="ste-se-multi-btn-container ste-my-1 ste-flex ">
								<div class="container">
									<div class="row">
										<div class="w-100"></div>
										<div class="col"></div>
										<div class="col "></div>
										<div class="col ste-mr-1 ">
													<button type="button" class="preview_form btn btn-secondary icon icon-view ste-form-btn-show-shortcode"><?php esc_html_e( 'Preview', 'ste-social-form-builder' ); ?></button>
													<!-- <button type="button" id="show_preview" class="btn btn-secondary ste-mr-1 ste-btn-preview icon icon-view" name="show_preview"> <?php esc_html_e( ' Preview', 'ste-social-form-builder' ); ?></button> -->
													<button type="button" class="btn btn-success ste-btn-draft icon icon-tick" name="ste-btn-draft"><?php esc_html_e( ' Set as Draft', 'ste-social-form-builder' ); ?></button>
													<!-- <button name="ste-btn-draft" class="ste-btn-draft set_email_draft" type="button"><?php esc_html_e( 'Set as Draft', 'ste-social-form-builder' ); ?></button> -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- links end -->
	</div>
