<?php
	include 'index_page.php';
	$sql = 'SELECT * FROM notice WHERE 1=1 order by id desc';
	if(!empty($_GET['uid'])){
		$sql .= ' AND uid = '.$_GET['uid'];
	}
	//使用(创建)对象
	$page = new Page($link,$sql,2);
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
<span class="title">公告管理</span>
	<?php while($row = mysql_fetch_assoc($result)){ ?>
<div class="thumbnail red_border">
	<div class="board_id" style="display: none;"><?php echo $row['id'] ?></div>
	<div class="proc"><div class="pull-left board_title" contenteditable="true"><?php echo $row['notice'] ?></div><span class="pull-right notice"><?php echo $row['m_date'] ?></span></div>
	<div class="notice_content board_content" contenteditable="true"><?php echo $row['notice_content'] ?></div>
	<div class="proc-b">发布人：<?php echo $row['m_name'] ?><span class="pull-right btn btn-info board_update">修改</span></div>
</div>
	<?php } $page->show(3); ?>
<form action="" method="post" id="releaseform">
<div class="thumbnail release">
	<input type="hidden" name="id" value="1" />
	<textarea name="notice_title" rows="1">公告：</textarea>
	<div class="pull-right">发布人：<input type="text" name="notice_name" style="width:66px;" /></div>
	<textarea name="notice_content" rows="5"></textarea>
	<button id="release" class="btn btn-default pull-right" title="发布公告需要权限">发布</button>
</div>
</form>