<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<form method="post" action="/index.php/Home/Gouwuche/fukuan">
	信用余额:<?php echo ($xyed); ?> <br /><br />
	商品标题:<?php echo ($arr["u_title"]); ?> <br /><br />
	价格:<?php echo ($arr["amount"]); ?>
	<input type="hidden" name="id" value='<?php echo ($arr["id"]); ?>'>
	<input type="submit" value='确定付款'>
</form>
</body>
</html>