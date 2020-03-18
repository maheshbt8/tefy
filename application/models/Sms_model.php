<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sms_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
function send_sms($message = '' , $numbers = '') {
  $username = $this->db->get_where('settings', array('setting_type' => 'sms_username'))->row()->description;
  $hash =$this->db->get_where('settings', array('setting_type' => 'sms_hash'))->row()->description; 
  $test = "0";
  $sender = $this->db->get_where('settings', array('setting_type' => 'sms_sender'))->row()->description;
  $message = urlencode($message);
  $data = "api_key=".$hash."&sender=".$sender."&numbers=".$numbers."&message=".$message;
  $ch = curl_init('http://api.textlocal.in/send/?');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch); 
  //echo $result;die;
  curl_close($ch);
  return true;
        }


        public function get_my_template($value)
    {
                    // Account details
        $apiKey = urlencode('Your apiKey');
        
     $hash =$this->db->get_where('settings', array('setting_type' => 'sms_hash'))->row()->description; 
        // Prepare data for POST request
        $data = array('apikey' => $hash);
     //6adc95ea09160414627cfe048fee536104b5a18188687ac842a5d454395beeb6
        // Send the POST request with cURL
        $ch = curl_init('https://api.textlocal.in/get_templates/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        
        // Process your response here
        /*echo $response;
        echo "<pre>";
        print_r(json_decode($response));
        die;*/
        $response=json_decode($response);
        /*echo "<pre>";
        print_r($response->templates);die;*/
        for($i=0;$i<count($response->templates);$i++) {
          $re=$response->templates[$i];
          if($re->title == $value){
            return $re->body;
          }
        }
        return FALSE;
    }
    public function admission_sms($body,$name,$application_id)
    {
      $rep = ['%%|name^{"inputtype" : "text", "maxlength" : "30"}%%', '%%|application^{"inputtype" : "text", "maxlength" : "15"}%%'];
      $rep_by = [$name, $application_id];
      $message=str_replace($rep,$rep_by,$body);
      return $message;
    }
    public function otp_sms($body,$otp)
    {
      $rep = ['%%|otp^{"inputtype" : "text", "maxlength" : "6"}%%'];
      $rep_by = [$otp];
      $message=str_replace($rep,$rep_by,$body);
      return $message;
    }
}
