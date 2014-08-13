<?php
/**
 * SunPHP For utf-8
 * This is an open-source software, follow the Apache License 2.0 (http://www.apache.org/licenses/LICENSE-2.0)
 * Copyright: Author All rights reserved.
 * @Author: Sun Qinye  sunqinye@gmail.com
 * @Github: https://github.com/sunqinye/SunPHP
 */
if(!defined('SUN_PATH')) exit('Access Denied');

class Sun_Controller
{
	function display($filename,$data = '')
	{
		require APP_PATH."template/".$filename.".php";
	}

	function _empty()
	{
		echo "您访问的网页不存在";
	}

	function _before() {}
	function _after() {}
}
?>