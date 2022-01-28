<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Twilio Routes
|--------------------------------------------------------------------------
*/

//Route::middleware('auth:api')->group(static function () {
//    Route::get('/twilio/voice', 'Twilio\VoiceController@indexAction');
//    Route::post('/voice', 'CallController@index');
//    Route::get('/fall', 'FallController@index');
//    Route::post('/fall', 'FallController@index');
//});


Route::post('/twilio/voice', 'Twilio\VoiceController@indexAction');
Route::post('/twilio/fall', 'Twilio\VoiceController@fallAction');
Route::post('/twilio/status', 'Twilio\VoiceController@statusAction');


Route::get('/twilio/voice', 'Twilio\VoiceController@indexAction');
Route::get('/twilio/fall', 'Twilio\VoiceController@fallAction');
Route::get('/twilio/status', 'Twilio\VoiceController@statusAction');

//Route::post('/voice', 'CallController@index');
//Route::get('/fall', 'FallController@index');
//Route::post('/fall', 'FallController@index');
