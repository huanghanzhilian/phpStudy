<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
 <?php if(strtoupper($t) == 0): ?><form method="post" action="/Home/Gouwuche/fukuan">
		信用余额:<?php echo ($xyed); ?> <br /><br />
		商品标题:<?php echo ($arr["u_title"]); ?> <br /><br />
		价格:<?php echo ($arr["amount"]); ?>
		<input type="hidden" name="id" value='<?php echo ($arr["id"]); ?>'>
		<input type="submit" value='确定付款'>
	</form>		
 <?php elseif(strtoupper($t) == 1): ?> 
	<form method="post" action="/Home/Gouwuche/maichufukuan">
		信用余额:<?php echo ($xyed); ?> <br /><br />
		商品标题:<?php echo ($arr["u_title"]); ?> <br /><br />
		价格:<?php echo ($arr["amount"]); ?>
		<input type="hidden" name="id" value='<?php echo ($arr["id"]); ?>'>
		<input type="submit" value='确定付款'>
	</form>		
  <?php else: endif; ?>
</body>
</html>