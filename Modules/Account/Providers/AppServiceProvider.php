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

        if (!$this->app->has('debugbar') && $this->app->isLocal() && config('app.debug')) {
//            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
//            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
//            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    public function boot()
    {
        $moduleBasePath = base_path('Modules/Account');

        $this->loadViewsFrom("$moduleBasePath/Views", 'account');

        $this->loadTranslationsFrom("$moduleBasePath/Language", 'account');


//        config([
//            'global' => Setting:all([
//                'name','value'
//            ])
//             ->keyBy('name') // key every setting by its name
//             ->transform(function ($setting) {
//            return $setting->value // return only the value
//            })
//           ->toArray() // make it an array
//        ]);

        if (config('app.debug')) {
            DB::listen(static function ($query) {

                $raw = sprintf(str_replace('?', '%s', $query->sql), ...$query->bindings);

                debug(
                 "[{$query->time}ms] '$raw'",
                );
            });
        }
    }
}
