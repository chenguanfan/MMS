<?php
header('Content-type:text/html; charset=utf-8');
ini_set('date.timezone','Asia/Shanghai');
//echo  is_max_year(2018);
function is_max_year($y){
	if($y%4 == 0 && $y%100 != 0 || $y%400 == 0){
		return true;
	}else{
		return false;
	}
}
function month_days($y,$m){
	if($m == 2){
		if(is_max_year($y) == 1){
			//echo $y."年".$m."月,有29天";
			return $d = 29;
		}else{
			//echo $y."年".$m."月,有28天";
			return $d = 28;
		}
	}else if($m == 4 || $m == 6 || $m == 9 || $m == 11){
		//echo $y."年".$m."月,有30天";
		return $d = 30;
	}else if($m <= 1 && $m >= 12){
		echo "月份输入错误！";
	}else{
		//echo $y."年".$m."月,有31天";
		return $d = 31;
	}
}
function week_day($y,$m,$d = 1){
	if($m == 1){
			$y -= 1;
			$m = 13;
		}else if($m == 2){
			$y -= 1; 
			$m = 14;
		}
		$w = ($d+2*$m+floor(3*($m+1)/5)+$y+floor($y/4)-floor($y/100)+floor($y/400))%7;
	//echo month_days($y, $m).",".$d."号为星期".$w;
	return $w;
}
//week_day(2018, 11);
function rili($y,$show_m,$d = 1){
	for($m = 1; $m <= 12; $m++){
		if($m == $show_m){
		for($i = 0; $i <= week_day($y,$m,$d) ; $i++){
			echo "<div class='rili'>&nbsp;</div>";
		}
		for($j = 1; $j <= month_days($y, $m);$j++){
			if((($i+$j)-1)%7 == 0){
				echo "<br />";
			}
			echo "<div class='rili day'>".$j."</div>";
		}
		echo "<br />";
		}
	}
}
if(!empty($_POST)){
	$show_m = $_POST['next'];
}else{
	$show_m = date('m');
}
rili(date('Y'),$show_m);
?>