<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<center><a href='javascript:void(0)'onclick='ass(0)'>申请售后</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href='javascript:void(0)'onclick='ass(1)'>售后中</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href='javascript:void(0)'onclick='ass(3)'>已完成</a></center>
	<br /><br />
	<div id='e'>
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?>问题:<?php echo ($kk["contentt"]); ?>&nbsp;&nbsp;
		姓名:<?php echo ($kk["username"]); ?>&nbsp;&nbsp;
		电话:<?php echo ($kk["tell"]); ?>&nbsp;&nbsp;
		   <?php if(strtoupper($kk['addres']) == ''): ?>到店
                <?php else: ?>
        邮寄地址:<?php echo ($kk["addres"]); ?>&nbsp;&nbsp;
		回寄地址:<?php echo ($kk["addre"]); ?>&nbsp;&nbsp;
		邮寄&nbsp;&nbsp;<?php endif; ?>
		
		   <?php if(strtoupper($kk['zt']) == 0): ?><a href="/Admin/Ddguanli/fenpei/shouhou_id/<?php echo ($kk["shouhou_id"]); ?>">分配</a>
                <?php else: endif; ?>
		<br /><br /><?php endforeach; endif; ?>
	</div>
</body>
</html>
<script type="text/javascript">
function ass(id){
			//alert(fk);
			var ajax=new XMLHttpRequest()
				ajax.open("get","/Admin/Ddguanli/shouhouaa/zt/"+id,true)
				ajax.send()
				ajax.onreadystatechange=function(){
					if(ajax.readyState==4 && ajax.status==200){
						document.getElementById('e').innerHTML=ajax.responseText
					}
				}
	} 
</script>