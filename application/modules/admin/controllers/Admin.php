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
            $input_data['school_title']=$input['school_title'];
            $input_data['category']=$input['category'];
            $input_data['keywords']=$input['keywords'];
            $input_data['city']=$input['city'];
            $input_data['address']=$input['address'];
            $input_data['state']=$input['state'];
            $input_data['zipcode']=$input['zipcode'];
            $input_data['description']=$input['description'];
            $input_data['phone']=$input['phone'];
            $input_data['website']=$input['website'];
            $input_data['email']=$input['email'];
            $input_data['facebook']=$input['facebook'];
            $input_data['twitter']=$input['twiter'];
            $input_data['google_plus']=$input['google_plus'];
            $input_data['amenities']=json_encode($input['amenities']);
            $input_data['opening_hours']=json_encode(
                array(
        '1'=>array('m_opening'=>$input['m_opening'],'m_closing'=>$input['m_closing']),
        '2'=>array('t_opening'=>$input['t_opening'],'t_closing'=>$input['t_closing']),
        '3'=>array('w_opening'=>$input['w_opening'],'w_closing'=>$input['w_closing']),
        '4'=>array('th_opening'=>$input['th_opening'],'th_closing'=>$input['th_closing']),
        '5'=>array('f_opening'=>$input['f_opening'],'f_closing'=>$input['f_closing']),
        '6'=>array('sa_opening'=>$input['sa_opening'],'sa_closing'=>$input['sa_closing']),
        '7'=>array('s_opening'=>$input['s_opening'],'s_closing'=>$input['s_closing']),
                )
            );
            $res=$this->common_model->insert_results_info('listings',$input_data);
            if($res>0){
                $this->session->set_flashdata('success_message','Uploaded Successfully');
                //move_uploaded_file($_FILES["qp"]["tmp_name"], "uploads/listings/". $res.'.jpg');
            }else{
                $this->session->set_flashdata('error_message','Not Uploaded');
            }
            redirect('admin/add_listing');
        }
        $this->data['title'] = 'Add Listing';
        $this->data['content'] = 'add_listing';
        $this->_render_page($this->template, $this->data);
    }
}

