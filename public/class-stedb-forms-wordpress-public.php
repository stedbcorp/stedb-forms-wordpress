<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://stedb.com
 * @since      1.0.0
 *
 * @package    Stedb_Forms_Wordpress
 * @subpackage Stedb_Forms_Wordpress/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Stedb_Forms_Wordpress
 * @subpackage Stedb_Forms_Wordpress/public
 * @author     STEdb <info@stedb.com>
 */
if ( ! class_exists( 'Stedb_Forms_Wordpress_Public' ) ) {
	/**
	 * [STEDB_Forms_WordPress_Public description]
	 * html template for main class
	 */
	class Stedb_Forms_WordPress_Public {
		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 */
		public function __construct() {
			/************ Short code */
			add_shortcode( 'stedb_form', array( $this, 'ste_get_shortcode' ) );
			/*************** Public style & script*/
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_style' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_script' ) );
		}
		/**
		 * Register the JavaScript for the admin area.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_style() {
			wp_enqueue_style( 'ste_public_css', plugins_url( '/css/ste-style.css', __FILE__ ), 'rand(111,9999)', '0.1' );
			wp_enqueue_style( 'ste_public_font-awesome_css', plugins_url( '/css/font-awesome.min.css', __FILE__ ), '', '0.1' );
		}
		/**
		 * Register the JavaScript for the admin area.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_script() {
			wp_enqueue_script( 'ste-public', plugins_url( '/js/ste-public.js', __FILE__ ), array( 'jquery' ), '0.1', 'rand(111,9999)', true );
			// Localize script.
			$stedata = array(
				'ajax_url'   => admin_url( 'admin-ajax.php' ),
				'site_url'   => site_url(),
				'plugin_url' => stedb_plugin_url(),
				'nonce'      => wp_create_nonce( 'ajax-nonce' ),
			);
			wp_localize_script( 'ste-public', 'ste', $stedata );
		}
		/**
		 * [ste_get_shortcode description]
		 * html template shortcode
		 *
		 * @param atts $atts attribute.
		 */
		public function ste_get_shortcode( $atts ) {

			global $wpdb;
			$form_id                       = $atts['id'];
			$list_id                       = $atts['list-id'];
			$get_form_detail               = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM stedb_form_builder_data WHERE form_id = %d', $form_id ) );
			$get_social_links              = $wpdb->get_results( $wpdb->prepare( 'SELECT `form_social_link` FROM stedb_form_list WHERE form_id = %d', $list_id ) );
			$api_field_ids                 = $get_form_detail[0]->form_id;
			$api_field_id                  = explode( ',', $api_field_ids );
			$get_social_link               = $get_social_links[0]->form_social_link;
			$social_link                   = json_decode( $get_social_link );
			$social_stedb_gmail            = $social_link->stedb_gmail;
			$social_stedb_yahoo            = $social_link->stedb_yahoo;
			$social_stedb_linkedin         = $social_link->stedb_linkedin;
			$html_code                     = stripslashes( $get_form_detail[0]->html_code );
			$check_position_social_yahoo   = strpos( $html_code, 'social-yahoo' );
			$check_position_social_gmail   = strpos( $html_code, 'social-gmail' );
			$check_positionsocial_linkedin = strpos( $html_code, 'social-linkedin' );
			if ( $check_position_social_yahoo ) {
				$html_code = str_replace( 's_yahoo', $social_stedb_yahoo, $html_code );
				$html_code = str_replace( 'social-yahoo', 'href', $html_code );
			}
			if ( $check_position_social_gmail ) {
				$html_code = str_replace( 's_gmail', $social_stedb_gmail, $html_code );
				$html_code = str_replace( 'social-gmail', 'href', $html_code );
			}
			if ( $check_positionsocial_linkedin ) {
				$html_code = str_replace( 's_linkedin', $social_stedb_linkedin, $html_code );
				$html_code = str_replace( 'social-linkedin', 'href', $html_code );
			}
			$request_args = wp_unslash( $_REQUEST );
			if ( isset( $request_args['_wpnonce'] ) ) {
				$nonce = sanitize_text_field( $request_args );
			}

			if ( isset( $get_form_detail ) && isset( $_SESSION['form_data_array'] ) ) {
				if ( isset( $request_args['email'] ) ) {
					$email = sanitize_email( $request_args['email'] );
					if ( null !== ( sanitize_email( $email ) ) && $email ) {
						$form_data = array(
							'email'         => $email,
							'list_id'       => $list_id,
							'custom_fields' => wp_json_encode( $_SESSION['form_data_array'] ),
						);
					}
					$user_id      = get_option( 'stedb_user_id' );
					$secret       = get_option( 'stedb_secret' );
					$base_url     = get_option( 'stedb_base_url' );
					$stedb_public = new STEDB_Account();
					$output       = $stedb_public->stedb_save_subscriber( $user_id, $secret, $base_url, $form_data );
					unset( $_SESSION['form_data_array'] );
					$html =  '<div class = "thank-you-message">Thanks for contacting us! We will get in touch with you shortly.</div>';

				}
			} else {
				$html = '<form method="post" action="" id="front_end_form" class="ste-col-60">' .
					'<div class="form-group">' .
					'</div>' .
					'<input type="hidden" value="' . esc_attr( $get_form_detail[0]->form_id ) . '" class="form_id">' .
					wp_nonce_field(  -1,  '_wpnonce',  true, false ).
					$html_code .
				'</form>';
			}
			$html .= '
				<script type="text/javascript">
					var site_url = "' . esc_js( get_option( 'siteurl' ) ) . '";
					var page_id = "' . esc_js( get_the_ID() ) . '";
					var page_link = "' . esc_js( get_permalink( get_the_ID() ) ) . '";					
				</script>';
			return $html;
		}

	}

}

