<?php
use Illuminate\Support\Facades\Route;
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


/* Route::prefix('caisse')->group(function() {
    Route::get('/', 'CaisseEuroController@index');
}); */

Route::prefix('admin')->group(function () {

    Route::group(['prefix' => 'caisseeuro','middleware' => ['auth','LogSave']], function () {
        Route::get('/', 'CaisseEuroController@index')->name('caisseeuro.index');
        Route::get('/create', 'CaisseEuroController@create')->name('caisseeuro.create');
        Route::post('/store', 'CaisseEuroController@store')->name('caisseeuro.store');
        Route::get('/show/{id}', 'CaisseEuroController@show')->name('caisseeuro.show');
        Route::get('/edit/{id}', 'CaisseEuroController@edit')->name('caisseeuro.edit');
        Route::put('/update/{id}', 'CaisseEuroController@update')->name('caisseeuro.update');
        Route::delete('/delete/{id}', 'CaisseEuroController@destroy')->name('caisseeuro.delete');
    });
    
});

