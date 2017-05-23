<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
<title>维百士-订单状态</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<meta name="format-detection" content="telephone=no" />
<link rel="shortcut icon" href="/Public/img/ioc/16.ico"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<script>
function Checkedr(){
	$("html,body").height($(window).height()).css({"overflow-y": "hidden"});
	$(window.document.body).append('<div class="f_bz"><div class="f_bz_top f_bz_top_a">您确认取消订单吗？</div><ul class="pubcvt"><li id="qberc1" class="pubcvt_v eryv" data="no确定">确定</li><li id="xqux" class="pubcvt_v">取消</li></ul></div><div class="Maskc3" style="display:block"></div>');  
	$("#qberc1").click(function(){
		$(this).attr('data','确定')
		$('#qudm').click()
		$("html,body").css({"overflow-y": "auto",'height':'auto'});
		$(".f_bz").remove();
		$(".Maskc3").remove();
	})
	
	$("#xqux").click(function(){
	    $("html,body").css({"overflow-y": "auto",'height':'auto'});
		$(".f_bz").remove();
		$(".Maskc3").remove();
	})
	
	if($("#qberc1").attr('data')=='no确定')
	{
		return false;
	}else{
		return true;
	}
	//return true;
	return false;	
}


$(function(){
	var p_nall=$(".zt_ico>ul>li>span").text();
	$(".zt_ico>ul>li>span").each(function(){
		if($(this).text()==""){
			$(this).parent().remove();
		}
		//console.log(p_nall.parent().html());
	})
	var lkj_1=$('.zt_ico>ul>li:last-child').height();
	$('.zt_ico>ul>em').height(lkj_1)
	
	
	if($("#youh_xq").text()==''){
		$("#youh_wz").remove();
		$("#yuanpp").remove();
	}else{
		$("#youhui_lj").remove();
	}
	
	var quxiaopp=$(".jiedan").text();
	var quxiaoppr = $.trim(quxiaopp)
	if(quxiaoppr==''||quxiaoppr=='交易完成'){
		$(".youhui_bott").remove();
	}
	//console.log(quxiaopp);

    
})
</script>
<style>
.youhui_bott{ position: fixed; bottom:60px; width:100%; text-align:center; color:#3e7edb;}
.youhui_bott a{color:#3e7edb;}
#youhui_lj{ }
#youh_wz{}
.youh_xq{ color:#ff8821;}
</style>
</head>
<body>
<div class="header">
    <span><a href="/Home/Index/dingdan"></a></span>
    <div class="rder_sw">
        <ul>
            <li>
                <a  class="on" href="http://m.weibaishi.com/anarchy/<?php echo ($id); ?>">订单状态</a>
            </li>
            <li>
                <a href="http://m.weibaishi.com/details/<?php echo ($id); ?>">订单详情</a>
            </li>
        </ul>
    </div>
</div><!--头-->
<div class="content">
    <div class="content_con">
    <div class="zt_ico">
         <ul><em></em><i></i>




            <li><?php echo ($xo_timew); ?><span><?php echo ($xo_time); ?></span>  
            <p><?php echo ($xo_timex); ?></p>
            </li>
			<li><?php echo ($l); ?><span><?php echo ($qx_time); ?></span>
            <p><?php echo ($lx); ?></p>
            </li>
            <li><?php echo ($po_timew); ?><span><?php echo ($po_time); ?></span>
            <p><?php echo ($po_timex); ?></p>
            </li>
            <li><?php echo ($jo_timew); ?><span><?php echo ($jo_time); ?></span>
            <p><?php echo ($jo_timex); ?></p>
            </li>
            <li><?php echo ($ko_timew); ?><span><?php echo ($ko_time); ?></span>
            <p><?php echo ($ko_timex); ?></p>
            </li>
            <li><?php echo ($ho_timew); ?><span><?php echo ($ho_time); ?></span>
            <p><?php echo ($ho_timex); ?></p>
            </li>
			 <li><?php echo ($fk_timew); ?><span><?php echo ($fk_time); ?></span>
            <p><?php echo ($fk_timew); ?></p>
            </li>
        </ul> 
    </div>
    
    





	<!--<?php echo ($xo_timew); echo ($xo_time); ?> <br /><br />
	<?php echo ($po_timew); ?>	<?php echo ($po_time); ?><br /><br />  
	<?php echo ($jo_timew); ?>	<?php echo ($jo_time); ?><br /><br />
    
	<?php echo ($ko_timew); ?>	<?php echo ($ko_time); ?><br /><br />
	<?php echo ($qo_timew); ?>	<?php echo ($qo_time); ?><br /><br />
	<?php echo ($ho_timew); ?>	<?php echo ($ho_time); ?><br /><br />-->

	
    </div>
</div>

<div class="youhui_bott">
    <a id="youhui_lj" href="/Home/Index/youhuiquan/id/<?php echo ($id); ?>"><?php echo ($youhui); ?></a>
	<span id="youh_wz">已优惠：</span><span id="youh_xq" class="youh_xq"><?php echo ($amountt); ?></span><span id="yuanpp" class="youh_xq"> 元</span>
</div>

<div class="jiedan">
    <div class="jiedan_box clearfix">
       <?php if(strtoupper($gg) == 去付款): ?><form method="post" action="/Home/Payy/index.html">
					<input type="hidden" name="ddh" value="<?php echo ($arr1["ddh"]); ?>">
					<button class="on" style="width:100%;height:50px;display:block;background-color:#3e7edb;color:#fff; font-size:14px;"  type="submit" ><?php echo ($gg); ?> <b> ￥<?php echo ($amount); ?></b></button>
			</form>
	<?php elseif(strtoupper($s) == 取消订单): ?> 
			<form method="post" action="/Home/Index/quxiaodingdan/" onSubmit="return Checkedr()">
				    <input type="hidden" name="id" value="<?php echo ($arr1["id"]); ?>">
					<button class="on" id="qudm" style="width:100%;height:50px;display:block;background-color:#3e7edb; color:#fff; font-size:14px;"  type="submit" ><?php echo ($s); ?></button>
			</form>
	<?php else: endif; ?>
		    <?php echo ($ch); ?>
			<?php echo ($a); ?>
			
    </div>
</div>
</body>
</html>