<?php

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->template = 'template/site/main';
    }
    
    public function index(){
        $this->data['title'] = 'Home';
        $this->data['content'] = 'home';
        $this->data['active_menu'] = 'home';
        $this->data['schools'] = $this->common_model->select_results_info('listings',array('row_status'=>1),"id DESC",6)->result_array();
        $this->_render_page($this->template, $this->data);
    }
    
    public function content(){
        $this->data['title'] = 'Content';
        $this->data['content'] = 'content';
        $this->data['active_menu'] = 'about';
        $this->_render_page($this->template, $this->data);
    }
    public function listings_list(){
        $where="row_status = 1";
        if(isset($_GET['keyword']) && $_GET['keyword']!=''){
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
        }
        $config['base_url'] = base_url('listings-list'); //site url
        /*$config['base_url'] = $this->session->userdata('last_page'); //site url*/
        $config['total_rows'] = $this->common_model->count_records('listings',$where); //total row
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
        $this->data['schools'] =  $this->common_model->select_results_info('listings',$where ,'id DESC',$config['per_page'],$this->data['page'])->result_array();

        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['title'] = 'listings-list';
        $this->data['content'] = 'listings_list';
        $this->data['active_menu'] = 'listings_list';
        /*$this->data['schools'] = $this->common_model->select_results_info('listings',array('row_status'=>1),'id DESC')->result_array();*/
        $this->_render_page($this->template, $this->data);
    }
    public function listings_single($id){
        $this->data['title'] = 'listings-single';
        $this->data['content'] = 'listings_single';
        $this->data['active_menu'] = 'listings_single';
        $this->data['school'] = $this->common_model->select_results_info('listings',array('id'=>$id))->row_array();
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

}

