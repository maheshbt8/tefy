<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/****** Send Email ******/
if ( ! function_exists('sendEmail'))
{
    function sendEmail($from = null, $to = null, $sub = null, $msg = null, $reply_to = null, $cc = null, $bcc = null, $attachment = null)
    {//return TRUE;
        
        if(!filter_var($from, FILTER_VALIDATE_EMAIL) ) {
            return false;
        }
        
        $CI = & get_instance();
        if($msg != "") {
            
            $CI->load->library('email');
            //$CI->email->clear();
            $smtp_host = $smtp_port = $smtp_user = $smtp_password = $mandrill_api_key = '';
            
                
                $config = Array(
                    'protocol' 	=> 'smtp',
                    'smtp_host' => $smtp_host,
                    'smtp_port' => $smtp_port,
                    'smtp_user' => $smtp_user,
                    'smtp_pass' => $smtp_password,
                    'charset' 	=> 'utf-8',
                    'mailtype' 	=> 'html',
                    'newline' 	=> "\r\n",
                    'wordwrap' 	=> TRUE
                    );
                
                $CI->email->initialize($config);
                
                $CI->email->from($smtp_user, $CI->config->item('site_settings')->site_title);
                
                $CI->email->to($to);
                
                if($reply_to != "" && filter_var($reply_to, FILTER_VALIDATE_EMAIL))
                    $CI->email->reply_to($reply_to);
                    if($cc != "" && filter_var($cc, FILTER_VALIDATE_EMAIL))
                        $CI->email->cc($cc);
                        if($bcc != "" && filter_var($bcc, FILTER_VALIDATE_EMAIL))
                            $CI->email->bcc($bcc);
                            
                            if($attachment != "")
                                $CI->email->attach($attachment);
                                
                                $CI->email->subject($sub);
                                $CI->email->message($msg);
                                
                                if( $CI->email->send() )
                                    return true;
                                    
        }
        return false;
    }
    
}

//Get User Type
if( ! function_exists('getTemplate'))
{
    function getTemplate($user_id='')
    {
        $CI =& get_instance();
        $user_type='';
        $template='';
        if($user_id=='')
        {
            $user_id = getUserRec()->id;
        }
        $user_groups = $CI->ion_auth->get_users_groups($user_id)->result();
        switch($user_groups[0]->id)
        {
            case 1:
                $user_type='admin';
                $template = $user_type.'-template';
                break;
            case 2:
                $user_type='user';
                $template = 'site-template';
                break;
        }
        return $template;
    }
}

/*To print array  or object*/
if( !function_exists('print_array')){
    function print_array($data = []){
        echo "<pre>";print_r($data);exit();
    }
}