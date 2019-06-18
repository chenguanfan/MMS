<?php
	include 'index_page_member.php';
	$sql = 'SELECT * FROM user_all WHERE 1=1 order by id desc';
	if(!empty($_GET['uid'])){
		$sql .= ' AND uid = '.$_GET['uid'];
	}
	//使用(创建)对象
	$page = new Page_member($link,$sql,4);
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
<form class="update_memberform" action="" method="post">
<input type="hidden" name="id" id="id" value="4" />
<div class="thumbnail">
<table border="1" cellspacing="" cellpadding="" id="member_table">
	<tr><td>姓名</td>
		<td><input type="text" style="width:100%" name="uname" id="text" value="<?php echo $row['uname'] ?>" /></td>
		<td>性别</td>
		<td><input type="text" style="width:100%" name="sex" id="text" value="<?php echo $row['sex'] ?>" /></td>
		<td colspan="4">电话</td>
		<td><input type="text" style="width:100%" name="phone" id="text" value="<?php echo $row['phone'] ?>" /></td>
		<td>部门</td>
		<td><input type="text" style="width:100%" name="class" id="text" value="<?php echo $row['class'] ?>" /></td>
		<td>小组</td>
		<td><input type="text" style="width:100%" name="group_num" id="text" value="<?php echo $row['group_num'] ?>" /></td>
		<td>是否住宿</td>
		<td><input type="text" style="width:100%" name="is_drop" id="text" value="<?php echo $row['is_drop'] ?>" /></td>
		<td>职位</td>
		<td><input type="text" style="width:100%" name="position" id="text" value="<?php echo $row['position'] ?>" /></td>
	</tr>
	<tr><td>年龄</td>
		<td><input type="text" style="width:100%" name="old"" id="text" value="<?php echo $row['old'] ?>" /></td>
		<td>家庭住址</td>
		<td colspan="3"><input type="text" style="width:100%" name="familydir" id="text" value="<?php echo $row['familydir'] ?>" /></td>
		<td>身份证</td>
		<td colspan="3"><input type="text" style="width:100%" name="carid" id="text" value="<?php echo $row['carid'] ?>" /></td>
		<td>加入时间</td>
		<td><input type="text" style="width:100%" name="join_date" id="text" value="<?php echo $row['join_date'] ?>" /></td>
		<td>退出时间</td>
		<td><input type="text" style="width:100%" name="exit_date" id="text" value="<?php echo $row['exit_date'] ?>" /></td>
		<td>id</td>
		<td title="id不可修改"><input type="text" style="width:100%" name="member_id" id="text" value="<?php echo $row['id'] ?>" /></td>
		<td rowspan="2" class="parent"><button class="btn btn-info member_update">修改</button></td>
	</tr>
</table>
</div>
</form>
<?php } $page->show(3); ?>