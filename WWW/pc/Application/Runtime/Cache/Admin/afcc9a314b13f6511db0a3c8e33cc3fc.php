<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<form method="post" action="/index.php/Admin/Ddguanli/save1">
	<?php if(is_array($arr)): foreach($arr as $key=>$k): ?><input type="radio" name="user_id"value='<?php echo ($k["user_id"]); ?>'><?php echo ($k["user_username"]); endforeach; endif; ?><br /><br />
	<input type="hidden" name="id" value='<?php echo ($id); ?>'>
	 <input type="hidden" name="ways_id" value='<?php echo ($ways_id); ?>'> <!---->
	<input type="submit" value='确定'>
</form>
	
</body>
</html>