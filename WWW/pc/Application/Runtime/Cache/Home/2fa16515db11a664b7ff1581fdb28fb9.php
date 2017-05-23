<?php if (!defined('THINK_PATH')) exit();?>
	<?php if(is_array($arr1)): foreach($arr1 as $key=>$v): ?><li class="mjbrcv"><?php echo ($v["model_name"]); ?></li><?php endforeach; endif; ?>