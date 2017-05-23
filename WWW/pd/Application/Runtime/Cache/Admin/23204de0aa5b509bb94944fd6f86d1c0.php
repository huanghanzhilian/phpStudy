<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<form method="post" action="/Admin/Ddguanli/fenpeiadd">
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><input type="radio" name="user_id" value='<?php echo ($kk["user_id"]); ?>'><?php echo ($kk["user_username"]); ?>&nbsp;&nbsp;<?php endforeach; endif; ?>
	<input type="hidden" name="shouhou_id" value='<?php echo ($shouhou_id); ?>'>
	<input type="submit" value='确定'>
</form>
	
</body>
</html>