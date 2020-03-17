<?php
class Admin_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }
        function update_system_settings() {
        if(!empty($this->input->post('system_name'))){
        $data['description'] = $this->input->post('system_name');
        $this->db->where('setting_type', 'system_name');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('system_title'))){
        $data['description'] = $this->input->post('system_title');
        $this->db->where('setting_type', 'system_title');
        $this->db->update('settings', $data);
        }   
        if(!empty($this->input->post('address'))){
        $data['description'] = $this->input->post('address');
        $this->db->where('setting_type', 'address');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('mobile'))){   
        $data['description'] = $this->input->post('mobile');
        $this->db->where('setting_type', 'mobile');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('whatsapp_number'))){   
        $data['description'] = $this->input->post('whatsapp_number');
        $this->db->where('setting_type', 'whatsapp_number');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('system_email'))){
        $data['description'] = $this->input->post('system_email');
        $this->db->where('setting_type', 'system_email');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('email_password'))){
        $data['description'] = $this->input->post('email_password');
        $this->db->where('setting_type', 'email_password');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('fb'))){
        $data['description'] = $this->input->post('fb');
        $this->db->where('setting_type', 'facebook');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('twiter'))){
        $data['description'] = $this->input->post('twiter');
        $this->db->where('setting_type', 'twiter');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('youtube'))){
        $data['description'] = $this->input->post('youtube');
        $this->db->where('setting_type', 'youtube');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('instagram'))){
        $data['description'] = $this->input->post('instagram');
        $this->db->where('setting_type', 'instagram');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('linkedin'))){
        $data['description'] = $this->input->post('linkedin');
        $this->db->where('setting_type', 'linkedin');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('pinterest'))){
        $data['description'] = $this->input->post('pinterest');
        $this->db->where('setting_type', 'pinterest');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('tumblr'))){
        $data['description'] = $this->input->post('tumblr');
        $this->db->where('setting_type', 'tumblr');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('sms_username'))){
        $data['description'] = $this->input->post('sms_username');
        $this->db->where('setting_type', 'sms_username');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('sms_sender'))){
        $data['description'] = $this->input->post('sms_sender');
        $this->db->where('setting_type', 'sms_sender');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('sms_hash'))){
        $data['description'] = $this->input->post('sms_hash');
        $this->db->where('setting_type', 'sms_hash');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('smtp_port'))){
        $data['description'] = $this->input->post('smtp_port');
        $this->db->where('setting_type', 'smtp_port');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('smtp_host'))){
        $data['description'] = $this->input->post('smtp_host');
        $this->db->where('setting_type', 'smtp_host');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('smtp_username'))){
        $data['description'] = $this->input->post('smtp_username');
        $this->db->where('setting_type', 'smtp_username');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('smtp_password'))){
        $data['description'] = $this->input->post('smtp_password');
        $this->db->where('setting_type', 'smtp_password');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('google_api_key'))){
        $data['description'] = $this->input->post('google_api_key');
        $this->db->where('setting_type', 'google_api_key');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('google_client_secret'))){
        $data['description'] = $this->input->post('google_client_secret');
        $this->db->where('setting_type', 'google_client_secret');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('google_client_id'))){
        $data['description'] = $this->input->post('google_client_id');
        $this->db->where('setting_type', 'google_client_id');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('cashfree_appId'))){
        $data['description'] = $this->input->post('cashfree_appId');
        $this->db->where('setting_type', 'cashfree_appId');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('cashfree_secret_key'))){
        $data['description'] = $this->input->post('cashfree_secret_key');
        $this->db->where('setting_type', 'cashfree_secret_key');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('cashfree_payment_mode'))){
        $data['description'] = $this->input->post('cashfree_payment_mode');
        $this->db->where('setting_type', 'cashfree_payment_mode');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('refer_money'))){
        $data['description'] = $this->input->post('refer_money');
        $this->db->where('setting_type', 'refer_money');
        $this->db->update('settings', $data);
        }
        return true;
    }
    function select_admission_info($param1 = '', $param2 = '',$param3='')
    {
if($param1 != '0NaN-NaN-NaN' && $param2 != '0NaN-NaN-NaN'){
/*if($param3=='all'){
$where=array('appointment_date >='=>$param1,'appointment_date <='=>$param2,'row_status_cd'=>'1');
}elseif($param3!='all'){*/
$where=array('appointment_date >='=>$param1,'appointment_date <='=>$param2,'admission_status'=>$param3,'row_status'=>'1');
/*}*/
}else{
/*if($param3=='all'){
$where=array('row_status_cd'=>'1');
}elseif($param3!='all'){*/
$where=array('admission_status'=>$param3,'row_status'=>'1');
/*}*/
}
$this->common_model->select_results_info('admissions');
if($account_type == 'superadmin'){
    return $this->db->order_by('appointment_number','DESC')->get_where('appointments',$where)->result_array();  
}elseif($account_type == 'hospitaladmins'){
     return $this->db->order_by('appointment_number','DESC')->where($where)->get_where('appointments',array('hospital_id'=>$this->session->userdata('hospital_id')))->result_array();
}elseif($account_type == 'doctors'){
     return $this->db->order_by('appointment_number','DESC')->where($where)->get_where('appointments',array('doctor_id'=>$this->session->userdata('login_user_id')))->result_array();
}elseif($account_type == 'users'){
     return $this->db->order_by('appointment_number','DESC')->where($where)->get_where('appointments',array('user_id'=>$this->session->userdata('login_user_id')))->result_array();   
}elseif($account_type == 'receptionist'){
    $receptionist=$this->db->where('receptionist_id',$this->session->userdata('login_user_id'))->get('receptionist')->row();
    $doctor_id=explode(',',$receptionist->doctor_id);
for($doc=0;$doc<count($doctor_id);$doc++){
     $result[]=$this->db->order_by('appointment_number','DESC')->where($where)->get_where('appointments',array('doctor_id'=>$doctor_id[$doc]))->result_array();
}
for($i=0;$i<count($result);$i++){
    for($j=0;$j<count($result[$i]);$j++){
 $return[]=$result[$i][$j];
 }   
}
return $return;
}elseif($account_type == 'nurse'){
    $nurse=$this->db->where('nurse_id',$this->session->userdata('login_user_id'))->get('nurse')->row();
    $doctor_id=explode(',',$nurse->doctor_id);
for($doc=0;$doc<count($doctor_id);$doc++){
     $result[]=$this->db->order_by('appointment_number','DESC')->where($where)->get_where('appointments',array('doctor_id'=>$doctor_id[$doc]))->result_array();   
}
for($i=0;$i<count($result);$i++){
    for($j=0;$j<count($result[$i]);$j++){
 $return[]=$result[$i][$j];
 }   
}
return $return;
}   
    }


    public function get_school_list($admission_status,$start='',$end='',$school_id)
    {

if($start !='' && $end !='' && $admission_status  !='' && $school  !=''){
    $this->session->set_userdata('last_page', current_url().'?sd='.$start .'&ed='.$end .'&admission_status='.$admission_status  .'&school='.$school  );
        }elseif($start !='' && $end !='' && $admission_status  =='' && $school  !=''){
    $this->session->set_userdata('last_page', current_url().'?sd='.$start .'&ed='.$end .'&school='.$school  );
        }elseif($start !='' && $end !='' && $admission_status  !='' && $school  ==''){
          $this->session->set_userdata('last_page', current_url().'?sd='.$start .'&ed='.$end .'&admission_status='.$admission_status  );
        }elseif($start !='' && $end !='' && $admission_status  =='' && $school  ==''){
          $this->session->set_userdata('last_page', current_url().'?sd='.$start .'&ed='.$end );
        }elseif($start =='' && $end =='' && $admission_status  =='' && $school  !=''){
    $this->session->set_userdata('last_page', current_url().'?school='.$school  );
        }elseif($start =='' && $end =='' && $admission_status  !='' && $_GET['schools']==''){
    $this->session->set_userdata('last_page', current_url().'?admission_status='.$admission_status  );
        }else{$this->session->set_userdata('last_page', current_url());}

if(($start !='' && $end !='' && $_GET['status_id']!='') || ($start !='' && $end !='' && $_GET['status_id']=='') || ($start =='' && $end =='' && $_GET['status_id']!='')){
            $sd=$start ;
            $ed=$end ;
            $admission_status=$admission_status  ;
        }else{
            $sd=date('Y-m-d', strtotime('-29 days'));
            $ed=date('Y-m-d', strtotime('+0 days'));
            $admission_status='1';
            $school='';
        }

        if($sd != '0NaN-NaN-NaN' && $ed != '0NaN-NaN-NaN'){
          if($school != ''){
$where=array('created_at >='=>$sd.' 00:00:00','created_at <='=>$ed.' 23:59:59','admission_status'=>$admission_status,'school_id'=>$school,'row_status'=>'1');
}else{
  $where=array('created_at >='=>$sd.' 00:00:00','created_at <='=>$ed.' 23:59:59','admission_status'=>$admission_status,'row_status'=>'1');
}
}elseif($school!=''){
$where=array('school_id'=>$school,'row_status'=>'1');
}else{
$where=array('admission_status'=>$admission_status,'row_status'=>'1');
}
            return $admissions=$this->common_model->select_results_info('admissions',$where)->result_array();
          
    }






}