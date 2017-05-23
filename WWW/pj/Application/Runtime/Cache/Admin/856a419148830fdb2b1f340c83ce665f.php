<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<a href="/Admin/Shangpin/question/brand_id/<?php echo ($brand_id); ?>/model_id/<?php echo ($model_id); ?>/questiontype_id/<?php echo ($questiontype_id); ?>">返回</a><br /><br />
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): echo ($kk["question_name"]); ?>&nbsp;&nbsp;&nbsp;<a class="zjnmk_pp" href="/Admin/Shangpin/planhuifu/brand_id/<?php echo ($brand_id); ?>/model_id/<?php echo ($model_id); ?>/plan_id/<?php echo ($kk["plan_id"]); ?>" onclick="if(confirm('确定恢复?')==false)return false;">恢复</a><br /><br /><?php endforeach; endif; ?>
</body>
</html>