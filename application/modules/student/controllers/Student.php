<?php

class Student extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->template = "template/admin/main";
        check_access('student');
    }
    
    public function index(){
        $this->data['title'] = "Dashboard";
        $this->data['content'] = 'dashboard';
        $this->data['active_menu'] = 'dashboard';
        $this->_render_page($this->template, $this->data);
    }
    public function profile(){
        $this->data['title'] = "Profile";
        $this->data['content'] = 'profile';
        $this->data['active_menu'] = 'profile';
        $this->data['user_details'] = $this->common_model->select_results_info('users',array('id'=>$this->session->userdata('user_id')))->row_array();
        if($this->input->post()){
            $input=$this->input->post();
            $input_data=array(
                'username' => $input['username'],
                'email' => $input['email'],
                'phone' => $input['phone']
            );
            $res=$this->common_model->update_results_info('users',array('id'=>$this->session->userdata('user_id')),$input_data);
            if($res>0){
                if($_FILES['user_profile']['name']!=''){
                    move_uploaded_file($_FILES["user_profile"]["tmp_name"], "uploads/users/". $this->session->userdata('user_id').'.jpg');
                }
                $this->session->set_flashdata('success_message','Profile Updated Successfully');
            }else{
                $this->session->set_flashdata('error_message','Profile Not Updated');
            }
            redirect($this->session->userdata('last_page'));
        }
        $this->_render_page($this->template, $this->data);
    }
    function change_password()
    {
        $this->data['title'] = "Profile";
        $this->data['content'] = 'profile';
        $this->data['active_menu'] = 'profile';
        $this->data['user_details'] = $this->common_model->select_results_info('users',array('id'=>$this->session->userdata('user_id')))->row_array();
        if ($this->input->post()) {
            /*$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');*/
            $this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
            
        $this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');

        $this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

            if ($this->form_validation->run() == TRUE) {
                /*$user_id = $this->session->userdata('login_id');
                $password = $this->input->post('password');
                $res = $this->crud_model->update_user_password($password, $user_id);*/
                $identity = $this->session->userdata('identity');

            $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

            if ($change)
            {
                //if the password was successfully changed
                $this->session->set_flashdata('success_message', $this->ion_auth->messages());
                redirect('auth/logout');
            }
            else
            {
                $this->session->set_flashdata('error_message', $this->ion_auth->errors());
                redirect($this->session->userdata('last_page'));
            }
             /*   if ($res) {
                    $this->session->set_flashdata('success_message', 'Password Updated');
                } else {
                    $this->session->set_flashdata('error_message', 'Password Not Updated');
                }*/
                /*redirect($this->session->userdata('last_page'));*/
            }
        }
        $this->_render_page($this->template, $this->data);
    }
}

