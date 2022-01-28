<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| System Routes
|--------------------------------------------------------------------------
*/

/* Dashboard Routes... */
Route::get('/', 'DashboardController@index')->name('index');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

/* User Routes... */
Route::get('/user', 'User\UserController@index')->name('user');
Route::any('/user/add', 'User\UserController@create')->name('user.create');
Route::any('/user/edit', 'User\UserController@edit')->name('user.edit');
Route::any('/user/delete', 'User\UserController@delete')->name('user.delete');

/* User Group Routes... */
Route::get('/user/group', 'User\GroupController@index')->name('user-group');
Route::any('/user/group/add', 'User\GroupController@create')->name('user-group.create');
Route::any('/user/group/edit', 'User\GroupController@edit')->name('user-group.edit');
Route::any('/user/group/delete', 'User\GroupController@delete')->name('user-group.delete');

/* Log Routes... */
Route::get('/log', 'System\LogController@index')->name('log');
Route::get('/log/download', 'System\LogController@download')->name('log.download');
Route::get('/log/clear', 'System\LogController@clear')->name('log.clear');

/* Setting Routes... */
Route::get('/setting', 'System\SettingController@index')->name('setting');
Route::post('/setting/edit', 'System\SettingController@edit')->name('setting.edit');

/* Page Routes... */
Route::get('/page', 'System\PageController@index')->name('page');
Route::any('/page/add', 'System\PageController@create')->name('page.create');
Route::any('/page/edit', 'System\PageController@edit')->name('page.edit');
Route::any('/page/delete', 'System\PageController@delete')->name('page.delete');

/* Authentication Routes... */
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');


/*
|--------------------------------------------------------------------------
|  Routes
|--------------------------------------------------------------------------
*/


/* Customer Routes... */
Route::get('/customer', 'Customer\CustomerController@index')->name('customer');
Route::any('/customer/add', 'Customer\CustomerController@create')->name('customer.create');
Route::any('/customer/edit', 'Customer\CustomerController@edit')->name('customer.edit');
Route::any('/customer/delete', 'Customer\CustomerController@delete')->name('customer.delete');

/* Customer Group Routes... */
Route::get('/customer/group', 'Customer\GroupController@index')->name('customer-group');
Route::any('/customer/group/add', 'Customer\GroupController@create')->name('customer-group.create');
Route::any('/customer/group/edit', 'Customer\GroupController@edit')->name('customer-group.edit');
Route::any('/customer/group/delete', 'Customer\GroupController@delete')->name('customer-group.delete');
