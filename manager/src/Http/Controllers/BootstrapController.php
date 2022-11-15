<?php

declare(strict_types=1);

namespace Manager\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;

class BootstrapController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->ok([
            'config' => Config::get('global'),
            'user' => $this->userService->getAuthUser(),
            'permissions' => $this->userService->getAuthPermissions(),
            'categories' => $this->categoryService->list(),
            'lexicon' => __('global'),
        ]);
    }
}
