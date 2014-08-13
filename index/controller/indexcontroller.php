<?php
class IndexController extends Sun_Controller
{
	function index()
	{
		$this->display("index");
	}

	function upquestionnaire()
	{
		if (isset($_POST['submit'])) {
			$zongping = POST('zongping');
			$sifeng = POST('sifeng');
			$liyi = POST('liyi');
			$fazhan = POST('fazhan');
			$ip = getIP();
			$M = new Sun_Model;
			$M->table("questionnaire")->insert("(`zongping`,`sifeng`,`liyi`,`fazhan`,`ip`,`datetime`) VALUES('$zongping','$sifeng','$liyi','$fazhan','$ip',now())");
			Jump(SITE_PATH,"提交成功");
		} else {
			$this->_empty();
		}
	}
}
?>