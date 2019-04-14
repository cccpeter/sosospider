<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Cache;
use app\index\controller\ElasticsearchService;
class Search extends Controller
{
    public function search(){
    	$keyword=input('post.key');
    	$pagenow=input('post.pagenow');
    	$elasticsearch = new ElasticsearchService ();
		$query=stripslashes('{"query":{"multi_match":{"query":"keyword","fields":"content"}},"from":pagenow,"size":10,"highlight":{"fields":{"title":{},"content":{}}}}');
		$query=str_replace("keyword",$keyword,$query);
		$query=str_replace("pagenow",$pagenow,$query);
		$query=json_decode($query);
		$result= $elasticsearch->search ( $query );
		$re=json_decode($result,TRUE);
		if($re["hits"]["hits"]==""||empty($re["hits"]["hits"])){
			$searchresult['msg']="暂时未能搜索到该结果";
		}
		$searchresult['nums']=$re['hits']['total'];
		for($i=0;$i<sizeof($re["hits"]["hits"]);$i++){
			$searchresult['msg']="1";
			$searchresult['data'][$i]['content']=$re["hits"]["hits"][$i]["highlight"]["content"];
			$contextall="";
			for($j=0;$j<sizeof($searchresult['data'][$i]['content']);$j++){
				$contextall.=$searchresult['data'][$i]['content'][$j];
			}
			$searchresult['data'][$i]['content']=strip_tags(str_replace('"', '', mb_substr($contextall,0,600,"utf-8")));
			$searchresult['data'][$i]['content'].="……";
			$searchresult['data'][$i]['url']=$re['hits']['hits'][$i]["_source"]["url"];

			$searchresult['data'][$i]['urldata']=str_replace('"', '', mb_substr($re['hits']['hits'][$i]["_source"]["url"],0,25,"utf-8"));
			$searchresult['data'][$i]['title']=strip_tags(str_replace('"', '', mb_substr($re['hits']['hits'][$i]["_source"]["title"],0,20,"utf-8")));
			if($searchresult['data'][$i]['title']==""){
				$searchresult['data'][$i]['title']=mb_substr($searchresult['data'][$i]['content'],0,25,"utf-8");
			}
			
			$searchresult['data'][$i]['time']=strip_tags(str_replace('"', '', $re['hits']['hits'][$i]["_source"]["time"]));
			if($searchresult['data'][$i]['time']==""){
				$searchresult['data'][$i]['time']="2018-10-09";
			}else{
				$searchresult['data'][$i]['time']=mb_substr($searchresult['data'][$i]['time'], 0,10,"utf-8");
			}
			$searchresult['data'][$i]['grade']=str_replace('"', '', $re['hits']['hits'][$i]["_score"]);
		}	
		$searchresult=json_encode($searchresult);
		return $searchresult;

    }

}
