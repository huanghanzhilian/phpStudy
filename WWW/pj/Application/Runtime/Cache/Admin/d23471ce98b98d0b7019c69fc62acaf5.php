<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>制作发放优惠券：<br /><br /><br />
<form method="post" action="/Admin/Youhuiquan/fafangadd">
<table>
<tr>
	<td>面值:</td>
	<td><input type="text" name="yhqprice">元</td>
</tr>
<tr>
	<td>发放给：</td>
	<td><input type="text" name="user_name"></td>
</tr>
<td></td>
	<td><input type="submit" value='发放'></td>


</table>
	
</form>		
	
	
</body>
</html>