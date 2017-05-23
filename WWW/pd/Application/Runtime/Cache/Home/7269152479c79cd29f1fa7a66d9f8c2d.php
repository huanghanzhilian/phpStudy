<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	修完检测：
	<form method="post" action="/index.php/Home/Index/tjj">
	<?php if(is_array($arr2)): foreach($arr2 as $key=>$k): ?><input type="checkbox" name="jc_id[]" value='<?php echo ($k["jc_id"]); ?>'><?php echo ($k["jc_name"]); ?>&nbsp;&nbsp;<?php endforeach; endif; ?>
	<input type="hidden" name="id" value='<?php echo ($id); ?>'>
	<input type="submit" value='提交确认'>
</form>
</body>
</html>