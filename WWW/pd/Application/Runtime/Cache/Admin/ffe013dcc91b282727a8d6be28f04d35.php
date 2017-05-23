<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<form method="post" action="/Admin/Index/cxfpup">
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><input type="radio" name="user_id" value='<?php echo ($kk["user_id"]); ?>'><?php echo ($kk["user_username"]); endforeach; endif; ?>
	<input type="hidden" name="id" value='<?php echo ($id); ?>'>
	<input type="submit" value='确定修改'>
</form>
	
</body>
</html>