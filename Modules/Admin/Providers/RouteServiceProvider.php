<?php

declare(strict_types=1);

namespace Modules\Admin\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

/**
 * Class RouteServiceProvider
 * @package Modules\Admin\Providers
 */
class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'Modules\Admin\Controllers';

    public const HOME = '/admin';

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
        Route::prefix('admin')
            ->as('admin.')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('Modules/Admin/Routes/web.php'));
    }
}
