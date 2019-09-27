<?php
	/**
	 * The admin-specific functionality of the plugin.
	 *
	 * @link       https://stedb.com
	 * @since      1.0.0
	 *
	 * @package    class-stedb-api-client.php
	 * @subpackage class-stedb-api-client/includes
	 */

if ( ! function_exists( 'wp_get_current_user' ) ) {
	include ABSPATH . 'wp-includes/pluggable.php';
}
	/**
	 * [class-stedb-api-client description]
	 * html template for main class
	 */
class STEDB_Api_Client {

	private $base_url = '';
	private $user_id  = '';
	private $secret   = '';
	/**
	 * [__construct description]
	 * HTML template contructor
	 *
	 * @param user_id $user_id get user_id.
	 * @param secret  $secret get secret.
	 *  @param url     $url get url.
	 */
	public function __construct( $user_id, $secret, $url ) {
		$this->user_id  = $user_id;
		$this->secret   = $secret;
		$this->base_url = $url;
	}
	/**
	 * [stedb_create_custom_field description]
	 * HTML template for creating custom field
	 *
	 * @param path   $path get user_id.
	 * @param method $method get secret.
	 *  @param data   $data get url.
	 */
	public function ste_send_request( $path, $method = 'GET', $data = array() ) {
		$url    = $this->base_url . $path;
		$method = strtoupper( $method );
		$stamp  = date( 'c', time() );
		$header = array(
			'X-Auth-user_id'   => $this->user_id,
			'X-Auth-Time'      => $stamp,
			'X-Auth-Signature' => hash_hmac( 'SHA256', $this->secret, $this->user_id . ':' . $stamp ),
		);

		switch ( $method ) {

			case 'POST':
				break;
			case 'PUT':
				break;
			case 'DELETE':
				break;
			default:
				if ( ! empty( $data ) ) {
					$url .= '?' . http_build_query( $data );
				}
		}
		$pload = array(
			'method'      => $method,
			'timeout'     => 60,
			'redirection' => 5,
			'httpversion' => '1.0',
			'sslverify'   => false,
			'blocking'    => true,
			'headers'     => $header,
			'body'        => $data,
			'cookies'     => array(),
		);

		$response = wp_remote_request( $url, $pload );

		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			echo sprintf( 'Something went wrong: %s', esc_html( $error_message ) );

			$body  = $error_message;
			$error = '';
		} else {
			$error_message = '';
			$body          = $response['body'];

		}
		$retval       = new stdClass();
		$retval->data = json_decode( $body );
		$args         = array(
			'header'   => $header,
			'data'     => $data,
			'output'   => $retval,
			'curl_err' => $error_message,
		);

			write_log( print_r( $args, true ) );
			return $retval;
	}
}

