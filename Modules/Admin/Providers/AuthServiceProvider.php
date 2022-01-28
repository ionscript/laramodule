<?php

declare(strict_types=1);

namespace Modules\Admin\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


/**
 * Class AuthServiceProvider
 * @package Modules\Admin\Providers
 */
class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
