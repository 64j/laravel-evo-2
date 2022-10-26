<?php

declare(strict_types=1);

namespace Manager\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Manager\Services\PluginService;

abstract class Event
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct()
    {
        $eventName = trim(str_replace(__NAMESPACE__, '', __CLASS__), '\\');
        app(PluginService::class)->eval(Cache::get('evo.events')[$eventName] ?? null, [...func_get_args()]);
    }
}
