<?php

declare(strict_types=1);

namespace Manager\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CategoryController extends Controller
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function templates(Request $request): array
    {
        return [
            'data' => Collection::make([Category::templatesNoCategory()])->merge(
                Category::query()
                    ->with('templates', fn($query) => $query->paginate())
                    ->get()
                    ->map(function ($category) {
                        $category->data = $category->templates;
                        unset($category->templates);

                        return $category;
                    })
            ),
        ];
    }
}
