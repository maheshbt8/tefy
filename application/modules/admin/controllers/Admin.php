<?php

class Admin extends \MY_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->template = "template/admin/main";
    }
    
    public function index(){
        $this->data['title'] = "Dashboard";
        $this->data['content'] = 'dashboard';
        $this->_render_page($this->template, $this->data);
    }
}

