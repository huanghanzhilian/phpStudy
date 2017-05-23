<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<ul>
	<?php if(is_array($arr)): foreach($arr as $key=>$k): ?><li class="nubes">
		    <a href='javascript:void(0)'><?php echo ($k["model_name"]); ?></a>
        </li><?php endforeach; endif; ?>
</ul>
</body>
</html>