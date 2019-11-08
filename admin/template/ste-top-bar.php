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
<div class=" ste-header-section ">
<div class="row   ste-top-bar">
<div class="col-7 align-self-center py-4">
<span class="ste-header-title white"><?php esc_html_e( "Easy drag & drop STEdb's form builder", 'ste-social-form-builder' ); ?></span>
</div>
<div class=" col-5 ste-header-icons">
<div class="row">
<div class="align-self-center"><span class="icon icon-account-id"></span></div>  
<div class="col py-4">
<span class="ste-header-account-id f-clr"><?php esc_html_e( 'Account ID:', 'ste-social-form-builder' ); ?></span>
<div> 
<a class="ste_underline_none f-clr" href="javascript:void(0);"><?php esc_html_e( get_option( 'stedb_secret' ) ); ?></a> 
</div>
</div>       
<div class="align-self-center f-clr"><span class="icon icon-phone-call"></span></div>  
<div class="col ste-header-phone py-4">
<a class="ste_underline_none f-clr" href="tel:+15612285630"><?php esc_html_e( '+1 (561) 228-5630', 'ste-social-form-builder' ); ?></a>
<div> 
<a class="ste_underline_none f-clr" href="mailto:support@stedbcorp.com"><?php esc_html_e( 'support@stedbcorp.com', 'ste-social-form-builder' ); ?></a>
</div>
</div>       
<div class="ste-round-setting-icon">
<span class="icon icon-settings"></span>
</div>

</div>

</div>

</div>
<!-- links -->
<div class=".container-fluid ste-clr-wh ste-col-100">
					<div class="row align-items-center">
						<div class="col-9 ste-nav-bar">
							<div class="ste-header-tabs-container ste-h-auto ste-col-100 ste-flex ste-flex-left ">
							<a href="<?php echo esc_url( admin_url( 'admin.php?page=ste-form-builder' ) ); ?>" data-toggle="modal" data-target="#exampleModalCenter" class="ste-tab-item  <?php echo ( 'ste-form-builder' == $current_page ) ? 'active' : ''; ?>">
								<?php esc_html_e( 'Form Builder', 'ste-social-form-builder' ); ?>
							</a>
							<a href="<?php echo esc_url( admin_url( 'admin.php?page=ste-send-email-template' ) ); ?>" class="ste-tab-item <?php echo ( 'ste-send-email-template' == $current_page ) ? 'active' : ''; ?>">
											<?php esc_html_e( 'Send Email', 'ste-social-form-builder' ); ?>
							</a>
							<a href="<?php echo esc_url( admin_url( 'admin.php?page=ste-report-template' ) ); ?>" class="ste-tab-item <?php echo ( 'ste-report-template' == $current_page ) ? 'active' : ''; ?>">
								<?php esc_html_e( 'Report', 'ste-social-form-builder' ); ?>
							</a>	
							</div>
						</div>
						<!-- Modal -->
				<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content p-4">
					<div class="modal-header">
						<div class="modal-title align-self-center col-9  ml-5" id="exampleModalCenterTitle">
						<span>  Verification</span>
						</div>
						<button type="button" class="btn align-self-center col-1" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" class="icon icon-close"></span>
						</button>
					</div>
					<div class="modal-body">
						<div class="code-bg-img mb-3"></div>
						<div class="stedb_tagline"><span> Please enter the 4-digit verification code we sent via Mail: </span></div>
						<form id="stedb_acct_reg_form"class="needs-validation" novalidate>
							<div class="form-group row my-4">
							<div class="stedb_popup_email col text-center">
								<span>email@example.com</span>
							</div>
							</div>
							<div class="form-group row">
							<div class="stedb_popup_code_field col text-center">
							<!-- <input type="password" name="code"  class="form-control" id="inputPassword" maxlength="4" placeholder="----" required> -->
							<!-- 4 digit code -->
							<input class="form-control" name="code[]" id="validationCustom01" type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" placeholder="0" required/>
							<input class="form-control" name="code[]" id="validationCustom02" type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}"  placeholder="0" required/>
							<input class="form-control" name="code[]" id="validationCustom03" type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}"  placeholder="0" required/>
							<input class="form-control" name="code[]" id="validationCustom04" type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}"  placeholder="0"required/>
							<!-- coded -->
							</div>
							<div class="invalid-feedback">
								Please enter a Code.
							</div>
							</div>
							<div class="stedb_popup_submit mt-4 text-center">
								<button type="submit"  class="btn btn-success"><span class="icon icon-tick"></span>Verify</button>
							</div>
						</form>
					</div>
					</div>
				</div>
				</div>
<!-- modal -->
				<div class="col-3 ste-btn">
					<?php if ( ' ste-report-template ' != $current_page ) {  ?> 
					<button type="button"  class="preview_form btn btn-secondary  ste-btn-preview ste-form-btn-show-shortcode"><span class="icon icon-view"></span><?php esc_html_e( 'Preview', 'ste-social-form-builder' ); ?></button>
					<button type="button"  class="btn btn-success set_email_draft ste-btn-draft" name="ste-btn-draft"><span class="icon icon-tick "></span><?php esc_html_e( 'Save', 'ste-social-form-builder' ); ?></button>
						<?php
					}
					?>
				</div>
					</div>
				</div>
<!-- links end -->
</div>
