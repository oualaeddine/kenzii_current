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

/* Route::resource('products', Modules\Products\Http\Controllers\ProductController::class); */

Route::prefix('admin')->group(function () {

    Route::group(['prefix' => 'products','middleware' => ['auth','LogSave']], function () {
        Route::get('/', 'ProductController@index')->name('products.index');
        Route::get('/create', 'ProductController@create')->name('products.create');
        Route::post('/store', 'ProductController@store')->name('products.store');
        Route::get('/show/{id}', 'ProductController@show')->name('products.show');
        Route::get('/edit/{id}', 'ProductController@edit')->name('products.edit');
        Route::put('/update/{id}', 'ProductController@update')->name('products.update');
        Route::delete('/delete/{id}', 'ProductController@destroy')->name('products.delete');
    
    
    });
    
    
    Route::group(['prefix' => 'bon_achats','middleware' => ['auth','LogSave']], function () {
        Route::get('/', 'BonAchatController@index')->name('bon_achats.index');
        Route::get('/create', 'BonAchatController@create')->name('bon_achats.create');
        Route::post('/store', 'BonAchatController@store')->name('bon_achats.store');
        Route::get('/show/{id}', 'BonAchatController@show')->name('bon_achats.show');
        Route::get('/edit/{id}', 'BonAchatController@edit')->name('bon_achats.edit');
        Route::put('/update/{id}', 'BonAchatController@update')->name('bon_achats.update');
        Route::delete('/delete/{id}', 'BonAchatController@destroy')->name('bon_achats.delete');
    
    
    });
    

    Route::group(['prefix' => 'brands','middleware' => ['auth']], function () {
        Route::get('/', 'BrandsController@index')->name('brands.index');
        Route::get('/all', 'BrandsController@index_all')->name('brands.get');
        Route::get('/create', 'BrandsController@create')->name('brands.create');
        Route::post('/store', 'BrandsController@store')->name('brands.store');
        Route::get('/show/{id}', 'BrandsController@show')->name('brands.show');
        Route::get('/edit/{id}', 'BrandsController@edit')->name('brands.edit');
        Route::put('/update/{id}', 'BrandsController@update')->name('brands.update');
        Route::delete('/delete/{id}', 'BrandsController@destroy')->name('brands.delete');
    
    
    });


    
    Route::group(['prefix' => 'productImages','middleware' => ['auth','LogSave']], function () {
        Route::get('/index', 'ProductPhotoController@index')->name('productImages.index');
        Route::get('/create/{id}', 'ProductPhotoController@create')->name('productImages.create');
        Route::post('/store', 'ProductPhotoController@store')->name('productImages.store');
        Route::get('/show/{id}', 'ProductPhotoController@show')->name('productImages.show');
        Route::get('/edit/{id}', 'ProductPhotoController@edit')->name('productImages.edit');
        Route::put('/update/{id}', 'ProductPhotoController@update')->name('productImages.update');
        Route::delete('/delete/{id}', 'ProductPhotoController@destroy')->name('productImages.delete');
        Route::post('/select/{id}', 'ProductPhotoController@select')->name('productImages.select');

    });
    
    
});


//Route::resource('bonAchats', Modules\Products\Http\Controllers\BonAchatController::class);