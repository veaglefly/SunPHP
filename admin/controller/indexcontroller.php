<?php
class IndexController extends Sun_Controller
{
	function index()
	{
		$this->display("common");
		$this->display("header");
		$this->display("index");
		$this->display("footer");
	}
}
?>