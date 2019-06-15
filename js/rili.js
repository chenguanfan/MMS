var d = new Date();
var show_m = d.getMonth()+1;
$('.year').html(d.getFullYear());
$('#zuo').click(function(){
	//alert('点击了zuo');
	var temp = $('#num').text();
	temp = Number(temp);
	if(temp != show_m && temp != 0){
		show_m = temp-1;
	}
	if(show_m < 1){
		show_m = 12;
	}
	/*//小于当前月时不能左按
	if(show_m > d.getMonth()+1){
		$('#zuo').css('color','#000');
	}else{
		$('#zuo').css('color','#ccc');
	}*/
	//if(show_m >= d.getMonth()+1){//小于当前月时不能左按
	$.ajax({
		type:"post"
		,url:"php/rili2.php"
		,data:{'next':show_m}
		,dataType:'text'
		,success:function(a,b,c){
			//alert('ajax提交了'+a);
			$('#rili').html(a);
			$('#num').html(show_m);
			day(d.getFullYear(),show_m);
			show_m -= 1;
		},
		error:function(a,b,c){
			//alert('cuowu'+a+b+c);
		}
	});
//}
});
$('#zuo').trigger('click');
$('#you').click(function(){
	//alert('点击了you');
	var temp = $('#num').text();
	temp = Number(temp);
	show_m = temp+1;
/*	if(show_m > d.getMonth()+1){
		$('#zuo').css('color','#000');
	}else{
		$('#zuo').css('color','#ccc');
	}*/
	if(show_m > 12){
		show_m = d.getMonth()+1;
	}
	$.ajax({
		type:"post"
		,url:"php/rili2.php"
		,data:{'next':show_m}
		,dataType:'text'
		,success:function(a,b,c){
			//alert('ajax提交了'+a);
			/*var day = $('.day').length;
			$('.day:eq(11)').html('到');*/
			//alert(day);
			$('#rili').html(a);
			$('#num').html(show_m);
			day(d.getFullYear(),show_m);
			show_m += 1;
		},
		error:function(a,b,c){
			alert('cuowu'+a+b+c);
		}
	});
/*	if(show_m > d.getMonth()+1){
		$('#zuo').css('color','#000');
	}else{
		$('#zuo').css('color','#ccc');
	}*/
});

function qiandao(){
	var mday = d.getDate();
	var month = d.getMonth()+1;
	var year = d.getFullYear();
	$('.day:eq('+(mday-1)+')').html('<b>'+mday+'到</b>');
	$('.day:eq('+(mday-1)+')').css('color','red');
	$.ajax({
		type:"post",
		url:"php/daka.php",
		data:{'mday':mday,'year':year,'month':month},
		dataType:'text',
		success:function(result,status,xhr){
			alert(result);
		},
		error:function(result,status,xhr){
			alert('签到按钮ajax请求失败'+result+status+xhr);
		}
	});
}
function day(year,show_m){
	$.ajax({
		type:"post",
		url:"php/index.php",
		data:{'id':5},
		dataType:'json',
		success:function(result,status,xhr){
			//alert(result);
			$(result).map(function(){
				//alert(this.day);
				if(year == this.year && show_m == this.month){
					$('.day:eq('+(this.day-1)+')').css('color','red');
					$('.day:eq('+(this.day-1)+')').html('<b>'+this.day+'到</b>');
				}
			});
		},
		error:function(result,status,xhr){
			alert('签到ajax请求失败'+result+status+xhr);
		}
	});
}

