<?php

namespace App\Events;

use App\Providers\ChangeStatusListener;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderStatusEvent
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ChangeStatusListener  $event
     * @return void
     */
    public function handle(ChangeStatusListener $event)
    {
        //
    }
}
