<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<a href="/Admin/Ddguanli/jixiu/ways_id/3 ">返回</a>
<center><a href="/Admin/Ddguanli/quxiaole">接单后取消</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/Admin/Ddguanli/jdhquxiao">接单前取消</a></center>
	<table border=1>
<th>订单号：</th>
<th>机型：</th>
<th>预计价格：</th>
<th>备注：</th>
<th>服务方式:</th>
<th>姓名：</th>
<th>电话:</th>
<th>维修人员</th>

<?php if(is_array($arr)): foreach($arr as $key=>$vv): ?><tr>
	<td><?php echo ($vv["ddh"]); ?></td>
	<td><?php echo ($vv["model_name"]); ?></td>
	<td><?php echo ($vv["amountd"]); ?></td>
	<td><?php echo ($vv["u_note"]); ?></td>
	<td><?php echo ($vv["ways_name"]); ?></td>
	<td><?php echo ($vv["u_name"]); ?></td>
	<td><?php echo ($vv["u_phone"]); ?></td>
	<td><?php echo ($vv["user_username"]); ?></td>
	 <!-- <td>
	<a href="/Admin/Ddguanli/sc/id/<?php echo ($vv["id"]); ?>/ways_id/<?php echo ($ways_id); ?>">删除</a>
	 </td>
 -->
</tr><?php endforeach; endif; ?>
</table>	
</body>
</html>