<?php
if ( ! function_exists( 'wp_get_current_user' ) ) {
	include ABSPATH . 'wp-includes/pluggable.php';
}
class STEDB_Api_Client {

	private $baseUrl = '';
	private $userId  = '';
	private $secret  = '';

	public function __construct( $userId, $secret, $url ) {
		$this->userId  = $userId;
		$this->secret  = $secret;
		$this->baseUrl = $url;
	}

	public function ste_sendRequest( $path, $method = 'GET', $data = array() ) {
		$url    = $this->baseUrl . $path;
		$method = strtoupper( $method );
		$stamp  = date( 'c', time() );
		$header = array(
			'X-Auth-UserId'    => $this->userId,
			'X-Auth-Time'      => $stamp,
			'X-Auth-Signature' => hash_hmac( 'SHA256', $this->secret, $this->userId . ':' . $stamp ),
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
		 $pload    = array(
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

