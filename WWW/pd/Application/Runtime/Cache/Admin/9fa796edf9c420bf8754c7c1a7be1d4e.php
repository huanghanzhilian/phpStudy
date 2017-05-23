<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
		<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?>问题:<?php echo ($kk["contentt"]); ?>&nbsp;&nbsp;
		姓名:<?php echo ($kk["username"]); ?>&nbsp;&nbsp;
		电话:<?php echo ($kk["tell"]); ?>&nbsp;&nbsp;
		   <?php if(strtoupper($kk['addres']) == ''): ?>到店
                <?php else: ?>
        邮寄地址:<?php echo ($kk["addres"]); ?>&nbsp;&nbsp;
		回寄地址:<?php echo ($kk["addre"]); ?>&nbsp;&nbsp;
		邮寄&nbsp;&nbsp;<?php endif; ?>
		
		   <?php if(strtoupper($kk['zt']) == 0): ?><a href="/Admin/Ddguanli/fenpei/shouhou_id/<?php echo ($kk["shouhou_id"]); ?>">分配</a>
                <?php else: endif; ?>
		<br /><br /><?php endforeach; endif; ?>
</body>
</html>