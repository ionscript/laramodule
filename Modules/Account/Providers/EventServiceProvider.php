<?php

declare(strict_types=1);

namespace Modules\Account\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        \Illuminate\Auth\Events\Registered::class => [
            \Illuminate\Auth\Listeners\SendEmailVerificationNotification::class,
        ],
        \Illuminate\Auth\Events\Verified::class => [
            \Modules\Account\Listeners\SendEmailCongratulationNotification::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
