<?php

namespace Modules\Application\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'Modules\Application\Controllers';

    public const HOME = '/home';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->name('app.')
            ->namespace($this->namespace)
            ->group(base_path('Modules/Application/Routes/web.php'));
    }
}
