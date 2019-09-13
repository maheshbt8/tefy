<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH . "third_party/MX/Controller.php";

class MY_Controller extends MX_Controller
{	
    protected  $template;
    protected  $data;
	function __construct() 
	{
		parent::__construct();
		$this->_hmvc_fixes();
	}
	
	function _hmvc_fixes()
	{		
		//fix callback form_validation		
		//https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc
		$this->load->library('form_validation');
		$this->form_validation->CI =& $this;
	}
	
	/**
	 * Displays the specified view
	 * @param array $data
	 */
	function _render_page($view, $data=null, $returnhtml=false)
	{
	    $this->viewdata = (empty($data)) ? $this->data: $data;
	    $view_html = $this->load->view($view, $this->viewdata, $returnhtml);
	    if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}
	
	
	/**
	 * Prepare flash message
	 *
	 */
	function prepare_flashmessage($msg,$type = 2)
	{
	    $returnmsg='';
	    switch($type){
	        case 0: $returnmsg = " <!-- <div class='col-md-12'> -->
										<div class='alert alert-success'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>".get_languageword('success')."!</strong> ". $msg."
										</div>
									<!-- </div> -->";
	        break;
	        case 1: $returnmsg = " <!-- <div class='col-md-12'> -->
										<div class='alert alert-danger'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>".get_languageword('error')."!</strong> ". $msg."
										</div>
									<!-- </div> -->";
	        break;
	        case 2: $returnmsg = " <!-- <div class='col-md-12'> -->
										<div class='alert alert-info'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>".get_languageword('info')."!</strong> ". $msg."
										</div>
									<!-- </div> -->";
	        break;
	        case 3: $returnmsg = " <!-- <div class='col-md-12'> -->
										<div class='alert alert-warning'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>".get_languageword('warning')."!</strong> ". $msg."
										</div>
									<!-- </div> -->";
	        break;
	    }
	    
	    $this->session->set_flashdata("message",$returnmsg);
	}
	
	function prepare_message($msg,$type = 2)
	{
	    $returnmsg='';
	    switch($type){
	        case 0: $returnmsg = " <!-- <div class='col-md-12'> -->
										<div class='alert alert-success'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>".get_languageword('success')."!</strong> ". $msg."
										</div>
									<!-- </div> -->";
	        break;
	        case 1: $returnmsg = " <!-- <div class='col-md-12'> -->
										<div class='alert alert-danger'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>".get_languageword('error')."!</strong> ". $msg."
										</div>
									<!-- </div> -->";
	        break;
	        case 2: $returnmsg = " <!-- <div class='col-md-12'> -->
										<div class='alert alert-info'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>".get_languageword('info')."!</strong> ". $msg."
										</div>
									<!-- </div> -->";
	        break;
	        case 3: $returnmsg = " <!-- <div class='col-md-12'> -->
										<div class='alert alert-warning'>
											<a href='#' class='close' data-dismiss='alert'>&times;</a>
											<strong>".get_languageword('warning')."!</strong> ". $msg."
										</div>
									<!-- </div> -->";
	        break;
	    }
	    
	    return $returnmsg;
	}
	
	function set_pagination($url,$offset,$numrows,$perpage,$pagingfunction='')
	{
	    $config['base_url'] = SITEURL.$url;  //Setting Pagination parameters
	    $config['per_page'] = $perpage;
	    $config['offset'] = $offset;
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    $config['num_links'] = 4; // numlinks before and after current page
	    $config['total_rows'] =  $numrows;
	    
	    $config['first_link'] = 'First';
	    $config['last_link'] = 'Last';
	    if(!empty($pagingfunction))
	        $config['paging_function'] = $pagingfunction;
	        else	$config['paging_function'] = 'ajax_paging';
	        $this->pagination->initialize($config);
	}
	
	/**
	 * Validate URL
	 *
	 * @access    public
	 * @param    string
	 * @return    string
	 */
	function valid_url($url)
	{
	    $pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
	    if (!preg_match($pattern, $url))
	    {
	        return FALSE;
	    }
	    
	    return TRUE;
	}
	
	function get_safe_template() {
	    if ( $this->ion_auth->is_student() ) {
	        $this->_render_page('template/site/student-template', $this->data);
	    } elseif( $this->ion_auth->is_tutor() ) {
	        $this->_render_page('template/site/tutor-template', $this->data);
	    } elseif( $this->ion_auth->is_institute() ) {
	        $this->_render_page('template/site/institute-template', $this->data);
	    } else {
	        $this->_render_page('template/admin/admin-template', $this->data);
	    }
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
