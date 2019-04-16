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
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admindashboard', 'AdminDashboardController@index');

//customer
Route::prefix('customer')->group(function(){
    Route::get('/login', 'Auth\CustomerLoginController@showLoginForm')->name('customer.login');
    Route::post('/login', 'Auth\CustomerLoginController@login')->name('customer.login.submit');
    Route::get('/', 'CustomerController@index')->name('customer.dashboard');
});
