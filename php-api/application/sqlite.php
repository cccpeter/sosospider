<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 使用sqlite数据库
return [
    'type'           => 'sqlite',
    //'hostname'       => ROOT_PATH.'db/pre.db',
    'database'       => 'vdo',
    'username'       => '',
    'password'       => '',
    'hostport'       => '',
    'dsn'            => 'sqlite:'.ROOT_PATH.'db/vdo.db',
    'params'         => [],
    'charset'        => 'utf8',
    'prefix'         => 'sys_',
    'debug'          => true,
    'deploy'         => 0,
    'rw_separate'    => false,
    'master_num'     => 1,
    'slave_no'       => '',
    'fields_strict'  => true,
    'resultset_type' => 'array',
    'auto_timestamp' => false,
    'sql_explain'    => false,
];