<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Pusher Driver Name
    |--------------------------------------------------------------------------
    |
    | 配置默认的push驱动
    |
    */
    'default' => env('SMS_DRIVER', 'emay'),

    /*
    |
    | 驱动选项，配置
    |
    */
    'stores' => [
        'emay' => [
            'driver' => 'emay',
            'app_key' => env('PUSHER_APP_KEY', ''),
            'secret' => env('PUSHER_APP_SECRET', ''),
        ],


    ],

];
