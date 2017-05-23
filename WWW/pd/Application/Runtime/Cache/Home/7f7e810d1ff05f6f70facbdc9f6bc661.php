<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<style>

</style>
</head>
<body>
<div class="Maskc_box">
    <div class="lili_c_ico"><p></p><span></span></div>
            <ul class="lili_c_ico_dv">
                <?php if(is_array($arr2)): $i = 0; $__LIST__ = $arr2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$kkk): $mod = ($i % 5 );++$i;?><li class="my_bu_x"><div class="nudt_1"><span class="nudt_1_l"><?php echo ($kkk["plan_name"]); ?></span><span class="nudt_1_r"><?php echo ($kkk["money"]); ?>元</span></div></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
</div>
</body>
</html>