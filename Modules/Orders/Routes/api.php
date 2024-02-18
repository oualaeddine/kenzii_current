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

Route::middleware('auth:api')->get('/orders', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['ApiKey']], function () {
    Route::get('get_topic', 'API\OrderAPIController@get_topic')->name('api.get_topic');
    Route::get('get_order_store_products/{id}', 'API\OrderAPIController@get_order_store_products')->name('api.order.get.products');
    Route::get('get_order_products/{id}', 'API\OrderAPIController@get_order_products')->name('api.get_order_products');
});


Route::group(['middleware' => ['auth.jwt','ApiKey']], function () {

Route::get('get_new_orders', 'API\OrderAPIController@get_new_orders')->name('api.get_new_orders');

Route::get('get_filters', 'API\OrderAPIController@get_filters')->name('api.get_filters');

Route::get('get_orders_by_status', 'API\OrderAPIController@get_orders_by_status')->name('api.get_orders_by_status');

Route::get('get_operators', 'API\OrderAPIController@get_operators')->name('api.get_operators');

Route::post('assign_order', 'API\OrderAPIController@assign_order')->name('api.assign_order');

Route::get('dashboard', 'API\OrderAPIController@dashborad')->name('api.dashborad');

});

Route::get('test_dashboard', 'API\OrderAPIController@dashborad')->name('api.dashborad.test');

Route::get('orders/count', 'API\OrderAPIController@count')->name('api.orders.count');



