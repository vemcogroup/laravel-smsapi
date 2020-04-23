<?php

namespace Vemcogroup\SmsApi;

use Illuminate\Support\ServiceProvider;

class SmsApiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/smsapi.php' => config_path('smsapi.php'),
        ], 'config');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/smsapi.php', 'smsapi'
        );

        $this->app->singleton(SmsApi::class, function () {
            return new SmsApi();
        });
    }
}
