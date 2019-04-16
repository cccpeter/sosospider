<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Cache;
use Redis;
use app\index\controller\Base;
use app\index\controller\ElasticsearchService;
use app\index\controller\Curldata;
class User extends Base
{
	public function index(){
		$token=input('post.token');
        $authorization=$token;
        // Cache::store("redis")->set($authorization,);
        $user=Cache::get($authorization);
        if($user!=''){
            $userlist=explode('|',$user);
            $user_id=$userlist[0];
            $user_auth=$userlist[1];
            $webaddr=db("web")->where(['user_id'=>$user_id])->select();
            foreach ($webaddr as &$value) {
            	$value['web_time']=date('Y-m-d H:i',$value['web_time']);
            }
            $data=['data'=>$webaddr,'status'=>'1'];
            return json_encode($data);
        }
        return json_encode($token);
	}
	public function webuseradd(){
		$token=input('post.token');
		$webaddr=input("post.webaddr");
        $authorization=$token;
        // Cache::store("redis")->set($authorization,);
        $user=Cache::get($authorization);
        if($user!=''){
            $userlist=explode('|',$user);
            $user_id=$userlist[0];
            $user_auth=$userlist[1];
            $re=db("web")->insert(['user_id'=>$user_id,'web_addr'=>$webaddr,'web_time'=>time(),'web_index'=>'0']);
            $data=['status'=>'1'];
            return json_encode($data); 
        }
	}
}