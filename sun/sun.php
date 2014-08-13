<?php
/**
 * SunPHP For utf-8
 * This is an open-source software, follow the Apache License 2.0 (http://www.apache.org/licenses/LICENSE-2.0)
 * Copyright: Author All rights reserved.
 * @Author: Sun Qinye  sunqinye@gmail.com
 * @Github: https://github.com/sunqinye/SunPHP
 * @Version: 0.9.0
 * @Date: 2013-11-28
 */
//设置默认值
defined('APP_NAME') or define("APP_NAME", "index");
defined('APP_PATH') or define("APP_PATH", "./index/");
defined('SITE_PATH') or define("SITE_PATH", "http://".$_SERVER['HTTP_HOST'].substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'],'/')+1));
defined('ENTER') or define("ENTER", basename($_SERVER['SCRIPT_NAME']));
defined('DEBUG') or define('DEBUG',false);
if (DEBUG) {	//调试模式
	error_reporting(E_ALL);
} else {
	error_reporting(0);
}
header("content-type:text/html; charset=utf-8");
define("SUN_PATH",dirname(__FILE__).'/');
require SUN_PATH."config/global.php";
require SUN_PATH."function/global.php";
require SUN_PATH."core/controller.php";
require SUN_PATH."core/model.php";
require SUN_PATH."core/edcrypt.php";
require SUN_PATH."core/empty.php";

if (!isset($_SERVER["PATH_INFO"])) {	//路由设置 -- 解析出c和a
	$c = isset($_GET['c']) ? GET('c') : "index";
	$a = isset($_GET['a']) ? GET('a') : "index";
} else {
	$_URL = explode('/', $_SERVER["PATH_INFO"]);
	$c = isset($_URL[1]) ? clean($_URL[1]) : "index";
	//第二个可能是参数而非方法，需要对其进行设置，详细设置未做
	if (isset($_URL[2]) && !empty($_URL[2])) {
		$a = is_numeric($_URL[2]) ? "index" : $_URL[2];
		if($a == 'd')
			$a = "index";
	}else{
		$a = "index";
	}
}	//路由设置END

if (file_exists($file_path = APP_PATH."common.php"))	//加载APP的common文件
	require $file_path;

function __autoload($class)		//自动加载类文件
{
	if (substr($class, -10) == "controller" && file_exists($file_path = APP_PATH."controller/".$class.".php"))
		require $file_path;
	if (substr($class, -5) == "model" && file_exists($file_path = APP_PATH."model/".$class.".php"))
		require $file_path;
}

if (class_exists($c = $c."controller")) {	//实例化模块及方法含空模块及操作
	$con = new $c;
	if (method_exists($con, $a)) {
		$con->_before();
		$con->$a();
		$con->_after();
	}
	else
		$con->_empty();
} else {
	$con = new Sun_Empty;
	$con->_empty();
}
?>