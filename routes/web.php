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

Route::get('/view', 'DashboardController@view');

Route::get('/card/{id}', 'ViewController@dynamicview');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::post('/save', 'DashboardController@store');

Route::post('/service-save', 'DashboardController@service_store');

Route::post('/project-save', 'DashboardController@project_store');

Route::post('/mail-sent/{email}', 'DashboardController@contact_mail');

Route::post('/wht', 'DashboardController@whtsapp');

Route::get('/map','DashboardController@map');
