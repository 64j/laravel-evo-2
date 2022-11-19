<?php

declare(strict_types=1);

namespace Manager\Http\Controllers;

use App\Models\Category;
use App\Models\SiteTemplate;
use App\Models\SiteTmplvarTemplate;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Manager\Http\Requests\TemplateRequest;
use Manager\Http\Resources\TemplateResource;

class TemplateController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return TemplateResource::collection(SiteTemplate::query()->orderBy('templatename')->get());
    }

    /**
     * @param TemplateRequest $request
     *
     * @return TemplateResource
     */
    public function store(TemplateRequest $request): TemplateResource
    {
        /** @var SiteTemplate $template */
        $template = SiteTemplate::query()->create($request->validated());

        return (new TemplateResource($template))->additional([
            'meta' => $this->getMeta($template),
        ]);
    }

    /**
     * @param SiteTemplate $template
     *
     * @return TemplateResource
     */
    public function show(SiteTemplate $template): TemplateResource
    {
        return (new TemplateResource($template))->additional([
            'meta' => $this->getMeta($template),
        ]);
    }

    /**
     * @param TemplateRequest $request
     * @param SiteTemplate $template
     *
     * @return TemplateResource
     */
    public function update(TemplateRequest $request, SiteTemplate $template): TemplateResource
    {
        $template->update($request->validated());

        SiteTmplvarTemplate::query()
            ->where('templateid', $template->getKey())
            ->delete();

        $sortableTvs = $request->input('sortableTvs');
        $tvsTemplates = $request->input('tvs', []);
        foreach ($tvsTemplates as $k => &$tvsTemplate) {
            $tvsTemplate = [
                'tmplvarid' => $tvsTemplate,
                'templateid' => $template->getKey(),
            ];

            $tvsTemplate['rank'] = $sortableTvs ? $k + 1 : 0;
        }

        SiteTmplvarTemplate::query()->upsert($tvsTemplates, 'tmplvarid');

        return (new TemplateResource($template))->additional([
            'meta' => $this->getMeta($template),
        ]);
    }

    /**
     * @param SiteTemplate $template
     *
     * @return Response
     */
    public function destroy(SiteTemplate $template): Response
    {
        $template->delete();

        return response()->noContent();
    }

    /**
     * @param SiteTemplate $template
     *
     * @return array
     */
    protected function getMeta(SiteTemplate $template): array
    {
        $tvsSortable = [];

        $tvs = SiteTmplvarTemplate::query()
            ->with('tmplvar', fn($query) => $query->select('id', 'name', 'caption as description', 'description as intro'))
            ->where('templateid', $template->getKey())
            ->orderBy('rank')
            ->get()
            ->map(function (SiteTmplvarTemplate $tv) use (&$tvsSortable) {
                $rank = $tv->rank;
                $tv = $tv->tmplvar->toArray();
                $tv['@selected'] = true;
                $tv['rank'] = $rank;

                $tvsSortable[] = $rank;

                return $tv;
            });

        $filter = $this->app->request->get('filter');

        $categories = Category::query()
            ->get(['id', 'category as name'])
            ->map(function (Category $category) use ($tvs, $filter) {
                $category->setRelation(
                    'tvs',
                    $category->tvs()
                        ->whereKeyNot($tvs->pluck('id'))
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
            ->values();

        return [
            'tvs' => $tvs,
            'categories' => !$filter && $categories->isEmpty() ? null : $categories,
            'tvsSortable' => (bool) array_sum($tvsSortable),
        ];
    }
}
