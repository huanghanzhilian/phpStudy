<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>


	<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><a href='javascript:void(0)'onclick=''><h3><?php echo ($kk["cpk_name"]); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($kk["cpp_price"]); ?>元&nbsp;&nbsp;&nbsp;&nbsp;总数量(<?php echo ($numss); ?>)</h3>
		<?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><input type="checkbox" name="cpk_id[]" value='<?php echo ($ee["cpk_id"]); ?>'><?php echo ($ee["cangku_name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp; 数量(<?php echo ($ee["numss"]); ?>)&nbsp;&nbsp;&nbsp;<br /><?php endforeach; endif; ?><br /><br /><?php endforeach; endif; ?>
</body>
</html>