<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body >
<center>
	<h1>
		<a href="/ceshi/yu/index.php/Admin/Ddguanli/ddzt/ways_id/3">寄修</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="/ceshi/yu/index.php/Admin/Ddguanli/ddzt/ways_id/2">到店</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="/ceshi/yu/index.php/Admin/Ddguanli/ddzt/ways_id/1">上门</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</h1>
</center>
<a href="/ceshi/yu/index.php/Admin/index/index">返回</a><br /><br />
	<a href="/ceshi/yu/index.php/Admin/Ddguanli/ddzt/stau/0">等待指派</a><br /><br />
	<a href="/ceshi/yu/index.php/Admin/Ddguanli/ddzt/stau/1">已指派</a><br /><br />
	<a href="/ceshi/yu/index.php/Admin/Ddguanli/ddzt/stau/2">已接单</a><br /><br />
	<a href="/ceshi/yu/index.php/Admin/Ddguanli/ddzt/stau/3">维修中</a><br /><br />
	<a href="/ceshi/yu/index.php/Admin/Ddguanli/ddzt/stau/4">待付款</a><br /><br />
	<a href="/ceshi/yu/index.php/Admin/Ddguanli/ddzt/stau/5">交易完成</a><br /><br />
<table border=1>
<th>订单号：</th>
<th>维修内容：</th>
<th>预计价格：</th>
<th>备注：</th>
<th>服务方式:</th>
<th>维修地点：</th>
<th>姓名：</th>
<th>电话:</th>
<th>地址:</th>
<th>维修人员</th>
<th>状态</th>
<?php if(is_array($arr)): foreach($arr as $key=>$vv): ?><tr>
	<td><?php echo ($vv["u_number"]); ?></td>
	<td><?php echo ($vv["content"]); ?></td>
	<td><?php echo ($vv["amountd"]); ?></td>
	<td><?php echo ($vv["u_note"]); ?></td>
	<td><?php echo ($vv["ways_name"]); ?></td>
	<td><?php echo ($vv["wxzx_name"]); ?></td>
	<td><?php echo ($vv["u_name"]); ?></td>
	<td><?php echo ($vv["u_phone"]); ?></td>
	<td><?php echo ($vv["u_address"]); ?></td>
	<td><?php echo ($user_username); ?></td>
	<td><?php echo ($b); echo ($v); ?></td>
</tr><?php endforeach; endif; ?>
</table>	
</body>
</html>