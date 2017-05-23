<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-手机维修-售后订单</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
</head>
<body style="background:#f5f5f5">
<div class="header ">
    <a href="/Home/Shifu/daiwancheng"><span></span></a>
    <h1>售后订单<!--<?php echo ($my); ?>--></h1>
    <!-- <em>去购买</em> -->
</div><!--头-->
<div class="content">
    <div class="content_con">
        <!--tab头-->
        <div class="shifudu_top">
            <ul class="pubcvt shifudu_top_ul shifudu_top_ul_gd">
                <li class="pubcvt_v shifudu_top_li shifudu_top_li_1">
                    <a href="javascript:void(0)" onclick='ass(1)'>售后中<span>(<?php echo ($nums1); ?>)</span></a>
                </li>
                <li class="pubcvt_v shifudu_top_li">
                    <a href="javascript:void(0)" onclick='ass(3)'>已完成<span>(<?php echo ($nums2); ?>)</span></a>
                </li>
            </ul>
        </div>
        <!--tab头-->
    
        <div id='e'>
            <div class="ceomer_com">
                <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><a class="shifu_aclc" href="/Home/Shifu/shouhouxq/id/<?php echo ($kk["id"]); ?>">
                        <div class="rnmbur">
                            <ul>
                                <li>
                                     <span class="chuangmbr"><?php echo ($kk["dd"]); ?></span>
                                </li>
                                <li>
                                     机型：<span class="chuangmbr"><?php echo ($kk["model_name"]); ?></span>
                                </li>
                                <li>
                                     故障描述：<span class="chuangmbr"><?php echo ($kk["contentt"]); ?></span>
                                </li>
                            </ul>
                        </div>
                    </a><?php endforeach; endif; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
function ass(id){
			//alert(fk);
			var ajax=new XMLHttpRequest()
				ajax.open("get","/Home/Shifu/shouhou_wc/zt/"+id,true)
				ajax.send()
				ajax.onreadystatechange=function(){
					if(ajax.readyState==4 && ajax.status==200){
						document.getElementById('e').innerHTML=ajax.responseText
					}
				}
	} 


$(function(){
	$(".shifudu_top_li").click(function(){
		if($(this).hasClass('shifudu_top_li_1')){
			//$(this).removeClass('shifudu_top_li_1')
			//$(this).find('b').css({'background-color':'#e6e6e6'})
		}else{
		$(this).addClass('shifudu_top_li_1').siblings().removeClass('shifudu_top_li_1')
		
		};
	})
	//$(".shifudu_top_li").eq(1).click()
	//$(".shifudu_top_li>a").eq(1).click()
})
</script>