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
    return view('auth/login');
});

// Route::group(['middleware' => 'role:developer'], function () {
//     Auth::logout();
//     return redirect('login')->withErrors(['Your account is inactive']);
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/report', 'ReportController@index')->name('report');
Route::get('/report/search', 'ReportController@search')->name('report.search');
Route::get('/report/export', 'ReportController@export')->name('report.export');
// Route::get('/management', 'ManagementController@index')->name('management');
Route::resource('/management', 'ManagementController', ['as' => 'employee']);
Route::resource('/admin/management', 'AdminController', ['as' => 'admin']);
Route::resource('/admin/configuration', 'EmailConfigurationController', ['as' => 'admin']);
Route::get('/profile', 'ProfileController@index')->name('profile');
// Route::get('/export', 'ExportController@index')->name('export');

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});

Route::get('/config-cache', function () {
    $exitCode = Artisan::call('config:cache');
    // return what you want
});

Route::get('/passport-client', function () {
    $exitCode = Artisan::call('passport:client');
    // return what you want
});
