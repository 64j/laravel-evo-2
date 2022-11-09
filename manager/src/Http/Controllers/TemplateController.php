<?php

declare(strict_types=1);

namespace Manager\Http\Controllers;

use App\Models\SiteTemplate;
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
        return (new TemplateResource($template))->additional([
            'meta' => [
                'tvs' => []
            ]
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
