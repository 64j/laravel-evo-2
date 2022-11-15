<?php

declare(strict_types=1);

namespace Manager\Http\Controllers;

use App\Models\Category;
use App\Models\SiteHtmlsnippet;
use App\Models\SiteModule;
use App\Models\SitePlugin;
use App\Models\SiteSnippet;
use App\Models\SiteTemplate;
use App\Models\SiteTmplvar;
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
                            ->simplePaginate(Config::get('global.number_of_results'), '*', 'page_0')
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
                                ->simplePaginate(
                                    Config::get('global.number_of_results'),
                                    '*',
                                    'page_' . $category->getKey()
                                )
                                ->appends('filter', $filter)
                        );

                        return array_merge(
                            ['@selected' => false],
                            $category->attributesToArray(),
                            $category->templates->toArray()
                        );
                    })
            )
            ->filter(fn($category) => $category['data'])
            ->values();

        return $this->ok($categories);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function tvs(Request $request): JsonResponse
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
                        SiteTmplvar::query()
                            ->select([
                                'id',
                                'name',
                                'caption as description',
                                'description as intro',
                                'locked',
                                'category',
                            ])
                            ->where('category', 0)
                            ->where(
                                fn($query) => $filter ? $query->where('name', 'like', '%' . $filter . '%')
                                    : null
                            )
                            ->simplePaginate(Config::get('global.number_of_results'), '*', 'page_0')
                            ->appends('filter', $filter)
                    ),
            )
            ->merge(
                Category::query()
                    ->get(['id', 'category as name', 'rank'])
                    ->map(function (Category $category) use ($filter) {
                        $category->setRelation(
                            'tvs',
                            $category->tvs()
                                ->where(
                                    fn($query) => $filter ? $query->where('name', 'like', '%' . $filter . '%')
                                        : null
                                )
                                ->simplePaginate(
                                    Config::get('global.number_of_results'),
                                    '*',
                                    'page_' . $category->getKey()
                                )
                                ->appends('filter', $filter)
                        );

                        return array_merge(
                            ['@selected' => false],
                            $category->attributesToArray(),
                            $category->tvs->toArray()
                        );
                    })
            )
            ->filter(fn($category) => $category['data'])
            ->values();

        return $this->ok($categories);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function chunks(Request $request): JsonResponse
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
                        SiteHtmlsnippet::query()
                            ->select([
                                'id',
                                'name',
                                'description',
                                'locked',
                                'disabled',
                                'category',
                            ])
                            ->where('category', 0)
                            ->where(
                                fn($query) => $filter ? $query->where('name', 'like', '%' . $filter . '%')
                                    : null
                            )
                            ->simplePaginate(Config::get('global.number_of_results'), '*', 'page_0')
                            ->appends('filter', $filter)
                    ),
            )
            ->merge(
                Category::query()
                    ->get(['id', 'category as name', 'rank'])
                    ->map(function (Category $category) use ($filter) {
                        $category->setRelation(
                            'chunks',
                            $category->chunks()
                                ->where(
                                    fn($query) => $filter ? $query->where('name', 'like', '%' . $filter . '%')
                                        : null
                                )
                                ->simplePaginate(
                                    Config::get('global.number_of_results'),
                                    '*',
                                    'page_' . $category->getKey()
                                )
                                ->appends('filter', $filter)
                        );

                        return array_merge(
                            ['@selected' => false],
                            $category->attributesToArray(),
                            $category->chunks->toArray()
                        );
                    })
            )
            ->filter(fn($category) => $category['data'])
            ->values();

        return $this->ok($categories);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function snippets(Request $request): JsonResponse
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
                        SiteSnippet::query()
                            ->select([
                                'id',
                                'name',
                                'description',
                                'locked',
                                'disabled',
                                'category',
                            ])
                            ->where('category', 0)
                            ->where(
                                fn($query) => $filter ? $query->where('name', 'like', '%' . $filter . '%')
                                    : null
                            )
                            ->simplePaginate(Config::get('global.number_of_results'), '*', 'page_0')
                            ->appends('filter', $filter)
                    ),
            )
            ->merge(
                Category::query()
                    ->get(['id', 'category as name', 'rank'])
                    ->map(function (Category $category) use ($filter) {
                        $category->setRelation(
                            'snippets',
                            $category->snippets()
                                ->where(
                                    fn($query) => $filter ? $query->where('name', 'like', '%' . $filter . '%')
                                        : null
                                )
                                ->simplePaginate(
                                    Config::get('global.number_of_results'),
                                    '*',
                                    'page_' . $category->getKey()
                                )
                                ->appends('filter', $filter)
                        );

                        return array_merge(
                            ['@selected' => false],
                            $category->attributesToArray(),
                            $category->snippets->toArray()
                        );
                    })
            )
            ->filter(fn($category) => $category['data'])
            ->values();

        return $this->ok($categories);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function plugins(Request $request): JsonResponse
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
                        SitePlugin::query()
                            ->select([
                                'id',
                                'name',
                                'description',
                                'locked',
                                'disabled',
                                'category',
                            ])
                            ->where('category', 0)
                            ->where(
                                fn($query) => $filter ? $query->where('name', 'like', '%' . $filter . '%')
                                    : null
                            )
                            ->simplePaginate(Config::get('global.number_of_results'), '*', 'page_0')
                            ->appends('filter', $filter)
                    ),
            )
            ->merge(
                Category::query()
                    ->get(['id', 'category as name', 'rank'])
                    ->map(function (Category $category) use ($filter) {
                        $category->setRelation(
                            'plugins',
                            $category->plugins()
                                ->where(
                                    fn($query) => $filter ? $query->where('name', 'like', '%' . $filter . '%')
                                        : null
                                )
                                ->simplePaginate(
                                    Config::get('global.number_of_results'),
                                    '*',
                                    'page_' . $category->getKey()
                                )
                                ->appends('filter', $filter)
                        );

                        return array_merge(
                            ['@selected' => false],
                            $category->attributesToArray(),
                            $category->plugins->toArray()
                        );
                    })
            )
            ->filter(fn($category) => $category['data'])
            ->values();

        return $this->ok($categories);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function modules(Request $request): JsonResponse
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
                        SiteModule::query()
                            ->select([
                                'id',
                                'name',
                                'description',
                                'locked',
                                'disabled',
                                'category',
                            ])
                            ->where('category', 0)
                            ->where(
                                fn($query) => $filter ? $query->where('name', 'like', '%' . $filter . '%')
                                    : null
                            )
                            ->simplePaginate(Config::get('global.number_of_results'), '*', 'page_0')
                            ->appends('filter', $filter)
                    ),
            )
            ->merge(
                Category::query()
                    ->get(['id', 'category as name', 'rank'])
                    ->map(function (Category $category) use ($filter) {
                        $category->setRelation(
                            'modules',
                            $category->modules()
                                ->where(
                                    fn($query) => $filter ? $query->where('name', 'like', '%' . $filter . '%')
                                        : null
                                )
                                ->simplePaginate(
                                    Config::get('global.number_of_results'),
                                    '*',
                                    'page_' . $category->getKey()
                                )
                                ->appends('filter', $filter)
                        );

                        return array_merge(
                            ['@selected' => false],
                            $category->attributesToArray(),
                            $category->modules->toArray()
                        );
                    })
            )
            ->filter(fn($category) => $category['data'])
            ->values();

        return $this->ok($categories);
    }
}
