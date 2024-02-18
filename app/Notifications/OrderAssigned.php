<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Config;
use Modules\Orders\Entities\Order;

class OrderAssigned extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the Slack representation of the notification.
     *
     * @param mixed $notifiable
     * @return SlackMessage
     */
    public function toSlack($notifiable)
    {
        $store = $notifiable->store->name;

        $user = $notifiable->assignedUser();
        $msg = "Order #$notifiable->id from $store has been assigned to $user";

        if(Config::get('app.url') != 'https://bodyfuel.shop/'){
            
            return (new SlackMessage)
            ->success()
            ->content($msg);

        }
      
    }
}
