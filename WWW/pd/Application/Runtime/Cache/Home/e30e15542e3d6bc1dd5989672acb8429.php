<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
<title>维百士-优惠券</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<meta name="format-detection" content="telephone=no" />
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<style>
/*320px布局*/
html{font-size: 100px;}
body{ font-size: 0.12rem;/*实际相当于12px*/ }

/* iphone 6 */
@media (min-device-width : 375px) and (max-device-width : 667px) and (-webkit-min-device-pixel-ratio : 2){
    html{font-size: 117.1875px;}
}
/* iphone6 plus */
@media (min-device-width : 414px) and (max-device-width : 736px) and (-webkit-min-device-pixel-ratio : 3){
    html{font-size: 129.375px;}
}

@font-face {
    font-family: "MOOC Font";
    src: url("/Public/Typeface/FZYunDongHeiS-B-GB.otf");
}
.youh_hui_a1{ padding:0.25rem 0; display:block; border-bottom:1px solid #f5f5f5; background:#fff;}
.youh_hui_a1_com{ width:80%; height:17vh; background:#ccc; margin: auto; background:url(../../../../Public/img/images/youhjuijian_aq1.png) center center no-repeat; background-size: 100%;}
.youh_hui_a1_com span.qian_sop{ font-family: "MOOC Font"; color:#fff; font-size:0.45rem;}
.youh_hui_a1_com span.qian_sop.qian_sop1{ font-size:0.2rem;}
.youh_hui_a1_list{ height:100%; margin-right:27vw; text-align:center; line-height:17vh;}
.youh_hui_a1_list_r{ width:27vw; height:100%; color:red; font-size:0.2rem; line-height:17vh; text-align:center;}
.youh_hui_a1_list_r span{ display:inline-block; vertical-align:middle;}
.youh_hui_a1_list_r span p{ line-height:normal;}
</style>
</head>
<body style=" background:#f5f5f5;">
<div class="header">
    <span onclick="window.history.back()"></span>
    <h1>我的优惠券</h1>
    
</div><!--头-->

<div class="content">
    <div class="content_con">
    <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><a class="youh_hui_a1" href="/Home/Index/youhuijiage/yhq_id/<?php echo ($kk["yhq_id"]); ?>/id/<?php echo ($id); ?>">
            <div class="youh_hui_a1_com">
                <div class="youh_hui_a1_list_r fr">
                    <span>
                        <p>通用</p>
                        <p>优惠券</p>
                    </span>
                </div>
                <div class="youh_hui_a1_list">
                    <span><span class="qian_sop"><?php echo ($kk["yhqprice"]); ?></span><span class="qian_sop qian_sop1">￥</span></span>
                </div>
            </div>
            
        </a><?php endforeach; endif; ?>   
        
       <!-- <form method="post" action="/Home/Index/youhuijiage">
            
            <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><input type="radio" name="yhq_id" value='<?php echo ($kk["yhq_id"]); ?>'><?php echo ($kk["yhqprice"]); ?>元<?php endforeach; endif; ?>
            <input type="hidden" name="id" value='<?php echo ($id); ?>'>
       
            <input type="submit" value='确定'>
        </form>-->
    </div>
</div>
</body>
</html>