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
<label class="ste-form-label"><?php esc_html_e( 'Address:', 'ste-social-form-builder' ); ?></label>
<textarea rows="4" id="address" name="address" class="ste-form-name" placeholder="Enter your Physical Address" required >
<?php
global $wpdb;
$args = wp_unslash( $_POST );
if ( get_option( 'address' ) ) {
    echo( esc_html( get_option( 'address' ) ) );
}
?>
</textarea>
</div>
</div>
</div>
</div>
