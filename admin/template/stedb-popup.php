<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://stedb.com
 * @since      1.0.0
 *
 * @package    ste-popup
 * @subpackage  ste-popup/admin/template
 */

$args         = wp_unslash( $_GET );
$current_page = $args['page'];
$user         = wp_get_current_user();
$email        = $user->user_email;
?>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content p-4">
					<div class="modal-header">
						<div class="modal-title align-self-center col-9  ml-5" id="exampleModalCenterTitle">
						<span>  Verification</span>
						</div>
						<!-- <button type="button" class="btn align-self-center col-1" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" class="icon icon-close"></span>
						</button> -->
					</div>
					<div class="modal-body">
						<div class="code-bg-img mb-3"></div>
						<div class="stedb_tagline"><span> Please enter the 4-digit verification code we sent via E-mail: </span></div>
						<form id="stedb_acct_reg_form"class="needs-validation" novalidate>
							<div class="form-group row my-4">
							<div class="stedb_popup_email col text-center">
								<span><?php echo esc_html_e( $email ); ?> </span>
							</div>
							</div>
							<div class="form-group row">
							<div class="stedb_popup_code_field col text-center">
							<!-- 4 digit code -->
							<input class="form-control" name="stedb_email" value="<?php echo esc_html_e( $email ); ?>" type="hidden" />
							<input class="form-control" name="code[]"  type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" placeholder="0" required/>
							<input class="form-control" name="code[]"  type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}"  placeholder="0" required/>
							<input class="form-control" name="code[]"  type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}"  placeholder="0" required/>
							<input class="form-control" name="code[]"  type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}"  placeholder="0"required/>
							<!-- coded -->
							</div>
							<div class="invalid-feedback">
								Please enter a Code.
							</div>
							<div class="stedb_modal_action_handler">
								<div style="display:none" id="modal_loader">
									<img src="https://loading.io/spinners/lava-lamp/index.svg" class="zoom2">
								</div>
							<div id="stedb_modal_error_wrong_code" style="display:none"  class="alert alert-danger">
								<strong>Oops!</strong> Wrong Code, Please try again.
							</div>
							<div id="stedb_modal_success_code" style="display:none" class="alert alert-success">
								<strong>Congratulations!</strong> You are verified Successfully. Hold tight while we setup your plugin.
								</div>
							</div>
							</div>
							<div class="stedb_popup_submit mt-2 text-center">
								<button type="submit"  class="btn btn-success"><span class="icon icon-tick"></span>Verify</button>
							</div>
						</form>
					</div>
					</div>
				</div>
				</div>
<!-- modal -->
<script>
	jQuery('#exampleModalCenter').modal({
        keyboard: false,
        backdrop: 'static',
    });
	</script>