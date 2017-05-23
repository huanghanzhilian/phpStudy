<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<a href="/Admin/Index/index">返回</a><br /><br />
	<center><a href="/Admin/Huishou/index">待确认</a>&nbsp;&nbsp;&nbsp;<a href="/Admin/Huishou/yihuishou">已回收</a>&nbsp;&nbsp;&nbsp;<a href="/Admin/Huishou/buhege">不合格</a></center><br /><br />
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): echo ($kk["ddh"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($kk["cpk_name"]); ?> &nbsp;&nbsp;<?php echo ($kk["cpk_price"]); ?>元&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($kk["user_username"]); ?><br /><br /><?php endforeach; endif; ?><br /><br /><br /><br />
</body>
</html>