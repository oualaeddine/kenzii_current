<?php

namespace App\Providers;

use App\Events\InitCheckoutEvent;
use App\Events\OrderStatus;
use App\Events\OrderStatusEvent;
use App\Events\PurchaseEvent;
use App\Events\ViewContentEvent;
use App\Listeners\ChangeStatus;
use App\Listeners\ChangeStatusListener;
use App\Listeners\FacebookEventsListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderStatus::class => [
            ChangeStatus::class,
        ],
        InitCheckoutEvent::class => [
            FacebookEventsListener::class,
        ],
        PurchaseEvent::class => [
            FacebookEventsListener::class,
        ],
        ViewContentEvent::class => [
            FacebookEventsListener::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
