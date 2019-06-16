<?php
	include 'index_page_member.php';
	$sql = 'SELECT * FROM user_all WHERE 1=1 order by id desc';
	if(!empty($_GET['uid'])){
		$sql .= ' AND uid = '.$_GET['uid'];
	}
	//使用(创建)对象
	$page = new Page_member($link,$sql,5);
	//使用对象中的属性
	//$page->curr_page = 1;
	$sql .= ' limit '.($page->curr_page-1)*$page->page_num. ',' . $page->page_num;
	//执行sql语句
	if(!$result = mysql_query($sql)){
		die('sql语句执行失败!');
	}
?>
<span class="title">修改成员信息</span>
<?php while($row = mysql_fetch_assoc($result)){ ?>
<div class="thumbnail">
<table border="1" cellspacing="" cellpadding="" id="member_table">
	<tr><td>姓名</td>
		<td><?php echo $row['uname'] ?></td>
		<td>性别</td>
		<td><?php echo $row['sex'] ?></td>
		<td>电话</td>
		<td><?php echo $row['phone'] ?></td>
		<td>部门</td>
		<td><?php echo $row['class'] ?></td>
		<td>小组</td>
		<td><?php echo $row['group'] ?></td>
		<td>是否住宿</td>
		<td><?php echo $row['is_drop'] ?></td>
		<td>职位</td>
		<td><?php echo $row['work'] ?></td>
		<td rowspan="2"><button class="btn btn-info" id="update_btn">修改</button></td>
	</tr>
	<tr><td>年龄</td>
		<td><?php echo $row['old'] ?></td>
		<td>家庭住址</td>
		<td colspan="3"><?php echo $row['familydir'] ?></td>
		<td>身份证</td>
		<td colspan="3"><?php echo $row['carid'] ?></td>
		<td>加入时间</td>
		<td><?php echo $row['join'] ?></td>
		<td>退出时间</td>
		<td><?php echo $row['exit'] ?></td>
	</tr>
</table>
</div>
<?php } $page->show(3); ?>