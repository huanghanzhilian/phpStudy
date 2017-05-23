<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>产品库管理_修改解决方案</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/Admin_modify.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<style>
.sna_bct{ display:inline-block; width:30%; overflow:hidden; height:100%; float:left;
text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}
.sna_bct_con{ text-align:right;}

.cuanhpue_s{ background-image: url(/Public/img/Admin_modify/sec.png); background-position:center center; background-repeat: no-repeat; width:20px; height:20px; background-size: 100%; display:inline-block; vertical-align:middle;}
.cuanhpue_s.on{ background-image:url(/Public/img/Admin_modify/sec2.png)}
.nnbbbcb{ display:none;}
</style>
</head>
<body class="body1_color">
<div class="header public_width">
    <h1 class="header_h1">产品库 &gt; 手机维修 &gt; 苹果 &gt; 问题 &gt; 屏幕问题 &gt; 更换解决方案</h1>
</div>

<div class="container public_width">
    <!--公共返回-->
    <div class="Return">
        <!--<span class="Return_button cursor" onClick="window.history.back()">返回</span>-->
        <a class="Return_button" href="/Admin/Shangpin/question/brand_id/<?php echo ($brand_id); ?>/model_id/<?php echo ($model_id); ?>/question_id/<?php echo ($question_id); ?>/questiontype_id/<?php echo ($questiontype_id); ?>">返回</a>
    </div>
    <!--公共返回-->
    
    
    
    
    <div class="" id="bikuss">
        <ul class="zhuti_rom">
            <form method="post" action="/Admin/Shangpin/ghjjfa" onSubmit="return Checked();">
                
                <h2 class="erji_h2">请选择解决方案</h2>
                <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li class="">
                        <div class="zhuti_rom_list_r fr">
                            <span class="sna_bct"><?php echo ($kk["money"]); ?>元</span>
                            <span class="sna_bct">维修时长：<?php echo ($kk["m_time"]); ?>分钟</span>
                            <span class="sna_bct sna_bct_con">
                                <b class="cuanhpue_s"></b>
                                <input class="nnbbbcb" type="radio" name="plan_id" value='<?php echo ($kk["plan_id"]); ?>'>
                            </span>
                            
                            
                        </div>
                        <strong class="buctrese"><?php echo ($kk["plan_name"]); ?></strong>
                     </li><?php endforeach; endif; ?>
                <input type="hidden" name="question_id" value='<?php echo ($question_id); ?>'>
				<input type="hidden" name="questiontype_id" value='<?php echo ($questiontype_id); ?>'>
                <input type="hidden" name="model_id" value='<?php echo ($model_id); ?>'>
		        <input type="hidden" name="brand_id" value='<?php echo ($brand_id); ?>'>
                <li class="li_list_conm li_list_conm_ppmk">
                <input class="append_cp_anniu_but" type="submit" value='添加'>
                </li>
	        </form>
        </ul>
    </div>
    
</div>

<script>
$(function(){
	$(".zhuti_rom li").click(function(){
		$(this).find('input.nnbbbcb').attr("checked",true);
		$( ".nnbbbcb" ).each(function(index){
			if($(this).attr('checked')){
				$(this).prev().addClass('on');
			}else{
				$(this).prev().removeClass('on');
			}
		});
		
	})
})

function Checked(){
	var nnmuo=$("input.nnbbbcb[type=radio][checked]").length;
	//alert(nnmuo)
	if(nnmuo<1){
		alert('您还选择解决方案')
		return false;
	}
	
	return true;
}
</script>



	
</body>
</html>