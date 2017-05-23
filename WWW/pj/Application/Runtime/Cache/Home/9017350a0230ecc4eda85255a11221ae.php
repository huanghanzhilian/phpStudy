<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
<title>维百士-手机维修-投诉反馈</title>
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
    <h1>投诉反馈</h1>
    
</div><!--头-->
<div class="content">
    <div class="content_con">
        <div class="public_lrcbr">
            <div id='list_b'>
                
                 <!--<a href='javascript:void(0)'onclick='ass1(1)'>服务投诉</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <a href='javascript:void(0)'onclick='ass(2)'>意见反馈</a><br /><br />-->
                 <form method="post" action="/Home/Index/tousuadd" onSubmit="return Checked_r();">
                      <div class="fuxuan_a">
                          <ul class="pubcvt ckder">
                              <li class="pubcvt_v">
                                  <label>服务投诉</label><span></span>
                                  <input class="tijfs" type="radio" name="tijfs" value="服务投诉" id="fwts" checked="checked" />
                              </li>
                              <li class="pubcvt_v">
                                  <label>意见反馈</label><span></span>
                                  <input class="tijfs" type="radio" name="tijfs" value="意见反馈" id="yjfk" />                          
                              </li>
                          </ul>
                      </div>
                      <div class="tousyna" id="tous_dc">
                          <input class="input_cb" type="text" name="name" id="name_c" placeholder="您所要投诉的工程师的姓名或电话(必填）" />
                      </div>
                      <div class="tousyna_2" id="tous_dc_2">
                          <textarea class="textarea" name="content" id="content" placeholder="请填写您遇到的问题,我们会认真对待您的反馈，并将尽快处理相关问题，不断提升服务品质！"></textarea>
                      </div>
                      <div class="tousyna_3">
                          <label class="fl shouj_n">
                              <span>手机</span><b></b>
                              <ul class="zolexc">
                                  <li>手机</li>
                                  <li>座机</li>
                                  <li>Q Q</li>
                                  <li>邮箱</li>
                              </ul>
                          </label>
                          <div class="shoujkc">
                              <input class="input_cb" type="tel" name="phone" id="phone" placeholder="请留下您的手机号" />
                          </div>
                      </div>
                      <input id="type_c" type="hidden" name="type" value="手机"/>
                          <button class="submit_sd" type="submit" >提交</button>
                 </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
$(function(){
	
	$( ".tijfs" ).each(function(){
		if($(this).attr('checked')){
			$(this).prev().addClass('on')
		}
	})
	$(".pubcvt_v").click(function(){
		$(this).find('input').attr("checked",true);
		$( ".tijfs" ).each(function(){
			if($(this).attr('checked')){
				$(this).prev().addClass('on')
			}else{
				$(this).prev().removeClass('on')
			}
		})
		
		if($("#yjfk").attr('checked')){
			$("#tous_dc").remove();
			$("#content").attr("placeholder", "请填写您遇到的问题或意见建议，您的反馈对我们非常重要，是我们前进的动力").val('');
		}else{
			$("#tous_dc").remove();
			$("#tous_dc_2").before('<div class="tousyna" id="tous_dc"><input class="input_cb" type="text" name="name" id="name_c" placeholder="您所要投诉的工程师的姓名或电话(必填）" /></div>')
			$("#content").attr("placeholder", "请填写您遇到的问题,我们会认真对待您的反馈，并将尽快处理相关问题，不断提升服务品质！").val('');
		}
	})
	
	$(".shouj_n>span").click(function(event){
		if($(this).hasClass('on')){
			$(this).removeClass('on')
			$(".zolexc").hide();
			$(".shouj_n>b").css("background-image","url('/Public/img/images/shlk_1_07.png')")
		}else{
			$(this).addClass('on')
			$(".zolexc").show();
			$(".shouj_n>b").css("background-image","url('/Public/img/images/shlk_2_07.png')")
		}

		$(".zolexc>li").click(function(){
			$(".shouj_n>span").removeClass('on')
			$(".zolexc").hide();
			$(".shouj_n>span").text($(this).text());
			$("#type_c").val($(this).text());
			var fangs_c = $(".shouj_n>span").text();
			if(fangs_c=='手机'){
				$("#phone").attr("placeholder", "请输入正确的手机号码")
			}
			if(fangs_c=='座机'){
				$("#phone").attr("placeholder", "请输入座机如/010-82539907")
			}
			if(fangs_c=='Q Q'){
				$("#phone").attr("placeholder", "请输入你正确的QQ号")
			}
			if(fangs_c=='邮箱'){
				$("#phone").attr("placeholder", "请输入你正确的邮箱")
			}
		})
		event.stopPropagation();
	})
	
	$("body").click(function(){
		$(".shouj_n>span").removeClass('on')
		$(".zolexc").hide();
		$(".shouj_n>b").css("background-image","url('/Public/img/images/shlk_1_07.png')")
	})
	
	
})
function Checked_r(){
	if ( $("#name_c").length > 0 ) {
		var qxzdz=$("#name_c").val();
		if(qxzdz =='' || qxzdz == null){
			$("#name_c").focus().addClass("tips");
			$("#name_c").attr("placeholder", "请填写您所要投诉的工程师的姓名或电话");
			return false;
		}
	}
	if($("#content").val() =='' || $("#content").val() == null){
		$("#content").focus().addClass("tips");
		$("#content").attr("placeholder", "请填写您遇到的问题。");
		return false;
	}
	
	var fangs_c = $(".shouj_n>span").text();
	if(fangs_c=='手机'){
		var tel =$("#phone").val();
		var mobile = /^0{0,1}(14[0-9]|17[0-9]|13[0-9]|15[0-9]|18[0-9]|14[0-9])[0-9]{8}$/;
		//if(tutle_n.value==''){ alert("请填写您的姓名！"); tutle_n.focus(); return false; }
		if(!mobile.test(tel)){
			$("#phone").val('');
			$("#phone").attr("placeholder", "请输入正确的手机号码");
			$("#phone").one("blur", function(){
				$("#phone").attr("placeholder", "请输入能联系到您的手机号");
			});
			$("#phone").focus().addClass("tips");
			return false;
		}	
		
	}
	if(fangs_c=='座机'){
		var tel =$("#phone").val();
		var mobile = /^((\d{3,4}\-)|)\d{7,8}(|([-\u8f6c]{1}\d{1,5}))$/;
		if(!mobile.test(tel)){
			$("#phone").val('');
			$("#phone").attr("placeholder", "请输入座机如/010-82539907");
			$("#phone").one("blur", function(){
				$("#phone").attr("placeholder", "请输入座机如/010-82539907");
			});
			$("#phone").focus().addClass("tips");
			return false;
		}	
	}
	if(fangs_c=='Q Q'){
		var tel =$("#phone").val();
		var mobile = /^\d{5,10}$/;;
		if(!mobile.test(tel)){
			$("#phone").val('');
			$("#phone").attr("placeholder", "请输入你正确的QQ号");
			$("#phone").one("blur", function(){
				$("#phone").attr("placeholder", "请输入你正确的QQ号");
			});
			$("#phone").focus().addClass("tips");
			return false;
		}	
	}
	
	if(fangs_c=='邮箱'){
		var tel =$("#phone").val();
		var mobile = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!mobile.test(tel)){
			$("#phone").val('');
			$("#phone").attr("placeholder", "请输入你正确的邮箱");
			$("#phone").one("blur", function(){
				$("#phone").attr("placeholder", "请输入你正确的邮箱");
			});
			$("#phone").focus().addClass("tips");
			return false;
		}	
	}
	
	
    
    return true;
}



/*	function ass(id){
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Index/fankui/id/"+id,true)
			//alert(model_id); style='display:none'
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('list_b').innerHTML=ajax.responseText
				}
			}
	}
function ass1(id){
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Index/tousu/id/"+id,true)
			//alert(model_id); style='display:none'
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('list_b').innerHTML=ajax.responseText
				}
			}
	}*/
</script>