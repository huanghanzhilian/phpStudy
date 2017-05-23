<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form method="post" action="/Admin/Youhuiquan/add">
		<input type="text" name="yq_price">
		<input type="hidden" name="yq_id" value='<?php echo ($yq_id); ?>'>
		<input type="submit" value='确定修改'>
	</form>
</body>
</html>