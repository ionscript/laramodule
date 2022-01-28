<?php

declare(strict_types=1);

namespace Modules\Agent\Providers;

use Illuminate\Auth\AuthManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [];

    public function register()
    {
        $moduleBasePath = base_path('Modules/Agent');

        if(!$this->app->configurationIsCached()) {
            foreach (glob("$moduleBasePath/Configs/*.php") as $config) {
                $this->mergeConfigFrom(
                    $config, pathinfo($config, PATHINFO_FILENAME)
                );
            }
        }

        if (!$this->app->has('debugbar') && $this->app->isLocal() && config('app.debug')) {
//            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
//            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
//            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    public function boot()
    {
        $moduleBasePath = base_path('Modules/Agent');

        $this->loadViewsFrom("$moduleBasePath/Views", 'agent');

        $this->loadTranslationsFrom("$moduleBasePath/Language", 'agent');
    }
}
