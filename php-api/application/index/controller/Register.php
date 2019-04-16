<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Cache;
class Register extends Controller
{
	public function index(){
		$username=input('post.username');
		$password=input("post.password");
		$account=input("post.account");
		$re=db("user")->insert(['user_account'=>$account,'user_password'=>$password,'user_name'=>$username,'user_auth'=>'5']);
		$data=['status'=>'1','msg'=>"注册成功"];
		return json_encode($data);
	}
}