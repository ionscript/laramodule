<?php

declare(strict_types=1);

namespace Modules\Api\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [];

    public function register()
    {
        $moduleBasePath = base_path('Modules/Api');

        if(!$this->app->configurationIsCached()) {
            foreach (glob("$moduleBasePath/Configs/*.php") as $config) {
                $this->mergeConfigFrom(
                    $config, pathinfo($config, PATHINFO_FILENAME)
                );
            }
        }

        if ($this->app->isLocal() && config('app.debug')) {
//            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
        }
    }

    public function boot()
    {
    }
}
