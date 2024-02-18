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
    Route::get('/', 'CaisseController@index');
}); */

Route::prefix('admin')->group(function () {

    Route::group(['prefix' => 'caisse','middleware' => ['auth','LogSave']], function () {
        Route::get('/', 'CaisseController@index')->name('caisse.index');
        Route::get('/create', 'CaisseController@create')->name('caisse.create');
        Route::post('/store', 'CaisseController@store')->name('caisse.store');
        Route::get('/show/{id}', 'CaisseController@show')->name('caisse.show');
        Route::get('/edit/{id}', 'CaisseController@edit')->name('caisse.edit');
        Route::put('/update/{id}', 'CaisseController@update')->name('caisse.update');
        Route::delete('/delete/{id}', 'CaisseController@destroy')->name('caisse.delete');
    });
    
    
});
