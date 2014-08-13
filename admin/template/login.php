<!DOCTYPE HTML>
<html>
<head>
<title>Admin</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_PATH;?>admin/template/css/common.css">
<style>
body{background:url("<?php echo SITE_PATH;?>admin/template/image/bg_login.jpg");}
.login_main{width:250px; height:200px; margin-top:240px;}
.login_main_main{width:248px; height:88px; border:1px solid #333333; border-radius:5px; background:#ffffff; box-shadow: 3px 3px 3px #CCCCCC inset;}
.login_main_main ul{padding:5px;}
.login_main_main ul li{padding:3px;}
.login_main_main input{width:220px; height:30px; padding:2px; background:none; border:none; font-family: Arial,"Microsoft Yahei"; font-size:18px;}
.login_main_bottom{margin-top:15px;}
.login_main_submit{width:250px; height:38px; font-family:Arial,"Microsoft Yahei"; font-size:20px; color: #FFFFFF; background:url("<?php echo SITE_PATH;?>admin/template/image/bt_login.png") no-repeat #549FCC; border:1px solid #333333; border-radius:5px; cursor: pointer;}
.login_main_submit:hover{background-position:0 -40px;}
.login_main_submit:active{background-position:0 -80px;}
</style>
</head>
<body>
<div class="login_main center">
<form method="post" action="<?php echo SITE_PATH.ENTER;?>/login/login">
	<div class="login_main_main">
		<ul>
			<li style="border-bottom:1px solid #dddddd;"><input type="text" name="account" /></li>
			<li><input type="password" name="password" /></li>
		</ul>
	</div>
	<div class="login_main_bottom">
		<input type="submit" name="submit" class="login_main_submit" value="登陆" />
	</div>
</form>
</div>
</body>
</html>