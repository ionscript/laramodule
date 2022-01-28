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

        $this->app->register(\Frontoffice\Twilio\Api\AccountsServiceProvider::class);
        $this->app->register(\Frontoffice\Twilio\Api\ApplicationsServiceProvider::class);
        $this->app->register(\Frontoffice\Twilio\Api\PhoneNumbersServiceProvider::class);
        $this->app->register(\Frontoffice\Twilio\Api\SipServiceProvider::class);
        $this->app->register(\Frontoffice\Twilio\Api\VoiceServiceProvider::class);
        $this->app->register(\Frontoffice\Twilio\Api\FaxServiceProvider::class);
        $this->app->register(\Frontoffice\Twilio\Api\SmsServiceProvider::class);
        $this->app->register(\Frontoffice\Twilio\Api\VideoServiceProvider::class);

        if (!$this->app->has('debugbar') && $this->app->isLocal() && config('app.debug')) {
//            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
//            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
//            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    public function boot()
    {
        $moduleBasePath = base_path('Modules/Admin');

        $this->loadViewsFrom("$moduleBasePath/Views", 'admin');

        $this->loadTranslationsFrom("$moduleBasePath/Language", 'admin');
    }
}
