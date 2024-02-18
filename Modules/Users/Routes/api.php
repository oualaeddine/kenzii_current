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

Route::middleware('auth:api')->get('/users', function (Request $request) {
    return $request->user();
});


Route::get('operators/get', 'API\UsersApiController@index_operators')->name('api.operators');

Route::get('users/get', 'API\UsersApiController@index_all')->name('api.users');

