<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<table border=1>
<th>订单号：</th>
<th>机型：</th>
<th>问题：</th>
<th>姓名：</th>
<th>电话:</th>
<th>操作</th>
<th>状态</th>
<?php if(is_array($arr)): foreach($arr as $key=>$vv): ?><tr>
	<td><?php echo ($vv["ddh"]); ?></td>
	<td><?php echo ($vv["model_name"]); ?></td>
	<td><?php echo ($vv["question_name"]); ?></td>
	<td><?php echo ($vv["u_name"]); ?></td>
	<td><?php echo ($vv["u_phone"]); ?></td>
	 <td>
	<a href="/Admin/Index/xiangqing/id/<?php echo ($vv["id"]); ?>">详情</a>
	 </td>
	 <td>
             <a href="/Admin/Index/cxfp/id/<?php echo ($vv["id"]); ?>">重新分配工程师</a>                      

	 </td>
	 
	  <td>
	<a href="/Admin/Index/quxiao/id/<?php echo ($vv["id"]); ?>">取消</a>
	 </td>
</tr><?php endforeach; endif; ?>
</table>
</body>
</html>