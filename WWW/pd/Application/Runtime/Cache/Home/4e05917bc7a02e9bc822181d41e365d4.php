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
				<?php if(strtoupper($k['zta']) == 1): ?>申请中
					<?php elseif(strtoupper($k['zta']) == 2): ?> 
					已成功
					<?php elseif(strtoupper($k['zta']) == 3): ?> 
					失败<?php endif; ?> 	<br /><br /><br /><?php endforeach; endif; ?>
</body>
</html>