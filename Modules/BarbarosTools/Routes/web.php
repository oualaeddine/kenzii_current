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

Route::middleware('hsd')->group(function () {

    Route::prefix('bt')->group(function() {

        Route::get('/', 'BarbarosToolsController@index')->name('barbarostools');
        Route::get('/load_more/{page}', 'BarbarosToolsController@load_more')->name('barbarostools.load_more');
        Route::get('/product/{name}', 'BarbarosToolsController@product')->name('barbarostools.product');
        Route::get('/checkout/{store_p}', 'BarbarosToolsController@checkout_form')->name('barbarostools.checkout');
        Route::post('/checkout/store', 'BarbarosToolsController@checkout')->name('barbarostools.checkout.store');
        Route::get('/thanks/{name}/{store}/{price}', 'BarbarosToolsController@thanks')->name('barbarostools.thanks');
    
    
        Route::get('/contact', 'BarbarosToolsController@contact')->name('barbarostools.contact');
        Route::post('/contact/post', 'BarbarosToolsController@contact_post')->name('barbarostools.contact.post');
    
        Route::get('/terms-and-conditions', 'BarbarosToolsController@terms')->name('barbarostools.terms');
        Route::get('/privacy-policy', 'BarbarosToolsController@privacy')->name('barbarostools.privacy');
        Route::get('/faq', 'BarbarosToolsController@faq')->name('barbarostools.faq');
        //track 

        Route::get('/track', 'TrackController@index')->name('barbarostools.track');
        Route::get('/track/order', 'TrackController@show')->name('barbarostools.track.show');
        //shop 

        Route::get('/shop', 'ShopController@index')->name('barbarostools.shop');
    
    });

    Route::get('/details/{ref}', 'BarbarosToolsController@product_details')->name('barbarostools.product.details');


  

});


