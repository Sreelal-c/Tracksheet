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
	return view('auth.login');
});

Auth::routes($options = array('register' => false));

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('backend')->group(function () {
	// Admin authentication routes
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

	Route::get('/', 'AdminController@index')->name('admin.home');
	Route::get('/home', 'AdminController@index')->name('admin.home');
});