<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>产品库管理_颜色</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/Admin_modify.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
</head>
<body class="body1_color">
<div class="header public_width">
    <h1 class="header_h1">产品库 &gt; 手机维修 &gt; <?php echo ($model_name); ?> &gt; 颜色</h1>
</div>

<div class="container public_width">
    <!--公共返回-->
    <div class="Return">
        <!--<span class="Return_button cursor" onClick="window.history.back()">返回</span>-->
        <a class="Return_button" href="/Admin/Shangpin/model/brand_id/<?php echo ($brand_id); ?>">返回</a>
    </div>
    <!--公共返回-->
    
    
    
    <div class="" id="bikuss">
        <ul class="zhuti_rom zhuti_rom_a1">
            <h2 class="erji_h2">已选颜色</h2>
                <li class="">
                    <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><span class="Return_button_a1 Return_button_a2"><?php echo ($kk["color_name"]); ?></span><?php endforeach; endif; ?>
                </li>
            <form method="post" action="/Admin/Shangpin/yanseadd" onSubmit="return Checked();">
                
                <h2 class="erji_h2">请选择颜色</h2>
                <li class="">
                    <?php if(is_array($arr2)): foreach($arr2 as $key=>$ll): ?><span class="Return_button_a1 Return_button_a2 color_ya"><?php echo ($ll["color_name"]); ?></span>
                        <input class="color_ya_input" type="checkbox" name="color_id[]" value='<?php echo ($ll["color_id"]); ?>'><?php endforeach; endif; ?>
                </li>
                
                <input type="hidden" name="model_id" value='<?php echo ($model_id); ?>'>
		        <input type="hidden" name="brand_id" value='<?php echo ($brand_id); ?>'>
                <li class="li_list_conm">
                <input class="append_cp_anniu_but" type="submit" value='确认'>
                </li>
	        </form>
        </ul>
    </div>
    
</div>


<script>
$(function(){
	
	$(".color_ya").click(function(){
		if($(this).hasClass('on')){
			$(this).removeClass('on')
			$(this).next('input').attr("checked",false);
		}else{
		    $(this).addClass('on')
		    $(this).next('input').attr("checked",true);
		};
	})
	
	
	
	
})

function Checked(){
	
	
	var nnmuo=$("input.color_ya_input[type='checkbox'][checked]").length;
	if(nnmuo<1){
		alert('您还没选择颜色')
		return false;
	}
	
	
	return true;
}
</script>





</body>
</html>