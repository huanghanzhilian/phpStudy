<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body><h1>修改产品</h1>
	<form method="post" action="/Admin/Shangpin/chanpinupp">
	产品名称:<input type="text" name="cpk_name" value='<?php echo ($arr["cpk_name"]); ?>'><br /><br />
	师傅价格:<input type="text" name="cpk_price" value='<?php echo ($arr["cpk_price"]); ?>'><br /><br />
	用户价格:<input type="text" name="cpp_price" value='<?php echo ($arr["cpp_price"]); ?>'><br /><br />
	<input type="hidden" name="model_id" value='<?php echo ($model_id); ?>'>
	<input type="hidden" name="brand_id" value='<?php echo ($brand_id); ?>'>
	<input type="hidden" name="cpk_id" value='<?php echo ($arr["cpk_id"]); ?>'>
	是否是回收:<input type="text" name="sf" value='<?php echo ($arr["sf"]); ?>'><br />(y是回收,n是卖出)<br /><br />
	<input type="submit" value='修改'>
	<input type="button" value="取消" onclick="a()">
	</form>
</body>
</html>