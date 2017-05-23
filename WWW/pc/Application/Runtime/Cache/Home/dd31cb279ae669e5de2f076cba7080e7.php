<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css">
	#gw{float:right;margin-right:300px;}
	</style>
</head>
<body>
<a href="/index.php/Home/Gouwuche/goumaichanpin">返回</a>
<center><?php echo ($my); ?><span id='gw'><a href="/index.php/Home/Gouwuche/gouwuche">购物车(<span id='fi'><?php echo ($nums); ?></span>)</a></span></center>&nbsp;&nbsp;&nbsp;&nbsp;<br /><br />
	<div id='de'>
	<table border=1>
			<th>商品</th>
			<th>商品名称</th>
			<th>价格</th>
			<th>购买数量</th>
			<th>详情</th>
			<th>操作</th>
		<?php if(is_array($arr1)): foreach($arr1 as $key=>$vv): ?><tr>
				<td><img src="/Public/<?php echo ($vv["path"]); ?>" width=70 height=70/></td>
				<td><?php echo ($vv["cpk_name"]); ?></td>
				<td><span id='ddv'><?php echo ($vv["gw_pricee"]); ?></span></td>
				<td>
					<font size=5><a href="javascript:void(0)" onclick="jian(<?php echo ($vv["gw_id"]); ?>);"style="text-decoration:none">-</a>&nbsp&nbsp
					<span id='first<?php echo ($vv["gw_id"]); ?>'><?php echo ($vv["nums"]); ?></span>&nbsp;&nbsp<a href="javascript:void(0)"onclick="jia(<?php echo ($vv["gw_id"]); ?>);"style="text-decoration:none">+</a></font>
				</td>
				<td>开发中....</td>
				<td><a href="javascript:void(0)" onclick='del(<?php echo ($vv["gw_id"]); ?>)'>删除</a></td>
			</tr><?php endforeach; endif; ?>
	</table><br /><br />
	<div><?php echo ($zjg); ?><span id='abc'><?php echo ($price); ?></span>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php/Home/Gouwuche/querendingdan"><?php echo ($qr); ?></a></div>
	</div>
</body>
</html>
<script type="text/javascript" src="/Public/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
		/*function jia(id){
		//var	price=$('#abc').html()
		
		var ajax=new XMLHttpRequest()
			ajax.open("get","/index.php/Home/Gouwuche/jia_number/id/"+id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
						document.getElementById('first'+id).innerHTML=ajax.responseText
						//document.getElementById('abc').innerHTML=ajax.responseText
					
				}
			}

	}*/
			function jia(id){
			//	alert(id);
                        $.ajax({
                            url:"/index.php/Home/Gouwuche/jia_number",
                            data:{'id':id},
                            dataType:'json',
                            type:'get',
                            success:function(msg){
                                $('#first'+id).html(msg.nums);
								$('#fi').html(msg.gwnums);
								$('#abc').html(msg.price);		
                            }
                        });
                    }
			function jian(id){
                        $.ajax({
                            url:"/index.php/Home/Gouwuche/jian_number",
                            data:{'id':id},
                            dataType:'json',
                            type:'get',
                            success:function(msg){
                                $('#first'+id).html(msg.nums);
								$('#fi').html(msg.gwnums);	
								$('#abc').html(msg.price);		
                            }
                        });
                    }
function del(id){
		var ajax=new XMLHttpRequest()
			ajax.open("get","/index.php/Home/Gouwuche/gouwucheajax/id/"+id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('de').innerHTML=ajax.responseText
				}
			}
	}
</script>