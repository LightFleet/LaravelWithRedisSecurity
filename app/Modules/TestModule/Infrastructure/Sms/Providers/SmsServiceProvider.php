<?php

namespace App\Modules\TestModule\Infrastructure\Sms\Providers;

use App\Modules\TestModule\Application\Service\SmsService;
use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->when(SmsService::class)->needs('$filters')
            ->give(static function ($app) {
                return [9,1,9];
            });
    }

    public function boot()
    {
        //
    }
}
