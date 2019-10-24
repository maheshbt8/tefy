<?php
class Admin_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }
        function update_system_settings() {
        if(!empty($this->input->post('system_name'))){
        $data['description'] = $this->input->post('system_name');
        $this->db->where('setting_type', 'system_name');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('system_title'))){
        $data['description'] = $this->input->post('system_title');
        $this->db->where('setting_type', 'system_title');
        $this->db->update('settings', $data);
        }   
        if(!empty($this->input->post('address'))){
        $data['description'] = $this->input->post('address');
        $this->db->where('setting_type', 'address');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('mobile'))){   
        $data['description'] = $this->input->post('mobile');
        $this->db->where('setting_type', 'mobile');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('whatsapp_number'))){   
        $data['description'] = $this->input->post('whatsapp_number');
        $this->db->where('setting_type', 'whatsapp_number');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('system_email'))){
        $data['description'] = $this->input->post('system_email');
        $this->db->where('setting_type', 'system_email');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('email_password'))){
        $data['description'] = $this->input->post('email_password');
        $this->db->where('setting_type', 'email_password');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('fb'))){
        $data['description'] = $this->input->post('fb');
        $this->db->where('setting_type', 'facebook');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('twiter'))){
        $data['description'] = $this->input->post('twiter');
        $this->db->where('setting_type', 'twiter');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('youtube'))){
        $data['description'] = $this->input->post('youtube');
        $this->db->where('setting_type', 'youtube');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('sms_username'))){
        $data['description'] = $this->input->post('sms_username');
        $this->db->where('setting_type', 'sms_username');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('sms_sender'))){
        $data['description'] = $this->input->post('sms_sender');
        $this->db->where('setting_type', 'sms_sender');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('sms_hash'))){
        $data['description'] = $this->input->post('sms_hash');
        $this->db->where('setting_type', 'sms_hash');
        $this->db->update('settings', $data);
        }
        return true;
    }
}