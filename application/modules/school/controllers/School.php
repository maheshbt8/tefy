<?php

class School extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->template = "template/site/main";
        check_access('school');
    }
    
    public function index(){
        $this->data['title'] = "School";
        $this->data['content'] = 'profile';
        $this->data['active_menu'] = 'school';
        $this->_render_page($this->template, $this->data);
    }
    
}

