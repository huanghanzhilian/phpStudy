<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	当前位置：<?php echo ($goodname); ?>-<?php echo ($brandname); ?> <br /><br />
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><a href="/weibaishi/yuzuo/index.php/Home/Index/yanse/ide/<?php echo ($kk["number_id"]); ?>/goodname/<?php echo ($goodname); ?>/brandname/<?php echo ($brandname); ?>/{numbername/<?php echo ($kk["numbername"]); ?>"><?php echo ($kk["numbername"]); ?></a><br /><br /><?php endforeach; endif; ?>
</body>
</html>
</body>
</html>