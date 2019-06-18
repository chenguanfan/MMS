<?php
include 'config.inc.php';
session_start();
//$_POST = ['username' => 'fan','pwd' => '666666'];
//print_r($_POST);
if(empty($_POST['username']) && empty($_POST['pwd'])){
	echo '请输入账号或密码';
}else{
	$sql_name = "SELECT uname FROM users WHERE uname = '{$_POST['username']}'";
	if(mysql_num_rows(mysql_query($sql_name)) != 1)exit('用户名不存在,请输入正确的用户名');
	$upwd = md5($_POST['pwd']);
	$sql = "SELECT * FROM users WHERE uname = '{$_POST['username']}' AND upwd = '{$upwd}'";
	$res = mysql_query($sql);
	while($row = mysql_fetch_assoc($res)){
		$arr[] = $row;
	}
	//print_r($arr);
	$_SESSION['uid'] = $arr[0]['uid'];
	$_SESSION['uname'] = $arr[0]['uname'];
	//echo $_SESSION['uid'];
	if(mysql_num_rows($res) == 1){
		echo '欢迎您：'.$arr[0]['uname'];
	}else{
		echo '登录失败，密码错误';
	}
}
mysql_close($link);
?>