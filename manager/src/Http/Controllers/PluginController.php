<?php

declare(strict_types=1);

namespace Manager\Http\Controllers;

use App\Models\SitePlugin;
use App\Models\SystemEventname;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;
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

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function sort(Request $request): JsonResponse
    {
        return $this->ok(
            SystemEventname::query()
                ->with('plugins')
                ->whereHas('plugins')
                ->get()
                ->map(function ($event) {
                    $event['data'] = $event->plugins;
                    unset($event->plugins);

                    return $event;
                })
        );
    }
}
