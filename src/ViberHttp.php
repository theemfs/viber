<?php

namespace NZX\NotificationChannels\Viber;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class ViberHttp
{
    public function __construct($token, $name, $avatar_url, $proxy = null)
    {
        $this->token = $token;
        $this->name = $name;
        $this->avatar_url = $avatar_url;
        $this->proxy = $proxy;
    }

    public function send($to, $text)
    {
        $client = new Client();

        return $client->request('POST', 'https://chatapi.viber.com/pa/send_message', [
            'headers'  => [
                'X-Viber-Auth-Token' => '47bca6c092a7d347-64c1a84234dfb8e4-5d22517578332c91',
                'Content-Type' => 'application/json'
            ],
            'proxy' => $this->proxy,
            RequestOptions::JSON => [
                'receiver' => $to,
                'text' => $text,
                'sender' => [
                    'name' => $this->name,
                    'avatar' => $this->avatar_url,
                ],
               'type' => 'text',
            ]
        ]);
    }
}
