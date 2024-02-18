<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/categories', function (Request $request) {
    return $request->user();
});


Route::get('categories/get', 'API\APICategoryController@index')->name('api.categories');

Route::get('categories/get/{id}', 'API\APICategoryController@show')->name('api.category');

Route::get('categories/store/get/{id}', 'API\APICategoryController@categories')->name('api.store.categories');

Route::get('categories/get/store/{id}', 'API\APICategoryController@store_categories')->name('api.categories.store');

