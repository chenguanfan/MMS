$(function(){
	//点击发布公告按钮时=============================
	$('#release').click(function(){
		$.ajax({
			type:'post',
			url:'release.php',
			data:$('#releaseform').serialize(),//id:1
			dataType:'text',
			success:function(result,status,xhr){
				alert(result);
			},
			error:function(result,status,xhr){
				alert('发布公告ajax提交失败:'+result+status+xhr);
			}
		});
	});
	//点击公告界面的修改时=====================================
	$('.board_update').click(function(){
		//alert($(this).parent().prevAll('.proc').find('.board_title').html());
		//alert($(this).parent().prevAll('.board_content').html());
		//alert($(this).parent().prevAll('.board_id').html());
		var board_id = $(this).parent().prevAll('.board_id').html();
		var board_title = $(this).parent().prevAll('.proc').find('.board_title').html();
		var board_content = $(this).parent().prevAll('.board_content').html();
		$.ajax({
			type:"post",
			url:"release.php",
			data:{'id':2,'board_id':board_id,'board_title':board_title,'board_content':board_content},
			dataType:'text',
			success:function(result,status,xhr){
				alert(result);
			},
			error:function(result,status,xhr){
				alert('修改公告内容ajax失败'+result+status+xhr);
			}
		});
	});
	//点击成员增加按钮时==============================
	$('#add_btn').click(function(){
		//alert('aaa');
		$.ajax({
			type:"post",
			url:"release.php",
			data:$('#addform').serialize(),//id:3
			dataType:'text',
			success:function(result,status,xhr){
				alert(result);
			},
			error:function(result,status,xhr){
				alert('增加成员ajax请求失败'+resultl+status+xhr);
			}
		});
	});
	//点击修改成员信息时========================================
	$('.member_update').click(function(){
		//alert($(this).parents('.update_memberform').html());
		$.ajax({
			type:"post",
			url:"release.php",
			data:$(this).parents('.update_memberform').serialize(),//id:4
			dataType:'text',
			success:function(result,status,xhr){
				alert(result);
			},
			error:function(result,status,xhr){
				alert('增加成员ajax请求失败'+resultl+status+xhr);
			}
		});
	});
	//点击留言删除时=============================================
	$('.message_del').click(function(){
		//alert($(this).parents('.message_delform').html());
		$.ajax({
			type:"post",
			url:"release.php",
			data:$(this).parents('.message_delform').serialize(),//id:5
			dataType:'text',
			success:function(result,status,xhr){
				alert(result);
			},
			error:function(result,status,xhr){
				alert('留言删除ajax请求失败'+result+status+xhr);
			}
		});
	});
	//点击查看成员签到情况时========================================
	$('.member_show').click(function(){
		$('#rili_html').load('daka.html');
	});
	//点击查询成员签到情况按钮时====================================
	$('#search_daka').click(function(){
		$.ajax({
			type:"post",
			url:"release.php",
			data:$('#dakaform').serialize(),
			dataType:'text',
			success:function(result,status,xhr){
				if(result != '查询成功')alert(result);
				if(result == '查询成功'){
					$('#rili_html').load('daka.html');
				}
				
			},
			error:function(result,status,xhr){
				alert('点击查询签到情况时ajax请求失败'+result+status+xhr);
			}
		});
	});
});
