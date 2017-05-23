<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css">
		#l{float:left; }
		#ky{float:right; margin-right:20px;width:90%;}
	
	</style>
</head>
<body><center>
<input type="text" id="sea" placeholder='请输入关键字/'>
	<input type="button" id="sou" value="搜索" onclick="ajax(1)"></center>
	<div id='l'>
	<a href="/Admin/Shangpin/index">商品管理</a><br /><br /><br />
	用户管理<br /><br /><br />
	<a href="/Admin/Huishou/index">回收管理</a><br /><br /><br />
	<a href="/Admin/Guanlishifu/index">师傅管理</a><br /><br /><br />
	<a href="/Admin/Ddguanli/jixiu/ways_id/3">订单管理</a><br /><br /><br />
	<a href="/Admin/caiwu/index">财务管理</a><br /><br /><br />
	<a href="/Admin/Fapiao/index">发票管理</a><br /><br /><br />
	<a href="/Admin/Youhuiquan/index">优惠券管理</a>
	</div>
	
	<div id='ky'>
	
	</div>
</body>
</html>
<script type="text/javascript">
function ajax(){
		var sea=document.getElementById("sea").value
		//alert(sea);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Admin/Index/dingdan_list/sea/"+sea,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('ky').innerHTML=ajax.responseText
				}
			}
	}

</script>