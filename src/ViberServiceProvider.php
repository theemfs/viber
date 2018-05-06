<?php

namespace NZX\NotificationChannels\Viber;

use Illuminate\Support\ServiceProvider;

class ViberServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->when(ViberChannel::class)
            ->needs(ViberHttp::class)
            ->give(function () {
                $config = config('services.viber');

                return new ViberHttp(
                    $config['token'],
                    $config['name'],
                    $config['avatar_url']
                );
            });
    }
}
