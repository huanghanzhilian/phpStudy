<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<div id='list'>
<a href="/Home/Grzx/index">返回</a><br /><br />
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): echo ($kk["cpk_name"]); ?> &nbsp;&nbsp;<?php echo ($kk["cpk_price"]); ?>元&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)'onclick='hq(<?php echo ($kk["huishou_id"]); ?>)'>赶快换钱去</a><br /><br /><?php endforeach; endif; ?>
</div>
</body>
</html>
<script type="text/javascript">
	function hq(id){
		//alert(id);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Grzx/hqajax/huishou_id/"+id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('list').innerHTML=ajax.responseText
				}
}
	}


</script>