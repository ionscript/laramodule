<?php

declare(strict_types=1);

namespace Modules\Admin\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [

    ];

    public function boot()
    {
        parent::boot();

        Event::listen('call.before', static function ($name) {
            info("Api Event: $name");
        });
    }
}
