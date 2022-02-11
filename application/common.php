<?php
// +----------------------------------------------------------------------

// | Copyright (c) 2019~2019 http://www.bowh.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: ONE
// +----------------------------------------------------------------------
use think\Cache;
use think\Db;


// 应用公共文件

		/**
     * 发送http请求
     */
    function send_curl($url,$header = [], $params=[],  $type='GET')
    {

        //初始化CURL句柄
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);//设置请求的URL
        #curl_setopt($curl, CURLOPT_HEADER, false);// 不要http header 加快效率
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); //设为TRUE把curl_exec()结果转化为字串，而不是直接输出
        //SSL验证
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);    // https请求时要设置为false 不验证证书和hosts  FALSE 禁止 cURL 验证对等证书（peer's certificate）, 自cURL 7.10开始默认为 TRUE。从 cURL 7.10开始默认绑定安装。 
        $prot = substr($url,0,5);
        if($prot == 'https'){
        	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
        	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
				}
        if (!empty($header)) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);//设置 HTTP 头字段的数组。格式： array('Content-type: text/plain', 'Content-length: 100')
        }
        //请求时间
        $timeout = 30;
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);//设置连接等待时间
        switch ($type) {
            case "GET" :
                curl_setopt($curl, CURLOPT_HTTPGET, true);

                break;

            case "POST":

                curl_setopt($curl, CURLOPT_POST, true);
//              curl_setopt($curl, CURLOPT_POSTFIELDS, $params);

                break;

            case "PUT" :

                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
//              curl_setopt($curl, CURLOPT_POSTFIELDS, $params);

                break;

            case "DELETE":

                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
//              curl_setopt($curl, CURLOPT_POSTFIELDS, $params);

                break;

        }
        if(!empty($params)){
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        }
        $ret = curl_exec($curl);//执行预定义的CURL
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);//获取http返回值,最后一个收到的HTTP代码
        curl_close($curl);//关闭cURL会话
        return $res = ['data'=>json_decode($ret,true),'code'=>$status];
    }


/**
 * each函数
 * @param   [array]          &$data [输入参数]
 * @version 1.0.0
 * @date    2019-02-26
 * @desc    description
 * @author   ONE
 */
function FunEach(&$data)
{
    if (!is_array($data)) {
        return false;
    }

    $res = [];
    $key = key($data);
    if ($key !== null) {
        next($data);
        $res[1] = $res['value'] = $data[$key];
        $res[0] = $res['key'] = $key;
    } else {
        $res = false;
    }
    return $res;
}

/**
 * 金额格式化
 * @param   [float]         $value     [金额]
 * @param   [int]           $decimals  [保留的位数]
 * @param   [string]        $dec_point [保留小数分隔符]
 * @version 1.0.0
 * @date    2019-02-20
 * @desc    description
 * @author   ONE
 */
function PriceNumberFormat($value, $decimals = 2, $dec_point = '.')
{
    return number_format($value, $decimals, $dec_point, '');
}

/**
 * json带格式输出
 * @param   [array]          $data   [数据]
 * @param   [string]         $indent [缩进字符，默认4个空格 ]
 * @author   ONE
 * @version 1.0.0
 * @date    2019-02-13
 * @desc    description
 */
function JsonFormat($data, $indent = null)
{
    // json encode  
    $data = json_encode($data, JSON_UNESCAPED_UNICODE);

    // 缩进处理  
    $ret = '';
    $pos = 0;
    $length = strlen($data);
    $indent = isset($indent) ? $indent : '    ';
    $newline = "\n";
    $prevchar = '';
    $outofquotes = true;

    for ($i = 0; $i <= $length; $i++) {
        $char = substr($data, $i, 1);

        if ($char == '"' && $prevchar != '\\') {
            $outofquotes = !$outofquotes;
        } elseif (($char == '}' || $char == ']') && $outofquotes) {
            $ret .= $newline;
            $pos--;
            for ($j = 0; $j < $pos; $j++) {
                $ret .= $indent;
            }
        }

        $ret .= $char;

        if (($char == ',' || $char == '{' || $char == '[') && $outofquotes) {
            $ret .= $newline;
            if ($char == '{' || $char == '[') {
                $pos++;
            }

            for ($j = 0; $j < $pos; $j++) {
                $ret .= $indent;
            }
        }

        $prevchar = $char;
    }

    return $ret;
}

/**
 * [FileSizeByteToUnit 文件大小转常用单位]
 * @param    [int]                   $bit [字节数]
 * @version  1.0.0
 * @datetime 2018-11-28T01:05:29+0800
 * @author   ONE
 */
function FileSizeByteToUnit($bit)
{
    //单位每增大1024，则单位数组向后移动一位表示相应的单位
    $type = array('Bytes', 'KB', 'MB', 'GB', 'TB');
    for ($i = 0; $bit >= 1024; $i++) {
        $bit /= 1024;
    }

    //floor是取整函数，为了防止出现一串的小数，这里取了两位小数
    return (floor($bit * 100) / 100) . $type[$i];
}

/**
 * 异步调用方法
 * @param   [string]          $url [url地址 支持get参数]
 * @version 1.0.0
 * @date    2018-06-11
 * @desc    异步运行url地址方法
 * @author   ONE
 */
function SyncJob($url, $port = 80, $time = 30)
{
    $url_str = str_replace(array('http://', 'https://'), '', $url);
    $location = strpos($url_str, '/');
    $host = substr($url_str, 0, $location);
    $fp = fsockopen($host, $port, $errno, $errstr, $time);
    if ($fp) {
        $out = "GET " . str_replace($host, '', $url_str) . " HTTP/1.1\r\n";
        $out .= "Host: " . $host . "\r\n";
        $out .= "Content-type: application/x-www-form-urlencoded\r\n";
        $out .= "Connection: Close\r\n\r\n";
        fputs($fp, $out);
        fclose($fp);
    }
}

/**
 * [DataReturn 公共返回数据]
 * @param    [string]       $msg  [提示信息]
 * @param    [int]          $code [状态码]
 * @param    [mixed]        $data [数据]
 * @return   [json]               [json数据]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-07T22:03:40+0800
 */
function DataReturn($msg = '', $code = 0, $data = '')
{
    // ajax的时候，success和error错误由当前方法接收
    if (IS_AJAX) {
        if (isset($msg['info'])) {
            // success模式下code=0, error模式下code参数-1
            $result = array('msg' => $msg['info'], 'code' => -1, 'data' => '');
        }
    }

    // 默认情况下，手动调用当前方法
    if (empty($result)) {
        $result = array('msg' => $msg, 'code' => $code, 'data' => $data);
    }

    // 错误情况下，防止提示信息为空
    if ($result['code'] != 0 && empty($result['msg'])) {
        $result['msg'] = '操作失败';
    }

    return $result;
}


/**
 * 生成url地址
 * @param string $path [路径地址]
 * @param array $params [参数]
 * @author   ONE
 * @version 1.0.0
 * @date    2018-06-12
 * @desc    description
 */
function MyUrl($path, $params = [])
{
    $url = url($path, $params, true, true);

    // 是否根目录访问项目
    if (defined('IS_ROOT_ACCESS')) {
        $url = str_replace('public/', '', $url);
    }

    // tp框架url方法是否识别到https
    if (__MY_HTTP__ == 'https' && substr($url, 0, 5) != 'https') {
        $url = 'https' . mb_substr($url, 4, null, 'utf-8');
    }

    return $url;
}

/**
 * 生成url地址 - 应用前端
 * @param string $plugins_name [应用名称]
 * @param string $plugins_control [应用控制器]
 * @param string $plugins_action [应用方法]
 * @param array $params [参数]
 * @author   ONE
 * @version 1.0.0
 * @date    2018-06-12
 * @desc    description
 */
function PluginsHomeUrl($plugins_name, $plugins_control, $plugins_action, $params = [])
{
    $plugins = [
        'pluginsname' => $plugins_name,
        'pluginscontrol' => $plugins_control,
        'pluginsaction' => $plugins_action,
    ];
    $url = url('index/plugins/index', $plugins + $params, true, true);

    // 是否根目录访问项目
    if (defined('IS_ROOT_ACCESS')) {
        $url = str_replace('public/', '', $url);
    }

    // tp框架url方法是否识别到https
    if (__MY_HTTP__ == 'https' && substr($url, 0, 5) != 'https') {
        $url = 'https' . mb_substr($url, 4, null, 'utf-8');
    }

    return $url;
}


/**
 * 生成插件url地址
 * @param string $plugins_name [应用名称]
 * @param string $plugins_control [应用控制器]
 * @param string $plugins_action [应用方法]
 * @param array $params [参数]
 * @author   ONE
 * @version 1.0.0
 * @date    2018-06-12
 * @desc    description
 */
function PluginsUrl($plugins_name, $plugins_control, $plugins_action, $params = [])
{
		$admin=session('admin');
		if($admin){
	    //后台进入
			$url = PluginsAdminUrl($plugins_name, $plugins_control, $plugins_action, $params);
		} else {
			//前台进入
			$url = PluginsIndexUrl($plugins_name, $plugins_control, $plugins_action, $params);
		}
    return $url;
}

/**
 * 生成url地址 - 应用后端
 * @param string $plugins_name [应用名称]
 * @param string $plugins_control [应用控制器]
 * @param string $plugins_action [应用方法]
 * @param array $params [参数]
 * @author   ONE
 * @version 1.0.0
 * @date    2018-06-12
 * @desc    description
 */
function PluginsAdminUrl($plugins_name, $plugins_control, $plugins_action, $params = [])
{
    $plugins = [
        'pluginsname' => $plugins_name,
        'pluginscontrol' => $plugins_control,
        'pluginsaction' => $plugins_action,
    ];
    $url = url('admin/plugins/index', $plugins + $params, true, true);

    // 是否根目录访问项目
    if (defined('IS_ROOT_ACCESS')) {
        $url = str_replace('public/', '', $url);
    }

    // tp框架url方法是否识别到https
    if (__MY_HTTP__ == 'https' && substr($url, 0, 5) != 'https') {
        $url = 'https' . mb_substr($url, 4, null, 'utf-8');
    }

    return $url;
}

/**
 * 生成url地址 - 应用前端
 * @param string $plugins_name [应用名称]
 * @param string $plugins_control [应用控制器]
 * @param string $plugins_action [应用方法]
 * @param array $params [参数]
 * @author   ONE
 * @version 1.0.0
 * @date    2019-5-17 15:48:12
 * @desc    description
 */
function PluginsIndexUrl($plugins_name, $plugins_control, $plugins_action, $params = [])
{
    $plugins = [
        'pluginsname' => $plugins_name,
        'pluginscontrol' => $plugins_control,
        'pluginsaction' => $plugins_action,
    ];
    $url = url('index/plugins/index', $plugins + $params, true, true);

    // 是否根目录访问项目
    if (defined('IS_ROOT_ACCESS')) {
        $url = str_replace('public/', '', $url);
    }

    // tp框架url方法是否识别到https
    if (__MY_HTTP__ == 'https' && substr($url, 0, 5) != 'https') {
        $url = 'https' . mb_substr($url, 4, null, 'utf-8');
    }

    return $url;
}

/**
 * [PriceBeautify 金额美化]
 * @param    [float]                  $price   [金额]
 * @param    [mixed]                  $default [默认值]
 * @author   ONE
 * @version  1.0.0
 * @datetime 2018-04-12T16:54:51+0800
 */
function PriceBeautify($price = 0, $default = null)
{
    if (empty($price)) {
        return $default;
    }

    $price = str_replace('.00', '', $price);
    if (strpos($price, '.') !== false) {
        if (substr($price, -1) == 0) {
            $price = substr($price, 0, -1);
        }
    }
    return $price;
}

/**
 * [FileUploadError 文件上传错误校验]
 * @param    [string]     $name [表单name]
 * @param    [int]        $index[多文件索引]
 * @return   [mixed]            [true | 错误信息]
 * @version  0.0.1
 * @datetime 2017-04-12T17:21:51+0800
 * @author   ONE
 */
function FileUploadError($name, $index = false)
{
    // 是否存在该name表单
    if ($index === false) {
        if (empty($_FILES[$name])) {
            return '请选择需要上传的文件';
        }
    } else {
        if (empty($_FILES[$name]['name'][$index])) {
            return '请选择需要上传的文件';
        }
    }

    // 是否正常
    $error = null;
    if ($index === false) {
        if ($_FILES[$name]['error'] == 0) {
            return true;
        }
        $error = $_FILES[$name]['error'];
    } else {
        if ($_FILES[$name]['error'][$index] == 0) {
            return true;
        }
        $error = $_FILES[$name]['error'][$index];
    }

    // 错误码对应的错误信息
    $file_error_list = lang('common_file_upload_error_list');
    if (isset($file_error_list[$error])) {
        return $file_error_list[$error];
    }
    return '未知错误' . '[file error ' . $error . ']';
}

/**
 * @decription layui 数据格式化返回函数
 * @param string $msg 信息
 * @param $code 状态码
 * @param int $count 总页数
 * @param array $data 数据
 */
function LayuiDataReturn($msg = '', $code, $data = '', $count = 0, $keywords = '')
{
	if($msg=='' && $code != 200) $msg = '内部错误';
    $Data = [
        'msg' => $msg,
        'code' => $code,
        'data' => $data,
        'count' => $count,
        'keywords' => $keywords
    ];
    return $Data;
}

/**
 * [LangValueKeyFlip 公共数据翻转]
 * @param    [array]       $data        [需要翻转的数据]
 * @param    [mixed]       $default     [默认值]
 * @param    [string]      $value_field [value值字段名称]
 * @param    [string]      $name_field  [name值字段名称]
 * @return   [array]                    [翻转后的数据]
 * @version  0.0.1
 * @datetime 2017-04-07T11:32:02+0800
 * @author   ONE
 */
function LangValueKeyFlip($data, $default = false, $value_field = 'id', $name_field = 'name')
{
    $result = array();
    if (!empty($data) && is_array($data)) {
        foreach ($data as $k => $v) {
            $result[$v[$name_field]] = $v[$value_field];
            if (isset($v['checked']) && $v['checked'] == true) {
                $result['default'] = $v[$value_field];
            }
        }
    }
    if ($default !== false) {
        $result['default'] = $default;
    }
    return $result;
}

/**
 * [ScienceNumToString 科学数字转换成原始的数字]
 * @param    [int]   $num [科学数字]
 * @return   [string]     [数据原始的值]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2017-04-06T17:21:51+0800
 */
function ScienceNumToString($num)
{
    if (stripos($num, 'e') === false) return $num;

    // 出现科学计数法，还原成字符串 
    $num = trim(preg_replace('/[=\'"]/', '', $num, 1), '"');
    $result = '';
    while ($num > 0) {
        $v = $num - floor($num / 10) * 10;
        $num = floor($num / 10);
        $result = $v . $result;
    }
    return $result;
}

/**
 * [GetClientIP 客户端ip地址]
 * @param    [boolean]        $long [是否将ip转成整数]
 * @return   [string|int]           [ip地址|ip地址整数]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2017-02-09T12:53:13+0800
 */
function GetClientIP($long = false)
{
    $onlineip = '';
    if (getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
        $onlineip = getenv('HTTP_CLIENT_IP');
    } elseif (getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
        $onlineip = getenv('HTTP_X_FORWARDED_FOR');
    } elseif (getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
        $onlineip = getenv('REMOTE_ADDR');
    } elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
        $onlineip = $_SERVER['REMOTE_ADDR'];
    }
    if ($long) {
        $onlineip = sprintf("%u", ip2long($onlineip));
    }
    return $onlineip;
}

/**
 * [UrlParamJoin url参数拼接]
 * @param    [array]      $param [url参数一维数组]
 * @return   [string]            [url参数字符串]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2017-01-09T23:33:44+0800
 */
function UrlParamJoin($param)
{
    $string = '';
    if (!empty($param) && is_array($param)) {
        foreach ($param as $k => $v) {
            if (is_string($v)) {
                $string .= $k . '=' . $v . '&';
            }
        }
        if (!empty($string)) {
            $url_model = config('URL_MODEL');
            $join_tag = ($url_model == 0 || $url_model == 3) ? '&' : '?';
            $string = $join_tag . substr($string, 0, -1);
        }
    }
    return $string;
}

/**
 * [MyC 读取站点配置信息]
 * @param    [string]    $key           [索引名称]
 * @param    [mixed]     $default       [默认值]
 * @param    [boolean]   $mandatory     [是否强制校验值,默认false]
 * @return   [mixed]                    [配置信息值,没找到返回null]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-29T17:17:25+0800
 */
function MyC($key, $default = null, $mandatory = false)
{
//  $data = cache(config('onecms.cache_common_my_config_key'));
    $data = config('onecms.cache_common_my_config_key');
    if ($mandatory === true) {
        return empty($data[$key]) ? $default : $data[$key];
    }
    return isset($data[$key]) ? $data[$key] : $default;
}

/**
 * [EmptyDir 清空目录下所有文件]
 * @param    [string]    $dir_path [目录地址]
 * @return   [boolean]             [成功true, 失败false]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-21T19:25:57+0800
 */
function EmptyDir($dir_path)
{
    if (is_dir($dir_path)) {
        $dn = @opendir($dir_path);
        if ($dn !== false) {
            while (false !== ($file = readdir($dn))) {
                if ($file != '.' && $file != '..') {
                    if (!unlink($dir_path . $file)) {
                        return false;
                    }
                }
            }
        } else {
            return false;
        }
    }
    return true;
}

/**
 * [Utf8Strlen 计算符串长度（中英文一致）]
 * @param    [string]      $string [需要计算的字符串]
 * @return   [int]                 [字符长度]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-13T21:34:09+0800
 */
function Utf8Strlen($string = null)
{
    preg_match_all("/./us", $string, $match);
    return count($match[0]);
}

/**
 * [IsMobile 是否是手机访问]
 * @return  [boolean] [手机访问true, 则false]
 * @version  0.0.1
 * @datetime 2016-12-05T10:52:20+0800
 * @author   ONE
 */
function IsMobile()
{
    /* 如果有HTTP_X_WAP_PROFILE则一定是移动设备 */
    if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) return true;

    /* 此条摘自TPM智能切换模板引擎，适合TPM开发 */
    if (isset($_SERVER['HTTP_CLIENT']) && 'PhoneClient' == $_SERVER['HTTP_CLIENT']) return true;

    /* 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息 */
    if (isset($_SERVER['HTTP_VIA']) && stristr($_SERVER['HTTP_VIA'], 'wap') !== false) return true;

    /* 判断手机发送的客户端标志,兼容性有待提高 */
    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array(
            'nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-', 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipad', 'ipod', 'blackberry', 'meizu', 'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile'
        );
        /* 从HTTP_USER_AGENT中查找手机浏览器的关键字 */
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return true;
        }
    }

    /* 协议法，因为有可能不准确，放到最后判断 */
    if (isset($_SERVER['HTTP_ACCEPT'])) {
        /* 如果只支持wml并且不支持html那一定是移动设备 */
        /* 如果支持wml和html但是wml在html之前则是移动设备 */
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) return true;
    }
    return false;
}


/**
 * [Is_Json 校验json数据是否合法]
 * @param    [string] $jsonstr [需要校验的json字符串]
 * @return   [boolean] [合法true, 则false]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 */
function Is_Json($jsonstr)
{
    if (PHP_VERSION > 5.3) {
        json_decode($jsonstr);
        return (json_last_error() == JSON_ERROR_NONE);
    } else {
        return is_null(json_decode($jsonstr)) ? false : true;
    }
}

/**
 * [Curl_Get curl模拟post]
 * @param    [string] $url  [请求地址]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 */
function Curl_Get($url)
{
    $ch = curl_init();
    //设置选项，包括URL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//绕过ssl验证
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    //执行并获取HTML文档内容
    $output = curl_exec($ch);
    //释放curl句柄
    curl_close($ch);
    return $output;
}

/**
 * [Curl_Post curl模拟post]
 * @param    [string] $url  [请求地址]
 * @param    [array]  $post [发送的post数据]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 */
function Curl_Post($url, $post)
{
    $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $post,
    );

    $ch = curl_init($url);
    curl_setopt_array($ch, $options);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

/**
 * [Fsockopen_Post fsockopen方式]
 * @param    [string] $url  [url地址]
 * @param    [string] $data [发送参数]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 */
function Fsockopen_Post($url, $data = '')
{
    $row = parse_MyUrl($url);
    $host = $row['host'];
    $port = isset($row['port']) ? $row['port'] : 80;
    $file = $row['path'];
    $post = '';
    while (list($k, $v) = FunEach($data)) {
        if (isset($k) && isset($v)) $post .= rawurlencode($k) . "=" . rawurlencode($v) . "&"; //转URL标准码
    }
    $post = substr($post, 0, -1);
    $len = strlen($post);
    $fp = @fsockopen($host, $port, $errno, $errstr, 10);
    if (!$fp) {
        return "$errstr ($errno)\n";
    } else {
        $receive = '';
        $out = "POST $file HTTP/1.0\r\n";
        $out .= "Host: $host\r\n";
        $out .= "Content-type: application/x-www-form-urlencoded\r\n";
        $out .= "Connection: Close\r\n";
        $out .= "Content-Length: $len\r\n\r\n";
        $out .= $post;
        fwrite($fp, $out);
        while (!feof($fp)) {
            $receive .= fgets($fp, 128);
        }
        fclose($fp);
        $receive = explode("\r\n\r\n", $receive);
        unset($receive[0]);
        return implode("", $receive);
    }
}

/**
 * [Xml_Array xml转数组]
 * @param    [xml] $xmlstring [xml数据]
 * @return   [array]          [array数组]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 */
function Xml_Array($xmlstring)
{
    return json_decode(json_encode((array)simplexml_load_string($xmlstring)), true);
}


/**
 * [CheckMobile 手机号码格式校验]
 * @param    [int] $mobile [手机号码]
 * @return   [boolean]     [正确true，失败false]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 */
function CheckMobile($mobile)
{
    return (preg_match('/' . lang('common_regex_mobile') . '/', $mobile) == 1) ? true : false;
}

/**
 * [CheckTel 电话号码格式校验]
 * @param    [string] $tel    [电话号码]
 * @return   [boolean]        [正确true，失败false]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 */
function CheckTel($tel)
{
    return (preg_match('/' . lang('common_regex_tel') . '/', $tel) == 1) ? true : false;
}

/**
 * [CheckEmail 电子邮箱格式校验]
 * @param    [string] $email  [电子邮箱]
 * @return   [boolean]        [正确true，失败false]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 */
function CheckEmail($email)
{
    return (preg_match('/' . lang('common_regex_email') . '/', $email) == 1) ? true : false;
}

/**
 * [CheckIdCard 身份证号码格式校验]
 * @param    [string] $number [身份证号码]
 * @return   [boolean]        [正确true，失败false]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 */
function CheckIdCard($number)
{
    return (preg_match('/' . lang('common_regex_id_card') . '/', $number) == 1) ? true : false;
}

/**
 * [CheckPrice 价格格式校验]
 * @param    [float]  $price  [价格]
 * @return   [boolean]        [正确true，失败false]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 */
function CheckPrice($price)
{
    return (preg_match('/' . lang('common_regex_price') . '/', $price) == 1) ? true : false;
}


/**
 * [CheckIp ip校验]
 * @param    [string] $ip [ip]
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 * @author   ONE
 */
function CheckIp($ip)
{
    return (preg_match('/' . lang('common_regex_ip') . '/', $ip) == 1) ? true : false;
}

/**
 * [CheckUrl url校验]
 * @param    [string] $url [url地址]
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 * @author   ONE
 */
function CheckUrl($url)
{
    return (preg_match('/' . lang('common_regex_url') . '/', $url) == 1) ? true : false;
}

/**
 * [CheckUserName 用户名校验]
 * @param    [string] $string [用户名]
 * @return   [boolean]        [成功true, 失败false]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 */
function CheckUserName($string)
{
    return (preg_match('/' . lang('common_regex_username') . '/', $string) == 1) ? true : false;
}

/**
 * [CheckSort 排序值校验]
 * @param    [int] $value  [数据值]
 * @return   [boolean]     [成功true, 失败false]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 */
function CheckSort($value)
{
    $temp = intval($value);
    return ($temp >= 0 && $temp <= 255);
}

/**
 * [CheckColor 颜色值校验]
 * @param    [string] $value [数据值]
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 * @author   ONE
 */
function CheckColor($value)
{
    return (preg_match('/' . lang('common_regex_color') . '/', $value) == 1) ? true : false;
}

/**
 * [CheckLoginPwd 密码格式校验]
 * @param    [string] $string [登录密码]
 * @return   [boolean]        [正确true, 错误false]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 */
function CheckLoginPwd($string)
{
    return (preg_match('/' . lang('common_regex_pwd') . '/', $string) == 1) ? true : false;
}

/**
 * [IsExistRemoteImage 检测一张网络图片是否存在]
 * @param    [string] $url [图片地址]
 * @return   [boolean]     [存在true, 则false]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 */
function IsExistRemoteImage($url)
{
    if (!empty($url)) {
        $content = get_headers($url, 1);
        if (!empty($content[0])) {
            return preg_match('/200/', $content[0]);
        }
    }
    return false;
}

/**
 * [GetNumberCode 随机数生成生成]
 * @param    [int] $length [生成位数]
 * @return   [int]         [生成的随机数]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 */
function GetNumberCode($length = 6)
{
    $code = '';
    for ($i = 0; $i < intval($length); $i++) $code .= rand(0, 9);
    return $code;
}

/**
 * [LoginPwdEncryption 登录密码加密]
 * @param    [string] $pwd  [需要加密的密码]
 * @param    [string] $salt [配合密码加密的随机数]
 * @return   [string]       [加密后的密码]
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 * @author   ONE
 */
function LoginPwdEncryption($pwd, $salt)
{
    return md5($salt . trim($pwd));
}

/**
 * [PwdPayEncryption 支付密码加密]
 * @param    [string] $pwd  [需要加密的密码]
 * @param    [string] $salt [配合密码加密的随机数]
 * @return   [string]       [加密后的密码]
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 * @author   ONE
 */
function PwdPayEncryption($pwd, $salt)
{
    return md5(md5(trim($pwd) . $salt));
}

/**
 * @param    [string] $pwd [需要校验的密码]
 * @return   [int]         [密码强度值0~10]
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 * [PwdStrength 密码强度校验]
 */
function PwdStrength($pwd)
{
    $score = 0;
    if (preg_match("/[0-9]+/", $pwd)) $score++;
    if (preg_match("/[0-9]{3,}/", $pwd)) $score++;
    if (preg_match("/[a-z]+/", $pwd)) $score++;
    if (preg_match("/[a-z]{3,}/", $pwd)) $score++;
    if (preg_match("/[A-Z]+/", $pwd)) $score++;
    if (preg_match("/[A-Z]{3,}/", $pwd)) $score++;
    if (preg_match("/[_|\-|+|=|*|!|@|#|$|%|^|&|(|)]+/", $pwd)) $score += 2;
    if (preg_match("/[_|\-|+|=|*|!|@|#|$|%|^|&|(|)]{3,}/", $pwd)) $score++;
    if (strlen($pwd) >= 10) $score++;
    return $score;
}

/**
 * @author   ONE
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 *  $lng = '116.655540';
 *  $lat = '39.910980';
 *  $squares = returnSquarePoint($lng, $lat);
 *
 *  print_r($squares);
 *  $info_sql = "select id,locateinfo,lat,lng from `lbs_info` where lat<>0 and lat>{$squares['right-bottom']['lat']} and lat<{$squares['left-top']['lat']} and lng>{$squares['left-top']['lng']} and lng<{$squares['right-bottom']['lng']} ";
 *  计算某个经纬度的周围某段距离的正方形的四个点
 *
 *  param lng float 经度
 *  param lat float 纬度
 *  param Distance float 该点所在圆的半径，该圆与此正方形内切，默认值为0.5千米
 *  return array 正方形的四个点的经纬度坐标
 */
function ReturnSquarePoint($lng, $lat, $Distance = 1.2)
{
    /* 地球半径，平均半径为6371km */
    $Radius = 6371;

    $d_lng = 2 * asin(sin($Distance / (2 * $Radius)) / cos(deg2rad($lat)));
    $d_lng = rad2deg($d_lng);

    $d_lat = $Distance / $Radius;
    $d_lat = rad2deg($d_lat);

    return array(
        'left-top' => array('lat' => $lat + $d_lat, 'lng' => $lng - $d_lng),
        'right-top' => array('lat' => $lat + $d_lat, 'lng' => $lng + $d_lng),
        'left-bottom' => array('lat' => $lat - $d_lat, 'lng' => $lng - $d_lng),
        'right-bottom' => array('lat' => $lat - $d_lat, 'lng' => $lng + $d_lng)
    );
}

/**
 * [Authcode 明文或密文]
 * @param    [string]  $string    [明文或密文]
 * @param    [string]  $operation [加密ENCODE, 解密DECODE]
 * @param    [string]  $key       [密钥]
 * @param    [integer] $expiry    [密钥有效期]
 * @return   [string]             [加密或解密后的数据]
 * @version  0.0.1
 * @datetime 2016-12-03T21:58:54+0800
 * @author   ONE
 */
function Authcode($string, $operation = 'DECODE', $key = '', $expiry = 0)
{
    // 动态密匙长度，相同的明文会生成不同密文就是依靠动态密匙
    // 加入随机密钥，可以令密文无任何规律，即便是原文和密钥完全相同，加密结果也会每次不同，增大破解难度。
    // 取值越大，密文变动规律越大，密文变化 = 16 的 $ckey_length 次方
    // 当此值为 0 时，则不产生随机密钥
    $ckey_length = 4;

    // 密匙
    // $GLOBALS['discuz_auth_key'] 这里可以根据自己的需要修改
    $key = md5($key ? $key : 'devil');

    // 密匙a会参与加解密
    $keya = md5(substr($key, 0, 16));
    // 密匙b会用来做数据完整性验证
    $keyb = md5(substr($key, 16, 16));
    // 密匙c用于变化生成的密文
    $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length) : substr(md5(microtime()), -$ckey_length)) : '';
    // 参与运算的密匙
    $cryptkey = $keya . md5($keya . $keyc);
    $key_length = strlen($cryptkey);
    // 明文，前10位用来保存时间戳，解密时验证数据有效性，10到26位用来保存$keyb(密匙b)，解密时会通过这个密匙验证数据完整性
    // 如果是解码的话，会从第$ckey_length位开始，因为密文前$ckey_length位保存 动态密匙，以保证解密正确
    $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0) . substr(md5($string . $keyb), 0, 16) . $string;
    $string_length = strlen($string);
    $result = '';
    $box = range(0, 255);
    $rndkey = array();
    // 产生密匙簿
    for ($i = 0; $i <= 255; $i++) {
        $rndkey[$i] = ord($cryptkey[$i % $key_length]);
    }
    // 用固定的算法，打乱密匙簿，增加随机性，好像很复杂，实际上并不会增加密文的强度
    for ($j = $i = 0; $i < 256; $i++) {
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;
        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }
    // 核心加解密部分
    for ($a = $j = $i = 0; $i < $string_length; $i++) {
        $a = ($a + 1) % 256;
        $j = ($j + $box[$a]) % 256;
        $tmp = $box[$a];
        $box[$a] = $box[$j];
        $box[$j] = $tmp;
        // 从密匙簿得出密匙进行异或，再转成字符
        $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
    }
    if ($operation == 'DECODE') {
        // substr($result, 0, 10) == 0 验证数据有效性
        // substr($result, 0, 10) - time() > 0 验证数据有效性
        // substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16) 验证数据完整性
        // 验证数据有效性，请看未加密明文的格式
        if ((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26) . $keyb), 0, 16)) {
            return substr($result, 26);
        } else {
            return '';
        }
    } else {
        // 把动态密匙保存在密文里，这也是为什么同样的明文，生产不同密文后能解密的原因
        // 因为加密后的密文可能是一些特殊字符，复制过程可能会丢失，所以用base64编码
        return $keyc . str_replace('=', '', base64_encode($result));
    }
}

/**
 * [SS 设置缓存]
 * @param    [string]              $key  [缓存key]
 * @param    [mixed]               $data [需要存储的数据]
 * @return   [boolean]                   [成功true, 失败false]
 * @version  1.0.0
 * @datetime 2017-09-24T19:01:00+0800
 * @author   ONE
 */
function SS($key, $data)
{
    if (empty($key) || empty($data)) {
        return false;
    }

    $data['cache_time'] = time();
    return cache($key, $data);
}

/**
 * [GS 获取缓存]
 * @param    [string]          $key             [缓存key]
 * @param    [integer]         $expires_time    [默认过期时间0长期有效（单位秒）]
 * @param    [boolean]         $is_filem_time   [是否返回文件上一次更新时间]
 * @return   [boolean|mixed]                    [没数据false, 则数据]
 * @author   ONE
 * @version  1.0.0
 * @datetime 2017-09-24T18:54:54+0800
 */
function GS($key, $expires_time = 0, $is_filem_time = false)
{
    if (empty($key)) {
        return false;
    }
    $data = cache($key);
    if ($data !== null) {
        $expires_time = intval($expires_time);
        if ($expires_time > 0) {
            if ($data['cache_time'] + $expires_time < time()) {
                return false;
            }
        }
        return $data;
    }
    return false;
}

/**
 * [DS 删除缓存]
 * @param    [string]              $key  [缓存key]
 * @return   [boolean]                   [成功true, 失败false]
 * @author   ONE
 * @version  1.0.0
 * @datetime 2017-09-24T19:01:00+0800
 */
function DS($key)
{
    return cache($key, null);
}

/**
 * [ParamsChecked 参数校验方法]
 * @param    [array]                   $data   [原始数据]
 * @param    [array]                   $params [校验数据]
 * @return   [boolean|string]                  [成功true, 失败 错误信息]
 * @version  1.0.0
 * @datetime 2017-12-12T15:26:13+0800
 * @author   ONE
 */
function ParamsChecked($data, $params)
{
    if (empty($params) || !is_array($data) || !is_array($params)) {
        return '内部调用参数配置有误';
    }

    foreach ($params as $v) {
        if (empty($v['key_name']) || empty($v['error_msg'])) {
            return '内部调用参数配置有误';
        }

        // 是否需要验证
        $is_checked = true;

        // 数据或字段存在则验证
        // 1 数据存在则验证
        // 2 字段存在则验证
        if (isset($v['is_checked'])) {
            if ($v['is_checked'] == 1) {
                if (empty($data[$v['key_name']])) {
                    $is_checked = false;
                }
            } else if ($v['is_checked'] == 2) {
                if (!isset($data[$v['key_name']])) {
                    $is_checked = false;
                }
            }
        }

        // 是否需要验证
        if ($is_checked === false) {
            continue;
        }

        // 验证规则，默认isset
        $checked_type = isset($v['checked_type']) ? $v['checked_type'] : 'isset';
        switch ($checked_type) {
            // 是否存在
            case 'isset' :
                if (!isset($data[$v['key_name']])) {
                    return $v['error_msg'];
                }
                break;

            // 是否为空
            case 'empty' :
                if (empty($data[$v['key_name']])) {
                    return $v['error_msg'];
                }
                break;

            // 是否存在于验证数组中
            case 'in' :
                if (empty($v['checked_data']) || !is_array($v['checked_data'])) {
                    return '内部调用参数配置有误';
                }
                if (!isset($data[$v['key_name']]) || !in_array($data[$v['key_name']], $v['checked_data'])) {
                    return $v['error_msg'];
                }
                break;

            // 是否为数组
            case 'is_array' :
                if (!isset($data[$v['key_name']]) || !is_array($data[$v['key_name']])) {
                    return $v['error_msg'];
                }
                break;

            // 长度
            case 'length' :
                if (!isset($v['checked_data'])) {
                    return '长度规则值未定义';
                }
                if (!is_string($v['checked_data'])) {
                    return '内部调用参数配置有误';
                }
                if (!isset($data[$v['key_name']])) {
                    return $v['error_msg'];
                }
                $length = mb_strlen($data[$v['key_name']], 'utf-8');
                $rule = explode(',', $v['checked_data']);
                if (count($rule) == 1) {
                    if ($length > intval($rule[0])) {
                        return $v['error_msg'];
                    }
                } else {
                    if ($length < intval($rule[0]) || $length > intval($rule[1])) {
                        return $v['error_msg'];
                    }
                }
                break;

            // 自定义函数
            case 'fun' :
                if (empty($v['checked_data']) || !function_exists($v['checked_data'])) {
                    return '验证函数为空或函数未定义';
                }
                $fun = $v['checked_data'];
                if (!$fun($data[$v['key_name']])) {
                    return $v['error_msg'];
                }
                break;

            // 最小
            case 'min' :
                if (!isset($v['checked_data'])) {
                    return '验证最小值未定义';
                }
                $fun = $v['checked_data'];
                if ($data[$v['key_name']] < $v['checked_data']) {
                    return $v['error_msg'];
                }
                break;

            // 最大
            case 'max' :
                if (!isset($v['checked_data'])) {
                    return '验证最大值未定义';
                }
                $fun = $v['checked_data'];
                if ($data[$v['key_name']] > $v['checked_data']) {
                    return $v['error_msg'];
                }
                break;
        }
    }
    return true;
}

function show_json($status = 1, $return = NULL)
{
    $ret = array('status' => $status, 'result' => array());

    if (!is_array($return)) {
        if ($return) {
            $ret['result']['message'] = $return;
        }

        exit(json_encode($ret));
    } else {
        $ret['result'] = $return;
    }
    exit(json_encode($ret));
}

/*
 * 移除插件所带的3个参数：$pluginsname,$pluginscontrol,$pluginsaction 返回剩余参数
 * @params		array		$data
 */
function removePluginsParams($data)
{
    $res = array_diff_key($data, ['pluginsaction' => '', 'pluginscontrol' => '', 'pluginsname' => '']);
    return $res;
}

/*
 * redis赋值，自动加上module与controller
 * @params 		string		$key		redis key
 * @params 		string		$val		redis value
 * @param 		string		$prefix		redis key prefix
 * @param		int			$expire		expire time
 */
function set_cache($key, $val, $expire = 0, $prefix = '')
{
    $cache = new Cache;
    //未提供keyprefix
    if (!$prefix) {
        //非插件
        if (!input('pluginsname')) {
            $cache->set(request()->module() . '_'  . $key, $val, $expire);
        } else {//插件
            $cache->set(input('pluginsname') . '_' . $key, $val, $expire);
        }
    } else {
        //有key prefix
        $cache->set($prefix . '_' . $key, $val, $expire);
    }
}

/*
 * redis取值，自动加上module与controller
 * @params 		string		$key		redis key
 * @param 		string		$prefix		redis key prefix
 */
function get_cache($key, $prefix = '')
{
    $cache = new Cache;
    //未提供keyprefix
    if (!$prefix) {
        //非插件
        if (!input('pluginsname')) {
            $res = $cache->get(request()->module() . '_' .  $key);
        } else {//插件
            $res = $cache->get(input('pluginsname') . '_' . $key);
        }
    } else {
        //有key prefix
        $res = $cache->get($prefix . '_' . $key);
    }
    return $res;
}

/*
 * redis值判断，自动加上module与controller
 * @params 		string		$key		redis key
 * @param 		string		$prefix		redis key prefix
 */
function has_cache($key, $prefix = '')
{
    $cache = new Cache;
    //未提供keyprefix
    if (!$prefix) {
        //非插件
        if (!input('pluginsname')) {
//          $res = $cache->has(request()->module() . '_' . request()->controller() . '_' . $key);
            $res = $cache->has(request()->module() . '_' . $key);
        } else {//插件
//          $res = $cache->has(input('pluginsname') . '_' . input('pluginscontrol') . '_' . $key);
            $res = $cache->has(input('pluginsname') . '_' . $key);
        }
    } else {
        //有key prefix
        $res = $cache->has($prefix . '_' . $key);
    }
    return $res;
}


/*
 * redis值删除，自动加上module与controller
 * @params 		string		$key		redis key
 * @param 		string		$prefix		redis key prefix
 */
function rm_cache($key, $prefix = '')
{
    $cache = new Cache;
    //未提供keyprefix
    if (!$prefix) {
        //非插件
        if (!input('pluginsname')) {
            $res = $cache->rm(request()->module() . '_' . $key);
        } else {//插件
            $res = $cache->rm(input('pluginsname') . '_' . $key);
        }
    } else {
        //有key prefix
        $res = $cache->rm($prefix . '_' . $key);
    }
}

/*
 * 重构传入参数，去除首尾空格及空值项, 供查询条件使用
 * @author		Deng Zhimin		@20190517:094800
 * @param		array		$params			传入参数, 必须是一维参数
 */
function wherify_params($params)
{
    $res = [];
    if (isset($params['s'])) {
        unset($params['s']);
    }        // 移除可能的's'值
    if (isset($params['_'])) {
        unset($params['_']);
    }        // 移除可能的'_'值
    $url = request()->baseUrl();
		$url = str_replace('.','_',$url);  	//.html -> _html
		if(isset($params[$url])) unset($params[$url]);
    
    foreach ($params as $k => $v) {
        if(is_string($v))
        {
        	$v = trim($v);
        }
        if ($v != '') {
            $res[$k] = $v;
        }
    }
//		if(count($res)==0)
//		{
//			$res = 1;
//		}
    return $res;
}

/**
 * 求两个已知经纬度之间的距离,单位为米
 *
 * @param lng1 $ ,lng2 经度
 * @param lat1 $ ,lat2 纬度
 * @const 6378.137    地球半径
 * @return float 距离，单位米
 * @author www.Alixixi.com
 */
function get_distance($lng1, $lat1, $lng2, $lat2)
{
    // 将角度转为狐度
    $radLat1 = deg2rad($lat1); //deg2rad()函数将角度转换为弧度
    $radLat2 = deg2rad($lat2);
    $radLng1 = deg2rad($lng1);
    $radLng2 = deg2rad($lng2);
    $a = $radLat1 - $radLat2;
    $b = $radLng1 - $radLng2;
    $s = 2 * asin(sqrt(pow(sin($a / 2), 2) + cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2))) * 6378.137 * 1000;
    return $s;
}

	
	/*
	 * 去除参数首尾空格
	 * @params		array		$params			待处理参数数组
	 */
	function trim_params($params)
	{
		$res = [];
		foreach($params as $k => $v)
		{
			if(is_string($v))
			{
				$res[$k] = trim($v);
			} else {
				$res[$k] = $v;
			}
		}
		return $res;
	}


    if (!function_exists('p'))
    {
        function p($name = '')
        {
            static $_plugins = array();
            if (isset($_plugins[$name]))
            {
                return $_plugins[$name];
            }
            $model = XINCMS_PLUGIN . strtolower($name) . '/controller/Model.php';
            if (!is_file($model))
            {
                return false;
            }
            require_once $model;

            $class_name = ucfirst($name) . 'Model';
            return DataReturn('操作成功', 0, $class_name);
            $_plugins[$name] = new $class_name();
//            if (com_run('perm::check_plugin', $name))
//            {
//                return $_plugins[$name];
//            }

            return $_plugins[$name];
        }
    }


    /**
     * GET方式的请求
     * @param string $url 请求的链接
     * @param int $timeoutMs 超时设置，单位：毫秒
     * @return string 接口返回的内容，超时返回false
     */

    function WebGet($url, $timeoutMs = 3000, $token = '')
    {
        return web_request($url, FALSE, $timeoutMs,$token);
    }

    /**
     * POST方式的请求
     * @param string $url 请求的链接
     * @param array $data POST的数据
     * @param int $timeoutMs 超时设置，单位：毫秒
     * @return string 接口返回的内容，超时返回false
     */
    function WebPOST($url, $data, $timeoutMs = 3000, $token = '') {
        return web_request($url, $data, $timeoutMs,$token);
    }

    /**
     * 统一接口请求
     * @param string $url 请求的链接
     * @param array $data POST的数据
     * @param int $timeoutMs 超时设置，单位：毫秒
     * @return string 接口返回的内容，超时返回false
     */
    function web_request($url, $data, $timeoutMs = 3000, $token = '') {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, $timeoutMs);
        if($token){
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Authorization: Bearer '.$token,
                    'Content-Type: application/json')
            );
        }
        if (!empty($data)) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        $curRetryTimes = 10;
        do {
            $rs = curl_exec($ch);
            $curRetryTimes--;
        } while($rs === FALSE && $curRetryTimes >= 0);
        curl_close($ch);
        return $rs;
    }


    function userTextEncode($str){
        if(!is_string($str))return $str;
        if(!$str || $str=='undefined')return '';

        $text = json_encode($str); //暴露出unicode
        $text = preg_replace_callback("/(\\\u[ed][0-9a-f]{3})/i",function($str){
            return addslashes($str[0]);
        },$text); //将emoji的unicode留下，其他不动，这里的正则比原答案增加了d，因为我发现我很多emoji实际上是\ud开头的，反而暂时没发现有\ue开头。
        return json_decode($text);
    }

    function userTextDecode($str){
        $text = json_encode($str); //暴露出unicode
        $text = preg_replace_callback('/\\\\\\\\/i',function($str){
            return '\\';
        },$text); //将两条斜杠变成一条，其他不动
        return json_decode($text);
    }

    function randomZz($length, $numeric = FALSE) {
        PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
        if($numeric) {
            $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
        } else {
            $hash = '';
            $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; //abcdefghijklmnopqrstuvwxyz
            $max = strlen($chars) - 1;
            for($i = 0; $i < $length; $i++) {
                $hash .= $chars[mt_rand(0, $max)];
            }
        }
        return $hash;
    }


    function getZhiboUrl($streamId, $txTime=365){
        $t_bizid = '36270';
        $t_key = '8a7597b20125f73b9a1fe87f2f64d203';
        $streamId = strtolower($streamId.random(8));
        $bizId = $t_bizid;
        $key = $t_key;
        $time = time()+24*3600*$txTime;
        $livecode = $bizId."_".$streamId; //直播码
        if($key && $time){
            $txTime = strtoupper(base_convert($time,10,16));
            //txSecret = MD5( KEY + livecode + txTime )
            //livecode = bizid+"_"+stream_id  如 8888_test123456
            $livecode = $bizId."_".$streamId; //直播码
            $txSecret = md5($key.$livecode.$txTime);
            $ext_str = "?".http_build_query(array(
                    "bizid"=> $bizId,
                    "txSecret"=> $txSecret,
                    "txTime"=> $txTime
                ));
        }
        $url['push'] = $livecode;
        $url['play'] = array(
            "rtmp://live.res.5wajin.com/live/".$livecode,
            "http://live.res.5wajin.com/live/".$livecode.".flv",
            "http://live.res.5wajin.com/live/".$livecode.".m3u8"
        );
        return $url;
    }

    function getPushUrl($livecode,$txTime){
        $t_bizid = '36270';
        $t_key = '8a7597b20125f73b9a1fe87f2f64d203';

        $bizId = $t_bizid;
        $key = $t_key;
        $time = time()+24*3600*$txTime;
        if($key && $time){
            $txTime = strtoupper(base_convert($time,10,16));
            $txSecret = md5($key.$livecode.$txTime);
            $ext_str = "?".http_build_query(array(
                    "bizid"=> $bizId,
                    "txSecret"=> $txSecret,
                    "txTime"=> $txTime
                ));
        }
        $url['push'] = "rtmp://".$bizId.".livepush.myqcloud.com/live/".$livecode.(isset($ext_str) ? $ext_str : "");
        return $url;
    }

    function random($length, $numeric = FALSE) {
        $seed = base_convert(md5(microtime() . $_SERVER['DOCUMENT_ROOT']), 16, $numeric ? 10 : 35);
        $seed = $numeric ? (str_replace('0', '', $seed) . '012340567890') : ($seed . 'zZ' . strtoupper($seed));
        if ($numeric) {
            $hash = '';
        } else {
            $hash = chr(rand(1, 26) + rand(0, 1) * 32 + 64);
            $length--;
        }
        $max = strlen($seed) - 1;
        for ($i = 0; $i < $length; $i++) {
            $hash .= $seed{mt_rand(0, $max)};
        }
        return $hash;
    }

    function changetime($time){
        $timestr = '';
        $interval = time()-$time;
        if($interval<60){
            $timestr = '刚刚';
        }elseif($interval<60*60){
            $timestr = intval($interval/60).'分钟前';
        }elseif($interval<60*60*24){

            $timestr = intval($interval/60/60).'小时前';
        }else{
            $timestr = date('Y年m月d日',$time);
        }
        return $timestr;
    }


    function createNO($table, $field, $prefix)
    {
        $db = db();
        $billno = $prefix.date('YmdHis') . random(6, true);
        while (1)
        {
            $count = $db->query("select count(*) as count from " . $db->getTable($table) . " where " . $field . "= '$billno' limit 1");
            $count = isset($count[0]['count']) ? intval($count[0]['count']) : 0;
            if ($count <= 0)
            {
                break;
            }
            $billno = $prefix.date('YmdHis') . random(6, true);
        }
        return $billno;
    }


    function createRandom($table, $field, $length, $numeric=false)
    {
        $db = db();
        $billno = randomZz($length, $numeric);
        while (1)
        {
            $count = $db->query("select count(*) as count from " . $db->getTable($table) . " where " . $field . "= '$billno' limit 1");
            $count = isset($count[0]['count']) ? intval($count[0]['count']) : 0;
            if ($count <= 0)
            {
                break;
            }
            $billno = randomZz($length, $numeric);
        }
        return $billno;
    }

    function createQrcode($string, $type, $size=4)
    {
        $path = ROOT_PATH . 'upload/images/qrcode/'.$type.'/';
        if (!is_dir($path))
        {
            return FALSE;
        }
        $file = 'qrcode_' . md5($string) . '.png';
        $qrcode_file = $path . $file;
        if (!is_file($qrcode_file))
        {
            QRcode::png($string, $qrcode_file, QR_ECLEVEL_L, $size);
        }
        return '/upload//images/qrcode/'.$type.'/' . $file;
    }

	
?>
