<?php

declare(strict_types=1);

namespace Modules\Account\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [];

    public function register()
    {
        $moduleBasePath = base_path('Modules/Account');

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
        $moduleBasePath = base_path('Modules/Account');

        $this->loadViewsFrom("$moduleBasePath/Views", 'account');

        $this->loadTranslationsFrom("$moduleBasePath/Language", 'account');


//        if (config('app.debug')) {
//            DB::listen(static function ($query) {
//
//                $raw = sprintf(str_replace('?', '%s', $query->sql), ...$query->bindings);
//
//                debug(
//                 "[{$query->time}ms] '$raw'",
//                );
//            });
//        }
    }
}
