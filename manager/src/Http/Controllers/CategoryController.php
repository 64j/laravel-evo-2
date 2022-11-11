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
                    ->whereHas('templates')
                    ->get()
                    ->map(function ($category) {
                        $category->data = $category->templates;
                        unset($category->templates);

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
