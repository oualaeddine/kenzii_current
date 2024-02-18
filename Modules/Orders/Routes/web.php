<?php /** @noinspection PhpUndefinedClassInspection */

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

/* Route::prefix('orders')->group(function () { */
    
Route::prefix('admin')->group(function () {


    Route::group(['prefix' => 'visitors','middleware' => ['auth'] ],function () {

         Route::get('/', 'VisitorsController@index')->name('visitors');
         Route::get('/stats/all', 'VisitorsController@stats_all')->name('visitors.stats_all');
         Route::get('/stats/not_ordered', 'VisitorsController@stats_not_ordered')->name('visitors.stats_not_ordered');
         Route::get('/stats/shipped', 'VisitorsController@stats_shipped')->name('visitors.stats_shipped');
         Route::get('/stats/not_confirmed', 'VisitorsController@stats_not_confirmed')->name('visitors.stats_not_confirmed');
    });


  Route::group(['prefix' => 'orders','middleware' => ['auth','LogSave']], function () {

    Route::group(['middleware' => 'Is_Ad_sup_ope'], function () {
        Route::get('/new', 'OrderController@list')->name('orders.new');
        Route::get('/na1', 'OrderController@list')->name('orders.na1');
        Route::get('/na2', 'OrderController@list')->name('orders.na2');
        Route::get('/AttConfNa1', 'OrderController@list')->name('orders.AttConfNa1');
        Route::get('/AttConfNa2', 'OrderController@list')->name('orders.AttConfNa2');
        Route::get('/Conf1Na1', 'OrderController@list')->name('orders.Conf1Na1');
        Route::get('/Conf1Na2', 'OrderController@list')->name('orders.Conf1Na2');
        Route::get('/AttShippNa1', 'OrderController@list')->name('orders.AttShippNa1');
        Route::get('/AttShippNa2', 'OrderController@list')->name('orders.AttShippNa2');
        Route::get('/pending_c', 'OrderController@list')->name('orders.pending_c');
        Route::get('/confirmed1', 'OrderController@list')->name('orders.confirmed1');
        Route::get('/pending_s', 'OrderController@list')->name('orders.pending_s');
       
        Route::get('/r_wilaya', 'OrderController@list')->name('orders.r_wilaya');
        Route::get('/sortie', 'OrderController@list')->name('orders.sortie');
        Route::get('/alerte', 'OrderController@list')->name('orders.alerte');
        Route::get('/t_echoue', 'OrderController@list')->name('orders.t_echoue');
        Route::get('/att_c', 'OrderController@list')->name('orders.att_c');
        
        Route::get('/v_wilaya', 'OrderController@list')->name('orders.v_wilaya');
        Route::get('/transfert', 'OrderController@list')->name('orders.transfert');
        Route::get('/centre', 'OrderController@list')->name('orders.centre');
        Route::get('/delivered', 'OrderController@list')->name('orders.delivered');
        Route::get('/echec', 'OrderController@list')->name('orders.echec');
        Route::get('/canceled', 'OrderController@list')->name('orders.canceled');
    });
      //  Route::group(['middleware' => ['role:packaging']], function () {
            Route::get('/confirmed2', 'OrderController@list')->name('orders.confirmed2');
            Route::get('/rs', 'OrderController@list')->name('orders.rs');
            Route::get('/en_p', 'OrderController@list')->name('orders.en_p');
            Route::get('/expedie', 'OrderController@list')->name('orders.expidie');
   //     });

  Route::group(['middleware' => 'Is_Ad_sup_ope'], function () {

    Route::get('/', 'OrderController@index')->name('orders');
    Route::get('/create', 'OrderController@create')->name('order.create');
    Route::post('/store', 'OrderController@store')->name('order.store');
    Route::get('/edit/{id}', 'OrderController@edit')->name('order.edit');
    Route::post('/update/{id}', 'OrderController@update')->name('order.update');

    Route::get('/show/{id}', 'OrderController@show')->name('order.show');

    Route::delete('/delete/{id}', 'OrderController@destroy')->name('order.delete');
    Route::post('/change/status/{id}', 'OrderController@change_status')->name('order.change_status');
    Route::post('/update_confirm/{id}', 'OrderController@update_confirm')->name('order.update_confirm');

    Route::post('/open_details_edit/{id}', 'OrderController@open_details_edit')->name('order.open_details_edit');

    Route::post('/assign', 'OrderController@assign')->name('order.assign');

    //change status all 
    Route::put('/update_status/{id}', 'OrderStatusController@update')->name('order.status_all.update');
    // order _product 

    Route::post('/store/product/{id}', 'OrderProductController@store')->name('order.store.product');
    Route::get('/edit/product/{id}', 'OrderProductController@edit')->name('order.edit.product');
    Route::put('/update/product/{id}', 'OrderProductController@update')->name('order.update.product');
    Route::delete('/destroy/product/{id}', 'OrderProductController@destroy')->name('order.destroy.product');
    //bulk 

        Route::prefix('bulk')->group(function () {

          Route::post('/assign', 'BulkController@assign')->name('bulk.order.assign');
          Route::put('/en_p', 'BulkController@en_p')->name('bulk.order.en_p');
          Route::put('/cancel', 'BulkController@cancel')->name('bulk.order.cancel');
          Route::delete('/archive', 'BulkController@archive')->name('bulk.order.archive');
            
        });

  });
   // Route::get('/assign/all/{id}', 'OrderController@assignAllTo')->name('order.assign.all');


});

    
});
