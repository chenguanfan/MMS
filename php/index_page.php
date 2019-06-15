<?php
	$link = null;
	$sql = null;
	include 'config.inc.php';
class Page{
	public $page_num;//每页显示的条数
	public $page_all;//一共有多少页
	public $curr_page = 1;//当前显示第几页
	function __construct($link,$sql,$page_num = 3){
		$page_num = intval($page_num);//转整数
		$page_num >= 1 ? $this->page_num = $page_num : 1;//至少显示1条
		$this->get_page_all($link,$sql);
		$this->get_curr_page();
	}
	//得到总页数
	private function get_page_all($link,$sql){
		/*$sql = 'SELECT * FROM blogs WHERE 1=1 ';
		if(!empty($_GET['uid'])){
			$sql .= ' AND uid = ' . $_GET['uid'];
		}
		//echo $_GET['uid'];
		$link = @mysql_connect('localhost','root','liqiuxia') OR die('数据库连接出错!');
		if(!mysql_select_db('kp10b_blog')){
			die('选择数据库文件出错');
		}*/
		if(!$result = mysql_query($sql)){
			die('查询语句执行失败!');
		}
		$temp = mysql_num_rows($result);
		$this->page_all = ceil($temp/$this->page_num);//得到总页数向上取整 总页数=总留言条数/每页显示的条数
	}
	//当前页码
	private function get_curr_page(){
		if(!empty($_GET['page'])){
			$temp = intval($_GET['page']);
			if($temp > $this->page_all){
				$this->curr_page = $this->page_all;
			}elseif($temp >= 1){
				$this->curr_page = $temp;
			}
		}
	}
	function show($show_num = 3){
		$url_get='';
		foreach($_GET as $k=>$v){
			if($k != 'page'){
				$url_get = '&'.$k.'='.$v;
			}
		}
		echo '<ul id="page" style="list-style:none;">';
		//从$start开始
		$start = $this->curr_page - floor($show_num/2);//向下取整
		if($start<floor($show_num/2)){
			$start = 1;
		}
		$end = $start + $show_num-1;
		if($end > $this->page_all){
			$end = $this->page_all;
			$start = $end - $show_num+1;
		}
		if($start < 1){
			$start = 1;
		}
		if($start != 1){
			echo '<a href="#" onclick="start_board()" class="page_num_start"><li>1</li></a>';
			echo '<a><li class="nohref">...</li></a>';
		}
		for($i = $start; $i <= $end ; $i++){
			static $f = 0;
			if($i == $this->curr_page){
				echo "<a href='#' onclick='curr_board()' class='page_num_curr'><li class='curr'>".$i."</li></a>";
			}else{
				if($f == 0) echo "<a href='#' onclick='next".$f."_board()' class='page_num_next".$f."'><li>".$i."</li></a>";
				else echo "<a href='#' onclick='next_board()' class='page_num_next'><li>".$i."</li></a>";
				$f++;
			}
		}
		if($end != $this->page_all){
			echo '<a><li class="nohref">...</li></a>';
			echo '<a href="#" class="page_num_end" onclick="end_board()"><li>'.$this->page_all.'</li></a>';
		}
		echo '</ul>';
	}
}
/*$sql = 'SELECT * FROM blogs WHERE 1=1 ';
if(!empty($_GET['uid'])){
	$sql .= ' AND uid = '.$_GET['uid'];
}
$link = @mysql_connect('localhost','root','liqiuxia') OR die('数据库连接失败!');
if(!mysql_select_db('kp10b_blog')){
	die('选择数据库失败');
}
//使用(创建)对象
$page = new Page($link,$sql);
$page->show(3);*/
/*	$sql = 'SELECT * FROM user_all WHERE 1=1 ';
	if(!empty($_GET['uid'])){
		$sql .= ' AND uid = '.$_GET['uid'];
	}
	//使用(创建)对象
	$page = new Page($link,$sql);
	//使用对象中的属性
	$page->curr_page = 1;
	//$a = ;
	$sql .= ' limit '.($page->curr_page-1)*$page->page_num. ',' . $page->page_num;
	//echo $page->curr_page-1;
	echo '<br />';
	echo ($page->curr_page-1)*$page->page_num;
	echo '<br />';
	echo $page->page_num;
	echo '<a href="index_page.php?page='.$page->curr_page.'"></a>';
	//echo $sql;
	//执行sql语句
	if(!$result = mysql_query($sql)){
		die('sql语句执行失败!');
	}
	//$page->show(3);======================================
	echo '<hr />';
	while($row = mysql_fetch_assoc($result)){
		echo $row['work'].'<br />';	
	}
	echo '<hr />';
	$page->show(3);*/
?>