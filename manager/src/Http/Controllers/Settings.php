<?php

declare(strict_types=1);

namespace Manager\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Manager\Services\CategoryService;
use Manager\Services\SettingsService;
use Manager\Services\UserService;

class Settings extends Controller
{
    /**
     * @var SettingsService
     */
    protected SettingsService $settingsService;

    /**
     * @var UserService
     */
    protected UserService $userService;

    /**
     * @var CategoryService
     */
    protected CategoryService $categoryService;

    /**
     * @param Application $app
     * @param UserService $userService
     * @param SettingsService $settingsService
     * @param CategoryService $categoryService
     */
    public function __construct(
        Application $app,
        UserService $userService,
        SettingsService $settingsService,
        CategoryService $categoryService)
    {
        $this->userService = $userService;
        $this->settingsService = $settingsService;
        $this->categoryService = $categoryService;

        parent::__construct($app);
    }

    /**
     * @return JsonResponse
     */
    public function read(): JsonResponse
    {
        return $this->ok([
            'permissions' => $this->userService->getAuthPermissions(),
            'user' => $this->userService->getAuthUser(),
            'config' => $this->settingsService->get(),
            'categories' => $this->categoryService->list(),
            'lexicon' => __('global'),
        ]);
    }
}
