<?php

declare(strict_types=1);

namespace App\Bootstrap;

use Illuminate\Contracts\Foundation\Application;

class LoadPaths
{
    /**
     * @param Application $app
     *
     * @return void
     */
    public function bootstrap(Application $app): void
    {
        $root = dirname($app->basePath());

        $app->useEnvironmentPath($root);
        $app->useStoragePath($root . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'storage');
    }
}
