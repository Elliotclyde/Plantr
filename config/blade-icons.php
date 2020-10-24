<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Icons Sets
    |--------------------------------------------------------------------------
    |
    | With this config option you can define a couple of
    | default icon sets. Provide a key name for your icon
    | set and a combination from the options below.
    |
     */

    'sets' => [

        /*
        |--------------------------------------------------------------------------
        | Default Prefix
        |--------------------------------------------------------------------------
        |
        | This config option allows you to define a default prefix for
        | your icons. The dash separator will be applied automatically
        | to every icon name. It's required and needs to be unique.
        |
         */
        'default' => [
            'prefix' => 'svg',
            'path' => 'resources/svg'],

        //     /*
        //     |--------------------------------------------------------------------------
        //     | Default Set Class
        //     |--------------------------------------------------------------------------
        //     |
        //     | This config option allows you to define some classes which
        //     | will be applied to all icons by default within this set.
        //     |
        //     */
        //
        //     'class' => '',
        //
        // ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Default Class
    |--------------------------------------------------------------------------
    |
    | This config option allows you to define some classes which
    | will be applied to all icons by default.
    |
     */

    'class' => 'icon',

];
