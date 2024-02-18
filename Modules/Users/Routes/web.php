<?php

use \Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::prefix('users')->group(function () {
        Route::get('/', 'UsersController@index')->name('users.index');
        Route::get('profile/{user}', [\Modules\Users\Http\Controllers\UsersController::class, 'profile'])->name('users.profile');
        Route::post('store', [\Modules\Users\Http\Controllers\UsersController::class, 'store'])->name('users.store');
        Route::put('update/{user}', [\Modules\Users\Http\Controllers\UsersController::class, 'update'])->name('users.update');
        Route::delete('delete/{user}', [\Modules\Users\Http\Controllers\UsersController::class, 'destroy'])->name('users.delete');
        Route::put('update/permissions/{user}', [\Modules\Users\Http\Controllers\UsersController::class, 'updatePermissions'])->name('users.update_permissions');
    });
    
});



