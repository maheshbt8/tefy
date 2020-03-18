<?php


class Login extends CI_Controller{
	
	public function index(){
		
		if(isset($_GET['code']))
		{
			echo "<pre>";
			print_r($_GET);die;
			$this->googleplus->getAuthenticate();
			$this->session->set_userdata('login',true);
			$this->session->set_userdata('userProfile',$this->googleplus->getUserInfo());
			redirect('login/profile');
		}
		$data['loginURL'] = $this->googleplus->loginURL();
		$this->load->view('login',$data);
	}
	
	public function profile(){
		if($this->session->userdata('login') == true)
		{
			$data['profileData'] = $this->session->userdata('userProfile');
			$this->load->view('profile',$data);
		}
		else
		{
			redirect('');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		$this->googleplus->revokeToken();
		redirect('');
	}
}//class ends here
