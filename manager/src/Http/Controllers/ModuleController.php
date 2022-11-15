<?php

declare(strict_types=1);

namespace Manager\Http\Controllers;

use App\Models\SiteModule;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Manager\Http\Requests\ModuleRequest;
use Manager\Http\Resources\ModuleResource;

class ModuleController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return ModuleResource::collection(SiteModule::query()->orderBy('name')->get());
    }

    /**
     * @param ModuleRequest $request
     *
     * @return ModuleResource
     */
    public function store(ModuleRequest $request): ModuleResource
    {
        $module = SiteModule::query()->create($request->validated());

        return new ModuleResource($module);
    }

    /**
     * @param SiteModule $module
     *
     * @return ModuleResource
     */
    public function show(SiteModule $module): ModuleResource
    {
        return new ModuleResource($module);
    }

    /**
     * @param ModuleRequest $request
     * @param SiteModule $module
     *
     * @return ModuleResource
     */
    public function update(ModuleRequest $request, SiteModule $module): ModuleResource
    {
        $module->update($request->validated());

        return new ModuleResource($module);
    }

    /**
     * @param SiteModule $module
     *
     * @return Response
     */
    public function destroy(SiteModule $module): Response
    {
        $module->delete();

        return response()->noContent();
    }
}
