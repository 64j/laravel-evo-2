<?php

declare(strict_types=1);

namespace Manager\Http\Controllers;

use App\Models\SiteTmplvar;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;
use Manager\Http\Requests\ModuleRequest;
use Manager\Http\Resources\ModuleResource;

class TvController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return ModuleResource::collection(SiteTmplvar::query()->orderBy('name')->get());
    }

    /**
     * @param ModuleRequest $request
     *
     * @return ModuleResource
     */
    public function store(ModuleRequest $request): ModuleResource
    {
        $tv = SiteTmplvar::query()->create($request->validated());

        return new ModuleResource($tv);
    }

    /**
     * @param SiteTmplvar $tv
     *
     * @return ModuleResource
     */
    public function show(SiteTmplvar $tv): ModuleResource
    {
        return new ModuleResource($tv);
    }

    /**
     * @param ModuleRequest $request
     * @param SiteTmplvar $tv
     *
     * @return ModuleResource
     */
    public function update(ModuleRequest $request, SiteTmplvar $tv): ModuleResource
    {
        $tv->update($request->validated());

        return new ModuleResource($tv);
    }

    /**
     * @param SiteTmplvar $tv
     *
     * @return Response
     */
    public function destroy(SiteTmplvar $tv): Response
    {
        $tv->delete();

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
            SiteTmplvar::query()
                ->orderBy('rank')
                ->get(['id', 'name', 'caption as description', 'rank'])
        );
    }
}
