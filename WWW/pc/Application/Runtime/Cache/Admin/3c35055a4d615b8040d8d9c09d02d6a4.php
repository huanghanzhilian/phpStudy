<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
当前位置：<?php echo ($goodname); ?> <br /><br />
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><a href="/weibaishi/yuzuo/index.php/Admin/Index/xinghao/ide/<?php echo ($kk["brand_id"]); ?>/goodname/<?php echo ($goodname); ?>/brandname/<?php echo ($kk["brandname"]); ?>"><?php echo ($kk["brandname"]); ?></a><br /><br /><?php endforeach; endif; ?>
	<a href="/weibaishi/yuzuo/index.php/Admin/Index/pinpailist/i/<?php echo ($i); ?>">添加品牌</a>
</body>
</html>