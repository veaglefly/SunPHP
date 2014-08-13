<?php
/**
 * SunPHP For utf-8
 * This is an open-source software, follow the Apache License 2.0 (http://www.apache.org/licenses/LICENSE-2.0)
 * Copyright: Author All rights reserved.
 * @Author: Sun Qinye  sunqinye@gmail.com
 * @Github: https://github.com/sunqinye/SunPHP
 */
/**
 * SUN配置文件
 */
if(!defined('SUN_PATH')) exit('Access Denied');

$config = array(
	/*数据库配置*/
	'DB_TYPE' => 'mysql',			//数据库类型
	'DB_HOST' => 'localhost',		//服务器地址
	'DB_PORT' => '3306',			//端口
	'DB_USER' => 'root',			//用户名
	'DB_PASSWORD' => '',			//密码
	'DB_NAME' => 'sunphp',				//数据库名
	'DB_PREFIX' => 'sun_',			//表名前缀
	'DB_CHARSET' => 'utf8',			//字符集

	/*Cookie设置*/
	'COOKIE_PREFIX' => 'sun_',
	'COOKIE_PATH' => '/',
	'COOKIE_DOMAIN' => '',

	/*安全设置*/
	'SAFE_KEY' => 'sun',
);
?>