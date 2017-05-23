<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<a href="/Home/Gouwuche/peijiandingdan">返回</a><br /><br />
	<a href="/Home/index/wxlogin"><?php echo ($yanz); ?></a><br /><br />
	<img src="<?php echo ($avatar); ?>" width=100 height=100 /></a><br />
	<?php echo ($wxusername); ?><br /><br />
	个人信息<br /><br />
	已维修了:<?php echo ($nums); ?>单<br /><br />
	余额：<?php echo ($yuemoney); ?>元&nbsp;&nbsp;&nbsp;<a href="/Home/Grzx/tixian">提现</a><br /><br />
	负债:<?php echo ($yue); ?>&nbsp;&nbsp;&nbsp;
	<?php if(strtoupper($yue) == 0): ?>无需还款
					<?php else: ?>
					<a href="/Home/Grzx/huankuan">还款</a><?php endif; ?> <br /><br />
	<a href="/Home/Grzx/peijianhuishou">回收的配件</a><br /><br />
<span id='gg'><a href='javascript:void(0)'onclick="ko(<?php echo ($sfzt); ?>)"><?php echo ($kongxian); ?></a></span>
</body>
</html><!-- <input type="button" value="" onclick='ko(1)'> -->
<script type="text/javascript">
	function ko(id){
		//id=1;
		//alert(id);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Grzx/shifuzhuangtai/id/"+id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('gg').innerHTML=ajax.responseText
				}
			}
	}
</script>