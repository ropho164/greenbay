<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['404_override'] = '';
$route['default_controller'] = "website/home/index";
$route['(en|vn)'] = 'website/home/index';
$route['(en|vn)/home'] = 'website/home/index';
$route['(en|vn)/explore'] = 'website/home/abouts';
$route['(en|vn)/explore/(:any)'] = 'website/home/abouts';
$route['(en|vn)/policy'] = 'website/home/policy';
$route['(en|vn)/sitemap'] = 'website/home/sitemap';
$route['(en|vn)/dining'] = 'website/home/dining';
$route['(en|vn)/dining/(:any)'] = 'website/home/dining';
$route['(en|vn)/meetings-weddings'] = 'website/home/recreation';
$route['(en|vn)/meetings-weddings/(:any)'] = 'website/home/recreation';
$route['(en|vn)/interests'] = 'website/home/spa';
$route['(en|vn)/interests/(:any)'] = 'website/home/spa';
$route['(en|vn)/special-offers'] = 'website/home/specialoffers';
$route['(en|vn)/gallery'] = 'website/home/gallery';
$route['(en|vn)/gallery/videos'] = 'website/home/videos';
$route['(en|vn)/home/add-newsletter'] = 'website/home/addNewsletter';
$route['(en|vn)/home/add-contact'] = 'website/home/addContact';
$route['(en|vn)/contact-us'] = 'website/home/contact';
$route['(en|vn)/accommodation/list'] = 'website/accommodation/list_rooms';
$route['(en|vn)/accommodation/(:any)'] = 'website/accommodation/index/$1';
$route['(en|vn)/accommodation'] = 'website/accommodation';
$route['(en|vn)/reservation'] = 'website/reservation';
$route['(en|vn)/reservation/booking'] = 'website/reservation/booking';
$route['media/(:any)'] = 'media/resize/$1';
//$route['uploads/rooms/slide_details/(:any)'] = 'media/resize/$1';
//$route['uploads/rooms/(:any)'] = 'media/resize/$1';

// validate form
$route['validate-form'] 				= "validateForm/index";
$route['validate-form/form-validation'] = "validateForm/formValidate";
/* End of file routes.php */
/* Location: ./application/config/routes.php */