<?php 
	namespace app\common\lib;
/**
 * 发送udp信息
 */
class Sendudp{
	public $udp_ip='';
	public $udp_port='';

	public function __construct( $udp_ip='',$udp_port='' ){
		if($udp_ip==''||$udp_port==''){
			$this->udp_ip = config('conf.UDP_IP');
			$this->udp_port = config('conf.UDP_PORT');
		}else{
			$this->udp_ip = $udp_ip;
			$this->udp_port = $udp_port;
		}
	}

	/**
	 * 控制设备开关机
	 */
	public function devStateNet($cmdcode){
		$buf = $cmdcode;
		$this->sendUdp($buf);
	}

	/**
	 * [向UDP服务器发送数据]
	 * @param  [type] $buf [需要发送的数据]
	 * @return [type]      [description]
	 */
	public function sendUdp($buf){
	    $handle = stream_socket_client("udp://".$this->udp_ip.":".$this->udp_port, $errno, $errstr);  
	    if( !$handle ){  
	        die("ERROR: {$errno} - {$errstr}\n");  
	    }
	    fwrite($handle, $buf."\n");   // 逐组数据发送
	    fclose($handle);  

	}


}