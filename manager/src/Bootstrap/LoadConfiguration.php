<?php

declare(strict_types=1);

namespace Manager\Bootstrap;

use App\Models\SystemSetting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Manager\Events\OnLoadSettings;

class LoadConfiguration extends \Illuminate\Foundation\Bootstrap\LoadConfiguration
{
    /**
     * @var Application
     */
    protected Application $app;

    /**
     * @param Application $app
     *
     * @return void
     */
    public function bootstrap(Application $app): void
    {
        $this->app = $app;

        $this->setCmsConfiguration();
    }

    /**
     * @return array
     */
    protected function setCmsConfiguration(): array
    {
        $settings = (array) Cache::rememberForever('cms.settings', function () {
            $settings = SystemSetting::query()
                ->pluck('setting_value', 'setting_name')
                ->toArray();

            OnLoadSettings::dispatch($settings);

            return $settings;
        });

        $settings['SITE_URL'] = url('/');

        $this->app->setLocale(
            Str::lower(
                Str::substr($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? Config::get('app.locale'), 0, 2)
            )
        );

        Config::set('global', $settings);

        return $settings;
    }
}
