<?php
class LoginController extends Sun_Controller
{
	function index()
	{
		global $adminUid;
		if(empty($adminUid))
			$this->display("login");
		else
			Jump(SITE_PATH.ENTER);
	}

	function login()
	{
		if (isset($_POST['submit'])) {
			$account = POST('account');
			$password = POST('password');
			if(is_empty($account) || is_empty($password)){
				back('不能为空');
			}else{
				$M = new Sun_Model;
				$admin = $M->table("admin")->where("`account`='$account'")->selectone();
				if(empty($admin)){
					back('账户不存在');
				}else{
					global $config;
					$password = md5(md5(md5($password.$config['SAFE_KEY'])));
					if($password != $admin['password']){
						back('密码错误');
					}else{
						$ip = getIp();
						$M = new Sun_Model;
						$M->table("admin")->where("`aid`='$admin[aid]'")->update("`lastdatetime`=now(),`lastip`='$ip'");
						cookie('adminUid',$admin['aid'],10800);
						cookie('adminGid',$admin['gid'],10800);
						cookie('adminAccount',$admin['account'],10800);
						cookie('admin_key',$admin['aid'].$admin['gid'].$admin['account'],10800);
						Jump(SITE_PATH.ENTER);
					}
				}
			}
		} else {
			$this->_empty();
		}
	}

	function logout()
	{
		delcookie('adminUid');
		delcookie('adminGid');
		delcookie('adminAccount');
		delcookie('admin_key');
		Jump(SITE_PATH.ENTER);
	}
}
?>