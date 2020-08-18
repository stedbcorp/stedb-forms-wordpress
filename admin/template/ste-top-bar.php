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
$user         = wp_get_current_user();
$email        = $user->user_email;
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
<a class="f-clr" href="javascript:void(0);"><?php esc_html_e( get_option( 'stedb_secret' ) ); ?></a> 
</div>
</div>       
<div class="align-self-center f-clr"><span class="icon icon-phone-call"></span></div>  
<div class="col ste-header-phone py-4">
<a class="f-clr" href="tel:+15612285630"><?php esc_html_e( '+1 (561) 228-5630', 'ste-social-form-builder' ); ?></a>
<div> 
<a class="f-clr" href="mailto:support@stedbcorp.com"><?php esc_html_e( 'support@stedbcorp.com', 'ste-social-form-builder' ); ?></a>
</div>
</div>       
<div class="ste-round-setting-icon">
<a href="<?php echo esc_url( admin_url( 'admin.php?page=ste-setting' ) ); ?>"><span class="icon icon-settings" style="text-decoration:none"></span></a>
</div>

</div>

</div>

</div>
<!-- links -->
<div class=".container-fluid ste-clr-wh ste-top-container-border">
					<div class="row align-items-center ste-top-container-border">
						<div class="col-9 ste-nav-bar">
							<div class="ste-header-tabs-container ste-h-auto ste-col-100 ste-flex ste-flex-left ">
							<a href="<?php echo esc_url( admin_url( 'admin.php?page=ste-form-builder' ) ); ?>" id="main_page" class="ste-tab-item form_builder  <?php echo ( 'ste-form-builder' == $current_page ) ? 'active' : ''; ?>">
								<?php esc_html_e( 'Form Builder', 'ste-social-form-builder' );?>
							</a>
							<a href="<?php echo esc_url( admin_url( 'admin.php?page=ste-send-email-template' ) ); ?>" class="ste-tab-item <?php echo ( 'ste-send-email-template' == $current_page ) ? 'active' : ''; ?>">
											<?php esc_html_e( 'Send Email', 'ste-social-form-builder' ); ?>
							</a>
							<a href="<?php echo esc_url( admin_url( 'admin.php?page=ste-report-template' ) ); ?>" class="ste-tab-item <?php echo ( 'ste-report-template' == $current_page ) ? 'active' : ''; ?>">
								<?php esc_html_e( 'Report', 'ste-social-form-builder' ); ?>
							</a>
	
							<a href="<?php echo esc_url( admin_url( 'admin.php?page=ste-from-data-template' ) ); ?>" class="ste-tab-item">
								<?php esc_html_e( 'Forms', 'ste-social-form-builder' ); ?>
							</a>
							</div>
						</div>
				<div class="col-3 ste-btn">
					<?php if ( 'ste-report-template' != $current_page && 'ste-form-builder' != $current_page && 'ste-send-email-template' != $current_page && 'ste-setting' != $current_page ) { ?> 
					<button type="button"  class="btn btn-success set_email_draft ste-btn-draft" name="ste-btn-draft"><span class="icon icon-tick "></span><?php esc_html_e( 'Save', 'ste-social-form-builder' ); ?></button>
						<?php
					}
					?>
				</div>
					</div>
				</div>
<!-- links end -->
</div>
