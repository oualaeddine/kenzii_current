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

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::prefix('categories')->group(function() {
        Route::get('/', 'CategoriesController@index');
        Route::get('/create', 'CategoriesController@create')->name('categories.create');
        Route::post('/store', 'CategoriesController@store')->name('categories.store');
        Route::get('/show/{id}', 'CategoriesController@show')->name('categories.show');
        Route::get('/edit/{id}', 'CategoriesController@edit')->name('categories.edit');
        Route::put('/update/{id}', 'CategoriesController@update')->name('categories.update');
        Route::delete('/delete/{id}', 'CategoriesController@destroy')->name('categories.delete');
    });
    
});

