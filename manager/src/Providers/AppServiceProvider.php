<?php

namespace Manager\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Manager\Services\SettingsService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->useEnvironmentPath(dirname($this->app->basePath()));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        (new SettingsService())->get();

        if (Auth::check()) {
            // Взять локаль из настроек юзера
        } else {
            $locale = Str::lower(Str::substr($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? Config::get('app.locale'), 0, 2));

            if (file_exists($this->app->basePath('lang/' . $locale))) {
                $this->app->setLocale($locale);
            }
        }
    }
}
