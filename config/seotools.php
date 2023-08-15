<?php

use PharIo\Manifest\Url;
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Buy Rust Maps Store", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'Buy Cheap under 5$ Rust Maps. Rust FPS+, Buildable, Combined Outpost and Bandit Camp Map, Flat Terrain Maps, Koth Island Maps, Custom Monuments Map', // set false to total remove
            'separator'    => ' — ',
            'keywords'     => ['Rust Maps', 'Buy Rust Maps'],
            'canonical'    => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Buy Rust Maps Store', // set false to total remove
            'description' => 'Buy Cheap under 5$ Rust Maps. Rust FPS+, Buildable, Combined Outpost and Bandit Camp Map, Flat Terrain Maps, Koth Island Maps, Custom Monuments Map', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'summary',
            'site'        => '@buyrustmapsstore',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Buy Rust Maps Store', // set false to total remove
            'description' => 'Buy Cheap under 5$ Rust Maps. Rust FPS+, Buildable, Combined Outpost and Bandit Camp Map, Flat Terrain Maps, Koth Island Maps, Custom Monuments Map', // set false to total remove
            'url'         => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
