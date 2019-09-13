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
}

