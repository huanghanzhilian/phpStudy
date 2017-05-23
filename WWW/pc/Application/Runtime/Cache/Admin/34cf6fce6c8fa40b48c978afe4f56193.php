<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<a href="/index.php/Admin/Ddguanli/jixiu/ways_id/3 ">返回</a><!-- -->
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
	<td><?php echo ($vv["user_id"]); ?></td>

</tr><?php endforeach; endif; ?>
</table>	
</body>
</html>