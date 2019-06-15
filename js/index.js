//点击公告时================================
$('#index').click(function(){
	var curr_page = 1;
	var page_id = 1;
	board_page(curr_page,page_id);
});
$('#index').trigger('click');
//点击分页下方数字按钮时=================================
function start_board(){
	//alert($('.page_num_start>li').html());
	//alert($('.index').hasClass('active'));
	if($('.index').hasClass('active'))var page_id = 1;
	if($('.message').hasClass('active'))var page_id = 2;
	if($('.member').hasClass('active'))var page_id = 4;
	var curr_page = $('.page_num_start>li').html();
	board_page(curr_page,page_id);
};
function curr_board(){
	alert($('.page_num_curr>li').html());
	if($('.index').hasClass('active'))var page_id = 1;
	if($('.message').hasClass('active'))var page_id = 2;
	if($('.member').hasClass('active'))var page_id = 4;
	var curr_page = $('.page_num_curr>li').html();
	board_page(curr_page,page_id);
};
function next0_board(){
	//alert($('.page_num_next0>li').html());
	if($('.index').hasClass('active'))var page_id = 1;
	if($('.message').hasClass('active'))var page_id = 2;
	if($('.member').hasClass('active'))var page_id = 4;
	var curr_page = $('.page_num_next0>li').html();
	board_page(curr_page,page_id);
};
function next_board(){
	//alert($('.page_num_next>li').html());
	if($('.index').hasClass('active'))var page_id = 1;
	if($('.message').hasClass('active'))var page_id = 2;
	if($('.member').hasClass('active'))var page_id = 4;
	var curr_page = $('.page_num_next>li').html();
	board_page(curr_page,page_id);
};
function end_board(){
	if($('.index').hasClass('active'))var page_id = 1;
	if($('.message').hasClass('active'))var page_id = 2;
	if($('.member').hasClass('active'))var page_id = 4;
	//alert($('.page_num_end>li').html());
	var curr_page = $('.page_num_end>li').html();
	board_page(curr_page,page_id);
};
//分页操作
function board_page(curr_page,page_id){
	//curr_page = curr_page || 1;
	if(page_id == 1){
	$('.board').load('board.html');
	$('.index').addClass('active');
	$('.add').removeClass('active');
	$('.member').removeClass('active');
	$('.message').removeClass('active');
	$('.daka').removeClass('active');
	//从数据库提取出公告内容===============================
	$.ajax({
		type:"post",
		url:"php/index.php",
		data:{id:1,id_page:1,'curr_page':curr_page},
		dataType:'json',
		success:function(result,status,xhr){
			$(result).map(function(){
				//alert(this.m_name);
				var str = '<div class="thumbnail "><div class="proc"><b>'+this.notice+'</b><span class="pull-right notice">'+this.m_date+'</span></div><br />'+this.notice_content+'<br /><br ><div class="proc-b">发布人：'+this.m_name+'</div></div>';
				$('#notice_all').before(str);
			});
		},
		error:function(result,status,xhr){
			alert('公告ajax请求失败'+result+status+xhr);
		}
	});
	}else if(page_id == 2){
	$('.board').load('message.html');
	$('.index').removeClass('active');
	$('.daka').removeClass('active');
	$('.add').removeClass('active');
	$('.member').removeClass('active');
	$('.message').addClass('active');
	$.ajax({
		type:"post",
		url:"php/index.php",
		data:{id:2,id_page:1,'curr_page':curr_page},
		dataType:'json',
		success:function(result,status,xhr){
			$(result).map(function(){
				//alert(this.m_name);
				var str = '<div class="thumbnail "><div class="proc">'+this.message_title+'<span class="pull-right notice"></span></div><br />'+this.message_content+'<br /><br ><div class="proc-b">发布人：<b>'+this.m_name+'</b></div></div>';
				$('#message_all').before(str);
			});
		},
		error:function(result,status,xhr){
			alert('意见留言ajax请求失败'+result+status+xhr);
		}
	});
	}else if(page_id == 4){
	$('.board').load('member.html');
	$('.index').removeClass('active');
	$('.message').removeClass('active');
	$('.daka').removeClass('active');
	$('.add').removeClass('active');
	$('.member').addClass('active');
	$.ajax({
		type:"post",
		url:"php/index.php",
		data:{id:4,id_page:1,'curr_page':curr_page},
		dataType:'json',
		success:function(result,status,xhr){
			$(result).map(function(){
				//alert(this.m_name);
				if(this.sex == 1)this.sex = '男';else if(this.sex == 0) this.sex = '女';
				if(this.is_drop == 0)this.is_drop = '是';else if(this.is_drop == 1) this.is_drop = '否';
				var str = '<div class="thumbnail "><table border="1" id="member_table" ><tr><td>姓名</td><td><b>'+this.uname+'</b></td><td>性别</td><td><b>'+this.sex+'</b></td><td>电话</td><td><b>'+this.phone+'</b></td><td>部门</td><td><b>'+this.class+'</b></td><td>小组</td><td><b>'+this.group+'</b></td><td>是否住宿</td><td><b>'+this.is_drop+'</b></td><td>职位</td><td><b>'+this.work+'</b></td></tr><tr><td>年龄</td><td><b>'+this.old+'</b></td><td>家庭住址</td><td colspan="3"><b>'+this.familydir+'</b></td><td>身份证</td><td colspan="3"><b>'+this.carid+'</b></td><td>加入时间</td><td><b>'+this.join+'</b></td><td>退出时间</td><td><b>'+this.exit+'</b></td></tr></table></div>';
				$('#member_all').before(str);
			});
		},
		error:function(result,status,xhr){
			alert('成员信息ajax请求失败'+result+status+xhr);
		}
	});
	}
	//==============分页条=================
	page_ajax(curr_page,page_id);
}
/*$('#index').one('click',function(){
	alert('aaa');
});*/
//==============分页条=================
function page_ajax(curr_page,page_id){
	$.ajax({
		type:"post",
		url:"php/index.php",
		data:{'id':page_id,id_page:2,'curr_page':curr_page},
		dataType:'text',
		success:function(result,status,xhr){
			//alert(result);
			$('#page_show').html(result);
		},
		error:function(result,status,xhr){
			alert('分页条ajax请求失败'+result+status+xhr);
		}
	});
}
//点击成员信息时=============================
function member(){
	var curr_page = 1;
	var page_id = 4;
	board_page(curr_page,page_id);
}
//点击意见留言时=============================
function message(){
	var curr_page = 1;
	var page_id = 2;
	board_page(curr_page,page_id);
}
//点击打卡时==========================================
function daka(){
	//$('.board').load('daka.html');
	$('.index').removeClass('active');
	$('.add').removeClass('active');
	$('.member').removeClass('active');
	$('.message').removeClass('active');
	$('.daka').addClass('active');
	$.ajax({
		type:"post",
		url:"php/index.php",
		data:{id:6},
		dataType:'text',
		success:function(result,status,xhr){
			//alert(result);
			if(result == '请先登录') {$('.board').html(result)};
			if(result == '已登录'){$('.board').load('daka.html')};
		},
		error:function(result,status,xhr){
			alert('点击打开判断有没有登录时提交ajax出错'+result+status+xhr);
		}
	});
}
//点击增加成员时======================================
function add(){
	if(!($('.add').hasClass('disabled'))){
		$('.board').load('add.html');
		$('.index').removeClass('active');
		$('.member').removeClass('active');
		$('.message').removeClass('active');
		$('.daka').removeClass('active');
		$('.add').addClass('active');
	}
}
//点击帮助时=========================================
function help(){
	$('.board').load('help.html');
	$('.index').removeClass('active');
	$('.member').removeClass('active');
	$('.message').removeClass('active');
	$('.daka').removeClass('active');
	$('.add').removeClass('active');
}
//模拟点击验证码
$('.gdcode').trigger('click');
//================登录(前)================
$('#login_close').click(function(){
	$('.login_web').css('display','none');
});
$('#login_btn').click(function(){
	$('.login_web').css('display','block');
});
$('#reg_close').click(function(){
	$('.reg_web').css('display','none');
});
$('#reg_btn').click(function(){
	$('.reg_web').css('display','block');
	$('.gdcode').trigger('click');
});
//注册========================================
$('#reg_submit').click(function(){
	$.ajax({
		type:"post",
		url:'php/register.php',
		data:$('#regform').serialize(),
		dataType:'text',
		success:function(result,status,xhr){
			alert(result);
			if(result=='验证码有误!'){
				$('.gdcode').trigger('click');
			}
			if(result=='注册成功!'){
				$('#reg_close').trigger('click');
				$('#login_btn').trigger('click');
			}
		},
		error:function(result,status,xhr){
			alert('注册ajax请求出错'+result+status+xhr);
		}
		
	});
});
//登录=======================================
$('#login_submit').click(function(){
	$.ajax({
		type:"post",
		url:"php/login.php",
		data:$('#loginform').serialize(),
		dataType:'text',
		success:function(result,status,xhr){
			//alert(result.substring(4,10));
			if(result.substring(0,3) == '欢迎您'){
				$('#login_close').trigger('click');
				$('#zhuxiao').html('<a href="#" id="des">注销</a>');
				$('#welcome').html(result);
			}
			if($('.daka').hasClass('active')){$('#daka_a').trigger('click');}
		},
		error:function(result,status,xhr){
			alert('登录ajax请求失败'+result+status+xhr);
		}
	});
});
//注销==========================================
$('#zhuxiao').on('click','#des',function(){
	//alert('aaa');
	$.ajax({
		type:"post",
		url:"php/unlogin.php",
		data:{id:3},
		dataType:'text',
		success:function(result,start,xhr){
			alert(result);
			location.href = "index.html";
		},
		error:function(result,start,xhr){
			alert('注销ajax请求失败'+result+start+xhr);
		}
	});
});
