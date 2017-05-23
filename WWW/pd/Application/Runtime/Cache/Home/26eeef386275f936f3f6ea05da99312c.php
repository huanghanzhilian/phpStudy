<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<a href="/Home/Grzx/index">返回</a><br /><br /><br />
	<a href="/Home/Grzx/yinhangka">添加银行卡信息</a><br /><br />
	<a href="/Home/Grzx/tixianxinxi">提现信息</a><br /><br />
	<form method="post" action="/Home/Grzx/tijiaoshenqing">
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><input type="radio" name="yinhang_id" value='<?php echo ($kk["yinhang_id"]); ?>' checked><?php echo ($kk["kahao"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($kk["xingming"]); ?><br /><br /><?php endforeach; endif; ?><br /><br />
	最多可提现:<?php echo ($yuemoney); ?><br /><br />
	<input type="hidden" name="am" value='<?php echo ($yuemoney); ?>'>
	提现金额:<input type="text" name="amt"><br /><br />
	<input type="submit" value='提交申请'>
</form>
</body>
</html>