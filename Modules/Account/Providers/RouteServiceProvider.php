<?php

declare(strict_types=1);

namespace Modules\Account\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'Modules\Account\Controllers';

    public const HOME = '/';

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
        Route::prefix('account')
            ->name('account.')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('Modules/Account/Routes/web.php'));
    }
}
