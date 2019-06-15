<?php
$link = @mysql_connect('localhost','root','liqiuxia');
if(mysql_errno()){
	die('数据库连接失败!');
}
//设置字符集
mysql_set_charset('utf8');
if(mysql_errno()){
	die('设置字符集失败!');
}
//选择数据库
mysql_select_db('mms');
if(mysql_errno()){
	die('选择数据库失败!');
}

?>