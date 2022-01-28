<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Mailgun Routes
|--------------------------------------------------------------------------
*/

Route::get('/status', 'StatusController@index')->name('status');
