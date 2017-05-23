<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-手机维修-客服报修</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
</head>
<body>
<div class="header">
    <span onclick="window.history.back()"></span>
    <h1>客服报修</h1>
    
</div><!--头-->
<div class="content">
    <div class="content_con">
        <form method="post" action="/Home/Index/ksxdadd.html" onSubmit="return Checkedr()">
            <div class="row_cr">
                <input id="type_sy" type="hidden" name="type_sy" value="">
                <ul>
                   
                    <li id="kcr_cu_1" class="kcr_cu">品牌/机型</li>
					<div id='list'></div>
                    
                    
                    <p>问题故障:</p>
                    <li class="arca_x"><div class="arca"><textarea name="content" id="content" rows="" cols="" placeholder="您可以描述手机的故障或者其他要求（选填）"></textarea></div></li>
                    <div class="arca_x_a1">
                    <li>
                        <label for="username">姓名：</label>
                        <span><input id="username" name="username" placeholder="我们怎么称呼您" type="text" autocomplete="off"/></span>
                    </li>
                    <li class="">
                        <label for="tell">手机：</label>
                        <span><input id="tell" name="sc_name" placeholder="能联系到您的手机号码" type="tel" autocomplete="off"/></span>
                    </li>
                    </div>
                </ul>
                <div class="prompt_1">
                    <strong>提示: 提交订单后（09:00—20:00）内将有来自北京区号010的电话与您联系确认详情</strong>
                </div>
                <button class="submit_sd" type="submit">提交</button>
            </div>
            
            <input id="pinbb" type="hidden" name="pinbb">
            <input id="pinbb_c" type="hidden" name="pinbb_c">
            <input id="qerreb" type="hidden" name="qerreb">
        </form>
        
    </div>
</div>
<script>
function jixing(brand_id){
	var ajax=new XMLHttpRequest()
		ajax.open("get","/Home/Index/ksxdjx/brand_id/"+brand_id,true)
		ajax.send()
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4 && ajax.status==200){
			document.getElementById('li_box').innerHTML=ajax.responseText
			$(".mjbrcv").click(function(){
					$("#pinbb_c").val($(this).text());
					$("#kcr_cu_1").text($(this).text())
					$("#dest_y,.Maskc1").hide();
					$("html,body").css({"overflow-y": "auto",'height':'auto'});
				})
		}
	}
}



function Checkedr(){
	/*if($("#pinbb").val()==''){
		$("#kcr_cu").click();
		return false;
	}*/
	if($("#pinbb_c").val()==''){
		$("#kcr_cu_1").click();
		return false;
	}
	
	if($("#content").val() =='' || $("#content").val() == null){
		$("#content").focus().addClass("tips");
		return false;
	}
	
	if($("#username").val() =='' || $("#username").val() == null){
		$("#username").focus().addClass("tips");
		return false;
	}
	var tel =$("#tell").val();
	var mobile = /^0{0,1}(14[0-9]|17[0-9]|13[0-9]|15[0-9]|18[0-9]|14[0-9])[0-9]{8}$/;
	
	if(!mobile.test(tel)){
		$("#tell").val('');
		$("#tell").attr("placeholder", "请输入正确的手机号码");
		$("#tell").one("blur", function(){
			$("#tell").attr("placeholder", "请输入能联系到您的手机号");
		});
		$("#tell").focus().addClass("tips");
		return false;
	}	
	//tanc
	$("html,body").height($(window).height()).css({"overflow-y": "hidden"});
	$(window.document.body).append('<div class="f_bz"><div class="f_bz_top">您的报修订单已成功提交，客户稍后将与您联系。</div><ul><li data="no确定" id="qberc">确定</li></ul></div><div class="Maskc3" style="display:block"></div>');  
	$("#qberc").click(function(){
		$(this).attr('data','确定')
		$('.submit_sd').click()
		$("html,body").css({"overflow-y": "auto",'height':'auto'});
		$(".f_bz").remove();
		$(".Maskc3").remove();
	})
	
	if($("#qberc").attr('data')=='no确定')
    {
        return false;
    }else{
		return true;
	}
	/*return true;*/	
}


$(function(){
    $("#kcr_cu_1").click(function(){
	    $(".Maskc1").remove();
		$("#dest_y").remove();
		$(window.document.body).append('<div class="tc_dizhi dfgh" id="dest_y" style="display:block"><div class="tc_dizhi_top"><span></span><h1 id="dat_sj">请选择</h1></div><ul class="on" id="li_box"><?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li class="mjbr" onClick="jixing(<?php echo ($kk["brand_id"]); ?>)"><?php echo ($kk["brand_name"]); ?></li><?php endforeach; endif; ?></ul></div><div class="Maskc1" style="display:block"></div>')
		$('.Maskc1').bind( "touchmove", function (e) {
			e.preventDefault();
		});
		$("html,body").height($(window).height()).css({"overflow-y": "hidden"});
		//关闭按钮
		$(".tc_dizhi span").click(function(){
			$("#dest_y,.Maskc1").hide();
			$("html,body").css({"overflow-y": "auto",'height':'auto'});
		})
				
	})
	
})
</script>
</body>
</html>