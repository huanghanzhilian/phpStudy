<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<select name="shi" id='shi' onchange='ajaxshi()'>
						<option value="市">
							市
						</option>
						<?php if(is_array($arr)): foreach($arr as $key=>$vl): ?><option value="<?php echo ($vl["region_id"]); ?>">
								<?php echo ($vl["region_name"]); ?>
							</option><?php endforeach; endif; ?>
					</select>
</body>
</html>