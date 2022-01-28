<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Twilio Routes
|--------------------------------------------------------------------------
*/

Route::get('/voice', 'Twilio\VoiceController@indexAction');
Route::post('/voice', 'CallController@index');
Route::get('/fall', 'FallController@index');
Route::post('/fall', 'FallController@index');
