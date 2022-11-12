<?php

declare(strict_types=1);

namespace App\Traits\Models;

trait TimeMutatorTrait
{
    /**
     * @param $value
     *
     * @return string
     */
    protected function convertDateTime($value): string
    {
        return $this->asDateTime($value)->format('Y-m-d H:i:s');
    }
}
