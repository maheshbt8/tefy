<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'home/fore_zero_four';
$route['translate_uri_dashes'] = FALSE;

/*$CI =& get_instance();
$CI->load->database();
if(isset($_GET['school_code']) && $_GET['school_code'] != ''){

$route['(:any)']='home/urltest';
}*/
require_once( BASEPATH .'database/DB'. EXT );
$db =& DB();
$query = $db->select('school_name,school_code')->get( 'listings' );
$result = $query->result_array();
foreach( $result as $row )
{
	$name=str_replace(" ","-",$row['school_name']);
	$route[$name]='home/listings_single';
}

$route['set_row_status/(.+)'] = 'common/set_row_status/$1';
$route['delete_listing_img/(.+)'] = 'common/delete_listing_img/$1';

$route['listings-list']='home/listings_list';
$route['listings-list/(.+)']='home/listings_list/$1';
//$route['listings-single']='home/listings_single';

$route['terms-and-conditions'] = 'home/conditions/terms';
$route['privacy-policy'] = 'home/conditions/privacy';

$route['about_us'] = 'home/about_us';
$route['contact_us'] = 'home/contact_us';
$route['blogs'] = 'home/blog_list';
$route['blogs/(.+)'] = 'home/blog_list/$1';
$route['blog'] = 'home/blog';
$route['apply_admission'] = 'home/apply_admission';



$route['terms'] = 'admin/conditions/terms';
$route['privacy'] = 'admin/conditions/privacy';
$route['tefy-about_us'] = 'admin/conditions/about_us';