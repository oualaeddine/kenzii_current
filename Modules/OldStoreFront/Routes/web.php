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

use Illuminate\Http\Request;
use Modules\Stores\Entities\Store;

Route::name('store.')->group(function () {
    Route::middleware('hsd')->group(function () {


        Route::resource('products', "ProductsController");

        Route::resource('orders', "OrdersController");
        Route::post('orders/new', 'OrdersController@new')->name('orders.new');

        Route::middleware('hsd')->group(function () {

            Route::get('terms', function (Request  $request) {
                $store_id = $request->store;
                $store = Store::find($store_id);
                return $store->terms;
            })->name("terms");

            Route::get('policy', function (Request  $request) {
                $store_id = $request->store;
                $store = Store::find($store_id);
                return $store->privacy;
            })->name("policy");
        });
    });
});