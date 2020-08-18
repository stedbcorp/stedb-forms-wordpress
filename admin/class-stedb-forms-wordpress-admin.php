<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://stedb.com
 * @since      1.0.0
 *
 * @package    Stedb_Forms_Wordpress
 * @subpackage Stedb_Forms_Wordpress/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Stedb_Forms_Wordpress
 * @subpackage Stedb_Forms_Wordpress/admin
 * @author     STEdb <info@stedb.com>
 */
if ( ! class_exists( 'STEDB_Forms_WordPress_Admin' ) ) {
	/**
	 * [STEDB_Forms_WordPress_Admin description]
	 * html template for main class
	 */
	class STEDB_Forms_WordPress_Admin {

		/**
		 * The ID of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string    $plugin_name    The ID of this plugin.
		 */
		private $plugin_name;

		/**
		 * The version of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string    $version    The current version of this plugin.
		 */
		private $version;

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 * @param string $plugin_name The name of this plugin.
		 * @param string $version The version of this plugin.
		 */
		public function __construct( $plugin_name, $version ) {

			$this->plugin_name = $plugin_name;
			$this->version     = $version;

			/*adding setting page*/
			add_action( 'admin_menu', array( $this, 'ste_admin_menu' ) );
			/*admin notification*/
			add_action( 'admin_notices', array( $this, 'ste_plugin_notification' ) );

			/*Admin Ajax */
			add_action( 'wp_ajax_ste_create_form_builder_data', array( $this, 'ste_create_form_builder_data' ) );
			add_action( 'wp_ajax_ste_update_form_builder_data', array( $this, 'ste_update_form_builder_data' ) );
			add_action( 'wp_ajax_ste_get_edit_form_data', array( $this, 'ste_get_edit_form_data' ) );
			add_action( 'wp_ajax_ste_delete_form_builder_data', array( $this, 'ste_delete_form_builder_data' ) );
			add_action( 'wp_ajax_ste_set_email_draft', array( $this, 'ste_set_email_draft' ) );
			add_action( 'wp_ajax_ste_get_email_data', array( $this, 'ste_get_email_data' ) );
			add_action( 'wp_ajax_ste_send_regular_email', array( $this, 'ste_send_regular_email' ) );
			add_action( 'wp_ajax_stedb_create_campaign', array( $this, 'stedb_create_campaign' ) );
			add_action( 'wp_ajax_ste_get_form_data', array( $this, 'ste_get_form_data' ) );
			add_action( 'wp_ajax_ste_verify_code', array( $this, 'ste_verify_code' ) );
			add_action( 'wp_ajax_ste_verify_email_code', array( $this, 'ste_verify_email_code' ) );
			add_action( 'wp_ajax_ste_send_address', array( $this, 'ste_send_address' ) );
			add_action( 'wp_ajax_ste_send_update_address', array( $this, 'ste_send_update_address' ) );
			add_action( 'wp_ajax_ste_dont_show', array( $this, 'ste_dont_show'));
			/* Public Ajax*/
			add_action( 'wp_ajax_check_stedb_email_exist', array( $this, 'check_stedb_email_exist' ) );
			add_action( 'wp_ajax_ste_save_form_data', array( $this, 'ste_save_form_data' ) );
			add_action( 'wp_ajax_nopriv_ste_save_form_data', array( $this, 'ste_save_form_data' ) );
		}

		/**
		 * Register the stylesheets for the admin area.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_styles() {
			wp_enqueue_style( 'ste_google_fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap', '', '0.1' );
			wp_register_style( 'ste_bootstrap', plugins_url( '/bootstrap/css/bootstrap.css', __FILE__ ), '', '0.1' );
			wp_register_style( 'ste_css', plugins_url( '/css/ste-style.css', __FILE__ ), 'rand(111,9999)', '0.1' );
			wp_register_style( 'ste_fonts_css', plugins_url( '/css/stedb-fonts.css', __FILE__ ), 'rand(111,9999)', '0.1' );
			wp_register_style( 'ste_jquery-ui', plugins_url( '/css/jquery-ui.css', __FILE__ ), 'rand(111,9999)', '0.1' );
			// including generic media.
			wp_enqueue_style( 'ste_css' );
			wp_enqueue_style( 'ste_fonts_css' );
			wp_enqueue_style( 'ste_bootstrap' );
			wp_enqueue_style( 'ste_jquery-ui' );
		}

		/**
		 * Register the JavaScript for the admin area.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_scripts() {
			wp_register_script( 'ste_bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', '', '0.1', true );
			wp_register_script( 'ste_popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js', array( 'jquery-ui-draggable', 'jquery-ui-sortable', 'jquery-ui-droppable' ), '0.1', true );
			wp_enqueue_script( 'ste-generic', plugins_url( '/js/scripts.js', __FILE__ ), array( 'ste_popper' ), '0.1', 'rand(111,9999)', true );
			wp_enqueue_script( 'ste-backend', plugins_url( '/js/ste-backend.js', __FILE__ ), array( 'ste_bootstrap', 'jquery-ui-draggable', 'jquery-ui-sortable', 'jquery-ui-droppable' ), '0.1', 'rand(111,9999)', true );
			wp_register_script( 'ste-ckeditor', 'https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js', '', '0.1', false );
			wp_register_script( 'ste-email-backend', plugins_url( '/js/ste-email-backend.js', __FILE__ ), '', '0.1', 'rand(111,9999)', true );
			wp_register_script( 'ste-template', plugins_url( '/js/template.js', __FILE__ ), '', '0.1', 'rand(111,9999)', true );
			$stedata = array(
				'ajax_url'   => admin_url( 'admin-ajax.php' ),
				'site_url'   => site_url(),
				'plugin_url' => stedb_plugin_url(),
				'nonce'      => wp_create_nonce( 'ajax-nonce' ),
			);
			wp_localize_script( 'ste-generic', 'ste', $stedata );
			wp_localize_script( 'ste-backend', 'ste', $stedata );
			wp_localize_script( 'ste-email-backend', 'ste_email', $stedata );
			wp_localize_script( 'ste-template', 'ste', $stedata );

			wp_enqueue_script( 'ste-generic' );
			wp_enqueue_script( 'ste_popper' );
			wp_enqueue_script( 'ste_bootstrap' );
		}

		/**
		 * [ste_admin_menu description]
		 * html template menu bar
		 */
		public function ste_admin_menu() {

			/*adding main admin menu*/
			add_menu_page( 'STEdb Form', 'STEdb Form', 'manage_options', 'ste-form-builder', array( $this, 'ste_form_admin_page' ) );
			/*adding submenu*/
			add_submenu_page( 'ste-form-builder', 'Form Builder', 'Form Builder', 'manage_options', 'ste-form-builder', array( $this, 'ste_form_admin_page' ) );
			/*adding submenu*/
			add_submenu_page( 'ste-form-builder', 'Send Email', 'Send Email', 'manage_options', 'ste-send-email-template', array( $this, 'ste_send_email_page' ) );
			/*adding submenu*/
			add_submenu_page( 'ste-form-builder', 'Report', 'Report', 'manage_options', 'ste-report-template', array( $this, 'ste_report_page' ) );
			/*adding submenu*/
			add_submenu_page( 'ste-form-builder', 'STEdb Forms', 'Forms', 'manage_options', 'ste-from-data-template', array( $this, 'ste_form_data_page' ) );
			/*adding submenu*/
			add_submenu_page( 'ste-form-builder', 'STEdb Settings', 'Settings', 'manage_options', 'ste-setting', array( $this, 'ste_setting_page' ) );
		}
		/**
		 * [ste_form_admin_page description]
		 * html template form admin
		 */
		public function ste_form_admin_page() {

			wp_enqueue_style( 'ste_jquery-ui' );
			wp_enqueue_style( 'template_css' );
			wp_enqueue_script( 'jquery-ui-draggable' );
			wp_enqueue_script( 'jquery-ui-sortable' );
			wp_enqueue_script( 'ste-backend' );
			$this->authenticate_stedb();
			/*adding top bar*/
			$this->ste_top_bar();
			$this->ste_form_builder();
			$this->ste_footer();
		}

		/**
		 * [ste_send_email_page description]
		 * html template for send email
		 */
		public function ste_send_email_page() {
			wp_enqueue_style( 'ste_css' );
			wp_enqueue_script( 'ste-email-backend' );
			wp_enqueue_script( 'ste-ckeditor' );
			wp_enqueue_style( 'ste_fonts_css' );
			wp_enqueue_style( 'ste_bootstrap' );
			wp_enqueue_script( 'ste_bootstrap' );
			wp_enqueue_script( 'ste_popper' );
			$this->authenticate_stedb();
			$this->ste_top_bar();
			$this->ste_send_email();
			$this->ste_footer();
		}

		/**
		 * [ste_report_page description]
		 * html template for report
		 */
		public function ste_report_page() {
			$this->authenticate_stedb();
			$this->ste_top_bar();
			$this->ste_report();
			$this->ste_footer();
		}

		/**
		 * [ste_form_data_page description]
		 * html template for form data
		 */
		public function ste_form_data_page() {
			$this->authenticate_stedb();
			$this->ste_form_data();
		}

		/**
		 * [ste_setting_page description]
		 * html template for settings
		 */
		public function ste_setting_page() {
			$this->authenticate_stedb();
			$this->ste_top_bar();
			$this->ste_setting();
		}

		/**
		 * [ste_top_bar description]
		 * html template for top header
		 */
		public function ste_top_bar() {
			require_once 'template/ste-top-bar.php';
		}

		/**
		 * [ste_form_builder description]
		 * Html template sanitize for the form builder page.
		 */
		public function ste_form_builder() {
			require_once 'template/ste-form-builder.php';
		}

		/**
		 * [ste_send_email description]
		 * Html template sanitize for send email.
		 */
		public function ste_send_email() {
			require_once 'template/ste-send-email.php';
		}

		/**
		 * [ste_report description]
		 * Html template for sanitize report.
		 */
		public function ste_report() {
			require_once 'template/ste-report.php';
		}

		/**
		 * [ste_form_data description]
		 * Html template for sanitize setting.
		 */
		public function ste_form_data() {
			require_once 'template/ste-form-data.php';
		}

		/**
		 * [ste_footer description]
		 * HTML template for the footer
		 */
		public function ste_footer() {
			require_once 'template/ste-footer.php';
		}

		/**
		 * [ste_setting description]
		 * Html template for sanitize setting.
		 */
		public function ste_setting() {
			require_once 'template/ste-setting.php';
		}
		/**
		 * [ste_plugin_notification description]
		 * HTML template for the plugin notification
		 */
		public function ste_plugin_notification() {
			// push notifications code...
		}

		/**********************************************************
							Admin Ajax function
		 ***********************************************************/
		public function ste_create_form_builder_data() {
			global $wpdb;
			$table = 'stedb_form_builder_data';
			$user  = wp_get_current_user();
			$args  = wp_unslash( $_POST );
			if ( isset( $args['nonce'] ) && wp_verify_nonce( sanitize_text_field( $args['nonce'] ), 'ajax-nonce' ) ) {
				if ( isset( $args['form_name'] ) && isset( $args['receiver'] ) && isset( $args['html_code'] ) && isset( $args['full_html_code'] ) && isset( $args['field_detail_array'] ) ) {
					$data                         = array(
						'user_id'        => $user->ID ? $user->ID : '',
						'form_name'      => sanitize_text_field( $args['form_name'] ),
						'receiver'       => sanitize_email( $args['receiver'] ),
						'html_code'      => $args['html_code'],
						'full_html_code' => $args['full_html_code'],
						'field_detail'   => wp_json_encode( $args['field_detail_array'] ),
						'creation_date'  => date( 'Y-m-d' ),
					);
					$to                           = sanitize_text_field( $args['receiver'] );
					$user_id                      = get_option( 'stedb_user_id' );
					$secret                       = get_option( 'stedb_secret' );
					$base_url                     = get_option( 'stedb_base_url' );
					$stedb_obj                    = new STEDB_Account();
					$create_form_list_output      = $stedb_obj->stedb_create_form_list( $user_id, $secret, $base_url, $data );
					$social_links                 = [];
					$get_sm_providers_urls_output = $stedb_obj->stedb_get_social_providers_urls( $user_id, $secret, $base_url, $create_form_list_output );
					if ( is_array( $get_sm_providers_urls_output ) || is_object( $get_sm_providers_urls_output ) ) {
						foreach ( $get_sm_providers_urls_output->data as $get_sm_providers_urls ) {
							if ( 'Google' == $get_sm_providers_urls->sm_name ) {
								$social_links['stedb_gmail'] = $get_sm_providers_urls->sm_url;
							}
							if ( 'Yahoo' == $get_sm_providers_urls->sm_name ) {
								$social_links['stedb_yahoo'] = $get_sm_providers_urls->sm_url;
							}
							if ( 'LinkedIn' == $get_sm_providers_urls->sm_name ) {
								$social_links['stedb_linkedin'] = $get_sm_providers_urls->sm_url;
							}
						}
					}

					$social_link = wp_json_encode( $social_links );
					if ( ! empty( $create_form_list_output ) && ! empty( $social_link ) ) {
						$create_list_data = array(
							'form_name'        => sanitize_text_field( $args['form_name'] ),
							'form_id'          => $create_form_list_output,
							'form_social_link' => $social_link,
						);
						$output           = $stedb_obj->stedb_create_custom_field( $user_id, $secret, $base_url, $data );
						if ( ! empty( $output ) ) {
							$data['stedb_form_id'] = $output;
						}
						$wpdb->insert( 'stedb_form_list', $create_list_data );
						$create_list_id     = $wpdb->insert_id;
						$create_list_detail = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM `stedb_form_list` WHERE id = %d', $create_list_id ) );
						$stedb_obj->stedb_get_list_information( $user_id, $secret, $base_url, $create_list_detail[0]->form_id );
						$wpdb->insert( $table, $data );
						$lastid            = $wpdb->insert_id;
						$get_user_detail   = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM stedb_form_builder_data WHERE user_id = %d ORDER BY form_id DESC', $user->ID ) );
						$shortcode_main_id = $create_list_detail[0]->form_id;
						$shortcode         = "[stedb_form id='" . $lastid . "' list-id='" . $create_form_list_output . "']";
						$wpdb->update( $table, array( 'shortcode' => $shortcode ), array( 'form_id' => $lastid ) );
						$message  = 'You have created a form.</br>';
						$message .= stripslashes( $get_user_detail[0]->html_code );
						$subject  = 'STEDB Form Confirmation';
						$headers  = array( 'Content-Type: text/html; charset=UTF-8' );
						$retval   = wp_mail( $to, $subject, $message, $headers );
						echo wp_json_encode(
							array(
								'success'   => true,
								'shortcode' => $shortcode,
								'form_id'   => $lastid,
							)
						);
						die;
					}
				}
			}
		}
		/**
		 * [ste_update_form_field_api_data description]
		 * HTML template to update form field api

		 * @return $data
		 * @param form_id $form_id getting form_id.
		 * @param data    $data getting data.
		 */
		public function ste_update_form_field_api_data( $form_id, $data ) {
			global $wpdb;
			$user_id               = get_option( 'stedb_user_id' );
			$secret                = get_option( 'stedb_secret' );
			$base_url              = get_option( 'stedb_base_url' );
			$get_form_field_detail = $wpdb->get_results( $wpdb->prepare( 'SELECT `stedb_form_id` FROM `stedb_form_builder_data` WHERE form_id = %d', $form_id ) );
			$get_form_field_id     = $get_form_field_detail[0]->stedb_form_id;
			$get_form_list_detail  = $wpdb->get_results( $wpdb->prepare( 'SELECT `form_id` FROM `stedb_form_list` WHERE id = %d', $form_id ) );
			$get_form_list_id      = $get_form_list_detail[0]->form_id;
			$stedb_obj             = new STEDB_Account();
			$output                = $stedb_obj->stedb_update_custom_field( $user_id, $secret, $base_url, $data, $get_form_list_id, $get_form_field_id );
			return $output;
		}

		/**
		 * [ste_update_form_builder_data description]
		 * HTML template for update
		 */
		public function ste_update_form_builder_data() {
			global $wpdb;

			$args  = wp_unslash( $_POST );
			$table = 'stedb_form_builder_data';
			if ( isset( $args['nonce'] ) && wp_verify_nonce( $args['nonce'], 'ajax-nonce' ) ) {
				if ( isset( $args['form_id'] ) ) {
					$data   = array(
						'form_id' => sanitize_text_field( $args['form_id'] ),
					);
					$filter = isset( $args['filter'] ) ? $args['filter'] : '';
					if ( 'move_to_trash' == $filter ) {
							$data = array(
								'is_deleted' => 1,
							);
					} elseif ( 'restore' == $filter ) {
							$data = array(
								'is_deleted' => 0,
							);
					} else {
						$data = array(
							'form_name'      => sanitize_text_field( $args['form_name'] ),
							'receiver'       => sanitize_email( $args['receiver'] ),
							'html_code'      => $args['html_code'],
							'full_html_code' => $args['full_html_code'],
							'field_detail'   => wp_json_encode( $args['field_detail_array'] ),
						);
					}
					$form_id = $args['form_id'];
					if(isset($data['form_name'])){
						$user_id               = get_option( 'stedb_user_id' );
						$secret                = get_option( 'stedb_secret' );
						$base_url              = get_option( 'stedb_base_url' );
						$list_data_update_stedb = array('form_id'=>$form_id,'form_name'=>$data['form_name'],'receiver'=>$data['receiver']); 
						$stedb_obj = new STEDB_Account();
						$output    = $stedb_obj->stedb_update_form_list($user_id, $secret, $base_url, $list_data_update_stedb);
						//print_r($output);exit;
					}
					
					if ( is_array( $form_id ) ) {
						foreach ( $form_id as $id ) {
							$id = sanitize_text_field( $id );
							$da = $this->ste_update_form_field_api_data( $form_id, $data );
							if ( ! empty( $da ) ) {
								$data['stedb_form_id'] = $da;
								$wpdb->update( $table, $data, array( 'form_id' => $id ) );
							}
						}
					} else {
						$form_id = sanitize_text_field( $args['form_id'] );
						$da      = $this->ste_update_form_field_api_data( $form_id, $data );
						if ( ! empty( $da ) ) {
							$data['stedb_form_id'] = $da;
							$wpdb->update( $table, $data, array( 'form_id' => $form_id ) );
						}
					}
					echo wp_json_encode( array( 'success' => true ) );
					die;
				} else {
					echo ( 'Sorry error to show data' );
				}
			}
		}

		/**
		 * [ste_get_edit_form_data description]
		 * HTML template for edit form data
		 */
		public function ste_get_edit_form_data() {
			global $wpdb;
			$user = wp_get_current_user();
			$args = wp_unslash( $_POST );

			if ( isset( $args['nonce'] ) && wp_verify_nonce( $args['nonce'], 'ajax-nonce' ) ) {
					$form_id   = sanitize_text_field( $args['form_id'] );
					$user_id   = get_option( 'stedb_user_id' );
					$secret    = get_option( 'stedb_secret' );
					$base_url  = get_option( 'stedb_base_url' );
					$results   = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM stedb_form_builder_data WHERE user_id = %d AND form_id = %s', $user->ID, $form_id ) );
					$stedb_obj = new STEDB_Account();
					$output    = $stedb_obj->stedb_get_custom_field_information( $user_id, $secret, $base_url, $results[0]->stedb_form_id );
					echo wp_json_encode(
						array(
							'success' => true,
							'result'  => $results,
						)
					);
					die;
			} else {
					echo ( 'Sorry error to show data' );
			}
		}
		/**
		 * [ste_get_form_data description]
		 * HTML template for getting form data
		 */
		public function ste_get_form_data() {
			global $wpdb;
			$user = wp_get_current_user();
			$args = wp_unslash( $_POST );
			if ( isset( $args['nonce'] ) && wp_verify_nonce( $args['nonce'], 'ajax-nonce' ) ) {

					$results = $wpdb->get_results(
						$wpdb->prepare(
							'SELECT stedb_form_builder_data.*,stedb_form_list.id,stedb_form_list.form_id,stedb_send_email_entries.* FROM stedb_form_builder_data
					LEFT JOIN stedb_send_email_entries ON stedb_form_builder_data.form_id = stedb_send_email_entries.main_form_id
					LEFT JOIN stedb_form_list ON stedb_form_builder_data.form_id = stedb_form_list.id
					WHERE stedb_form_builder_data.user_id = %d',
							$user->ID
						)
					);
					echo wp_json_encode(
						array(
							'success' => true,
							'result'  => $results,
						)
					);
					die;

			}
		}

		/**
		 * [ste_delete_form_builder_data description]
		 * HTML template for delete form data
		 */
		public function ste_delete_form_builder_data() {
			global $wpdb;
			$user  = wp_get_current_user();
			$args  = wp_unslash( $_POST );
			$table = 'stedb_form_builder_data';
			if ( isset( $args['nonce'] ) && wp_verify_nonce( $args['nonce'], 'ajax-nonce' ) ) {
					$form_id = sanitize_text_field( $args['form_id'] );
				if ( is_array( $form_id ) ) {
					foreach ( $form_id as $id ) {
							$wpdb->delete( $table, array( 'form_id' => $id ) );
					}
				} else {
						$wpdb->delete( $table, array( 'form_id' => $form_id ) );
				}

					echo wp_json_encode( array( 'success' => true ) );
					die;
			}
		}

		/**
		 * [ste_set_email_draft description]
		 * HTML template for email draft
		 */
		public function ste_set_email_draft() {
			global $wpdb;
			$table = 'stedb_send_email_entries';
			$user  = wp_get_current_user();
			$args  = wp_unslash( $_POST );
			if ( isset( $args['nonce'] ) && wp_verify_nonce( $args['nonce'], 'ajax-nonce' ) ) {
					$email_message = str_replace( '\\', '', sanitize_text_field( $args['email_message'] ) );
					$data          = array(
						'from_name'    => sanitize_text_field( $args['from_name'] ),
						'main_form_id' => sanitize_text_field( $args['form_id'] ),
						'subject'      => sanitize_text_field( $args['email_subject'] ),
						'content'      => $email_message,
						'status'       => sanitize_text_field( $args['email_status'] ),
						'type'         => sanitize_text_field( $args['email_type'] ),
					);

					$user_id     = get_option( 'stedb_user_id' );
					$secret      = get_option( 'stedb_secret' );
					$base_url    = get_option( 'stedb_base_url' );
					$stedb_obj   = new STEDB_Account();
					$list_id     = sanitize_text_field( $args['list_id'] );
					$get_list_id = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM stedb_send_email_entries WHERE list_id = %d', $list_id ) );
					if ( 1 == $get_list_id[0]->list_id && $get_list_id[0]->status ) {
						$id                = $get_list_id[0]->stedb_campaign_id;
						$stedb_campaign_id = $stedb_obj->stedb_update_campaign( $user_id, $secret, $base_url, $data, $id );
						$wpdb->update( $table, $data, array( 'list_id' => $list_id ) );
						echo wp_json_encode(
							array(
								'success' => true,
								'status'  => 'updated',
							)
						);
						die;
					} else {
						$data['list_id']           = sanitize_text_field( $args['list_id'] );
						$stedb_campaign_id         = $stedb_obj->stedb_create_campaign( $user_id, $secret, $base_url, $data );
						$data['run_date']          = date( 'Y-m-d' );
						$data['stedb_campaign_id'] = $stedb_campaign_id;
						$wpdb->insert( $table, $data );
						$lastid = $wpdb->insert_id;
						if ( $lastid > 0 ) {
							echo wp_json_encode(
								array(
									'success' => true,
									'status'  => 'created',
									'result'  => $lastid,
								)
							);
							die;
						}
					}
			}
		}

		/**
		 * [stedb_create_campaign description]
		 * HTML template for create campaign
		 */
		public function stedb_create_campaign() {
			global $wpdb;
			$table = 'stedb_send_email_entries';
			$user  = wp_get_current_user();
			$args  = wp_unslash( $_POST );
			if ( isset( $args['nonce'] ) && wp_verify_nonce( $args['nonce'], 'ajax-nonce' ) ) {
						$email_message = str_replace( '\\', '', sanitize_text_field( $args['email_content'] ) );
						$data          = array(
							'content'      => $email_message,
							'main_form_id' => sanitize_text_field( $args['form_id'] ),
							'from_name'    => sanitize_text_field( $args['from_name'] ),
							'subject'      => sanitize_text_field( $args['email_subject'] ),
							'status'       => sanitize_text_field( $args['email_status'] ),
							'type'         => sanitize_text_field( $args['email_type'] ),
						);
						$list_id       = sanitize_text_field( $args['list_id'] );
						$user_id       = get_option( 'stedb_user_id' );
						$secret        = get_option( 'stedb_secret' );
						$base_url      = get_option( 'stedb_base_url' );
						$stedb_obj     = new STEDB_Account();
						$get_list_id   = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM stedb_send_email_entries WHERE list_id = %d', $list_id ) );
						if ( ! empty( $get_list_id ) ) {
							if ( 1 == $get_list_id[0]->status ) {
								$id                = $get_list_id[0]->stedb_campaign_id;
								$stedb_campaign_id = $stedb_obj->stedb_update_campaign( $user_id, $secret, $base_url, $data, $id );
								$wpdb->update( $table, $data, array( 'list_id' => $list_id ) );
								echo wp_json_encode(
									array(
										'success' => true,
										'status'  => 'updated',
									)
								);
								die;
							} else {
								echo wp_json_encode(
									array(
										'success' => true,
										'status'  => 'not_updated',
									)
								);
								die;
							}
						} else {
							$data['list_id']           = sanitize_text_field( $args['list_id'] );
							$stedb_campaign_id         = $stedb_obj->stedb_create_campaign( $user_id, $secret, $base_url, $data );
							$data['run_date']          = date( 'Y-m-d' );
							$data['stedb_campaign_id'] = $stedb_campaign_id;
							$wpdb->insert( $table, $data );
							$lastid = $wpdb->insert_id;
							if ( $lastid > 0 ) {
								echo wp_json_encode(
									array(
										'success' => true,
										'result'  => $lastid,
										'status'  => 'created',
									)
								);
								die;
							}
						}
			}
		}

		/**
		 * [ste_send_regular_email description]
		 * HTML template for sending regular email
		 */
		public function ste_send_regular_email() {
			global $wpdb;
			$table = 'stedb_send_email_entries';
			$user  = wp_get_current_user();
			$args  = wp_unslash( $_POST );
			if ( isset( $args['nonce'] ) && wp_verify_nonce( $args['nonce'], 'ajax-nonce' ) ) {

						$email_message = str_replace( '\\', '', $args['email_message'] );
						$data          = array(
							'from_name'    => sanitize_text_field( $args['from_name'] ),
							'main_form_id' => sanitize_text_field( $args['form_id'] ),
							'subject'      => sanitize_text_field( $args['email_subject'] ),
							'content'      => $email_message,
							'from_email'   =>	sanitize_text_field( $args['from_email'] ),
							'type'         => sanitize_text_field( $args['email_type'] ),
							'status'       => sanitize_text_field( $args['email_status'] ),
						);
						$list_id       = sanitize_text_field( $args['list_id'] );
						$user_id       = get_option( 'stedb_user_id' );
						$secret        = get_option( 'stedb_secret' );
						$base_url      = get_option( 'stedb_base_url' );
						$stedb_obj     = new STEDB_Account();
						$get_list_id   = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM stedb_send_email_entries WHERE list_id = %d', $list_id ) );

						if ( ! empty( $get_list_id ) ) {
							if ( 1 == $get_list_id[0]->status ) {
								$id                = $get_list_id[0]->stedb_campaign_id;
								$stedb_campaign_id = $stedb_obj->stedb_update_campaign( $user_id, $secret, $base_url, $data, $id );
								$wpdb->update( $table, $data, array( 'list_id' => $list_id ) );
								echo wp_json_encode(
									array(
										'success' => true,
										'status'  => 'updated',
									)
								);
								die;
							} else {
								echo wp_json_encode(
									array(
										'success' => true,
										'status'  => 'not_updated',
									)
								);
								die;
							}
						} else {
							$data['list_id']           = sanitize_text_field( $args['list_id'] );
							$stedb_campaign_id         = $stedb_obj->stedb_create_campaign( $user_id, $secret, $base_url, $data );
							$data['run_date']          = date( 'Y-m-d' );
							$data['stedb_campaign_id'] = $stedb_campaign_id;
							$wpdb->insert( $table, $data );
							$lastid = $wpdb->insert_id;
							if ( $lastid > 0 ) {
								echo wp_json_encode(
									array(
										'success' => true,
										'result'  => $lastid,
										'status'  => 'created',
									)
								);
								die;
							}
						}
			}
		}

				/**
				 * [ste_get_email_data description]
				 * HTML template to get email data
				 */
		public function ste_get_email_data() {
					global $wpdb;
					$args = wp_unslash( $_POST );
			if ( isset( $args['nonce'] ) && wp_verify_nonce( $args['nonce'], 'ajax-nonce' ) ) {
							$filter         = sanitize_text_field( $args['filter'] );
							$list_id        = sanitize_text_field( $args['list_id'] );
							$get_email_data = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM stedb_send_email_entries WHERE list_id = %d', $list_id ) );
							echo wp_json_encode(
								array(
									'success' => true,
									'result'  => $get_email_data,
								)
							);
							die;
			}
		}

				/**
				 * [stedb_remove_element_with_value description]
				 * HTML template to remove element val
				 *
				 * @return $array
				 * @param array $array return array.
				 */
		public function stedb_remove_element_with_value( $array ) {
			foreach ( $array as $sub_key => $sub_array ) {
				if ( 'social_gmail' == $sub_array ) {
						unset( $array[ $sub_key ] );
				}
				if ( 'social_yahoo' == $sub_array ) {
						unset( $array[ $sub_key ] );
				}
				if ( 'social_linkedin' == $sub_array ) {
						unset( $array[ $sub_key ] );
				}
			}
				return $array;
		}

				/**
				 * [ste_get_email_data description]
				 * HTML template to get email data
				 */
		public function ste_save_form_data() {
			global $wpdb, $wp_session;
			$args = wp_unslash( $_POST );
			if ( isset( $args['nonce'] ) && wp_verify_nonce( $args['nonce'], 'ajax-nonce' ) ) {
				if ( isset( $args['form_id'] ) && isset( $args['form_data'] ) ) {
					$form_data        = wp_json_encode( sanitize_text_field( $args['form_data'] ) );
					$form_data        = json_decode( json_decode( $form_data, true ), true );
					$insert_data      = array();
					$form_id          = sanitize_text_field( $args['form_id'] );
					$get_max_entry_id = $wpdb->get_row( $wpdb->prepare( 'SELECT MAX(entry_id) as max_entry_id FROM stedb_form_entries WHERE form_id = %d', $form_id ) );
					$get_form_detail  = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM stedb_form_builder_data WHERE form_id = %d', $form_id ) );
					$api_field_ids    = $get_form_detail[0]->stedb_form_id;
					$api_field_id     = explode( ',', $api_field_ids );
					if ( $get_max_entry_id ) {
						$entry_id = $get_max_entry_id->max_entry_id + 1;
					} else {
						$entry_id = 1;
					}
					foreach ( $form_data as $key => $value ) {
						foreach ( $value as $val ) {
							$insert_data       = array(
								'form_id'     => $form_id,
								'entry_id'    => $entry_id,
								'field_key'   => $val['name'],
								'field_value' => $val['value'],
							);
							$form_data_array[] = $val['value'];
							$result            = $wpdb->insert( 'stedb_form_entries', $insert_data );
						}
					}

					$form_data_arr               = $this->stedb_remove_element_with_value( $form_data_array );
					$new_arr                     = array_combine( $api_field_id, $form_data_arr );
					$_SESSION['form_data_array'] = $new_arr;
					if ( $result > 0 ) {
						echo wp_json_encode( array( 'success' => true ) );
						die;
					}
				}
			}
		}

				/**
				 * [authenticate_stedb description]
				 * HTML template to authenticate form
				 */
		public function authenticate_stedb() {
			if ( empty( get_option( 'stedb_user_id' ) ) && empty( get_option( 'stedb_secret' ) ) && empty( get_option( 'stedb_base_url' ) ) ) {
				$account = new STEDB_Account();
				$output = $account->stedb_registration();
				if($output->data->err_code == 1){
					require_once plugin_dir_path( __FILE__ ) . 'template/stedb-popup.php';	
				}
				else{
					if($output->data->error){

						$error_mmsgs = array(
							4=>'Your WordPress installation is using an invalid email, please add a valid one and try again',
							5=>'The email used in your WordPress installation is using an invalid domain, please add a valid one and try again',
							6=>'The email used in your WordPress installation is using a domain that is blocked, please try with another email',
							7=>'The email used in your WordPress installation is blocked, please try with another email'
						);
						if($error_mmsgs[$output->data->err_code]){
							$err_msg = $error_mmsgs[$output->data->err_code];
							require_once plugin_dir_path( __FILE__ ) . 'template/stedb-popup-email-errors.php';
						}else{
							$err_msg = $output->data->error;
							require_once plugin_dir_path( __FILE__ ) . 'template/stedb-popup-email-errors.php';
						}
					}
				}
			}
		}
				/**
				 * [ste_verify_code description]
				 * HTML template to verify email
				 */
		public function ste_verify_code() {
			global $wpdb;
			$args = wp_unslash( $_POST );
			if ( isset( $args['nonce'] ) && wp_verify_nonce( $args['nonce'], 'ajax-nonce' ) ) {
				if ( isset( $args['stedb_email'] ) && isset( $args['code'] ) ) {
						$code     = $args['code'];
						$user     = wp_get_current_user();
						$base_url = 'https://opt4.stedb.com/crm';
						$data     = array(
							'email'  => $user->user_email,
							'domain' => get_option( 'siteurl' ),
							'code'   => implode( '', $code ),
						);
						$client   = new STEDB_Api_Client( $user_id, $secret, $base_url );
						$output   = $client->ste_send_request( '/account/reactivate', 'POST', $data );

						if ( ! isset( $output->data->error ) ) {
							$user_id  = $output->data->user_id;
							$secret   = $output->data->secret;
							$base_url = $output->data->base_url;

							if ( ! empty( $user_id ) && ! empty( $secret ) && ! empty( $base_url ) ) {
								add_option( 'stedb_user_id', $user_id );
								add_option( 'stedb_secret', $secret );
								add_option( 'stedb_base_url', $base_url );
							}
							echo wp_json_encode( array( 'success' => true ) );
							die;
						} else {
							echo wp_json_encode(
								array(
									'error'   => true,
									'message' => $output->data->error,
								)
							);
							die;
						}
				}
			}
		}
		public function ste_verify_email_code() {
			global $wpdb;
			$args = wp_unslash( $_POST );
			if ( isset( $args['nonce'] ) && wp_verify_nonce( $args['nonce'], 'ajax-nonce' ) ) {
				if ( isset( $args['stedb_email'] ) && isset( $args['code_email'] ) ) {
						$code 		   = $args['code_email'];
						$email 		   = $args['email'];
						$user     = wp_get_current_user();
						$user_id       = get_option( 'stedb_user_id' );
						$secret        = get_option( 'stedb_secret' );
						$base_url      = 'https://opt4.stedb.com/dbm9x/api';
						
						$data     = array(
							'from_email'  => $email,
							'code'   => implode( '', $code ),
						);
						$client   = new STEDB_Api_Client( $user_id, $secret, $base_url );
						$output   = $client->ste_send_request( '/campaign/check_from_email/'.$email.'?code='.$data['code'] ,'GET');
						if ( ! isset( $output->data->error ) ) {
							if($output->data[0] ==='Confirmed address'){
								echo wp_json_encode( array( 'success' => true ) );
								die;
							}else{
								echo wp_json_encode(
									array(
										'error'   => true,
										'message' => $output->data[0],
									)
								);
								die;
							}

						} else {
							echo wp_json_encode(
								array(
									'error'   => true,
									'message' => $output->data->error,
								)
							);
							die;
						}
				}
			}
		}	
		public function check_stedb_email_exist(){
			global $wpdb;
			$args = wp_unslash( $_POST );
			$base_url = 'https://opt4.stedb.com/dbm9x/api';
			$user_id       = get_option( 'stedb_user_id' );
			$secret        = get_option( 'stedb_secret' );
			$data = array(
				'from_email'  => $args['from_email'],
				'id'=>$user_id
			);

			$client   = new STEDB_Api_Client( $user_id, $secret, $base_url );
			$output   = $client->ste_send_request( '/campaign/check_from_email', 'POST',$data );
			if ( ! isset( $output->data->error ) ) {
				echo wp_json_encode( array( 'success' => true,'message'=>$output->data[0] ) );
				die;
			}else{
				echo wp_json_encode(
					array(
						'success'   => true,
						'error' => true,
						'message' => $output->data->error,
					)
				);
				die;
			}
		}
			/**
			 * [ste_send_address description]
			 * HTML template to verify email
			 */
		public function ste_send_address() {
			global $wpdb;
			$args = wp_unslash( $_POST );
			if ( isset( $args['nonce'] ) && wp_verify_nonce( $args['nonce'], 'ajax-nonce' ) ) {
				if ( isset( $args['address'] ) && isset( $args['address2'] ) && isset( $args['city'] ) && isset( $args['state_province'] ) && isset( $args['zip_code'] ) && isset( $args['country'] ) ) {
						$base_url      = 'https://opt4.stedb.com/dbm9x/api';
						$user_id       = get_option( 'stedb_user_id' );
						$secret        = get_option( 'stedb_secret' );
						$data     = array(
							'address'        => $args['address'],
							'address2'       => $args['address2'],
							'city'           => $args['city'],
							'state_province' => $args['state_province'],
							'zip_code'       => $args['zip_code'],
							'country'        => $args['country'],
						);

						$client   = new STEDB_Api_Client( $user_id, $secret, $base_url );
						$output   = $client->ste_send_request( '/accnt/save_address/', 'POST', $data );
						if ( ! isset( $output->data->error ) ) {
							if(isset($output->data->id)){
								$address        = $args['address'];
								$address2       = $args['address2'];
								$city           = $args['city'];
								$state_province = $args['state_province'];
								$zip_code       = $args['zip_code'];
								$country        = $args['country'];
								if ( ! empty( $address ) && ! empty( $city ) && ! empty( $state_province ) && ! empty( $zip_code ) && ! empty( $country ) ) {
									add_option( 'address', $address );
									add_option( 'address2', $address2 );
									add_option( 'city', $city );
									add_option( 'state_province', $state_province );
									add_option( 'zip_code', $zip_code );
									add_option( 'country', $country );
								}
								echo wp_json_encode( array( 'success' => true ) );
								die;
							}else{
								echo wp_json_encode( array( 'error' => true,'message'=>$output->data[0] ) );
								die;
							}
						} else {
							echo wp_json_encode(
								array(
									'error'   => true,
									'message' => $output->data->error,
								)
							);
							die;
						}
				}
			}
		}
		public function ste_dont_show(){
			global $wpdb;
			update_option( 'stedb_form_popup_hide', 1 );
			echo wp_json_encode( array( 'success' => true ) );
			die;
		}
		public function ste_send_update_address() {
			global $wpdb;
			$args = wp_unslash( $_POST );
			if ( isset( $args['nonce'] ) && wp_verify_nonce( $args['nonce'], 'ajax-nonce' ) ) {
				if ( isset( $args['address'] ) && isset( $args['address2'] ) && isset( $args['city'] ) && isset( $args['state_province'] ) && isset( $args['zip_code'] ) && isset( $args['country'] ) ) {
						$base_url      = 'https://opt4.stedb.com/dbm9x/api';
						$user_id       = get_option( 'stedb_user_id' );
						$secret        = get_option( 'stedb_secret' );
						$data     = array(
							'address'        => $args['address'],
							'address2'       => $args['address2'],
							'city'           => $args['city'],
							'state_province' => $args['state_province'],
							'zip_code'       => $args['zip_code'],
							'country'        => $args['country'],
						);
						$client   = new STEDB_Api_Client( $user_id, $secret, $base_url );
						$output   = $client->ste_send_request( '/accnt/save_address/', 'POST', $data );
						if ( ! isset( $output->data->error ) ) {
							if(isset($output->data->id)){
								$address        = $args['address'];
								$address2       = $args['address2'];
								$city           = $args['city'];
								$state_province = $args['state_province'];
								$zip_code       = $args['zip_code'];
								$country        = $args['country'];
								if ( ! empty( $address ) && ! empty( $city ) && ! empty( $state_province ) && ! empty( $zip_code ) && ! empty( $country ) ) {
									update_option( 'address', $address );
									update_option( 'address2', $address2 );
									update_option( 'city', $city );
									update_option( 'state_province', $state_province );
									update_option( 'zip_code', $zip_code );
									update_option( 'country', $country );
								}
								echo wp_json_encode( array( 'success' => true ) );
								die;
							}else{
								echo wp_json_encode( array( 'error' => true,'message'=>$output->data[0] ) );
								die;
							}
						} else {
							echo wp_json_encode(
								array(
									'error'   => true,
									'message' => $output->data->error,
								)
							);
							die;
						}
				}
			}
		}
	}
}
