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
        $this->_render_page($this->template, $this->data);
    }
    
    public function content(){
        $this->data['title'] = 'Content';
        $this->data['content'] = 'content';
        $this->data['active_menu'] = 'about';
        $this->_render_page($this->template, $this->data);
    }
}

