<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form method="post" action="/weibaishi/yuzuo/index.php/Admin/Index/pinpaiadd">
			<input type="text" name="brandname">
			<input type="hidden" name="service_id" value='<?php echo ($i); ?>' >
			<input type="submit" value='生成'>
	</form>
</body>
</html>