<?php

class Admin extends MY_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        date_default_timezone_set('Asia/Kolkata');    
        error_reporting(0);  
$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

        $this->template = "template/admin/main";
        check_access('admin');

        $this->load->model('admin_model');
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
    
    public function check_school_code_unique($value='')
    {
        $validation=$this->common_model->select_results_info('listings',array('school_code'=>$value))->num_rows();
            if($validation != 0){
                $this->form_validation->set_message('check_school_code_unique','School Code Existed');
                return false;
            }
            return true;
    }
    public function admissions(){
        $this->data['title'] = 'Admissions';
        $this->data['content'] = 'admissions';
        $this->data['active_menu'] = 'admissions';
        $this->_render_page($this->template, $this->data);
    }
    public function admission_form_view($id){
        $this->data['promo']=$this->common_model->select_results_info('admissions',array('id'=>$id))->row_array();
        $this->data['title'] = 'Admission View';
        $this->data['content'] = 'admission_form_view';
        $this->data['active_menu'] = 'admissions_form_view';
        $this->_render_page($this->template, $this->data);
    }
    public function admission_status_change()
    {
        $data['status']=0;
        $array=array(
            'admission_status'=>$_POST['admission_status'],
        );

        $res=$this->common_model->update_results_info('admissions',array('id'=>$_POST['admission_id']),$array);
        if($res){
if($_POST['admission_status']==3 || $_POST['admission_status']==5){
            $admissions_user=$this->common_model->get_type_name_by_where('admissions',array('id'=>$_POST['admission_id']),'user_id');

            /*Sending Application Cancelled SMS*/
$user_details=$this->common_model->select_results_info('users',array('id'=>$admissions_user))->row_array();
if($_POST['admission_status']==3){
    $app='Application Approved';
}elseif($_POST['admission_status']==5){
    $app='Application Confirmation';
}
$body=$this->sms_model->get_my_template($app);
$message=$this->sms_model->admission_sms($body,$user_details['first_name'],$admission_id);
$this->sms_model->send_sms($message, $user_details['phone']);
/*Sending Application Cancelled SMS End*/

}
            //$data['test']=json_encode($_POST).','.$this->db->last_query();
            $data['status']=1;
        }
       echo json_encode($data);
    }
    public function cancel_admission()
    {
        $data['status']=0;
        $array=array(
            'admission_status'=>6,
            'reason'=>$_POST['reason'],
        );

        $res=$this->common_model->update_results_info('admissions',array('id'=>$_POST['admission_id']),$array);
        if($res){
            $admissions_user=$this->common_model->get_type_name_by_where('admissions',array('id'=>$_POST['admission_id']),'user_id');
            /*Sending Application Cancelled SMS*/
$user_details=$this->common_model->select_results_info('users',array('id'=>$admissions_user))->row_array();
$body=$this->sms_model->get_my_template('Application Cancelled');
$message=$this->sms_model->admission_sms($body,$user_details['first_name'],$admission_id);
$this->sms_model->send_sms($message, $user_details['phone']);
/*Sending Application Cancelled SMS End*/

            $data['status']=1;
        }
       echo json_encode($data);
    }
    public function add_listing(){
        if($this->input->post()){
            $this->form_validation->set_rules('school_name', 'School Name', 'trim|required');
            $this->form_validation->set_rules('school_code', 'School Code', 'trim|required|callback_check_school_code_unique');
            $this->form_validation->set_rules('category[]', 'Category', 'required');
            $this->form_validation->set_rules('keywords', 'Keywords', 'trim|required');
            $this->form_validation->set_rules('curriculum', 'Curriculum', 'required');
            $this->form_validation->set_rules('school_type', 'Co-Education Status', 'required');
            $this->form_validation->set_rules('school_format', 'Format Status', 'required');
            $this->form_validation->set_rules('hostels', 'Hostel facility', 'required');
            $this->form_validation->set_rules('class', 'Classes', 'required');
            $this->form_validation->set_rules('price_from', 'Price From', 'required');
            $this->form_validation->set_rules('transport_fee', 'Transport Fee', 'required');
            $this->form_validation->set_rules('price_from', 'Price From', 'required');
            $this->form_validation->set_rules('transport_fee', 'Transport Fee', 'required');
            $this->form_validation->set_rules('medium[]', 'Medium', 'required');
            /*$this->form_validation->set_rules('founders_name', 'Founders Name', 'trim|required');
            $this->form_validation->set_rules('brand_name', 'Brand Name', 'trim|required');
            $this->form_validation->set_rules('no_of_branches', 'Number of Branches', 'trim|required');
            $this->form_validation->set_rules('est_year', 'Year of Establishment of brand', 'trim|required');
            $this->form_validation->set_rules('est_branch_year', 'Year of Establishment of the specific branch', 'trim|required');
            $this->form_validation->set_rules('faculty_exp', 'Average Expirience of Faculty', 'trim|required');
            $this->form_validation->set_rules('alumni', 'Alumni', 'trim|required');*/
            $this->form_validation->set_rules('principal_number', 'Councellor/Principal number', 'trim|required');
            $this->form_validation->set_rules('telephone_number', 'Telephone Number', 'trim|required');
            $this->form_validation->set_rules('school_email', 'Email', 'trim|required');
            $this->form_validation->set_rules('admission_procedure', 'Admission Procedure', 'trim|required');
            $this->form_validation->set_rules('landmark', 'Area Landmark', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('address_url', 'Address URL
', 'trim|required');
            $this->form_validation->set_rules('vision', 'Vision', 'trim|required');
            $this->form_validation->set_rules('description', 'Description
', 'trim|required');
            $this->form_validation->set_rules('admission_status', 'Admission Status', 'required');
        if ($this->form_validation->run() == true)
            {
            $input=$this->input->post();
           /* echo "<pre>";
            print_r($_POST);
            print_r($_FILES);die;*/
            $input_data['school_name']=$input['school_name'];
            $input_data['school_code']=$input['school_code'];
            $input_data['category']=json_encode($input['category']);
            $input_data['keywords']=$input['keywords'];
            $input_data['curriculum']=$input['curriculum'];
            $input_data['school_type']=$input['school_type'];
            $input_data['school_format']=$input['school_format'];
            $input_data['hostels']=$input['hostels'];
            $input_data['class']=$input['class'];
            $input_data['price_from']=$input['price_from'];
            $input_data['transport_fee']=$input['transport_fee'];
            $input_data['medium']=json_encode($input['medium']);
            $input_data['founders_name']=$input['founders_name'];
            $input_data['brand_name']=$input['brand_name'];
            $input_data['no_of_branches']=$input['no_of_branches'];
            $input_data['est_year']=$input['est_year'];
            $input_data['est_branch_year']=$input['est_branch_year'];
            $input_data['faculty_exp']=$input['faculty_exp'];
            $input_data['alumni']=$input['alumni'];
            $input_data['principal_number']=$input['principal_number'];
            $input_data['telephone_number']=$input['telephone_number'];
            $input_data['school_email']=$input['school_email'];
            $input_data['admission_procedure']=$input['admission_procedure'];
            $input_data['landmark']=$input['landmark'];
            $input_data['latitude']=$input['latitude'];
            $input_data['longitude']=$input['longitude'];
            $input_data['address']=$input['address'];
            $input_data['address_url']=$input['address_url'];
            $input_data['video']=$input['video'];
            $input_data['vision']=$input['vision'];
            $input_data['description']=$input['description'];
            $input_data['phone']=$input['phone'];
            $input_data['website']=$input['website'];
            $input_data['email']=$input['email'];
            $input_data['facebook']=$input['facebook'];
            $input_data['twitter']=$input['twiter'];
            $input_data['youtube']=$input['youtube'];
            $input_data['amenities']=json_encode($input['amenities']);
            $input_data['bus_routes']=$input['bus_routes'];
            $input_data['sports']=$input['sports'];
            $input_data['opening_hours']=json_encode(
                array('opening_time'=>$input['opening_time'],'closing_time'=>$input['closing_time'])
            );
            $input_data['achievements']=json_encode($input['achievements']);
            $input_data['class_name']=json_encode($input['class_name']);
            $input_data['admission_fee']=json_encode($input['admission_fee']);
            $input_data['tution_fee']=json_encode($input['tution_fee']);
            $input_data['admission_status']=$input['admission_status'];
            /*echo count($_FILES['gallery']['name']);
            echo "<pre>";
            print_r($_FILES);
            echo "<pre>";
            print_r($input);
            echo "<pre>";
            print_r($input_data);
            die;*/
            $res=$this->common_model->insert_results_info('listings',$input_data);
            if($res>0){
                $this->session->set_flashdata('success_message','Added Successfully');
$cl=0;
for($cl=0;$cl<count($input['class_name']);$cl++) {
    $input_cls['class_id']=$input['class_name'][$cl];
            $input_cls['admission_fee']=$input['admission_fee'][$cl];
            $input_cls['tution_fee']=$input['tution_fee'][$cl];
            $input_cls['listing_id'] =$res;
            $this->common_model->insert_results_info('school_class_prices',$input_cls);
}


    /*move_uploaded_file($_FILES["banner"]["tmp_name"], "uploads/listings/banners/". $res.'.jpg');*/
    move_uploaded_file($_FILES["thumb"]["tmp_name"], "uploads/listings/thumb/". $res.'.jpg');

    $directory = FCPATH . 'uploads/listings/gallery/';
    $mypath=FCPATH.'uploads/listings/gallery/'.$res;
    $file = file_get_contents(base_url('uploads/index.html'));
    if(!is_dir($mypath)){
        mkdir($directory . '/' . $res, 0777);
        write_file(FCPATH.'uploads/listings/gallery/'. $res.'/index.html', $file);
    }
    for($j=0;$j<count($_FILES['gallery']['name']);$j++){
    $gallery_data['listing_id']=$res;
    $gallery_data['image']=$_FILES['gallery']['name'][$j];
    $g_id=$this->common_model->insert_results_info('listing_gallery',$gallery_data);
    move_uploaded_file($_FILES["gallery"]["tmp_name"][$j], "uploads/listings/gallery/". $res.'/'.$g_id.'.jpg');
    }


    $directory1 = FCPATH . 'uploads/listings/banners/';
    $mypath1=FCPATH.'uploads/listings/banners/'.$res;
    $file1 = file_get_contents(base_url('uploads/index.html'));
    if(!is_dir($mypath1)){
        mkdir($directory1 . '/' . $res, 0777);
        write_file(FCPATH.'uploads/listings/banners/'. $res.'/index.html', $file1);
    }
    for($k=0;$k<count($_FILES['banner']['name']);$k++){
    $gallery_data['listing_id']=$res;
    $gallery_data['image']=$_FILES['banner']['name'][$k];
    $g_id=$this->common_model->insert_results_info('listing_banner',$gallery_data);
    move_uploaded_file($_FILES["banner"]["tmp_name"][$k], "uploads/listings/banners/". $res.'/'.$g_id.'.jpg');
    }

            }else{
                $this->session->set_flashdata('error_message','Not Added');
            }
            redirect('admin/add_listing');
        }
        }
        $this->data['title'] = 'Add Listing';
        $this->data['content'] = 'add_listing';
        $this->data['active_menu'] = 'add_listing';
        $this->_render_page($this->template, $this->data);
    }
    public function check_school_code($value='')
    {
        $validation=$this->common_model->select_results_info('listings',array('id !='=>$_POST['listing_id'],'school_code'=>$value))->num_rows();
            if($validation != 0){
                $this->form_validation->set_message('check_school_code','School Code Existed');
                return false;
            }
            return true;
    }
    public function edit_listing($id){
        $listing_id=base64_decode(base64_decode($id));
        if($this->input->post()){
            if($this->input->post('list_type')=='list'){
            $_POST['listing_id']=$listing_id;
             $this->form_validation->set_rules('school_name', 'School Name', 'trim|required');
            $this->form_validation->set_rules('school_code', 'School Code', 'trim|required|callback_check_school_code');
            $this->form_validation->set_rules('category[]', 'Category', 'required');
            $this->form_validation->set_rules('keywords', 'Keywords', 'trim|required');
            $this->form_validation->set_rules('curriculum', 'Curriculum', 'required');
            $this->form_validation->set_rules('school_type', 'Co-Education Status', 'required');
            $this->form_validation->set_rules('school_format', 'Format Status', 'required');
            $this->form_validation->set_rules('hostels', 'Hostel facility', 'required');
            $this->form_validation->set_rules('class', 'Classes', 'required');
            $this->form_validation->set_rules('price_from', 'Price From', 'required');
            $this->form_validation->set_rules('transport_fee', 'Transport Fee', 'required');
            $this->form_validation->set_rules('medium[]', 'Medium', 'required');
/*            $this->form_validation->set_rules('founders_name', 'Founders Name', 'trim|required');
            $this->form_validation->set_rules('brand_name', 'Brand Name', 'trim|required');
            $this->form_validation->set_rules('no_of_branches', 'Number of Branches', 'trim|required');
            $this->form_validation->set_rules('est_year', 'Year of Establishment of brand', 'trim|required');
            $this->form_validation->set_rules('est_branch_year', 'Year of Establishment of the specific branch', 'trim|required');
            $this->form_validation->set_rules('faculty_exp', 'Average Expirience of Faculty', 'trim|required');
            $this->form_validation->set_rules('alumni', 'Alumni', 'trim|required');*/
            $this->form_validation->set_rules('principal_number', 'Councellor/Principal number', 'trim|required');
            $this->form_validation->set_rules('telephone_number', 'Telephone Number', 'trim|required');
            $this->form_validation->set_rules('school_email', 'Email', 'trim|required');
            $this->form_validation->set_rules('admission_procedure', 'Admission Procedure', 'trim|required');
            $this->form_validation->set_rules('landmark', 'Area Landmark', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('address_url', 'Address URL
', 'trim|required');
            $this->form_validation->set_rules('vision', 'Vision', 'trim|required');
            $this->form_validation->set_rules('description', 'Description
', 'trim|required');
            $this->form_validation->set_rules('admission_status', 'Admission Status', 'required');
            /*$validation=$this->common_model->select_results_info('listings',array('id !='=>$listing_id,'school_code'=>$this->input->post('school_code')))->num_rows();
            if($validation!=0){
    $this->form_validation->set_message('school_code', 'Description');
            }*/
             /*&& $this->is_unique_school_code($this->input->post('school_code'),$listing_id)*/
        if ($this->form_validation->run() == true) 
            {
            $input=$this->input->post();
            $input_data['school_name']=$input['school_name'];
            $input_data['school_code']=$input['school_code'];
            $input_data['category']=json_encode($input['category']);
            $input_data['keywords']=$input['keywords'];
            $input_data['curriculum']=$input['curriculum'];
            $input_data['school_type']=$input['school_type'];
            $input_data['school_format']=$input['school_format'];
            $input_data['hostels']=$input['hostels'];
            $input_data['class']=$input['class'];
            $input_data['price_from']=$input['price_from'];
            $input_data['transport_fee']=$input['transport_fee'];
            $input_data['medium']=json_encode($input['medium']);
            $input_data['founders_name']=$input['founders_name'];
            $input_data['brand_name']=$input['brand_name'];
            $input_data['no_of_branches']=$input['no_of_branches'];
            $input_data['est_year']=$input['est_year'];
            $input_data['est_branch_year']=$input['est_branch_year'];
            $input_data['faculty_exp']=$input['faculty_exp'];
            $input_data['alumni']=$input['alumni'];
            $input_data['principal_number']=$input['principal_number'];
            $input_data['telephone_number']=$input['telephone_number'];
            $input_data['school_email']=$input['school_email'];
            $input_data['admission_procedure']=$input['admission_procedure'];
            $input_data['landmark']=$input['landmark'];
            $input_data['latitude']=$input['latitude'];
            $input_data['longitude']=$input['longitude'];
            $input_data['address']=$input['address'];
            $input_data['address_url']=$input['address_url'];
            $input_data['video']=$input['video'];
            $input_data['vision']=$input['vision'];
            $input_data['description']=$input['description'];
            $input_data['phone']=$input['phone'];
            $input_data['website']=$input['website'];
            $input_data['email']=$input['email'];
            $input_data['facebook']=$input['facebook'];
            $input_data['twitter']=$input['twiter'];
            $input_data['youtube']=$input['youtube'];
            $input_data['amenities']=json_encode($input['amenities']);
            $input_data['bus_routes']=$input['bus_routes'];
            $input_data['sports']=$input['sports'];
            $input_data['opening_hours']=json_encode(
                array('opening_time'=>$input['opening_time'],'closing_time'=>$input['closing_time'])
            );
            $input_data['achievements']=json_encode($input['achievements']);
            $input_data['class_name']=json_encode($input['class_name']);
            $input_data['admission_fee']=json_encode($input['admission_fee']);
            $input_data['tution_fee']=json_encode($input['tution_fee']);
            $input_data['admission_status']=$input['admission_status'];
            $res=$this->common_model->update_results_info('listings',array('id'=>$listing_id),$input_data);
            if($res){
                $this->session->set_flashdata('success_message','Uploaded Successfully');
                $all_pri=$this->common_model->select_results_info('school_class_prices',array('listing_id'=>$listing_id))->result_array();
                $cl=0;
                for($cl=0;$cl<count($input['class_name']);$cl++) {
                    $p=$this->common_model->select_results_info('school_class_prices',array('listing_id'=>$listing_id,'class_id'=>$input['class_name'][$cl]))->num_rows();

                    $input_cls['class_id']=$input['class_name'][$cl];
                    $input_cls['admission_fee']=$input['admission_fee'][$cl];
                    $input_cls['tution_fee']=$input['tution_fee'][$cl];
                    $input_cls['listing_id'] =$listing_id;
                    if($p==0){
                        $this->common_model->insert_results_info('school_class_prices',$input_cls);
                    }else{
                        $this->common_model->update_results_info('school_class_prices',array('listing_id'=>$listing_id,'class_id'=>$input['class_name'][$cl]),$input_cls);
                    }
                }
                foreach ($all_pri as $cls) {
                    if (!in_array($cls['class_id'], $input['class_name']))
                    {
                        $up['row_status']=0;
                        $up['modified_at']=date('Y-m-d H:i:s');
                        $this->common_model->update_results_info('school_class_prices',array('listing_id'=>$listing_id,'class_id'=>$cls['class_id']),$up);   
                    }
                    /*for($c=0;$c<count($input['class_name']);$c++) {
                        if($cls['class_id'] != $input['class_name'][$c])
                    }*/
                }

            }else{
                $this->session->set_flashdata('error_message','Not Uploaded');
            }
            redirect($this->session->userdata('last_page'));
        }/*else{
            echo validation_errors();die;
        }*/
        }
            if($this->input->post('list_type')=='gallery'){
                if($_FILES["thumb"]['name'] !=''){
                move_uploaded_file($_FILES["thumb"]["tmp_name"], "uploads/listings/thumb/". $listing_id.'.jpg');
            }
if($_FILES["gallery"]['name'] !=''){
    $directory = FCPATH . 'uploads/listings/gallery/';
    $mypath=FCPATH.'uploads/listings/gallery/'.$listing_id;
    $file = file_get_contents(base_url('uploads/index.html'));
    if(!is_dir($mypath)){
        mkdir($directory . '/' . $listing_id, 0777);
        write_file(FCPATH.'uploads/listings/gallery/'. $listing_id.'/index.html', $file);
    }
    for($j=0;$j<count($_FILES['gallery']['name']);$j++){
    $gallery_data['listing_id']=$listing_id;
    $gallery_data['image']=$_FILES['gallery']['name'][$j];
    $g_id=$this->common_model->insert_results_info('listing_gallery',$gallery_data);
    move_uploaded_file($_FILES["gallery"]["tmp_name"][$j], "uploads/listings/gallery/". $listing_id.'/'.$g_id.'.jpg');
    }
}

if($_FILES["banner"]['name'] !=''){
    $directory1 = FCPATH . 'uploads/listings/banners/';
    $mypath1=FCPATH.'uploads/listings/banners/'.$listing_id;
    $file1 = file_get_contents(base_url('uploads/index.html'));
    if(!is_dir($mypath1)){
        mkdir($directory1 . '/' . $listing_id, 0777);
        write_file(FCPATH.'uploads/listings/banners/'. $listing_id.'/index.html', $file1);
    }
    for($k=0;$k<count($_FILES['banner']['name']);$k++){
    $gallery_data['listing_id']=$listing_id;
    $gallery_data['image']=$_FILES['banner']['name'][$k];
    $g_id=$this->common_model->insert_results_info('listing_banner',$gallery_data);
    move_uploaded_file($_FILES["banner"]["tmp_name"][$k], "uploads/listings/banners/". $listing_id.'/'.$g_id.'.jpg');
    }
}

            }
        }
        $this->data['edit_id'] =$id;
        $this->data['edit_data'] = $this->common_model->select_results_info('listings',array('id'=>$listing_id))->row_array();
        $this->data['class_price'] = $this->common_model->select_results_info('school_class_prices',array('listing_id'=>$listing_id))->result_array();
        $this->data['title'] = 'Edit Listing';
        $this->data['content'] = 'edit_listing';
        $this->data['active_menu'] = 'edit_listing';
        $this->_render_page($this->template, $this->data);
    }
    public  function is_unique_school_code($value,$listing_id){
        $validation=$this->common_model->select_results_info('listings',array('id !='=>$listing_id,'school_code'=>$this->input->post('school_code')))->num_rows();
            if($validation != 0){
                $this->form_validation->set_message('school_code','School Code Existed');
                return false;
            }
            return true;
}
 /*   public function listings(){
        $where="row_status != 0";
        $status='';
        if(isset($_GET['status'])){
        $status=$_GET['status'];
        }
        if($status=='active'){
            $where="row_status = 1";
        }elseif($status=='expired'){
            $where="row_status = 2";
        }else{
            $where="row_status != 0";
        }
        $config['base_url'] = base_url('admin/listings/'); //site url
        $config['total_rows'] = $this->common_model->count_records('listings',$where); //total row
       // print_r($config);die;
        $config['per_page'] = 4;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
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
        $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data['schools'] =  $this->common_model->select_results_info('listings',$where ,'id DESC',$config['per_page'],$this->data['page'])->result_array();

        $this->data['pagination'] = $this->pagination->create_links();

        if($status==1){
            $page_title='Active Listings';
        }elseif($status==2){
            $page_title='Expired Listings';
        }else{
            $page_title='All Listings';
        }
        $this->data['title'] = $page_title;
        $this->data['content'] = 'listings';
        $this->data['active_menu'] = 'listings';
        $this->_render_page($this->template, $this->data);

    }*/
        public function listings(){
        $where="row_status != 0";
        $status='';
        if(isset($_GET['status'])){
        $status=$_GET['status'];
        }
        if($status=='active'){
            $where="row_status = 1";
        }elseif($status=='expired'){
            $where="row_status = 2";
        }else{
            $where="row_status != 0";
        }
        if($status==1){
            $page_title='Active Listings';
        }elseif($status==2){
            $page_title='Expired Listings';
        }else{
            $page_title='All Listings';
        }
        $this->data['title'] = $page_title;
        $this->data['content'] = 'listings';
        $this->data['active_menu'] = 'listings';
        $this->data['schools'] = $this->common_model->select_results_info('listings',$where,'id DESC')->result_array();
        $this->_render_page($this->template, $this->data);

    }
    public function blogs(){
        if($this->input->post()){
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('desc', 'Description', 'trim|required');
            $this->form_validation->set_rules('keywords', 'Keywords', 'trim|required');
        if ($this->form_validation->run() == true) 
            {
                $input_data['title']=$this->input->post('title');
                $input_data['desc']=$this->input->post('desc');
                $input_data['ratings']=json_encode(
                array('rating_for'=>$this->input->post('rating_for'),'rating'=>$this->input->post('rating'))
            );
                $input_data['keywords']=$this->input->post('keywords');
                $res=$this->common_model->insert_results_info('blogs',$input_data);
                move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/blogs/". $res.'.jpg');
                redirect($this->session->userdata('last_page').'?status='.$status);
            }
        }
        $status='active';
        $page_title='Active Blogs';
        if(isset($_GET['status']) && !empty($_GET['status'])){
        $status=$_GET['status'];
        }
        if($status=='active'){
            $page_title='Active Blogs';
            $where="row_status = 1";
        }elseif($status=='inactive'){
            $page_title='Inactive Blogs';
            $where="row_status = 2";
        }
        $this->data['title'] = 'Blogs';
        $this->data['page_title'] = $page_title;
        $this->data['content'] = 'blogs';
        $this->data['active_menu'] = 'blogs';
        $this->data['blogs'] = $this->common_model->select_results_info('blogs',$where,'id DESC')->result_array();
        $this->_render_page($this->template, $this->data);
    }
    public function blog_create(){
        if($this->input->post()){
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('desc', 'Description', 'trim|required');
            $this->form_validation->set_rules('keywords', 'Keywords', 'trim|required');
            $this->form_validation->set_rules('short_note', 'Short Note', 'trim|required');
        if ($this->form_validation->run() == true) 
            {
                $input_data['title']=$this->input->post('title');
                $input_data['desc']=$this->input->post('desc');
                $input_data['ratings']=json_encode(
                array('rating_for'=>$this->input->post('rating_for'),'rating'=>$this->input->post('rating'))
            );
                $input_data['keywords']=$this->input->post('keywords');
                $input_data['short_note']=$this->input->post('short_note');
                $res=$this->common_model->insert_results_info('blogs',$input_data);
                move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/blogs/". $res.'.jpg');
                if ($res) {
            $this->session->set_flashdata('success_message', 'Submited Successfully');
        } else {
            $this->session->set_flashdata('error_message', 'Not Submited Completed');
        }
                redirect($this->session->userdata('last_page').'?status='.$status);
            }
        }

        $this->data['title'] = 'Blog';
        $this->data['page_title'] = 'blog_create';
        $this->data['content'] = 'blog_create';
        $this->data['active_menu'] = 'blogs';
        $this->_render_page($this->template, $this->data);
    }
    public function blog_edit(){
        if($this->input->post()){
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('desc', 'Description', 'trim|required');
            $this->form_validation->set_rules('keywords', 'Keywords', 'trim|required');
            $this->form_validation->set_rules('short_note', 'Short Note', 'trim|required');
        if ($this->form_validation->run() == true) 
            {
                $input_data['title']=$this->input->post('title');
                $input_data['desc']=$this->input->post('desc');
                $input_data['ratings']=json_encode(
                array('rating_for'=>$this->input->post('rating_for'),'rating'=>$this->input->post('rating'))
            );
                $input_data['keywords']=$this->input->post('keywords');
                $input_data['short_note']=$this->input->post('short_note');
                $res=$this->common_model->update_results_info('blogs',array('id'=>$_GET['blog']),$input_data);
                if($_FILES["file"]["name"] != ''){
                move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/blogs/". $_GET['blog'].'.jpg');
                }

            if ($res) {
            $this->session->set_flashdata('success_message', 'Updated Successfully');
            } else {
            $this->session->set_flashdata('error_message', 'Not Updated');
            }

                redirect(base_url('admin/blogs?status=active'));
            }
        }
        if($_GET['blog']){
            $this->data['blog']=$this->common_model->select_results_info('blogs',array('id'=>$_GET['blog']))->row_array();
        }
        $this->data['title'] = 'Blog';
        $this->data['page_title'] = 'blog_edit';
        $this->data['content'] = 'blog_edit';
        $this->data['active_menu'] = 'blogs';
        $this->_render_page($this->template, $this->data);
    }
    public function users(){
        $where="row_status != 0";
        $status='';
        if(isset($_GET['status'])){
        $status=$_GET['status'];
        }
        if($status=='active'){
            $where="row_status = 1";
        }elseif($status=='inactive'){
            $where="row_status = 2";
        }else{
            $where="row_status != 0";
        }
        $this->data['users']=$this->common_model->get_users(2,$where)->result_array();
        /*$this->data['schools'] =  $this->common_model->select_results_info('listings',$where ,'id DESC',$config['per_page'],$this->data['page'])->result_array();*/

        $this->data['title'] = 'Users';
        $this->data['content'] = 'users';
        $this->data['active_menu'] = 'users';
        $this->_render_page($this->template, $this->data);
    }
    
    public function classes(){
        if($this->input->post()){
            $input=$this->input->post();
            $input_data['name']=$input['class'];
            $res=$this->common_model->insert_results_info('classes',$input_data);
            if($res>0){
            $this->session->set_flashdata('success_message', 'Class Inserted Successfully');
            }else{
            $this->session->set_flashdata('error_message', 'Class Not Inserted');
            }
            redirect($this->session->userdata('last_page'));
        }
        $this->data['title'] = 'Classes';
        $this->data['content'] = 'classes';
        $this->data['active_menu'] = 'classes';
        $this->_render_page($this->template, $this->data);
    }
    public function categories(){
        if($this->input->post()){
            $input=$this->input->post();
            $input_data['name']=$input['category'];
            $res=$this->common_model->insert_results_info('category',$input_data);
            if($res>0){
            $this->session->set_flashdata('success_message', 'Categories Inserted Successfully');
            }else{
            $this->session->set_flashdata('error_message', 'Categories Not Inserted');
            }
            redirect($this->session->userdata('last_page'));
        }
        $this->data['title'] = 'Categories';
        $this->data['content'] = 'categories';
        $this->data['active_menu'] = 'categories';
        $this->_render_page($this->template, $this->data);
    }
    public function medium(){
        if($this->input->post()){
            $input=$this->input->post();
            $input_data['name']=$input['medium'];
            $res=$this->common_model->insert_results_info('medium',$input_data);
            if($res>0){
            $this->session->set_flashdata('success_message', 'Medium Inserted Successfully');
            }else{
            $this->session->set_flashdata('error_message', 'Medium Not Inserted');
            }
            redirect($this->session->userdata('last_page'));
        }
        $this->data['title'] = 'Medium';
        $this->data['content'] = 'medium';
        $this->data['active_menu'] = 'medium';
        $this->_render_page($this->template, $this->data);
    }
    public function curriculum(){
        if($this->input->post()){
            $input=$this->input->post();
            $input_data['name']=$input['curriculum'];
            $res=$this->common_model->insert_results_info('curriculum',$input_data);
            if($res>0){
            $this->session->set_flashdata('success_message', 'Curriculum Inserted Successfully');
            }else{
            $this->session->set_flashdata('error_message', 'Curriculum Not Inserted');
            }
            redirect($this->session->userdata('last_page'));
        }
        $this->data['title'] = 'Curriculum';
        $this->data['content'] = 'curriculum';
        $this->data['active_menu'] = 'curriculum';
        $this->_render_page($this->template, $this->data);
    }
    public function facilities(){
        if($this->input->post()){
            $input=$this->input->post();
            if(isset($_FILES['facilities']['name']) && $_FILES['facilities']['name']!=""){
            if($mime = (get_mime_by_extension($_FILES['facilities']['name'])=='image/jpg' || get_mime_by_extension($_FILES['facilities']['name'])=='image/jpeg' || get_mime_by_extension($_FILES['facilities']['name'])=='image/png' || get_mime_by_extension($_FILES['facilities']['name'])=='image/svg')){
            $ext=explode('/',get_mime_by_extension($_FILES['facilities']['name']));
            $input_data['name']=$input['facilities_name'];
            $input_data['file_ext']=$ext[1];
            $res=$this->common_model->insert_results_info('facilities',$input_data);
            if($res>0){
            $this->session->set_flashdata('success_message', 'Facilities Inserted Successfully');
            move_uploaded_file($_FILES["facilities"]["tmp_name"], "uploads/facilities/". $res.'.'.$input_data['file_ext']);
            }else{
            $this->session->set_flashdata('error_message', 'Facilities Not Inserted');
            }
            redirect($this->session->userdata('last_page'));
            }else{
            $this->session->set_flashdata('facilities_error', 'Please select only JPG file.');
            }
}else{
            $this->session->set_flashdata('facilities_error', 'Please select JPG file.');
            }
        }
        $this->data['title'] = 'Facilities';
        $this->data['content'] = 'facilities';
        $this->data['active_menu'] = 'facilities';
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
/*    function reviews($rowno=0)
    {
    
    // Row per page
    $rowperpage = 5;
    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    if(isset($_GET['listing_id']) && !empty($_GET['listing_id']) && $_GET['listing_id']!='all'){
        $listing_id=base64_decode(base64_decode($_GET['listing_id']));
        $where['listing_id']=$listing_id;
    }
    // All records count
    $where['row_status']=1;
    $allcount = $this->common_model->count_records('ratings',$where);
    // Get records
    $this->data['users_record'] = $this->common_model->select_results_info('ratings',$where ,'id DESC',$rowperpage,$rowno)->result_array();
 
    // Pagination Configuration
    $config['base_url'] = base_url().'admin/reviews/';
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
    $this->data['pagination'] = $this->pagination->create_links();
    $this->data['schools'] = $this->common_model->select_results_info('listings',array('row_status'=>1) ,'school_name ASC')->result_array();
        $this->data['title'] = "Reviews";
        $this->data['content'] = 'reviews';
        $this->data['active_menu'] = 'reviews';
        $this->_render_page($this->template, $this->data);
    }*/

    function reviews($rowno=0)
    {
    
    if(isset($_GET['listing_id']) && !empty($_GET['listing_id']) && $_GET['listing_id']!='all'){
        $listing_id=base64_decode(base64_decode($_GET['listing_id']));
        $where['listing_id']=$listing_id;
    }
    // All records count
    $where['row_status']=1;
    $this->data['users_record'] = $this->common_model->select_results_info('ratings',$where ,'id DESC',$rowperpage,$rowno)->result_array();
    $this->data['schools'] = $this->common_model->select_results_info('listings',array('row_status'=>1) ,'school_name ASC')->result_array();
        $this->data['title'] = "Reviews";
        $this->data['content'] = 'reviews';
        $this->data['active_menu'] = 'reviews';
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
    public function export_list_data()
    {
        $this->data['title'] = 'Export Admissions';
        $this->data['content'] = 'export_admissions';
        $this->data['active_menu'] = 'export_admissions';
        $this->_render_page($this->template, $this->data);
    }
     public function conditions($type){
        if($type=='terms'){
            $title='Terms & Conditions';
        }elseif($type=='privacy'){
            $title='Privacy Policy';
        }elseif($type=='about_us'){
            $title='About Us';
        }
        if($this->input->post()){
        $data['description'] = $this->input->post('message');
        $this->db->where('setting_type', $type);
        $res=$this->db->update('settings', $data);
        if($res){
                $this->session->set_flashdata('success_message',$title." Updated Successfully");
            }else{
                $this->session->set_flashdata('error_message',$title." Not Updated");
            }
            redirect($this->session->userdata('last_page'));
        }
        
        $this->data['title'] = $title;
        $this->data['content'] = 'terms';
        $this->data['active_menu'] = 'terms';
        $this->data['condition'] = $this->db->get_where('settings', array('setting_type' => $type))->row()->description;
        $this->data['type'] = $type;
        $this->_render_page($this->template, $this->data);
    }
    function system_settings($param1 = '') {
    if($this->input->post()){
            $res=$this->admin_model->update_system_settings();
            if($res){
                $this->session->set_flashdata('success_message', 'Settings Updated');
            }else{
                $this->session->set_flashdata('error_message', 'Settings Not Updated');
            }
            redirect(base_url() . 'admin/system_settings', 'refresh');
        }

        $this->data['title'] = 'System Settings';
        $this->data['content'] = 'settings';
        $this->data['active_menu'] = 'settings';
        $this->data['settings'] = $this->db->get('settings')->result_array();
        $this->_render_page($this->template, $this->data);
        }

        public function check_promo_code_unique($value='')
    {
        $validation=$this->common_model->select_results_info('promo_codes',array('promo_code'=>$value))->num_rows();
            if($validation != 0){
                $this->form_validation->set_message('check_promo_code_unique','Promo Code Existed');
                return false;
            }
            return true;
    }
     public function check_promo_code($value='')
    {
        $validation=$this->common_model->select_results_info('promo_codes',array('id !='=>$_POST['id'],'promo_code'=>$value))->num_rows();
            if($validation != 0){
                $this->form_validation->set_message('check_promo_code','Promo Code Existed');
                return false;
            }
            return true;
    }
        public function promo_code()
        {
            if($this->input->post()){
                    $input=$this->input->post();
                 $this->form_validation->set_rules('promo_title', 'Promo Title', 'trim|required');
                 if(isset($_GET['promo_code']) && $_GET['promo_code'] != ''){
                    $_POST['id']=$_GET['promo_code'];
            $this->form_validation->set_rules('promo_code', 'Promo Code', 'trim|required|callback_check_promo_code');
        }else{
            $this->form_validation->set_rules('promo_code', 'Promo Code', 'trim|required|callback_check_promo_code_unique');
        }
            $this->form_validation->set_rules('promo_type', 'promo_type', 'required');
            if($input['promo_type']==3){
            $this->form_validation->set_rules('school[]', 'Schools', 'required');
            $this->form_validation->set_rules('class[]', 'Classes', 'required');
            }
            $this->form_validation->set_rules('promo_label', 'Promo Label', 'required');
            $this->form_validation->set_rules('date', 'Valid Date', 'required');
            $this->form_validation->set_rules('desc', 'Description', 'required');
            $this->form_validation->set_rules('discount_type', 'Discount Type', 'required');
            $this->form_validation->set_rules('discount', 'Discount', 'required');
            $this->form_validation->set_rules('row_status', 'Promo Status', 'required');
        if ($this->form_validation->run() == true)
            {
                $date=explode('-',$input['date']);
                $input_data=array(
                    'promo_title'=>$input['promo_title'],
                    'promo_code'=>$input['promo_code'],
                    'promo_label'=>$input['promo_label'],
                    'promo_type'=>$input['promo_type'],
                    'discount_type'=>$input['discount_type'],
                    'discount'=>$input['discount'],
                    'desc'=>$input['desc'],
                    'valid_from'=>date('Y-m-d',strtotime($date[0])),
                    'valid_to'=>date('Y-m-d',strtotime($date[1])),
                    'row_status'=>$input['row_status'],
                );
                if($input['promo_type']==3){
                    $input_data['school']=json_encode($input['school']);
                    $input_data['class']=json_encode($input['class']);
                }
                /*echo date('Y-m-d',strtotime($date[0]));
                print_r($_POST);die;*/
                if(isset($_GET['promo_code']) && $_GET['promo_code'] != ''){
                    $res=$this->common_model->update_results_info('promo_codes',array('id'=>$_GET['promo_code']),$input_data);
                }else{
                $res=$this->common_model->insert_results_info('promo_codes',$input_data);
                }
/*                $res=$this->common_model->insert_results_info('promo_codes',$input_data);*/
                if($res){
                  $this->session->set_flashdata('success_message', 'Submit Successfully');
                }else{
                    $this->session->set_flashdata('error_message', 'Not Submited');
                }
                redirect(base_url() . 'admin/promo_code', 'refresh');
                }/*else{
                    print_r($_POST);
                    echo validation_errors();die;
                }*/
            }

            $this->data['title'] = 'Promo Code';
            $this->data['content'] = 'promo_code';
            $this->data['active_menu'] = 'promo_code';
            $where_ar='row_status = 1 OR row_status = 2';
            $this->data['promos'] = $this->common_model->select_results_info('promo_codes',$where_ar)->result_array();
            $e_data='';
            if(isset($_GET['promo_code']) && $_GET['promo_code'] != ''){
             $e_data= $this->common_model->select_results_info('promo_codes',array('id'=>$_GET['promo_code']))->row_array();
            }
            $this->data['e_data']=$e_data;
            $this->_render_page($this->template, $this->data);
        }

        
  public function users_says()
        {
            if($this->input->post()){
                    $input=$this->input->post();
                 $this->form_validation->set_rules('name', 'User Name', 'trim|required');
            $this->form_validation->set_rules('desc', 'Description', 'required');
            $this->form_validation->set_rules('row_status', 'User Says Status', 'required');
        if ($this->form_validation->run() == true)
            {
                $input_data=array(
                    'name'=>$input['name'],
                    'desc'=>$input['desc'],
                    'row_status'=>$input['row_status'],
                );
                if(isset($_GET['users_says']) && $_GET['users_says'] != ''){
                    $res=$this->common_model->update_results_info('users_says',array('id'=>$_GET['users_says']),$input_data);
                }else{
                $res=$this->common_model->insert_results_info('users_says',$input_data);
                }
                if($res){
                  $this->session->set_flashdata('success_message', 'Submit Successfully');
                }else{
                    $this->session->set_flashdata('error_message', 'Not Submited');
                }
                redirect(base_url() . 'admin/users_says', 'refresh');
            }/*else{
                    print_r($_POST);
                    echo validation_errors();die;
                }*/
            }

            $this->data['title'] = 'User Says';
            $this->data['content'] = 'users_says';
            $this->data['active_menu'] = 'users_says';
            $where_ar='row_status = 1 OR row_status = 2';
            $this->data['users_says'] = $this->common_model->select_results_info('users_says',$where_ar)->result_array();
            $e_data='';
            if(isset($_GET['users_says']) && $_GET['users_says'] != ''){
             $e_data= $this->common_model->select_results_info('users_says',array('id'=>$_GET['users_says']))->row_array();
            }
            $this->data['e_data']=$e_data;
            $this->_render_page($this->template, $this->data);
        }

 
}

