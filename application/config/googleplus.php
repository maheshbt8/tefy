<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*$config['googleplus']['application_name'] = '';
$config['googleplus']['client_id']        = '631401232828-0fcqq6ink5s87i2jm8ltae6e8379gva1.apps.googleusercontent.com';
$config['googleplus']['client_secret']    = 'kVJoPg5-Yjb1SBi8CziosAet';
$config['googleplus']['redirect_uri']     = base_url('auth/google_login');
$config['googleplus']['api_key']          = '';
$config['googleplus']['scopes']           = array();
$r=$config;
echo "<pre>";
print_r($r);*/
$CI =& get_instance();
    $CI->load->database();
    
    /*Emial settings*/
    $results = $CI->db->query("SELECT `setting_type`, `description` FROM `settings` WHERE `setting_type` IN('system_name', 'google_client_id', 'google_client_secret', 'google_redirect_uri', 'google_api_key')")->result();
    $settings = array();
    foreach($results as $r) {
        $settings[strtolower($r->setting_type)] =  $r->description;
    }

$config['googleplus']['application_name'] = $settings['system_name'];
$config['googleplus']['client_id']        = $settings['google_client_id'];
$config['googleplus']['client_secret']    = $settings['google_client_secret'];
$config['googleplus']['redirect_uri']     = base_url('auth/google_login');
$config['googleplus']['api_key']          = $settings['google_api_key'];
$config['googleplus']['scopes']           = array();

/*echo "<pre>";
print_r($config);die;*/