<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css">
		a{text-decoration:none;}
		#le{float:left;}
		#list{float:left;margin-left:30px;}
	</style>
</head>
<body>
	<?php if(is_array($arr9)): foreach($arr9 as $key=>$k): ?><a href='javascript:void(0)'onclick='j()'><?php echo ($k["brand_name"]); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php endforeach; endif; ?><br /> <br /><br />
	<div id='le'>
	
	</div>
	
<form method="post" action="/index.php/Home/Index/tjjj">
<input type="hidden" name="id" value='<?php echo ($id); ?>'>
<h1>配件</h1>
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><a href='javascript:void(0)'onclick=''><h3><?php echo ($kk["cpk_name"]); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($kk["cpp_price"]); ?>元&nbsp;&nbsp;&nbsp;&nbsp;总数量(<?php echo ($numss); ?>)</h3>
		<?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><!-- <input type="hidden" name="cangku_id[]" value='<?php echo ($ee["cangku_id"]); ?>'> -->
		<input type="checkbox" name="cangku_id[]" value='<?php echo ($ee["cangku_id"]); ?>'><?php echo ($ee["cangku_name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp; 数量(<?php echo ($ee["numss"]); ?>)&nbsp;&nbsp;&nbsp;<br /><?php endforeach; endif; ?><br /><br /><?php endforeach; endif; ?>
	<h1>回收:</h1>
	<?php if(is_array($arr11)): foreach($arr11 as $key=>$k): ?><input type="checkbox" name="cppk_id[]" value='<?php echo ($k["cpk_id"]); ?>'><?php echo ($k["cpk_name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($k["cpk_price"]); ?>元<br /> <br /><?php endforeach; endif; ?>
	
	<?php echo ($b); ?>
	</form>

</body>
</html>
<script type="text/javascript">
	function jixing(model_id){
		var ajax=new XMLHttpRequest()
			ajax.open("get","/index.php/Home/Index/peijiana/model_id/"+model_id,true)
			//alert(model_id);/* style='display:none'*/
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('list').innerHTML=ajax.responseText
				}
			}
	}


</script>