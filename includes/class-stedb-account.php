<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://stedb.com
 * @since      1.0.0
 *
 * @package    class-stedb-account.php
 * @subpackage class-stedb-account/includes
 */

/**
 * [STEDB_STEDB_Account description]
 * html template for main class
 */
class STEDB_Account {

	/**
	 * [stedb_registration description]
	 * HTML template for registration
	 */
	public function stedb_registration() {
		if ( empty( get_option( 'stedb_user_id' ) ) && empty( get_option( 'stedb_secret' ) ) && empty( get_option( 'stedb_base_url' ) ) ) {
			return $this->stedb_create_registration();
		}
	}
	/**
	 * [stedb_create_registration description]
	 * Reponsible for sending registration request to STEDB API.
	 */
	public function stedb_create_registration() {
		global $wpdb;
		$user     = wp_get_current_user();
		$base_url = 'https://opt4.stedb.com/crm';
		$data     = array(
			'email'  => $user->user_email,
			'domain' => get_option( 'siteurl' ),
		);
		$user_id  = '';
		$secret   = '';
		$client   = new STEDB_Api_Client( $user_id, $secret, $base_url );
		$output   = $client->ste_send_request( '/account/create', 'POST', $data );
		if ( ! isset( $output->data->error ) ) {
			$user_id  = $output->data->user_id;
			$secret   = $output->data->secret;
			$base_url = $output->data->base_url;

			if ( ! empty( $user_id ) && ! empty( $secret ) && ! empty( $base_url ) ) {
				add_option( 'stedb_user_id', $user_id );
				add_option( 'stedb_secret', $secret );
				add_option( 'stedb_base_url', $base_url );
			}
		}
		return $output;
	}

	/**
	 * [stedb_remove_element_with_value description]
	 * Responsible to remove element with value
	 *
	 * @param array $array get array value.
	 * @param key   $key get key value.
	 */
	public function stedb_remove_element_with_value( $array, $key ) {
		foreach ( $array as $sub_key => $sub_array ) {
			if ( 'social_gmail' == $sub_array[ $key ] ) {
				unset( $array[ $sub_key ] );
			}
			if ( 'social_yahoo' == $sub_array[ $key ] ) {
				unset( $array[ $sub_key ] );
			}
			if ( 'social_linkedin' == $sub_array[ $key ] ) {
				unset( $array[ $sub_key ] );
			}
		}
		return $array;
	}
	/**
	 * [stedb_create_custom_field description]
	 * HTML template for creating custom field
	 *
	 * @param user_id   $user_id get user_id.
	 * @param secret    $secret get secret.
	 * @param base_url  $base_url get base_url.
	 * @param list_data $list_data get list_data.
	 */
	public function stedb_create_custom_field( $user_id, $secret, $base_url, $list_data ) {
		global $wpdb;
		$get_custom_data = json_decode( $list_data['field_detail'], true );
		$get_custom      = $this->stedb_remove_element_with_value( $get_custom_data, 'field_type' );
		$id_arr          = array();
		foreach ( $get_custom as $key => $value ) {
			if ( 'radio' == $value['field_type'] || 'checkbox' == $value['field_type'] || 'select' == $value['field_type'] ) {
				$default_vale = wp_json_encode( $value['default_value'] );
			} else {

				$default_vale = $value['default_value'];
			}
			$data         = array(
				'field_name'    => $value['field_name'],
				'field_type'    => $value['field_type'],
				'default_value' => $default_vale,
			);
			$custom_field = new STEDB_Api_Client( $user_id, $secret, $base_url );
			$output       = $custom_field->ste_send_request( 'fields/', 'POST', $data );
			$id           = $output->data->id;
			$this->stedb_get_custom_field_information( $user_id, $secret, $base_url, $id );
			$id_arr[] = $id;
		}
		$output_id = implode( ',', $id_arr );
		return $output_id;
	}

	/**
	 * [stedb_update_custom_field description]
	 * HTML template for update custom field
	 *
	 * @param user_id   $user_id get user_id.
	 * @param secret    $secret get secret.
	 *  @param base_url  $base_url get base_url.
	 * @param list_data $list_data get list_data.
	 * @param id        $id get id.
	 * @param field_ids $field_ids get field_ids.
	 */
	public function stedb_update_custom_field( $user_id, $secret, $base_url, $list_data, $id, $field_ids ) {
		global $wpdb;
		$del_ids = explode( ',', $field_ids );
		foreach ( $del_ids as  $del_id ) {
			$output_del[] = $this->stedb_delete_custom_field( $user_id, $secret, $base_url, $del_id );
		}
		$get_custom_data = json_decode( $list_data['field_detail'], true );
		$get_custom      = $this->stedb_remove_element_with_value( $get_custom_data, 'field_type' );
		$id_arr          = array();
		foreach ( $get_custom as $key => $value ) {
			if ( 'radio' == $value['field_type'] || 'checkbox' == $value['field_type'] || 'select' == $value['field_type'] ) {
				$default_vale = wp_json_encode( $value['default_value'] );
			} else {

				$default_vale = $value['default_value'];
			}
			$data         = array(
				'field_name'    => $value['field_name'],
				'field_type'    => $value['field_type'],
				'default_value' => $default_vale,
			);
			$custom_field = new STEDB_Api_Client( $user_id, $secret, $base_url );
			$output       = $custom_field->ste_send_request( 'fields/', 'POST', $data );
			$id           = $output->data->id;

			$this->stedb_get_custom_field_information( $user_id, $secret, $base_url, $id );
			$id_arr[] = $id;
		}
		$output_id = implode( ',', $id_arr );
		return $output_id;
	}

	/**
	 * [stedb_get_custom_field_information description]
	 * HTML template for custom field info
	 *
	 * @param user_id  $user_id get user_id.
	 * @param secret   $secret get secret.
	 *  @param base_url $base_url get base_url.
	 * @param id       $id get id.
	 */
	public function stedb_get_custom_field_information( $user_id, $secret, $base_url, $id ) {
		global $wpdb;
		$data             = array();
		$get_custom_field = new STEDB_Api_Client( $user_id, $secret, $base_url );
		$output           = $get_custom_field->ste_send_request( 'fields/"' . $id . '"', 'GET', $data );
	}

	/**
	 * [stedb_delete_custom_field description]
	 * HTML template for delete custom field
	 *
	 * @param user_id  $user_id get user_id.
	 * @param secret   $secret get secret.
	 *  @param base_url $base_url get base_url.
	 * @param id       $id get id.
	 */
	public function stedb_delete_custom_field( $user_id, $secret, $base_url, $id ) {
		global $wpdb;
		$data             = array();
		$delete_form_list = new STEDB_Api_Client( $user_id, $secret, $base_url );
		$output           = $delete_form_list->ste_send_request( 'fields/"' . $id . '"', 'DELETE', $data );
	}

	/**
	 * [stedb_update_form_list description]
	 * HTML template for update form list
	 *
	 * @param user_id   $user_id get user_id.
	 * @param secret    $secret get secret.
	 *  @param base_url  $base_url get base_url.
	 * @param list_data $list_data get list_data.
	 */
	public function stedb_update_form_list( $user_id, $secret, $base_url, $list_data ) {

		global $wpdb;
		$list_data = array(
			'id'       => $list_data['form_id'],
			'name' => $list_data['form_name'],
			'receiver'  => $list_data['receiver'],
		);
		$data = json_encode($list_data);
		$update_form_list = new STEDB_Api_Client( $user_id, $secret, $base_url );
		$output           = $update_form_list->ste_send_request( 'lists/' . $list_data['id'] . '', 'PUT', $data );
		$id               = $output->data->id;
		return $id;
	}


	/**
	 * [stedb_create_form_list description]
	 * HTML template for create form list
	 *
	 * @param user_id   $user_id get user_id.
	 * @param secret    $secret get secret.
	 *  @param base_url  $base_url get base_url.
	 * @param list_data $list_data get list_data.
	 */
	public function stedb_create_form_list( $user_id, $secret, $base_url, $list_data ) {

		global $wpdb;
		$data             = array(
			'list_name' => $list_data['form_name'],
			'receiver'  => $list_data['receiver'],
		);
		$create_form_list = new STEDB_Api_Client( $user_id, $secret, $base_url );
		$output           = $create_form_list->ste_send_request( 'lists/', 'POST', $data );
		$id               = $output->data->id;
		return $id;
	}
	/**
	 * [stedb_get_social_providers_urls description]
	 * HTML template to get socials url
	 *
	 * @param user_id  $user_id get user_id.
	 * @param secret   $secret get secret.
	 *  @param base_url $base_url get base_url.
	 * @param listid   $listid get listid.
	 */
	public function stedb_get_social_providers_urls( $user_id, $secret, $base_url, $listid ) {
		global $wpdb;
		$get_social_providers_urls = new STEDB_Api_Client( $user_id, $secret, $base_url );
		$output                    = $get_social_providers_urls->ste_send_request( 'accnt/sm_providers/"' . $listid . '"', 'GET' );
		return $output;
	}

	/**
	 * [stedb_create_campaign description]
	 * HTML template for campaign description
	 *
	 * @param user_id  $user_id get user_id.
	 * @param secret   $secret get secret.
	 *  @param base_url $base_url get base_url.
	 * @param data     $data get data.
	 */
	public function stedb_create_campaign( $user_id, $secret, $base_url, $data ) {
		global $wpdb;

		$create_campaign = new STEDB_Api_Client( $user_id, $secret, $base_url );
		$output          = $create_campaign->ste_send_request( 'campaign', 'POST', $data );
		$id              = $output->data->id;

		return $id;
	}

	/**
	 * [stedb_update_campaign description]
	 * HTML template for update campaign description
	 *
	 * @param user_id  $user_id get user_id.
	 * @param secret   $secret get secret.
	 *  @param base_url $base_url get base_url.
	 * @param data     $data get data.
	 * @param id       $id get data.
	 */
	public function stedb_update_campaign( $user_id, $secret, $base_url, $data, $id ) {
		global $wpdb;
		$update_campaign = new STEDB_Api_Client( $user_id, $secret, $base_url );
		$output          = $update_campaign->ste_send_request( 'campaigns/"' . $id . '"', 'PUT' );
		$id              = $output->data->id;
		return $id;
	}

	/**
	 * [stedb_save_subscriber description]
	 * HTML template for save subscriber
	 *
	 * @param user_id  $user_id get user_id.
	 * @param secret   $secret get secret.
	 *  @param base_url $base_url get base_url.
	 * @param data     $data get data.
	 */
	public function stedb_save_subscriber( $user_id, $secret, $base_url, $data ) {
		global $wpdb;
		$save_subscriber = new STEDB_Api_Client( $user_id, $secret, $base_url );
		$output          = $save_subscriber->ste_send_request( 'emails/', 'POST', $data );
		@$id              = $output->data->id;
		return $id;

	}

	/**
	 * [stedb_get_list_information description]
	 * HTML template to get list info
	 *
	 * @param user_id  $user_id get user_id.
	 * @param secret   $secret get secret.
	 *  @param base_url $base_url get base_url.
	 * @param id       $id get data.
	 */
	public function stedb_get_list_information( $user_id, $secret, $base_url, $id ) {
		global $wpdb;
		$data                 = array();
		$get_list_information = new STEDB_Api_Client( $user_id, $secret, $base_url );
		$output               = $get_list_information->ste_send_request( 'lists/"' . $id . '"', 'GET', $data );
	}
}
