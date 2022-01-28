<?php

declare(strict_types=1);

namespace Modules\Agent\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'Modules\Agent\Controllers';

    public const HOME = '/agent';

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
        Route::prefix('agent')
            ->name('agent.')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('Modules/Agent/Routes/web.php'));
    }
}
