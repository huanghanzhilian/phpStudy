<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>

</head>
<body>

			



	
						
						
						<ul id="sqlm">
						 <input type="hidden" name="ways_id" id='ways_idd' value='<?php echo ($ways_id); ?>'>
                        <?php if(is_array($arr)): foreach($arr as $key=>$vl): ?><li><a href='javascript:void(0)'onclick='ajaxshi(<?php echo ($vl["region_id"]); ?>)'><?php echo ($vl["region_name"]); ?></a></li><?php endforeach; endif; ?>
			            </ul>
                       
</body>
</html>