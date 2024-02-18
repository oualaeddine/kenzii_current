<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/smsgateway', function (Request $request) {
    return $request->user();
});

/* Route::get('v1/sms/all', 'Api\SmsGatewayControllerApi@index')->name('api.sms.all'); */


Route::group(['prefix' => 'v1'], function () {

    Route::prefix('sms')->group(function () {
        Route::get('all', 'Api\SmsGatewayControllerApi@sms_all')->name('api.sms.all');
        Route::get('pending', 'Api\SmsGatewayControllerApi@sms_pending')->name('api.sms.pending');
        Route::get('sent', 'Api\SmsGatewayControllerApi@sms_sent')->name('api.sms.sent');
        Route::get('failed', 'Api\SmsGatewayControllerApi@sms_failed')->name('api.sms.failed');
        //

        Route::post('set/status', 'Api\SmsGatewayControllerApi@set_status')->name('api.sms.set_status');
        Route::post('set/add_sms', 'Api\SmsGatewayControllerApi@add_sms')->name('api.sms.add_sms');

       

    });
  
});


/* Route::get('v1/sms/all', 'Api\SmsGatewayControllerApi@index')->name('api.sms.all');
Route::get('v1/sms/pending', 'Api\SmsGatewayControllerApi@pending')->name('api.sms.pending'); */
