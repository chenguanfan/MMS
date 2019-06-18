<?php
	include '../php/config.inc.php';
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
		<style type="text/css">
			#show{width:100%;height:550px;overflow:hidden;border: 8px red solid;position:relative;
			padding:0px 10px;}
			.show_xiangqing{padding-bottom:600px;}
			.title{font-weight:bold;font-size:30px;}
			#member_table{width: 100%;text-align: center;}
			.notice_content{padding: 10px 0px;}
			.red_border{border: red 1px solid;}
			#add_btn{width: 100%;height: 100%;margin:20px 20px;font-size:52px;}
		</style>
	</head>
	<body>
		<div id="nav" class="navbar navbar-default">
			<a href="../index.html" class="navbar-brand">主页</a>
			<ul class="nav navbar-nav">
				<li><a href="#board_show" id="board_btn">公告管理</a></li>
				<li class="dropdown">
					<a href="#" data-toggle="dropdown">成员信息管理</a>
					<ul class="dropdown-menu">
						<li><a href="#member_add_show">增加成员</a></li>
						<li><a href="#member_update_show">修改成员信息</a></li>
						<li><a href="#member_daka_show" class="member_show">查看成员签到情况</a></li>
					</ul>
				</li>
				<li id="message_btn"><a href="#message">留言管理</a></li>
				<li><a href="#help">帮助文档</a></li>
			</ul>
		</div>
		<div data-offset="0" data-target="#nav" data-spy="scroll" id="show">
			<div class="show_xiangqing" id="board_show">
			<?php include 'board.php'?>
			</div>
			<div class="show_xiangqing" id="member_add_show">
			<?php include 'member_add.php'; ?>
			</div>
			<div class="show_xiangqing" id="member_update_show">
			<?php include 'member_update.php'; ?>
			</div>
			<div class="show_xiangqing" id="member_daka_show">
			<?php include 'member_daka.php'; ?>
			</div>
			<div class="show_xiangqing" id="message">
			<?php include 'message.php'; ?>
			</div>
			<div class="show_xiangqing" id="help">
			<span class="title">MMS后台管理 --帮助文档</span><hr />
			1.公告能发布和修改<br />
			2.成员信息管理能增加成员、修改成员信息、查看成员签到情况<br />
			&emsp;&emsp;2.1 增加成员后获取id给新成员才能在前台注册<br />
			3.留言只能进行删除操作<br />
			</div>
		</div>
		<script src="../js/jquery-3.3.1.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/behind_index.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
