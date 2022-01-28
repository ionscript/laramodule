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

    /* Contact Routes... */
    Route::get('/contact', 'Contact\ContactController@indexAction')->name('contact');
    Route::get('/contact/add', 'Contact\ContactController@addAction')->name('contact.add');
    Route::get('/contact/edit', 'Contact\ContactController@editAction')->name('contact.edit');
    Route::post('/contact/create', 'Contact\ContactController@createAction')->name('contact.create');
    Route::post('/contact/update', 'Contact\ContactController@updateAction')->name('contact.update');
    Route::post('/contact/delete', 'Contact\ContactController@deleteAction')->name('contact.delete');

    /* Contact Note Routes... */
    Route::get('/contact/note', 'Contact\NoteController@indexAction')->name('contact-note');
    Route::get('/contact/note/add', 'Contact\NoteController@addAction')->name('contact-note.add');
    Route::get('/contact/note/edit', 'Contact\NoteController@editAction')->name('contact-note.edit');
    Route::post('/contact/note/create', 'Contact\NoteController@createAction')->name('contact-note.create');
    Route::post('/contact/note/update', 'Contact\NoteController@updateAction')->name('contact-note.update');
    Route::post('/contact/note/delete', 'Contact\NoteNoteController@deleteAction')->name('contact-note.delete');

    /* Address Routes... */
    Route::get('/address', 'AddressController@indexAction')->name('address');
    Route::get('/address/add', 'AddressController@addAction')->name('address.add');
    Route::get('/address/edit', 'AddressController@editAction')->name('address.edit');
    Route::post('/address/create', 'AddressController@createAction')->name('address.create');
    Route::post('/address/update', 'AddressController@updateAction')->name('address.update');
    Route::post('/address/delete', 'AddressController@deleteAction')->name('address.delete');
    Route::get('/address/state', 'AddressController@stateAjax')->name('address.country');

    /* Phone Number Routes... */
    Route::get('/phone', 'PhoneController@indexAction')->name('phone');
    Route::get('/phone/add', 'PhoneController@addAction')->name('phone.add');
    Route::get('/phone/edit', 'PhoneController@editAction')->name('phone.edit');
    Route::post('/phone/create', 'PhoneController@createAction')->name('phone.create');
    Route::post('/phone/update', 'PhoneController@updateAction')->name('phone.update');
    Route::post('/phone/delete', 'PhoneController@deleteAction')->name('phone.delete');

    /* Extension Routes... */
    Route::get('/extension', 'ExtensionController@indexAction')->name('extension');
    Route::get('/extension/add', 'ExtensionController@addAction')->name('extension.add');
    Route::get('/extension/edit', 'ExtensionController@editAction')->name('extension.edit');
    Route::post('/extension/create', 'ExtensionController@createAction')->name('extension.create');
    Route::post('/extension/update', 'ExtensionController@updateAction')->name('extension.update');
    Route::post('/extension/delete', 'ExtensionController@deleteAction')->name('extension.delete');

    /* SIP Routes... */
    Route::get('/sip', 'SipController@indexAction')->name('sip');
    Route::get('/sip/add', 'SipController@addAction')->name('sip.add');
    Route::get('/sip/edit', 'SipController@editAction')->name('sip.edit');
    Route::post('/sip/create', 'SipController@createAction')->name('sip.create');
    Route::post('/sip/update', 'SipController@updateAction')->name('sip.update');
    Route::post('/sip/delete', 'SipController@deleteAction')->name('sip.delete');

    /* SMS Routes... */
    Route::get('/sms', 'SmsController@indexAction')->name('sms');
    Route::any('/sms/add', 'SmsController@addAction')->name('sms.add');
    Route::any('/sms/edit', 'SmsController@editAction')->name('sms.edit');
    Route::any('/sms/delete', 'SmsController@deleteAction')->name('sms.delete');

    /* Queue Routes... */
    Route::get('/queue', 'QueueController@indexAction')->name('queue');
    Route::get('/queue/add', 'QueueController@addAction')->name('queue.add');
    Route::get('/queue/edit', 'QueueController@editAction')->name('queue.edit');
    Route::post('/queue/create', 'QueueController@createAction')->name('queue.create');
    Route::post('/queue/update', 'QueueController@updateAction')->name('queue.update');
    Route::post('/queue/delete', 'QueueController@deleteAction')->name('queue.delete');
    Route::get('/queue/autocomplete', 'QueueController@autocompleteAjax')->name('queue.autocomplete');

    /* Flow Routes... */
    Route::get('/flow', 'FlowController@indexAction')->name('flow');
    Route::get('/flow/add', 'FlowController@addAction')->name('flow.add');
    Route::get('/flow/edit', 'FlowController@editAction')->name('flow.edit');
    Route::post('/flow/create', 'FlowController@createAction')->name('flow.create');
    Route::post('/flow/update', 'FlowController@updateAction')->name('flow.update');
    Route::post('/flow/delete', 'FlowController@deleteAction')->name('flow.delete');

    /* Sub Menu Routes... */
    Route::get('/submenu', 'SubmenuController@indexAction')->name('submenu');
    Route::get('/submenu/add', 'SubmenuController@addAction')->name('submenu.add');
    Route::get('/submenu/edit', 'SubmenuController@editAction')->name('submenu.edit');
    Route::post('/submenu/create', 'SubmenuController@createAction')->name('submenu.create');
    Route::post('/submenu/update', 'SubmenuController@updateAction')->name('submenu.update');
    Route::post('/submenu/delete', 'SubmenuController@deleteAction')->name('submenu.delete');

    /* Voice Prompt Routes... */
    Route::get('/voice-prompt', 'VoicePromptController@indexAction')->name('voice-prompt');
    Route::any('/voice-prompt/add', 'VoicePromptController@addAction')->name('voice-prompt.add');
    Route::any('/voice-prompt/edit', 'VoicePromptController@editAction')->name('voice-prompt.edit');
    Route::any('/voice-prompt/delete', 'VoicePromptController@deleteAction')->name('voice-prompt.delete');

    /* Hold Music Routes... */
    Route::get('/hold-music', 'HoldMusicController@indexAction')->name('hold-music');
    Route::any('/hold-music/add', 'HoldMusicController@addAction')->name('hold-music.add');
    Route::any('/hold-music/edit', 'HoldMusicController@editAction')->name('hold-music.edit');
    Route::any('/hold-music/delete', 'HoldMusicController@deleteAction')->name('hold-music.delete');

    /* Schedule Routes... */
    Route::get('/schedule', 'ScheduleController@indexAction')->name('schedule');
    Route::any('/schedule/add', 'ScheduleController@addAction')->name('schedule.add');
    Route::any('/schedule/edit', 'ScheduleController@editAction')->name('schedule.edit');
    Route::any('/schedule/delete', 'ScheduleController@deleteAction')->name('schedule.delete');

    /* Recording Routes... */
    Route::get('/recording', 'RecordingController@indexAction')->name('recording');
    Route::any('/recording/add', 'RecordingController@addAction')->name('recording.add');
    Route::any('/recording/edit', 'RecordingController@editAction')->name('recording.edit');
    Route::any('/recording/delete', 'RecordingController@deleteAction')->name('recording.delete');

    /* Report Routes... */
    Route::get('/report', 'ReportController@indexAction')->name('report');
    Route::any('/report/add', 'ReportController@addAction')->name('report.add');
    Route::any('/report/edit', 'ReportController@editAction')->name('report.edit');
    Route::any('/report/delete', 'ReportController@deleteAction')->name('report.delete');

    /* Office Routes... */
    Route::get('/office', 'OfficeController@indexAction')->name('office');
    Route::get('/office/add', 'OfficeController@addAction')->name('office.add');
    Route::get('/office/edit', 'OfficeController@editAction')->name('office.edit');
    Route::post('/office/create', 'OfficeController@createAction')->name('office.create');
    Route::post('/office/update', 'OfficeController@updateAction')->name('office.update');
    Route::post('/office/delete', 'OfficeController@deleteAction')->name('office.delete');
    Route::get('/office/autocomplete', 'OfficeController@autocompleteAjax')->name('office.autocomplete');

    /* Department Routes... */
    Route::get('/department', 'DepartmentController@indexAction')->name('department');
    Route::get('/department/add', 'DepartmentController@addAction')->name('department.add');
    Route::get('/department/edit', 'DepartmentController@editAction')->name('department.edit');
    Route::post('/department/create', 'DepartmentController@createAction')->name('department.create');
    Route::post('/department/update', 'DepartmentController@updateAction')->name('department.update');
    Route::post('/department/delete', 'DepartmentController@deleteAction')->name('department.delete');
    Route::post('/department/autocomplete', 'DepartmentController@autocompleteAjax')->name('department.autocomplete');

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


//Route::domain('{account}.myapp.com')->group(function () {
//    Route::get('user/{id}', function ($account, $id) {
//        //
//    });
//});
