<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>产品库管理</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/Admin_modify.css" rel="stylesheet" type="text/css">
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js" type="text/javascript"></script>
<style>
.sonbctf{ display:inline-block;}
.xiubnj{ color:#3e7edb; font-style:normal; background:none; display:inline-block;}
.shan_ico{ width:17px; height:17px; background:url(../../../../Public/img/Admin_modify/delete2.png) center center no-repeat;  background-size: 100%; display:inline-block; vertical-align:middle;}
.cbtty.on{border: 1px solid #3e7edb;  border-radius: 4px;}
</style>
</head>
<body class="body1_color">
<div class="header public_width">
    <h1 class="header_h1">产品库 &gt; 手机维修 &gt; 颜色库
    <a class="youb_mk" href="/Admin/Shangpin/yskuhs/brand_id/<?php echo ($brand_id); ?>">回收</a></h1>
</div>
<div class="container public_width">
    <!--公共返回-->
    <div class="Return">
        <!--<span class="Return_button cursor" onClick="window.history.back()">返回</span>-->
        <a class="Return_button" href="/Admin/Shangpin/model/brand_id/<?php echo ($brand_id); ?>">返回</a>
    </div>
    <!--公共返回-->
    <div class="append_cp">
        <div class="append_cp_box clearfix">
            <form method="post" action="/Admin/Shangpin/coloradd">
                <input class="append_cp_text fl" type="text" name="color_name" placeholder="请填写您要添加的颜色"/>
                <input type="hidden" name="brand_id" value='<?php echo ($brand_id); ?>'>
                <input class="append_cp_anniu fl cursor" type="submit" value='添加'>
            </form>
        </div>
    </div>
    
    <div class="" id="bikuss">
        <ul class="zhuti_rom zhuti_rom_a1">
                
                <li class="">
                    <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><span class=" Return_button_a2 sonbctf">
                        <form style="display:inline-block;" method="post" action="/Admin/Shangpin/colorup">
                            <input readonly="true" type="text" value="<?php echo ($kk["color_name"]); ?>" name="color_name"  style="width:50px;" class="Return_button_a1 cbtty">
                            <input type="hidden" name="color_id" value='<?php echo ($kk["color_id"]); ?>'>
                            <input type="hidden" name="brand_id" value='<?php echo ($brand_id); ?>'>
                            <input style="display:none;" class="xiubnj wobxun_cx_a" type="submit">
                            <em class="xiubnj cursor wobxun">修改</em>
                            <input type="reset" style="display:none;" class="xiubnj cursor wobxun_cx" value="撤销">
                        </form>
                        
                        <a class="shan_ico" href="/Admin/Shangpin/ysshanchu/color_id/<?php echo ($kk["color_id"]); ?>/brand_id/<?php echo ($brand_id); ?>" onclick="if(confirm('确定删除?')==false)return false;"></a>
                    </span><?php endforeach; endif; ?>
                </li>

        </ul>
    </div>
    
    
</div>
<script>
$(function(){
	$(".wobxun").click(function(){
		$(this).hide().siblings('.wobxun_cx,.wobxun_cx_a').show();
		$(this).parents('form').find("input[name='color_name']").removeAttr("readonly").addClass('on');
	});
	$(".wobxun_cx").click(function(){
		$(this).hide().siblings("input[type='submit']").hide();
		$(this).siblings('.wobxun').show();
		$(this).parents('form').find("input[name='color_name']").attr("readonly", "true").removeClass('on');
	})
})
</script>




	
</body>
</html>