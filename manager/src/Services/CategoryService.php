<?php

declare(strict_types=1);

namespace Manager\Services;

use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryService
{
    /**
     * @return array
     */
    public function list(): array
    {
        $collect = Collection::make();

        $collect->add([
            'id' => 0,
            'category' => __('global.no_category'),
            'rank' => 0,
        ]);

        $collect = $collect->merge(Category::query()->get());

        return $collect->keyBy('id')->toArray();
    }
}
