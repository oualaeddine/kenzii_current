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

Route::prefix('product')->group(function () {
    Route::middleware('hsd')->group(function () {

        Route::get('/{id}', 'DefaultStoreFrontController@index')->name('store.product.show');
        Route::get('/checkout/form', 'DefaultStoreFrontController@checkout_form')->name('product.checkout');
        Route::post('/checkout', 'DefaultStoreFrontController@checkout')->name('product.checkout.store');
        Route::get('/thanks/{name}/{id}', 'DefaultStoreFrontController@thanks')->name('product.thanks');
    });
});
