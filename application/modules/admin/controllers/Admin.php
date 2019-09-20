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
            $input_data['category']=json_encode($input['category']);
            $input_data['keywords']=$input['keywords'];
            $input_data['curriculum']=$input['curriculum'];
            $input_data['class']=json_encode($input['class']);
            $input_data['landmark']=$input['landmark'];
            $input_data['latitude']=$input['latitude'];
            $input_data['longitude']=$input['longitude'];
            $input_data['address']=$input['address'];
            $input_data['video']=$input['video'];
            $input_data['vision']=$input['vision'];
            $input_data['description']=$input['description'];
            $input_data['phone']=$input['phone'];
            $input_data['website']=$input['website'];
            $input_data['email']=$input['email'];
            $input_data['facebook']=$input['facebook'];
            $input_data['twitter']=$input['twiter'];
            $input_data['google_plus']=$input['google_plus'];
            $input_data['amenities']=json_encode($input['amenities']);
            $input_data['opening_hours']=json_encode(
                array('opening_time'=>$input['opening_time'],'closing_time'=>$input['closing_time'])
            );
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
                $this->session->set_flashdata('success_message','Uploaded Successfully');

    move_uploaded_file($_FILES["banner"]["tmp_name"], "uploads/listings/banners/". $res.'.jpg');
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
            }else{
                $this->session->set_flashdata('error_message','Not Uploaded');
            }
            redirect('admin/add_listing');
        }
        $this->data['title'] = 'Add Listing';
        $this->data['content'] = 'add_listing';
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
}

