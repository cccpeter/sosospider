<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Cache;
class Base extends Controller
{
    public $user_id;
    public $user_auth;
    public function __construct()
    {
		
		parent::__construct();
		$this->isnav();
    }
	public function isnav(){
        $token=input('post.token');
        $authorization=$token;
        // Cache::store("redis")->set($authorization,);
        $user=Cache::get($authorization);
        if($user!=''){
            $userlist=explode('|',$user);
            $this->user_id=$userlist[0];
            $this->user_auth=$userlist[1];
            // 控制器为
            $controller=request()->controller();
            $nav=Db::name('nav')->field('nav_auth')->where(['nav_controller'=>$controller,'nav_isshow'=>'1'])->find();
            // 权限越小则权利越大
            if($nav['nav_auth']<$this->user_auth){
                $data=json_encode('{"code":"400","msg":"error403"}');
                echo $data;
                ob_flush();flush();
                die;
            }
			if($nav==""){
                $data=json_encode('{"code":"400","msg":"error402"}');
				echo $data;
                ob_flush();flush();
                die;
			}
        }else{
            $data=json_encode('{"code":"400","msg":"error401"}');
            echo $data;
            ob_flush();flush();
            die;
        }

	}
}
