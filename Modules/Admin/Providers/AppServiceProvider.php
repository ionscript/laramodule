<?php

declare(strict_types=1);

namespace Modules\Admin\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package Modules\Admin\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    public $bindings = [];

    public function register()
    {
        $moduleBasePath = base_path('Modules/Admin');

        if(!$this->app->configurationIsCached()) {
            foreach (glob("$moduleBasePath/Configs/*.php") as $config) {
                $this->mergeConfigFrom(
                    $config, pathinfo($config, PATHINFO_FILENAME)
                );
            }
        }
    }

    public function boot()
    {
        $moduleBasePath = base_path('Modules/Admin');

        $this->loadViewsFrom("$moduleBasePath/Views", 'admin');

        $this->loadTranslationsFrom("$moduleBasePath/Language", 'admin');
    }
}
