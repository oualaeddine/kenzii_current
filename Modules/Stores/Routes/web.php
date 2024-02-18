<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {

    Route::prefix('stores')->group(function () {
        Route::get('/', [\Modules\Stores\Http\Controllers\StoresController::class, 'index'])->name('stores.index');
        Route::get('store/{id}', [\Modules\Stores\Http\Controllers\StoresController::class, 'show'])->name('stores.show');
        Route::post('store', [\Modules\Stores\Http\Controllers\StoresController::class, 'store'])->name('stores.store');
        Route::put('update/{store}', [\Modules\Stores\Http\Controllers\StoresController::class, 'update'])->name('stores.update');
        Route::delete('delete/{store}', [\Modules\Stores\Http\Controllers\StoresController::class, 'destroy'])->name('stores.delete');
    });
    
    
    Route::prefix('stores/product')->group(function () {
        Route::get('/', [\Modules\Stores\Http\Controllers\StoreProductController::class, 'index'])->name('stores.product.index');
        Route::post('store/{id}', [\Modules\Stores\Http\Controllers\StoreProductController::class, 'store'])->name('stores.product.store');
        Route::get('edit/{id}', [\Modules\Stores\Http\Controllers\StoreProductController::class, 'edit'])->name('stores.product.edit');
        Route::put('update/{id}', [\Modules\Stores\Http\Controllers\StoreProductController::class, 'update'])->name('stores.product.update');
        Route::delete('delete/{id}', [\Modules\Stores\Http\Controllers\StoreProductController::class, 'destroy'])->name('stores.product.delete');
    });

    Route::prefix('stores/category')->group(function () {
        Route::get('/', [\Modules\Stores\Http\Controllers\StoreCategoryController::class, 'index'])->name('stores.category.index');
        Route::post('store/{id}', [\Modules\Stores\Http\Controllers\StoreCategoryController::class, 'store'])->name('stores.category.store');
        Route::delete('delete/{id}', [\Modules\Stores\Http\Controllers\StoreCategoryController::class, 'destroy'])->name('stores.category.delete');
    });

    Route::prefix('stores/settings')->group(function () {
        Route::get('/{id}', [\Modules\Stores\Http\Controllers\StoreSettingController::class, 'settings'])->name('store.settings');
        // text type management 
        Route::post('/store', [\Modules\Stores\Http\Controllers\StoreSettingController::class, 'store'])->name('store.settings.store');
        Route::get('/edit/{id}', [\Modules\Stores\Http\Controllers\StoreSettingController::class, 'edit'])->name('store.settings.edit');
        Route::put('/update/{id}', [\Modules\Stores\Http\Controllers\StoreSettingController::class, 'update'])->name('store.settings.update');
        Route::delete('/delete/{id}', [\Modules\Stores\Http\Controllers\StoreSettingController::class, 'destroy'])->name('store.settings.delete');

        // image type management 
        Route::post('/store/image', [\Modules\Stores\Http\Controllers\StoreSettingController::class, 'store_image'])->name('store.settings.store_image');
        Route::get('/edit_image/{id}', [\Modules\Stores\Http\Controllers\StoreSettingController::class, 'edit_image'])->name('store.settings.edit_image');
        Route::put('/update_image/{id}', [\Modules\Stores\Http\Controllers\StoreSettingController::class, 'update_image'])->name('store.settings.update_image');
        Route::delete('/delete_image/{id}', [\Modules\Stores\Http\Controllers\StoreSettingController::class, 'destroy_image'])->name('store.settings.delete_image');
    });
    
});



