<?php
require 'config.inc.php';
if(!empty($_POST) && $_POST['id'] == 4){
	$sql = 'SELECT * FROM user_all';
	$res = mysql_query($sql);
	while($row = mysql_fetch_assoc($res)){
		$notice_arr[] = $row;
	}
	//print_r($notice_arr);
	echo json_encode($notice_arr);
}
?>