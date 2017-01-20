<?php

namespace Adrenth\HtmlPurifier;

use Adrenth\HtmlPurifier\ServiceProviders\HtmlPurifierServiceProvider;
use App;
use HTMLPurifier;
use System\Classes\PluginBase;

/**
 * Class Plugin
 *
 * @package Adrenth\HtmlPurifier
 */
class Plugin extends PluginBase
{
    /**
     * {@inheritdoc}
     */
    public function pluginDetails()
    {
        return [
            'name' => 'adrenth.htmlpurifier::lang.plugin.name',
            'description' => 'adrenth.htmlpurifier::lang.plugin.description',
            'author' => 'Alwin Drenth',
            'icon' => 'icon-leaf',
            'homepage' => 'https://github.com/adrenth/redirect',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        App::register(HtmlPurifierServiceProvider::class);
    }

    /**
     * {@inheritdoc}
     */
    public function registerMarkupTags()
    {
        return [
            'filters' => [
                'purify' => function ($html) {
                    /** @var HTMLPurifier $purifier */
                    $purifier = App::make(HTMLPurifier::class);
                    return $purifier->purify($html);
                },
            ],
        ];
    }
}
