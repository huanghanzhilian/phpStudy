<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css">
		#le{float:left;}
		#list{float:left;margin-left:30px;}
	</style>
</head>
<body>
<div>
	<?php if(is_array($arr6)): foreach($arr6 as $key=>$kk): ?><a href="/index.php/Home/Index/pinpai/ide/<?php echo ($kk["type_id"]); ?>/type_name/<?php echo ($kk["type_name"]); ?>"><?php echo ($kk["type_name"]); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php endforeach; endif; ?>
</div><br /><br /><br />
<div>
	<div id='le'>
		<?php if(is_array($arr3)): foreach($arr3 as $key=>$kk): ?><a id='u' href='javascript:void(0)'onclick='ajaxpp(<?php echo ($kk["brand_id"]); ?>);'><?php echo ($kk["brand_name"]); ?></a><br /><br /><?php endforeach; endif; ?>
	</div>
	<div id='list'>
		<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><h3><?php echo ($kk["model_name"]); ?></h3>
		 <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><a href="/index.php/Home/Index/wenti/model_id/<?php echo ($kk["model_id"]); ?>/color_id/<?php echo ($ee["color_id"]); ?>"><?php echo ($ee["color_name"]); ?></a><br /><br /><?php endforeach; endif; endforeach; endif; ?>
	</div>
</div>
</body>
</html>
<script type="text/javascript">
	function ajaxpp(brand_id){
		var ajax=new XMLHttpRequest()
			ajax.open("get","/index.php/Home/Index/ajaxp/brand_id/"+brand_id,true)
			//alert(brand_id);
			/* */ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('list').innerHTML=ajax.responseText
				}
			} 
	}
</script>