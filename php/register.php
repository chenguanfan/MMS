<?php
include 'config.inc.php';
session_start();
//$_POST = ['ucode'=>'a123','pwd'=>'666666','pwd1'=>'666666','username'=>'fan'];
//print_r($_POST);
//$_SESSION['code'] = 'a123';
//print_r($_SESSION['code']);
	if(empty($_POST['ucode']) || empty($_POST['pwd']) || empty($_POST['pwd1']) || empty($_POST['username']) || empty($_POST['register_id'])){
		echo "数据不能为空！";
	}else{
		//用户名
		$sql_name = "SELECT uname FROM users WHERE uname = '{$_POST['username']}'";
		if(mysql_num_rows(mysql_query($sql_name)) >= 1)exit('用户名已存在'); 
		$reg_name = '/^[a-zA-Z](\w){1,19}$/';
		$str = $_POST['username'];
		if(preg_match($reg_name,$str));else exit('用户名格式不正确,必须由字母开头长度2-19位');
		//密码
		if($_POST['pwd'] != $_POST['pwd1'])exit('两次密码不一致，请重新输入！');
		$reg_pwd = '/^[a-zA-Z0-9!@#$%^&*()+?<:;]{6,10}$/';
		$str = $_POST['pwd'];
		if(preg_match($reg_pwd,$str));else exit('密码不正确长度为6-10位');
		//===========================================
		$sql_register = "SELECT * FROM user_all WHERE id = '{$_POST['register_id']}'";
		$result_register = mysql_query($sql_register);
		//echo mysql_num_rows($result);
		if(mysql_num_rows($result_register)!=1) die('id输入错误!');
		if($_POST['pwd'] != $_POST['pwd1']){
			echo '两次输入的密码不一致!';
		}else if($_POST['ucode'] != $_SESSION['code']){
			echo '验证码有误!';
		}else{
			//将用户数据存入数据库
			$pwd = md5($_POST['pwd']);
			$sql = "INSERT INTO users(uid,uname,upwd) VALUES('{$_POST['register_id']}','{$_POST['username']}','{$pwd}')";
			//echo $sql;
				if(mysql_query($sql)){
					echo '注册成功!';
				}else{
					echo "注册失败!";
				}
		}
		//===========================================
	}
	//关闭数据库连接
	mysql_close($link);
?>