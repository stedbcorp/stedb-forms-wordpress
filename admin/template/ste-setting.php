<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://stedb.com
 * @since      1.0.0
 *
 * @package    ste-setting
 * @subpackage ste-setting/admin/template
 */

?>

<div class="row">
<div class="setting-card mb-4 col">
<div class="row setting-card-body">
<div class="loaderbg" id="loader1">
	<img src="<?php echo esc_url( stedb_plugin_url() . 'admin/images/giphy.gif' ); ?>" />
</div>
<div class="col-6 form-group">
    <form id="submit-setting-update">
    <!-- Address -->
    <label class="ste-form-label"><?php esc_html_e( 'Address:', 'ste-social-form-builder' ); ?></label>
    <input type="text" id="address" name="address" class="ste-form-name" placeholder="Enter your Physical Address"
    value="<?php
    global $wpdb;
    $args = wp_unslash( $_POST );
    if ( get_option( 'address' ) ) {
        echo( esc_html( get_option( 'address' ) ) );
    }
    ?>">
    </input>
    <!-- Address2 -->
    <label class="ste-form-label"><?php esc_html_e( 'Address2:', 'ste-social-form-builder' ); ?></label>
    <input type="text" id="address2" name="address2" class="ste-form-name" placeholder="Enter your Physical Address-2"
    value="<?php
    global $wpdb;
    $args = wp_unslash( $_POST );
    if ( get_option( 'address2' ) ) {
        echo( esc_html( get_option( 'address2' ) ) );
    }
    ?>">
    <!-- City -->
    <label class="ste-form-label"><?php esc_html_e( 'City:', 'ste-social-form-builder' ); ?></label>
    <input type="text" id="city" name="city" class="ste-form-name" placeholder="Enter your City" required
    value="<?php
    global $wpdb;
    $args = wp_unslash( $_POST );
    if ( get_option( 'city' ) ) {
        echo( esc_html( get_option( 'city' ) ) );
    }
    ?>">
    <!-- State -->
    <label class="ste-form-label"><?php esc_html_e( 'State/Province:', 'ste-social-form-builder' ); ?></label>
    <input type="text" id="state_province" name="state_province" class="ste-form-name" placeholder="Enter your State" required
    value="<?php
    global $wpdb;
    $args = wp_unslash( $_POST );
    if ( get_option( 'state_province' ) ) {
        echo( esc_html( get_option( 'state_province' ) ) );
    }
    ?>">
    <!-- Zip -->
    <label class="ste-form-label"><?php esc_html_e( 'Zip-Code:', 'ste-social-form-builder' ); ?></label>
    <input type="text" id="zip_code" name="zip_code" class="ste-form-name" placeholder="Enter your zip_code" required
    value="<?php
    global $wpdb;
    $args = wp_unslash( $_POST );
    if ( get_option( 'zip_code' ) ) {
        echo( esc_html( get_option( 'zip_code' ) ) );
    }
    ?>">
    <!-- Country -->
    <label class="ste-form-label"><?php esc_html_e( 'Country:', 'ste-social-form-builder' ); ?></label>
    <!-- <input rows="1" id="country" name="country" class="ste-form-name" placeholder="Enter your Country" required
    value="<?php
    global $wpdb;
    $args = wp_unslash( $_POST );
    if ( get_option( 'country' ) ) {
        echo( esc_html( get_option( 'country' ) ) );
    }
    ?>"> -->
    <br/>
    <?php
    $args = wp_unslash( $_POST );
    if ( get_option( 'country' ) ) {
        $country = ( esc_html( get_option( 'country' ) ) );
    }
    ?>
    		<select id="country" title="Country"  name="country" class="ste-form-name">
                    
				<option value="" selected hidden>Select your Country</option>
				
				<option <?php if($country ==='Afghanistan'){echo 'selected';}?> value="Afghanistan">Afghanistan (+93)</option>
                            
				<option <?php if($country ==='Albania'){echo 'selected';}?> value="Albania">Albania (+355)</option>
			
				<option <?php if($country ==='Algeria'){echo 'selected';}?> value="Algeria">Algeria (+213)</option>
			
				<option <?php if($country ==='American Samoa'){echo 'selected';}?> value="American Samoa">American Samoa (+1684)</option>
			
				<option <?php if($country ==='Andorra'){echo 'selected';}?>  value="Andorra">Andorra (+376)</option>
			
				<option <?php if($country ==='Angola'){echo 'selected';}?> value="Angola">Angola (+244)</option>
			
				<option <?php if($country ==='Anguilla'){echo 'selected';}?> value="Anguilla">Anguilla (+1264)</option>
			
				<option <?php if($country ==='Antigua and Barbuda'){echo 'selected';}?> value="Antigua and Barbuda">Antigua and Barbuda (+1268)</option>
			
				<option <?php if($country ==='Argentina'){echo 'selected';}?> value="Argentina">Argentina (+54)</option>
			
				<option <?php if($country ==='Armenia'){echo 'selected';}?> value="Armenia">Armenia (+374)</option>
			
				<option <?php if($country ==='Aruba'){echo 'selected';}?> value="Aruba">Aruba (+297)</option>
			
				<option <?php if($country ==='Australia'){echo 'selected';}?> value="Australia">Australia (+61)</option>
			
				<option <?php if($country ==='Austria'){echo 'selected';}?> value="Austria">Austria (+43)</option>
			
				<option <?php if($country ==='Azerbaijan'){echo 'selected';}?> value="Azerbaijan">Azerbaijan (+994)</option>
			
				<option <?php if($country ==='Bahamas'){echo 'selected';}?> value="Bahamas">Bahamas (+1242)</option>
			
				<option <?php if($country ==='Bahrain'){echo 'selected';}?> value="Bahrain">Bahrain (+973)</option>
			
				<option <?php if($country ==='Bangladesh'){echo 'selected';}?> value="Bangladesh">Bangladesh (+880)</option>
			
				<option <?php if($country ==='Barbados'){echo 'selected';}?> value="Barbados">Barbados (+1246)</option>
			
				<option <?php if($country ==='Belarus'){echo 'selected';}?> value="Belarus">Belarus (+375)</option>
			
				<option <?php if($country ==='Belgium'){echo 'selected';}?> value="Belgium">Belgium (+32)</option>
			
				<option <?php if($country ==='Belize'){echo 'selected';}?> value="Belize">Belize (+501)</option>
			
				<option <?php if($country ==='Benin'){echo 'selected';}?> value="Benin">Benin (+229)</option>
			
				<option <?php if($country ==='Bermuda'){echo 'selected';}?> value="Bermuda">Bermuda (+1441)</option>
			
				<option <?php if($country ==='Bhutan'){echo 'selected';}?> value="Bhutan">Bhutan (+975)</option>
			
				<option <?php if($country ==='Bolivia'){echo 'selected';}?> value="Bolivia">Bolivia (+591)</option>
			
				<option <?php if($country ==='Bosnia and Herzegovina'){echo 'selected';}?> value="Bosnia and Herzegovina">Bosnia and Herzegovina (+387)</option>
			
				<option <?php if($country ==='Botswana'){echo 'selected';}?>  value="Botswana">Botswana (+267)</option>
			
				<option <?php if($country ==='Brazil'){echo 'selected';}?> value="Brazil">Brazil (+55)</option>
			
				<option <?php if($country ==='British Indian Ocean Territory'){echo 'selected';}?>  value="British Indian Ocean Territory">British Indian Ocean Territory (+246)</option>
			
				<option <?php if($country ==='British Virgin Islands'){echo 'selected';}?> value="British Virgin Islands">British Virgin Islands (+1284)</option>
			
				<option <?php if($country ==='Brunei'){echo 'selected';}?> value="Brunei">Brunei (+673)</option>
			
				<option <?php if($country ==='Bulgaria'){echo 'selected';}?> value="Bulgaria">Bulgaria (+359)</option>
			
				<option <?php if($country ==='Burkina Faso'){echo 'selected';}?>  value="Burkina Faso">Burkina Faso (+226)</option>
			
				<option <?php if($country ==='Burundi'){echo 'selected';}?>  value="Burundi">Burundi (+257)</option>
			
				<option <?php if($country ==='Cambodia'){echo 'selected';}?> value="Cambodia">Cambodia (+855)</option>
			
				<option <?php if($country ==='Cameroon'){echo 'selected';}?> value="Cameroon">Cameroon (+237)</option>
			
				<option <?php if($country ==='Canada'){echo 'selected';}?> value="Canada">Canada (+1)</option>
			
				<option <?php if($country ==='Cape Verde'){echo 'selected';}?> value="Cape Verde">Cape Verde (+238)</option>
			
				<option <?php if($country ==='Caribbean Netherlands'){echo 'selected';}?> value="Caribbean Netherlands">Caribbean Netherlands (+599)</option>
			
				<option <?php if($country ==='Cayman Islands'){echo 'selected';}?> value="Cayman Islands">Cayman Islands (+1345)</option>
			
				<option <?php if($country ==='Central African Republic'){echo 'selected';}?> value="Central African Republic">Central African Republic (+236)</option>
			
				<option <?php if($country ==='Chad'){echo 'selected';}?> value="Chad">Chad (+235)</option>
			
				<option <?php if($country ==='Chile'){echo 'selected';}?> value="Chile">Chile (+56)</option>
			
				<option <?php if($country ==='China'){echo 'selected';}?>  value="China">China (+86)</option>
			
				<option <?php if($country ==='Christmas Island'){echo 'selected';}?> value="Christmas Island">Christmas Island (+61)</option>
			
				<option <?php if($country ==='Cocos Islands'){echo 'selected';}?> value="Cocos Islands">Cocos Islands (+61)</option>
			
				<option <?php if($country ==='Colombia'){echo 'selected';}?>  value="Colombia">Colombia (+57)</option>
			
				<option <?php if($country ==='Comoros'){echo 'selected';}?>  value="Comoros">Comoros (+269)</option>
			
				<option <?php if($country ==='Congo'){echo 'selected';}?> value="Congo">Congo (+243)</option>
			
			
				<option <?php if($country ==='Cook Islands'){echo 'selected';}?> value="Cook Islands">Cook Islands (+682)</option>
			
				<option <?php if($country ==='Costa Rica'){echo 'selected';}?> value="Costa Rica">Costa Rica (+506)</option>
			
				<option <?php if($country ==='Côte d’Ivoire'){echo 'selected';}?> value="Côte d’Ivoire">Côte d’Ivoire (+225)</option>
			
				<option <?php if($country ==='Croatia'){echo 'selected';}?> value="Croatia">Croatia (+385)</option>
			
				<option <?php if($country ==='Cuba'){echo 'selected';}?> value="Cuba">Cuba (+53)</option>
			
				<option <?php if($country ==='Curaçao'){echo 'selected';}?> value="Curaçao">Curaçao (+599)</option>
			
				<option <?php if($country ==='Cyprus'){echo 'selected';}?> value="Cyprus">Cyprus (+357)</option>
			
				<option <?php if($country ==='Czech Republic'){echo 'selected';}?> value="Czech Republic">Czech Republic (+420)</option>
			
				<option <?php if($country ==='Denmark'){echo 'selected';}?> value="Denmark">Denmark (+45)</option>
			
				<option <?php if($country ==='Djibouti'){echo 'selected';}?> value="Djibouti">Djibouti (+253)</option>
			
				<option <?php if($country ==='Dominica'){echo 'selected';}?> value="Dominica">Dominica (+1767)</option>
			
				<option <?php if($country ==='Dominican Republic'){echo 'selected';}?> value="Dominican Republic">Dominican Republic (+1)</option>
			
				<option <?php if($country ==='Ecuador'){echo 'selected';}?> value="Ecuador">Ecuador (+593)</option>
			
				<option <?php if($country ==='Egypt'){echo 'selected';}?> value="Egypt">Egypt (+20)</option>
			
				<option <?php if($country ==='El Salvador'){echo 'selected';}?> value="El Salvador">El Salvador (+503)</option>
			
				<option <?php if($country ==='Equatorial Guinea'){echo 'selected';}?> value="Equatorial Guinea">Equatorial Guinea (+240)</option>
			
				<option <?php if($country ==='Eritrea'){echo 'selected';}?> value="Eritrea">Eritrea (+291)</option>
			
				<option <?php if($country ==='Estonia'){echo 'selected';}?> value="Estonia">Estonia (+372)</option>
			
				<option <?php if($country ==='Ethiopia'){echo 'selected';}?>  value="Ethiopia">Ethiopia (+251)</option>
			
				<option <?php if($country ==='Falkland Islands'){echo 'selected';}?> value="Falkland Islands">Falkland Islands (+500)</option>
			
				<option <?php if($country ==='Faroe Islands'){echo 'selected';}?> value="Faroe Islands">Faroe Islands (+298)</option>
			
				<option <?php if($country ==='Fiji'){echo 'selected';}?> value="Fiji">Fiji (+679)</option>
			
				<option <?php if($country ==='Finland'){echo 'selected';}?> value="Finland">Finland (+358)</option>
			
				<option <?php if($country ==='France'){echo 'selected';}?> value="France">France (+33)</option>
			
				<option <?php if($country ==='French Guiana'){echo 'selected';}?> value="French Guiana">French Guiana (+594)</option>
			
				<option <?php if($country ==='French Polynesia'){echo 'selected';}?> value="French Polynesia">French Polynesia (+689)</option>
			
				<option <?php if($country ==='Gabon'){echo 'selected';}?> value="Gabon">Gabon (+241)</option>
			
				<option <?php if($country ==='Gambia'){echo 'selected';}?> value="Gambia">Gambia (+220)</option>
			
				<option <?php if($country ==='Georgia'){echo 'selected';}?> value="Georgia">Georgia (+995)</option>
			
				<option <?php if($country ==='Germany'){echo 'selected';}?> value="Germany">Germany (+49)</option>
			
				<option <?php if($country ==='Ghana'){echo 'selected';}?> value="Ghana">Ghana (+233)</option>
			
				<option <?php if($country ==='Gibraltar'){echo 'selected';}?> value="Gibraltar">Gibraltar (+350)</option>
			
				<option <?php if($country ==='Greece'){echo 'selected';}?> value="Greece">Greece (+30)</option>
			
				<option <?php if($country ==='Greenland'){echo 'selected';}?> value="Greenland">Greenland (+299)</option>
			
				<option <?php if($country ==='Grenada'){echo 'selected';}?> value="Grenada">Grenada (+1473)</option>
			
				<option <?php if($country ==='Guadeloupe'){echo 'selected';}?> value="Guadeloupe">Guadeloupe (+590)</option>
			
				<option <?php if($country ==='Guam'){echo 'selected';}?> value="Guam">Guam (+1671)</option>
			
				<option <?php if($country ==='Guatemala'){echo 'selected';}?> value="Guatemala">Guatemala (+502)</option>
			
				<option <?php if($country ==='Guernsey'){echo 'selected';}?> value="Guernsey">Guernsey (+44)</option>
			
				<option <?php if($country ==='Guinea'){echo 'selected';}?> value="Guinea">Guinea (+224)</option>
			
				<option <?php if($country ==='Guinea-Bissau'){echo 'selected';}?> value="Guinea-Bissau">Guinea-Bissau (+245)</option>
			
				<option <?php if($country ==='Guyana'){echo 'selected';}?> value="Guyana">Guyana (+592)</option>
			
				<option <?php if($country ==='Haiti'){echo 'selected';}?> value="Haiti">Haiti (+509)</option>
			
				<option <?php if($country ==='Honduras'){echo 'selected';}?> value="Honduras">Honduras (+504)</option>
			
				<option <?php if($country ==='Hong Kong'){echo 'selected';}?> value="Hong Kong">Hong Kong (+852)</option>
			
				<option <?php if($country ==='Hungary'){echo 'selected';}?> value="Hungary">Hungary (+36)</option>
			
				<option <?php if($country ==='Iceland'){echo 'selected';}?> value="Iceland">Iceland (+354)</option>
			
				<option <?php if($country ==='India'){echo 'selected';}?> value="India">India (+91)</option>
			
				<option <?php if($country ==='Indonesia'){echo 'selected';}?> value="Indonesia">Indonesia (+62)</option>
			
				<option <?php if($country ==='Iran'){echo 'selected';}?> value="Iran">Iran (+98)</option>
			
				<option <?php if($country ==='Iraq'){echo 'selected';}?> value="Iraq">Iraq (+964)</option>
			
				<option <?php if($country ==='Ireland'){echo 'selected';}?> value="Ireland">Ireland (+353)</option>
			
				<option <?php if($country ==='Isle of Man'){echo 'selected';}?> value="Isle of Man">Isle of Man (+44)</option>
			
				<option <?php if($country ==='Israel'){echo 'selected';}?> value="Israel">Israel (+972)</option>
			
				<option <?php if($country ==='Italy'){echo 'selected';}?> value="Italy">Italy (+39)</option>
			
				<option <?php if($country ==='Jamaica'){echo 'selected';}?> value="Jamaica">Jamaica (+1876)</option>
			
				<option <?php if($country ==='Japan'){echo 'selected';}?> value="Japan">Japan (+81)</option>
			
				<option <?php if($country ==='Jersey'){echo 'selected';}?> value="Jersey">Jersey (+44)</option>
			
				<option <?php if($country ==='Jordan'){echo 'selected';}?> value="Jordan">Jordan (+962)</option>
			
				<option <?php if($country ==='Kazakhstan'){echo 'selected';}?> value="Kazakhstan">Kazakhstan (+7)</option>
			
				<option <?php if($country ==='Kenya'){echo 'selected';}?> value="Kenya">Kenya (+254)</option>
			
				<option <?php if($country ==='Kiribati'){echo 'selected';}?> value="Kiribati">Kiribati (+686)</option>
			
				<option <?php if($country ==='Kosovo'){echo 'selected';}?> value="Kosovo">Kosovo (+383)</option>
			
				<option <?php if($country ==='Kuwait'){echo 'selected';}?> value="Kuwait">Kuwait (+965)</option>
			
				<option <?php if($country ==='Kyrgyzstan'){echo 'selected';}?> value="Kyrgyzstan">Kyrgyzstan (+996)</option>
			
				<option <?php if($country ==='Laos'){echo 'selected';}?> value="Laos">Laos (+856)</option>
			
				<option <?php if($country ==='Latvia'){echo 'selected';}?> value="Latvia">Latvia (+371)</option>
			
				<option <?php if($country ==='Lebanon'){echo 'selected';}?> value="Lebanon">Lebanon (+961)</option>
			
				<option <?php if($country ==='Lesotho'){echo 'selected';}?> value="Lesotho">Lesotho (+266)</option>
			
				<option <?php if($country ==='Liberia'){echo 'selected';}?> value="Liberia">Liberia (+231)</option>
			
				<option <?php if($country ==='Libya'){echo 'selected';}?> value="Libya">Libya (+218)</option>
			
				<option <?php if($country ==='Liechtenstein'){echo 'selected';}?> value="Liechtenstein">Liechtenstein (+423)</option>
			
				<option <?php if($country ==='Lithuania'){echo 'selected';}?> value="Lithuania">Lithuania (+370)</option>
			
				<option <?php if($country ==='Luxembourg'){echo 'selected';}?> value="Luxembourg">Luxembourg (+352)</option>
			
				<option <?php if($country ==='Macau'){echo 'selected';}?> value="Macau">Macau (+853)</option>
			
				<option <?php if($country ==='Macedonia'){echo 'selected';}?> value="Macedonia">Macedonia (+389)</option>
			
				<option <?php if($country ==='Madagascar'){echo 'selected';}?> value="Madagascar">Madagascar (+261)</option>
			
				<option <?php if($country ==='Malawi'){echo 'selected';}?> value="Malawi">Malawi (+265)</option>
			
				<option <?php if($country ==='Malaysia'){echo 'selected';}?> value="Malaysia">Malaysia (+60)</option>
			
				<option <?php if($country ==='Maldives'){echo 'selected';}?> value="Maldives">Maldives (+960)</option>
			
				<option <?php if($country ==='Mali'){echo 'selected';}?> value="Mali">Mali (+223)</option>
			
				<option <?php if($country ==='Malta'){echo 'selected';}?> value="Malta">Malta (+356)</option>
			
				<option <?php if($country ==='Marshall Islands'){echo 'selected';}?> value="Marshall Islands">Marshall Islands (+692)</option>
			
				<option <?php if($country ===''){echo 'selected';}?> value="Martinique">Martinique (+596)</option>
			
				<option <?php if($country ==='Mauritania'){echo 'selected';}?> value="Mauritania">Mauritania (+222)</option>
			
				<option <?php if($country ==='Mauritius'){echo 'selected';}?> value="Mauritius">Mauritius (+230)</option>
			
				<option <?php if($country ==='Mayotte'){echo 'selected';}?> value="Mayotte">Mayotte (+262)</option>
			
				<option <?php if($country ==='Mexico'){echo 'selected';}?> value="Mexico">Mexico (+52)</option>
			
				<option <?php if($country ==='Micronesia'){echo 'selected';}?> value="Micronesia">Micronesia (+691)</option>
			
				<option <?php if($country ==='Moldova'){echo 'selected';}?> value="Moldova">Moldova (+373)</option>
			
				<option <?php if($country ==='Monaco'){echo 'selected';}?> value="Monaco">Monaco (+377)</option>
			
				<option <?php if($country ==='Mongolia'){echo 'selected';}?> value="Mongolia">Mongolia (+976)</option>
			
				<option <?php if($country ==='Montenegro'){echo 'selected';}?> value="Montenegro">Montenegro (+382)</option>
			
				<option <?php if($country ==='Montserrat'){echo 'selected';}?> value="Montserrat">Montserrat (+1664)</option>
			
				<option <?php if($country ==='Morocco'){echo 'selected';}?> value="Morocco">Morocco (+212)</option>
			
				<option <?php if($country ==='Mozambique'){echo 'selected';}?> value="Mozambique">Mozambique (+258)</option>
			
				<option <?php if($country ==='Myanmar'){echo 'selected';}?> value="Myanmar">Myanmar (+95)</option>
			
				<option <?php if($country ==='Namibia'){echo 'selected';}?> value="Namibia">Namibia (+264)</option>
			
				<option <?php if($country ==='Nauru'){echo 'selected';}?> value="Nauru">Nauru (+674)</option>
			
				<option <?php if($country ==='Nepal'){echo 'selected';}?> value="Nepal">Nepal (+977)</option>
			
				<option <?php if($country ==='Netherlands'){echo 'selected';}?> value="Netherlands">Netherlands (+31)</option>
			
				<option <?php if($country ==='New Caledonia'){echo 'selected';}?> value="New Caledonia">New Caledonia (+687)</option>
			
				<option <?php if($country ==='New Zealand'){echo 'selected';}?> value="New Zealand">New Zealand (+64)</option>
			
				<option <?php if($country ==='Nicaragua'){echo 'selected';}?> value="Nicaragua">Nicaragua (+505)</option>
			
				<option <?php if($country ==='Niger'){echo 'selected';}?> value="Niger">Niger (+227)</option>
			
				<option <?php if($country ==='Nigeria'){echo 'selected';}?> value="Nigeria">Nigeria (+234)</option>
			
				<option <?php if($country ==='Niue'){echo 'selected';}?> value="Niue">Niue (+683)</option>
			
				<option <?php if($country ==='Norfolk Island'){echo 'selected';}?> value="Norfolk Island">Norfolk Island (+672)</option>
			
				<option <?php if($country ==='North Korea'){echo 'selected';}?> value="North Korea">North Korea (+850)</option>
			
				<option <?php if($country ==='Northern Mariana Islands'){echo 'selected';}?> value="Northern Mariana Islands">Northern Mariana Islands (+1670)</option>
			
				<option <?php if($country ==='Norway'){echo 'selected';}?> value="Norway">Norway (+47)</option>
			
				<option <?php if($country ==='Oman'){echo 'selected';}?> value="Oman">Oman (+968)</option>
			
				<option <?php if($country ==='Pakistan'){echo 'selected';}?> value="Pakistan">Pakistan (+92)</option>
			
				<option <?php if($country ==='Palau'){echo 'selected';}?> value="Palau">Palau (+680)</option>
			
				<option <?php if($country ==='Palestine'){echo 'selected';}?> value="Palestine">Palestine (+970)</option>
			
				<option <?php if($country ==='Panama'){echo 'selected';}?> value="Panama">Panama (+507)</option>
			
				<option <?php if($country ==='Papua New Guinea'){echo 'selected';}?> value="Papua New Guinea">Papua New Guinea (+675)</option>
			
				<option <?php if($country ==='Paraguay'){echo 'selected';}?> value="Paraguay">Paraguay (+595)</option>
			
				<option <?php if($country ==='Peru'){echo 'selected';}?> value="Peru">Peru (+51)</option>
			
				<option <?php if($country ==='Philippines'){echo 'selected';}?> value="Philippines">Philippines (+63)</option>
			
				<option <?php if($country ==='Poland'){echo 'selected';}?> value="Poland">Poland (+48)</option>
			
				<option <?php if($country ==='Portugal'){echo 'selected';}?> value="Portugal">Portugal (+351)</option>
			
				<option <?php if($country ==='Puerto Rico'){echo 'selected';}?> value="Puerto Rico">Puerto Rico (+1)</option>
			
				<option <?php if($country ==='Qatar'){echo 'selected';}?> value="Qatar">Qatar (+974)</option>
			
				<option <?php if($country ==='Réunion'){echo 'selected';}?> value="Réunion">Réunion (+262)</option>
			
				<option <?php if($country ==='Romania'){echo 'selected';}?> value="Romania">Romania (+40)</option>
			
				<option <?php if($country ==='Russia'){echo 'selected';}?> value="Russia">Russia (+7)</option>
			
				<option <?php if($country ==='Rwanda'){echo 'selected';}?> value="Rwanda">Rwanda (+250)</option>
			
				<option <?php if($country ==='Saint Barthélemy'){echo 'selected';}?> value="Saint Barthélemy">Saint Barthélemy (+590)</option>
			
				<option <?php if($country ==='Saint Helena'){echo 'selected';}?> value="Saint Helena">Saint Helena (+290)</option>
			
				<option <?php if($country ==='Saint Kitts and Nevis'){echo 'selected';}?> value="Saint Kitts and Nevis">Saint Kitts and Nevis (+1869)</option>
			
				<option <?php if($country ==='Saint Lucia'){echo 'selected';}?> value="Saint Lucia">Saint Lucia (+1758)</option>
			
				<option <?php if($country ==='Saint Martin'){echo 'selected';}?> value="Saint Martin">Saint Martin (+590)</option>
			
				<option <?php if($country ==='Saint Pierre and Miquelon'){echo 'selected';}?> value="Saint Pierre and Miquelon">Saint Pierre and Miquelon (+508)</option>
			
				<option <?php if($country ==='Saint Vincent and the Grenadines'){echo 'selected';}?> value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines (+1784)</option>
			
				<option <?php if($country ==='Samoa'){echo 'selected';}?> value="Samoa">Samoa (+685)</option>
			
				<option <?php if($country ==='San Marino'){echo 'selected';}?> value="San Marino">San Marino (+378)</option>
			
				<option <?php if($country ==='São Tomé and Príncipe'){echo 'selected';}?> value="São Tomé and Príncipe">São Tomé and Príncipe (+239)</option>
			
				<option <?php if($country ==='Saudi Arabia'){echo 'selected';}?> value="Saudi Arabia">Saudi Arabia (+966)</option>
			
				<option <?php if($country ==='Senegal'){echo 'selected';}?> value="Senegal">Senegal (+221)</option>
			
				<option <?php if($country ==='Serbia'){echo 'selected';}?> value="Serbia">Serbia (+381)</option>
			
				<option <?php if($country ==='Seychelles'){echo 'selected';}?> value="Seychelles">Seychelles (+248)</option>
			
				<option <?php if($country ==='Sierra Leone'){echo 'selected';}?> value="Sierra Leone">Sierra Leone (+232)</option>
			
				<option <?php if($country ==='Singapore'){echo 'selected';}?> value="Singapore">Singapore (+65)</option>
			
				<option <?php if($country ==='Sint Maarten'){echo 'selected';}?> value="Sint Maarten">Sint Maarten (+1721)</option>
			
				<option <?php if($country ==='Slovakia'){echo 'selected';}?> value="Slovakia">Slovakia (+421)</option>
			
				<option <?php if($country ==='Slovenia'){echo 'selected';}?> value="Slovenia">Slovenia (+386)</option>
			
				<option <?php if($country ==='Solomon Islands'){echo 'selected';}?> value="Solomon Islands">Solomon Islands (+677)</option>
			
				<option <?php if($country ==='Somalia'){echo 'selected';}?> value="Somalia">Somalia (+252)</option>
			
				<option <?php if($country ==='South Africa'){echo 'selected';}?> value="South Africa">South Africa (+27)</option>
			
				<option <?php if($country ==='South Korea'){echo 'selected';}?> value="South Korea">South Korea (+82)</option>
			
				<option <?php if($country ==='South Sudan'){echo 'selected';}?> value="South Sudan">South Sudan (+211)</option>
			
				<option <?php if($country ==='Spain'){echo 'selected';}?> value="Spain">Spain (+34)</option>
			
				<option <?php if($country ==='Sri Lanka'){echo 'selected';}?> value="Sri Lanka">Sri Lanka (+94)</option>
			
				<option <?php if($country ==='Sudan'){echo 'selected';}?> value="Sudan">Sudan (+249)</option>
			
				<option <?php if($country ==='Suriname'){echo 'selected';}?> value="Suriname">Suriname (+597)</option>
			
				<option <?php if($country ==='Svalbard and Jan Mayen'){echo 'selected';}?> value="Svalbard and Jan Mayen">Svalbard and Jan Mayen (+47)</option>
			
				<option <?php if($country ==='Swaziland'){echo 'selected';}?> value="Swaziland">Swaziland (+268)</option>
			
				<option <?php if($country ==='Sweden'){echo 'selected';}?> value="Sweden">Sweden (+46)</option>
			
				<option <?php if($country ==='Switzerland'){echo 'selected';}?> value="Switzerland">Switzerland (+41)</option>
			
				<option <?php if($country ==='Syria'){echo 'selected';}?> value="Syria">Syria (+963)</option>
			
				<option <?php if($country ==='Taiwan'){echo 'selected';}?> value="Taiwan">Taiwan (+886)</option>
			
				<option <?php if($country ==='Tajikistan'){echo 'selected';}?> value="Tajikistan">Tajikistan (+992)</option>
			
				<option <?php if($country ==='Tanzania'){echo 'selected';}?> value="Tanzania">Tanzania (+255)</option>
			
				<option <?php if($country ==='Thailand'){echo 'selected';}?> value="Thailand">Thailand (+66)</option>
			
				<option <?php if($country ===''){echo 'selected';}?> value="Timor-Leste">Timor-Leste (+670)</option>
			
				<option <?php if($country ==='Togo'){echo 'selected';}?> value="Togo">Togo (+228)</option>
			
				<option <?php if($country ==='Tokelau'){echo 'selected';}?> value="Tokelau">Tokelau (+690)</option>
			
				<option <?php if($country ==='Tonga'){echo 'selected';}?> value="Tonga">Tonga (+676)</option>
			
				<option <?php if($country ==='Trinidad and Tobago'){echo 'selected';}?> value="Trinidad and Tobago">Trinidad and Tobago (+1868)</option>
			
				<option <?php if($country ==='Tunisia'){echo 'selected';}?> value="Tunisia">Tunisia (+216)</option>
			
				<option <?php if($country ==='Turkey'){echo 'selected';}?> value="Turkey">Turkey (+90)</option>
			
				<option <?php if($country ==='Turkmenistan'){echo 'selected';}?> value="Turkmenistan">Turkmenistan (+993)</option>
			
				<option <?php if($country ==='Turks and Caicos Islands'){echo 'selected';}?> value="Turks and Caicos Islands">Turks and Caicos Islands (+1649)</option>
			
				<option <?php if($country ==='Tuvalu'){echo 'selected';}?> value="Tuvalu">Tuvalu (+688)</option>
			
				<option <?php if($country ==='U.S. Virgin Islands'){echo 'selected';}?> value="U.S. Virgin Islands">U.S. Virgin Islands (+1340)</option>
			
				<option <?php if($country ==='Uganda'){echo 'selected';}?> value="Uganda">Uganda (+256)</option>
			
				<option <?php if($country ==='Ukraine'){echo 'selected';}?> value="Ukraine">Ukraine (+380)</option>
			
				<option <?php if($country ==='United Arab Emirates'){echo 'selected';}?> value="United Arab Emirates">United Arab Emirates (+971)</option>
			
				<option <?php if($country ==='United Kingdom'){echo 'selected';}?> value="United Kingdom">United Kingdom (+44)</option>
			
				<option <?php if($country ==='United States'){echo 'selected';}?> value="United States">United States (+1)</option>
			
				<option <?php if($country ==='Uruguay'){echo 'selected';}?> value="Uruguay">Uruguay (+598)</option>
			
				<option <?php if($country ==='Uzbekistan'){echo 'selected';}?> value="Uzbekistan">Uzbekistan (+998)</option>
			
				<option <?php if($country ==='Vanuatu'){echo 'selected';}?> value="Vanuatu">Vanuatu (+678)</option>
			
				<option <?php if($country ==='Vatican City'){echo 'selected';}?> value="Vatican City">Vatican City (+39)</option>
			
				<option <?php if($country ==='Venezuela'){echo 'selected';}?> value="Venezuela">Venezuela (+58)</option>
			
				<option <?php if($country ==='Vietnam'){echo 'selected';}?> value="Vietnam">Vietnam (+84)</option>
			
				<option <?php if($country ==='Wallis and Futuna'){echo 'selected';}?> value="Wallis and Futuna">Wallis and Futuna (+681)</option>
			
				<option <?php if($country ==='Western Sahara'){echo 'selected';}?> value="Western Sahara">Western Sahara (+212)</option>
			
				<option <?php if($country ==='Yemen'){echo 'selected';}?> value="Yemen">Yemen (+967)</option>
			
				<option <?php if($country ==='Zambia'){echo 'selected';}?> value="Zambia">Zambia (+260)</option>
			
				<option <?php if($country ==='Zimbabwe'){echo 'selected';}?> value="Zimbabwe">Zimbabwe (+263)</option>
			
			</select>
    
    <div class="ajax-message-settings"> </div>
    <button type="button" class="btn btn-success  update_send_address" name="ste-send-address"><span class="icon icon-tick"></span><?php esc_html_e( 'Save', 'ste-social-form-builder' ); ?></button>
    </form>
</div>
</div>
</div>
</div>
