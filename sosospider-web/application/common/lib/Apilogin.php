<?php 
namespace app\common\lib;
use think\Db;
/**
 * API登录
 */
class Apilogin{
	public $api_key;
	public $is_api;
	public $back_api_url;
	public function api_login_check(){
		$this->api_key = input('get.username');
		$this->is_api = input('get.api_login');
		$this->back_api_url = input('get.url');
		if($this->is_api!='yes')return false;

		$navinfo = $this->get_navinfo($this->api_key);

		if(!in_array($this->api_key,$navinfo['api_arr']))return false;
		return [
			'api_key'=>$this->api_key,
			'controller'=>$navinfo['controller'],
			'action'=>$navinfo['action'],
			'back_api_url'=>$this->back_api_url
			];
	}

	public function get_navinfo($api_key){
		//查询
		$api_info = Db::name('nav')->field('controller,action,api_key')->where('api_key is not null')->select();
		$api_arr = [];
		$controller = '';
		$action = '';
		foreach($api_info as $v){
			$api_arr[] = $v['api_key'];
			if($api_key==$v['api_key']){
				$controller=$v['controller'];
				$action = $v['action'];
			}
		}

		return ['api_arr'=>$api_arr,'controller'=>$controller,'action'=>$action];
	}

}

