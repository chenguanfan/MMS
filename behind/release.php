<?php
include '../php/config.inc.php';
session_start();
//print_r($_POST);
if(!empty($_POST) && $_POST['id'] == 1){
	if($_POST['notice_name'] == NULL) die('请输入公告发布人');
	if($_POST['notice_title'] == NULL) die('请输入公告标题');
	if($_POST['notice_content'] == NULL) die('请输入公告内容');
	$sql = "INSERT notice(notice,notice_content,m_name) VALUE('{$_POST['notice_title']}','{$_POST['notice_content']}','{$_POST['notice_name']}');";
	if(!mysql_query($sql)) die('发布公告存入数据库失败');
	echo '发布成功';
}
//修改公告内容
if(!empty($_POST) && $_POST['id'] == 2){
	$sql = "UPDATE notice SET notice='{$_POST['board_title']}',notice_content='{$_POST['board_content']}' WHERE id='{$_POST['board_id']}';";
	if(!mysql_query($sql)) die('修改公告内容失败!');
	echo '修改成功';
}
//增加成员,返回新增成员id
if(!empty($_POST) && $_POST['id'] == 3){
	$sql = "INSERT user_all(uname,sex,phone,class,group_num,is_drop,position,old,familydir,carid,exit_date) 
VALUE('{$_POST['uname']}','{$_POST['sex']}','{$_POST['phone']}','{$_POST['class']}','{$_POST['group']}','{$_POST['is_drop']}','{$_POST['work']}','{$_POST['old']}','{$_POST['familydir']}','{$_POST['carid']}','暂无');";
	if(!mysql_query($sql)) die('增加成员失败');
	$sql = "SELECT id FROM user_all WHERE carid = '{$_POST['carid']}';";
	if(!$result = mysql_query($sql)) die('查询成员id失败');
	while($row = mysql_fetch_assoc($result)){
		$arr = $row;
	}
	echo '增加成功！新成员id为'.$arr['id'];
}
//修改成员
if(!empty($_POST) && $_POST['id'] == 4){
	$sql = "UPDATE user_all SET 
	uname='{$_POST['uname']}',sex='{$_POST['sex']}',phone='{$_POST['phone']}',class='{$_POST['class']}',group_num='{$_POST['group_num']}',is_drop='{$_POST['is_drop']}',position='{$_POST['position']}',old='{$_POST['old']}',familydir='{$_POST['familydir']}',carid='{$_POST['carid']}',exit_date='{$_POST['exit_date']}' 
	WHERE id='{$_POST['member_id']}';";
	if(!mysql_query($sql)) die('修改成员信息失败!');
	echo '修改成功';
}
if(!empty($_POST) && $_POST['id'] == 5){
	$sql = "DELETE FROM message WHERE id = '{$_POST['message_id']}';";
	if(!mysql_query($sql)) die('删除留言失败！');
	echo '删除成功';
}
//查看打卡情况==========================================
if(!empty($_POST) && $_POST['id'] == 6){
	if(empty($_SESSION['uid_daka'])){
		$_SESSION['uid_daka'] = 0;
	}
	$sql = 'SELECT * FROM dao_rili';
	$res = mysql_query($sql);
	while($row = mysql_fetch_assoc($res)){
		$notice_arr[] = $row;
	}
	foreach($notice_arr as $k=>$v){
		//print_r($v['uid']);
		if($_SESSION['uid_daka'] == $v['uid']){
			$rili[] = $v;
			//print_r($v);
			//echo json_encode($v);
		}
	}
	//echo '<br />';
	//print_r($rili);
	if(empty($rili)) die(json_encode('无此id或此成员暂未签到'));
	echo json_encode($rili);
	//echo json_encode($notice_arr);
}
if(!empty($_POST) && $_POST['id'] == 7){
	//if(empty($_POST['uname']))die('请输入成员姓名');
	if(empty($_POST['uid']))die('请输入成员id');
	//$_SESSION['uname_daka'] = $_POST['uname'];
	$_SESSION['uid_daka'] = $_POST['uid'];
	//print_r($_POST);
	echo '查询成功';
}
?>