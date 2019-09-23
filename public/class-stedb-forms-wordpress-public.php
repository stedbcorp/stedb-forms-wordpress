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
	class Stedb_Forms_Wordpress_Public {

		public function __construct() {
			/************ short code ************/
			add_shortcode( 'STE_db_form', array( $this, 'ste_get_shortcode' ) );
			/*************** public style & script************/
			add_action( 'wp_enqueue_scripts', array( $this, 'ste_enqueue_style' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'ste_enqueue_script' ) );
		}

		public function ste_enqueue_style() {
			wp_enqueue_style( 'ste_public_css', plugins_url( '/css/ste-style.css', __FILE__ ), '', '0.1' );
			// wp_enqueue_style('ste_public_bootstrap_css',plugins_url( '/css/bootstrap.min.css', __FILE__  ) , '', '0.1' );
			wp_enqueue_style( 'ste_public_font-awesome_css', plugins_url( '/css/font-awesome.min.css', __FILE__ ), '', '0.1' );
		}
		public function ste_enqueue_script() {
			wp_enqueue_script( 'ste-public', plugins_url( '/js/ste-public.js', __FILE__ ), array( 'jquery' ), '0.1', true );
			// Localize script
			$stedata = array(
				'ajax_url'   => admin_url( 'admin-ajax.php' ),
				'site_url'   => site_url(),
				'plugin_url' => stedb_plugin_url(),

			);
			wp_localize_script( 'ste-public', 'ste', $stedata );
		}
		public function ste_get_shortcode( $atts ) {
			// wp_enqueue_style('ste_public_css');

			global $wpdb;
			$form_id          = $atts['id'];
			$list_id          = $atts['list-id'];
			$get_form_detail  = $wpdb->get_results( "SELECT * FROM stedb_form_builder_data WHERE form_id = $form_id" );
			$get_social_links = $wpdb->get_results( "SELECT `form_social_link` FROM stedb_form_list WHERE form_id = $list_id" );

			$api_field_ids                 = $get_form_detail[0]->stedb_form_id;
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
				// $html_code = str_replace("s_yahoo",get_option('stedb_yahoo'),$html_code);
				$html_code = str_replace( 's_yahoo', $social_stedb_yahoo, $html_code );
				$html_code = str_replace( 'social-yahoo', 'href', $html_code );
			}
			if ( $check_position_social_gmail ) {
				// $html_code = str_replace("s_gmail",get_option('stedb_gmail'),$html_code);
				$html_code = str_replace( 's_gmail', $social_stedb_gmail, $html_code );
				$html_code = str_replace( 'social-gmail', 'href', $html_code );
			}
			if ( $check_positionsocial_linkedin ) {
				// $html_code = str_replace("s_linkedin",get_option('stedb_linkedin'),$html_code);
				$html_code = str_replace( 's_linkedin', $social_stedb_linkedin, $html_code );
				$html_code = str_replace( 'social-linkedin', 'href', $html_code );
			}

			if ( isset( $get_form_detail ) && $get_form_detail ) {
				if ( isset( $_REQUEST['email'] ) && $_REQUEST['email'] ) {
					$form_data = array(
						'email'         => $_REQUEST['email'],
						'list_id'       => $list_id,
						'custom_fileds' => json_encode( $_SESSION['form_data_array'] ),
					);

					session_destroy();
					$userId       = get_option( 'stedb_user_id' );
					$secret       = get_option( 'stedb_secret' );
					$baseUrl      = get_option( 'stedb_baseUrl' );
					$stedb_public = new STEDB_Account();
					$output       = $stedb_public->stedb_save_subscriber( $userId, $secret, $baseUrl, $form_data );
					//echo $output. '</br>';
					//print_r($_REQUEST['email']);

					echo '<div class="thank-you-message">Thanks for contacting us! We will get in touch with you shortly.</div>';
					die;
				}
			}
			$html = '<form method="post" action="" id="front_end_form" class="ste-col-60">' .
					'<div class="form-group">' .
						/* '<h3 class="">'. ucfirst($get_form_detail[0]->form_name)
						.'</h3>'. */
					'</div>' .
					'<input type="hidden" value="' . esc_attr( $get_form_detail[0]->form_id ) . '" class="form_id">' .
					$html_code .
					/* '<div class="form-group">'.
					'<input type="button" name="submit" class="btn btn-primary form_save" data-form_id="<?=$get_form_detail[0]->form_id;?>" value="Submit">'.
					'</div>'.*/
				'</form>';
			$html .= '
				<script type="text/javascript">
					var site_url = "' . esc_js( get_option( 'siteurl' ) ) . '";
					var page_id = "' . esc_js( get_the_ID() ) . '";
					var page_link = "' . esc_js( get_page_link( 'page_id' ) ) . '";					
				</script>';
			return $html;
		}

	}

}

