<?php

declare(strict_types=1);

namespace Manager\Http\Controllers;

use App\Models\SitePlugin;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Manager\Http\Requests\SnippetRequest;
use Manager\Http\Resources\PluginResource;

class PluginController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return PluginResource::collection(SitePlugin::query()->orderBy('name')->get());
    }

    /**
     * @param SnippetRequest $request
     *
     * @return PluginResource
     */
    public function store(SnippetRequest $request): PluginResource
    {
        $plugin = SitePlugin::query()->create($request->validated());

        return new PluginResource($plugin);
    }

    /**
     * @param SitePlugin $plugin
     *
     * @return PluginResource
     */
    public function show(SitePlugin $plugin): PluginResource
    {
        return new PluginResource($plugin);
    }

    /**
     * @param SnippetRequest $request
     * @param SitePlugin $plugin
     *
     * @return PluginResource
     */
    public function update(SnippetRequest $request, SitePlugin $plugin): PluginResource
    {
        $plugin->update($request->validated());

        return new PluginResource($plugin);
    }

    /**
     * @param SitePlugin $plugin
     *
     * @return Response
     */
    public function destroy(SitePlugin $plugin): Response
    {
        $plugin->delete();

        return response()->noContent();
    }
}
