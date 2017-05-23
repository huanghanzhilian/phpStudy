<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
<title>维百士-手机维修</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>

</head>
<body>
<div class="header">
    <span onclick="window.history.back()"></span>
    <h1>出现什么问题了呢？</h1>
    	
</div><!--头-->
<div class="content">
    <div class="content_con">
	<!-- <form method="post" action=""> -->
    <h1 class="title_h1">机型：<?php echo ($model_name); echo ($color_name); ?></h1>
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><h3 class="title_h3"><span><i></i><b></b></span><?php echo ($kk["questiontype_name"]); ?><em></em>
            <ul>
                
			<?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><li><u><i></i></u>
				<input type="checkbox" name="aa" value='<?php echo ($ee["question_id"]); ?>' onclick='k()'><?php echo ($ee["question_name"]); ?>
                </li><?php endforeach; endif; ?>
                
            </ul>
		</h3><?php endforeach; endif; ?>
		<input type="hidden"  value='<?php echo ($color_id); ?>' id='color_id'>
		<input type="hidden"  value='<?php echo ($model_id); ?>' id='model_id'>
    </div>
</div>
<div class="footer" id="open">
		<center id='kk'><input type="button" value="查看解决方案" onclick="qr()"></center>
	<!-- </form> -->
</div>
<div class="Maskc"></div>
<div id='li' class="lili_c">
    

</div>


</body>
<script type="text/javascript">


function k(){
	document.getElementById('open').style.display='block';
}
function qr(){
	
	//document.getElementById('open').style.display='none';
	    	str='';
	var color_id=document.getElementById("color_id").value
	
	var model_id=document.getElementById("model_id").value
	var check_all=document.getElementsByName('aa');
		for(i=0;i<check_all.length;i++){
			if(check_all[i].checked==true){
				str=str+','+check_all[i].value;
			}
		}
			question_id=str.substr(1);
			//alert(color_name)
			//alert(model_id)
			//alert(question_id)
	/*var ajax= new XMLHttpRequest();
		ajax.open("get","/Home/Index/mbr/question_id/"+question_id+"/color_id/"+color_id+"/model_id/"+model_id,true);
		ajax.send();
		ajax.onreadystatechange=function(){
		//alert(ajax.responseText);
			if(ajax.readyState==4 && ajax.status==200){
				document.getElementById('li').innerHTML=ajax.responseText;
			}
		}*/

         /*$(".Maskc_box ul").ajaxStart(function(){ 
			  $(this).append('<div class="jztp1"><img src="/Public/img/jz.gif"/></div>');
			  $(".Maskc1").show();
		  });
		  $("body").ajaxStop(function(){
			  $(".jztp").remove();
			  $(".Maskc1").hide();
		  });*/
		  
		  
		  
		  $("body").ajaxStart(function(){ 
			  $(this).append('<div class="jztp"><img src="/Public/img/jz.gif"/></div>');
			  $(".Maskc1").show();
			  $(".Maskc_box").remove();
			  $("#li").css({'opacity':'0'})
		  });
		  $("body").ajaxStop(function(){
			  $(".jztp").remove();
			  $(".Maskc1").hide();
			  $("#li").css({'opacity':'1'})
		  });
		  
			  var $this = $(this);
			  $.ajax({
				  url: "/Home/Index/mbr",
				  data:{'question_id':question_id,'color_id':color_id,'model_id':model_id},
				  dataType: "html",
				  type:'get',
				  success: function (data) {
					  //$this.attr("disabled", "true");
				      $("#li").html( data);
					   
					  $("html,body").height($(window).height()).css({"overflow-y": "hidden"});
					  
					   //元分判断
					  $(".Maskc_box ul li i, .total i").each(function() {
						  var flo=$(this).prev('span').text();
						  
						  if($(this).prev('span').text()=='需检测'){
							  $(this).remove();
						  }
					  });
					  //元分判断
					  
					  
					  //报价判断
					  $(".Maskc_box ul li span").each(function() {
						  if($(this).text()=='需检测'){
							  $(".total>span").text('需检测');
							  $(".total>i") .remove();
							  $(this).nextAll().remove();
						  }
					  })
					  //报价判断
					  
					  
					  //判断出现问题
					  $( ".udge3" ).each(function() {
						  var udge3=$(this).text()
						  console.log(udge3);
						  if(udge3=='更换屏幕'){
							  $(this).parent().parent().prev().find('b').remove()
						  }else{
							  $(this).parent().parent().prev().find('span').remove()
						  }
					  });
					  
					  //判断出现问题
					  
					  //收回
					  $(".lili_c_ico>span").click(function(){
						  $("#li").fadeOut(100);
						  $(".Maskc").fadeOut(100);
						  $("html,body").css({"overflow-y": "auto",'height':'auto'});
						  //$("#kk").show();
						  //event.stopPropagation();
					  })
					   //收回
					  
					  
					  
					  
				  }
			  });	

}


</script>
</html>