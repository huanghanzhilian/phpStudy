<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css">
		a{text-decoration:none;}
		#le{float:left;}
		#list{float:left;margin-left:30px;}
		#gw{float:right;margin-right:300px;}
	</style>
</head>
	<body>
	<a href="/index.php/Home/Index/index">返回</a>
	<center><?php echo ($my); ?><span id='gw'><a href="/index.php/Home/Gouwuche/gouwuche">购物车(<span id='fi'><?php echo ($nums); ?></span>)</a></span></center>&nbsp;&nbsp;&nbsp;&nbsp;<br /><br />
		<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><a href='javascript:void(0)'onclick='brandajax(<?php echo ($kk["brand_id"]); ?>);'><?php echo ($kk["brand_name"]); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<?php endforeach; endif; ?>
<br /><br />
		<div id='brand_list'>
		<div id='le'>
		<?php if(is_array($arr1)): foreach($arr1 as $key=>$v): ?><a href='javascript:void(0)'onclick='cpkajax(<?php echo ($v["model_id"]); ?>);'/><?php echo ($v["model_name"]); ?> </a><br /><br /><?php endforeach; endif; ?>
		</div>
 <br /><br />
 <div id='li'>
<?php if(is_array($arr2)): foreach($arr2 as $key=>$h): echo ($h["cpk_name"]); ?>&nbsp;&nbsp;<span><?php echo ($h["cpk_price"]); ?>元</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onclick='tjgwc(<?php echo ($h["cpk_id"]); ?>);'>+</a><br />	<br /><?php endforeach; endif; ?>
 
<!-- <?php if(is_array($arr3)): foreach($arr3 as $key=>$hh): echo ($hh["cpk_name"]); ?>&nbsp;&nbsp;<span><?php echo ($hh["cpp_price"]); ?>元</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onclick='tjgwc(<?php echo ($hh["cpk_id"]); ?>);'>+</a><br />	<br /><?php endforeach; endif; ?>  -->
 </div>
 </div>
	</body>
</html>
<script type="text/javascript" src="/Public/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">

function cpkajax(model_id){
		var ajax=new XMLHttpRequest()
			ajax.open("get","/index.php/Home/Gouwuche/chanpinkuajax/model_id/"+model_id,true)
			//alert(model_id);/* style='display:none'*/
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('li').innerHTML=ajax.responseText
				}
			}
	}
function tjgwc(id){
			var ajax=new XMLHttpRequest()
			ajax.open("get","/index.php/Home/Gouwuche/gwc/id/"+id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('fi').innerHTML=ajax.responseText
				}
			}
	
	}
		function brandajax(brand_id){
			var ajax=new XMLHttpRequest()
			ajax.open("get","/index.php/Home/Gouwuche/branda/brand_id/"+brand_id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('brand_list').innerHTML=ajax.responseText
				}
			}
	
	}
</script>