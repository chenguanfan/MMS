<?php
include 'config.inc.php';
session_start();
//print_r($_POST);
if(!empty($_POST)){
	if(empty($_SESSION['uname'])) die('请先登录');
	if($_POST['message_title'] == NULL) die('请输入公告标题');
	if($_POST['message_content'] == NULL) die('请输入公告内容');
	$sql = "INSERT INTO message(message_title,message_content,m_name) VALUE('{$_POST['message_title']}','{$_POST['message_content']}','{$_SESSION['uname']}');";
	if(!mysql_query($sql)) die('发布公告存入数据库失败');
	echo '发布成功';
}
?>