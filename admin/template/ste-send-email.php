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
<img id="loader1" src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/giphy.gif' ); ?>" />
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
			<input type="text" title="Street Address 2."  id="address2" name="address2" class="ste-form-receiver" placeholder="Enter your Street Address" >

			<label class="ste-form-label "><?php esc_html_e( 'City', 'ste-social-form-builder' ); ?></label>
			<input type="text" title="City."  id="city" name="city" class="ste-form-receiver" placeholder="Enter your City" >

			<label class="ste-form-label "><?php esc_html_e( 'State', 'ste-social-form-builder' ); ?></label>
			<input type="text" title="State/Province."  id="state_province" name="state_province" class="ste-form-receiver" placeholder="Enter your State" >

			<label class="ste-form-label "><?php esc_html_e( 'Zip Code', 'ste-social-form-builder' ); ?></label>
			<input type="text" title="Zip Code."  id="zip_code" name="zip_code" class="ste-form-receiver" placeholder="Enter your Zip_Code" >
			
			<label class="ste-form-label "><?php esc_html_e( 'Country', 'ste-social-form-builder' ); ?></label>
			<select id="country" title="Country"  name="zip_code" class="ste-form-receiver popup-country">
				<option value="" disabled selected hidden>Enter your Country</option>
				<option>Afghanistan</option>
				<option>Albania</option>
				<option>Algeria</option>
				<option>American Samoa</option>
				<option>Andorra</option>
				<option>Angola</option>
				<option>Anguilla</option>
				<option>Antarctica</option>
				<option>Antigua and Barbuda</option>
				<option>Argentina</option>
				<option>Armenia</option>
				<option>Aruba</option>
				<option>Australia</option>
				<option>Austria</option>
				<option>Azerbaijan</option>
				<option>Bahrain</option>
				<option>Bangladesh</option>
				<option>Barbados</option>
				<option>Belarus</option>
				<option>Belgium</option>
				<option>Belize</option>
				<option>Benin</option>
				<option>Bermuda</option>
				<option>Bhutan</option>
				<option>Bolivia</option>
				<option>Bosnia and Herzegovina</option>
				<option>Botswana</option>
				<option>Bouvet Island</option>
				<option>Brazil</option>
				<option>British Indian Ocean Territory</option>
				<option>British Virgin Islands</option>
				<option>Brunei</option>
				<option>Bulgaria</option>
				<option>Burkina Faso</option>
				<option>Burundi</option>
				<option>Cambodia</option>
				<option>Cameroon</option>
				<option>Canada</option>
				<option>Cape Verde</option>
				<option>Cayman Islands</option>
				<option>Central African Republic</option>
				<option>Chad</option>
				<option>Chile</option>
				<option>China</option>
				<option>Christmas Island</option>
				<option>Cocos (Keeling) Islands</option>
				<option>Colombia</option>
				<option>Comoros</option>
				<option>Congo</option>
				<option>Cook Islands</option>
				<option>Costa Rica</option>
				<option>Cote d\'Ivoire</option>
				<option>Croatia</option>
				<option>Cuba</option>
				<option>Cyprus</option>
				<option>Czech Republic</option>
				<option>Democratic Republic of the Congo</option>
				<option>Denmark</option>
				<option>Djibouti</option>
				<option>Dominica</option>
				<option>Dominican Republic</option>
				<option>East Timor</option>
				<option>Ecuador</option>
				<option>Egypt</option>
				<option>El Salvador</option>
				<option>Equatorial Guinea</option>
				<option>Eritrea</option>
				<option>Estonia</option>
				<option>Ethiopia</option>
				<option>Faeroe Islands</option>
				<option>Falkland Islands</option>
				<option>Fiji</option>
				<option>Finland</option>
				<option>Former Yugoslav Republic of Macedonia</option>
				<option>France</option>
				<option>French Guiana</option>
				<option>French Polynesia</option>
				<option>French Southern Territories</option>
				<option>Gabon</option>
				<option>Georgia</option>
				<option>Germany</option>
				<option>Ghana</option>
				<option>Gibraltar</option>
				<option>Greece</option>
				<option>Greenland</option>
				<option>Grenada</option>
				<option>Guadeloupe</option>
				<option>Guam</option>
				<option>Guatemala</option>
				<option>Guinea</option>
				<option>Guinea-Bissau</option>
				<option>Guyana</option>
				<option>Haiti</option>
				<option>Heard Island and McDonald Islands</option>
				<option>Honduras</option>
				<option>Hong Kong</option>
				<option>Hungary</option>
				<option>Iceland</option>
				<option>India</option>
				<option>Indonesia</option>
				<option>Iran</option>
				<option>Iraq</option>
				<option>Ireland</option>
				<option>Israel</option>
				<option>Italy</option>
				<option>Jamaica</option>
				<option>Japan</option>
				<option>Jordan</option>
				<option>Kazakhstan</option>
				<option>Kenya</option>
				<option>Kiribati</option>
				<option>Kuwait</option>
				<option>Kyrgyzstan</option>
				<option>Laos</option>
				<option>Latvia</option>
				<option>Lebanon</option>
				<option>Lesotho</option>
				<option>Liberia</option>
				<option>Libya</option>
				<option>Liechtenstein</option>
				<option>Lithuania</option>
				<option>Luxembourg</option>
				<option>Macau</option>
				<option>Madagascar</option>
				<option>Malawi</option>
				<option>Malaysia</option>
				<option>Maldives</option>
				<option>Mali</option>
				<option>Malta</option>
				<option>Marshall Islands</option>
				<option>Martinique</option>
				<option>Mauritania</option>
				<option>Mauritius</option>
				<option>Mayotte</option>
				<option>Mexico</option>
				<option>Micronesia</option>
				<option>Moldova</option>
				<option>Monaco</option>
				<option>Mongolia</option>
				<option>Montenegro</option>
				<option>Montserrat</option>
				<option>Morocco</option>
				<option>Mozambique</option>
				<option>Myanmar</option>
				<option>Namibia</option>
				<option>Nauru</option>
				<option>Nepal</option>
				<option>Netherlands</option>
				<option>Netherlands Antilles</option>
				<option>New Caledonia</option>
				<option>New Zealand</option>
				<option>Nicaragua</option>
				<option>Niger</option>
				<option>Nigeria</option>
				<option>Niue</option>
				<option>Norfolk Island</option>
				<option>North Korea</option>
				<option>Northern Marianas</option>
				<option>Norway</option>
				<option>Oman</option>
				<option>Pakistan</option>
				<option>Palau</option>
				<option>Panama</option>
				<option>Papua New Guinea</option>
				<option>Paraguay</option>
				<option>Peru</option>
				<option>Philippines</option>
				<option>Pitcairn Islands</option>
				<option>Poland</option>
				<option>Portugal</option>
				<option>Puerto Rico</option>
				<option>Qatar</option>
				<option>Reunion</option>
				<option>Romania</option>
				<option>Russia</option>
				<option>Rwanda</option>
				<option>Sqo Tome and Principe</option>
				<option>Saint Helena</option>
				<option>Saint Kitts and Nevis</option>
				<option>Saint Lucia</option>
				<option>Saint Pierre and Miquelon</option>
				<option>Saint Vincent and the Grenadines</option>
				<option>Samoa</option>
				<option>San Marino</option>
				<option>Saudi Arabia</option>
				<option>Senegal</option>
				<option>Serbia</option>
				<option>Seychelles</option>
				<option>Sierra Leone</option>
				<option>Singapore</option>
				<option>Slovakia</option>
				<option>Slovenia</option>
				<option>Solomon Islands</option>
				<option>Somalia</option>
				<option>South Africa</option>
				<option>South Georgia and the South Sandwich Islands</option>
				<option>South Korea</option>
				<option>South Sudan</option>
				<option>Spain</option>
				<option>Sri Lanka</option>
				<option>Sudan</option>
				<option>Suriname</option>
				<option>Svalbard and Jan Mayen</option>
				<option>Swaziland</option>
				<option>Sweden</option>
				<option>Switzerland</option>
				<option>Syria</option>
				<option>Taiwan</option>
				<option>Tajikistan</option>
				<option>Tanzania</option>
				<option>Thailand</option>
				<option>The Bahamas</option>
				<option>The Gambia</option>
				<option>Togo</option>
				<option>Tokelau</option>
				<option>Tonga</option>
				<option>Trinidad and Tobago</option>
				<option>Tunisia</option>
				<option>Turkey</option>
				<option>Turkmenistan</option>
				<option>Turks and Caicos Islands</option>
				<option>Tuvalu</option>
				<option>Virgin Islands</option>
				<option>Uganda</option>
				<option>Ukraine</option>
				<option>United Arab Emirates</option>
				<option>United Kingdom</option>
				<option>United States of America</option>
				<option>United States Minor Outlying Islands</option>
				<option>Uruguay</option>
				<option>Uzbekistan</option>
				<option>Vanuatu</option>
				<option>Vatican City</option>
				<option>Venezuela</option>
				<option>Vietnam</option>
				<option>Wallis and Futuna</option>
				<option>Western Sahara</option>
				<option>Yemen</option>
				<option>Yugoslavia</option>
				<option>Zambia</option>
				<option>Zimbabwe</option>
    		</select>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-success  send_address " name="ste-send-address"><span class="icon icon-tick"></span><?php esc_html_e( 'Save', 'ste-social-form-builder' ); ?></button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	</div>
	</div>
</div> 
<!-- End -->



