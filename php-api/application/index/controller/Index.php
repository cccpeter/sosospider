<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Cache;
use app\index\controller\Base;
use app\index\controller\ElasticsearchService;
class Index extends Base
{

    public function index()
    {
    	$sys=db("sys")->find();
    	$data=json_encode(['data'=>$sys,'code'=>'200']);
        return $data;
    }
  //   public function search(){
  //   	$keyword=input('post.key');
  //   	$elasticsearch = new ElasticsearchService ();
		// $query=stripslashes('{"query":{"multi_match":{"query":"keyword","fields":"content"}},"from":0,"size":10,"highlight":{"fields":{"title":{},"content":{}}}}');
		// $query=str_replace("keyword",$keyword,$query);
		// $query=json_decode($query);
		// $result= $elasticsearch->search ( $query );
		// $re=json_decode($result,TRUE);
		// 		for($i=0;$i<sizeof($re["hits"]["hits"]);$i++){
		// 	$searchresult[$i]['content']=$re["hits"]["hits"][$i]["highlight"]["content"];
		// 	$contextall="";
		// 	for($j=0;$j<sizeof($searchresult[$i]['content']);$j++){
		// 		$contextall.=$searchresult[$i]['content'][$j];
		// 	}
		// 	$searchresult[$i]['content']=mb_substr($contextall,20,600,"utf-8");
		// 	$searchresult[$i]['content'].="……";
		// 	$searchresult[$i]['url']=$re['hits']['hits'][$i]["_source"]["url"];
		// 	$searchresult[$i]['title']=mb_substr($re['hits']['hits'][$i]["_source"]["title"],0,200,"utf-8");
		// 	$searchresult[$i]['time']=$re['hits']['hits'][$i]["_source"]["time"];
		// 	$searchresult[$i]['grade']=$re['hits']['hits'][$i]["_score"];
		// }	
		// dump($searchresult);

  //   }
}
