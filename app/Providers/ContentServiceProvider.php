<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Orders\Entities\Order;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      /*  $data_to = [];

            Order::orderBy('created_at','desc')->whereHas('orderProducts.product')->with('orderProducts.product')->limit(10)->get();

        foreach($data_to as $d){
            $diff = $d->created_at->diffInMinutes(now());

             if($diff < 60){
                $d['time_diff'] = $d->created_at->diff(now())->format('%I Minutes');
             }elseif($diff < 1440){
                $d['time_diff'] = $d->created_at->diff(now())->format('%H Heures %I Minutes');
             }elseif($diff < 43200){
                $d['time_diff'] = $d->created_at->diff(now())->format('%a jours %H Heures %I Minutes');
             }elseif($diff < 518400){
                $d['time_diff'] = $d->created_at->diff(now())->format('%m mois %a jours %H Heures %I Minutes');
             }
        }

        view()->composer('dentairestore::layouts.master', function($view) use ($data_to) {
            $view->with(['purchased' => $data_to]);
        });*/
    }
}
