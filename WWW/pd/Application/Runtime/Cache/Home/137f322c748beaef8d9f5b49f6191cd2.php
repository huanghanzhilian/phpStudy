<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<select name="qu" id='qu'>
						<option value="区">
							区
						</option>
						<?php if(is_array($arr)): foreach($arr as $key=>$ll): ?><option value="<?php echo ($ll["region_id"]); ?>">
								<?php echo ($ll["region_name"]); ?>
							</option><?php endforeach; endif; ?>
					</select>
</body>
</html>