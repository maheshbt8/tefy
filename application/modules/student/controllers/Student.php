<?php

class Student extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->template = "template/admin/main";
        check_access('student');

        $this->load->model('student_model');
    }
    
    public function index(){
        $this->data['title'] = "Dashboard";
        $this->data['content'] = 'dashboard';
        $this->data['active_menu'] = 'dashboard';
        $this->_render_page($this->template, $this->data);
    }
    public function bookmarks(){

        $where="bookmarks.row_status =1 AND bookmarks.user_id =".$this->session->userdata('user_id');

        $config['base_url'] = base_url('student/bookmarks'); //site url
        /*$config['base_url'] = $this->session->userdata('last_page'); //site url*/
        $config['total_rows'] = $this->common_model->count_records('bookmarks',$where); //total row
       // print_r($config);die;
        $config['per_page'] = 4;  //show record per halaman
        $config["uri_segment"] = 2;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $this->data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $this->data['schools'] =  $this->student_model->get_bookmarked_info($where)->result_array();
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['title'] = "Bookmarks";
        $this->data['content'] = 'bookmarks';
        $this->data['active_menu'] = 'bookmarks';
        $this->_render_page($this->template, $this->data);
    }
    public function profile(){
        $this->data['title'] = "Profile";
        $this->data['content'] = 'profile';
        $this->data['active_menu'] = 'profile';
        $this->data['user_details'] = $this->common_model->select_results_info('users',array('id'=>$this->session->userdata('user_id')))->row_array();
        if($this->input->post()){
            $input=$this->input->post();
            $input_data=array(
                'first_name' => $input['username'],
                'email' => $input['email'],
                'phone' => $input['phone']
            );
            $res=$this->common_model->update_results_info('users',array('id'=>$this->session->userdata('user_id')),$input_data);
            if($res>0){
                if($_FILES['user_profile']['name']!=''){
                    move_uploaded_file($_FILES["user_profile"]["tmp_name"], "uploads/users/". $this->session->userdata('user_id').'.jpg');
                }
                $this->session->set_flashdata('success_message','Profile Updated Successfully');
            }else{
                $this->session->set_flashdata('error_message','Profile Not Updated');
            }
            redirect($this->session->userdata('last_page'));
        }
        $this->_render_page($this->template, $this->data);
    }
    function change_password()
    {
        $this->data['title'] = "Profile";
        $this->data['content'] = 'profile';
        $this->data['active_menu'] = 'profile';
        $this->data['user_details'] = $this->common_model->select_results_info('users',array('id'=>$this->session->userdata('user_id')))->row_array();
        if ($this->input->post()) {
            /*$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');*/
            $this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
            
        $this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');

        $this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

            if ($this->form_validation->run() == TRUE) {
                /*$user_id = $this->session->userdata('login_id');
                $password = $this->input->post('password');
                $res = $this->crud_model->update_user_password($password, $user_id);*/
                $identity = $this->session->userdata('identity');

            $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

            if ($change)
            {
                //if the password was successfully changed
                $this->session->set_flashdata('success_message', $this->ion_auth->messages());
                redirect('auth/logout');
            }
            else
            {
                $this->session->set_flashdata('error_message', $this->ion_auth->errors());
                redirect($this->session->userdata('last_page'));
            }
             /*   if ($res) {
                    $this->session->set_flashdata('success_message', 'Password Updated');
                } else {
                    $this->session->set_flashdata('error_message', 'Password Not Updated');
                }*/
                /*redirect($this->session->userdata('last_page'));*/
            }
        }
        $this->_render_page($this->template, $this->data);
    }


    public function childs(){
        $this->data['title'] = "Student Profiles";
        $this->data['content'] = 'childs';
        $this->data['active_menu'] = 'childs';
        $this->data['classes'] = $this->common_model->select_results_info('classes')->result_array();
        $this->data['childs'] = $this->common_model->select_results_info('childs',array('user_id'=>$this->session->userdata('user_id'),'row_status'=>1))->result_array();
        if(isset($_GET['child']) && $_GET['child'] !=''){
            $child_id=base64_decode(base64_decode($_GET['child']));
        $this->data['child'] = $this->common_model->select_results_info('childs',array('id'=>$child_id))->row_array();
        }
        if($this->input->post()){
            /*$this->form_validation->set_rules('description', 'Description', 'trim|required');
        if ($this->form_validation->run() == true)
            {*/
            $input=$this->input->post();
            $input_data=array(
                'name' => $input['name'],
                'father' => $input['father'],
                'mother' => $input['mother'],
                'gender' => $input['gender'],
                'dob' => $input['dob'],
                'c_number' => $input['c_number'],
                'previous_school' => $input['previous_school'],
                'previous_class' => $input['previous_class'],
                'join_class' => $input['join_class'],
                'relation' => $input['relation'],
                'address' => $input['address'],
                'activities' => $input['activities'],
            );
            if($this->input->post('child_id') !='')
            {
                $res=$this->common_model->update_results_info('childs',array('id'=>$this->input->post('child_id')),$input_data);
            }else{
                $input_data['user_id'] = $this->session->userdata('user_id');
                $res=$this->common_model->insert_results_info('childs',$input_data);
            }
            if($res>0){
                $this->session->set_flashdata('success_message','<b>Submitted Successfully, Go the previous tab in your browser and refresh the page to Apply admission.</b>');
            }else{
                $this->session->set_flashdata('error_message','Not Submited');
            }
            redirect($this->session->userdata('last_page'));
            /*}*/
        }
        $this->_render_page($this->template, $this->data);
    }
    public function admissions(){
        $this->data['title'] = 'Admissions';
        $this->data['content'] = 'admissions';
        $this->data['active_menu'] = 'admissions';
        $this->_render_page($this->template, $this->data);
    }
    public function admission_form_view($id){
        $this->data['promo']=$this->common_model->select_results_info('admissions',array('id'=>base64_decode(base64_decode($id))))->row_array();
        $this->data['title'] = 'Admission Form';
        $this->data['content'] = 'admission_form';
        $this->data['active_menu'] = 'admissions_form';
        $this->_render_page($this->template, $this->data);
    }
   /* public function admission_payment($admission_id)
    {
        $this->common_model->select_results_info('admissions',array('id'=>$admission_id))->row_array();
        $data=array(
            'orderId'=>12,
            'orderAmount'=>10,
            'orderNote'=>'hi this is for test',
            'customerName'=>'mahi',
            'customerPhone'=>'55555555555',
            'customerEmail'=>'mahi@g.com',
            'returnUrl'=>base_url('student/admission_payment_respons'),
            'notifyUrl'=>base_url('student/admission_payment_respons')
            );
        //$this->load->cont
        //print_r($data);die;
        $_POST=$data;
        redirect('payment/cashfree/',$_POST);
        //$this->payment->cashfree($data);
    }*/
    public function admission_payment_respons()
    {
        $chec_chec=$this->session->userdata('chec_chec');
        $secretkey = $this->db->get_where('settings', array('setting_type' => 'cashfree_secret_key'))->row()->description;
         $orderId = $_POST["orderId"];
         $orderAmount = $_POST["orderAmount"];
         /*$chec_chec = $_POST["chec_chec"];*/
         $referenceId = $_POST["referenceId"];
         $txStatus = $_POST["txStatus"];
         $paymentMode = $_POST["paymentMode"];
         $txMsg = $_POST["txMsg"];
         $txTime = $_POST["txTime"];
         $signature = $_POST["signature"];
         $data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
         $hash_hmac = hash_hmac('sha256', $data, $secretkey, true) ;
         $computedSignature = base64_encode($hash_hmac);
         
         $input_data=array(
            'orderId'=>$orderId,
            'orderAmount'=>$orderAmount,
            'referenceId'=>$referenceId,
            'txStatus'=>$txStatus,
            'paymentMode'=>$paymentMode,
            'txMsg'=>$txMsg,
            'txTime'=>$txTime,
            'signature'=>$signature,
         );
        /*print_r($_POST);die;
        echo "string";die;*/
        $this->common_model->insert_results_info('payments',$input_data);
        if($signature==$computedSignature){
            $admis_d_update=array(
                'admission_status'=>5,
            );
            if($chec_chec == 1){
                $admis_d_update['total']=$orderAmount;
                $admis_d_update['walet_less']=$this->common_model->get_type_name_by_where('users',array('id'=>$this->session->userdata('user_id')),'walet_amount');
            }
            $this->common_model->update_results_info('admissions',array('application_id'=>$input_data['orderId']),$admis_d_update);
            $referer_id=$this->common_model->get_type_name_by_where('admissions',array('application_id'=>$input_data['orderId']),'referer_id');
            if($referer_id!=''){
                $walet=$this->common_model->get_type_name_by_where('users',array('id'=>$referer_id),'walet_amount');
                $refer_money=$this->db->get_where('settings', array('setting_type' => 'refer_money'))->row()->description;
                $amount=$walet+$refer_money;
                $this->common_model->update_results_info('users',array('id'=>$referer_id),array('walet_amount'=>$amount));
            }
if($chec_chec == 1){
    $this->common_model->update_results_info('users',array('id'=>$this->session->userdata('user_id')),array('walet_amount'=>0));
    }
 $admissions_user=$this->common_model->get_type_name_by_where('admissions',array('application_id'=>$input_data['orderId']),'user_id');
 /*Sending Application Payment SMS*/
$user_details=$this->common_model->select_results_info('users',array('id'=>$admissions_user))->row_array();
$body=$this->sms_model->get_my_template('Application Fee Payment');
$message=$this->sms_model->admission_sms($body,$user_details['first_name'],$admission_id);
$this->sms_model->send_sms($message, $user_details['phone']);
/*Sending Application Payment SMS End*/
$ord_details=$this->crud_model->select_results_info('admissions',array('application_id'=>$input_data['orderId']))->row_array();
$ord_student=$this->crud_model->select_results_info('childs',array('id'=>$ord_details['child_id']))->row_array();
$data['name']=$user_details['name'];
$data['heading']='Payment Invoice';
$data['message']='<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>Invoice No: <b>'.$input_data['referenceId'].'</b></td><td>Invoice Date: <b>'.date('Y-m-d H:i:s').'</b><td>
</tr>
<tr>
<td>Application ID: <b>'.$input_data['orderId'].'</b></td>
</tr>
<tr>
<td>Student Name: <b>'.$ord_student['name'].'</b></td>
<tr>
<td>Father: <b>'.$ord_student['father'].'</b></td>
</tr>
<tr>
<td>Class: <b>'.$this->common_model->get_type_name_by_where('classes',array('id'=>$ord_details['class']),'name').'</b></td>
</tr>
<tr>
<td>School: <b>'.$this->common_model->get_type_name_by_where('listings',array('id'=>$ord_details['school_id']),'school_name').'</b></td>
</tr>
<tr>
<td>School Address: <b>'.$this->common_model->get_type_name_by_where('listings',array('id'=>$ord_details['school_id']),'address').'</b></td>
</tr>
</table>

<h3>Payment Summary</h3>

<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<th>Description</th><th>Amount<th>
</tr>
<tr>
<td colspan="2">
<hr/></td></tr>
<tr>
<td>Admission Fee (Including 18% GST)</td>
<td>'.$ord_details['actual_price'].'</td>
</tr>
<tr>
<td>Discount</td>
<td>-'.$ord_details['discount'].'</td>
</tr>
<td colspan="2">
<hr/></td></tr>
<tr>
<tr>
    <td>Total</td>
    <td>Rs. '.$ord_details['total'].'</td>
</tr>
<td colspan="2">
<hr/></td></tr>
<tr>
</table>
<p>Note: This is computer generated invoice. No signature is required</p>
';
$email_message=$this->load->view('template/mail/invoice',$data, true);
$CI =& get_instance();
$system_email = $CI->config->item('site_settings')->system_email;
$res=sendEmail($system_email,$user_details['mail'],'TEFY - Payment Invoice for Admission',$email_message);
/*$e_data=array();
$e_message=$this->load->view('email/invoice',$e_data);
$CI =& get_instance();
$system_email = $CI->config->item('site_settings')->system_email;
sendEmail($system_email,$user_details['email'],'Payment Invoice',$e_message);*/

            $this->session->set_flashdata('success_message','Your Transaction has been successfully processed. Your admission will be confirmed within 24 hrs. You can also track at <a href="'.base_url('student/admissions').'" class="">tefy.in/profile</a>.');
         }else{
            $this->session->set_flashdata('error_message','Payment Not Completed');
         }
         redirect('student/admissions');

    }
  /*  public function get_invoice_data($orderId)
    {
        $this->crud_model->select_results_info('admissions',array('application_id'=>$orderId));

        $message='<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>Invoice No: <b>'.$input_data['referenceId'].'</b></td><td>Invoice Date: <b>2020-03-06 15:18:30</b><td>
</tr>
<tr>
<td>Application ID: <b>'.$input_data['orderId'].'</b></td>
</tr>
<tr>
<td>Student Name: <b>Mahesh</b></td>
<tr>
<td>Father: <b>Prasad</b></td>
</tr>
<tr>
<td>Class: <b>I st Class</b></td>
</tr>
<tr>
<td>School: <b>Vikas</b></td>
</tr>
<tr>
<td>School Address: <b>Hyderabad</b></td>
</tr>
</table>

<h3>Payment Summary</h3>

<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<th>Description</th><th>Amount<th>
</tr>
<tr>
<td colspan="2">
<hr/></td></tr>
<tr>
<td>Admission Fee (Including 18% GST)</td>
<td>1000</td>
</tr>
<tr>
<td>Discount</td>
<td>-500</td>
</tr>
<td colspan="2">
<hr/></td></tr>
<tr>
<tr>
    <td>Total</td>
    <td>Rs. 9,500</td>
</tr>
<td colspan="2">
<hr/></td></tr>
<tr>
</table>
<p>Note: This is computer generated invoice. No signature is required</p>
';
return $message;
    }*/
    public function refer_earn()
    {
        $this->data['title'] = 'Refer & Earn';
        $this->data['content'] = 'refer_earn';
        $this->data['active_menu'] = 'refer_earn';
        $this->_render_page($this->template, $this->data);
    }
}

