<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
    

</head>
<body>

						 <ul id="qklm">
						  <input type="hidden" name="ways_id" id='ways_iddd' value='<?php echo ($ways_id); ?>'>
                        <?php if(is_array($arr)): foreach($arr as $key=>$ll): ?><li> <a href='javascript:void(0)'onclick='ajaxqu(<?php echo ($ll["region_id"]); ?>)'><?php echo ($ll["region_name"]); ?></a></li><?php endforeach; endif; ?>
                         </ul>
			
</body>
</html>