<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-邀请有礼-手机注册</title>
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
<script> 
$(function() {   		
	var lkj=$(document).height();
	var cdkd=lkj-46;
	
	$(".yaoqingh_box").height(cdkd);
});
</script>
<style>

</style>

</head>
<body>
<div class="header">
    <span onclick="window.history.back()"></span>
    <h1>邀请有礼-手机注册</h1>
</div><!--头-->
<div class="yaoqingh_box">
   <div class="huio_kiuop">
       <h1 class="shouch_po">手机注册</h1>
       <div class="for_biaop">
           <form action="/Home/Index/activ_rule_shouzhuc_b.html/" method="post" onSubmit="return Checked();">
               <!--<div class="row" id="name_4">
			      <label class="bqf">姓名：</label><div class="rootu"><input type="text" class="txt" name="u_name" id="u_name" placeholder="请输入姓名" autocomplete="off"/></div>
			   </div>-->
               <ul class="biaok_llp">
                   <li>
                   </li>
                   <li>
                       <input type="text" class="tipsrr" name="u_name" id="u_name" placeholder="请输入您的手机号码" autocomplete="off"/>
                   </li>
                   <li>
                       <input type="text" class="tipsrr" name="u_name" id="u_name" placeholder="输入验证码" autocomplete="off"/>
                   </li>
                   <button type="submit" name="submit" class="sa_kuive">登录</button>
               </ul>
               
           </form>
       </div>
   </div>
   
   <div class="butt_liuchang">
       <span class="on">手机注册</span><em></em><span>微信认证</span><em></em><span>获取优惠码</span>
   </div>
   
</div>
</body>
</html>