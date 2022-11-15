<?php

namespace Manager\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Response;
use JsonSerializable;
use Manager\Services\CategoryService;
use Manager\Services\UserService;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var Application
     */
    protected Application $app;

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
     * @param CategoryService $categoryService
     */
    public function __construct(Application $app, UserService $userService, CategoryService $categoryService)
    {
        $this->app = $app;
        $this->userService = $userService;
        $this->categoryService = $categoryService;
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
