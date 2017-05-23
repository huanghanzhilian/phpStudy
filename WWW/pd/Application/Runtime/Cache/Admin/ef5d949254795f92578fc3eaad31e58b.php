<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<center><a href="/Admin/Guanlishifu/shifugl">未离职</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/Admin/Guanlishifu/lz">已离职</a></center>
<table border=1>
<th>姓名：</th>
<th>电话：</th>
<th>状态：</th>
<th>操作：</th>

<?php if(is_array($arr)): foreach($arr as $key=>$vv): ?><tr>
	<td><?php echo ($vv["user_username"]); ?></td>
	<td><?php echo ($vv["user_name"]); ?></td>
	<td><?php echo ($vv["sfzt"]); ?></td>
	<td><a href="/Admin/Guanlishifu/lizhi/user_id/<?php echo ($vv["user_id"]); ?>">离职</a></td>
	
</tr><?php endforeach; endif; ?>
</table>
</body>
</html>