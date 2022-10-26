<?php

declare(strict_types=1);

namespace Manager\Services;

class PluginService
{
    /**
     * @param $event
     * @param array $params
     *
     * @return void
     */
    public function eval($event, array $params)
    {
        if (is_null($event)) {
            return;
        }

        extract($params);

        foreach ($event['plugins'] as $plugin) {
            $properties = array_map(
                fn($property) => current($property)['value'] ?? null,
                json_decode($plugin['properties'], true)
            );
            extract($properties);
            eval($plugin['plugincode']);
        }
    }
}
