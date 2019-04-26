<?php

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
    return view('welcome');
});


Route::get('/feeditems', function(){
    return view('feeditems');
});
Route::resource('feeds','FeedController');
Route::resource('orders','OrdersController');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admindashboard', 'AdminDashboardController@index');
Route::get('/adminorders', 'OrdersController@index');
//customer
Route::prefix('customer')->group(function(){
    Route::get('/login', 'Auth\CustomerLoginController@showLoginForm')->name('customer.login');
    Route::post('/login', 'Auth\CustomerLoginController@login')->name('customer.login.submit');
    Route::get('/', 'CustomerController@index')->name('customer.dashboard');

    Route::get('/register', 'Auth\CustomerRegisterController@showRegistrationForm')->name('customer.register');
    Route::post('/register', 'Auth\CustomerRegisterController@register')->name('customer.register.submit');
});
// token based registration
Route::get('/customer/activation/{token}', 'Auth\CustomerRegisterController@customerActivation');
//localization route
Route::get('lang/{locale}', 'LocalizationController@index');