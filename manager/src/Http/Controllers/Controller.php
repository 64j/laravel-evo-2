<?php

namespace Manager\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use JsonSerializable;
use Manager\Services\CategoryService;
use Manager\Services\SettingsService;
use Manager\Services\UserService;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var Application
     */
    protected Application $app;

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
     * @param SettingsService $settingsService
     */
    public function __construct(
        Application $app,
        UserService $userService,
        SettingsService $settingsService,
        CategoryService $categoryService)
    {
        $this->app = $app;
        $this->userService = $userService;
        $this->settingsService = $settingsService;
        $this->categoryService = $categoryService;

        if (Auth::check()) {
            // Взять локаль из настроек юзера
        } else {
            $locale = Str::lower(Str::substr($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? Config::get('app.locale'), 0, 2));

            if (file_exists($app->basePath('lang/' . $locale))) {
                $app->setLocale($locale);
            }
        }

        $settingsService->get();
    }

    /**
     * @param $data
     * @param array $meta
     * @param int $status
     * @param array $headers
     *
     * @return JsonResponse
     */
    protected function ok($data = [], array $meta = [], int $status = 200, array $headers = []): JsonResponse
    {
        if ($data instanceof JsonSerializable) {
            $data = $data->jsonSerialize();
        }

        if ($this->app->environment('local') && isset($_SERVER['REQUEST_TIME'])) {
            $meta['request_time'] = sprintf('%.3f s', microtime(true) - $_SERVER['REQUEST_TIME']);
        }

        return Response::json([
            'meta' => $meta,
            'data' => $data,
        ], $status, $headers);
    }
}
