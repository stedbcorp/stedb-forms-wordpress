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
									<svg class="stedb-popup-loader" width="100px" height="50px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
									<circle cx="35" cy="38.0799" r="15" fill="#0099e5">
									<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5" repeatCount="indefinite" values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.5s"></animate>
									</circle> <circle cx="70" cy="41.1353" r="15" fill="#ff4c4c">
									<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5" repeatCount="indefinite" values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.3333333333333333s"></animate>
									</circle> <circle cx="105" cy="62.5" r="15" fill="#34bf49">
									<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5" repeatCount="indefinite" values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.16666666666666666s"></animate>
									</circle>
									</svg>
								</div>
							<div id="stedb_modal_error_wrong_code" style="display:none"  class="alert alert-danger">
								<span class="stedb-popup-message"> &#9888; <strong> Oops!</strong> Wrong Code, Please try again. </span>	
							</div>
							<div id="stedb_modal_success_code" style="display:none" class="alert alert-success">
								<span class="stedb-popup-message"> &#9745; <strong>Congratulations!</strong> You are verified Successfully. Hold tight while we setup your plugin.</span>
							</div>
							</div>
							</div>
							<div class="stedb_popup_submit mt-2 text-center">
								<button type="submit" name="stedb-verify"  class="btn btn-success"><span class="icon icon-tick"></span>Verify</button>
							</div>
						</form>
					</div>
					</div>
				</div>
				</div>

