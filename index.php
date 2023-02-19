<?php

use Kirby\Cms\App as Kirby;
use JanHerman\MinifyHtml\HtmlMinifier;

@include_once __DIR__ . '/vendor/autoload.php';

Kirby::plugin('jan-herman/minify-html', [
    'options' => [
        'enabled'        => true,
        'compressCss'    => true,
        'compressJs'     => true,
        'removeComments' => true,
        'infoComment'    => false
	],
    'hooks' => [
        'page.render:after' => function ($html) {
            if (option('jan-herman.minify-html.enabled') === false) {
                return $html;
            }

            return new HtmlMinifier($html);
        }
    ]
]);
