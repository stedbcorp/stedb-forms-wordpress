<!-- stm-container start -->
<?php

	$current_page = $_GET['page'];

?>
<div class="ste-container">
	<div class="ste-header-section">

		<div class="ste-row ste-flex ste-flex-center">

			<div class="ste-col-25"></div>
			<div class="ste-col-50 ste-my-m-1">
				<p class="ste-header-title"><?php esc_html_e( "Easy drag & drop STEdb's form builder", 'ste-social-form-builder' ); ?></p>
			</div>
			<div class="ste-col-25">
				<div class="ste-header-info-container ste-text-right ste-text-m-center ste-text-m-center ste-mt-1">
					<div class="ste-header-help-container">
						<img src="<?php echo esc_url( plugins_url( 'images/ste_mainlogo.png', dirname( __FILE__ ) ) ); ?>" class="ste-help-img"><span class="ste-help-title ste-ml-1"><?php esc_html_e( 'Need help?', 'ste-social-form-builder' ); ?></span>
					</div>
					<div class="ste-header-tel ste-my-p3">
						<span>Tel:</span> <a class="ste_underline_none" href="tel:+15612285630"><?php esc_html_e( '+1 (561) 228-5630', 'ste-social-form-builder' ); ?></a>
					</div>
					<div class="ste-header-email ste-my-p3">
						<span>Email:</span> <a class="ste_underline_none" href="mailto:support@stedbcorp.com"><?php esc_html_e( 'support@stedbcorp.com', 'ste-social-form-builder' ); ?></a>
					</div>
					<div class="ste-header-account-id ste-my-p3">
						<span>Account ID:</span> <a class="ste_underline_none" href="javascript:void(0);"><?php echo get_option( 'stedb_secret' ); ?></a>
					</div>
				</div>
			</div>

		</div>

		<div class="ste-row">
			<div class="ste-col-100">
				<div class="ste-header-tabs-container ste-flex ste-flex-center ">
					<div class="ste-header-tab-item ste-tab-item-1 ste-border-1" id="form-page">
						<a href="<?php echo esc_url( admin_url( 'admin.php?page=ste-form-builder' ) ); ?>" class="ste-tab-item-title">
							<p class="ste-tab-item-title ste-m-0 ste-py-rm-0-2 ste-px-rm-1-2 ste-px-rm-m-1 ste-font-2 <?php echo ( 'ste-form-builder' == $current_page ) ? 'ste-btn-success' : ''; ?>"><?php esc_html_e( 'Form Builder', 'ste-social-form-builder' ); ?></p>
						</a>
					</div>
					<div class="ste-header-tab-item ste-tab-item-1 ste-border-1">
						<a href="<?php echo esc_url( admin_url( 'admin.php?page=ste-send-email-template' ) ); ?>" class="ste-tab-item-title">
							<p class="ste-tab-item-title ste-m-0 ste-py-rm-0-2 ste-px-rm-1-2 ste-px-rm-m-1 ste-font-2 <?php echo ( 'ste-send-email-template' == $current_page ) ? 'ste-btn-success' : ''; ?>"><?php esc_html_e( 'Send Email', 'ste-social-form-builder' ); ?></p>
						</a>
					</div>
					<div class="ste-header-tab-item ste-tab-item-1 ste-border-1">
						<a href="<?php echo esc_url( admin_url( 'admin.php?page=ste-report-template' ) ); ?>" class="ste-tab-item-title">
						<p class="ste-tab-item-title ste-m-0 ste-py-rm-0-2 ste-px-rm-1-2 ste-px-rm-m-1 ste-font-2 <?php echo ( 'ste-report-template' == $current_page ) ? 'ste-btn-success' : ''; ?>"><?php esc_html_e( 'Report', 'ste-social-form-builder' ); ?></p>
						</a>
					</div>
				</div>
			</div>
		</div>

	</div>
