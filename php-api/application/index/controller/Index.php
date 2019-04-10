<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Cache;
use app\index\controller\Base;
class Index extends Base
{

    public function index()
    {
    	$sys=db("sys")->find();
    	$data=json_encode(['data'=>$sys,'code'=>'200']);
        return $data;
    }
}
