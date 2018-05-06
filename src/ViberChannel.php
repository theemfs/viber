<?php

namespace NZX\NotificationChannels\Viber;

use Illuminate\Notifications\Notification;

class ViberChannel
{
    protected $ViberHttp;

    public function __construct(ViberHttp $ViberHttp)
    {
        $this->ViberHttp = $ViberHttp;
    }

    public function send($notifiable, Notification $notification)
    {
        if (! $to = $notifiable->routeNotificationFor('viber')) {
            return;
        }

        $viber_message = $notification->toViber($notifiable);

        return $this
            ->ViberHttp
            ->send(
                $viber_message->getTo(),
                $viber_message->getText()
            );
    }
}
