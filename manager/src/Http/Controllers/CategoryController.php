<?php

declare(strict_types=1);

namespace Manager\Http\Controllers;

use App\Models\Category;
use App\Models\SiteTemplate;
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

        $categories = Collection::make()
            ->add(
                Collection::make([
                    'id' => 0,
                    'name' => __('global.no_category'),
                    'rank' => 0,
                ])
                    ->merge(
                        SiteTemplate::query()
                            ->select([
                                'id',
                                'templatename as name',
                                'templatealias as alias',
                                'description',
                                'locked',
                                'category',
                            ])
                            ->where('category', 0)
                            ->where(
                                fn($query) => $filter ? $query->where('templatename', 'like', '%' . $filter . '%')
                                    : null
                            )
                            ->paginate(Config::get('global.number_of_results'), '*', 'page_0')
                            ->appends('filter', $filter)
                    ),
            )
            ->merge(
                Category::query()
                    ->get(['id', 'category as name', 'rank'])
                    ->map(function (Category $category) use ($filter) {
                        $category->setRelation(
                            'templates',
                            $category->templates()
                                ->where(
                                    fn($query) => $filter ? $query->where('templatename', 'like', '%' . $filter . '%')
                                        : null
                                )
                                ->paginate(Config::get('global.number_of_results'), '*', 'page_' . $category->getKey())
                                ->appends('filter', $filter)
                        );

                        return array_merge(
                            ['@selected' => false],
                            $category->attributesToArray(),
                            $category->templates->toArray()
                        );
                    })
            );

        return $this->ok($categories);
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
