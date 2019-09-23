<?php
class STEDB_Account{ 

    public $userId;
    public $secret;
    public $baseUrl;
   
    public function stedb_registration() {
        if(empty(get_option('stedb_user_id')) && empty(get_option('stedb_secret')) && empty(get_option('stedb_baseUrl'))) {
            $this->stedb_create_registration();
        }
    }

    public function  stedb_create_registration()
    { 
       global $wpdb;
        $user = wp_get_current_user();
        $baseUrl = 'https://opt4.stedb.com/crm';  
        $data = array('email' => $user->user_email, 'domain' => get_option('siteurl'));
        $client = new STEDB_Api_Client($userId, $secret, $baseUrl);               
        $output =$client->ste_sendRequest('/account/create', 'POST', $data );
        // if($output->http_code == 200  && !isset( $output->data->error ) ){
        if(!isset( $output->data->error ) ){
            $userId =  $output->data->user_id;
            $secret = $output->data->secret;
            $baseUrl=  $output->data->base_url;
            
            if( !empty( $userId ) && !empty( $secret ) && !empty( $baseUrl ) ){
                add_option( 'stedb_user_id', $userId);
                add_option( 'stedb_secret', $secret);
                add_option( 'stedb_baseUrl', $baseUrl);        
            }
            
        }    
        
    }
    /********** remove social link field *********/
    function stedb_removeElementWithValue($array, $key){
     foreach($array as $subKey => $subArray){
          if($subArray[$key] == "social_gmail"){
               unset($array[$subKey]);
          }
           if($subArray[$key] == "social_yahoo"){
               unset($array[$subKey]);
          }
           if($subArray[$key] == "social_linkedin"){
               unset($array[$subKey]);
          }
     }
     return $array;
}

    public function stedb_create_custom_field($userId, $secret, $baseUrl, $listData)
    {
        global $wpdb; 
        $get_custom_data = json_decode($listData['field_detail'], true);  
        $get_custom = $this->stedb_removeElementWithValue($get_custom_data,"field_type");
        $id_arr =array();
        foreach ($get_custom as $key => $value) {  
            if($value['field_type'] == 'radio' || $value['field_type'] == 'checkbox' || $value['field_type'] == 'select'){
                $default_vale = json_encode($value['default_value']);    
            }
            else {

                $default_vale = $value['default_value'];
            }       
            $data = array('field_name' => $value['field_name'], 'field_type' => $value['field_type'],'default_value'=> $default_vale); 
            $custom_field = new STEDB_Api_Client($userId, $secret, $baseUrl);               
            $output =$custom_field->ste_sendRequest('fields/', 'POST', $data); 
            $id=$output->data->id;
            $this->stedb_get_custom_field_information($userId, $secret, $baseUrl,$id);
            // $this->stedb_delete_custom_field($userId, $secret, $baseUrl, $id);
            $id_arr[] = $id;
        }
        $output_id = implode(',', $id_arr);        
        return $output_id;  
    }

    public function stedb_update_custom_field($userId , $secret , $baseUrl, $listData,$id,$field_ids){
        global $wpdb;
        $del_ids = explode(',', $field_ids); 
        foreach ($del_ids as  $del_id) {
           $output_del[]=$this->stedb_delete_custom_field($userId, $secret, $baseUrl, $del_id);
        }
        $get_custom_data = json_decode($listData['field_detail'], true); 
        $get_custom = $this->stedb_removeElementWithValue($get_custom_data,"field_type");
        $id_arr =array();
        foreach ($get_custom as $key => $value) {  
            if($value['field_type'] == 'radio' || $value['field_type'] == 'checkbox' || $value['field_type'] == 'select'){
                $default_vale = json_encode($value['default_value']);    
            }
            else {

                $default_vale = $value['default_value'];
            }       
            $data = array('field_name' => $value['field_name'], 'field_type' => $value['field_type'],'default_value'=> $default_vale); 
            $custom_field = new STEDB_Api_Client($userId, $secret, $baseUrl);               
            $output =$custom_field->ste_sendRequest('fields/', 'POST', $data); 
            $id=$output->data->id;
             
            $this->stedb_get_custom_field_information($userId, $secret, $baseUrl,$id);
            $id_arr[] = $id;
        }
        $output_id = implode(',', $id_arr);    
        return $output_id;       
    }

    public function stedb_get_custom_field_information($userId, $secret, $baseUrl,$id)
    {
        global $wpdb;           
        $data = array(); 
        $get_custom_field = new STEDB_Api_Client($userId, $secret, $baseUrl);               
        $output =$get_custom_field->ste_sendRequest('fields/"'.$id.'"', 'GET', $data); 
    }

    public function stedb_delete_custom_field($userId, $secret, $baseUrl, $id)
    {
        global $wpdb;          
        $data = array(); 
        $delete_form_list = new STEDB_Api_Client($userId, $secret, $baseUrl);               
        $output =$delete_form_list->ste_sendRequest('fields/"'.$id.'"', 'DELETE', $data);
    }

    public function stedb_create_form_list($userId, $secret, $baseUrl , $listData)
    {
        global $wpdb;  
        // $data = array('list_name' => (string)$listData['form_name']); 
        $data =array('list_name' => $listData['form_name'] ,'receiver' => $listData['receiver']);
        $create_form_list = new STEDB_Api_Client($userId, $secret, $baseUrl);
        $output =$create_form_list->ste_sendRequest('lists/', 'POST', $data); 
        $id=$output->data->id;    
        return $id;           
    }
    
    public function stedb_get_social_providers_urls($userId, $secret, $baseUrl , $listid)
    {
        global $wpdb;           
        $get_social_providers_urls = new STEDB_Api_Client($userId, $secret, $baseUrl);
        $output =$get_social_providers_urls->ste_sendRequest('accnt/sm_providers/"'.$listid.'"', 'GET'); 
        return $output;           
    }
    
    public function stedb_create_campaign($userId , $secret , $baseUrl, $data){
        global $wpdb;  
        $create_campaign = new STEDB_Api_Client($userId, $secret, $baseUrl);
        $output = $create_campaign->ste_sendRequest('campaign/', 'POST', $data);
        $id = $output->data->id;     
        return $id;
        
    }
    
    public function stedb_update_campaign($userId , $secret , $baseUrl, $data,$id){
        global $wpdb;   
        $update_campaign = new STEDB_Api_Client($userId, $secret, $baseUrl);
        $output = $update_campaign->ste_sendRequest('campaigns/"'.$id.'"', 'PUT'); 
        $id = $output->data->id;     
        return $id;       
    }
    
    public function stedb_save_subscriber($userId , $secret , $baseUrl, $data) {
        global $wpdb;  
        $save_subscriber = new STEDB_Api_Client($userId, $secret, $baseUrl);
        $output =$save_subscriber->ste_sendRequest('emails/', 'POST', $data); 
        $id=$output->data->id;       
        return $id;    
        
    }

    public function stedb_get_list_information($userId, $secret, $baseUrl,$id)
    {
        global $wpdb;            
        $data = array(); 
        $get_list_information = new STEDB_Api_Client($userId, $secret, $baseUrl);               
        $output =$get_list_information->ste_sendRequest('lists/"'.$id.'"', 'GET', $data);
    }
}
?>