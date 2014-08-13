<?php
class UserController extends Sun_Controller
{
	function index() {}

	function chanpw()
	{
		$this->display("common");
		$this->display("header");
		$this->display("chanpw");
		$this->display("footer");
	}

	function dochanpw()
	{
		if (isset($_POST['submit'])) {
			$oldpw = POST('oldpw');
			$newpw = POST('newpw');
			$newpw2 = POST('newpw2');
			if (is_empty($oldpw) || is_empty($newpw) || is_empty($newpw2)) {
				back("不能为空");
			} else if ($newpw != $newpw2) {
				back("两次密码不一致");
			} else {
				global $config, $adminUid;
				$M = new Sun_Model;
				$admin = $M->table("admin")->where("`aid` = '$adminUid'")->selectone();
				$oldpw = md5(md5(md5($oldpw.$config['SAFE_KEY'])));
				if ($oldpw != $admin['password']) {
					back("原密码错误");
				} else {
					$newpw = md5(md5(md5($newpw.$config['SAFE_KEY'])));
					$M->table("admin")->where("`aid`='$adminUid'")->update("`password`='$newpw'");
					Jump(SITE_PATH.ENTER."/user/chanpw","修改成功");
				}
			}
		}
	}
}
?>