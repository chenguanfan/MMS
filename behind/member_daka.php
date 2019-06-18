<?php

?>
<span class="title">查看成员签到情况</span><br />
<div style="width: 100%;margin-left:25%;">
<form method="post" id="dakaform" style="float: left;">
	<!--<input type="text" name="uname" placeholder="请输入成员姓名" />-->
	<input type="text" name="uid" placeholder="请输入成员id" />
	<input type="hidden" name="id" id="id" value="7" />
</form>
<button class="btn btn-default" id="search_daka" for="dakaform" style="margin:-4px 5px;">查询</button><br /><br />
<div id="rili_html"></div>
</div>