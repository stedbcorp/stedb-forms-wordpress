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
<div class="col-6 form-group">
<!-- Address -->
<label class="ste-form-label"><?php esc_html_e( 'Address:', 'ste-social-form-builder' ); ?></label>
<textarea rows="2" id="address" name="address" class="ste-form-name" placeholder="Enter your Physical Address" required >
<?php
global $wpdb;
$args = wp_unslash( $_POST );
if ( get_option( 'address' ) ) {
    echo( esc_html( get_option( 'address' ) ) );
}
?>
</textarea>
<!-- Address2 -->
<label class="ste-form-label"><?php esc_html_e( 'Address2:', 'ste-social-form-builder' ); ?></label>
<textarea rows="1" id="address2" name="address2" class="ste-form-name" placeholder="Enter your Physical Address-2" required >
<?php
global $wpdb;
$args = wp_unslash( $_POST );
if ( get_option( 'address2' ) ) {
    echo( esc_html( get_option( 'address2' ) ) );
}
?>
</textarea>
<!-- City -->
<label class="ste-form-label"><?php esc_html_e( 'City:', 'ste-social-form-builder' ); ?></label>
<input rows="1" id="city" name="city" class="ste-form-name" placeholder="Enter your City" required
value="<?php
global $wpdb;
$args = wp_unslash( $_POST );
if ( get_option( 'city' ) ) {
    echo( esc_html( get_option( 'city' ) ) );
}
?>">
<!-- State -->
<label class="ste-form-label"><?php esc_html_e( 'State/Province:', 'ste-social-form-builder' ); ?></label>
<input rows="1" id="state_province" name="state_province" class="ste-form-name" placeholder="Enter your State" required
value="<?php
global $wpdb;
$args = wp_unslash( $_POST );
if ( get_option( 'state_province' ) ) {
    echo( esc_html( get_option( 'state_province' ) ) );
}
?>">
<!-- Zip -->
<label class="ste-form-label"><?php esc_html_e( 'Zip-Code:', 'ste-social-form-builder' ); ?></label>
<input rows="1" id="zip_code" name="zip_code" class="ste-form-name" placeholder="Enter your zip_code" required
value="<?php
global $wpdb;
$args = wp_unslash( $_POST );
if ( get_option( 'zip_code' ) ) {
    echo( esc_html( get_option( 'zip_code' ) ) );
}
?>">
<!-- Country -->
<label class="ste-form-label"><?php esc_html_e( 'Country:', 'ste-social-form-builder' ); ?></label>
<input rows="1" id="country" name="country" class="ste-form-name" placeholder="Enter your Country" required
value="<?php
global $wpdb;
$args = wp_unslash( $_POST );
if ( get_option( 'country' ) ) {
    echo( esc_html( get_option( 'country' ) ) );
}
?>">
</div>
</div>
</div>
</div>
