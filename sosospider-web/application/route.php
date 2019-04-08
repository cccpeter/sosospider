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
use think\Route;
	/*
	*无参数规则
	 */
	Route::rule([
    // 'index'  =>  'Index/index/index',
    'tab'  =>  'Index/index/tab',
    'course_list'  =>  'Index/index/course_list',
    'error404'  =>  'Index/index/error404',
    'course_detail'  =>  'Index/index/course_detail',
    'video'  =>  'Index/index/video',
    'live'  =>  'Index/live/live',
    'openclass'  =>  'Index/openclass/openclass',
    'test'  =>  'Index/index/test',
    
	]);

	
	/*
	*	有参数规则
	 */
	// Route::get([
	//     'mem_edit/:id'  =>  'admin/member/member_edit',
	//     'server_list/:type'  =>  'admin/sysconfig/rtmp_agent_server_list',
	//     'server_add/:type'  =>  'admin/sysconfig/rtmp_server_add',
	//     'server_edit/:type/:sid'  =>  'admin/sysconfig/rtmp_server_edit',
 //    	'article_edit/:aid'  =>  'admin/article/article_edit',


	// ]);

	// Route::rule('member_list','member/member_list');
	// Route::rule('edit_sysconfig','sysconfig/edit_sysconfig');
	// Route::rule('rtmp_agent_server_list/:type','sysconfig/rtmp_agent_server_list','GET');
	// Route::get(['rtmp_agent_server_list/:type'=>'sysconfig/rtmp_agent_server_list']);	

	// Route::rule('rtmp_agent_server_list/:type','sysconfig/rtmp_agent_server_list','GET',[]);
