<?php
/**
 * SunPHP For utf-8
 * This is an open-source software, follow the Apache License 2.0 (http://www.apache.org/licenses/LICENSE-2.0)
 * Copyright: Author All rights reserved.
 * @Author: Sun Qinye  sunqinye@gmail.com
 * @Github: https://github.com/sunqinye/SunPHP
 */
if(!defined('SUN_PATH')) exit('Access Denied');

/*
 * 设置Cookie
 */
function cookie($name,$value,$expire=0)
{
	global $config;
	$path = $config['COOKIE_PATH'];
	$domain = $config['COOKIE_DOMAIN'];
	$prefix = $config['COOKIE_PREFIX'];
	$name = $prefix.$name;
	$ed = new Sun_EDcrypt($config['SAFE_KEY']);
	$value = $ed->encrypt($value);
	$name = base64_encode($name);
	$name = strtr($name,'=','H');
	setcookie($name,$value,time()+$expire,$path,$domain);
}

/*
 * 清除Cookie
 */
function delcookie($name)
{
	global $config;
	$path = $config['COOKIE_PATH'];
	$domain = $config['COOKIE_DOMAIN'];
	$prefix = $config['COOKIE_PREFIX'];
	$name = $prefix.$name;
	$name = base64_encode($name);
	$name = strtr($name,'=','H');
	setcookie($name,'',time()-1,$path,$domain);
}

/*
 * 获取Cookie值
 */
function getcookie($name)
{
	global $config;
	$prefix = $config['COOKIE_PREFIX'];
	$name = $prefix.$name;
	$name = base64_encode($name);
	$name = strtr($name,'=','H');
	$ed = new Sun_EDcrypt($config['SAFE_KEY']);
	if(isset($_COOKIE[$name])){
		$_COOKIE[$name] = $ed->decrypt($_COOKIE[$name]);
		return $_COOKIE[$name];
	}else{
		return false;
	}
}

/*
 * 检测Cookie是否存在
 */
function checkcookie($name)
{
	global $config;
	$prefix = $config['COOKIE_PREFIX'];
	$name = $prefix.$name;
	$name = base64_encode($name);
	$name = strtr($name,'=','H');
	if(isset($_COOKIE[$name])){
		return true;
	}else{
		return false;
	}
}

function is_empty($var)
{
	if (!isset($var) || empty($var)) {
		return true;
	} else {
		return false;
	}
}

/*
 * 字符串过滤
 */
function clean($string)
{
	if(is_array($string)){
		$newString = array();
		foreach($string as $key => $str){
			if(is_array($str)){
				$newString[$key] = clean($str);
			}else{
				if(!get_magic_quotes_gpc()){
					$newString[$key] = htmlspecialchars(addslashes($str));
				}else{
					$newString[$key] = htmlspecialchars($str);
				}
			}
		}
	}else{
		if(!get_magic_quotes_gpc()){
			$newString = htmlspecialchars(addslashes($string));
		}else{
			$newString = htmlspecialchars($string);
		}
	}
	return $newString;
}

/*
 * 字符串解过滤
 */
function declean($string)
{
	if(is_array($string)){
		$newString = array();
		foreach($string as $key => $str){
			if(is_array($str)){
				$newString[$key] = clean($str);
			}else{
				$newString[$key] = stripcslashes(htmlspecialchars_decode($str));
			}
		}
	}else{
		$newString = stripcslashes(htmlspecialchars_decode($string));
	}
	return $newString;
}
/*
 * 过滤后的$_GET
 */
function GET($para)
{
	return isset($_GET[$para]) ? clean($_GET[$para]) : false;
}
/*
 * 过滤后的$_POST
 */
function POST($para)
{
	return isset($_POST[$para]) ? clean($_POST[$para]) : false;
}

/*
 * 跳转
 */
function Jump($url, $alert = '')
{
	if($alert == ''){
		echo "<script type='text/javascript'>location='$url';</script>";
	}else{
		echo "<script type='text/javascript'>alert('$alert');location='$url';</script>";
	}
}

function back($alert = '')
{
	if($alert == ''){
		echo "<script>history.back();</script>";
	}else{
		echo "<script>alert('$alert');history.back();</script>";
	}
}

/*
 * 获取客户端IP
 */
function getIP()
{
    static $realip;
    if (isset($_SERVER)){
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $realip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $realip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")){
            $realip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {
            $realip = getenv("HTTP_CLIENT_IP");
        } else {
            $realip = getenv("REMOTE_ADDR");
        }
    }
    return $realip;
}

/*
 * 获取IP地理位置(淘宝IP接口)
 */
function getCity($ip)
{
	$url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
	$ip=json_decode(file_get_contents($url));
	if((string)$ip->code=='1'){
		return false;
	}
	$data = (array)$ip->data;
	return $data;
}

/*
 * 判断字符串编码是否为UTF8
 */
function is_utf8($string)
{ 
	if (preg_match("/^([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}/",$string) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}$/",$string) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){2,}/",$string) == true){ 
		return true; 
	}else{ 
		return false; 
	}
}
?>