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

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    
    Route::prefix('smsgateway')->group(function() {
        Route::get('/', 'SmsGatewayController@index');
    });
    

    Route::prefix('sms_settings')->group(function() {
        Route::get('/', 'SmsSettingController@index');
        Route::put('/update/{id}', 'SmsSettingController@update')->name('sms_setting.update');
    });
});

