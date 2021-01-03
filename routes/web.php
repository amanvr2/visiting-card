<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('home');
});

Route::get('/demo', function () {
    return view('welcome');
});

Route::get('/howitWorks', function () {
    return view('howitworks');
});

Route::get('/pricing', function () {
    return view('pricing');
});

Route::get('/test', function () {
    return view('tes');
});

Route::post('/go', 'UserdataController@go');


Route::get('/card/{id}', 'ViewController@dynamicview');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/add', 'DashboardController@add');

Route::post('/save', 'DashboardController@store');

Route::post('/service-save', 'DashboardController@service_store');

Route::post('/project-save', 'DashboardController@project_store');

Route::post('/vcf-save', 'DashboardController@vcf');

Route::post('/mail-sent/{email}', 'ViewController@contact_mail');

Route::get('/link-sent', 'DashboardController@link');

Route::get('/my-details', 'DashboardController@myDetails');  

 
Route::get('/show-basicDetails/{id}', 'DashboardController@showbasicDetails');   
Route::post('/edit-basicDetails/{id}', 'DashboardController@editbasicDetails');   

Route::get('/show-serviceDetails/{id}', 'DashboardController@showserviceDetails');    
Route::post('/edit-serviceDetails/{id}', 'DashboardController@editserviceDetails');  

Route::get('/show-projectDetails/{id}', 'DashboardController@showprojectDetails');    
Route::post('/edit-projectDetails/{id}', 'DashboardController@editprojectDetails');  

Route::post('/edit-vcf/{id}', 'DashboardController@editvcf');

Route::get('/service-delete/{id}', 'DashboardController@serviceDelete');
Route::get('/project-delete/{id}', 'DashboardController@projectDelete');

Route::get('/freeTrial', 'PaymentController@freeTrial');   


Route::get('/forgot-password', function () {
  return view('forgotPassword.number');
});
Route::get('/otp-sent','ForgotpasswordController@otp_sent');
Route::get('/verify','ForgotpasswordController@verify');
Route::get('/change', 'ForgotpasswordController@change'); 

Route::get('/share/{id}','PaymentController@refer');
Route::get('/payments-history', 'PaymentController@paymentshistory');
Route::get('/download-invoice/{invoiceId}', 'PaymentController@export_pdf');

Route::get('/testfire', 'PaymentController@hell');





Route::get('/fetch','UserdataController@fetch'); 

 







































// Route::get('/test', function () {
//     return view('test');
// }); 

// Route::post('/testo', 'DashboardController@test');    


// Route::get('/view', 'DashboardController@view');
// Route::post('/wht', 'DashboardController@whtsapp');
// Route::get('/map','DashboardController@map');