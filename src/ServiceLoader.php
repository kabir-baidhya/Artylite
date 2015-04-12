<?php namespace Gckabir\Arty;

use Gckabir\Arty\Traits\ContainerAwareTrait;
use Illuminate\Contracts\Container\Container as ContainerContract;

class ServiceLoader
{

    use ContainerAwareTrait;

    /**
     * Constructor
     * @param Illuminate\Contracts\Container\Container $container
     */
    public function __construct(ContainerContract $container)
    {
        $this->setContainer($container);
    }

    protected function providers()
    {
        return [
            'ConfigurationServiceProvider',
            'FacadeServiceProvider',
            'FilesystemServiceProvider',
            'ComposerServiceProvider',
            'DatabaseServiceProvider',
            'ConsoleServiceProvider',
            'MigrationServiceProvider',
        ];
    }

    public function boot()
    {
        foreach ($this->providers() as $provider) {
            $serviceProvider = __NAMESPACE__.'\\Providers\\'.$provider;
            (new $serviceProvider($this->app))->register();
        }
    }
}
