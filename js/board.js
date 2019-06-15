//点击分页下方数字按钮时=================================
function start_board(){
	//alert('start');
	alert($('.page_num_start>li').html());
	var curr_page = $('.page_num_start>li').html();
	board_page(curr_page);
};
function curr_board(){
	//alert('curr');
	alert($('.page_num_curr>li').html());
	var curr_page = $('.page_num_curr>li').html();
	board_page(curr_page);
};
function next0_board(){
	//alert('next0');
	alert($('.page_num_next0>li').html());
	var curr_page = $('.page_num_next0>li').html();
	board_page(curr_page);
};
function next_board(){
	//alert('next');
	alert($('.page_num_next>li').html());
	var curr_page = $('.page_num_next>li').html();
	board_page(curr_page);
};
function end_board(){
	//alert('end');
	alert($('.page_num_end>li').html());
	var curr_page = $('.page_num_end>li').html();
	board_page(curr_page);
};
function board_page(curr_page){
	curr_page = curr_page || 1;
	$.ajax({
		type:'post',
		url:'php/index.php',
		data:{id:1,'curr_page':curr_page},
		dataType:'text',
		success:function(result,status,xhr){
			//$('#index').trigger('click');
			alert('成功');
		},
		error:function(result,status,xhr){
			alerr('传当前第几页过去时出错'+result+status+xhr);
		}
	});
}
