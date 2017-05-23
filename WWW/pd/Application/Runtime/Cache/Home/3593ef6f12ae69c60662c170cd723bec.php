<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<!-- <a href="/Home/Grzx/huankuandingdan">还款订单</a> -->
<form method="post" action="/Home/Grzx/quhuankuan">
	未还金额:<?php echo ($yixiaofei); ?> <br /><br />
	请输入还款金额:<input type="text" name="money">
	<input type="hidden" name="yixiaofei" value='<?php echo ($yixiaofei); ?>'>
	<input type="submit" value='确认去还款'>
</form>
	
</body>
</html>