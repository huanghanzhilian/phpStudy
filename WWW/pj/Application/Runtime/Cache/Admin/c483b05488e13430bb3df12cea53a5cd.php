<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php if(is_array($arr)): foreach($arr as $aa=>$kk): ?>订单号:<?php echo ($aa); ?> <br />
		商品:<br />
		<?php if(is_array($kk)): foreach($kk as $key=>$cc): echo ($cc["cpk_name"]); ?>&nbsp;&nbsp;&nbsp;<?php echo ($cc["cpk_price"]); ?>元 <br /><?php endforeach; endif; echo ($cc["user_username"]); ?><br />
		<?php echo ($cc["user_name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;总价(<?php echo ($cc["amount"]); ?>) <br /><br />
		已完成  <br /><br /><?php endforeach; endif; ?>	<br /> 
</body>
</html>