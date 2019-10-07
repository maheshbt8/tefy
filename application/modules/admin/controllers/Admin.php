<?php

class Admin extends MY_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->template = "template/admin/main";
        check_access('admin');
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
    public function add_listing(){
        if($this->input->post()){
            $input=$this->input->post();
            
            $input_data['school_name']=$input['school_name'];
            $input_data['school_code']=$input['school_code'];
            $input_data['category']=json_encode($input['category']);
            $input_data['keywords']=$input['keywords'];
            $input_data['curriculum']=$input['curriculum'];
            $input_data['school_type']=$input['school_type'];
            $input_data['school_format']=$input['school_format'];
            $input_data['hostels']=$input['hostels'];
            $input_data['class']=json_encode($input['class']);
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
        $this->data['title'] = 'Add Listing';
        $this->data['content'] = 'add_listing';
        $this->_render_page($this->template, $this->data);
    }
    public function edit_listing($id){
        $listing_id=base64_decode(base64_decode($id));
        if($this->input->post()){
            $input=$this->input->post();
            $input_data['school_name']=$input['school_name'];
            $input_data['school_code']=$input['school_code'];
            $input_data['category']=json_encode($input['category']);
            $input_data['keywords']=$input['keywords'];
            $input_data['curriculum']=$input['curriculum'];
            $input_data['school_type']=$input['school_type'];
            $input_data['school_format']=$input['school_format'];
            $input_data['hostels']=$input['hostels'];
            $input_data['class']=json_encode($input['class']);
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

            $res=$this->common_model->update_results_info('listings',array('id'=>$listing_id),$input_data);
            if($res>0){
                $this->session->set_flashdata('success_message','Uploaded Successfully');

    /*move_uploaded_file($_FILES["banner"]["tmp_name"], "uploads/listings/banners/". $res.'.jpg');
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
    }*/
            }else{
                $this->session->set_flashdata('error_message','Not Uploaded');
            }
            redirect($this->session->userdata('last_page'));
        }
        $this->data['edit_id'] =$id;
        $this->data['edit_data'] = $this->common_model->select_results_info('listings',array('id'=>$listing_id))->row_array();
        $this->data['title'] = 'Edit Listing';
        $this->data['content'] = 'edit_listing';
        $this->_render_page($this->template, $this->data);
    }
    public function listings(){
        $where="row_status = 1";
        /*if(isset($_GET['keyword']) && $_GET['keyword']!=''){
            $where=$where." AND keywords LIKE '%".$_GET['keyword']."%' OR  address LIKE '%".$_GET['keyword']."%' OR  school_name LIKE '%".$_GET['keyword']."%' OR  landmark LIKE '%".$_GET['keyword']."%'";
        }
        if(isset($_GET['location']) && $_GET['location']!=''){
            $where=$where." AND address LIKE '%".$_GET['location']."%' OR landmark LIKE '%".$_GET['location']."%'";
        }
        if(isset($_GET['category']) && $_GET['category']!=''){
            $ca=array();
            for ($i=0; $i < count($_GET['category']); $i++) { 
                $ca[]="category LIKE '%".$_GET['category'][$i]."%'";
            }

            $where=$where." AND ".implode(' OR ',$ca);
        }
        if(isset($_GET['facilities']) && $_GET['facilities']!=''){
             $ca=array();
            for ($i=0; $i < count($_GET['facilities']); $i++) { 
                $ca[]="amenities LIKE '%".$_GET['facilities'][$i]."%'";
            }

            $where=$where." AND ".implode(' OR ',$ca);
        }*/
        $config['base_url'] = base_url('admin/listings/'); //site url
        /*$config['base_url'] = $this->session->userdata('last_page'); //site url*/
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

        $this->data['title'] = 'My listings';
        $this->data['content'] = 'listings';
        $this->data['active_menu'] = 'listings';
        /*$this->data['schools'] = $this->common_model->select_results_info('listings',array('row_status'=>1),'id DESC')->result_array();*/
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
                'username' => $input['username'],
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
}

