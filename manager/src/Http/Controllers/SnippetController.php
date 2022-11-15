<?php

declare(strict_types=1);

namespace Manager\Http\Controllers;

use App\Models\SiteSnippet;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Manager\Http\Requests\SnippetRequest;
use Manager\Http\Resources\SnippetResource;

class SnippetController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return SnippetResource::collection(SiteSnippet::query()->orderBy('name')->get());
    }

    /**
     * @param SnippetRequest $request
     *
     * @return SnippetResource
     */
    public function store(SnippetRequest $request): SnippetResource
    {
        $snippet = SiteSnippet::query()->create($request->validated());

        return new SnippetResource($snippet);
    }

    /**
     * @param SiteSnippet $snippet
     *
     * @return SnippetResource
     */
    public function show(SiteSnippet $snippet): SnippetResource
    {
        return new SnippetResource($snippet);
    }

    /**
     * @param SnippetRequest $request
     * @param SiteSnippet $snippet
     *
     * @return SnippetResource
     */
    public function update(SnippetRequest $request, SiteSnippet $snippet): SnippetResource
    {
        $snippet->update($request->validated());

        return new SnippetResource($snippet);
    }

    /**
     * @param SiteSnippet $snippet
     *
     * @return Response
     */
    public function destroy(SiteSnippet $snippet): Response
    {
        $snippet->delete();

        return response()->noContent();
    }
}
