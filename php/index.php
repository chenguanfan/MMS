<?php
require 'config.inc.php';
session_start();
//{"uid":"2","year":"2019","month":"6","day":"10"}
//$_SESSION['uid'] = 4;
//$_POST['id'] = 1;
//$_POST['id_page'] = 2;
//公告显示====================================
if(!empty($_POST) && $_POST['id'] == 1 && isset($_POST['curr_page']) ){
	include 'index_page.php';//=============
	$sql = 'SELECT * FROM notice WHERE 1=1 order by id desc';
	if(!empty($_GET['uid'])){
		$sql .= ' AND uid = '.$_GET['uid'];
	}
	//使用(创建)对象
	$page = new Page($link,$sql);
	//使用对象中的属性
	$page->curr_page = $_POST['curr_page'];
	$sql .= ' limit '.($page->curr_page-1)*$page->page_num . ',' . $page->page_num;
	if(!$result = mysql_query($sql)){
		die('sql语句执行失败!');
	}
	if($_POST['id_page'] == 2){
		$page->show(3);
	}elseif($_POST['id_page'] == 1){
		while($row = mysql_fetch_assoc($result)){
			//echo $row['notice_content'].'<br />';
			$notice_arr[] = $row;
		}
		//print_r($notice_arr);
		echo json_encode($notice_arr);
	}
}
//意见留言显示================================
if(!empty($_POST) && $_POST['id'] == 2){
	include 'index_page.php';//=============
	$sql = 'SELECT * FROM message WHERE 1=1 order by id desc';
	if(!empty($_GET['uid'])){
		$sql .= ' AND uid = '.$_GET['uid'];
	}
	//使用(创建)对象
	$page = new Page($link,$sql);
	//使用对象中的属性
	$page->curr_page = $_POST['curr_page'];
	$sql .= ' limit '.($page->curr_page-1)*$page->page_num . ',' . $page->page_num;
	if(!$result = mysql_query($sql)){
		die('sql语句执行失败!');
	}
	if($_POST['id_page'] == 2){
		$page->show(3);
	}elseif($_POST['id_page'] == 1){
		while($row = mysql_fetch_assoc($result)){
			$notice_arr[] = $row;
		}
		//print_r($notice_arr);
		echo json_encode($notice_arr);
	}
}
//成员信息===============================
if(!empty($_POST) && $_POST['id'] == 4){
	include 'index_page.php';//=============
	$sql = 'SELECT * FROM user_all WHERE 1=1 order by id desc';
	if(!empty($_GET['uid'])){
		$sql .= ' AND uid = '.$_GET['uid'];
	}
	//使用(创建)对象
	$page = new Page($link,$sql,5);
	//使用对象中的属性
	$page->curr_page = $_POST['curr_page'];
	$sql .= ' limit '.($page->curr_page-1)*$page->page_num . ',' . $page->page_num;
	if(!$result = mysql_query($sql)){
		die('sql语句执行失败!');
	}
	if($_POST['id_page'] == 2){
		$page->show(3);
	}elseif($_POST['id_page'] == 1){
		while($row = mysql_fetch_assoc($result)){
			$notice_arr[] = $row;
		}
		//print_r($notice_arr);
		echo json_encode($notice_arr);
	}
}
//签到天数显示================================
if(!empty($_POST) && $_POST['id'] == 5){
	$sql = 'SELECT * FROM dao_rili';
	$res = mysql_query($sql);
	while($row = mysql_fetch_assoc($res)){
		$notice_arr[] = $row;
	}
	foreach($notice_arr as $k=>$v){
		//print_r($v['uid']);
		if($_SESSION['uid'] == $v['uid']){
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
//判断有没有登录==============================
if(!empty($_POST) && $_POST['id'] == 6){
	if(!empty($_SESSION['uid'])){
		echo '已登录';
	}else{
		echo '请先登录';
	}
}
if(!empty($_POST) && $_POST['id'] == 7){
	if($_POST['search_text'] == NULL)die(json_encode('请输入内容'));
	//print_r($_POST);
	//$search_text = $_POST['search_text'];
	mysql_query("set @search_text = '{$_POST['search_text']}'");
	$sql = "SELECT * FROM user_all WHERE uname = @search_text OR sex =  @search_text OR phone =  @search_text OR class =  @search_text OR group_num =  @search_text OR is_drop =  @search_text OR position =  @search_text OR old =  @search_text OR familydir =  @search_text OR carid =  @search_text OR join_date =  @search_text OR exit_date =  @search_text";
	if(!mysql_query($sql)) die(json_encode('出错了!'));
	$res = mysql_query($sql);
	while($row = mysql_fetch_assoc($res)){
		$search_arr[] = $row;
	}
	if(empty($search_arr) || $search_arr == NULL) die(json_encode('啥也没找到!'));
	echo json_encode($search_arr);
}
?>