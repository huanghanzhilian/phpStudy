<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>维百士-工程师-报损单</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
</head>

<body style=" background:#f0f0f0;"> 
<div class="header">
    <a href="/Home/Gouwuche/cangkua"><span></span></a>
    <h1>报损单</h1>
</div><!--头-->

<!--内容-->
<div class="content">
    <div class="content_con">
        <div class="sjio_dhnu">
		<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><h1 class="bumkpo"><?php echo ($kk["time"]); ?></h1>
            <div class="sjio_dhnu_top">
                <ul>
                    <li>
                        
                        <span class="molpp"><?php echo ($kk["cangku_name"]); ?> </span>
						 <span class="molpp"><?php echo ($kk["cpk_name"]); ?> </span>
						<span class="molpp"><?php echo ($kk["cpk_price"]); ?> </span>
                        <!-- <span class="molpp2 fr"><?php echo ($kk["cpk_price"]); ?></span> -->
                       
                       
                    </li>
                </ul>
            </div><?php endforeach; endif; ?>
            
            
            
        </div>
    </div>
</div>
<!--内容-->
</body>
</html>