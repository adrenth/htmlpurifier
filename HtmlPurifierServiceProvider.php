<?php

namespace Adrenth\HtmlPurifier;

use HTMLPurifier;
use HTMLPurifier_Config;
use October\Rain\Config\Repository;
use October\Rain\Support\ServiceProvider;

/**
 * Class HtmlPurifierServiceProvider
 *
 * @package Adrenth\HtmlPurifier\ServiceProviders
 */
class HtmlPurifierServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes(
            [
                $this->getConfigPath() => $this->getConfigPublishPath(),
            ],
            'config'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->mergeConfigFrom($this->getConfigPath(), 'htmlpurifier');

        $this->app->singleton(HTMLPurifier::class, function ($app) {
            /** @var Repository $repository */
            $repository = $app['config'];

            /** @var HTMLPurifier_Config $config */
            $config = HTMLPurifier_Config::create($repository->get('htmlpurifier'));

            return new HTMLPurifier($config);
        });
    }

    /**
     * @return string
     */
    private function getConfigPublishPath()
    {
        if (function_exists('config_path')) {
            return config_path('htmlpurifier.php');
        }

        return base_path('config/htmlpurifier.php');
    }

    /**
     * @return string
     */
    private function getConfigPath()
    {
        return __DIR__ . '/config/htmlpurifier.php';
    }
}
