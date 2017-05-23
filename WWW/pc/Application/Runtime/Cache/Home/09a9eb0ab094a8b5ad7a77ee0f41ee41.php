<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<a href="/index.php/Home/Grzx/tixian">返回</a><br /><br /><br />
<a href='javascript:void(0)'onclick='tx(1)'>提现中</a>  <a href='javascript:void(0)'onclick='tx(2)'>已提现</a><br /><br /><br />
	<div id='list'>
	<?php if(is_array($arr)): foreach($arr as $key=>$k): ?>单号:<?php echo ($k["tixianshenqing_id"]); ?> <br />
			提现金额:<?php echo ($k["amt"]); ?><br />		
			账号:<?php echo ($k["kahao"]); ?><br />
			姓名:<?php echo ($k["xingming"]); ?><br />
			申请时间:<?php echo ($k["txsq_time"]); ?><br />
			申请中<br /><br /><br /><?php endforeach; endif; ?>
</div>
</body>
</html>
<script type="text/javascript">
	function tx(zta){
		//alert(zat);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/index.php/Home/Grzx/txxxajax/zta/"+zta,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('list').innerHTML=ajax.responseText
				}
}
	}

</script>