<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php if(is_array($arr)): foreach($arr as $key=>$k): ?>单号:<?php echo ($k["tixianshenqing_id"]); ?> <br />
			提现金额:<?php echo ($k["amt"]); ?><br />		
			账号:<?php echo ($k["kahao"]); ?><br />
			姓名:<?php echo ($k["xingming"]); ?><br />
			申请时间:<?php echo ($k["txsq_time"]); ?><br />
			待审核<br />
			<a href="">确认通过</a>
			<br /><br /><br /><?php endforeach; endif; ?>
</body>
</html>