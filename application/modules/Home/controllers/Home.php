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
        $this->data['schools'] = $this->common_model->select_results_info('listings',array('row_status'=>1),'id')->result_array();
        $this->_render_page($this->template, $this->data);
    }
    
    public function content(){
        $this->data['title'] = 'Content';
        $this->data['content'] = 'content';
        $this->data['active_menu'] = 'about';
        $this->_render_page($this->template, $this->data);
    }
    public function listings_list(){
        $this->data['title'] = 'listings-list';
        $this->data['content'] = 'listings_list';
        $this->data['active_menu'] = 'listings_list';
        /*$this->data['schools'] = $this->db->get_where('listings',array('row_status'=>1))->result_array();*/
        $this->data['schools'] = $this->common_model->select_results_info('listings',array('row_status'=>1),'id')->result_array();
        $this->_render_page($this->template, $this->data);
    }
    public function listings_single($id){
        $this->data['title'] = 'listings-single';
        $this->data['content'] = 'listings_single';
        $this->data['active_menu'] = 'listings_single';
        $this->data['school'] = $this->db->get_where('listings',array('id'=>$id))->row_array();
        $this->_render_page($this->template, $this->data);
    }
}

