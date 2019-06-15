<?php
	include 'config.inc.php';
	session_start();
	//将签到的日期存入数据库
	//$_POST = ['mday'=>12,'year'=>2019,'month'=>6];
	//$_SESSION = ['uid'=>2];
	//echo $_SESSION['uid'];
	//print_r($_POST);
	if(!empty($_POST)){
		$sql = "INSERT dao_rili(uid,year,month,day) VALUES('{$_SESSION['uid']}','{$_POST['year']}','{$_POST['month']}','{$_POST['mday']}')";
		if(mysql_query($sql)){
			echo '签到成功';
		}else{
			echo '签到失败，程序出错请联系开发人员';
		}
	}
?>