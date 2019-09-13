<?php

class Student extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->template = "template/site/main";
        check_access('student');
    }
    
    public function index(){
        $this->data['title'] = "Profile";
        $this->data['content'] = 'profile';
        $this->data['active_menu'] = 'profile';
        $this->_render_page($this->template, $this->data);
    }
}

