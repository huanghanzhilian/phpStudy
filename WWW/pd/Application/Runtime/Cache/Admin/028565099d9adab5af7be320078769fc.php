<?php if (!defined('THINK_PATH')) exit();?>
	<form method="post" action="/Admin/Shangpin/fananxiugaiadd">
		解决方案:<input type="text" name="plan_name" value='<?php echo ($arr["plan_name"]); ?>'><br /><br />
		价格:<input type="text" name="money" value='<?php echo ($arr["money"]); ?>'><br /><br />
		维修时间:<input type="text" name="m_time" value='<?php echo ($arr["m_time"]); ?>'><br /><br />
		保质期:<input type="text" name="warranty_name" value='<?php echo ($arr["warranty_name"]); ?>'><br /><br />
		描述:<select name="instructions_id">
		<?php if(is_array($arr5)): foreach($arr5 as $key=>$j): ?><option value="<?php echo ($j["instructions_id"]); ?>">
				<?php echo ($j["instructions_name"]); ?>
			</option><?php endforeach; endif; ?>
		</select><br /><br />
		<input type="hidden" name="plan_id" value='<?php echo ($arr["plan_id"]); ?>' >
		<input type="hidden" name="model_id" value='<?php echo ($model_id); ?>'>
		<input type="hidden" name="brand_id" value='<?php echo ($brand_id); ?>'>
		<input type="submit" value='确定'>
		<input type="button" value="取消" onclick="adda(1)">
	</form>