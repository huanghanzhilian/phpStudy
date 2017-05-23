<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-邀请有礼-领取优惠码</title>
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
.maojingll_as{  line-height:20px; vertical-align:middle; display: inline-block;}
.maojingll_as strong,.maojingll_as div.fuzhi_ai{ display:block; text-align:center; margin:0.1rem auto; width:80%;}
.maojingll_as div.fuzhi_ai_ppo{ text-align:right; color:#fff000;}





.maojingll_as div.fuzhi_ai.fmlo_hao_a1{ background:red;}

.maojingll_as div.fuzhi_ai img{ width:0.8rem; height:0.8rem; border-radius: 100%; border:2px solid rgba(113,93,187,0.2);}
.wang_fqan3{ display:inline-block; margin-top:0px; background:rgba(113,93,187,0.5);}
.maojing1{ background: url(../../../../Public/img/lnv_polite_img/lnv_polite19.png) center top no-repeat; background-size: 100%; height:3rem; line-height:3rem;}
.maojingll_as strong{ color:#fff; font-weight:normal; font-size:0.12rem; text-align:left; line-height:0.18rem;}
.maojingll_as strong span{ color:red;}
.maojingll_as div.fuzhi_ai input{ background: none; display:inline-block; vertical-align:middle;}
.maojingll_as div.fuzhi_ai input.fuzhi_text{ font-size:0.22rem; color:#fff; padding:0 12px; width:1.4rem; text-align:center; letter-spacing: 0.03rem;}
.maojingll_as div.fuzhi_ai input.anji_pro{ width:0.53rem; height:0.27rem; background:rgba(113,93,187,0.5);  border-radius: 4px; color:#fff;}
.huo_guicc_con1 p{ text-align:center;}
.fmlo_hao_a1{ margin-top:0px;}
</style>

</head>
<body style=" background:#cd60bd;">
<div class="header">
    <span onclick="window.history.back()"></span>
    <h1>邀请有礼-领取优惠码</h1>
</div><!--头-->
<div class="yaoqingh_box yaoqingh_box_a">
   <div class="maojing maojing1">
       <div class="maojingll_as">
           <div class="fuzhi_ai">
               <img src="<?php echo ($arr["avatar"]); ?>">
           </div>
           <strong>您的好友宝宝（<?php echo ($arr["username"]); ?>），分享了一个20元的优惠码给您，下单时输入该优惠码，<span>维修费立减20！</span></strong>
           <div class="fuzhi_ai">
               <input class="fuzhi_text" type="text" id="biao1" value="<?php echo ($arr["yonghu_ma"]); ?>"/>
               <input class="anji_pro" type="button" onClick="copyUrl2()" value="复制" />
           </div>
           <div class="fuzhi_ai">
               <a class="wang_fqan wang_fqan2 wang_fqan3" href="http://m.weibaishi.com/">立即使用</a>
           </div>
           <div class="fuzhi_ai fuzhi_ai_ppo">
               <span id="tankop_ju">立即分享</span>
           </div>
       </div>
   </div>
   
   
    
    <div class="huo_guicc">
       <h1 class="hun_hhgyu">更多优惠活动及手机预约维修请关注
维百士微信公众号</h1>
       <div class="huo_guicc_con huo_guicc_con1">
           <p>
               微信搜索【维百士】或扫描下方二维码关注
           </p>
           
       </div>
   </div>

   <strong class="fmlo_hao fmlo_hao_a1">维百士公众号</strong>
   
   <div class="erweo_lk">
       <img src="../../../../Public/img/lnv_polite_img/lnv_polite5.png">
   </div>
   <div class="erweo_lk erweo_lk1">
       <img src="../../../../Public/img/images/text_dibu_slpgun2.png">
   </div>
   <div class="erweo_lk erweo_lk2">
       <img src="../../../../Public/img/images/text_dibu_slpgun1.png">
   </div>
   
   
   
</div>

<script> 

$(function(){
	$("#tankop_ju").click(function(){
		$(window.document.body).append('<div class="quanbop"><span></span></div>');
		$('.quanbop').bind( "touchmove", function (e) {
			e.preventDefault();
		});
		
		$(".quanbop span").click(function(){
			$(".quanbop").remove();
		})
		
	})
})


function copyUrl2()
{
var Url2=document.getElementById("biao1");
Url2.select(); // 选择对象
document.execCommand("Copy"); // 执行浏览器复制命令
alert("已复制好，可贴粘。");
}


</script>
</body>
</html>