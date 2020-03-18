<?php
class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        date_default_timezone_set('Asia/Kolkata');    
        //error_reporting(0);  
$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

        $this->template = 'template/site/main';
    }
    
    public function index(){
        //$product="Product: http://tefy.in/listings-single?school=Vikas%20Concept%20School&school_code=123";
        //$message=$product;
        //echo '<a data-google-event-name="PMJ" data-facebook-event-name="PMJ" target="_blank" title="Share On WhatsApp" href="https://api.whatsapp.com/send?text='.$message.'" class="wc2c-wrap wc2c-floating-circle-right" ><span class="share_pmj"><img src="'.base_url().'assets/frontend/images/share.png"></span></a>';
        //echo urlencode('http://tefy.in/listings-single?school=Vikas%20Concept%20School&school_code=123');die;
        /*$this->load->library('socialmedia');
        $r=$this->socialmedia->GetSocialMediaSites_NiceNames();
        echo "<pre>";
        print_r($r);die;*/
        $this->data['title'] = 'Home';
        $this->data['content'] = 'home';
        $this->data['active_menu'] = 'home';
        $this->common_model->type_of = 'array';
        $this->data['schools'] = $this->common_model->select_results_info('listings',array('row_status'=>1),"id DESC",6);
        $this->_render_page($this->template, $this->data);
    }
   

    public function sms_test($template,$name,$application_id,$number)
    {
        //echo urldecode($template);die;
$body=$this->sms_model->get_my_template(urldecode($template));
//echo $body;die;
/*$rep = ['%%|name^{"inputtype" : "text", "maxlength" : "30"}%%', '%%|application^{"inputtype" : "text", "maxlength" : "15"}%%'];
$rep_by   = [$name, $application];
$message=str_replace($rep,$rep_by,$body);*/
$message=$this->sms_model->admission_sms($body,urldecode($name),urldecode($application_id));
$this->sms_model->send_sms($message, $number);   
    }

function fore_zero_four(){
        $this->data['title'] = '404 Page Not Found';
        $this->data['content'] = 'four_zero_four';
        $this->data['active_menu'] = 'four_zero_four';
    //echo $this->template;die;
        $this->_render_page($this->template, $this->data);
    //$this->load->view('errors/html/error_404');
}
    public function sms_test1()
    {
        //echo urldecode($template);die;
$body=$this->sms_model->get_my_template('Application Submission');
//echo $body;die;
/*$rep = ['%%|name^{"inputtype" : "text", "maxlength" : "30"}%%', '%%|application^{"inputtype" : "text", "maxlength" : "15"}%%'];
$rep_by   = [$name, $application];
$message=str_replace($rep,$rep_by,$body);*/
$name='mahesh';
$application_id='12fdfdf55';
$message=$this->sms_model->admission_sms($body,urldecode($name),urldecode($application_id));
//echo $message;die;
$this->sms_model->send_sms($message, '8121815502');   
    }
    public function contact_us(){
        $this->data['title'] = 'Contact Us';
        $this->data['content'] = 'contact_us';
        $this->data['active_menu'] = 'contact_us';
        $this->_render_page($this->template, $this->data);
    }
    public function about_us(){
        $this->data['title'] = 'About Us';
        $this->data['content'] = 'about_us';
        $this->data['active_menu'] = 'about_us';
        $this->data['condition'] = $this->db->get_where('settings', array('setting_type' => 'about_us'))->row()->description;
        $this->_render_page($this->template, $this->data);
    }
    public function listings_list(){
        $where="(listings.row_status = 1)";
        if(isset($_GET['keyword']) && $_GET['keyword']!=''){
            $where=$where." AND ( listings.keywords LIKE '%".$_GET['keyword']."%' OR  listings.address LIKE '%".$_GET['keyword']."%' OR  listings.school_name LIKE '%".$_GET['keyword']."%' OR  listings.landmark LIKE '%".$_GET['keyword']."%')";
        }
        if(isset($_GET['location']) && $_GET['location']!=''){
            $where=$where." AND (listings.address LIKE '%".$_GET['location']."%' OR listings.landmark LIKE '%".$_GET['location']."%')";
        }
        if(isset($_GET['board']) && $_GET['board']!=''){
            $ca=array();
            for ($i=0; $i < count($_GET['board']); $i++) { 
                $ca[]="listings.curriculum LIKE '%".$_GET['board'][$i]."%'";
            }
            $where=$where." AND (".implode(' OR ',$ca).")";
        }
        if(isset($_GET['medium']) && $_GET['medium']!=''){
            $ca=array();
            for ($i=0; $i < count($_GET['medium']); $i++) { 
                $ca[]="listings.medium LIKE '%".$_GET['medium'][$i]."%'";
            }
            $where=$where." AND (".implode(' OR ',$ca).")";
        }
        if(isset($_GET['category']) && $_GET['category']!=''){
            $ca=array();
            for ($i=0; $i < count($_GET['category']); $i++) { 
                $ca[]="listings.category LIKE '%".$_GET['category'][$i]."%'";
            }
            $where=$where." AND (".implode(' OR ',$ca).")";
        }
        if(isset($_GET['facilities']) && $_GET['facilities']!=''){
             $ca=array();
            for ($i=0; $i < count($_GET['facilities']); $i++) { 
                $ca[]="listings.amenities LIKE '%".$_GET['facilities'][$i]."%'";
            }
            $where=$where." AND (".implode(' OR ',$ca).")";
        }
        $where_cls='';
        if(isset($_GET['class']) && $_GET['class']!=''){
            $where_cls='school_class_prices.class_id = '.$_GET['class'].' AND school_class_prices.tution_fee >= 0 AND school_class_prices.tution_fee <= '.$_GET['tution_fee'];
        }elseif(isset($_GET['class']) && $_GET['class']==''){
            $where_cls='school_class_prices.tution_fee >= 0 AND school_class_prices.tution_fee <= '.$_GET['tution_fee'];
        }
        //$this->common_model->select_listing_results_info($where,$where_cls);die;
        /*if(isset($_GET['class']) && $_GET['class']!=''){
             //$ca=array();
            //for ($i=0; $i < count($_GET['class']); $i++) { 
                $ca="class_name LIKE '%".$_GET['class']."%'";
            //}
            $where=$where." AND (".implode(' OR ',$ca).")";
        }*/
        //print_r($_GET);die;
       //echo $where;die;
 /*       if(isset($_GET['class']) && $_GET['class']!=''){
$count_total_row = $this->common_model->select_results_info('listings',$where ,'id DESC')->result_array();
}else{
$count_total_row=$this->common_model->count_records('listings',$where);
}*/
    
    /*$listings_res=$this->common_model->select_results_info('listings',$where,'id DESC')->result_array();
    $res_arr=array();
    foreach ($listings_res as $my_l) {
        if(isset($_GET['class']) && $_GET['class']!=''){
            $where_cls='listing_id ='.$my_l['id'] .' AND class_id = '.$class_id.' AND tution_fee >= 0 AND tution_fee <= '.$_GET['tution_fee'];
        }elseif(isset($_GET['class']) && $_GET['class']==''){
            $where_cls='listing_id ='.$my_l['id'] .' AND tution_fee >= 0 AND tution_fee <= '.$_GET['tution_fee'];
        }//echo $where_cls;die;
        $re_s=$this->common_model->select_results_info('school_class_prices',$where_cls);
        if($re_s->num_rows()>0){
            $res_arr[]=$my_l;//$re_s->result_array();
        }
    }*/
   /* echo "<pre>";
print_r($res_arr);die;*/
        $config['base_url'] = base_url('listings-list'); //site url
        /*$config['base_url'] = $this->session->userdata('last_page'); //site url*/
        //$config['total_rows'] = $this->common_model->count_records('listings',$where); //total row
        $config['total_rows'] = count($this->common_model->select_listing_results_info($where,$where_cls));
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
        //$this->data['schools'] =  $this->common_model->select_results_info('listings',$where ,'id DESC',$config['per_page'],$this->data['page'])->result_array();
        $this->data['schools'] =  $this->common_model->select_listing_results_info($where,$where_cls ,'listings.id DESC',$config['per_page'],$this->data['page']);
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['title'] = 'listings-list';
        $this->data['content'] = 'listings_list';
        $this->data['active_menu'] = 'listings_list';
        /*$this->data['schools'] = $this->common_model->select_results_info('listings',array('row_status'=>1),'id DESC')->result_array();*/
        $this->_render_page($this->template, $this->data);
    }
    public function listings_single(){
        $this->data['title'] = 'listings-single';
        $this->data['content'] = 'listings_single';
        $this->data['active_menu'] = 'listings_single';

        $this->data['school'] = $this->common_model->select_results_info('listings',array('school_code'=>$_GET['school_code']))->row_array();
        $this->data['list_enc_id']=$this->data['school']['school_code'];
        $this->data['title']=ucwords($this->data['school']['school_name']);

        if($this->input->post()){
            $input=$this->input->post();
            $input_data['rating']=$input['rating'];
            $input_data['review']=$input['review'];
            $input_data['listing_id']=$this->data['school']['id'];;
            $input_data['user_id']=$this->session->userdata('user_id');
            $res=$this->common_model->insert_results_info('ratings',$input_data);
            if($res>0){
                $this->session->set_flashdata('rating_message','Successfully Completed.');
            }else{
                $this->session->set_flashdata('rating_message','Not Completed.');
            }
            redirect($this->session->userdata('last_page'));
        }
        $this->data['meta_keywords'] = $this->data['school']['keywords'];
        $this->data['meta_description'] = $this->data['school']['description'];
        $this->_render_page($this->template, $this->data);
    }

    public function ajax_add_review($list_id){
        $id=base64_decode(base64_decode($list_id));
        if($this->input->post()){
            $input=$this->input->post();
            $input_data['rating']=$input['rating'];
            $input_data['review']=$input['review'];
            $input_data['listing_id']=$id;
            $input_data['user_id']=$this->session->userdata('user_id');
            $res=$this->common_model->insert_results_info('ratings',$input_data);
            if($res>0){
                echo '<div class="notification success closeable"><strong>Review & rating submited successfully</strong></div>';
                /*$this->session->set_flashdata('rating_message','Successfully Completed.');*/
            }else{
                echo '<div class="notification error closeable"><strong>Review & rating not submited</strong></div>';
                /*$this->session->set_flashdata('rating_message','Not Completed.');*/
            }
        }
    }
    public function blog_list(){
        $where="(row_status = 1)";
        if(isset($_GET['keyword']) && $_GET['keyword']!=''){
            $where=$where." AND ( keywords LIKE '%".$_GET['keyword']."%' OR  address LIKE '%".$_GET['keyword']."%' OR  school_name LIKE '%".$_GET['keyword']."%' OR  landmark LIKE '%".$_GET['keyword']."%')";
        }
        
        $config['base_url'] = base_url('blogs'); //site url
        /*$config['base_url'] = $this->session->userdata('last_page'); //site url*/
        $config['total_rows'] = $this->common_model->count_records('blogs',$where); //total row
       // print_r($config);die;
        $config['per_page'] = 6;  //show record per halaman
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
        $this->data['blogs'] =  $this->common_model->select_results_info('blogs',$where ,'id DESC',$config['per_page'],$this->data['page'])->result_array();
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['title'] = 'Blogs';
        $this->data['content'] = 'blog';
        $this->data['active_menu'] = 'blog';
        /*$this->data['schools'] = $this->common_model->select_results_info('listings',array('row_status'=>1),'id DESC')->result_array();*/
        $this->_render_page($this->template, $this->data);
    }
    public function blog(){
        $this->data['title'] = 'Blog-Single';
        $this->data['content'] = 'blog_single';
        $this->data['active_menu'] = 'blog_single';

        $this->data['blog'] = $this->common_model->select_results_info('blogs',array('id'=>$_GET['blog']))->row_array();
        if($this->input->post()){
            $input=$this->input->post();
            $input_data['review']=$input['review'];
            $input_data['blog_id']=$_GET['blog'];
            $input_data['user_id']=$this->session->userdata('user_id');
            $res=$this->common_model->insert_results_info('blog_reviews',$input_data);
            if($res>0){
                $this->session->set_flashdata('rating_message','Successfully Completed.');
            }else{
                $this->session->set_flashdata('rating_message','Not Completed.');
            }
            redirect($this->session->userdata('last_page'));
        }
        $this->data['title']=ucwords($this->data['blog']['title']);
        $this->data['meta_keywords'] = $this->data['blog']['keywords'];
        //$this->data['meta_description'] = $this->data['blog']['desc'];
        $this->_render_page($this->template, $this->data);
    }

    public function apply_admission()
    {
        $this->data['title'] = 'Admission Form';
        $this->data['content'] = 'admission_form';
        $this->data['active_menu'] = 'admission_form';

        $this->data['school'] = $this->common_model->select_results_info('listings',array('school_code'=>$_GET['school_code']))->row_array();
        $this->data['list_enc_id']=$this->data['school']['school_code'];
        if($this->input->post()){
            $input=$this->input->post();
            /*print_r($input);die;*/
            $ref=$this->common_model->get_type_name_by_where('users',array('id != '=>$this->session->userdata('user_id'),'unique_id'=>$input['referer']),'id');
            $input_data['school_id']=$input['school_id'];
            $input_data['category']=$input['category'];
            $input_data['medium']=$input['medium'];
            $input_data['class']=$input['class'];
            $input_data['child_id']=$input['child'];
            if($input['discount_id'] != ''){
            $input_data['coupon']=$input['my_coupon'];
            $input_data['discount']=$input['coupon_discount'];
            $input_data['discount_id']=$input['discount_id'];
            }
            $input_data['total']=$input['total'];
            $input_data['actual_price']=$input['actual_price'];
            $input_data['admission_status']=1;
            if($ref != ''){
            $input_data['referer_id']=$ref;
            }
            $input_data['user_id']=$this->session->userdata('user_id');
            $res=$this->common_model->insert_results_info('admissions',$input_data);
            if($res>0){
                /*if($input['discount_id'] != ''){
                $dis_in['user_id']=$input_data['user_id'];
                $dis_in['coupon']=$input_data['coupon'];
                $dis_in['discount']=$input_data['discount'];
                $dis_in['discount_id']=$input_data['discount_id'];
                $res=$this->common_model->insert_results_info('used_promo_codes',$dis_in);
                }*/
                /*if($ref != ''){
                    $ref_amount=$this->db->get_where('settings', array('setting_type' => 'refer_money'))->row()->description; 
                    
                }*/
                $pid=$this->common_model->generate_application_id($input_data['user_id'],$input_data['school_id']);
                $admission_id=date('y').$pid.$res;
        $this->db->where('id',$res)->update('admissions',array('application_id'=>$admission_id,'modified_at'=>date('Y-m-d H:i:s')));

/*Sending Application Submission SMS*/
$user_details=$this->common_model->select_results_info('users',array('id'=>$this->session->userdata('user_id')))->row_array();
$body=$this->sms_model->get_my_template('Application Submission');
$message=$this->sms_model->admission_sms($body,$user_details['first_name'],$admission_id);
$this->sms_model->send_sms($message, $user_details['phone']);
/*Sending Application Submission SMS End*/

$data['name']=$user_details['name'];
$data['heading']='Application Submission';
$data['message']='Your application has been successfully submitted. Track your application status at <a href="'.base_url('student/admissions').'">tefy.in/profile</a>';
$email_message=$this->load->view('template/mail/invoice',$data, true);
$CI =& get_instance();
$system_email = $CI->config->item('site_settings')->system_email;
$res=sendEmail($system_email,$user_details['mail'],'TEFY - Application Submission',$email_message);
$res=sendEmail($system_email,$system_email,'New Application Submitted',$email_message);
/*<a href="'.$this->session->userdata('last_page').'">Go Back To School: <b>'.$_GET['school'].'</b></a><br/>*/
                $this->session->set_flashdata('admission_message','<div class="col-md-12 promo-confirmation"><div class="booking-confirmation-page"><i class="fa fa-check-circle"></i><h2 class="margin-top-0">Submitted successfully, Go to previous tab in your browser and Refresh the page to apply Admission. Track your application status at <a href="'.base_url('student/admissions').'" class="button tf-black" style="margin-bottom:-10px;">Admission Status</a></h2></div></div>');
            }else{
                $this->session->set_flashdata('admission_message','<div class="col-md-12 promo-confirmation"><div class="booking-confirmation-page"><i class="fa fa-times wrong"></i><h2 class="margin-top-0">Admission Application Failed</h2><a href="'.$this->session->userdata('last_page').'" >Go Back To School: <b>'.$_GET['school'].'</b></a></div></div>');
            }
            redirect($this->session->userdata('last_page1'));
        }
        $this->data['meta_keywords'] = $this->data['school']['keywords'];
        $this->data['meta_description'] = $this->data['school']['description'];
        $this->_render_page($this->template, $this->data);
    }

    // create a new user
    public function create_user()
    {
        $this->data['title'] = $this->lang->line('create_user_heading');
/*
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }*/

        $tables = $this->config->item('tables','ion_auth');
        $identity_column = $this->config->item('identity','ion_auth');
        $this->data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
        if($identity_column!=='email')
        {
            $this->form_validation->set_rules('identity',$this->lang->line('create_user_validation_identity_label'),'required|is_unique['.$tables['users'].'.'.$identity_column.']');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
        }
        else
        {
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        }
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
        $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true)
        {
            $email    = strtolower($this->input->post('email'));
            $identity = ($identity_column==='email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'company'    => $this->input->post('company'),
                'phone'      => $this->input->post('phone'),
            );
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data))
        {
            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("auth", 'refresh');
        }
        else
        {
            // display the create user form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['first_name'] = array(
                'name'  => 'first_name',
                'id'    => 'first_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name'  => 'last_name',
                'id'    => 'last_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['identity'] = array(
                'name'  => 'identity',
                'id'    => 'identity',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['email'] = array(
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['company'] = array(
                'name'  => 'company',
                'id'    => 'company',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('company'),
            );
            $this->data['phone'] = array(
                'name'  => 'phone',
                'id'    => 'phone',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('phone'),
            );
            $this->data['password'] = array(
                'name'  => 'password',
                'id'    => 'password',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            $this->_render_page('auth/create_user', $this->data);
        }
    }
    public function test_mail($value='')
    {
        /*sendEmail('mahi@gmail.com','maheshbt.grepthor@gmail.com','Testing Tefy MAil','hello this is for testing.');*/
        /*$r=$this->load->view('email/invoice.php');*/
        $data['name']='Mahesh';
        $data['heading']="Test Mail";
        $data['message']='<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>Invoice No: <b>123456</b></td><td>Invoice Date: <b>2020-03-06 15:18:30</b><td>
</tr>
<tr>
<td>Application ID: <b>123456</b></td>
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
<p>Note: This is computer generated invoice. No signature is required</p>';
        $email_message=$this->load->view('template/mail/invoice',$data, true);
        $CI =& get_instance();
        $system_email = $CI->config->item('site_settings')->system_email;
        $res=sendEmail($system_email,'maheshbt.grepthor@gmail.com','Payment Invoice',$email_message);
        if($res){
            echo "s";
        }else{
            echo "no";
        }
    }
    public function get_in_touch(){
        $input=$this->input->post();
        $input_data['name']=$input['name'];
        $input_data['email']=$input['email'];
        $input_data['mobile']=$input['mobile'];
        $input_data['message']=$input['query'];
     $message='<table>
                    <tr>
                        <td>Name: </td>
                        <td>'.$input['name'].'</td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td>'.$input['email'].'</td>
                    </tr>
                    <tr>
                        <td>Mobile: </td>
                        <td>'.$input['mobile'].'</td>
                    </tr>
                    <tr>
                        <td>Message: </td>
                        <td>'.$input['query'].'</td>
                    </tr>
               </table>';

               $CI =& get_instance();
$system_email = $CI->config->item('site_settings')->system_email;
               sendEmail($system_email,$system_email,'Get In Touch With Tefy',$message);

        $res=$this->common_model->insert_results_info('get_in_touch',$input_data);
        if($res>0){
            $this->session->set_flashdata('touch_message', 'Thank you, We will get back to you soon..!');
            }else{
            $this->session->set_flashdata('touch_message', 'Not Inserted');
            }
            redirect($this->session->userdata('last_page'));
/*        $this->data['title'] = 'listings-single';
        $this->data['content'] = 'listings_single';
        $this->data['active_menu'] = 'listings_single';
        $this->data['school'] = $this->common_model->select_results_info('listings',array('id'=>$id))->row_array();
        $this->_render_page($this->template, $this->data);*/
    }
    public function add_bookmark($listing_id)
    {
        if ($this->ion_auth->logged_in()){
            $count=$this->common_model->select_results_info('bookmarks',array('listing_id'=>$listing_id,'user_id'=>$this->session->userdata('user_id')));
            if($count->num_rows()==1){
                $list=$count->row_array();
                if($list['row_status']==1){
                    $input_data['row_status']=2;    
                }elseif($list['row_status']==2){
                    $input_data['row_status']=1;
                }
                
                $this->common_model->update_results_info('bookmarks',array('id'=>$list['id']),$input_data);
            }else{
                $input_data['user_id']=$this->session->userdata('user_id');
                $input_data['listing_id']=$listing_id;
                $this->common_model->insert_results_info('bookmarks',$input_data);
            }
            return true;
            //echo $listing_id;
        }
    }
    public function get_reviews($rowno=0){
//echo $rowno;echo $list_enc_id;
    // Row per page
    $rowperpage = 5;
    $listing_id=$_GET['listing_id'];
    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
    $where=array('listing_id'=>$listing_id,'row_status'=>1);
    $allcount = $this->common_model->count_records('ratings',$where);

    // Get records
    $users_record = $this->common_model->select_results_info('ratings',$where ,'id DESC',$rowperpage,$rowno)->result_array();
 
    // Pagination Configuration
    $config['base_url'] = base_url().'home/get_reviews/';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
    $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagination-container margin-top-30"><nav class="pagination"><ul>';
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
    // Initialize
    $this->pagination->initialize($config);

    // Initialize $data Array
    $data['pagination'] = $this->pagination->create_links();
    $resul='';
  /*  foreach ($users_record as $res) {
        $resul .= '<li><div class="avatar"><img src="'.base_url().$this->common_model->get_image_url('users',$res['user_id']).'" alt="" /><div class="comment-by">'.ucwords($this->common_model->get_type_name_by_where('users',array('id'=>$res['user_id']),'username')).'<span class="date">'.date('M Y',strtotime($res['created_at'])).'</span></div></div><div class="comment-content"><div class="arrow-comment"></div><p class="more1">'.$res['review'].'.</p><div class="star-rating" data-rating="'.$res['rating'].'"></div></div></li>';
    }*/

    $me=0;foreach ($users_record as $res) {
    $resul .= '<div class="message-bubble">
    <div class="message-avatar"><img src="'.base_url().$this->common_model->get_image_url('users',$res['user_id']).'" alt=""><br/><span class="date">'.date('M Y',strtotime($res['created_at'])).'</span></div>
                <div class="message-text"><p><b>'.ucwords($this->common_model->get_type_name_by_where('users',array('id'=>$res['user_id']),'first_name')).'</b>';

              $resul .= '<span class="star-rating" data-rating="'.$res['rating'].'">';
              $ra='';
              for($r=0;$r<5;$r++){
                if($res['rating'] < ($r+1)){
                    $ra .='<span class="star empty"></span>';
                }else{
                    $ra .='<span class="star"></span>';
                } 
              }
              
                            
            $resul .= $ra.'</span>
                    </p><p>'.$res['review'].'.</p></div>
              </div>';
    $me++;}
    
    /*$data['result'] = $users_record;*/
    $data['result'] = $resul;
    $data['row'] = $rowno;

    echo json_encode($data);
 
  }

      public function get_blogs($rowno=0){
//echo $rowno;echo $list_enc_id;
    // Row per page
    $rowperpage = 6;
    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    
    // All records count
    $where="(row_status = 1)";
        if(isset($_GET['keyword']) && $_GET['keyword']!=''){
            $where=$where." AND ( keywords LIKE '%".$_GET['keyword']."%' OR  title LIKE '%".$_GET['keyword']."%' OR  short_note LIKE '%".$_GET['keyword']."%' OR  desc LIKE '%".$_GET['keyword']."%')";
        }
        $allcount = $this->common_model->count_records('blogs',$where); 
    
    // Get records
    $users_record = $this->common_model->select_results_info('blogs',$where ,'id DESC',$rowperpage,$rowno)->result_array();
 
    // Pagination Configuration
    $config['base_url'] = base_url().'home/get_blogs/';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
    $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagination-container margin-top-30"><nav class="pagination"><ul>';
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
    // Initialize
    $this->pagination->initialize($config);

    // Initialize $data Array
    $data['pagination'] = $this->pagination->create_links();
    $resul='';
if($users_record !=''){
    $me=0;foreach ($users_record as $blog) {
              $resul .='<div class="col-md-4 col-sm-4">
                    <a href="'.base_url('blog?title='.$blog['title'].'&blog='.$blog['id'].'&created='.$blog['created_at']).'">
                        <div class="blog-compact-item">
                            <img src="'.base_url('uploads/blogs/').$blog['id'].'.jpg'.'" alt="">
                            <div class="blog-compact-item-content">
                                <ul class="blog-post-tags">
                                    <li>'.date('d M Y',strtotime($blog['created_at'])).'</li>
                                </ul>
                                <h3>'.ucwords($blog['title']).'</h3>
                                <p>'.$blog['short_note'].'</p>
                            </div>
                        </div>
                    </a>
                </div>';
    $me++;}}
    
    /*$data['result'] = $users_record;*/
    if($resul ==''){
        $resul='No Blog Data Found';
    }
    $data['result'] = $resul;
    $data['row'] = $rowno;

    echo json_encode($data);
 
  }
   public function get_comments($rowno=0){

    $rowperpage = 5;
    $blog_id=$_GET['blog_id'];

    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
    $where=array('blog_id'=>$blog_id,'row_status'=>1);
    $allcount = $this->common_model->count_records('blog_reviews',$where);

    // Get records
    $users_record = $this->common_model->select_results_info('blog_reviews',$where ,'id DESC',$rowperpage,$rowno)->result_array();
 
    // Pagination Configuration
    $config['base_url'] = base_url().'home/get_comments/';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
    $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagination-container margin-top-30"><nav class="pagination"><ul>';
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
    // Initialize
    $this->pagination->initialize($config);

    // Initialize $data Array
    $data['pagination'] = $this->pagination->create_links();
    $resul='';
if(!empty($users_record)){
    $resul .= '<ul>';
    $me=0;foreach ($users_record as $res) {
    $reply=$this->common_model->select_results_info('blog_review_replay',array('blog_review_id'=>$res['id']))->result_array();

                    $btn='';
                    $cls='';
                    $a_href='#';
                    if ($this->ion_auth->logged_in()){
                        $btn='onclick="return replay_comment('.$res['id'].');"';
                        $rep_name='Reply';
                    }else{
                        $cls='popup-with-zoom-anim';
                        $a_href='href="#sign-in-dialog"';
                        $rep_name='Login To Reply';
                    }
        $resul .= '<li>
                        <div class="avatar"><img src="'.base_url().$this->common_model->get_image_url('users',$res['user_id']).'" alt=""></div>
                        <div class="comment-content"><div class="arrow-comment"></div>
                            <div class="comment-by">'.ucwords($this->common_model->get_type_name_by_where('users',array('id'=>$res['user_id']),'first_name')).'<span class="date">'.date('d M Y',strtotime($res['created_at'])).'</span>
                                <a  '. $a_href .' class="reply '. $cls .'"  '. $btn .'><i class="fa fa-reply"></i> '.$rep_name.'</a>
                            </div>
                            <p>'.$res['review'].'</p>
                            <div id="replaybox_'.$res['id'].'"></div>
                        </div>';
if(!empty($reply)){
                        $resul .= '<ul>';
                        foreach ($reply as $rep) {
                            $btn='';
                    $cls='';
                    $a_href='#';
                    if ($this->ion_auth->logged_in()){
                        $btn='onclick="return replay_comment('.$res['id'].','.$rep['id'].');"';
                        $rep_name='Reply';
                    }else{
                        $cls='popup-with-zoom-anim';
                        $a_href='href="#sign-in-dialog"';
                        $rep_name='Login To Reply';
                    }
                            $resul .= '<li>
                                <div class="avatar"><img src="'.base_url().$this->common_model->get_image_url('users',$rep['user_id']).'" alt=""></div>
                                <div class="comment-content"><div class="arrow-comment"></div>
                                    <div class="comment-by">'.ucwords($this->common_model->get_type_name_by_where('users',array('id'=>$rep['user_id']),'first_name')).'<span class="date">'.date('d M Y',strtotime($rep['created_at'])).'</span>
                                        <a  '. $a_href .' class="reply '. $cls .'"  '. $btn .'><i class="fa fa-reply"></i> '.$rep_name.'</a>
                                    </div>
                                    <p>'.$rep['review'].'</p>
                                    <div id="replaybox_'.$res['id'].'_'.$rep['id'].'"></div>
                                </div>
                            </li>';
                        }
                        $resul .= '</ul>';
                    }
                    $resul .= '</li>';

    $me++;}
    $resul .= '</ul>';
}

    $data['result'] = $resul;
    $data['row'] = $rowno;

    echo json_encode($data);
 
  }
  public function submit_replay_comments()
  {
      $reply=$_GET['replay'];
      $review=$_GET['review'];
      $sub_replay=$_GET['sub_replay'];
      $input_data=array(
        'blog_review_id'=>$reply,
        'review'=>$review,
        'user_id'=>$this->session->userdata('user_id')
      );
      $rep=$this->common_model->insert_results_info('blog_review_replay',$input_data);
      if($rep>0){
        echo "Submited Successfully";
      }else{
        echo "Not Submited";
      }
  }
    public function loadRecord($rowno=0){

    // Row per page
    $rowperpage = 5;

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
    $where=array('row_status'=>1);
    $allcount = $this->common_model->count_records('ratings',$where);

    // Get records
    $users_record = $this->common_model->select_results_info('ratings',$where ,'id DESC',$rowperpage,$rowno)->result_array();
    // Pagination Configuration
    $config['base_url'] = base_url().'home/loadRecord';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;

    // Initialize
    $this->pagination->initialize($config);

    // Initialize $data Array
    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $users_record;
    $data['row'] = $rowno;

    echo json_encode($data);
 
  }
  public function conditions($type){
        if($type=='terms'){
            $title='Terms & Conditions';
        }elseif($type=='privacy'){
            $title='Privacy Policy';
        }
/*        $page_data['page_title'] = $title;
        $page_data['page_name'] = 'conditions';
        $page_data['condition'] = $this->db->get_where('settings', array('setting_type' => $type))->row()->description;
        $page_data['type'] = $type;*/

        $this->data['title'] = $title;
        $this->data['content'] = 'terms';
        $this->data['active_menu'] = 'terms';
        $this->data['type'] = $type;
        $this->data['condition'] = $this->db->get_where('settings', array('setting_type' => $type))->row()->description;
        $this->_render_page($this->template, $this->data);
    }
    public function get_my_childs($listing_id,$class_id)
        {
            $sc_p=$this->common_model->select_results_info('school_class_prices',array('listing_id'=>$listing_id,'class_id'=>$class_id))->row_array();
            $childs=$this->common_model->select_results_info('childs',array('user_id'=>$this->session->userdata('user_id'),'join_class'=>$class_id))->result_array();
            $re='';
            if(!empty($childs)){
            $re .='<option value=""> --Select Student Profile-- </option>';
            foreach ($childs as $chi) {
                $chi_ad=$this->common_model->select_results_info('admissions',array('school_id'=>$listing_id,'child_id'=>$chi['id']))->row_array();
                $re .='<option value="'.$chi['id'].'" '.(($chi_ad != '')? 'disabled' : '').'>'.$chi['name'].' ('.(($chi_ad != '')? 'This student applied for this school.' : '').')</option>';
            }
        }else{
            $re .='<option value=""> --No Student Profile Available-- </option>';
        }
        $data['childs'] = $re;
        $data['admission_fee'] = $sc_p['admission_fee'];

        echo json_encode($data);
        }
        public function checkCoupon()
        {
            $listing_id=$_GET['my_school'];
            $class_id=$_GET['my_class'];
            $coupon=$_GET['my_coupon'];
            $where='row_status = 1 AND promo_code = "'.$coupon. '" AND valid_from <= "'.date('Y-m-d').'" AND valid_to >= "'.date('Y-m-d').'"';
            $promo_code=$this->common_model->select_results_info('promo_codes',$where)->row_array();

            $data['status']=0;
            if($promo_code){
                /*if($promo_code['promo_type']==1 || $promo_code['promo_type'] == 2){
                    if($promo_code['disc'])
                }else*/
                $stat=0;
                if($promo_code['promo_type']==3){
                    $school=json_decode($promo_code['school']);
                    $class=json_decode($promo_code['class']);
                    if (in_array($listing_id, $school) && in_array($class_id, $class))
                    {
                        $stat=1;
                    }
                }elseif($promo_code['promo_type']==2){
                    $stat=1;
                }


                if($stat==1){
                    $school_price=$this->common_model->select_results_info('school_class_prices',array('listing_id'=>$listing_id,'class_id'=>$class_id))->row_array();
                    $admission_fee=$school_price['admission_fee'];
                    if($promo_code['discount_type']==1){
                        $dis_amount=$promo_code['discount'];
                    }elseif($promo_code['discount_type']==2){
                        $dis_amount=(($admission_fee * $promo_code['discount'])/100);
                    }
                    $data['discount_id']=$promo_code['id'];
                    $data['discount']=$dis_amount;
                    $data['total']=$admission_fee-$dis_amount;
                    $data['status']=1;
                }

        }

        //print_r($data);die;
        echo json_encode($data);
    }

}

