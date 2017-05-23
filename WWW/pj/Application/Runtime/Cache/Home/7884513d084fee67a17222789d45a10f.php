<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<select name="wxzx_id" id='wxzx_id'>
						<?php if(is_array($arr)): foreach($arr as $key=>$cl): ?><option value="<?php echo ($cl["wxzx_id"]); ?>">
								<?php echo ($cl["wxzx_name"]); ?>
							</option><?php endforeach; endif; ?>
					</select>
					 <input type="hidden" name="ways_id" id='ways_id' value='2'> <!---->
</body>
</html>