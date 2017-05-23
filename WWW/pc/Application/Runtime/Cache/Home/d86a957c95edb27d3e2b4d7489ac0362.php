<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<!--<?php if(is_array($arr)): foreach($arr as $aa=>$kk): ?>订单号:<?php echo ($aa); ?> <br />
		商品:<br />
		<?php if(is_array($kk)): foreach($kk as $key=>$cc): echo ($cc["cpk_name"]); ?> <br /><?php endforeach; endif; ?><br />
		<a href="/index.php/Home/Payy/index/id/<?php echo ($cc["id"]); ?>/ddh/<?php echo ($cc["ddh"]); ?>">去付款</a><br /><?php endforeach; endif; ?><br /> -->
    
    <?php if(is_array($arr)): foreach($arr as $aa=>$kk): ?><div class="jixing">
            <div class="jixing_title jixing_title1">
                <span></span>
                订单编号：<?php echo ($aa); ?>
                <em>等待付款</em>
            </div>
            
            <div class="jixing_con">
                <ul>
                    <?php if(is_array($kk)): foreach($kk as $key=>$cc): ?><li><?php echo ($cc["cpk_name"]); ?><span  class="fr">￥200 * <i class="wai"> 1 </i></span></li><?php endforeach; endif; ?> 
                </ul>
            </div>
            
            <div class="jixing_btn_1">
                <h1>合计：<em class="yellow">￥600</em></h1>
                <div class="bdr_c">
                    <span>取消订单</span>
                    <span class="on">去付款</span>
                </div>
            </div>
        </div><?php endforeach; endif; ?>
    
    
</body>
</html>