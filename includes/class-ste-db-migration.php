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
		$user  = wp_get_current_user();
		$id = $user->ID;
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
				"INSERT INTO `stedb_form_builder_data` (`form_id`, `user_id`, `form_name`, `receiver`, `html_code`, `full_html_code`, `field_detail`, `shortcode`, `is_deleted`, `creation_date`, `stedb_form_id`) VALUES ('1', $id, 'Contact Form', 'STEdbt@gmail.com', '<div class=\"li_row stedb-li-row-flex\"><div class=\"ste-mb-1 stedb-col form-group form_builder_field_preview\" data-group_name=\"first_name\" data-group_type=\"text\" ><div class=\"\"><label class=\"control-label ste-public-form-label-text \">First Name</label></div><div class=\" text-field\"><input type=\"text\" name=\"first_name\" class=\"form-control ste-container-alpha text-field\" /></div></div><div class=\"ste-mb-1 stedb-col form-group form_builder_field_preview\" data-group_name=\"last_name\" data-group_type=\"text\" ><div class=\"\"><label class=\"control-label ste-public-form-label-text \">Last Name</label></div><div class=\" text-field\"><input type=\"text\" name=\"last_name\" class=\"form-control ste-container-alpha text-field\" /></div></div></div><div class=\"li_row stedb-li-row-flex\"><div class=\"ste-mb-1 form-group form_builder_field_preview stedb-col\" data-group_name=\"you_can_contact_us_at\" data-group_type=\"select\" ><div class=\"\"><label class=\"control-label ste-public-form-label-text ste-flexb-20\">You can contact us at</label></div><div class=\"\"><select class=\"form-control form-dropdown-field ste-select\" name=\"you_can_contact_us_at\"><option value=\"Facebook\">Facebook</option><option value=\"Twitter\">Twitter</option><option value=\"Instagram\">Instagram</option></select></div></div></div><div class=\"li_row stedb-li-row-flex\"><div class=\"ste-mb-1 form-group form_builder_field_preview stedb-col\" data-group_name=\"message\" data-group_type=\"textarea\" ><div class=\"\"><label class=\"control-label ste-public-form-label-text \">Message</label></div><div class=\"ste-textbox textarea-field\"><textarea rows=\"5\" name=\"message\" class=\"form-control textarea-field\" /></textarea></div></div></div><div class=\"li_row stedb-li-row-flex\"><div class=\"ste-mb-1 form-group form_builder_field_preview stedb-col\" data-group_name=\"social_linkedin\" data-group_type=\"social_linkedin\" ><div class=\"sign-up-button  ste-sign-up-button ln\"><a style=\"text-decoration:none\" class=\"form_save\" social-linkedin=\"s_linkedin\"><img src=\"http://localhost/stedb/wp-content/plugins/stedb-forms-wordpress/admin/images/linkedin.png\"><span class=\"align-self-center\">Use My Linkedin!</span></a></div></div><div class=\"ste-mb-1 form-group form_builder_field_preview stedb-col\" data-group_name=\"social_gmail\" data-group_type=\"social_gmail\"><div class=\"sign-up-button ste-sign-up-button gp\"><a style=\"text-decoration:none\" class=\"form_save\" social-gmail=\"s_gmail\"><img src=\"http://localhost/stedb/wp-content/plugins/stedb-forms-wordpress/admin/images/gmail.png\"><span class=\"align-self-center\">Use My Gmail!</span></a></div></div></div>', '<div class=\"li_68708 ste-builder-field ste-row-full html_item_row_container html_row ui-droppable\" style=\"width: 291px; right: auto; height: 183px; bottom: auto;\"><div class=\"ste-row ste-flex ste-align-center\"><button class=\"ste-remove-field ste-icon-field icon icon-close remove_bal_field\" data-field=\"68708\"></button></div><div class=\"li_row stedb-li-row-flex\" data-type=\"row\" data-field=\"68708\"><div class=\"li_52171  ste-builder-field ste-row stedb-col\"><div class=\"ste-flex ste-justify-space ste-align-center\"><button class=\"ste-remove-field ste-icon-field icon icon-close remove_bal_field\" data-field=\"52171\"></button></div><div id=\"text-box\" class=\"li_row  form_output\" data-type=\"text\" data-field=\"52171\" data-parent-field=\"68708\"><input type=\"text\" name=\"label_52171\" class=\"ste-field form-control form_input_label\" placeholder=\"Enter your label here\" data-field=\"52171\" value=\"First Name\"></div></div><div class=\"li_31260  ste-builder-field ste-row stedb-col\"><div class=\"ste-flex ste-justify-space ste-align-center\"><button class=\"ste-remove-field ste-icon-field icon icon-close remove_bal_field\" data-field=\"31260\"></button></div><div id=\"text-box\" class=\"li_row  form_output\" data-type=\"text\" data-field=\"31260\" data-parent-field=\"68708\"><input type=\"text\" name=\"label_31260\" class=\"ste-field form-control form_input_label\" placeholder=\"Enter your label here\" data-field=\"31260\" value=\"Last Name\"></div></div></div></div><div class=\"li_61915 ste-builder-field ste-row-full html_item_row_container html_row ui-droppable\" style=\"width: 291px; right: auto; height: 183px; bottom: auto;\"><div class=\"ste-row ste-flex ste-align-center\"><button class=\"ste-remove-field ste-icon-field icon icon-close remove_bal_field\" data-field=\"61915\"></button></div><div class=\"li_row stedb-li-row-flex\" data-type=\"row\" data-field=\"61915\"><div class=\"li_28948 ste-builder-field ste-row stedb-col\" style=\"height: auto;\"><div class=\"ste-justify-space ste-align-center\"><button class=\"ste-remove-field ste-icon-field icon icon-close remove_bal_field\" data-field=\"28948\"></button></div><div class=\"li_row form_output\" data-type=\"select\" data-field=\"28948\"><input type=\"text\" name=\"label_28948\" class=\"ste-field form_input_label form-control\" placeholder=\"Enter your label here\" data-field=\"28948\" value=\"You can contact us at\"><div class=\"ste-selectbox-list my-3\"><div class=\"ste-flex\"><select name=\"select_28948\" class=\"ste-selectbox form-control mb-3  ste-selectbox-value col-3 mr-3\"><option data-opt=\"4525\" value=\"option\">Facebook</option><option data-opt=\"59073\" value=\"option\">Twitter</option><option data-opt=\"80025\" value=\"option\">Instagram</option></select><button class=\"ste-add-more ste-btn-add-option add_more_select\" data-field=\"28948\">+ Add</button></div><div class=\"field_extra_info_28948\"><div data-field=\"28948\" class=\"row select_row_28948\" data-opt=\"4525\"><label class=\"ste-selectbox-inputbox ste-flex ste-py-rm-0-4\"><input type=\"text\" name=\"ste-selectbox-options\" class=\"s_opt ste-selectbox-options form-control ste-flexb-90 \" placeholder=\"Enter option\" value=\"Facebook\"></label></div><div data-field=\"28948\" class=\"row select_row_28948\" data-opt=\"59073\"><div class=\"ste-flex mb-3 \"><input type=\"text\" name=\"ste-selectbox-options\" class=\"s_opt form-control ste-selectbox-options col-8 mr-3 \" value=\"Twitter\"><button class=\"ste-add-more ste-btn-remove-option remove_more_select\" data-field=\"28948\" data-opt=\"59073\">x</button></div></div><div data-field=\"28948\" class=\"row select_row_28948\" data-opt=\"80025\"><div class=\"ste-flex mb-3 \"><input type=\"text\" name=\"ste-selectbox-options\" class=\"s_opt form-control ste-selectbox-options col-8 mr-3 \" value=\"Instagram\"><button class=\"ste-add-more ste-btn-remove-option remove_more_select\" data-field=\"28948\" data-opt=\"80025\">x</button></div></div></div></div></div></div></div></div>\r\n					<div class=\"li_44828 ste-builder-field ste-row-full html_item_row_container html_row ui-droppable\" style=\"width: 291px; right: auto; height: 183px; bottom: auto;\"><div class=\"ste-row ste-flex ste-align-center\"><button class=\"ste-remove-field ste-icon-field icon icon-close remove_bal_field\" data-field=\"44828\"></button></div><div class=\"li_row stedb-li-row-flex\" data-type=\"row\" data-field=\"44828\"><div class=\"li_79732 ste-builder-field ste-row stedb-col\"><div class=\"ste-flex ste-justify-space ste-align-center\"><button class=\"ste-remove-field ste-icon-field icon icon-close remove_bal_field\" data-field=\"79732\"></button></div><div class=\"li_row form_output\" data-type=\"textarea\" data-field=\"79732\" data-parent-field=\"44828\"><input type=\"text\" name=\"label_79732\" class=\"ste-field form-control form_input_label\" placeholder=\"Enter your label here\" data-field=\"79732\" value=\"Message\"></div></div></div></div><div class=\"li_8747 ste-builder-field ste-row-full html_item_row_container html_row ui-droppable\" style=\"width: 291px; right: auto; height: 183px; bottom: auto;\"><div class=\"ste-row ste-flex ste-align-center\"><button class=\"ste-remove-field ste-icon-field icon icon-close remove_bal_field\" data-field=\"8747\"></button></div><div class=\"li_row stedb-li-row-flex\" data-type=\"row\" data-field=\"8747\"><div class=\"li_16706 ste-builder-field ste-row ste-height-auto stedb-col\"><div class=\"li_row form_output ste-flex ste-my-0-5\" data-type=\"social_linkedin\" data-field=\"16706\" data-parent-field=\"8747\"><div class=\"sign-up-button ste-sign-up-button ln\"><a class=\"form_save\" social-linkedin=\"s_linkedin\"><img src=\"http://localhost/stedb/wp-content/plugins/stedb-forms-wordpress/admin/images/linkedin.png\"><span class=\"align-self-center\">Use My Linkedin!</span></a></div><button class=\"ste-remove-field ste-icon-field icon icon-close remove_linkedin_bal_field\" data-field=\"16706\"></button></div></div><div class=\"li_85539 ste-builder-field ste-row ste-height-auto stedb-col\"><div class=\"li_row form_output ste-flex ste-my-0-5\" data-type=\"social_gmail\" data-field=\"85539\" data-parent-field=\"8747\"><div class=\"sign-up-button ste-sign-up-button gp\"><a class=\"form_save\" social-gmail=\"s_gmail\"><img src=\"http://localhost/stedb/wp-content/plugins/stedb-forms-wordpress/admin/images/gmail.png\"><span class=\"align-self-center\">Use My Gmail!</span></a></div><button class=\"ste-remove-field ste-icon-field icon icon-close remove_social_bal_field\" data-field=\"85539\"></button></div></div></div></div>', '[{\"field_type\":\"social_linkedin\"},{\"field_type\":\"social_gmail\"}]', NULL, '0', NULL, NULL);",
				"INSERT INTO `stedb_form_list` (`id`, `form_id`, `form_name`, `form_social_link`) VALUES ('1', '1', 'Contact Form', '{\"stedb_gmail\":\"https:\\/\\/opt4.stedb.com\\/stedb_subscription\\/?d=R29vZ2xlfGh0dHBzOi8vb3B0NC5zdGVkYi5jb20vZGJtOXgvfDI1MjB8JTIyNyUyMg==\",\"stedb_yahoo\":\"https:\\/\\/opt4.stedb.com\\/stedb_subscription\\/?d=WWFob298aHR0cHM6Ly9vcHQ0LnN0ZWRiLmNvbS9kYm05eC98MjUyMHwlMjI3JTIy\",\"stedb_linkedin\":\"https:\\/\\/opt4.stedb.com\\/stedb_subscription\\/?d=TGlua2VkSW58aHR0cHM6Ly9vcHQ0LnN0ZWRiLmNvbS9kYm05eC98MjUyMHwlMjI3JTIy\"}');",
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
