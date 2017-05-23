<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<a href="/Admin/Guanlishifu/index">返回</a><br /><br /><br />
<a href='javascript:void(0)'onclick='tx(1)'>未审核</a>  <a href='javascript:void(0)'onclick='tx(2)'>已通过</a><br /><br /><br />
	<div id='list'>
	<?php if(is_array($arr)): foreach($arr as $key=>$k): ?>单号:<?php echo ($k["ddh"]); ?> <br />
			提现金额:<?php echo ($k["amt"]); ?><br />		
			账号:<?php echo ($k["kahao"]); ?><br />
			姓名:<?php echo ($k["user_username"]); ?><br />
			申请时间:<?php echo ($k["txsq_time"]); ?><br />
			<?php if(strtoupper($k['zta']) == 1): ?>待审核<br /><br />
					<a href="/Admin/Guanlishifu/tongguo/id/<?php echo ($k["tixianshenqing_id"]); ?>">确认通过</a><br /><br />
					<a href="/Admin/Guanlishifu/jujue/id/<?php echo ($k["tixianshenqing_id"]); ?>">拒绝</a>
					<?php elseif(strtoupper($k['zta']) == 2): ?> 
					已通过<?php endif; ?> <br />
			
			<br /><br /><br /><?php endforeach; endif; ?>
</div>
</body>
</html>
<script type="text/javascript">
		function tx(zta){
		//	alert(zta)
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Admin/Guanlishifu/tixianajax/zta/"+zta,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('list').innerHTML=ajax.responseText
				}
}
	}

</script>