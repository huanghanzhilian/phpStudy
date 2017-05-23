<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<a href="/Admin/index/index">返回</a><br /><br />
	<center><a href="/Admin/Caiwu/index">待确认</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="/Admin/Caiwu/yiqueren">已确认</a></center> <br /><br /> <br /><br />
	
<table border=1>
<th>订单号：</th>
<th>机型：</th>
<th>问题：</th>
<th>工程师：</th>
<th>电话:</th>
<th>价格:</th>
<th>操作</th>
<th>状态</th>
<tr>
<?php if(is_array($arr)): foreach($arr as $key=>$vv): ?><td><?php echo ($vv["ddh"]); ?></td>
	<td><?php echo ($vv["model_name"]); ?></td>
	<td><?php echo ($vv["question_name"]); ?></td>
	
	<td><?php echo ($vv["user_username"]); ?></td>
	<td><?php echo ($vv["u_phone"]); ?></td>
	<td><?php echo ($vv["amount"]); ?>元</td>
	 <td><a href="/Admin/Caiwu/xqing/id/<?php echo ($vv["id"]); ?>">详情</a></td>
	 <td>已完成</td>
</tr><?php endforeach; endif; ?>
</table>
</body>
</html>