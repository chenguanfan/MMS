<?php
//echo 'Array ( [0] => Array ( [day] => 10 ) [1] => Array ( [day] => 11 ) [2] => Array ( [day] => 12 ) )<br />';
//$arr = Array ( [0] => Array ( [day] => 10 ) [1] => Array ( [day] => 11 ) [2] => Array ( [day] => 12 ) )
//$arr = Array ( Array('day' => 10),Array('day' => 11),Array('day' => 12));
//print_r($arr);
include 'config.inc.php';
//签到=============================================
$sql = 'SELECT * FROM dao_rili';
$res = mysql_query($sql);
while($row = mysql_fetch_assoc($res)){
	$arr[] = $row;
}
print_r($arr);
/*for($i = 1; $i <= 30; $i++){
	foreach($arr as $k=>$v){
		if(in_array($i,$arr[$k])){
			echo $i.'*<br />';
		}else{
			echo $i.'<br />';
		}
	}

}*/
?>