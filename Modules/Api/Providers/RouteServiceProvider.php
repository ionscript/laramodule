<?php

declare(strict_types=1);

namespace Modules\Api\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'Modules\Api\Controllers';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();

//        $this->mapTwilioRoutes();
//        $this->mapMailgunRoutes();
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->name('api.')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('Modules/Api/Routes/api.php'));
    }

//    protected function mapTwilioRoutes()
//    {
//        Route::prefix('twilio')
//            ->as('twilio.')
//            ->middleware('api')
//            ->namespace($this->namespace)
//            ->group(base_path('Modules/Api/Routes/twilio.php'));
//    }
//
//    protected function mapMailgunRoutes()
//    {
//        Route::prefix('mailgun')
//            ->as('mailgun.')
//            ->middleware('api')
//            ->namespace($this->namespace)
//            ->group(base_path('Modules/Api/Routes/mailgun.php'));
//    }
}
