<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<a href="/index.php/Home/Gouwuche/peijiandingdan">返回</a><br /><br />
	个人信息<br /><br />
	已维修了:<?php echo ($nums); ?>单<br /><br />
	余额：<?php echo ($yuemoney); ?>元&nbsp;&nbsp;&nbsp;<a href="/index.php/Home/Grzx/tixian">提现</a><br /><br />
	负债:<?php echo ($yue); ?>&nbsp;&nbsp;&nbsp;
	<?php if(strtoupper($yue) == 0): ?>无需还款
					<?php else: ?>
					<a href="/index.php/Home/Grzx/huankuan">还款</a><?php endif; ?> <br /><br />
	<a href="/index.php/Home/Grzx/peijianhuishou">回收的配件</a>
</body>
</html>