<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<a href="/index.php/Admin/Index/index">返回</a><br /><br />
<center><a href="/index.php/Admin/Huishou/index">待确认</a> <a href="/index.php/Admin/Huishou/yihuishou">已回收</a></center><br /><br />
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): echo ($kk["goodid"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($kk["cpk_name"]); ?> &nbsp;&nbsp;<?php echo ($kk["cpk_price"]); ?>元&nbsp;&nbsp;&nbsp;<a href="/index.php/Admin/Huishou/querenhuishou/huishou_id/<?php echo ($kk["huishou_id"]); ?>">确认</a><br /><br /><?php endforeach; endif; ?>
</body>
</html>