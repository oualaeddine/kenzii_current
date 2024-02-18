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

    Route::prefix('roles')->group(function () {
        Route::get('/index', [\Modules\RolesAndPermissions\Http\Controllers\RolesController::class,'index'])->name('roles.index');
        Route::post('store', [\Modules\RolesAndPermissions\Http\Controllers\RolesController::class, 'store'])->name('roles.store');
        Route::put('update/{role}', [\Modules\RolesAndPermissions\Http\Controllers\RolesController::class, 'update'])->name('role.update');
        Route::delete('delete/{role}', [\Modules\RolesAndPermissions\Http\Controllers\RolesController::class, 'destroy'])->name('roles.delete');
    });
    Route::prefix('permissions')->group(function () {
        Route::get('/index', [\Modules\RolesAndPermissions\Http\Controllers\PermissionsController::class,'index'])->name('permissions.index');
        Route::post('store', [\Modules\RolesAndPermissions\Http\Controllers\PermissionsController::class, 'store'])->name('permissions.store');
        Route::put('update/{permission}', [\Modules\RolesAndPermissions\Http\Controllers\PermissionsController::class, 'update'])->name('permissions.update');
        Route::delete('delete/{permission}', [\Modules\RolesAndPermissions\Http\Controllers\PermissionsController::class, 'destroy'])->name('permissions.delete');
    });
    
});
