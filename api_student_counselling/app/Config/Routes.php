<?php

namespace Config;

use App\Controllers\District;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.'/'
$routes->get('/', 'Home::index');
//  $routes->resource('login');


$routes->post('login', 'Login::index');
// User routes
$routes->get('getAllUsers','User::index');
$routes->get('user/(:num)','User::show/$1');
$routes->post('user/create','User::create');
$routes->patch("user/update/(:num)","User::update/$1");
$routes->delete("user/delete/(:num)","User::delete/$1");



// Patients routes
$routes->get('patients','Patients::index');
$routes->get('patient/(:num)','Patients::show/$1');
$routes->post('patient/create','Patients::create');
$routes->patch("patient/update/(:num)","Patients::update/$1");
$routes->delete("patient/delete/(:num)","Patients::delete/$1");
$routes->get("patient/rfid/(:any)","Patients::getByRFID/$1");

// Patients routes
$routes->get('patient/m_history','MedicalHistory::index');
$routes->get('patient/m_history/(:num)','MedicalHistory::show/$1');
$routes->get('patient/m_history/patient/(:num)','MedicalHistory::patientHistory/$1');
$routes->post('patient/m_history/create','MedicalHistory::create');
$routes->patch("patient/m_history/update/(:num)","MedicalHistory::update/$1");
$routes->delete("patient/m_history/delete/(:num)","MedicalHistory::delete/$1");

// schools routes
$routes->get('schools','Schools::index');
$routes->get('schools/(:num)','Schools::show/$1');
$routes->post('schools/create','Schools::create');
$routes->patch("schools/update/(:num)","Schools::update/$1");
$routes->delete("schools/delete/(:num)","Schools::delete/$1");

// doctor routes
$routes->get('doctors/listAll','DoctorProfile::listAll');
$routes->get('doctors/(:num)','DoctorProfile::show/$1');
$routes->post('doctors/create','DoctorProfile::create');
$routes->patch("doctors/update/(:num)","DoctorProfile::update/$1");
$routes->delete("doctors/delete/(:num)","DoctorProfile::delete/$1");
$routes->patch("doctor/status/(:num)/(\b(0|1|2|3|4|5)\b)","DoctorProfile::updateStatus/$1/$2");
$routes->post("doctor/get/available","DoctorProfile::getAvailable");
$routes->patch("doctors/update_token/(:num)","DoctorProfile::updateToten/$1");
$routes->get("doctors/get_token/(:num)","DoctorProfile::getToten/$1");

// doctor routes
$routes->get('prescriptions','Prescriptions::index');
$routes->get('prescriptions/(:num)','Prescriptions::show/$1');
$routes->post('prescriptions/create','Prescriptions::create');
$routes->patch("prescriptions/update/(:num)","Prescriptions::update/$1");
$routes->delete("prescriptions/delete/(:num)","Prescriptions::delete/$1");

// Kiosk routes
$routes->get('kiosk/listAll','Kiosk::index');
$routes->get('kiosk/(:num)','Kiosk::show/$1');
$routes->post('kiosk/create','Kiosk::create');
$routes->patch("kiosk/update/(:num)","Kiosk::update/$1");
$routes->delete("kiosk/delete/(:num)","Kiosk::delete/$1");

// Calls routes
$routes->get('calls','Calls::index');
$routes->get('calls/(:num)','Calls::show/$1');
$routes->post('calls/create','Calls::create');
$routes->patch("calls/update/(:num)","Calls::update/$1");
$routes->delete("calls/delete/(:num)","Calls::delete/$1");
$routes->get('calls/doctor/(:num)','Calls::getCallsByDr/$1');

// languages routes
$routes->get('languages/listAll', 'Languages::listAll');
$routes->get('languages/(:num)', 'Languages::show/$1');
$routes->post('languages', 'Languages::create');
$routes->patch('languages/update/(:num)', 'Languages::update/$1');
$routes->delete('languages/delete/(:num)', 'Languages::delete/$1');

// languages routes
$routes->get('counsellings/listAll', 'Counsellings::listAll');
$routes->get('counsellings/(:num)', 'Counsellings::show/$1');
$routes->post('counsellings', 'Counsellings::create');
$routes->patch('counsellings/update/(:num)', 'Counsellings::update/$1');
$routes->delete('counsellings/delete/(:num)', 'Counsellings::delete/$1');

// languages routes
$routes->get('qualifications/listAll', 'Qualifications::listAll');
$routes->get('qualifications/(:num)', 'Qualifications::show/$1');
$routes->post('qualifications', 'Qualifications::create');
$routes->patch('qualifications/update/(:num)', 'Qualifications::update/$1');
$routes->delete('qualifications/delete/(:num)', 'Qualifications::delete/$1');

// languages routes
$routes->get('specializations/listAll', 'Specializations::listAll');
$routes->get('specializations/(:num)', 'Specializations::show/$1');
$routes->post('specializations', 'Specializations::create');
$routes->patch('specializations/update/(:num)', 'Specializations::update/$1');
$routes->delete('specializations/delete/(:num)', 'Specializations::delete/$1');


// // SHG routes
// $routes->get('shglistAll', 'shgprofile::getList');
// $routes->get('shgprofile/(:num)', 'shgprofile::show/$1');
// $routes->post('shgCreate', 'shgprofile::create',['filter'=>"authFilter"]);
// $routes->patch('shgprofile/update/(:num)', 'shgprofile::update/$1');
// $routes->delete('shgprofile/delete/(:num)', 'shgprofile::delete/$1');

// // state routes
// $routes->get('stateListAll', 'State::getList');
// $routes->get('state/(:num)', 'State::show/$1');
// $routes->post('state/create', 'State::create',['filter'=>"authFilter"]);
// $routes->patch('state/update/(:num)', 'State::update/$1');
// $routes->delete('state/delete/(:num)', 'State::delete/$1');
// $routes->get('getDistricts/(:num)', 'State::getDistricts/$1');

// // district routes
// $routes->get('districtListAll','District::index');
// $routes->get('district/(:num)','District::show/$1');
// $routes->post('district/create','District::create',['filter'=>"authFilter"]);
// $routes->patch("district/update/(:num)","District::update/$1");
// $routes->delete("district/delete/(:num)","District::delete/$1");

// // city routes
// $routes->get('/state/cities/(:num)','City::getStateCities/$1');
// $routes->get('/disctrict/cities/(:num)','City::getDistrictCities/$1');
// $routes->get('getAllCities','City::index');
// $routes->get('city/(:num)','City::show/$1');
// $routes->post('city/create','City::create',['filter'=>"authFilter"]);
// $routes->patch("city/update/(:num)","City::update/$1");
// $routes->delete("city/delete/(:num)","City::delete/$1");

// // customer routes
// $routes->get('getAllCustomers','customer::index');
// $routes->get('customer/(:num)','customer::show/$1');
// $routes->get('customers/shg/(:num)','customer::shgCustomers/$1');
// $routes->post('customer/create','customer::create',['filter'=>"authFilter"]);
// $routes->patch("customer/update/(:num)","customer::update/$1");
// $routes->delete("customer/delete/(:num)","customer::delete/$1");


// // Vendor routes
// $routes->get('getAllVendors','Vendor::index');
// $routes->get('vendor/(:num)','Vendor::show/$1');
// $routes->get('vendor/shg/(:num)','vendor::shgVendor/$1');
// $routes->post('vendor/create','Vendor::create',['filter'=>"authFilter"]);
// $routes->patch("vendor/update/(:num)","Vendor::update/$1");
// $routes->delete("vendor/delete/(:num)","Vendor::delete/$1");

// // Companies routes
// $routes->get('getAllCompanies','Company::index');
// $routes->get('company/(:num)','Company::show/$1');
// $routes->post('company/create','Company::create',['filter'=>"authFilter"]);
// $routes->patch("company/update/(:num)","Company::update/$1");
// $routes->delete("company/delete/(:num)","Company::delete/$1");

// // User routes
// $routes->get('getAllUsers','User::index');
// $routes->get('user/(:num)','User::show/$1');
// $routes->post('user/create','User::create',['filter'=>"authFilter"]);
// $routes->patch("user/update/(:num)","User::update/$1");
// $routes->delete("user/delete/(:num)","User::delete/$1");
// $routes->get('user/getRoleId/(:num)','User::getRoleId/$1');

// // Business routes
// $routes->get('business/listAll','Business::index');
// $routes->get('business/(:num)','Business::show/$1');
// $routes->post('business/create','Business::create',['filter'=>"authFilter"]);
// $routes->patch("business/update/(:num)","Business::update/$1");
// $routes->delete("business/delete/(:num)","Business::delete/$1");

// // Profile routes
// $routes->get('profile/listAll','profile::index');
// $routes->get('profile/(:num)','profile::show/$1');
// $routes->get('profile/shg/(:num)','profile::shgProfile/$1');
// $routes->post('profile/create','profile::create',['filter'=>"authFilter"]);
// $routes->patch("profile/update/(:num)","profile::update/$1");
// $routes->delete("profile/delete/(:num)","profile::delete/$1");

// // Product routes
// $routes->get('product/listAll','Product::index');
// $routes->get('product/(:num)','Product::show/$1');
// $routes->get('product/shg/(:num)','product::shgProduct/$1');
// $routes->post('product/create','Product::create',['filter'=>"authFilter"]);
// $routes->patch("product/update/(:num)","Product::update/$1");
// $routes->delete("product/delete/(:num)","Product::delete/$1");

// // Roles routes
// $routes->get('roles/listAll','Roles::index');
// $routes->get('roles/(:num)','Roles::show/$1');
// $routes->post('roles/create','Roles::create',['filter'=>"authFilter"]);
// $routes->patch("roles/update/(:num)","Roles::update/$1");
// $routes->delete("roles/delete/(:num)","Roles::delete/$1");
// $routes->get('roles/checkAccess/(:num)/([a-z_]+)','Roles::checkAccess/$1/$2');

// // send message route
// $routes->post("sendMessage/(\b(customer|vendor)\b)","Outbox::sendMessage/$1");
















/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}