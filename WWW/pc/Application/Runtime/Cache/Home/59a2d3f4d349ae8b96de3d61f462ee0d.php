<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css">
	#t{float:left;}
	#f{float:left;margin-left:10px;}
	
	</style>
</head>
<body>
	修前检测：	
<form method="post" action="/index.php/Home/Index/tj">
	<div id='t'>
	<?php if(is_array($arr2)): foreach($arr2 as $key=>$kk): echo ($kk["jc_name"]); ?>:&nbsp;&nbsp;&nbsp;<?php echo ($kk["jc_content"]); ?><input type="checkbox" name="jc_id[]" value='<?php echo ($kk["jc_id"]); ?>'>正常<br /><br /><?php endforeach; endif; ?><br /><br />
	</div>
	<div id='f'>
	<?php if(is_array($arr3)): foreach($arr3 as $key=>$kk): ?><input type="checkbox" name="jc_id[]" value='<?php echo ($kk["jc_id"]); ?>'>不正常<br /><br /><?php endforeach; endif; ?>
	</div>
	
	<input type="hidden" name="id" value='<?php echo ($id); ?>'>
	<input type="submit" value='提交确认'>
</form>
</body>
</html>