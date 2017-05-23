<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php if(is_array($arr)): foreach($arr as $aa=>$kk): ?>订单号:<?php echo ($aa); ?> <br />
		商品:<br />
		<?php if(is_array($kk)): foreach($kk as $key=>$cc): echo ($cc["cpk_name"]); ?> <br /><?php endforeach; endif; ?><br />
		已付款<br /> <br />
		 <a href="/index.php/Admin/Guanlishifu/shenhetongguo/id/<?php echo ($cc["id"]); ?>">审核通过</a><br /><br />
		<a href="/index.php/Admin/Guanlishifu/shenhebutongguo/id/<?php echo ($cc["id"]); ?>">审核不通过</a><br /><br /><?php endforeach; endif; ?>	<br /> 
</body>
</html>