<?php

return [
    'session'                => [
        'id'             => '',
        // SESSION_ID的提交变量,解决flash上传跨域
        'var_session_id' => '',
        // SESSION 前缀
        'prefix'         => 'index_',
        // 驱动方式 支持redis memcache memcached
        'type'           => '',
        // 是否自动开启 SESSION
        'auto_start'     => true,
    ],

    'cache'                  => [
        // 驱动方式
        'type'   => 'Redis',
        // 缓存保存目录
        'prefix' => 'soso_',
        // 缓存有效期 0表示永久缓存
        'expire' => 7200,
        'redis'  =>[
            'type'  =>  'redis',
            'host'  =>  '127.0.0.1',
        ],
    ],
    
];