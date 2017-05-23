<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

<form method="post" action="/Admin/Shangpin/padd">
		选择方案:<select name="plan_id">
		<?php if(is_array($arr6)): foreach($arr6 as $key=>$j): ?><option value="<?php echo ($j["plan_id"]); ?>">
				<?php echo ($j["plan_name"]); ?> <?php echo ($j["money"]); ?>
			</option><?php endforeach; endif; ?>
		</select><br /><br />
		描述:<select name="instructions_id">
		<?php if(is_array($arr5)): foreach($arr5 as $key=>$j): ?><option value="<?php echo ($j["instructions_id"]); ?>">
				<?php echo ($j["instructions_name"]); ?>
			</option><?php endforeach; endif; ?>
		</select><br /><br />
		<input type="hidden" name="model_id" value='<?php echo ($model_id); ?>'>
		<input type="hidden" name="brand_id" value='<?php echo ($brand_id); ?>'>
	
		<input type="submit" value='确定'>
		<input type="button" value="取消" onclick="add(1)">
	</form>  
	 

	
</body>
</html>