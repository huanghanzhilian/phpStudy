<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<a href="/Admin/Shangpin/model/brand_id/<?php echo ($brand_id); ?>">返回</a><br /><br />
			<form method="post" action="/Admin/Shangpin/questiontypeadd">
				<input type="text" name="questiontype_name">
				<input type="hidden" name="brand_id" value='<?php echo ($brand_id); ?>'>
				<input type="submit" value='添加'>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value='清空'>
				
			</form>
</body>
</html>