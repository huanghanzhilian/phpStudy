<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<center><?php echo ($my); ?></center>
    <a href="/index.php/Home/Index/index">返回</a><br /><br />
    <a href="/index.php/Home/Index/xindingdan">新订单</a><br /><br />
	<a href="/index.php/Home/Index/daiwancheng">待完成</a><br /><br />
	<a href="/index.php/Home/Index/yiwancheng">已完成</a><br /><br />
<table border=1>
    <th>订单编号:</th>
	<th>机型问题:</th>
	<th>服务方式:</th>
	<th>手机号:</th>
	<th>状态</th>
<?php if(is_array($arr)): foreach($arr as $key=>$vv): ?><tr>
	<td><?php echo ($vv["u_number"]); ?></td>
	<td><?php echo ($vv["model_name"]); ?>:<?php echo ($vv["question_name"]); ?></td>
	<td><?php echo ($vv["ways_name"]); ?></td>
	<td><?php echo ($vv["u_phone"]); ?></td>
	<td><a href="/index.php/Home/Index/shifuxiangqing/id/<?php echo ($vv["id"]); ?>">详情</a></td>	
</tr><?php endforeach; endif; ?>	
</table>
</body>
</html>