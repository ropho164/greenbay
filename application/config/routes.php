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
$route['(en|vn)/accommodation/list'] = 'website/accommodation/list_rooms';
/*Dynamic route*/
require_once( BASEPATH .'database\DB.php' );
//include(APPPATH.'config/database'.EXT);
$db =& DB();
$db->where('deleted', 0);
$query = $db->get( 'cms_routes' );
$result = $query->result();
foreach( $result as $row ){
    $route[ '(en|vn)/'.$row->slug ]                 = $row->controller;
    $route[ '(en|vn)/'.$row->slug.'/:any' ]         = $row->controller;
}
/*End dynamic route*/
/*
$route['(en|vn)/explore'] = 'website/home/abouts';
$route['(en|vn)/explore/(:any)'] = 'website/home/abouts';
$route['(en|vn)/dining'] = 'website/home/dining';
$route['(en|vn)/dining/(:any)'] = 'website/home/dining';
$route['(en|vn)/meetings-weddings'] = 'website/home/recreation';
$route['(en|vn)/meetings-weddings/(:any)'] = 'website/home/recreation';
$route['(en|vn)/interests'] = 'website/home/spa';
$route['(en|vn)/interests/(:any)'] = 'website/home/spa';
$route['(en|vn)/special-offers'] = 'website/home/specialoffers';
$route['(en|vn)/accommodation/list'] = 'website/accommodation/list_rooms';
$route['(en|vn)/accommodation/(:any)'] = 'website/accommodation/index/$1';
$route['(en|vn)/accommodation'] = 'website/accommodation';
*/
$route['(en|vn)/gallery'] = 'website/home/gallery';
$route['(en|vn)/gallery/videos'] = 'website/home/videos';
$route['(en|vn)/reservation'] = 'website/reservation';
$route['(en|vn)/reservation/booking'] = 'website/reservation/booking';
$route['(en|vn)/home/add-newsletter'] = 'website/home/addNewsletter';
$route['(en|vn)/home/add-contact'] = 'website/home/addContact';
$route['(en|vn)/contact-us'] = 'website/home/contact';
$route['(en|vn)/policy'] = 'website/home/policy';
$route['(en|vn)/payment_and_cancellation'] = 'website/home/paymentCancellation';
$route['(en|vn)/sitemap'] = 'website/home/sitemap';
/*
$route['(en|vn)/reservation/booking-proccess'] = 'website/reservation/reservationProccess';
$route['(en|vn)/reservation/get-price-room'] = 'website/reservation/getPriceRoomType';
$route['(en|vn)/reservation/local-payment'] = 'website/reservation/atmPayment';
$route['(en|vn)/reservation/local-payment-process'] = 'website/reservation/atmPaymentProcess';
$route['(en|vn)/reservation/international-payment'] = 'website/reservation/internationalPayment';
$route['(en|vn)/reservation/international-payment-process'] = 'website/reservation/internalPaymentProcess';
*/
$route['(en|vn)/reservation-demo/booking'] = 'website/reservationdemo/booking';
$route['(en|vn)/reservation-demo'] = 'website/reservationdemo';
$route['(en|vn)/reservation/booking-proccess'] = 'website/reservationdemo/reservationProccess';
$route['(en|vn)/reservation/get-price-room'] = 'website/reservationdemo/getPriceRoomType';
$route['(en|vn)/reservation/local-payment'] = 'website/reservationdemo/atmPayment';
$route['(en|vn)/reservation/local-payment-process'] = 'website/reservationdemo/atmPaymentProcess';
$route['(en|vn)/reservation/international-payment'] = 'website/reservationdemo/internationalPayment';
$route['(en|vn)/reservation/international-payment-process'] = 'website/reservationdemo/internalPaymentProcess';

$route['media/(:any)'] = 'media/resize/$1';
//$route['uploads/rooms/slide_details/(:any)'] = 'media/resize/$1';
//$route['uploads/rooms/(:any)'] = 'media/resize/$1';

// validate form
$route['validate-form'] 				= "validateForm/index";
$route['validate-form/form-validation'] = "validateForm/formValidate";
/* End of file routes.php */
/* Location: ./application/config/routes.php */