<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
</head>
<body>
 <?php if(is_array($arr1)): $i = 0; $__LIST__ = $arr1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$kk): $mod = ($i % 4 );++$i;?><li onclick='m(<?php echo ($kk["model_id"]); ?>)'><b></b><em><?php echo ($kk["model_name"]); ?></em></li><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>