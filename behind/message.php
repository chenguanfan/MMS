<?php
	include 'index_page_message.php';
	$sql = 'SELECT * FROM message WHERE 1=1 order by id desc';
	if(!empty($_GET['uid'])){
		$sql .= ' AND uid = '.$_GET['uid'];
	}
	//使用(创建)对象
	$page = new Page_message($link,$sql);
	//使用对象中的属性
	//$page->curr_page = 1;
	$sql .= ' limit '.($page->curr_page-1)*$page->page_num. ',' . $page->page_num;
	//执行sql语句
	if(!$result = mysql_query($sql)){
		die('sql语句执行失败!');
	}
	//$page->show(3);======================================
/*	while($row = mysql_fetch_assoc($result)){
		echo $row['notice_content'].'<br />';	
	}*/
	
?>
<link rel="stylesheet" type="text/css" href="../css/index.css"/>
<span class="title">留言管理</span>
	<?php while($row = mysql_fetch_assoc($result)){ ?>
<div class="thumbnail red_border">
	<div class="proc"><?php echo $row['message_title'] ?><span class="pull-right notice"></span></div>
	<div class="notice_content" contenteditable="true"><?php echo $row['message_content'] ?></div>
	<div class="proc-b">发布人：<?php echo $row['m_name'] ?><span class="pull-right btn btn-warning">删除</span></div>
</div>
	<?php } $page->show(3); ?>