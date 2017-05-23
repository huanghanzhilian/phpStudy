<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><a href="/weibaishi/yuzuo/index.php/Home/Index/wenti/ide/<?php echo ($kk["color_id"]); ?>/goodname/<?php echo ($goodname); ?>/brandname/<?php echo ($brandname); ?>/{numbername/<?php echo ($numbername); ?>/colorname/<?php echo ($kk["colorname"]); ?>"><?php echo ($kk["colorname"]); ?></a><br /><br /><?php endforeach; endif; ?>
</body>
</html>