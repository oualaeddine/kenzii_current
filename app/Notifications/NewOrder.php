<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Modules\Orders\Entities\Order;

class NewOrder extends Notification
{
    use Queueable;


    /**
     * Create a new notification instance.
     *
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
        $product = "";
        try {
            $product = $notifiable->orderProducts->first()->product->name;
        } catch (\Exception $exception) {

        }

        $msg = "$store has a new order (#$notifiable->id) for \"$product\" by $notifiable->name [$notifiable->phone]";

        return (new SlackMessage)
            ->success()
            ->content($msg);
    }
}
