<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Dashboard');
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
// route since we don't have to scan directories.



// AUTH ROUTE
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::index');
$routes->get('/logout', 'Login::logout');
// $routes->get('/register', 'Register::index');
// $routes->get('/forgetpassword', 'ForgetPassword::index');


// AUTH ROUTE END

$routes->get('/', 'Dashboard::index');
$routes->post('dashboard/getvalues', 'Dashboard::getvalues');

$routes->get('/user', 'User::index');
$routes->get('/adduser', 'User::create');
$routes->get('/adduser/(:num)', 'User::create/$1');
$routes->post('/saveuser', 'User::save');




//billing
$routes->get('/testing', 'BillingController::testing');
$routes->get('/admin/billing', 'BillingController::index');
$routes->post('/getbilling', 'BillingController::getbilling');
$routes->get('/billing/detail', 'BillingController::detail');



$routes->get('manage-user', 'ManageUser::UserData');
$routes->post('getuserdataforadmin', 'ManageUser::getuserdataforadmin');

$routes->post('viewuser/getuserdataforchurchurchusers', 'ManageUser::getuserdataforchurchurchusers');


$routes->get('viewuser/(:num)', 'ManageUser::viewchurchuser/$1');




// $routes->get('/adduser', 'User::create');
// $routes->get('/adduser/(:num)', 'User::create/$1');
// $routes->post('/saveuser', 'User::save');

$routes->get('/sendinfo/(:num)', 'User::sendinfo/$1');

$routes->get('/contacts', 'Contacts::index');
$routes->post('/getcontacts', 'Contacts::get_contacts');
$routes->get('/getcontacts', 'Contacts::get_contacts');
$routes->post('/contact-delete', 'Contacts::contactDelete');

$routes->get('/churches', 'Churches::index');
$routes->post('/save_churches', 'Churches::save_church');
$routes->post('/getchurch', 'Churches::get_church');
$routes->get('/switch/(:num)', 'Churches::switch/$1');
$routes->get('/delchurch', 'Churches::churchDelete');
$routes->post('/delchurch', 'Churches::churchDelete');
$routes->post('/edit-church', 'Churches::edit_Church');

$routes->get('/attendance', 'UserController::Attendance_Table');
$routes->post('/getattendance', 'Attendance::get_attendance');
$routes->post('/del-attendance', 'Attendance::del_attendance');


$routes->get('/view-profile', 'ProfileController::EditView');
$routes->post('/update-view', 'ProfileController::UpdateView');
$routes->get('/edit-password', 'ProfileController::Editpassword');
$routes->post('/update-password', 'ProfileController::updatepassword');

$routes->get('/contacts-profile/(:num)', 'UserController::Profile/$1');
$routes->get('/users', 'UserController::UserData');
$routes->post('/removeuser', 'UserController::removeuser');

$routes->get('/user/signupsubscription', 'UserController::signupsubscription');
$routes->get('/buyplan/(:num)/(:segment)', 'UserController::buyplan/$1/$2');

$routes->get('/comingsoon', 'Page::comingsoon');

//dsadas
$routes->get('/signup', 'Signup::index');
$routes->get('/signup/verifyemail/(:segment)', 'Signup::verifyemail/$1');
$routes->post('/signup/save', 'Signup::save');
$routes->get('/signup/verify/(:any)', 'Signup::verify/$1');
$routes->get('/signup/verificationsent', 'Signup::verificationsent');
$routes->post('/signup/verificationEmail', 'Signup::verificationEmail');
$routes->post('/signup/verifyotp', 'Signup::verifyotp');
$routes->post('/signup/resendemail', 'Signup::resendemail');


$routes->get('/recover-password', 'UserController::RecoverPassword');
$routes->post('/recover-password', 'UserController::forgot_pass');

$routes->get('/addcontacts', 'Contacts::add');
$routes->post('/add-contacts', 'Contacts::save');
$routes->post('updatecontact', 'UserController::UpdateContact');


$routes->get('/interests', 'Interests::index');
$routes->post('/getinterests', 'Interests::get_interests');

$routes->post('/getuserdata', 'UserController::getuserdata');


$routes->get('/integration', 'Integration::index');

$routes->get('/tasks/(:num)', 'Tasks::index/$1');

$routes->get('/notes/(:num)', 'Notes::index/$1');

$routes->get('/userattendance/(:num)', 'Attendance::userattendance/$1');


$routes->get('/prayer-request/(:num)', 'Survey::prayer_request/$1');
$routes->get('/biptism-request/(:num)', 'Survey::biptism_request/$1');
$routes->get('/bible_study/(:num)', 'Survey::bible_study/$1');


// 15.march.2023 Start
$routes->post('/saveintegration', 'Integration::integration_save');
$routes->post('/integrationEdit', 'Integration::integrationEdit');
$routes->post('/tasksave', 'Tasks::Savetask');
$routes->post('/deltask', 'Tasks::del_task');
$routes->post('/edittask', 'Tasks::edit_task');
$routes->post('/notesave', 'Notes::SaveNotes');
$routes->post('/delnotes', 'Notes::del_notes');
$routes->post('/editnotes', 'Notes::edit_notes');
$routes->post('/attendancesave', 'Attendance::SaveAttendance');
// 15.march.2023 End


$routes->post('/api/manychat', 'Api::manychat');

$routes->get('/api/manychat', 'Api::manychat');

$routes->post('/api/survey', 'Api::survey');
$routes->get('/api/survey', 'Api::survey');


$routes->get('getsubmissions/(:num)', 'Interests::getsubmissions/$1');


$routes->post('/api/communitysurvey', 'Api::communitysurvey');
$routes->get('/api/communitysurvey', 'Api::communitysurvey');

$routes->get('/tags/(:num)', 'Tags::index/$1');
$routes->post('/insert-tags', 'Tags::insert_tag');


$routes->post('/del-integration', 'Integration::integrationDelete');


$routes->get('/managecheckins', 'Checkins::manage');
$routes->post('/savemanagecheckins', 'Checkins::savemanagecheckins');
$routes->post('/mcedit', 'Checkins::mcedit');
$routes->post('/mcdel', 'Checkins::mcdel');

$routes->get('/import_contact', 'Contacts::importcontact');
// START-contacts-public
$routes->get('/public-contact', 'Contacts::PublicContacts');
$routes->post('/public-contact-save', 'Contacts::PublicContactsSave');

//$routes->get('/importcontact', 'Contacts::importcontact');
$routes->post('/importcontact_upload', 'Contacts::readExcel');

$routes->post('/readfile', 'Contacts::readfile');

// plan start;
$routes->get('/createnew', 'Plan::create');
$routes->post('/add-createnew', 'Plan::addcreate');
$routes->get('/manage-plan', 'Plan::manageplan');
$routes->get('/edit/(:num)', 'Plan::edit/$1');
$routes->get('/delete/(:num)', 'Plan::delete/$1');
$routes->get('/subscription', 'Plan::subscription');
$routes->get('/plan-detail/(:num)', 'Plan::plandetail/$1');
$routes->post('/addoption', 'Plan::addoption');
$routes->get('/option-plan', 'Plan::optionplan');
$routes->get('/optiondelete/(:num)', 'Plan::optiondelete/$1');
$routes->post('/addnew-option', 'Plan::addnewoption');
$routes->post('/get_option', 'Plan::get_option');
$routes->post('/getpackagesbytime', 'Plan::getpackagesbytime');
$routes->post('/changeoptionstatus', 'Plan::changeoptionstatus');

$routes->get('/decisioncard', 'Decisioncard::index');
$routes->post('/getdecisiondata', 'Decisioncard::getdecisiondata');

$routes->get('/adddecisioncard', 'Decisioncard::add');
$routes->post('/add-decisioncard', 'Decisioncard::save');

// plan end;

$routes->post('/reset', 'Login::resetpass');
$routes->get('/reset/verify/(:any)', 'Login::verify/$1');
$routes->post('/savenewpassword', 'Login::savenewpassword');

$routes->get('/contactsinsert/(:num)', 'Contactinterest::contactsInsert/$1');

$routes->get('/checkCookies', 'Login::checkCookies');

$routes->get('/addexternalcontact', 'Contacts::addexternalcontact');
$routes->post('/saveexternalcontact', 'Contacts::saveexternalcontact');

$routes->get('/tasknotification', 'Tasks::tasknotification');

$routes->get('/taskdetails', 'Taskdetails::index');
$routes->post('/gettaskdetails', 'Taskdetails::get_contacts');

$routes->get('/gettaskdetailsid', 'Taskdetails::gettaskdetailsid');
$routes->get('/savetaskcomment', 'Taskdetails::savetaskcomment');

$routes->post('/contactcurlapi', 'Api::contactcurlapi');
$routes->get('/contactcurlapi', 'Api::contactcurlapi');


$routes->get('/api/phone_d', 'Api::phone_d');

$routes->post('/api/request_api', 'Api::request_api');
$routes->post('/api/check_in', 'Api::check_in');
$routes->post('/api/baptism_request', 'Api::baptism_request');


$routes->get('payment/(:num)/(:segment)', 'Payment::index/$1/$2');
$routes->post('/plandetail', 'Payment::plandetail');
$routes->post('stripe/create-charge', 'Payment::createCharge');
$routes->get('stripe/bill', 'Payment::bill');


//signup subscription
$routes->get('/signupsubscription', 'Plan::signupsubscription');
// $routes->get('/encryptallpass', 'User::encryptallpass');
$routes->get('/viewchurch', 'Churches::viewchurch');
$routes->post('/Churches/seessionSave', 'Churches::seessionSave');
$routes->post('/save_view_church', 'Churches::save_view_church');
$routes->post('/church_detail', 'Churches::church_detail');
$routes->post('/getplanid', 'Plan::getplanid');
$routes->get('/upgradeplan', 'Page::upgradeplan');



//Group
$routes->get('/group-details', 'Group::group_details');
$routes->post('/save-groupdetails', 'Group::savegroupdetails');
$routes->post('/getgroupdata', 'Group::getgroupdata');
$routes->get('/sidebarmenuitems/(:num)', 'Group::sidebarmenuitems/$1');
$routes->get('/delete-group/(:num)', 'Group::delete_group/$1');
$routes->post('/addmenuoption', 'Group::addmenuoption');


$routes->post('/manage-churches', 'Churches::index_new');




// dynamic form routes
$routes->get('/dynamic_form', 'Dynamicform::index');

$routes->post('/getformdata', 'Dynamicform::getformdata');

$routes->get('/addnewdynamicform', 'Dynamicform::addnewdynamicform');

$routes->post('/savedynamicform', 'Dynamicform::store');

$routes->get('viewdynamicform/(:num)', 'Dynamicform::viewForm/$1');


$routes->post('viewsavedynamicform', 'Dynamicform::viewsavedynamicform');
$routes->get('viewdynamicformforuser', 'Dynamicform::viewdynamicformforuser');

$routes->get('viewdynamicelement/(:num)', 'Dynamicform::viewdynamicelement/$1');


$routes->post('getusersubmitteddata', 'Dynamicform::getusersubmitteddata');

$routes->post('ajaxgetusersubmitteddata', 'Dynamicform::ajaxgetusersubmitteddata');






$routes->get('/Surveys', 'Survey::Surveys');

$routes->get('/viewsurveyanswer/(:num)', 'Survey::viewsurveyanswer/$1');


$routes->post('viewsurveyanswer/getsurveyanswer', 'Survey::getsurveyanswer');


$routes->post('/getsurvey', 'Survey::getsurvey');




// dynamic form routes

$routes->get('/feedback', 'FeedbackController::index');
$routes->get('/admin/feedback', 'FeedbackController::adminfeddback');
$routes->post('/feedback/store', 'FeedbackController::store');
$routes->post('/feedback/fetch', 'FeedbackController::fetch');




// $routes->get('/encryptallpass', 'User::encryptallpass');

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
