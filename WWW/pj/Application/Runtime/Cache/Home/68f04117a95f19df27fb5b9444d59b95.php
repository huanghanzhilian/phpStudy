<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<a href="/index.php/Home/Grzx/index">返回</a><br /><br />
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): echo ($kk["cpk_name"]); ?> &nbsp;&nbsp;<?php echo ($kk["cpk_price"]); ?>元&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)'onclick='hq({kk.huishou_id})'>赶快换钱去</a><br /><br /><?php endforeach; endif; ?>
</body>
</html>