<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
		<form method="post" action="/Admin/Shangpin/upadd" enctype="multipart/form-data">
		<input type="file" name="imgg"><br /><br />
		<input type="hidden" name="questiontype_id" value='<?php echo ($questiontype_id); ?>'>
		<input type="submit"  value='上传'>
	</form>
</body>
</html>