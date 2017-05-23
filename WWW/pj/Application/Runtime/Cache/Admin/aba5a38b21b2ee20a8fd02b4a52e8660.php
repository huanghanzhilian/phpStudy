<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css">
		#f{float:left; }
		#l{float:right; margin-right:20px}
	</style>
</head>

<body>
<a href="/Admin/Youhuiquan/index">返回</a><br /><br />
	<div id='f'>
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): echo ($kk["yq_name"]); ?>&nbsp;&nbsp;<?php echo ($kk["yq_price"]); ?>&nbsp;&nbsp;<?php echo ($kk["user_username"]); ?>&nbsp;&nbsp;<?php echo ($kk["user_name"]); ?> &nbsp;&nbsp;<a  href='javascript:void(0)'onclick='ass(<?php echo ($kk["yq_id"]); ?>)'>修改优惠金额</a><br /><br /><?php endforeach; endif; ?>
	</div>
	<div id='l' >
	
	</div>
</body>
</html>
<script type="text/javascript">
function ass(id){
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Admin/Youhuiquan/yqxiugai/yq_id/"+id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('l').innerHTML=ajax.responseText
				}
			}
	}
</script>