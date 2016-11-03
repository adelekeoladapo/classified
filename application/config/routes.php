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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Classified';
$route['(:num)'] = 'Classified/index/$1';
$route['user/registration-successful/(:any)'] = 'user/show_success_register/$1';
$route['activate-account/(:any)'] = 'user/activateAccount/$1';
$route['login'] = 'user/login';
$route['logout'] = 'user/logout';
$route['post-ad'] = 'product/postAd';
$route['ad/(:any)'] = 'product/viewAd/$1';
$route['ads/(:any)'] = 'product/viewCategoryAds/$1';
$route['manage-ads'] = 'user/manageAds';
$route['edit-ad/(:any)'] = 'user/editAd/$1';
$route['messages'] = 'user/showMessages';
$route['message/(:any)'] = 'user/showMessage/$1';
$route['forgot-password'] = 'user/forgotPassword';
$route['reset-password/(:any)'] = 'user/resetPassword/$1';
$route['my-profile'] = 'user/myProfile';



/** Admin urls **/
$route['admin'] = 'admin/Admin';
$route['admin/(:any)'] = 'admin/Admin/$1';
$route['admin/media/(:any)'] = 'admin/Media/$1';



/*
 * APIs
 */
$route['api/get-sub-categories'] = 'category/getSubCategories';
$route['api/delete-ad'] = 'user/deleteProduct';
$route['api/mail-seller'] = 'mail/mailSeller';
$route['api/delete-mail'] = 'mail/deleteMail';
$route['api/update-ad'] = 'product/updateAd';
$route['api/update-user'] = 'user/updateUser';
$route['api/confirm-password'] = 'user/confirmPassword';
$route['api/change-password'] = 'user/changePassword';
$route['api/get-most-viewed-products'] = 'product/getMostViewed';
$route['api/get-least-viewed-products'] = 'product/getLeastViewed';
$route['api/add-payment'] = 'payment/addPayment';



/** Admin APIs **/
$route['api/init-admin'] = 'admin/admin/init';
$route['api/get-users'] = 'user/getUsers';
$route['api/get-user'] = 'user/getUser';
$route['api/get-products'] = 'product/getProducts';
$route['api/get-categories'] = 'category/getCategories';
$route['api/get-product'] = 'product/getProduct';
$route['api/get-product-images'] = 'product/getProductImages';
$route['api/add-category'] = 'category/addCategory';
$route['api/add-sub-category'] = 'category/addSubCategory';
$route['api/update-category'] = 'category/updateCategory';
$route['api/get-countries'] = 'location/getCountries';
$route['api/get-states'] = 'location/getStates';
$route['api/add-country'] = 'location/addCountry';
$route['api/add-state'] = 'location/addState';
$route['api/update-state'] = 'location/updateState';
$route['api/update-country'] = 'location/updateCountry';
$route['api/add-advert'] = 'advert/addAdvert';
$route['api/get-adverts'] = 'advert/getAdverts';
$route['api/update-advert'] = 'advert/updateAdvert';
$route['api/delete-advert'] = 'advert/deleteAdvert';
$route['api/activate-advert'] = 'advert/activateAdvert';
$route['api/deactivate-advert'] = 'advert/deactivateAdvert';
$route['api/get-payments'] = 'payment/getPayments';
$route['api/get-user-payments'] = 'payment/getUserPayments';
$route['api/boost-account'] = 'user/boostAccount';
$route['api/deactivate-user'] = 'user/deactivateUser';
$route['api/activate-user'] = 'user/activateUser';
$route['api/delete-product'] = 'user/deleteProduct';
$route['api/get-admins'] = 'admin/admin/getAdmins';
$route['api/get-admin'] = 'admin/admin/getAdmin';
$route['api/add-admin'] = 'admin/admin/insertAdmin';







/*
 * Controller routes
 */
$route['state/(:any)'] = 'state/$1';


$route['test'] = 'product/test';

$route['(:any)'] = 'Classified/view/$1';
$route['user/(:any)'] = 'User/$1';
$route['user/(:any)/(:any)'] = 'User/$1/$2';





$route['admin/(:any)'] = 'admin/Admin/$1';
$route['admin/media/(:any)'] = 'admin/Media/$1';
$route['admin'] = 'admin/Admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
