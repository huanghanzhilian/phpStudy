<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php if(is_array($arr2)): foreach($arr2 as $key=>$h): echo ($h["cpk_name"]); ?>&nbsp;&nbsp;<span><?php echo ($h["cpk_price"]); ?>元</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onclick='tjgwc(<?php echo ($h["cpk_id"]); ?>);'>+</a><br />	<br /><?php endforeach; endif; ?>
 
<?php if(is_array($arr3)): foreach($arr3 as $key=>$hh): echo ($hh["cpk_name"]); ?>&nbsp;&nbsp;<span><?php echo ($hh["cpp_price"]); ?>元</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onclick='tjgwc(<?php echo ($hh["cpk_id"]); ?>);'>+</a><br />	<br /><?php endforeach; endif; ?> 
</body>
</html>