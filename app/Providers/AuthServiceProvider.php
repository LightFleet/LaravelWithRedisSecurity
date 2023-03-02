<?php

namespace App\Providers;
// use Illuminate\Support\Facades\Gate;
use App\Modules\Security\Infrastructure\RedisUserGuard;
use App\Modules\Security\Infrastructure\RedisUserProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
//
        Auth::provider('redis', static function ($app, array $config) {
            return new RedisUserProvider();
        });

        Auth::extend('redis', function (Application $app, string $name, array $config) {
            return new RedisUserGuard();
        });
    }
}
