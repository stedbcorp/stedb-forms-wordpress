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
		 * @param      string    $plugin_name       The name of this plugin.
		 * @param      string    $version    The version of this plugin.
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
			add_action( 'wp_ajax_create_campaign', array( $this, 'stedb_create_campaign' ) );
			add_action( 'wp_ajax_ste_get_form_data', array( $this, 'ste_get_form_data' ) );

			/* Public Ajax*/
			add_action( 'wp_ajax_ste_save_form_data', array( $this, 'ste_save_form_data' ) );
			add_action( 'wp_ajax_nopriv_ste_save_form_data', array( $this, 'ste_save_form_data' ) );

		}

		/**
		 * Register the stylesheets for the admin area.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_styles() {

			/**
			 * This function is provided for demonstration purposes only.
			 *
			 * An instance of this class should be passed to the run() function
			 * defined in Stedb_Forms_Wordpress_Loader as all of the hooks are defined
			 * in that particular class.
			 *
			 * The Stedb_Forms_Wordpress_Loader will then create the relationship
			 * between the defined hooks and the functions defined in this
			 * class.
			 */

			// wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/stedb-forms-wordpress-admin.css', array(), $this->version, 'all' );
			wp_register_style( 'ste_css', plugins_url( '/css/ste-style.css', __FILE__ ), '', '0.1' );

			wp_register_style( 'ste_jquery-ui', plugins_url( '/css/jquery-ui.css', __FILE__ ), '', '0.1' );
		}

		/**
		 * Register the JavaScript for the admin area.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_scripts() {

			/**
			 * This function is provided for demonstration purposes only.
			 *
			 * An instance of this class should be passed to the run() function
			 * defined in Stedb_Forms_Wordpress_Loader as all of the hooks are defined
			 * in that particular class.
			 *
			 * The Stedb_Forms_Wordpress_Loader will then create the relationship
			 * between the defined hooks and the functions defined in this
			 * class.
			 */
			wp_enqueue_script( 'ste-backend', plugins_url( '/js/ste-backend.js', __FILE__ ), '', '0.1', true );
			wp_register_script( 'ste-ckeditor', 'https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js', '', '0.1', false );
			wp_register_script( 'ste-email-backend', plugins_url( '/js/ste-email-backend.js', __FILE__ ), '', '0.1', true );
			$stedata = array(
				'ajax_url'   => admin_url( 'admin-ajax.php' ),
				'site_url'   => site_url(),
				'plugin_url' => plugins_url(),
				'nonce'      => wp_create_nonce( 'ajax-nonce' ),

			);
			wp_localize_script( 'ste-backend', 'ste', $stedata );
			wp_localize_script( 'ste-email-backend', 'ste_email', $stedata );
			// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/stedb-forms-wordpress-admin.js', array( 'jquery' ), $this->version, false );

		}



		public function ste_admin_menu() {

			/*adding main admin menu*/
			add_menu_page( 'STE Form', 'STEdb Forms', 'manage_options', 'ste-form-builder', array( $this, 'ste_form_admin_page' ) );

			/*adding submenu*/
			add_submenu_page( 'ste-form-builder', 'Send Email', 'Send Email', 'manage_options', 'ste-send-email-template', array( $this, 'ste_send_email_page' ) );

			/*adding submenu*/
			add_submenu_page( 'ste-form-builder', 'Report', 'Report', 'manage_options', 'ste-report-template', array( $this, 'ste_report_page' ) );
		}

		public function ste_form_admin_page() {

			wp_enqueue_style( 'ste_jquery-ui' );

			wp_enqueue_script( 'jquery-ui-draggable' );
			wp_enqueue_script( 'jquery-ui-sortable' );

			wp_enqueue_style( 'ste_css' );
			wp_enqueue_script( 'ste-backend' );
			//wp_enqueue_script('jquery-ui-core');

			//wp_enqueue_script('jquery-ui-core');

			/*adding top bar*/
			$this->ste_top_bar();
			$this->ste_form_builder();
			$this->ste_footer();
		}

		public function ste_send_email_page() {
			wp_enqueue_style( 'ste_css' );
			// wp_enqueue_script('ste-backend');
			wp_enqueue_script( 'ste-email-backend' );
			wp_enqueue_script( 'ste-ckeditor' );

			$this->ste_top_bar();
			$this->ste_send_email();
			$this->ste_footer();
		}

		public function ste_report_page() {
			wp_enqueue_style( 'ste_css' );

			$this->ste_top_bar();
			$this->ste_report();
			$this->ste_footer();
		}
		/**
		 * [ste_top_bar description]
		 * html template for top header
		 * @return [type] [description]
		 */
		public function ste_top_bar() {

			$ste_top_bar = sanitize_file_name( 'ste-top-bar' );
			require_once 'template/' . $ste_top_bar . '.php';
		}
		/**
		 * [ste_form_builder description]
		 * Html template for the form builder page.
		 * @return [type] [description]
		 */
		public function ste_form_builder() {
			$ste_form_builder = sanitize_file_name( 'ste-form-builder' );
			require_once 'template/' . $ste_form_builder . '.php';
		}
		public function ste_send_email() {
			$ste_send_email = sanitize_file_name( 'ste-send-email' );
			require_once 'template/' . $ste_send_email . '.php';
		}
		public function ste_report() {
			$ste_report = sanitize_file_name( 'ste-report' );
			require_once 'template/' . $ste_report . '.php';
		}

		/**
		 * [ste_footer description]
		 * HTML template for the footer
		 * @return [type] [description]
		 */
		public function ste_footer() {
			$ste_footer = sanitize_file_name( 'ste-footer' );
			require_once 'template/' . $ste_footer . '.php';
		}



		public function ste_plugin_notification() {
			/*
				print_r($_GET);
				if ( isset( $_GET['setdb_error'] ) ) {
					echo '<div class="error"><p>'.$_GET['error_message'].'</div>';
			}*/
		}



		/**********************************************************
							Admin Ajax function
		***********************************************************/
		public function ste_create_form_builder_data() {
			global $wpdb;
			$table = 'stedb_form_builder_data';
			$user  = wp_get_current_user();
			
			// Check for nonce security
			$nonce = $_POST['nonce'];

			if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) ) {
				die( 'Busted!' );
			}

			die( print_r( $_POST, true ) );
			if ( isset( $_POST['_wpnonce'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'stedb_form_builder_' . date( 'h' ) ) ) {
				die( 'yes' );
				$data = array(
					'user_id'        => $user->ID ? $user->ID : '',
					'form_name'      => sanitize_text_field( $_POST['form_name'] ),
					'receiver'       => sanitize_email( $_POST['receiver'] ),
					'html_code'      => $_POST['html_code'],
					'full_html_code' => $_POST['full_html_code'],
					'field_detail'   => json_encode( $_POST['field_detail_array'] ),
					'creation_date'  => date( 'Y-m-d' ),
				);
			}
			$to                      = $_POST['receiver'];
			$user_id                 = get_option( 'stedb_user_id' );
			$secret                  = get_option( 'stedb_secret' );
			$base_url                = get_option( 'stedb_base_url' );
			$stedb_obj               = new STEDB_Account();
			$create_form_list_output = $stedb_obj->stedb_create_form_list( $user_id, $secret, $base_url, $data );
			// if(!get_option('stedb_gmail') && !get_option('stedb_yahoo') && !get_option('stedb_linkedin')) {
			$social_links                 = [];
			$get_sm_providers_urls_output = $stedb_obj->stedb_get_social_providers_urls( $user_id, $secret, $base_url, $create_form_list_output );
			if ( ! empty( $get_sm_providers_urls_output ) ) {
				foreach ( $get_sm_providers_urls_output->data as $get_sm_providers_urls ) {
					if ( 'Google' === $get_sm_providers_urls->sm_name ) {
						$social_links['stedb_gmail'] = $get_sm_providers_urls->sm_url;
						// add_option( 'stedb_gmail', $get_sm_providers_urls->sm_url);
					}
					if ( 'Yahoo' === $get_sm_providers_urls->sm_name ) {
						$social_links['stedb_yahoo'] = $get_sm_providers_urls->sm_url;
						// add_option( 'stedb_yahoo', $get_sm_providers_urls->sm_url);
					}
					if ( 'LinkedIn' === $get_sm_providers_urls->sm_name ) {
						$social_links['stedb_linkedin'] = $get_sm_providers_urls->sm_url;
						// add_option( 'stedb_linkedin', $get_sm_providers_urls->sm_url);
					}
				}
			}
			$social_link = wp_wp_json_encode( $social_links );
			// }
			if ( ! empty( $create_form_list_output ) && ! empty( $social_link ) ) {
				$create_list_data = array(
					'form_name'        => sanitize_text_field( $_POST['form_name'] ),
					'form_id'          => $create_form_list_output,
					'form_social_link' => $social_link,
				);
				// print_r($create_form_list_output);
				// die();
				$output = $stedb_obj->stedb_create_custom_field( $user_id, $secret, $base_url, $data );
				if ( ! empty( $output ) ) {
					$data['stedb_form_id'] = $output;
				}
				$wpdb->insert( 'stedb_form_list', $create_list_data );
				$create_list_id     = $wpdb->insert_id;
				$create_list_detail = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM `stedb_form_list` WHERE create_list_id = %d', $create_list_id ) );
				$stedb_obj->stedb_get_list_information( $user_id, $secret, $base_url, $create_list_detail[0]->form_id );
				$wpdb->insert( $table, $data );
				$lastid = $wpdb->insert_id;
			}
			$get_user_detail   = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM $table WHERE user_id = $user->ID ORDER BY form_id DESC' ) );
			$shortcode_main_id = $create_list_detail[0]->form_id;
			$shortcode         = "[STE_db_form id='" . $lastid . "' list-id='" . $create_form_list_output . "']";
			// $shortcode = "[STE_db_form id='".$lastid."']";
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
		/**********update form field in api **********/
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
		/*******************************/
		public function ste_update_form_builder_data() {
			global $wpdb;
			die( print_r( $_POST, true ) );
			$table  = 'stedb_form_builder_data';
			$filter = $_POST['filter']; // $_FILTER('INPUT_POST', 'filter');
			if ( 'move_to_trash' === $filter ) {
				$data = array(
					'is_deleted' => 1,
				);
			} elseif ( 'restore' === $filter ) {
				$data = array(
					'is_deleted' => 0,
				);
			} else {
				$data = array(
					'form_name'      => sanitize_text_field( $_POST['form_name'] ),
					'receiver'       => sanitize_email( $_POST['receiver'] ),
					'html_code'      => $_POST['html_code'],
					'full_html_code' => $_POST['full_html_code'],
					'field_detail'   => wp_wp_json_encode( $_POST['field_detail_array'] ),
				);
			}
			$form_id = $_POST['form_id'];

			if ( is_array( $form_id ) ) {
				foreach ( $form_id as $id ) {
					$da = $this->ste_update_form_field_api_data( $id, $data );
					if ( ! empty( $da ) ) {
						$data['stedb_form_id'] = $da;
						$wpdb->update( $table, $data, array( 'form_id' => $id ) );
					}
				}
			} else {
				$da = $this->ste_update_form_field_api_data( $id, $data );
				if ( ! empty( $da ) ) {
					$data['stedb_form_id'] = $da;
					$wpdb->update( $table, $data, array( 'form_id' => $form_id ) );
				}
			}
			echo wp_json_encode( array( 'success' => true ) );
			die;
		}
		public function ste_get_edit_form_data() {
			global $wpdb;
			$user    = wp_get_current_user();
			$form_id = $_POST['form_id'];
			print_r( $_POST );
			die;
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
		}
		public function ste_get_form_data() {
			global $wpdb;
			$user    = wp_get_current_user();
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
		public function ste_delete_form_builder_data() {
			global $wpdb;
			$user    = wp_get_current_user();
			$table   = 'stedb_form_builder_data';
			$form_id = $_POST['form_id'];
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

		public function ste_set_email_draft() {
			global $wpdb;
			$table         = 'stedb_send_email_entries';
			$user          = wp_get_current_user();
			$email_message = str_replace( '\\', '', $_POST['email_message'] );
			$data          = array(
				'from_name'    => sanitize_text_field( $_POST['from_name'] ),
				'main_form_id' => $_POST['form_id'],
				'subject'      => sanitize_text_field( $_POST['email_subject'] ),
				'content'      => $email_message,
				// 'content' => $_POST['email_message'],
				'status'       => $_POST['email_status'],
				'type'         => $_POST['email_type'],
			);

			$user_id     = get_option( 'stedb_user_id' );
			$secret      = get_option( 'stedb_secret' );
			$base_url    = get_option( 'stedb_base_url' );
			$stedb_obj   = new STEDB_Account();
			$list_id     = $_POST['list_id'];
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
				$data['list_id']           = $_POST['list_id'];
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
		public function stedb_create_campaign() {
			global $wpdb;
			$table         = 'stedb_send_email_entries';
			$user          = wp_get_current_user();
			$email_message = str_replace( '\\', '', $_POST['email_message'] );
			$data          = array(
				// 'content' => $_POST['email_content'],
				'content'      => $email_message,
				'main_form_id' => $_POST['form_id'],
				'from_name'    => sanitize_text_field( $_POST['from_name'] ),
				'subject'      => sanitize_text_field( $_POST['email_subject'] ),
				'status'       => $_POST['email_status'],
				'type'         => $_POST['email_type'],
			);
			$list_id       = $_POST['list_id'];
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
				$data['list_id']           = $_POST['list_id'];
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
		public function ste_send_regular_email() {
			global $wpdb;
			$table         = 'stedb_send_email_entries';
			$user          = wp_get_current_user();
			$email_message = str_replace( '\\', '', $_POST['email_message'] );
			$data          = array(
				'from_name'    => sanitize_text_field( $_POST['from_name'] ),
				'main_form_id' => $_POST['form_id'],
				'subject'      => sanitize_text_field( $_POST['email_subject'] ),
				// 'content' => $_POST['email_message'],
				'content'      => $email_message,
				'type'         => $_POST['email_type'],
				'status'       => $_POST['email_status'],
			);
			$list_id       = $_POST['list_id'];
			$user_id       = get_option( 'stedb_user_id' );
			$secret        = get_option( 'stedb_secret' );
			$base_url      = get_option( 'stedb_base_url' );
			$stedb_obj     = new STEDB_Account();
			$get_list_id   = $wpdb->get_results( $wpdb->prepare( 'SELECT list_id FROM stedb_send_email_entries WHERE list_id = %d', $list_id ) );

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
				$data['list_id']           = $_POST['list_id'];
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
		public function ste_get_email_data() {
			global $wpdb;
			$list_id        = $_POST['list_id'];
			$get_email_data = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM stedb_send_email_entries WHERE list_id = %d', $list_id ) );
			echo wp_json_encode(
				array(
					'success' => true,
					'result'  => $get_email_data,
				)
			);
			die;
		}
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
		public function ste_save_form_data() {
			$form_data   = wp_json_encode( stripslashes( $_POST['form_data'] ) );
			$form_data   = json_decode( json_decode( $form_data, true ), true );
			$insert_data = array();
			global $wpdb;
			$form_id          = $_POST['form_id'];
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

			$form_data_arr = $this->stedb_remove_element_with_value( $form_data_array );
			$new_arr       = array_combine( $api_field_id, $form_data_arr );

			// $_SESSION['form_data_array'] = $form_data_array;
			$_SESSION['form_data_array'] = $new_arr;
			if ( $result > 0 ) {
				echo wp_json_encode( array( 'success' => true ) );
				die;
			}
		}


	}

}

