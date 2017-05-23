<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<a href="/Admin/Youhuiquan/index">返回</a><br /><br />
<center><a href="/Admin/Youhuiquan/yhqw_show">未使用</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/Admin/Youhuiquan/yhqy_show">已使用</a></center>
<body>
<div id='ff'>
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): echo ($kk["ma"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($kk["yhqprice"]); ?> 元&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($kk["yonghuname"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($kk["phone"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;
		<!-- <a href='javascript:void(0)'onclick='de(<?php echo ($kk["yhq_id"]); ?>)'>删除</a>--><br /><br /><?php endforeach; endif; ?>
</div>
</body>
</html>
<script type="text/javascript">
function de(id){
	 if(window.confirm('您确定要删除吗')){
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Admin/Youhuiquan/youhuishanchua/id/"+id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('ff').innerHTML=ajax.responseText
				}
			}
			window.location.reload()
	 }
}

</script>