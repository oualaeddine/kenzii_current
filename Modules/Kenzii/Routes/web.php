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
use Illuminate\Support\Facades\Route;
use Modules\Stores\Entities\Store;


$host = request()->getHttpHost();
$host = str_replace("www.", "", $host);
if ($host == 'kenzii.me' || $host == "www.kenzii.me" || $host == 'order-kenzii.shop' || $host == "www.order-kenzii.shop") {
    Route::middleware('hsd')->group(function () {

        Route::get('/check', 'KenziiController@checking')->name('kenzii.checking');
        Route::get('/Check', 'KenziiController@checking')->name('kenzii.checking.C');
        Route::get('/CHECK', 'KenziiController@checking')->name('kenzii.checking.CH');

        Route::get('/product', 'KenziiController@product')->name('kenzii.product');
        Route::get('/checkout', 'KenziiController@checkout')->name('kenzii.checkout');
        Route::post('/checkout/store', 'KenziiController@checkout_confirm')->name('kenzii.checkout.store');
        Route::get('/faq', 'KenziiController@faq')->name('kenzii.faq');

        Route::get('/most', 'KenziiController@most')->name('kenzii.most');
        Route::get('/rating', 'KenziiController@rating')->name('kenzii.rating');

    });
}


