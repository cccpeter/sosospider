<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Cache;
class Login extends Controller
{
	public function login(){
		$account=input('post.account');
		$password=input('post.password');
		$user=db("user")->where(["user_account"=>$account,"user_password"=>$password])->find();
		if($user!=""){
			$time=time()+"cpeter";
			$token=md5($time.$user['user_account']);
			$data=$user['user_account'].'|'.$user['user_auth'];
			Cache::set($token,$data);
			$re=['code'=>'200','token'=>$token,'username'=>$user['user_name']];
			return json_encode($re);
		}else{
			$re=['code'=>'400'];
			return json_encode($re);
		}
	}
}