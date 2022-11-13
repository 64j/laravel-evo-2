<?php

declare(strict_types=1);

namespace App;

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

        $this->bindPathsInContainer();


        return $this;
    }
}
