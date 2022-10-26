<?php

declare(strict_types=1);

namespace Manager\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View as ContractView;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use JsonSerializable;

class Controller extends RoutingController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    /**
     * @var Application
     */
    protected Application $app;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;

        if (Auth::check()) {
            // Взять локаль из настроек юзера
            $this->app->setLocale('ru');
        } else {
            // Определить локаль
        }
    }

    /**
     * @param Request $request
     *
     * @return ContractView|array
     */
    public function handle(Request $request)
    {
        $controllerNamespace = 'Manager\\Http\\Controllers\\';

        if ($request->isMethod('post')) {
            $controller = $request->has('method') ? $controllerNamespace . $request->input('method') : null;
            $params = $request->input('params');

            return $this->app->call($controller, ['params' => $params]);
        }

        if (Auth::check()) {
            return $this->app->call($controllerNamespace . 'Home@index');
        } else {
            redirect()
                ->guest(route('login'))
                ->send();
        }
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
