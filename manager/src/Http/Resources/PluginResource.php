<?php

declare(strict_types=1);

namespace Manager\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class PluginResource extends JsonResource
{
    /**
     * @param $request
     *
     * @return array|JsonSerializable|Arrayable
     */
    public function toArray($request): array | JsonSerializable | Arrayable
    {
        return parent::toArray($request);
    }
}
