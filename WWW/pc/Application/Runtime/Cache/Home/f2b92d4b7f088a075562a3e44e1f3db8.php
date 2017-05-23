<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<form method="post" action="/index.php/Home/Gouwuche/yuequfukuan">
	可用余额:<?php echo ($yuemoney); ?> <br /><br />
	商品价格:<?php echo ($arr["amount"]); ?>
	<input type="hidden" name="id" value='<?php echo ($arr["id"]); ?>'><br /><br />
	<input type="submit" value='确定付款'>
</form>
	
</body>
</html>