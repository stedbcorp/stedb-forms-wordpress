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
			add_action( 'wp_head', array( $this, 'ste_api_request_callback' ) );
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
			$html = '<form method="post" action="" id="front_end_form" class="ste-col-60">' .
			        $this->ste_api_request_get_infos() .
			        $this->ste_api_request_get_errors() .
					'<div class="form-group">' .
					'</div>' .
					'<input type="hidden" value="' . esc_attr( $get_form_detail[0]->form_id ) . '" class="form_id">' .
					wp_nonce_field(  -1,  '_wpnonce',  true, false ).
					$html_code .
				'</form>';
			$html .= '
				<script type="text/javascript">
					var site_url = "' . esc_js( get_option( 'siteurl' ) ) . '";
					var page_id = "' . esc_js( get_the_ID() ) . '";
					var page_link = "' . esc_js( get_permalink( get_the_ID() ) ) . '";					
				</script>';
			return $html;
		}

		/**
		 * get request infos
		 * @return false|string|void
		 */
		public function ste_api_request_get_infos() {
			global $stedb_form;

			if ( ! isset( $stedb_form['infos'] ) ) {
				return;
			}

			/** @var array $infos */
			$infos = $stedb_form['infos'];

			ob_start();

			if ( ! empty( $infos ) ) :
				foreach ( $infos as $info ) :
					?>
                    <div class="ste-alert ste-alert-success" role="alert">
                        <strong><?php _e( 'Info', 'ste-social-form-builder' ); ?>!</strong>
						<?php echo $info; ?>
                    </div>
				<?php
				endforeach;
			endif;

			$output = ob_get_clean();

			return $output;
		}

		/**
		 * get request errors
		 * @return false|string|void
		 */
		public function ste_api_request_get_errors() {
			global $stedb_form;

			if ( ! isset( $stedb_form['errors'] ) ) {
				return;
			}

			if ( ! is_a( $stedb_form['errors'], 'WP_Error' ) ) {
				return;
	}

			/** @var WP_Error $errors */
			$errors = $stedb_form['errors'];

			ob_start();

			if ( ! empty( $errors->get_error_codes() ) ) :
				foreach ( $errors->get_error_messages() as $error_message ) :
					?>
                    <div class="ste-alert ste-alert-danger" role="alert">
                        <strong><?php _e( 'Error', 'ste-social-form-builder' ); ?>!</strong>
						<?php echo $error_message; ?>
                    </div>
				<?php
				endforeach;
			endif;

			$output = ob_get_clean();

			return $output;
}

		/**
		 * API request callback
		 */
		public function ste_api_request_callback() {
			global $wpdb;
			global $stedb_form;

			if ( 'POST' !== $_SERVER['REQUEST_METHOD'] ) {
				return;
			}

			$request_args = wp_unslash( $_REQUEST );

			/**
			 * Errors
			 * @var WP_Error $errors
			 */
			$stedb_form['errors'] = new WP_Error();

			/**
			 * Infos
			 */
			$stedb_form['infos'] = array();

			/** check token */
			if ( ! isset( $request_args['token'] ) ) {
				$stedb_form['errors']->add( 'not_isset_token', __( 'The token is missing.', 'ste-social-form-builder' ) );

				return;
			}

			/** check email */
			if ( ! isset( $request_args['email'] ) ) {
				$stedb_form['errors']->add( 'not_isset_email', __( 'The email is missing.', 'ste-social-form-builder' ) );

				return;
			}

			$email = sanitize_email( $request_args['email'] );

			/** validate email */
			if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
				$stedb_form['errors']->add( 'not_valid_email', __( 'The email is invalid.', 'ste-social-form-builder' ) );

				return;
			}

			/** check form_hash */
			if ( ! isset( $request_args['form_hash'] ) ) {
				$stedb_form['errors']->add( 'not_isset_form_hash', __( 'The form hash is missing.', 'ste-social-form-builder' ) );

				return;
			}

			$get_form_entry_detail_temp = $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM stedb_form_entries_temp WHERE form_hash = %s LIMIT 1', $request_args['form_hash'] ), ARRAY_A );

			/** validate token */
			if ( $request_args['token'] !== hash_hmac( 'SHA256', $get_form_entry_detail_temp['token'] . "|" . $request_args['email'], get_option( 'stedb_secret' ) ) ) {
				$stedb_form['errors']->add( 'not_valid_token', __( 'The token is invalid.', 'ste-social-form-builder' ) );

				return;
			}

			/** check form id in session */
			if ( ! isset( $get_form_entry_detail_temp['form_id'] ) ) {
				$stedb_form['errors']->add( 'not_isset_session_form_id', __( 'The form id is missing.', 'ste-social-form-builder' ) );

				return;
			}

			$get_form_detail      = $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM stedb_form_builder_data WHERE form_id = %d LIMIT 1', absint( $get_form_entry_detail_temp['form_id'] ) ), ARRAY_A );
			$get_form_list_detail = $wpdb->get_row( $wpdb->prepare( 'SELECT `form_id` FROM `stedb_form_list` WHERE id = %d LIMIT 1', $get_form_detail['form_id'] ), ARRAY_A );

			/** validate form */
			if ( empty( $get_form_detail ) || empty( $get_form_list_detail ) ) {
				$stedb_form['errors']->add( 'empty_wpdb_form', __( 'The form is invalid.', 'ste-social-form-builder' ) );

				return;
			}

			/** save entries in wpdb */
			$max_entry_id = 1;

			/** max id from wpdb */
			if ( $get_wpdb_max_entry_id = $wpdb->get_var( $wpdb->prepare( 'SELECT MAX(entry_id) FROM stedb_form_entries WHERE form_id = %d', $get_form_detail['form_id'] ) ) ) {
				$max_entry_id = intval( $get_wpdb_max_entry_id ) + 1;
			}

			/** save form data */
			foreach ( json_decode( $get_form_entry_detail_temp['data'], true ) as $form_data_key => $form_data_value ) {
				$wpdb->insert( 'stedb_form_entries', array(
					'form_id'     => absint( $get_form_detail['form_id'] ),
					'entry_id'    => absint( $max_entry_id ),
					'field_key'   => sanitize_text_field( $form_data_key ),
					'field_value' => $form_data_value
				), array( '%d', '%d', '%s', '%s' ) );
			}

			/** save email */
			$wpdb->insert( 'stedb_form_entries', array(
				'form_id'     => absint( $get_form_detail['form_id'] ),
				'entry_id'    => absint( $max_entry_id ),
				'field_key'   => 'email',
				'field_value' => $email
			), array( '%d', '%d', '%s', '%s' ) );
			
			/** delete temp */
			$wpdb->delete( 'stedb_form_entries_temp', array( 'form_hash' => $request_args['form_hash'] ) );

			/** save subscriber in api */
			$form_data = array(
				'email'         => $email,
				'list_id'       => $get_form_list_detail['form_id'],
				'custom_fields' => wp_json_encode( array_combine( explode( ',', $get_form_detail['stedb_form_id'] ), json_decode( $get_form_entry_detail_temp['data'], true ) ) ),
			);

			$user_id  = get_option( 'stedb_user_id' );
			$secret   = get_option( 'stedb_secret' );
			$base_url = get_option( 'stedb_base_url' );

			$stedb_public = new STEDB_Account();

			if ( $stedb_public->stedb_save_subscriber( $user_id, $secret, $base_url, $form_data ) ) {
				$stedb_form['infos'][] = __( 'Thanks for contacting us! We will get in touch with you shortly.', 'ste-social-form-builder' );
			}
		}
	}
}
