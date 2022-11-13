<?php

declare(strict_types=1);

namespace Manager\Services;

use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryService
{
    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return Collection::make([
            [
                'id' => 0,
                'category' => __('global.no_category'),
                'rank' => 0,
            ],
        ])
            ->merge(
                Category::query()
                    ->orderBy('rank')
                    ->get()
            );
    }
}
