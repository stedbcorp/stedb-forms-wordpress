<?php
class STEDB_Account {

	public $user_id;
	public $secret;
	public $base_url;

	public function stedb_registration() {
		if ( empty( get_option( 'stedb_user_id' ) ) && empty( get_option( 'stedb_secret' ) ) && empty( get_option( 'stedb_base_url' ) ) ) {
			$this->stedb_create_registration();
		}
	}

	public function stedb_create_registration() {
		global $wpdb;
		$user     = wp_get_current_user();
		$base_url = 'https://opt4.stedb.com/crm';
		$data     = array(
			'email'  => $user->user_email,
			'domain' => get_option( 'siteurl' ),
		);
		$client   = new STEDB_Api_Client( $user_id, $secret, $base_url );
		$output   = $client->ste_sendRequest( '/account/create', 'POST', $data );
		// if($output->http_code == 200  && !isset( $output->data->error ) ){
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

	}
	/********** remove social link field *********/
	public function stedb_remove_element_with_value( $array, $key ) {
		foreach ( $array as $sub_key => $sub_array ) {
			if ( 'social_gmail' == $sub_array[ $key ] ) {
				unset( $array[ $sub_key ] );
			}
			if ( $sub_array[ $key ] == 'social_yahoo' ) {
				unset( $array[ $sub_key ] );
			}
			if ( $sub_array[ $key ] == 'social_linkedin' ) {
				unset( $array[ $sub_key ] );
			}
		}
		return $array;
	}

	public function stedb_create_custom_field( $user_id, $secret, $base_url, $listData ) {
		global $wpdb;
		$get_custom_data = json_decode( $listData['field_detail'], true );
		$get_custom      = $this->stedb_remove_element_with_value( $get_custom_data, 'field_type' );
		$id_arr          = array();
		foreach ( $get_custom as $key => $value ) {
			if ( $value['field_type'] == 'radio' || $value['field_type'] == 'checkbox' || $value['field_type'] == 'select' ) {
				$default_vale = json_encode( $value['default_value'] );
			} else {

				$default_vale = $value['default_value'];
			}
			$data         = array(
				'field_name'    => $value['field_name'],
				'field_type'    => $value['field_type'],
				'default_value' => $default_vale,
			);
			$custom_field = new STEDB_Api_Client( $user_id, $secret, $base_url );
			$output       = $custom_field->ste_sendRequest( 'fields/', 'POST', $data );
			$id           = $output->data->id;
			$this->stedb_get_custom_field_information( $user_id, $secret, $base_url, $id );
			// $this->stedb_delete_custom_field($user_id, $secret, $base_url, $id);
			$id_arr[] = $id;
		}
		$output_id = implode( ',', $id_arr );
		return $output_id;
	}

	public function stedb_update_custom_field( $user_id, $secret, $base_url, $listData, $id, $field_ids ) {
		global $wpdb;
		$del_ids = explode( ',', $field_ids );
		foreach ( $del_ids as  $del_id ) {
			$output_del[] = $this->stedb_delete_custom_field( $user_id, $secret, $base_url, $del_id );
		}
		$get_custom_data = json_decode( $listData['field_detail'], true );
		$get_custom      = $this->stedb_remove_element_with_value( $get_custom_data, 'field_type' );
		$id_arr          = array();
		foreach ( $get_custom as $key => $value ) {
			if ( $value['field_type'] == 'radio' || $value['field_type'] == 'checkbox' || $value['field_type'] == 'select' ) {
				$default_vale = json_encode( $value['default_value'] );
			} else {

				$default_vale = $value['default_value'];
			}
			$data         = array(
				'field_name'    => $value['field_name'],
				'field_type'    => $value['field_type'],
				'default_value' => $default_vale,
			);
			$custom_field = new STEDB_Api_Client( $user_id, $secret, $base_url );
			$output       = $custom_field->ste_sendRequest( 'fields/', 'POST', $data );
			$id           = $output->data->id;

			$this->stedb_get_custom_field_information( $user_id, $secret, $base_url, $id );
			$id_arr[] = $id;
		}
		$output_id = implode( ',', $id_arr );
		return $output_id;
	}

	public function stedb_get_custom_field_information( $user_id, $secret, $base_url, $id ) {
		global $wpdb;
		$data             = array();
		$get_custom_field = new STEDB_Api_Client( $user_id, $secret, $base_url );
		$output           = $get_custom_field->ste_sendRequest( 'fields/"' . $id . '"', 'GET', $data );
	}

	public function stedb_delete_custom_field( $user_id, $secret, $base_url, $id ) {
		global $wpdb;
		$data             = array();
		$delete_form_list = new STEDB_Api_Client( $user_id, $secret, $base_url );
		$output           = $delete_form_list->ste_sendRequest( 'fields/"' . $id . '"', 'DELETE', $data );
	}

	public function stedb_create_form_list( $user_id, $secret, $base_url, $listData ) {
		global $wpdb;
		// $data = array('list_name' => (string)$listData['form_name']);
		$data             = array(
			'list_name' => $listData['form_name'],
			'receiver'  => $listData['receiver'],
		);
		$create_form_list = new STEDB_Api_Client( $user_id, $secret, $base_url );
		$output           = $create_form_list->ste_sendRequest( 'lists/', 'POST', $data );
		$id               = $output->data->id;
		return $id;
	}

	public function stedb_get_social_providers_urls( $user_id, $secret, $base_url, $listid ) {
		global $wpdb;
		$get_social_providers_urls = new STEDB_Api_Client( $user_id, $secret, $base_url );
		$output                    = $get_social_providers_urls->ste_sendRequest( 'accnt/sm_providers/"' . $listid . '"', 'GET' );
		return $output;
	}

	public function stedb_create_campaign( $user_id, $secret, $base_url, $data ) {
		global $wpdb;
		$create_campaign = new STEDB_Api_Client( $user_id, $secret, $base_url );
		$output          = $create_campaign->ste_sendRequest( 'campaign/', 'POST', $data );
		$id              = $output->data->id;
		return $id;

	}

	public function stedb_update_campaign( $user_id, $secret, $base_url, $data, $id ) {
		global $wpdb;
		$update_campaign = new STEDB_Api_Client( $user_id, $secret, $base_url );
		$output          = $update_campaign->ste_sendRequest( 'campaigns/"' . $id . '"', 'PUT' );
		$id              = $output->data->id;
		return $id;
	}

	public function stedb_save_subscriber( $user_id, $secret, $base_url, $data ) {
		global $wpdb;
		$save_subscriber = new STEDB_Api_Client( $user_id, $secret, $base_url );
		$output          = $save_subscriber->ste_sendRequest( 'emails/', 'POST', $data );
		$id              = $output->data->id;
		return $id;

	}

	public function stedb_get_list_information( $user_id, $secret, $base_url, $id ) {
		global $wpdb;
		$data                 = array();
		$get_list_information = new STEDB_Api_Client( $user_id, $secret, $base_url );
		$output               = $get_list_information->ste_sendRequest( 'lists/"' . $id . '"', 'GET', $data );
	}
}

