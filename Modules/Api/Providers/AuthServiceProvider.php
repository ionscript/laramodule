<?php

declare(strict_types=1);

namespace Modules\Api\Providers;

//use App\Services\Auth\JwtGuard;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

//        Auth::extend('jwt', function ($app, $name, array $config) {
//            // Return an instance of Illuminate\Contracts\Auth\Guard...
//
//            return new JwtGuard(Auth::createUserProvider($config['provider']));
//        });
    }
}
