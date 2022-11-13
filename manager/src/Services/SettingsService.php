<?php

declare(strict_types=1);

namespace Manager\Services;

use App\Models\SystemSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Manager\Events\OnLoadSettings;

class SettingsService
{
    /**
     * @return array
     */
    public function get(): array
    {
        $settings = Cache::rememberForever('cms.settings', function () {
            $settings = SystemSetting::query()
                ->pluck('setting_value', 'setting_name')
                ->toArray();

            OnLoadSettings::dispatch($settings);

            return $settings;
        });

        $settings['SITE_URL'] = url('/');

        Config::set('global', $settings);

        return $settings;
    }
}
