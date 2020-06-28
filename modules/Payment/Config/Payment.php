<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Default Driver
    |--------------------------------------------------------------------------
    |
    | This value determines which of the following gateway to use.
    | You can switch to a different driver at runtime.
    |
    */
    'default' => 'COD',

    /*
    |--------------------------------------------------------------------------
    | Cache Stores
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the cache "stores" for your application as
    | well as their drivers. You may even define multiple stores for the
    | same cache driver to group types of items stored in your caches.
    |
    */

    'gateways' => [

        'cod' => [
            'driver' => 'cash_on_delivery',
        ],
        'paypal' => [
            'driver' => 'pay_pal_express',
        ],
        'stripe' => [
            'driver' => 'stripe',
        ],

    ],

];