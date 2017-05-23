<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>维百士-工程师-余额明细</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
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




</style>
</head>

<body style=" background:#f5f5f5;">
<div class="header">
     <a href="/Home/Gouwuche/my_wallet"><span></span></a>
    <h1>余额明细</h1>
</div><!--头-->

<div class="content">
    <div class="content_con">
        
        
        <div class="peijian_m">
            <div class="peijian_m_box">
                <ul class="yu_coner">
                    <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li class="mingxu_ty">
                        <div class="mkloop_r">
                            <?php echo ($kk["jy_money"]); ?>.00
                        </div>
                        <div class="mkloop_l">
                            <span class="comlk"><?php echo ($kk["yue_type"]); ?>&nbsp;&nbsp;&nbsp;<?php echo ($kk["ddh"]); ?></span>
                            <span class="comlb"><?php echo ($kk["jy_time"]); ?></span>
                        </div> 
                    </li><?php endforeach; endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>