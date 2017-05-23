<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<center><?php echo ($my); ?></center>
<a href="/index.php/Home/Index/index">返回</a><br /><br />
<a href="/index.php/Home/Index/hddzt/stau/1">新订单</a><br /><br />
	<a href="/index.php/Home/Index/hddzt/stau/2">已接单</a><br /><br />
	<a href="/index.php/Home/Index/hddzt/stau/3">维修中</a><br /><br />
	<a href="/index.php/Home/Index/hddzt/stau/4">待付款</a><br /><br />
	<a href="/index.php/Home/Index/hddzt/stau/5">交易完成</a><br /><br />
	<table border=1>
<th>订单号：</th>
<th>维修内容：</th>
<th>预计价格：</th>
<th>备注：</th>
<th>服务方式:</th>
<th>维修地点：</th>
<th>修前检测</th>
<th>需要的配件</th>
<th>修后检测</th>

<th>姓名：</th>
<th>电话:</th>
<th>地址:</th>
<th>状态</th>
<th>操作</th>
<?php if(is_array($arr)): foreach($arr as $key=>$vv): ?><tr>
	<td><?php echo ($vv["u_number"]); ?></td>
	<td><?php echo ($vv["content"]); ?></td>
	<td><?php echo ($vv["amountd"]); ?></td>
	<td><?php echo ($vv["u_note"]); ?></td>
	<td><?php echo ($vv["ways_name"]); ?></td>
	<td><?php echo ($vv["wxzx_name"]); ?></td>
	<td><?php echo ($vv["xqjc_id"]); ?></td>
	<td><?php echo ($vv["cpk_name"]); ?></td>
	<td><?php echo ($vv["xhjc_id"]); ?></td>
	<td><?php echo ($vv["u_name"]); ?></td>
	<td><?php echo ($vv["u_phone"]); ?></td>
	<td><?php echo ($vv["u_address"]); ?></td>
	<td><?php echo ($r); ?></td>
	<td>
	
	<a href="/index.php/Home/Index/jiedan/id/<?php echo ($vv["id"]); ?>/stau/<?php echo ($vv["stau"]); ?>"><?php echo ($b); ?></a><br /><br />
	<a href="/index.php/Home/Index/tuidan/id/<?php echo ($vv["id"]); ?>/stau/<?php echo ($vv["stau"]); ?>"><?php echo ($c); ?></a>
		
		
	
	</td>
</tr><?php endforeach; endif; ?>
	
</table>


</body>
</html>