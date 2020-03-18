<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mail_model extends CI_Model{
    private $send_mail='info@tefy.in';
    private $send_password='Tefy@123';
    private $send_username='Tefy';
    public function __construct(){
        parent::__construct();
    }
    public function config_mail(){
        $config['protocol'] = 'smtp';
       $config['smtp_host'] = 'smtp.hostinger.in';
       $config['smtp_port'] = 587; // 465 or 587
       $config['smtp_user'] = $this->send_mail;
       $config['smtp_pass'] = $this->send_password;
       $config['mailtype'] = 'html';
       $config['charset'] = 'UTF-8';
       $config['wordwrap'] = 'TRUE';
       $config['newline'] = "\r\n";
        return $config;
    }
    public function account_activation($id,$email){

        $task=$this->common_model->generate_encryption_key($id);
        $data['id']=$id;
        $data['task']=$task;
        $data['message']="Thanks for registering with Tefy. Please click this button to complete your registration:";
        $data['url']='email_verification';
        $data['button']='Yes';
        $email_msg=$this->load->view('template/mail/email',$data,true);
        $email_sub = "Activate your MyPulse Account";
        $email_to = $email;

        $this->do_email($email_msg, $email_sub, $email_to);
    }
        function do_email($msg = NULL, $sub = NULL, $to = NULL, $from = NULL) {
		$config = $this->config_mail();
		$this->load->library('email'); //$config
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
        $this->email->from($this->send_mail,$this->send_username);
        $this->email->to($to);
        //$this->email->reply_to($from, $system_name);
        $this->email->subject($sub);
        $this->email->message($msg);
 		$this->email->send();
 /*if($this->email->send())
 {echo "string";die;
//  return true;
 }
 else
 {
 show_error($this->email->print_debugger());
 }*/  
    }

}