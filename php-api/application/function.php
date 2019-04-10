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


        /*
    *@ 获取文件夹下的文件数量
     */
    function file_get($path)
    {
        $path_dir = $path;
        $path = ROOT_PATH.$path;
        //中文专用-UTF8
        // $path = iconv("utf-8", "gb2312", $path);

        $handle = opendir($path);
        $i = 0;
        $dirFile = null;
        while ($file = readdir($handle)) {

            if ($file != "." && $file != "..") {
                $dirFile = $path . "/" . $file;    //文件源链接
                //中文专用-UTF8
                // $dir = $path_dir. "/" .iconv("gb2312", "utf-8", $file);
                $dir = $path_dir. "/" .$file;
                //文件名+后缀
                $message[$i]['name'] = $file; 
                //纯文件名
                $ext = substr(strrchr($file, '.'), 1);  
                $name_noext = basename($file,".".$ext);  
                
                $message[$i]['name_noext'] = $name_noext; 
                
                //中文专用-UTF8
                // $message[$i]['name_noext'] = iconv("gb2312", "utf-8", $name_noext);
                //中文专用-UTF8
                // $message[$i]['name'] = iconv("gb2312", "utf-8", $file); //文件名

                // $message[$i]['size'] = byteTo(filesize($dirFile)); //文件大小
                $message[$i]['size'] = byteTo(getDirSize($dirFile));
                $message[$i]['type'] = filetype($dirFile);//文件类型
                $message[$i]['date'] = date("Y-m-d", filectime($dirFile)); //创建时间
                //文件路径
               
                $message[$i]["dir"] = $dir;
                $message[$i]["ext"] = $ext;
                // echo $dir;exit;
                // 
                $message[$i]["dir"] = str_replace("\\", '/', $message[$i]["dir"]);
                $mes[] = filetype($dirFile);
                $i++;
            }
        }
        closedir($handle);
        @array_multisort($mes, SORT_ASC, SORT_STRING, $message);
        // dump($message);exit;
        return $message;
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

    /**
     * 获取文件或文件夹大小
     */
    // function getDirSize($dir)
    // {
    //     $size = 0;
    //     $dirs = [$dir];
         
    //     while(@$dir=array_shift($dirs)){
    //         $fd = opendir($dir);
    //         while(@$file=readdir($fd)){
    //             if($file=='.' && $file=='..'){
    //                 continue;
    //             }
    //             $file = $dir.DIRECTORY_SEPARATOR.$file;
    //             if(is_dir($file)){
    //                 array_push($dirs, $file);
    //             }else{
    //                 $size += filesize($file);
    //             }
    //         }
    //         closedir($fd);
    //     }
    //     return $size;
    // }

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

// function del_file($file_dir){
//     if (filetype($file_dir) == 'file') {
//             unlink($file_dir);
//             // var_dump(unlink($file));exit;
//         }else {
//             //删除目录
//             if ( $handle = opendir( "$file_dir" ) ) {
//                 while ( false !== ( $item = readdir( $handle ) ) ) {
//                     if ( $item != "." && $item != ".." ) {
//                         dump(is_dir( "$file_dir/$item" ));
//                             if ( is_dir( "$file_dir/$item" ) ) {
//                                 delDirAndFile( "$file_dir/$item" );
//                             } else {
//                                 unlink( "$file_dir/$item" );
//                             }
//                         }
//                     }
//                     exit;
//                     closedir( $handle );
//                     rmdir( $file_dir );
//                 }
//             }
    
// }

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
 *  显示用户类型
 */
function getUserType($auth_level,$username=''){
    switch($auth_level){
        case '1':
        if($username == SUSER){
            return '超级管理员';
        }else{
            return '管理员';
        }
        break;
        case '2':
        return '高级用户';
        break;
        case '3':
        return '普通用户';
        case '4':
        return '学生';
        break;
        case '99':
        return '超级管理员';
        break;
    }
}
/**
 * 信息发布状态显示：
 */
function art_state_show($state){
    $state_release = '';
    switch($state){
        case '1':
        $state_release = '<span  class="wzbgcolor" style="color: #1bf31b;">预约发布中</span>';
        break;
        case '2':
        $state_release = '<span  class="wzbgcolor" style="color: #f37b1d;">预约发布暂停</span>';
        break;
        case '3':
        $state_release = '<span  class="wzbgcolor" style="color: #dd514c;">预约发布已失效</span>';
        break;
        case '4':
        $state_release = '<span  class="wzbgcolor" style="color: #f37b1d;">即时发布已生效</span>';
        break;
        case '5':
        $state_release = '<span  class="wzbgcolor" style="color: #dd514c;">即时发布已失效</span>';
        break;
        case '6':
        $state_release = '<span  class="wzbgcolor" style="color: #1bf31b;">即时发布中</span>';
        break;
        case '7':
        $state_release = '<span  class="wzbgcolor" style="color: #1bf31b;">发布中</span>';
        break;
        case '8':
        $state_release = '<span  class="wzbgcolor" style="color: #f37b1d;">发布暂停</span>';
        break;
        case '9':
        $state_release = '<span  class="wzbgcolor" style="color: #dd514c;">发布已失效</span>';
        break;
    }
    return $state_release;
}
function live_state_show($state){
    $state_release = '';
    switch($state){
        case '1':
        $state_release = '<i class="Hui-iconfont " style="font-size: 42px;height: 59px;color: green;">&#xe6e6;</i><p class="float_l" style="font-size: 12px;padding-left:3px;color:green;">发布中</p>';
        break;
        case '2':
        $state_release = '<i class="Hui-iconfont " style="font-size: 42px;height: 59px;color: #d56f2b;">&#xe6e5;</i><p class="float_l" style="font-size: 12px;padding-left:3px;color:#d56f2b;">暂停中</p>';
        break;
        case '3':
        $state_release = '<i class="Hui-iconfont " style="font-size: 42px;height: 59px;color: #808080;">&#xe631;</i><p class="float_l" style="font-size: 12px;padding-left:3px;color:#808080;">已过期</p>';
        break;
        case '4':
        $state_release = '<i class="Hui-iconfont " style="font-size: 42px;height: 59px;color: green;">&#xe6e6;</i><p class="float_l" style="font-size: 12px;padding-left:3px;color:green;">发布中</p>';
        break;
        case '5':
        $state_release ='<i class="Hui-iconfont " style="font-size: 42px;height: 59px;color: #808080;">&#xe631;</i><p class="float_l" style="font-size: 12px;padding-left:3px;color:#808080;">已过期</p>';
        break;
        case '6':
        $state_release ='<i class="Hui-iconfont " style="font-size: 42px;height: 59px;color: green;">&#xe6e6;</i><p class="float_l" style="font-size: 12px;padding-left:3px;color:green;">发布中</p>';
        break;
        case '7':
        $state_release ='<i class="Hui-iconfont " style="font-size: 42px;height: 59px;color: green;">&#xe6e6;</i><p class="float_l" style="font-size: 12px;padding-left:3px;color:green;">发布中</p>';
        break;
        case '8':
        $state_release = '<i class="Hui-iconfont " style="font-size: 42px;height: 59px;color: #d56f2b;">&#xe6e5;</i><p class="float_l" style="font-size: 12px;padding-left:3px;color:#d56f2b;">暂停中</p>';
        break;
        case '9':
        $state_release ='<i class="Hui-iconfont " style="font-size: 42px;height: 59px;color: #808080;">&#xe631;</i><p class="float_l" style="font-size: 12px;padding-left:3px;color:#808080;">已过期</p>';
        break;
    }
    return $state_release;
}
function title_state_show($state){
    $state_release = '';
    switch($state){
        case '1':
        $state_release = '预约发布中';
        break;
        case '2':
        $state_release = '预约发布暂停';
        break;
        case '3':
        $state_release = '预约发布已失效';
        break;
        case '4':
        $state_release = '即时发布已生效';
        break;
        case '5':
        $state_release = '即时发布已失效';
        break;
        case '6':
        $state_release = '即时发布中';
        break;
        case '7':
        $state_release = '发布中';
        break;
        case '8':
        $state_release = '发布暂停';
        break;
        case '9':
        $state_release = '发布已失效';
        break;
    }
    return $state_release;
}
/**
 * 信息发布en字段显示
 */
function art_en_show($en){
    $en_shwo = '';
    switch($en){
        case '1':
        $en_shwo = '有效';
        break;
        case '2':
        $en_shwo = '无效';
        break;
        case '3':
        $en_shwo = '审核中';
        break;
        case '4':
        $en_shwo = '审核未通过';
        break;
    }
    return $en_shwo;
}

/**
 * 信息发布en字段显示
 */
function art_type_show($type){
    $type_show = '';
    switch($type){
        case '1':
        $type_show = '视频类';
        break;
        case '2':
        $type_show = '图片类';
        break;
        case '3':
        $type_show = '链接地址类';
        break;
        case '4':
        $type_show = '文字类';
        break;
    }
    return $type_show;
}
/**
 * 获取发布规则-小提示
 */
function getArtTips($type){
    switch($type){
        case '1':
        $content = '（注：<b style="color: red;">红色</b>代表终端<b style="color: red;">离线</b>，<b style="color: green;">绿色</b>代表终端<b style="color: green;">在线</b>，<b style="color: #D5912B;">黄色</b>代表终端<b style="color: #D5912B;">正在发布</b>）';
        break;
        case '2':
        $content = '（支持FLV,MP4,MKV,MOV格式）';
        break;
        case '3':
        $content = '待发布列表中有正在发布的终端，请检查<b style="color: #D5912B;">黄色</b>状态设备，是否需要强制发布？';
        break;
        case '4':
        $content = '';
        break;
    }
    return $content;
}
/**
 * 显示设备开关机状态
 * @param  [type] $state_dev [description]
 * @return [type]            [description]
 */
function stateDevShow($state_dev){
    $str = '<img src="public/static/images/error.png" />';
    switch ($state_dev) {
        case '01':
        $str = '<img src="public/static/images/success.png" />';
        break;
        case '02':
        $str = '<img src="public/static/images/error.png" />';
        break;
        case '03':
        $str = '<b style="color: green;">开机中</b>';
        break;
        case '04':
        $str = '<b style="color: red;">关机中</b>';
        break;
        default:
            # code...
            break;
    }
    return $str;
}


/**
 * 发布规则-绑定mac状态颜色
 */
function rulesMacColor($state_net,$rules_en){
    if($rules_en==1){
        $color = '#D5912B';
    }else{
        if($state_net==1){
            $color = 'green';
        }else{
            $color = 'red';
        }
    }
    return $color;
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
 * 获取权限为2的特殊用户可用mac
 * @param  string 选择返回的类型
 * @return [array]/[json]
 */
function getSpecialMac($mac_type,$type=''){
    $mac_users = db('permission')
                ->field($mac_type)
                ->where('id='.session('id','','base_'))
                ->find();
    if($type =='array'){
        return json_decode($mac_users[$mac_type],true);
    }
    else if($type =='string'){
        return rtrim(ltrim($mac_users[$mac_type],'['),']');
    }
    else{
        return $mac_users[$mac_type];
    }
}
/**
 * 计算发送码的长度
 * @param  [string] $code [需要计算的字符串]
 * @return [string]       [description]
 */
function codeLen($code){
    $len = strlen($code)/2;
    $len = dechex($len);
    if(strlen($len)==1){
        $len = '000'.$len;
    }else if(strlen($len)==2){
        $len = '00'.$len;
    }else if(strlen($len)==3){
        $len='0'.$len;
    }
    return $len;
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
        $hex=strtoupper($hex);
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
// 将毫瓦转成瓦
function division($string){
    return floatval($string)/1000;
}
