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

Route::middleware(['auth'])->group(function () {

    
    Route::prefix('admin')->group(function () {

        Route::prefix('contact')->group(function() {
            Route::get('/', 'ContactController@index')->name('contact.index');
            Route::get('/edit/{id}', 'ContactController@edit')->name('contact.edit');
            Route::post('/store', 'ContactController@store')->name('contact.store');
            Route::post('/update/{id}', 'ContactController@update')->name('contact.update');
    
        });
        
    });
    
});



