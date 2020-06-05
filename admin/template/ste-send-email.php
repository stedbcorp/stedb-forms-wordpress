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
<div class="loaderbg" id="loader1">
	<img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/giphy.gif' ); ?>" />
</div>
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
					<div class="error-msg-email"></div>
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
						<button type="button" class="btn btn-primary ste-btn-send-email   send_regular_email" id="send_regular_email" name="ste-btn-send-email"><span class="icon icon-send"></span><?php esc_html_e( 'Email Entire List', 'ste-social-form-builder' ); ?></button>
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
<div class="modal fade " id="emailPreviewModal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header temp_form_header ">
					<h5 class="modal-title" id="emailPreviewModalLabel">Email Preview</h5>
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
<div class="modal fade" id="emailVerifyPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
						<form id="stedb_acct_reg_form1" class="needs-validation-email-form" novalidate>
							<div class="form-group row my-4">
							<div class="stedb_popup_email col text-center">
								<span><?php echo esc_html_e( $email ); ?> </span>
							</div>
							</div>
							<div class="form-group row">
							<div class="stedb_popup_code_field col text-center">
							
							<input class="form-control" name="stedb_email" value="<?php echo esc_html_e( $email ); ?>" type="hidden" />
							<input class="form-control" name="code_email[]"  type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" placeholder="0" required/>
							<input class="form-control" name="code_email[]"  type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}"  placeholder="0" required/>
							<input class="form-control" name="code_email[]"  type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}"  placeholder="0" required/>
							<input class="form-control" name="code_email[]"  type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}"  placeholder="0"required/>
							
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
								<span class="stedb-popup-message"> &#9888; <strong> Oops!</strong> <span>Wrong Code, Please try again.</span> </span>	
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


<!-- Modal-->
<!-- Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModal">Physical Address</h5>
			</div>
			<div class="address-text">
				<p>According to USA Law, CAN SPAM ACT of 2003, all emails must have a physical address. Your account currently does not have a default physical address. Please complete the below:</p>
			</div>
			<div class="modal-body">
			<label class="ste-form-label "><?php esc_html_e( 'Street Address', 'ste-social-form-builder' ); ?></label>
			<input type="text" title="Street Address."  id="address" name="address" class="ste-form-receiver" placeholder="Enter your Street Address" value = <?php
			global $wpdb;
			$args = wp_unslash( $_POST );
			if ( get_option( 'address' ) ) {
				echo( esc_html( get_option( 'address' ) ) );
			}
			?>>
			<label class="ste-form-label "><?php esc_html_e( 'Street Address 2', 'ste-social-form-builder' ); ?></label>
			<input type="text" title="Street Address 2."  id="address2" name="address2" class="ste-form-receiver" placeholder="Enter your Street Address" required >

			<label class="ste-form-label "><?php esc_html_e( 'City', 'ste-social-form-builder' ); ?></label>
			<input type="text" title="City."  id="city" name="city" class="ste-form-receiver" placeholder="Enter your City" >

			<label class="ste-form-label "><?php esc_html_e( 'State', 'ste-social-form-builder' ); ?></label>
			<input type="text" title="State/Province."  id="state_province" name="state_province" class="ste-form-receiver" placeholder="Enter your State" >

			<label class="ste-form-label "><?php esc_html_e( 'Zip Code', 'ste-social-form-builder' ); ?></label>
			<input type="text" title="Zip Code."  id="zip_code" name="zip_code" class="ste-form-receiver" placeholder="Enter your Zip_Code" >
			
			<label class="ste-form-label "><?php esc_html_e( 'Country', 'ste-social-form-builder' ); ?></label>
			<select id="country" title="Country"  name="country" class="ste-form-receiver popup-country">
				<option value="" disabled selected hidden>Select your Country</option>
				
				<option value="Afghanistan">Afghanistan (+93)</option>
                            
				<option value="Albania">Albania (+355)</option>
			
				<option value="Algeria">Algeria (+213)</option>
			
				<option value="American Samoa">American Samoa (+1684)</option>
			
				<option value="Andorra">Andorra (+376)</option>
			
				<option value="Angola">Angola (+244)</option>
			
				<option value="Anguilla">Anguilla (+1264)</option>
			
				<option value="Antigua and Barbuda">Antigua and Barbuda (+1268)</option>
			
				<option value="Argentina">Argentina (+54)</option>
			
				<option value="Armenia">Armenia (+374)</option>
			
				<option value="Aruba">Aruba (+297)</option>
			
				<option value="Australia">Australia (+61)</option>
			
				<option value="Austria">Austria (+43)</option>
			
				<option value="Azerbaijan">Azerbaijan (+994)</option>
			
				<option value="Bahamas">Bahamas (+1242)</option>
			
				<option value="Bahrain">Bahrain (+973)</option>
			
				<option value="Bangladesh">Bangladesh (+880)</option>
			
				<option value="Barbados">Barbados (+1246)</option>
			
				<option value="Belarus">Belarus (+375)</option>
			
				<option value="Belgium">Belgium (+32)</option>
			
				<option value="Belize">Belize (+501)</option>
			
				<option value="Benin">Benin (+229)</option>
			
				<option value="Bermuda">Bermuda (+1441)</option>
			
				<option value="Bhutan">Bhutan (+975)</option>
			
				<option value="Bolivia">Bolivia (+591)</option>
			
				<option value="Bosnia and Herzegovina">Bosnia and Herzegovina (+387)</option>
			
				<option value="Botswana">Botswana (+267)</option>
			
				<option value="Brazil">Brazil (+55)</option>
			
				<option value="British Indian Ocean Territory">British Indian Ocean Territory (+246)</option>
			
				<option value="British Virgin Islands">British Virgin Islands (+1284)</option>
			
				<option value="Brunei">Brunei (+673)</option>
			
				<option value="Bulgaria">Bulgaria (+359)</option>
			
				<option value="Burkina Faso">Burkina Faso (+226)</option>
			
				<option value="Burundi">Burundi (+257)</option>
			
				<option value="Cambodia">Cambodia (+855)</option>
			
				<option value="Cameroon">Cameroon (+237)</option>
			
				<option value="Canada">Canada (+1)</option>
			
				<option value="Cape Verde">Cape Verde (+238)</option>
			
				<option value="Caribbean Netherlands">Caribbean Netherlands (+599)</option>
			
				<option value="Cayman Islands">Cayman Islands (+1345)</option>
			
				<option value="Central African Republic">Central African Republic (+236)</option>
			
				<option value="Chad">Chad (+235)</option>
			
				<option value="Chile">Chile (+56)</option>
			
				<option value="China">China (+86)</option>
			
				<option value="Christmas Island">Christmas Island (+61)</option>
			
				<option value="Cocos Islands">Cocos Islands (+61)</option>
			
				<option value="Colombia">Colombia (+57)</option>
			
				<option value="Comoros">Comoros (+269)</option>
			
				<option value="Congo">Congo (+243)</option>
			
				<option value="Congo">Congo (+242)</option>
			
				<option value="Cook Islands">Cook Islands (+682)</option>
			
				<option value="Costa Rica">Costa Rica (+506)</option>
			
				<option value="Côte d’Ivoire">Côte d’Ivoire (+225)</option>
			
				<option value="Croatia">Croatia (+385)</option>
			
				<option value="Cuba">Cuba (+53)</option>
			
				<option value="Curaçao">Curaçao (+599)</option>
			
				<option value="Cyprus">Cyprus (+357)</option>
			
				<option value="Czech Republic">Czech Republic (+420)</option>
			
				<option value="Denmark">Denmark (+45)</option>
			
				<option value="Djibouti">Djibouti (+253)</option>
			
				<option value="Dominica">Dominica (+1767)</option>
			
				<option value="Dominican Republic">Dominican Republic (+1)</option>
			
				<option value="Ecuador">Ecuador (+593)</option>
			
				<option value="Egypt">Egypt (+20)</option>
			
				<option value="El Salvador">El Salvador (+503)</option>
			
				<option value="Equatorial Guinea">Equatorial Guinea (+240)</option>
			
				<option value="Eritrea">Eritrea (+291)</option>
			
				<option value="Estonia">Estonia (+372)</option>
			
				<option value="Ethiopia">Ethiopia (+251)</option>
			
				<option value="Falkland Islands">Falkland Islands (+500)</option>
			
				<option value="Faroe Islands">Faroe Islands (+298)</option>
			
				<option value="Fiji">Fiji (+679)</option>
			
				<option value="Finland">Finland (+358)</option>
			
				<option value="France">France (+33)</option>
			
				<option value="French Guiana">French Guiana (+594)</option>
			
				<option value="French Polynesia">French Polynesia (+689)</option>
			
				<option value="Gabon">Gabon (+241)</option>
			
				<option value="Gambia">Gambia (+220)</option>
			
				<option value="Georgia">Georgia (+995)</option>
			
				<option value="Germany">Germany (+49)</option>
			
				<option value="Ghana">Ghana (+233)</option>
			
				<option value="Gibraltar">Gibraltar (+350)</option>
			
				<option value="Greece">Greece (+30)</option>
			
				<option value="Greenland">Greenland (+299)</option>
			
				<option value="Grenada">Grenada (+1473)</option>
			
				<option value="Guadeloupe">Guadeloupe (+590)</option>
			
				<option value="Guam">Guam (+1671)</option>
			
				<option value="Guatemala">Guatemala (+502)</option>
			
				<option value="Guernsey">Guernsey (+44)</option>
			
				<option value="Guinea">Guinea (+224)</option>
			
				<option value="Guinea-Bissau">Guinea-Bissau (+245)</option>
			
				<option value="Guyana">Guyana (+592)</option>
			
				<option value="Haiti">Haiti (+509)</option>
			
				<option value="Honduras">Honduras (+504)</option>
			
				<option value="Hong Kong">Hong Kong (+852)</option>
			
				<option value="Hungary">Hungary (+36)</option>
			
				<option value="Iceland">Iceland (+354)</option>
			
				<option value="India">India (+91)</option>
			
				<option value="Indonesia">Indonesia (+62)</option>
			
				<option value="Iran">Iran (+98)</option>
			
				<option value="Iraq">Iraq (+964)</option>
			
				<option value="Ireland">Ireland (+353)</option>
			
				<option value="Isle of Man">Isle of Man (+44)</option>
			
				<option value="Israel">Israel (+972)</option>
			
				<option value="Italy">Italy (+39)</option>
			
				<option value="Jamaica">Jamaica (+1876)</option>
			
				<option value="Japan">Japan (+81)</option>
			
				<option value="Jersey">Jersey (+44)</option>
			
				<option value="Jordan">Jordan (+962)</option>
			
				<option value="Kazakhstan">Kazakhstan (+7)</option>
			
				<option value="Kenya">Kenya (+254)</option>
			
				<option value="Kiribati">Kiribati (+686)</option>
			
				<option value="Kosovo">Kosovo (+383)</option>
			
				<option value="Kuwait">Kuwait (+965)</option>
			
				<option value="Kyrgyzstan">Kyrgyzstan (+996)</option>
			
				<option value="Laos">Laos (+856)</option>
			
				<option value="Latvia">Latvia (+371)</option>
			
				<option value="Lebanon">Lebanon (+961)</option>
			
				<option value="Lesotho">Lesotho (+266)</option>
			
				<option value="Liberia">Liberia (+231)</option>
			
				<option value="Libya">Libya (+218)</option>
			
				<option value="Liechtenstein">Liechtenstein (+423)</option>
			
				<option value="Lithuania">Lithuania (+370)</option>
			
				<option value="Luxembourg">Luxembourg (+352)</option>
			
				<option value="Macau">Macau (+853)</option>
			
				<option value="Macedonia">Macedonia (+389)</option>
			
				<option value="Madagascar">Madagascar (+261)</option>
			
				<option value="Malawi">Malawi (+265)</option>
			
				<option value="Malaysia">Malaysia (+60)</option>
			
				<option value="Maldives">Maldives (+960)</option>
			
				<option value="Mali">Mali (+223)</option>
			
				<option value="Malta">Malta (+356)</option>
			
				<option value="Marshall Islands">Marshall Islands (+692)</option>
			
				<option value="Martinique">Martinique (+596)</option>
			
				<option value="Mauritania">Mauritania (+222)</option>
			
				<option value="Mauritius">Mauritius (+230)</option>
			
				<option value="Mayotte">Mayotte (+262)</option>
			
				<option value="Mexico">Mexico (+52)</option>
			
				<option value="Micronesia">Micronesia (+691)</option>
			
				<option value="Moldova">Moldova (+373)</option>
			
				<option value="Monaco">Monaco (+377)</option>
			
				<option value="Mongolia">Mongolia (+976)</option>
			
				<option value="Montenegro">Montenegro (+382)</option>
			
				<option value="Montserrat">Montserrat (+1664)</option>
			
				<option value="Morocco">Morocco (+212)</option>
			
				<option value="Mozambique">Mozambique (+258)</option>
			
				<option value="Myanmar">Myanmar (+95)</option>
			
				<option value="Namibia">Namibia (+264)</option>
			
				<option value="Nauru">Nauru (+674)</option>
			
				<option value="Nepal">Nepal (+977)</option>
			
				<option value="Netherlands">Netherlands (+31)</option>
			
				<option value="New Caledonia">New Caledonia (+687)</option>
			
				<option value="New Zealand">New Zealand (+64)</option>
			
				<option value="Nicaragua">Nicaragua (+505)</option>
			
				<option value="Niger">Niger (+227)</option>
			
				<option value="Nigeria">Nigeria (+234)</option>
			
				<option value="Niue">Niue (+683)</option>
			
				<option value="Norfolk Island">Norfolk Island (+672)</option>
			
				<option value="North Korea">North Korea (+850)</option>
			
				<option value="Northern Mariana Islands">Northern Mariana Islands (+1670)</option>
			
				<option value="Norway">Norway (+47)</option>
			
				<option value="Oman">Oman (+968)</option>
			
				<option value="Pakistan">Pakistan (+92)</option>
			
				<option value="Palau">Palau (+680)</option>
			
				<option value="Palestine">Palestine (+970)</option>
			
				<option value="Panama">Panama (+507)</option>
			
				<option value="Papua New Guinea">Papua New Guinea (+675)</option>
			
				<option value="Paraguay">Paraguay (+595)</option>
			
				<option value="Peru">Peru (+51)</option>
			
				<option value="Philippines">Philippines (+63)</option>
			
				<option value="Poland">Poland (+48)</option>
			
				<option value="Portugal">Portugal (+351)</option>
			
				<option value="Puerto Rico">Puerto Rico (+1)</option>
			
				<option value="Qatar">Qatar (+974)</option>
			
				<option value="Réunion">Réunion (+262)</option>
			
				<option value="Romania">Romania (+40)</option>
			
				<option value="Russia">Russia (+7)</option>
			
				<option value="Rwanda">Rwanda (+250)</option>
			
				<option value="Saint Barthélemy">Saint Barthélemy (+590)</option>
			
				<option value="Saint Helena">Saint Helena (+290)</option>
			
				<option value="Saint Kitts and Nevis">Saint Kitts and Nevis (+1869)</option>
			
				<option value="Saint Lucia">Saint Lucia (+1758)</option>
			
				<option value="Saint Martin">Saint Martin (+590)</option>
			
				<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon (+508)</option>
			
				<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines (+1784)</option>
			
				<option value="Samoa">Samoa (+685)</option>
			
				<option value="San Marino">San Marino (+378)</option>
			
				<option value="São Tomé and Príncipe">São Tomé and Príncipe (+239)</option>
			
				<option value="Saudi Arabia">Saudi Arabia (+966)</option>
			
				<option value="Senegal">Senegal (+221)</option>
			
				<option value="Serbia">Serbia (+381)</option>
			
				<option value="Seychelles">Seychelles (+248)</option>
			
				<option value="Sierra Leone">Sierra Leone (+232)</option>
			
				<option value="Singapore">Singapore (+65)</option>
			
				<option value="Sint Maarten">Sint Maarten (+1721)</option>
			
				<option value="Slovakia">Slovakia (+421)</option>
			
				<option value="Slovenia">Slovenia (+386)</option>
			
				<option value="Solomon Islands">Solomon Islands (+677)</option>
			
				<option value="Somalia">Somalia (+252)</option>
			
				<option value="South Africa">South Africa (+27)</option>
			
				<option value="South Korea">South Korea (+82)</option>
			
				<option value="South Sudan">South Sudan (+211)</option>
			
				<option value="Spain">Spain (+34)</option>
			
				<option value="Sri Lanka">Sri Lanka (+94)</option>
			
				<option value="Sudan">Sudan (+249)</option>
			
				<option value="Suriname">Suriname (+597)</option>
			
				<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen (+47)</option>
			
				<option value="Swaziland">Swaziland (+268)</option>
			
				<option value="Sweden">Sweden (+46)</option>
			
				<option value="Switzerland">Switzerland (+41)</option>
			
				<option value="Syria">Syria (+963)</option>
			
				<option value="Taiwan">Taiwan (+886)</option>
			
				<option value="Tajikistan">Tajikistan (+992)</option>
			
				<option value="Tanzania">Tanzania (+255)</option>
			
				<option value="Thailand">Thailand (+66)</option>
			
				<option value="Timor-Leste">Timor-Leste (+670)</option>
			
				<option value="Togo">Togo (+228)</option>
			
				<option value="Tokelau">Tokelau (+690)</option>
			
				<option value="Tonga">Tonga (+676)</option>
			
				<option value="Trinidad and Tobago">Trinidad and Tobago (+1868)</option>
			
				<option value="Tunisia">Tunisia (+216)</option>
			
				<option value="Turkey">Turkey (+90)</option>
			
				<option value="Turkmenistan">Turkmenistan (+993)</option>
			
				<option value="Turks and Caicos Islands">Turks and Caicos Islands (+1649)</option>
			
				<option value="Tuvalu">Tuvalu (+688)</option>
			
				<option value="U.S. Virgin Islands">U.S. Virgin Islands (+1340)</option>
			
				<option value="Uganda">Uganda (+256)</option>
			
				<option value="Ukraine">Ukraine (+380)</option>
			
				<option value="United Arab Emirates">United Arab Emirates (+971)</option>
			
				<option value="United Kingdom">United Kingdom (+44)</option>
			
				<option value="United States">United States (+1)</option>
			
				<option value="Uruguay">Uruguay (+598)</option>
			
				<option value="Uzbekistan">Uzbekistan (+998)</option>
			
				<option value="Vanuatu">Vanuatu (+678)</option>
			
				<option value="Vatican City">Vatican City (+39)</option>
			
				<option value="Venezuela">Venezuela (+58)</option>
			
				<option value="Vietnam">Vietnam (+84)</option>
			
				<option value="Wallis and Futuna">Wallis and Futuna (+681)</option>
			
				<option value="Western Sahara">Western Sahara (+212)</option>
			
				<option value="Yemen">Yemen (+967)</option>
			
				<option value="Zambia">Zambia (+260)</option>
			
				<option value="Zimbabwe">Zimbabwe (+263)</option>
			
			</select>
			<label class="ajax-message"></label>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-success  send_address " name="ste-send-address"><span class="icon icon-tick"></span><?php esc_html_e( 'Save', 'ste-social-form-builder' ); ?></button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	</div>
	</div>
</div> 
<!-- End -->



