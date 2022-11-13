<?php

declare(strict_types=1);

namespace Manager;

use RuntimeException;

class Application extends \Illuminate\Foundation\Application
{

    /**
     * Set the base path for the application.
     *
     * @param  string  $basePath
     * @return $this
     */
    public function setBasePath($basePath): static
    {
        $this->basePath = rtrim($basePath, '\/');

        $this->useEnvironmentPath(dirname($this->basePath()));
        $this->useAppPath(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'app');
        $this->useStoragePath($this->path('storage'));

        $this->bindPathsInContainer();


        return $this;
    }

    /**
     * Get the application namespace.
     *
     * @return string
     *
     * @throws RuntimeException
     */
    public function getNamespace(): string
    {
        if (!is_null($this->namespace)) {
            return $this->namespace;
        }

        $composer = json_decode(file_get_contents($this->basePath('../composer.json')), true);

        foreach ((array) data_get($composer, 'autoload.psr-4') as $namespace => $path) {
            foreach ((array) $path as $pathChoice) {
                if (realpath($this->path()) === realpath($this->basePath($pathChoice))) {
                    return $this->namespace = $namespace;
                }
            }
        }

        throw new RuntimeException('Unable to detect application namespace.');
    }
}
