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

    Route::prefix('charges')->group(function () {

        Route::get('/', 'ChargesController@index')->name('charges');
      
        Route::post('/store', 'ChargesController@store')->name('charges.store');
        Route::get('/edit/{id}', 'ChargesController@edit')->name('charges.edit');
        Route::put('/update/{id}', 'ChargesController@update')->name('charges.update');
    
        Route::delete('/delete/{id}', 'ChargesController@destroy')->name('charges.delete');
        
    
    });
    
});
