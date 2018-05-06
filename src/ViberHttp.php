<?php

namespace NZX\NotificationChannels\Viber;

use GuzzleHttp\Client;

class ViberHttp
{
    public function __construct($token, $name, $avatar_url)
    {
        $this->token = $token;
        $this->name = $name;
        $this->avatar_url = $avatar_url;
    }

    public function send($to, $text)
    {
        $client = new Client();

        return $client->request('POST', 'https://chatapi.viber.com/pa/send_message', [
            'headers'  => [
                'X-Viber-Auth-Token' => $this->token,
            ],
            GuzzleHttp\RequestOptions::JSON => [
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
