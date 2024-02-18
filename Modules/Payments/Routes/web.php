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

    Route::prefix('payments')->group(function () {
/*         Route::get('/', 'PaymentsController@index'); */
        Route::get('/', 'PaymentsController@index')->name('payments.index');
        Route::get('/edit/{id}', 'PaymentsController@edit')->name('payments.edit');
        Route::post('/store', 'PaymentsController@store')->name('payments.store');
        Route::post('/update/{id}', 'PaymentsController@update')->name('payments.update');
        Route::delete('/delete/{id}', 'PaymentsController@destroy')->name('payments.delete');
    });
    
    
});
