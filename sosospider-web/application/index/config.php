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
        'type'   => 'File',
        // 缓存保存目录
        'path'   => APP_PATH.'runtime/cache/',
        // 缓存前缀
        'prefix' => 'resource_',
        // 缓存有效期 0表示永久缓存
        'expire' => 0,
    ],
    'sqlmode'               =>[
        // 数据库模式，0为sqlite，1位mysql
        'type'   => '0',
    ],
    'videotype'             =>[
        'videotab'=>'1',
        'livetab'=>'2',
        'opentab'=>'3',
    ],
    'video_type'             =>[
        '1'=>'videotab',
        '2'=>'livetab',
        '3'=>'opentab',
    ],
    'person_menu'           =>[
        '收藏夹'=>'index/person/mycollect:&#xe600;',
        '历史观看'=>'index/person/userinfo:&#xe60e;',
        '我的笔记'=>'index/person/note:&#xe642;',
        '我的评价'=>'index/person/myassess:&#xe66e;',
        '我的讨论'=>'index/person/myrequest:&#xe609;',
    ],
    'teacher_menu'           =>[
        '公共视频'=>'index/teacher/publicvideo:&#xe681;',
        '我的视频'=>'index/teacher/myvideo:&#xe6ed;',
    ],
    'senior_menu'                =>[
        '审核'=>'index/senior/audit:&#xe674;',
    ],
    'pagesize'=>10
    
];