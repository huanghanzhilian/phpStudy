<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<a href="/Admin/Index/index">返回</a>
<center><a href="/Admin/Fapiao/index">未开据</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/Admin/Fapiao/yikj">已开据</a></center>
	<table border=1>
<th>发票抬头</th>
<th>发票金额</th>
<th>收件人</th>
<th>发票邮寄地址</th>
<th>电话</th>
<th>操作</th>
<tr>
<?php if(is_array($arr)): foreach($arr as $key=>$vv): ?><td><?php echo ($vv["fptt"]); ?></td>
	<td><?php echo ($vv["amount"]); ?></td>
	<td><?php echo ($vv["user"]); ?></td>
	<td><?php echo ($vv["dizhi"]); ?></td>
	<td><?php echo ($vv["u_phone"]); ?></td>
	<td>
<a href="/Admin/Fapiao/qrkj/fp_id/<?php echo ($vv["fp_id"]); ?>">确认开据</a>
	</td>
	<td><a href="/Admin/Fapiao/fapiaoshanchu/fp_id/<?php echo ($vv["fp_id"]); ?>" onclick="if(confirm('确定删除?')==false)return false;">删除</a></td>
	
</tr><?php endforeach; endif; ?>
</body>
</html>