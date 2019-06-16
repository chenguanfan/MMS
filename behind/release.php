<?php
include '../php/config.inc.php';
//print_r($_POST);
if(!empty($_POST) && $_POST['id'] == 1){
	if($_POST['notice_name'] == NULL) die('请输入公告发布人');
	if($_POST['notice_title'] == NULL) die('请输入公告标题');
	if($_POST['notice_content'] == NULL) die('请输入公告内容');
	$sql = "INSERT notice(notice,notice_content,m_name) VALUE('{$_POST['notice_title']}','{$_POST['notice_content']}','{$_POST['notice_name']}');";
	if(!mysql_query($sql)) die('发布公告存入数据库失败');
	echo '发布成功';
}
if(!empty($_POST) && $_POST['id'] == 2){
	$sql = "UPDATE notice SET notice='{$_POST['board_title']}',notice_content='{$_POST['board_content']}' WHERE id='{$_POST['board_id']}';";
	if(!mysql_query($sql)) die('修改公告内容失败!');
	echo '修改成功';
}
?>