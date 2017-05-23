<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body><a href="/Admin/Guanlishifu/index">返回</a>
		<center><a href='javascript:void(0)'onclick='shenhee(1)'>待审核</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)'onclick='shenhe(2)'>已完成</a></center><br /><br />
	<div id='list'>
	<?php if(is_array($arr)): foreach($arr as $aa=>$kk): ?>订单号:<?php echo ($aa); ?> <br />
		商品:<br />
		<?php if(is_array($kk)): foreach($kk as $key=>$cc): echo ($cc["cpk_name"]); ?>&nbsp;&nbsp;&nbsp;<?php echo ($cc["cpk_price"]); ?>元 <br /><?php endforeach; endif; echo ($cc["user_username"]); ?><br />
		<?php echo ($cc["user_name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;总价(<?php echo ($cc["amount"]); ?>) <br /><br />
		已付款  <br /><br />
		<a href="/Admin/Guanlishifu/shenhetongguo/id/<?php echo ($cc["id"]); ?>">审核通过</a><br /><br />
		<a href="/Admin/Guanlishifu/shenhebutongguo/id/<?php echo ($cc["id"]); ?>">审核不通过</a><br /><br /><?php endforeach; endif; ?>	<br /> 
	</div>

</body>
</html>
<script type="text/javascript">
function shenhe(fkzt){
	//alert(fkzt);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Admin/Guanlishifu/shenhea/fkzt/"+fkzt,true)
			//alert(model_id);/* style='display:none'*/
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('list').innerHTML=ajax.responseText
				}
			}
	}

function shenhee(fkzt){
	//alert(fkzt);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Admin/Guanlishifu/shenheaa/fkzt/"+fkzt,true)
			//alert(model_id);/* style='display:none'*/
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('list').innerHTML=ajax.responseText
				}
			}
	}
</script>