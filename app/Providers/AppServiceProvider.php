<?php

namespace App\Providers;

use App\Modules\TestModule\Application\Service\SmsService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(SmsService::class)->needs('$timezone')->giveConfig('app.timezone');
        $this->app->when(SmsService::class)->needs('$filters')
            ->give(static function ($app) {
                return [4,1,9];
            });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Log::shareContext(['test' => 'test']);
    }
}
