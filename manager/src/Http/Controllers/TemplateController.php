<?php

declare(strict_types=1);

namespace Manager\Http\Controllers;

use App\Models\Category;
use App\Models\SiteTemplate;
use App\Models\SiteTmplvarTemplate;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Manager\Http\Requests\TemplateRequest;
use Manager\Http\Resources\TemplateResource;

class TemplateController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return TemplateResource::collection(SiteTemplate::all());
    }

    /**
     * @param TemplateRequest $request
     *
     * @return TemplateResource
     */
    public function store(TemplateRequest $request): TemplateResource
    {
        $template = SiteTemplate::query()->create($request->validated());

        return new TemplateResource($template);
    }

    /**
     * @param SiteTemplate $template
     *
     * @return TemplateResource
     */
    public function show(SiteTemplate $template): TemplateResource
    {
        $tvs = SiteTmplvarTemplate::query()
            ->with('tmplvar', fn ($query) => $query->select('id', 'name', 'caption'))
            ->where('templateid', $template->getKey())
            ->get()
            ->pluck('tmplvar');

        $unselected = Category::query()
            ->select('id', 'category as name')
            ->with('tvs', fn($query) => $query->whereNotIn('id', $tvs->pluck('id'))->paginate())
            ->whereHas('tvs')
            ->get()
            ->map(function ($category) {
                $category->data = $category->tvs;
                unset($category->tvs);

                return $category;
            });

        return (new TemplateResource($template))->additional([
            'meta' => [
                'selected' => $tvs,
                'unselected' => $unselected
            ],
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

        return new TemplateResource($template);
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
}
