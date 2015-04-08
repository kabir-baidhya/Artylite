<?php namespace Gckabir\Arty\Providers;

use Illuminate\Filesystem\Filesystem;
use Gckabir\Arty\AbstractServiceProvider as ServiceProvider;

class FilesystemServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('files', function ($app) {

            return new Filesystem();

        });
    }
}
