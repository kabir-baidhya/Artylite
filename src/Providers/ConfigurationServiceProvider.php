<?php namespace Gckabir\Arty\Providers;

use RuntimeException;
use Illuminate\Support\Fluent;
use Gckabir\Arty\Config\Config;
use Gckabir\Arty\AbstractServiceProvider as ServiceProvider;

class ConfigurationServiceProvider extends ServiceProvider
{

    /**
     * Register the service
     *
     * @return void
     */
    public function register()
    {
        $instance = $this->loadConfiguration();

        // load configuration into the ioc container
        $this->app->instance('config', $instance);
    }

    protected function loadConfiguration()
    {
        $config = $this->app['arty']->getConfig();

        if (!($config instanceof Config)) {
            throw new RuntimeException("Arty hasn't been configured yet");
        }

        $values = array_dot_once($config->all());

        return new Fluent($values);
    }
}
