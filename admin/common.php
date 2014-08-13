<?php
$adminUid = getcookie('adminUid');
$adminGid = getcookie('adminGid');
$adminAccount = getcookie('adminAccount');
$admin_key = getcookie('admin_key');
if($adminUid.$adminGid.$adminAccount != $admin_key){
	unset($adminUid,$adminGid,$adminAccount,$admin_key);
}

if(empty($adminUid)) $c = "login";
?>