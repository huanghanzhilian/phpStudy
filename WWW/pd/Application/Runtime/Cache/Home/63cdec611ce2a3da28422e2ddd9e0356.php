<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-邀请有礼-我的优惠码</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public_rem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/activity.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>


<style>

</style> 

</head>
<body style=" background:#cd60bd;">
<div class="header">
    <span onclick="window.history.back()"></span>
    <h1>邀请有礼-我的优惠码</h1>
</div><!--头-->
<div class="yaoqingh_box yaoqingh_box_a">
   <div class="maojing">
       <div class="maojingll">
           <strong>您的优惠码:</strong>
           <h1><?php echo ($arr["yonghu_ma"]); ?></h1>
       </div>
   </div>
   
   <form method="post" action="/Home/Shifu/fsyhmadd" onsubmit="return Checked()">
            <div class="fnemko_yiyu">
                <a class="wang_fqan" id="tankop_ju"  href="/Home/Index/shouzhuc_share/yonghuwx_id/<?php echo ($yonghuwx_id); ?>">分享给您的好友</a>
                <div class="wang_fqan">
                    <div class="wang_fqan_nei">
                        <input type="hidden" name="youhuima" id="youhuima" value="">
                        <input type="hidden" name="user_id" value="">
                        <div class="bmcrft">
                            <input type="tel" class="phone_ing tipsrr" name="phone" id="phone" placeholder="请输入手机号码" autocomplete="off">
                        </div>
                        <input class="wang_fqan wang_fqan2" type="submit" value="发送优惠码给您的好友">
                    </div>
                </div>
            </div>
        <input type="hidden" name="__hash__" value="e49aa401669a7b31b0be57b83d65c575_26e71f62d6cd96a14ac37711051a5e7e">
    </form>
   
   
   
</div>

<script> 





var checkSubmitFlg = false;
function Checked(){

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

	
	 if (!checkSubmitFlg) {
		   checkSubmitFlg = true;
		   return true;
	   }else{
		   alert("抱歉不能反复提交");
		   return false;
	   }
	
	//return true;
}

function kkljk(){
wx.onMenuShareTimeline({
    title: '', // 分享标题
    link: '', // 分享链接
    imgUrl: '', // 分享图标
    success: function () { 
        alert(1)// 用户确认分享后执行的回调函数
    },
    cancel: function () { 
        // 用户取消分享后执行的回调函数
    }
});
}
</script>
</body>
</html>