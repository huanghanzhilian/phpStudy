<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form method="post" action="/Home/Grzx/hk">
		可用余额:<?php echo ($yuemoney); ?>
		还款金额:<?php echo ($amount); ?>
		<input type="hidden" name="id" value='<?php echo ($id); ?>'>
	  <input type="submit" value='确定还款'>
	</form>
	
</body>
</html>