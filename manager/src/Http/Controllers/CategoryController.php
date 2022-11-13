<?php

declare(strict_types=1);

namespace Manager\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;

class CategoryController extends Controller
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function templates(Request $request): JsonResponse
    {
        $filter = $request->get('filter');

        return $this->ok(
            Category::query()
                ->get(['id', 'category as name'])
                ->map(function (Category $category) use ($filter) {
                    $category->setRelation(
                        'tvs',
                        $category->tvs()
                            ->where(fn($query) => $filter ? $query->where('name', 'like', '%' . $filter . '%') : null)
                            ->paginate(Config::get('global.number_of_results'), '*', 'page_' . $category->getKey())
                            ->appends('filter', $filter)
                    );

                    return array_merge(
                        ['@selected' => false],
                        $category->attributesToArray(),
                        $category->tvs->toArray()
                    );
                })
                ->filter(fn($category) => $category['data'])
                ->values()
        );
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function tvs(Request $request): array
    {
        return [
            'data' => Collection::make([Category::tvsNoCategory()])->merge(
                Category::query()
                    ->with('tvs', fn($query) => $query->paginate())
                    ->whereHas('tvs')
                    ->get()
                    ->map(function ($category) {
                        $category->data = $category->tvs;
                        unset($category->tvs);

                        return $category;
                    })
            ),
        ];
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function chunks(Request $request): array
    {
        return [
            'data' => Collection::make([Category::chunksNoCategory()])->merge(
                Category::query()
                    ->with('chunks', fn($query) => $query->paginate())
                    ->whereHas('chunks')
                    ->get()
                    ->map(function ($category) {
                        $category->data = $category->chunks;
                        unset($category->chunks);

                        return $category;
                    })
            ),
        ];
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function snippets(Request $request): array
    {
        return [
            'data' => Collection::make([Category::snippetsNoCategory()])->merge(
                Category::query()
                    ->with('snippets', fn($query) => $query->paginate())
                    ->whereHas('snippets')
                    ->get()
                    ->map(function ($category) {
                        $category->data = $category->snippets;
                        unset($category->snippets);

                        return $category;
                    })
            ),
        ];
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function plugins(Request $request): array
    {
        return [
            'data' => Collection::make([Category::pluginsNoCategory()])->merge(
                Category::query()
                    ->with('plugins', fn($query) => $query->paginate())
                    ->whereHas('plugins')
                    ->get()
                    ->map(function ($category) {
                        $category->data = $category->plugins;
                        unset($category->plugins);

                        return $category;
                    })
            ),
        ];
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function modules(Request $request): array
    {
        return [
            'data' => Collection::make([Category::modulesNoCategory()])->merge(
                Category::query()
                    ->with('modules', fn($query) => $query->paginate())
                    ->whereHas('modules')
                    ->get()
                    ->map(function ($category) {
                        $category->data = $category->modules;
                        unset($category->modules);

                        return $category;
                    })
            ),
        ];
    }
}
