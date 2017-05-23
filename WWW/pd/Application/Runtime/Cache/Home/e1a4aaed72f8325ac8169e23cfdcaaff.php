<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<ul>
	<?php if(is_array($arr1)): foreach($arr1 as $key=>$k): ?><li>
			<a href="http://m.weibaishi.com/model/<?php echo ($model_id); ?>/<?php echo ($k["color_id"]); ?>"><?php echo ($k["color_name"]); ?></a><br />
	    </li><?php endforeach; endif; ?>
</ul>
</body>
</html>