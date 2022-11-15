<?php

declare(strict_types=1);

namespace Manager\Http\Controllers;

use App\Models\SiteHtmlSnippet;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Manager\Http\Requests\ModuleRequest;
use Manager\Http\Resources\ChunkResource;

class ChunkController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return ChunkResource::collection(SiteHtmlSnippet::query()->orderBy('name')->get());
    }

    /**
     * @param ModuleRequest $request
     *
     * @return ChunkResource
     */
    public function store(ModuleRequest $request): ChunkResource
    {
        $chunk = SiteHtmlSnippet::query()->create($request->validated());

        return new ChunkResource($chunk);
    }

    /**
     * @param SiteHtmlSnippet $chunk
     *
     * @return ChunkResource
     */
    public function show(SiteHtmlSnippet $chunk): ChunkResource
    {
        return new ChunkResource($chunk);
    }

    /**
     * @param ModuleRequest $request
     * @param SiteHtmlSnippet $chunk
     *
     * @return ChunkResource
     */
    public function update(ModuleRequest $request, SiteHtmlSnippet $chunk): ChunkResource
    {
        $chunk->update($request->validated());

        return new ChunkResource($chunk);
    }

    /**
     * @param SiteHtmlSnippet $chunk
     *
     * @return Response
     */
    public function destroy(SiteHtmlSnippet $chunk): Response
    {
        $chunk->delete();

        return response()->noContent();
    }
}
