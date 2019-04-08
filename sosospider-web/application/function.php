<?php

function dd($show){
    dump($show);exit;
}
/**
 * @curl模拟get请求
 * @param $url
 * @param int $timeout
 * @return mixed
 */
function curl_get($url, $timeout = 10)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

/**
 * @curl模拟post请求
 * @param $url
 * @param array $params
 * @param int $timeout
 * @return mixed
 *
 */
function curl_post($url, $params = array(), $timeout = 10)
{
    $ch = curl_init();//初始化
    curl_setopt($ch, CURLOPT_URL, $url);//抓取指定网页
    curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    $result = curl_exec($ch);//运行curl
    curl_close($ch);
    return ($result);
}

/**
 * @ 加密函数
 * @param $txt @加密文本
 * @param string $key @密钥
 * @return string
 */
function passport_encrypt($txt, $key = '0330118d86425b476dc7fa05dcbc99ab')
{
    $txt = 'lta.' . $txt;
    srand((double)microtime() * 1000000);
    $encrypt_key = md5(rand(0, 32000));
    $ctr = 0;
    $tmp = '';
    for ($i = 0; $i < strlen($txt); $i++) {
        $ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
        $tmp .= $encrypt_key[$ctr] . ($txt[$i] ^ $encrypt_key[$ctr++]);
    }
    return base64_encode(passport_key($tmp, $key));
}

/**
 * @ 解密函数
 * @param $txt @解密文本
 * @param string $key @密钥
 * @return mixed
 */
function passport_decrypt($txt, $key = '0330118d86425b476dc7fa05dcbc99ab')
{
    $txt = passport_key(base64_decode($txt), $key);
    $tmp = '';
    for ($i = 0; $i < strlen($txt); $i++) {
        $md5 = $txt[$i];
        $tmp .= $txt[++$i] ^ $md5;
    }
    $value = explode('.', $tmp);
    return $value[1];
}

function passport_key($txt, $encrypt_key)
{
    $encrypt_key = md5($encrypt_key);
    $ctr = 0;
    $tmp = '';
    for ($i = 0; $i < strlen($txt); $i++) {
        $ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
        $tmp .= $txt[$i] ^ $encrypt_key[$ctr++];
    }
    return $tmp;
}
/**
 * [pwd加密]
 * @param  [type] $password [description]
 * @return [type]           [description]
 */
function pwd_encrypt($password){
    // return md5(md5(SECRET_KEY).$password);
    return md5(md5(config('conf.SECRET_KEY')).$password);
}


/*
 * 中文字符截取
 * @param      string        $string       被处理的字符串
 * @param      int           $start        开始截取的位置
 * @param      int           $length       截取的字符长度
 * @param      string        $dot          缩略符号
 * @param      string        $charset      字符编码
 * @return       string      $new          成功截取后的字符串
 */

    function cutstr($string, $start, $length, $dot = '',$charset = "utf-8") {
        //判断当前的环境中是否开启了mb_substr这个函数
        if(function_exists("mb_substr")){
            
            if(mb_strlen($string,$charset)>$length){
                //如果开启了就可以直接使用这个
                return mb_substr($string,$start,$length,$charset).$dot;
            }
            return mb_substr($string,$start,$length,$charset);
        }
        //否则就是下面没开启
        $new = '';
        //判断是否是gbk，是gbk就转码成utf-8
        if($charset==='gbk'){
            $string = iconv("gbk","utf-8",$string);
        }
        //下面这个只能使用在utf-8的编码格式中
        $str = preg_split('//u',trim($string));
        for($i = $start,$len = 1;$i<count($str)-1 && $len<=$length;$i++,$len++){
            $new .= $str[$i+1];
        }
        //如果是gbk，就需要在返回结果之前，把之前的转换编码恢复一下
        if($charset==='gbk'){
            $new = iconv("utf-8","gbk",$new);
        }
        return count($str)-2<$length?$new:$new.$dot;
    }



        /**
         * [get_url 获取url参数 pn参数除外]
         * @return [type] [description]
         */
        function get_url(){
            $str ='';
            foreach ($_GET as $k => $v) {
                if($k!='page'&&$k!='active'){
                    $str .= $k.'='.urlencode($v).'&';
                    // if($k=='selected'){
                    //     $str .= $k.'='.urlencode($v).'&';
                    // }else{
                    //     $str .= $k.'='.$v.'&'; 
                    // }
                    
                }
            }
            $str = rtrim($str,'&');
            return $str;
        }



    //文件大小
    function byteTo($char)
    {
        $ch = array("B", "KB", "MB", "GB", "TB", "PB");
        $i = 0;
        while (true) {
            if ($char > 1024) {
                $char = $char / 1024;
            } else {
                $char = round($char, 2) . $ch[$i];
                return $char;
            }
            $i++;
        }
    }
   function getDirSize($dir)
     { 
        if(is_dir($dir)){
              $handle = opendir($dir);
              $sizeResult = 0;
              while (false!==($FolderOrFile = readdir($handle)))
              { 
               if($FolderOrFile != "." && $FolderOrFile != "..") 
               { 
                if(is_dir("$dir/$FolderOrFile"))
                { 
                 $sizeResult += getDirSize("$dir/$FolderOrFile"); 
                }
                else
                { 
                 $sizeResult += filesize("$dir/$FolderOrFile"); 
                }
               } 
              }
              closedir($handle);
              return $sizeResult;
          }else{
            return filesize($dir);
          }
     }
 


//查看文件名字是否符合
function file_check($filename)
{
    $pattern = "/[\/,*,<>,\?|]/";
    if (preg_match($pattern, $filename)) {
        return false;
    } else {
        return true;
    }
}

function delDirAndFile($path, $delDir = FALSE) {
    if (is_array($path)) {
        foreach ($path as $subPath)
            delDirAndFile($subPath, $delDir);
    }
    if (is_dir($path)) {
        $handle = opendir($path);
        if ($handle) {
            while (false !== ( $item = readdir($handle) )) {
                if ($item != "." && $item != "..")
                    is_dir("$path/$item") ? delDirAndFile("$path/$item", $delDir) : unlink("$path/$item");
            }
            closedir($handle);
            if ($delDir)
                return rmdir($path);
        }
    } else {
        if (file_exists($path)) {
            return unlink($path);
        } else {
            return FALSE;
        }
    }
    clearstatcache();
}
/**
 * 过滤数组元素前后空格 (支持多维数组)
 * @param $array 要过滤的数组
 * @return array|string
 */
function trim_array_element($array){
    if(!is_array($array))
        return trim($array);
    return array_map('trim_array_element',$array);
}

/**
 * ip的16进制转10进制--规则控制列表用
 */
function ip_hex($str){
    // if(!$str)return '';
    $arr = str_split($str,2);
    $ip = '';
    foreach ($arr as $v) {
        $ip .= hexdec($v).'.';
    }
    return rtrim($ip,'.');
}
/**
 * 获取mac格式的字符串 -规则控制列表用
 */
function get_macstr($str){
    $arr = str_split($str,2);
    $mac = '';
    foreach ($arr as $v) {
        $mac .= $v.':';
    }
    return rtrim($mac,':');
}


/**
 * 计算发送码的长度
 * @param  [string] $code [需要计算的字符串]
 * @return [string]       [description]
 */
function codeLen($code){
    $len = strlen($code)/2;
    $len = dechex($len);
    if(strlen($len)<=1){
        $len = '0'.$len;
    }
    return '00'.$len;
}
/**
 * ip的数组转ip的16进制格式
 * @param  [array] $ip_arr [传进来的ip-4位数组]
 * @return [string]         [16进制的IP字符串]
 */
function iparrToipformat($ip_arr){
    if(!is_array($ip_arr))return '';
    $ip_hex = '';
    foreach ($ip_arr as $v) {
        $hex = dechex($v);
        if(strlen($hex)<=1)
            $hex = '0'.$hex;
        $ip_hex .= $hex;
    }
    return $ip_hex;

}

/**
 * ip的16进制格式转成10进制ip数组(mac可用)
 * @param  [string]  $ipstr_hex [description]
 * @param  bool $is_hexdec  [是否16进制转10进制]
 * @return [ip_arr]             [10进制的ip数组]
 */
function ipformatToiparr($ipstr_hex,$is_hexdec=1){
    if(empty($ipstr_hex))return '';
    $arr = str_split($ipstr_hex,2);
    $ip_arr = '';
    foreach ($arr as $v) {
        if($is_hexdec){
            $ip_arr[] = hexdec($v);
        }else{
            $ip_arr[] = $v;
        }
    }
    return $ip_arr;

}

/**
 * 过滤数据敏感字符
 * @param  [type] $array [description]
 * @return [type]        [description]
 */
function doHtmlentities($array){
    if(!is_array($array))
        return htmlentities($array);
    return array_map('doHtmlentities',$array);
}

function send($data,$status){
    $msg['data']=$data;
    $msg['status']=$status;
    return ['data'=>$data,'status'=>$status];
    
}

/**
 * 小规模数组排序
 * 冒泡排序从大到小
 */
function mpsortless($arr,$key){
    $len=sizeof($arr);
    for($k=1;$k<$len;$k++)
    {
        for($j=0;$j<$len-$k;$j++){
            if($arr[$j][$key]<$arr[$j+1][$key]){
                $temp =$arr[$j+1][$key];
                $arr[$j+1][$key] =$arr[$j][$key];
                $arr[$j][$key] = $temp;
            }
        }
    }
    return $arr;
}
/**
 * 小规模数组排序
 * 冒泡排序从小到大
 */
