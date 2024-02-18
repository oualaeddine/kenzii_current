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

Route::prefix('dentaire_store')->group(function() {
    Route::get('/', 'DentaireStoreController@index')->name('dentaire_store.index');
    Route::get('/catgories', 'ShopController@index')->name('dentaire_store.categories');
    Route::get('/products/{slug}', 'DentaireStoreController@products')->name('dentaire_store.products');

    Route::get('/cart', 'CartController@index')->name('dentaire_store.cart');
    Route::post('/cart/store', 'CartController@create')->name('dentaire_store.cart.store');
    Route::delete('/cart/destroy', 'CartController@destroy')->name('dentaire_store.cart.destroy');

    Route::get('/checkout', 'CheckoutController@index')->name('dentaire_store.checkout');
    
    Route::post('/checkout/store', 'CheckoutController@store')->name('dentaire_store.checkout.store');

    Route::get('/order/{order_id}', 'CheckoutController@order')->name('dentaire_store.order');
});
