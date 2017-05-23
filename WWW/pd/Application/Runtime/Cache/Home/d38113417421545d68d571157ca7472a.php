<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	
		<?php if(is_array($arr1)): foreach($arr1 as $key=>$v): ?><li onclick='cpkajax(<?php echo ($v["model_id"]); ?>)'><b></b><em><?php echo ($v["model_name"]); ?> </em></li><?php endforeach; endif; ?>
		

<!-- <div id='li'>
<?php if(is_array($arr2)): foreach($arr2 as $key=>$h): echo ($h["cpk_name"]); ?>&nbsp;&nbsp;<span><?php echo ($h["cpk_price"]); ?>元</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onclick='tjgwc(<?php echo ($h["cpk_id"]); ?>);'>+</a><br />	<br /><?php endforeach; endif; ?>
 </div>-->
</body>
</html>