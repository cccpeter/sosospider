<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Cache;
use Redis;
use app\index\controller\Base;
use app\index\controller\ElasticsearchService;
class Index extends Base
{

    public function index()
    {
    	
    	$weblist=db("web")->field("web_addr,web_id")->select();
    	$redis = new Redis();  
		$redis->connect('47.107.77.9', 6379); 
		$nums=0;
    	foreach ($weblist as $value) {
			$num=$redis->lSize($value['web_addr']);
			$menber=$redis->sCard($value['web_addr']."setall");
			db("web")->where(['web_id'=>$value['web_id']])->update(['web_index'=>$num,'web_index'=>($menber-$num)]);
			$nums+=$num;
    	}
    	$info=$redis->info();
    	$db0=$info['db0'];
    	$keys=explode(',', $db0);
    	$keys=explode('=', $keys[0]);
    	db("sys")->where(['sys_id'=>'1'])->update(['sys_index_nums'=>$keys[1],'sys_len_queue'=>$nums]);
    	$sys=db("sys")->where(['sys_id'=>'1'])->find();
    	$max_id=db("spiderday")->max("id");
    	if($max_id!=0){
    		$max=db("spiderday")->where(['id'=>$max_id])->find();
    		$is_spider=$keys[1]-$max['allnums'];
    		$re=db("spiderday")->insert(['time'=>time(),'nums'=>$is_spider,'allnums'=>$keys[1]]);
    	}else{
    		$re=db("spiderday")->insert(['time'=>time(),'nums'=>'0','allnums'=>$keys[1]]);
    	}
    	$spidernums=db("spider")->count();
    	$spider_online=db("spider")->where(['spider_status'=>'01'])->count();
    	$sys['spidernums']=$spidernums;
    	$sys['spider_online']=$spider_online;
    	$data=json_encode(['data'=>$sys,'code'=>'200']);
        return $data;
    }
    /**
    *对应echart的数据包提取
    */
    public function getspiderday(){
    	$count=db("spiderday")
    			->count();
    	if($count>7){
    		$start=$count-7;
    	}else{
    		$start=0;
    	}
    	
    	$spiderday=db("spiderday")
    			->limit($start,$count)
    			->select();
    	$day=array();
    	$data=array();
    	$i=0;
    	foreach ($spiderday as $value) {
    		$day[$i]=date("Y-m-d H:i:s",$value['time']);
    		$data[$i]=$value['allnums'];
    		$i++;
    	}
    	$re=json_encode(['data'=>$data,'day'=>$day,'code'=>'200']);
    	return $re;
    }

    public function systemlist(){
    	$spider_list=db("spider")->select();
    	$data=json_encode(['data'=>$spider_list]);
    	return $data;
    }
    public function spideradd(){
    	$remark=input('post.remark');
    	$ip=input('post.ip');
    	$port=input('post.port');
    	db("spider")->insert(['spider_remark'=>$remark,'spider_port'=>$port,'spider_ip'=>$ip,'spider_status'=>'00']);
    	$data=json_encode(['status'=>'1','msg'=>"添加成功"]);
    	return $data;
    }
    public function spiderid(){
    	$spider_id=input("post.spider_id");
    	$spider=db("spider")->where(['spider_id'=>$spider_id])->find();
    	$data=json_encode(['status'=>'1','data'=>$spider]);
    	return $data;
    }
    public function spideredit(){
    	$remark=input("post.remark");
    	$ip=input("post.ip");
    	$port=input("post.port");
    	$spider_id=input("post.spider_id");
    	db("spider")->where(['spider_id'=>$spider_id])->update(['spider_remark'=>$remark,'spider_id'=>$spider_id,'spider_port'=>$port]);
    	$data=['status'=>'1','msg'=>'修改成功'];
    	$data=json_encode($data);
    	return $data;
    }
    public function spiderdel(){
    	$spider_id=input("post.spider_id");
    	$re=db("spider")->where(['spider_id'=>$spider_id])->delete();
    	$data=['status'=>'1','msg'=>'删除成功'];
    	return json_encode($data);
    }
    /**
     * 接下来为用户提交网址模块
     */
    public function getwebaddr(){
    	$web=db("web")->select();
    	foreach ($web as &$value) {
    		$user=db("user")->where(['user_id'=>$value['user_id']])->find();
    		$value['user_name']=$user['user_name'];
    		$value['time']=date("Y-m-d H:i",$value['web_time']);
    	}
    	$data=['status'=>'1','data'=>$web];
    	return json_encode($data);
    }
    public function delwebaddr(){
    	$web_id=input("post.web_id");
    	db("web")->where(['web_id'=>$web_id])->delete();
    	$data=['status'=>'1','msg'=>'删除成功'];
    	return json_encode($data);
    }
}
