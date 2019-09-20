<?php

class Common extends MY_Controller
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
   public function set_row_status($table, $type, $where, $status=0)
    {
        $ret = $this->crud_model->set_row_status($table, $type, $where, $status);
        if ($ret) {
            $this->session->set_flashdata('success_message', 'Action Completed Successfully');
        } else {
            $this->session->set_flashdata('error_message', 'Action Not Completed');
        }
        redirect($this->session->userdata('last_page'));
    }
    public function facilities(){
        $this->data['title'] = 'Facilities';
        $this->data['content'] = 'facilities';
        $this->data['active_menu'] = 'facilities';
        $this->_render_page($this->template, $this->data);
    }
    
}

