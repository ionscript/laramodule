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
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->name('api.')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('Modules/Api/Routes/api.php'));
    }
}
