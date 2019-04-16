<?php
namespace app\index\controller;

class Curldata{
	/**
	 * api参数前面不带反斜杠
	 * @param  [type] $data [description]
	 * @param  [type] $api  [description]
	 * @return [type]       [description]
	 */
public function curlget($host,$port,$data,$api) {
		$url = 'http://' . $host . ':' . $port . '/' . $api;
		$json_data = json_encode ( $data );
		return $this->curl ( $url, $json_data, "GET" ,$port);
	}
public function curlpost($host,$port,$data,$api) {
		$url = 'http://' . $host . ':' . $port . '/' . $api;
		$json_data = json_encode ( $data );
		return $this->curl ( $url, $json_data, "POST" ,$port);
	}
private function curl($url, $postDate = "", $method = "PUT",$port) {
		$ci = curl_init ();
		curl_setopt ( $ci, CURLOPT_URL, $url );
		curl_setopt ( $ci, CURLOPT_PORT, $port );
		curl_setopt ( $ci, CURLOPT_TIMEOUT, 200 );
		curl_setopt ( $ci, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ci, CURLOPT_FORBID_REUSE, 0 );
		curl_setopt ( $ci, CURLOPT_CUSTOMREQUEST, $method );
		if ($postDate) {
			curl_setopt ( $ci, CURLOPT_POSTFIELDS, $postDate );
		}
		$response = curl_exec ( $ci );
		return $response;
	}
}