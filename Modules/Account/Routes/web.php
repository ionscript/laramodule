<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:account', 'verified'])->group(static function () {
    /* Dashboard Routes... */
    Route::get('/', 'DashboardController@indexAction')->name('index');
    Route::get('/dashboard', 'DashboardController@indexAction')->name('dashboard');

    /* Agent Routes... */
    Route::get('/agent', 'Agent\AgentController@indexAction')->name('agent');
    Route::get('/agent/add', 'Agent\AgentController@addAction')->name('agent.add');
    Route::get('/agent/edit', 'Agent\AgentController@editAction')->name('agent.edit');
    Route::post('/agent/create', 'Agent\AgentController@createAction')->name('agent.create');
    Route::post('/agent/update', 'Agent\AgentController@updateAction')->name('agent.update');
    Route::post('/agent/delete', 'Agent\AgentController@deleteAction')->name('agent.delete');

    /* Agent Group Routes... */
    Route::get('/agent/group', 'Agent\GroupController@indexAction')->name('agent-group');
    Route::any('/agent/group/add', 'Agent\GroupController@addAction')->name('agent-group.add');
    Route::any('/agent/group/edit', 'Agent\GroupController@editAction')->name('agent-group.edit');
    Route::any('/agent/group/delete', 'Agent\GroupController@deleteAction')->name('agent-group.delete');

    /* Report Routes... */
    Route::get('/report', 'ReportController@indexAction')->name('report');
    Route::any('/report/add', 'ReportController@addAction')->name('report.add');
    Route::any('/report/edit', 'ReportController@editAction')->name('report.edit');
    Route::any('/report/delete', 'ReportController@deleteAction')->name('report.delete');

    /* ACCOUNT Routes... */
    Route::get('/account', 'AccountController@indexAction')->name('account');
    Route::any('/account/edit', 'AccountController@editAction')->name('account.edit');
    Route::any('/account/delete', 'AccountController@deleteAction')->name('account.delete');
});

/* Authentication Login Routes... */
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

/* Authentication Register Routes... */
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

/* Authentication Password Reset Routes... */
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

/* Password Confirmation Routes... */
Route::get('/password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('/password/confirm', 'Auth\ConfirmPasswordController@confirm');

/* Authentication Email Verification Routes... */
Route::get('/email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

