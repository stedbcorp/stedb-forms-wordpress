<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://stedb.com
 * @since      1.0.0
 *
 * @package    Stedb_Forms_Wordpress
 * @subpackage Stedb_Forms_Wordpress/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Stedb_Forms_Wordpress
 * @subpackage Stedb_Forms_Wordpress/includes
 * @author     STEdb <info@stedb.com>
 */
class Stedb_Forms_WordPress_I18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'stedb-forms-wordpress',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}
}
