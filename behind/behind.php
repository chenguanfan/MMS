<?php

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
		<style type="text/css">
			#show{width:100%;height:500px;overflow:hidden;border: 1px red solid;position:relative;}
			.show_xiangqing{padding-bottom:500px;}
			#test1{}
		</style>
	</head>
	<body>
		<div id="nav" class="navbar navbar-default">
			<a href="#" class="navbar-brand">标题</a>
			<ul class="nav navbar-nav">
				<li><a href="#test1">菜单1</a></li>
				<li><a href="#test2">菜单2</a></li>
				<li><a href="#test3">菜单3</a></li>
				<li class="dropdown">
					<a href="#" data-toggle="dropdown">下拉<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#test01">下拉项1</a></li>
						<li><a href="#test02">下拉项2</a></li>
						<li><a href="#test03">下拉项3</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<div data-offset="0" data-target="#nav" data-spy="scroll" id="show">
			<div class="show_xiangqing" id="test1">
			<h3>这是菜单1的内容</h3>
			<p>PHP，即"PHP: Hypertext Preprocessor"，是一种被广泛应用的开源通用脚本语言，尤其适用于 Web 开发并可嵌入 HTML 中去。它的语法利用了 C、Java 和 Perl，易于学习。该语言的主要目标是允许 web 开发人员快速编写动态生成的 web 页面，但 PHP 的用途远不只于此。 </p>
			</div>
			<div class="show_xiangqing" id="test2">
			<h3>这是菜单2的内容</h3>
			<p>本手册内容主要由函数参考构成，但也包含了语言参考，PHP 一些主要产品特点的说明以及其它补充信息。 可在 » http://www.php.net/download-docs.php 下载此手册的各种格式。更多关于如何开发本手册的信息可参阅附录："关于本手册"。如果你对 PHP 的历史感兴趣，可访问相关附录。 </p>
			</div>
			<div class="show_xiangqing" id="test01">
			<h3>这是下拉01的内容</h3>
			<p>在手册的首页上仅突出了目前最活跃的人员，但还有更多的贡献者正在帮助我们工作或在过去给项目提供过巨大的帮助。有许多不知名的人帮助在手册中写下用户评论，并不断地包含在参考中，也很感谢他们的努力。下面所提供的列表均以字母顺序排序。</p>
			</div>
			<div class="show_xiangqing" id="test02">
			<h3>这是下拉02的内容</h3>
			<p>下列人员曾经或者目前正在为本手册添砖加瓦： Bill Abt, Jouni Ahto, Alexander Aulbach, Christoph Michael Becker, Daniel Beckham, Stig Bakken, Nilgün Belma Bugüner, Jesus M. Castagnetto, Ron Chmara, Sean Coates, John Coggeshall, Simone Cortesi, Peter Cowburn, Daniel Egeberg, Markus Fischer, Wez Furlong, Sara Golemon, Rui Hirokawa, Brad House, Pierre-Alain Joye, Etienne Kneuss, Moriyoshi Koizumi, Rasmus Lerdorf, Andrew Lindeman, Stanislav Malyshev, Justin Martin, Rafael Martinez, Rick McGuire, Moacir de Oliveira Miranda Júnior, Kalle Sommer Nielsen, Yasuo Ohgaki, Philip Olson, Richard Quadling, Derick Rethans, Rob Richards, Sander Roobol, Egon Schmid, Thomas Schoefbeck, Sascha Schumann, Dan Scott, Masahiro Takagi, Yannick Torres, Michael Wallner, Lars Torben Wilson, Jim Winstead, Jeroen van Wolffelaar 和 Andrei Zmievski. </p>
			</div>
			<div class="show_xiangqing" id="test03">
			<h3>这是下拉03的内容</h3>
			<p>下列人员为维护用户评论作出了巨大的努力: Mehdi Achour, Daniel Beckham, Friedhelm Betz, Victor Boivie, Jesus M. Castagnetto, Nicolas Chaillan, Ron Chmara, Sean Coates, James Cox, Vincent Gevers, Sara Golemon, Zak Greant, Szabolcs Heilig, Oliver Hinckel, Hartmut Holzgraefe, Etienne Kneuss, Rasmus Lerdorf, Matthew Li, Andrew Lindeman, Aidan Lister, Hannes Magnusson, Maxim Maletsky, Bobby Matthis, James Moore, Philip Olson, Sebastian Picklum, Derick Rethans, Sander Roobol, Damien Seguy, Jason Sheets, Tom Sommer, Jani Taskinen, Yasuo Ohgaki, Jakub Vrana, Lars Torben Wilson, Jim Winstead, Jared Wyles 和 Jeroen van Wolffelaar.</p>
			</div>
			<div class="show_xiangqing" id="test3">
			<h3>这是菜单3内容</h3>
			<p>下列人员为维护用户评论作出了巨大的努力: Mehdi Achour, Daniel Beckham, Friedhelm Betz, Victor Boivie, Jesus M. Castagnetto, Nicolas Chaillan, Ron Chmara, Sean Coates, James Cox, Vincent Gevers, Sara Golemon, Zak Greant, Szabolcs Heilig, Oliver Hinckel, Hartmut Holzgraefe, Etienne Kneuss, Rasmus Lerdorf, Matthew Li, Andrew Lindeman, Aidan Lister, Hannes Magnusson, Maxim Maletsky, Bobby Matthis, James Moore, Philip Olson, Sebastian Picklum, Derick Rethans, Sander Roobol, Damien Seguy, Jason Sheets, Tom Sommer, Jani Taskinen, Yasuo Ohgaki, Jakub Vrana, Lars Torben Wilson, Jim Winstead, Jared Wyles 和 Jeroen van Wolffelaar.</p>
			</div>
		</div>
		<script src="../js/jquery-3.3.1.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
