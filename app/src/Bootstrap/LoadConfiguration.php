<?php

declare(strict_types=1);

namespace App\Bootstrap;

use App\Models\SystemSetting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Manager\Events\OnLoadSettings;

class LoadConfiguration extends \Illuminate\Foundation\Bootstrap\LoadConfiguration
{
    /**
     * @param Application $app
     *
     * @return void
     */
    public function bootstrap(Application $app): void
    {
        $this->getCmsConfiguration();
    }

    /**
     * @return array
     */
    protected function getCmsConfiguration(): array
    {
        $settings = (array) Cache::rememberForever('cms.settings', function () {
            $settings = SystemSetting::query()
                ->pluck('setting_value', 'setting_name')
                ->toArray();

            OnLoadSettings::dispatch($settings);

            return $settings;
        });

        Config::set('global', $settings);

        return $settings;
    }
}
