<?php
header("Content-type:text/html; charset=utf-8;");
session_start();
//1.清空session数组
$_SESSION = array();
//2.删除cookeie中的session_id  加个条件防止报错.
	if(isset($_COOKIE[session_name()])){
		setCookie(session_name(),'',time()-3600,'/');
	}
//3.销毁所有session资源
	session_destroy();
	echo '注销成功';

?>
