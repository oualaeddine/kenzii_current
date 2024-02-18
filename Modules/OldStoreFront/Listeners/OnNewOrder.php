<?php

namespace Modules\OldStoreFront\Listeners;

use App\Helpers\SmsHelper;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Modules\OldStoreFront\Events\NewOrderEvent;

class OnNewOrder
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(NewOrderEvent $event)
    {

    }

    /**
     * Handle the event.
     * @param NewOrderEvent $event
     * @return void
     */

    public function handle(NewOrderEvent $event)
    {
        $order = $event->order;

        SmsHelper::sendChangeStatusSms($order);
    }
}
