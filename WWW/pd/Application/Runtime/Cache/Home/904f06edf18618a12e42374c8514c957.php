<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
		 <a href='javascript:void(0)'onclick='ass1(1)'>服务投诉</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 <a href='javascript:void(0)'onclick='ass(2)'>意见反馈</a><br /><br />
	 <form method="post" action="/Home/Index/tousuadd">
		 <input type="text" name="content"><br /><br />
		 <select name="type">
			<option value="手机" selected>
				手机
			</option>
			<option value="座机">
				座机
			</option>
			<option value="QQ">
				QQ
			</option>
		 </select>
		 <input type="text" name="phone">
		 <br /><br />
		 
		 <input type="submit" value='提交'>
	 </form>
</body>
</html>