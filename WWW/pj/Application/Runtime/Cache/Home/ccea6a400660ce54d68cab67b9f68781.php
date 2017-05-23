<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
<title>维百士-手机维修-登入</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
</head>
<body style=" background:#f1f1f1;">
<div class="header">
    <span onclick="window.history.back()"></span>
    <h1>登录</h1>
</div><!--头-->
<div class="content">
    <div class="content_con">
        <div class="dr_logo">
        </div>
<!-- <a href='javascript:void(0)'onclick='y(1)'> 用户登录 </a>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<!-- <a href='javascript:void(0)'onclick='m(2)'>密码登录</a><br /><br /><br />
 -->
<div id='tt'>
    <div class="row row_dr">
	    <label class="bqf">账 号</label><div class="rootu"><input placeholder="请输入下单时预留的手机号" type="tel" name="u_phone" id='u_phone' autocomplete="off"/><span id='sp_u_phone'></span></div>
    </div>
    <div class="row row_dr">
	    <label class="bqf">验证码</label><div class="rootu"><input placeholder="请输验证码"  type="tel" name="nums" id='nums' autocomplete="off"/>
        <!--<input class="" type="button" value="获取验证码" onclick="fs()" disabled= "true " id="yzm" />-->
        <button id="yzm" class="yzm" disabled= "true" onclick="fs()">获取验证码</button></div>
    </div>
	
</div>	
<!--<input id="dengr" class="dengr" type="button" value="登录" disabled= "true " onclick="check()">-->
<button id="dengr" class="dengr" disabled= "true" onclick="check()">登录</button>



    </div>
</div>
</body>
<script type="text/javascript">
		function check(){
			var u_phone=document.getElementById('u_phone').value
			var nums=document.getElementById('nums').value
			/**/
			var ajax = new XMLHttpRequest();  
			//ajax.open("get","/Home/Index/denglu/u_phone/"+u_phone+"/nums/"+nums);
			ajax.open("GET","/Home/Index/denglu?u_phone="+u_phone+"&nums="+nums)
			ajax.send();
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					if(ajax.responseText==2){
						//document.getElementById('sp_u_phone').innerHTML="验证码错误"
						$("#nums").val("");
						$("#nums").focus().addClass("tips");
						$("#nums").attr("placeholder", "验证码错误");
						document.getElementById('sp_u_phone').style.color="red"
					}else{
						location.href="/Home/Index/membercentent";
					}
				}
			}
			
	}
	
function fs(){
			var phone=document.getElementById('u_phone').value;
		//alert(phone);
		var ajax=new XMLHttpRequest()
			//ajax.open("get","/Home/Index/sendSms/phone/"+phone)
			ajax.open("GET","/Home/Index/sendSms?phone="+phone)
			//alert(model_id);/* style='display:none'*/
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('list').innerHTML=ajax.responseText
				}
			}
	}
$(function(){
	var mobile_1 = /^0{0,1}(14[0-9]|17[0-9]|13[0-9]|15[0-9]|18[0-9]|14[0-9])[0-9]{8}$/;
	$("#u_phone").keyup(function(){
		$_tthis=$(this).val();
		if(mobile_1.test($_tthis)){
	        $("#yzm").removeAttr("disabled").addClass("on");
			//console.log(1);
		}else{
			$("#yzm").attr("disabled", "true").removeClass('on');
		}
	});
	$("#yzm").click(function(){
		$(".jsq").remove();
		$(this).removeClass('on');
		$(this).attr("disabled", "true");
		$(this).parent().append('<span class="jsq">重新获取(<em>60</em>)</span>');
		var shuz=$(".jsq>em").text()
		 var wodjs=setInterval(function () {
			shuz=shuz-1;
			$(".jsq>em").text(shuz);
			if(shuz==0){
				//console.log(1);
				clearInterval(wodjs); 
				$(".jsq").hide();
				$("#yzm").removeAttr("disabled").addClass("on");
			}
		},1000);
	});
	
	$("#nums").keyup(function(){
		if(!($(this).val()=="")){
			console.log(1);
			$("#dengr").removeAttr("disabled").addClass("dengr1");
		}else{
			$("#dengr").attr("disabled", "true");
			$("#dengr").removeClass("dengr1");
		}
	})
})
</script>
</html>