<?php

class Common extends MY_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->template = "template/admin/main";
        //check_access('admin');
    }
    
    public function index(){
        $this->data['title'] = "Dashboard";
        $this->data['content'] = 'dashboard';
        $this->data['active_menu'] = 'dashboard';
        $this->_render_page($this->template, $this->data);
    }
    
    public function content(){
        $this->data['title'] = 'Content';
        $this->data['content'] = 'content';
        $this->data['active_menu'] = 'dashboard';
        $this->_render_page($this->template, $this->data);
    }
   public function set_row_status($table, $type, $where, $status=0)
    {
        $ret = $this->common_model->set_row_status($table, $type, $where, $status);
        if ($ret) {
            $this->session->set_flashdata('success_message', 'Action Completed Successfully');
        } else {
            $this->session->set_flashdata('error_message', 'Action Not Completed');
        }
        redirect($this->session->userdata('last_page'));
    }
    public function delete_listing_img($table,$list_id,$id)
    {
        if($table=='listing_gallery'){
            $folder='gallery';
        }elseif($table=='listing_banner'){
            $folder='banners';
        }
        $url='uploads/listings/'.$folder.'/'.$list_id.'/'.$id.'.jpg';
        //echo $url;die;
        unlink($url);
        $this->db->where('id',$id)->delete($table);
        redirect($this->session->userdata('last_page'));
    }
    public function facilities(){
        $this->data['title'] = 'Facilities';
        $this->data['content'] = 'facilities';
        $this->data['active_menu'] = 'facilities';
        $this->_render_page($this->template, $this->data);
    }
   /* public function get_location($latitude,$longitude)
    {
        
$geolocation = $latitude.','.$longitude;
$request = 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyAZ-5bkYW9Wb5k2JLBoaas0HSx7ZBkMwAM&latlng='.$geolocation.'&sensor=false'; 
$file_contents = file_get_contents($request);
$json_decode = json_decode($file_contents);
if(isset($json_decode->results[0])) {
    $response = array();
    foreach($json_decode->results[0]->address_components as $addressComponet) {
        if(in_array('political', $addressComponet->types)) {
                $response[] = $addressComponet->long_name; 
        }
    }

    if(isset($response[0])){ $first  =  $response[0];  } else { $first  = 'null'; }
    if(isset($response[1])){ $second =  $response[1];  } else { $second = 'null'; } 
    if(isset($response[2])){ $third  =  $response[2];  } else { $third  = 'null'; }
    if(isset($response[3])){ $fourth =  $response[3];  } else { $fourth = 'null'; }
    if(isset($response[4])){ $fifth  =  $response[4];  } else { $fifth  = 'null'; }

    if( $first != 'null' && $second != 'null' && $third != 'null' && $fourth != 'null' && $fifth != 'null' ) {
        echo "<br/>Address:: ".$first;
        echo "<br/>City:: ".$second;
        echo "<br/>State:: ".$fourth;
        echo "<br/>Country:: ".$fifth;
    }
    else if ( $first != 'null' && $second != 'null' && $third != 'null' && $fourth != 'null' && $fifth == 'null'  ) {
        echo "<br/>Address:: ".$first;
        echo "<br/>City:: ".$second;
        echo "<br/>State:: ".$third;
        echo "<br/>Country:: ".$fourth;
    }
    else if ( $first != 'null' && $second != 'null' && $third != 'null' && $fourth == 'null' && $fifth == 'null' ) {
        echo "<br/>City:: ".$first;
        echo "<br/>State:: ".$second;
        echo "<br/>Country:: ".$third;
    }
    else if ( $first != 'null' && $second != 'null' && $third == 'null' && $fourth == 'null' && $fifth == 'null'  ) {
        echo "<br/>State:: ".$first;
        echo "<br/>Country:: ".$second;
    }
    else if ( $first != 'null' && $second == 'null' && $third == 'null' && $fourth == 'null' && $fifth == 'null'  ) {
        echo "<br/>Country:: ".$first;
    }
  }
    }*/
    function get_location($latitude,$longitude){
        //$address = "India+Panchkula";
$url = 'https://maps.google.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&sensor=false&region=India&key='.$this->db->get_where('settings', array('setting_type' => 'google_api_key'))->row()->description;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($ch);
curl_close($ch);
/*echo "<pre>";
print_r($response);die;*/
$response_a = json_decode($response);
//echo "<pre>";
//print_r($response_a->results[0]->address_components[0]->);die;
echo $lat = $response_a->results[0]->formatted_address;
}

 public function send_otp()
    {
        $data['status']=0;
        $data['message']='<div class="notification error closeable"><strong>OTP not sent</strong></div>';
        $otp=substr(rand(),0,4);
        $body=$this->sms_model->get_my_template('OTP');
        $message=$this->sms_model->otp_sms($body,$otp);
        $sms=$this->sms_model->send_sms($message, $_POST['phone']);
    if($otp){
        $this->session->set_userdata('otp',$otp);
            $data['status']=1;
            $data['message']='<div class="notification success closeable">OTP sent to: '.$_POST['phone'].'</div>';
        }
       echo json_encode($data);
    }

    public function check_otp()
    {
        $data['status']=0;
        $data['message']='<div class="notification error closeable"><strong>Invalid OTP</strong></div>';
    if($_POST['otp']==$this->session->userdata('otp')){
            $this->db->where('id',$this->session->userdata('user_id'))->update('users',array('active_phone'=>1,'modified_at'=>date('Y-m-d H:i:s')));
            $data['status']=1;
            $data['message']='<div class="notification success closeable">Mobile Verified Successfully</div>';
        }
       echo json_encode($data);
    }



}

