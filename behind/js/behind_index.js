$(function(){
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
})