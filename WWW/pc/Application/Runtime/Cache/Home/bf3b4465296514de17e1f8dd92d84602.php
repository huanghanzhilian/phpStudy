<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-手机维修-型号搜索</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
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
    <div class="search_br_fd" id="search_br_fd">
        <div class="search_br_fd_r_1">
            搜索
        </div>
        <div class="search_br_fd_r_2">
            <i></i>
            <input type="text" id="sea" onkeyup="sear()" placeholder='搜索您需要维修的设备型号'>
            <b id="vbsyc"></b>
        </div>
        
    </div>
    
</div><!--头-->
<div class="content">
    <div class="content_con">
        <div class="ky" id='ky'>
        
        </div>
        <div class="searching-help">
            <div class="history">
                <h2>历史搜索</h2>
                <ul class="clearfix">
                    <li>
                    <input id="vstory" type="hidden" name="vstory" value="<?php echo ($story); ?>">
                       
                    </li>
                </ul>
            </div>
            <div class="hot">
                <h2>热门搜索</h2>
                <ul class="clearfix">
                    <li>
                        <a href="#">其他手机</a>
                        <a href="#">其他手机</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
var vstory=$("#vstory").val()
var wsfgfa= vstory.split(",");
for(var i=0; i<wsfgfa.length;i++){
	//console.log(wsfgfa[i])
	//$(".history li a").text(wsfgfa[i])
	$(".history li").append('<a href="javascript:void(0);">'+wsfgfa[i]+'</a>')
}
$(".history li a").click(function(){
	$("#sea").val($(this).text());
	
	$("#vbsyc").addClass('vbsyc')
	$("#sea").keyup()
	sear()
})

$(".ky ul li.nubes").click(function(){
	

})

//console.log(wsfgfa)
	function sear(){
		var sea=document.getElementById("sea").value
		//alert(sear)
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Index/searchajax_a/sea/"+sea,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
				document.getElementById('ky').innerHTML=ajax.responseText
				$(".ky ul li.nubes").click(function(){
	                $("#sea").val($(this).find('a').text());
				    $("#vbsyc").addClass('vbsyc')
					$("#sea").keyup()
					sear()
				})
				
			}
		}
	
	}

	function ysa(id){
		//alert(id)
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Index/colorr/model_id/"+id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
				document.getElementById('ky').innerHTML=ajax.responseText
				
			}
		}
	
	}
	$("#sea").keyup(function(){
		var shurcd=$(this).val().length;
		if(shurcd>=1){
			$("#vbsyc").addClass('vbsyc')
			$("#ky").show();
			$(".searching-help").hide();
		}else{
			$("#vbsyc").removeClass('vbsyc')
			$("#ky").hide();
			$(".searching-help").show();
		}
		$("#vbsyc").click(function(){
			$(this).removeClass('vbsyc');
			$("#sea").val('');
			$("#ky").hide();
			$(".searching-help").show();
		})
	})
    
	
	/*$(function(){
	//读取cookie
	var res=document.cookie.substring(1);
	alert("当前cookies="+"("+res+")");
	
	//判断是否来过
	if(res!="http://weibaishi.com/"){
		alert("没有登录过");
		$('#mask, #searchTip, #searchTip div:eq(0)' ).show();
		$('#searchTip div a').click(function(){
			var currentStep=$(this).parent();
			currentStep.hide();
			currentStep.next().show();
		})

		$('#searchTip div a:last, #searchTip div span').click(function(){
			$('#mask, #searchTip').hide();
		})
		//添加cookie
		var oDate=new Date();
		oDate.setDate(oDate.getDate()+30);
		document.cookie="name=www.open.com.cn;expires="+oDate;
	}


})*/
	

</script>