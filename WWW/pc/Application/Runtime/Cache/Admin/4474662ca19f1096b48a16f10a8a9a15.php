<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body ><a href="/index.php/Admin/Ddguanli/quxiaole">取消的订单</a>
<center>
	<h1>
		<a href="/index.php/Admin/Ddguanli/jixiu/ways_id/3">寄修</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="/index.php/Admin/Ddguanli/daodian/ways_id/2">到店</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="/index.php/Admin/Ddguanli/shangmen/ways_id/1">上门</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	</h1>
</center><!--  -->
<a href="/index.php/Admin/index/index">返回</a><br /><br />
	<a href="/index.php/Admin/Ddguanli/dengdai/ways_id/1">等待指派</a><br /><br />
	<a href="/index.php/Admin/Ddguanli/yizhipai/ways_id/1">已指派</a><br /><br />
	<a href="/index.php/Admin/Ddguanli/yijiedan/ways_id/1">已接单</a><br /><br />
	<a href="/index.php/Admin/Ddguanli/weixiuzhong/ways_id/1">维修中</a><br /><br />
	<a href="/index.php/Admin/Ddguanli/daifukuan/ways_id/1">待付款</a><br /><br />
	<a href="/index.php/Admin/Ddguanli/jiaoyiwancheng/ways_id/1">交易完成</a><br /><br />
<table border=1>
<th>订单号：</th>
<th>机型：</th>
<th>问题：</th>
<th>姓名：</th>
<th>电话:</th>
<th>操作</th>
<th>状态</th>
<?php if(is_array($arr)): foreach($arr as $key=>$vv): ?><tr>
	<td><?php echo ($vv["u_number"]); ?></td>
	<td><?php echo ($vv["model_name"]); ?></td>
	<td><?php echo ($vv["question_name"]); ?></td>
	<td><?php echo ($vv["u_name"]); ?></td>
	<td><?php echo ($vv["u_phone"]); ?></td>
	 <td><a href="/index.php/Admin/Ddguanli/xiangqing/id/<?php echo ($vv["id"]); ?>/ways_id/<?php echo ($ways_id); ?>">详情</a></td>
	<td>
	<a href="/index.php/Admin/Ddguanli/wxuser/id/<?php echo ($vv["id"]); ?>/wxzx_id/<?php echo ($vv["wxzx_id"]); ?>/ways_id/<?php echo ($ways_id); ?>">待分配</a>
	</td>

</tr><?php endforeach; endif; ?>
</table>	
</body>
</html>