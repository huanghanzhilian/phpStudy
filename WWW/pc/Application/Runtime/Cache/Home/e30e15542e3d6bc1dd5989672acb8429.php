<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<a href="/ceshi/www/index.php/Home/Index/membercentent">返回</a>
<form method="post" action="/ceshi/www/index.php/Home/Index/youhuijiage">
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><!-- <input type="radio" name="yhqprice" value='<?php echo ($kk["yhqprice"]); ?>'> --><?php echo ($kk["yhqprice"]); ?>元&nbsp;&nbsp;&nbsp;<?php endforeach; endif; ?>
	<input type="hidden" name="id" value='<?php echo ($id); ?>'>
<!--	<input type="hidden" name="ways_id" value='<?php echo ($ways_id); ?>'> -->
	<!-- <input type="submit" value='确定'> -->
</form>
</body>
</html>