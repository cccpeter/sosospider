<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 应用目录
define('APP_PATH', __DIR__ . '/application/');

// define('EXTEND_PATH',  './expend/');
//自定义配置
// define('CONF_PATH', __DIR__ . '/config/');

// define('BIND_MODULE','admin');//绑定admin模块

//常量
//设备表名
// define('DEV_NUB', '2');

// //表前缀，用查询级联服务器的表是否存在
// define('DB_PREFIX', 'yun_');

// //超管名 
// define('SUSER', 'admin');
// //debug
// define('DEBUG', 'debug');
// //表格背景颜色
// define('BG_COLOR', '#D8DCE3');

// 加载框架引导文件
require './thinkphp/start.php';