<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<a href="/ceshi/yuzuo/index.php/Home/Index/index/">返回首页</a><center><?php echo ($my); ?></center>
	<table border='1'>
	<th>编号</th>
	<th>订单编号</th>
	<th>手机号</th>
	<th>维修内容</th>
	<th>价格</th>
	<th>姓名</th>
	<th>备注</th>
	<th>维修方式</th>
	<th>回寄地址</th>
	<th>维修地点</th>
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><tr>
			<td><?php echo ($kk["u_id"]); ?></td>
			<td><?php echo ($kk["u_number"]); ?></td>
			<td><?php echo ($kk["u_phone"]); ?></td>
			<td><?php echo ($kk["content"]); ?></td>
			<td><?php echo ($kk["u_price"]); ?></td>
			<td><?php echo ($kk["u_name"]); ?></td>
			<td><?php echo ($kk["u_note"]); ?></td>
			<td><?php echo ($kk["ways_name"]); ?></td>
			<td><?php echo ($kk["u_address"]); ?></td>
			<td><?php echo ($kk["wxzx_name"]); ?></td>
		</tr><?php endforeach; endif; ?>
	</table>
</body>
</html>