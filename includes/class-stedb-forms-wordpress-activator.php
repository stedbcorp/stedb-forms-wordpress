<?php
/**
 * Fired during plugin activation
 *
 * @link       https://stedb.com
 * @since      1.0.0
 *
 * @package    Stedb_Forms_Wordpress
 * @subpackage Stedb_Forms_Wordpress/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Stedb_Forms_Wordpress
 * @subpackage Stedb_Forms_Wordpress/includes
 * @author     STEdb <info@stedb.com>
 */
class Stedb_Forms_WordPress_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		/*create database table*/
		$db_manager = new STE_DB_Migration();
		$db_manager->stedb_migrate();

		$account = new STEDB_Account();
		$account->stedb_registration();
	}

}
