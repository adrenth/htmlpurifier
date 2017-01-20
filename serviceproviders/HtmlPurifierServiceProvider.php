<?php

namespace Adrenth\HtmlPurifier\ServiceProviders;

use HTMLPurifier;
use HTMLPurifier_Config;
use October\Rain\Support\ServiceProvider;

/**
 * Class HtmlPurifierServiceProvider
 *
 * @package Adrenth\HtmlPurifier\ServiceProviders
 */
class HtmlPurifierServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->app->singleton(HTMLPurifier::class, function () {
            /** @var HTMLPurifier_Config $config */
            $config = HTMLPurifier_Config::createDefault();
            return new HTMLPurifier($config);
        });
    }
}
