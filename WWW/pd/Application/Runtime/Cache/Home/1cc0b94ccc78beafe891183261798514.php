<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
<title>维百士-工程师-推荐客户 Top</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="format-detection" content="telephone=no" />
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public_rem.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>

<script>
$(function(){
	$( ".paixu_pp li" ).each(function( index ) {
		$(this).find('b').text(index+1)
	});
	
	$('ul.munndar').append('<div class="blockmm"><span></span></div>');
	var $block=$(".blockmm")
	$('.munndar li').click(function() {
		var curIndex = $(this).index() , mlValue = '-' + curIndex * 100 + '%';
		$t = $(this);
		leftX = $t.position().left;
		newWidth = $t.width();

		$block.stop().animate({
			left: leftX
			//width: newWidth
		},300);
		$('.paixu_pp').stop().animate({ marginLeft: mlValue });
	})
	
	
})

</script>
</head>
<body>
<div class="header">
   <a href="/Home/Shifu/index"><span></span></a>
    <h1>推荐客户 Top</h1>
</div><!--头-->
<div class="content">
    <div class="content_con content_con_huni">
        <div class="gezxin_top">
            <ul class="pubcvt gezxin_top_dis">
                <li class="pubcvt_v">
                    <a href="#">
                        <img src="/Public/<?php echo ($yanzheng["img"]); ?>">
                    </a>
                    <em>
                        <h1><?php echo ($yanzheng["user_username"]); ?></h1>
                        <span>推荐客户:<?php echo ($arr1["cj"]); ?>次</span>
                    </em>
                </li>
                
            </ul>
            <div class="butt_box">
                <ul class="pubcvt munndar">
                    <li class="pubcvt_v on">
                        北京排行
                    </li>
                    <li class="pubcvt_v">
                        全国排行
                    </li>
                </ul>
            </div>
        </div>
        <div class="paixu_pp clearfix">
            <div class="huadonhmk">
                <ul>
                    <?php if(is_array($arr)): foreach($arr as $key=>$k): ?><li>
                            <b>1</b><img  src="/Public/<?php echo ($k["img"]); ?>" width=20 height=20 /><span><?php echo ($k["user_username"]); ?></span><div class="fr"><?php echo ($k["cj"]); ?></div>
                        </li><?php endforeach; endif; ?>
                    <!--<?php if(is_array($arr)): foreach($arr as $key=>$k): ?><img  src="/Public/<?php echo ($k["img"]); ?>" width=20 height=20 />&nbsp;&nbsp;&nbsp;<?php echo ($k["pf"]); ?> <br /><br /><?php endforeach; endif; ?>-->
                </ul>
            </div>
            <div class="huadonhmk">
                <div class="weikk">
                暂未开通
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>