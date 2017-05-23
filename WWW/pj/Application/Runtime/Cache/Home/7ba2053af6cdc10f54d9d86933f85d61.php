<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
					<span style=''id='f'>
					<select name="sheng" id='sheng' onchange='ajaxsheng()'>
						<option value="省">
							省
						</option>
						<?php if(is_array($arr4)): foreach($arr4 as $key=>$vv): ?><option value="<?php echo ($vv["region_id"]); ?>">
								<?php echo ($vv["region_name"]); ?>
							</option><?php endforeach; endif; ?>
					</select>
				</span>
			
			
		
				<span id='s'>
					
				</span>
				<span id='ss'>
					
				</span><br />
				<label>详细地址:</label>
				<span><input type="text" class="txt" name="address" id="address"/></span>
</html>