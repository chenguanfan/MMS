<?php

?>
<span class="title">增加成员信息</span><hr /><br />
<form id="addform" action="#" method="post">
	<table class="pull-left" style="width: 30%;height: 300px;text-align: right;">
		<tr><td>姓名：</td><td><input type="text" name="uname" /></td></tr>
		<tr><td>性别：</td><td><input type="text" name="sex" /></td></tr>
		<tr><td>电话号码：</td><td><input type="text" name="phone" /></td></tr>
		<tr><td>部门(班级)：</td><td><input type="tel" name="class" /></td></tr>
		<tr><td>小组：</td><td><input type="text" name="group" /></td></tr>
		<tr><td>是否住宿：</td><td><input type="text" name="is_drop" /></td></tr>
		<tr><td>职位：</td><td><input type="text" name="work" /></td></tr>
	</table>
	<table style="width: 50%;height:300px;text-align: right;">
		<tr><td colspan="2" class="red">*&nbsp;查看需要权限</td></tr>
		<tr><td>年龄：</td><td><input type="text" name="old" /></td></tr>
		<tr><td>家庭住址：</td><td><input type="text" name="familydir" /></td></tr>
		<tr><td>身份证：</td><td><input type="text" name="carid" /></td></tr>
		<tr><td></td><td><input type="hidden" name="id" value="3" /></td></tr>
		<tr><td colspan="2"><input type="button" class="btn btn-success" id="add_btn" value="增&emsp;加"/></td></tr>
		<tr><td></td></tr>
	</table>
</form>