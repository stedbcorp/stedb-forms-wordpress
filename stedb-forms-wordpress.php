<?php
/**
 *
 * STEdb WordPress Forms is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * @link              https://stedb.com
 * @since             1.0.0
 * @package           Stedb_Forms_Wordpress
 *
 * @wordpress-plugin
 * Plugin Name:       STEdb Forms
 * Plugin URI:        https://stedb.com/stedb-forms/
 * Description:       Drag and drop form builder, send button with social integration which guarantees no fake leads, no fake emails submitting your forms and FREE email marketing automation platforms.
 * Version:           1.0.0
 * Author:            STEDB
 * Author URI:        https://stedb.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       stedb-forms-wordpress
 * Domain Path:       /languages
 */

if ( '' == session_id() ) {
	session_start();
}

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'STEDB_FORMS_WORDPRESS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-stedb-forms-wordpress-activator.php
 */
function activate_stedb_forms_wordpress() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-stedb-forms-wordpress-activator.php';
	Stedb_Forms_Wordpress_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-stedb-forms-wordpress-deactivator.php
 */
function deactivate_stedb_forms_wordpress() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-stedb-forms-wordpress-deactivator.php';
	Stedb_Forms_Wordpress_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_stedb_forms_wordpress' );
register_deactivation_hook( __FILE__, 'deactivate_stedb_forms_wordpress' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-stedb-forms-wordpress.php';


/**
 * Start Function how to Add plugin urls
 */
function stedb_plugin_url() {
	return plugin_dir_url( __FILE__ );
}


if ( ! function_exists( 'write_log' ) ) {
	/**
	 * [write_log description]
	 * HTML template to write log
	 *
	 * @param log $log get log.
	 */
	function write_log( $log ) {
		if ( true == WP_DEBUG ) {
			if ( is_array( $log ) || is_object( $log ) ) {
				error_log( wp_json_encode( $log ) );
			} else {
				error_log( $log );
			}
		}
	}
}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_stedb_forms_wordpress() {

	$plugin = new Stedb_Forms_Wordpress();
	$plugin->run();

}
run_stedb_forms_wordpress();
