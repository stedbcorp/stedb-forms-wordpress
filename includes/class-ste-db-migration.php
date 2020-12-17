<?php
	/**
	 * The admin-specific functionality of the plugin.
	 *
	 * @link       https://stedb.com
	 * @since      1.0.0
	 *
	 * @package    class-ste-db-migration.php
	 * @subpackage class-ste-db-migration/includes
	 */

	/**
	 * The admin-specific functionality of the plugin.
	 *
	 * @link       https://stedb.com
	 * @since      1.0.0
	 *
	 * @package    class-ste-db-migration
	 * @subpackage class-ste-db-migration/includes
	 */
class STE_DB_Migration {
	/**
	 * [stedb_migrate description]
	 * HTML template form migrate
	 */
	public function stedb_migrate() {

		global $wpdb;
		$user             = wp_get_current_user();
		$id               = $user->ID;
			$migration    = array();
			$migration[1] = array(
				"CREATE TABLE if not exists `stedb_form_builder_data` (
                              `form_id` bigint(20) NOT NULL ,
                              `user_id` bigint(20) DEFAULT NULL,
                              `form_name` varchar(255) DEFAULT NULL,
                              `receiver` varchar(255) DEFAULT NULL,
                              `html_code` longtext,
                              `full_html_code` longtext,
							  `field_detail` longtext,
                              `shortcode` varchar(255) DEFAULT NULL,
                              `is_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = not deleted, 1 = deleted',
                              `creation_date` date DEFAULT NULL,
							  `stedb_form_id` varchar(255) DEFAULT NULL,
							  PRIMARY KEY (`form_id`)
							) ENGINE=InnoDB DEFAULT CHARSET=latin1;",
			);
			$migration[2] = array(
				'ALTER TABLE `stedb_form_builder_data`
                                MODIFY `form_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;',
			);

			$migration[3] = array(
				'CREATE TABLE if not exists `stedb_form_entries` (
                                `id` bigint(20) NOT NULL,
                                `form_id` bigint(20) NOT NULL,
                                `entry_id` bigint(20) NOT NULL,
                                `field_key` varchar(255) NOT NULL,
                                `field_value` text,
                                PRIMARY KEY (`id`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;',
			);

			$migration[4] = array(
				'ALTER TABLE `stedb_form_entries`
                                  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;',
			);

			$migration[5] = array(
				'CREATE TABLE if not exists `stedb_form_list` (
                            `id` int(11) NOT NULL,
                            `form_id` int(11) NOT NULL,
                            `form_name` varchar(100) NOT NULL,
                            `form_social_link` LONGTEXT NOT NULL,
                            PRIMARY KEY (`id`)
                            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;',
			);

			$migration[6] = array(
				'ALTER TABLE `stedb_form_list` MODIFY `id` bigint(20)
                            NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;',
			);

			$migration[7] = array(
				"CREATE TABLE if not exists `stedb_send_email_entries` (
								  `campaign_id` bigint(20) NOT NULL,
								  `list_id` int(11) NOT NULL,
                  `main_form_id` int(11) NOT NULL,
								  `type` int(11) NOT NULL COMMENT '0 = regular emailing, 1 = autoresponding',
								  `status` int(11) NOT NULL COMMENT '1 = draft,4 = running, 3 = scheduled',
								  `run_date` date DEFAULT NULL,
								  `from_name` varchar(255) DEFAULT NULL,
								  `subject` varchar(255) DEFAULT NULL,
								  `content` longtext,
								  `stedb_campaign_id` int(11) NOT NULL,
								  PRIMARY KEY (`campaign_id`)
							) ENGINE=InnoDB DEFAULT CHARSET=latin1;",
			);

			$migration[8] = array(
				'ALTER TABLE `stedb_send_email_entries`
                                MODIFY `campaign_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;',
			);
			$migration[9] = array(
				'ALTER TABLE `stedb_send_email_entries` ADD `from_email` VARCHAR(255) NULL AFTER `from_name`;',
			);
			
			foreach ( $migration as $version => $queries ) {
				foreach ( $queries as $query ) {
					/**
					 * We are not using wpdb->prepare as we have nothing to escape its just a basic table migration.
					 */
					$wpdb->query( $query );
				}
			}
	}
}
