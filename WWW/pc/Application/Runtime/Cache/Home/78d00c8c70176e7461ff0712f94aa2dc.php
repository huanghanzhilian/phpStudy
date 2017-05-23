<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	 <style>
	body{font-size:14px;font-family:'microsoft yahei';background:#FAFAFA}
	.r{font-size:30px;color:back;}
	h2{text-align:center;font-size:16px;}
	.form{width:360px;margin:200px auto;background:#FFF;border:1px solid #EAEAEA;padding:10px 20px;}
	.form .row{margin:10px 0;}
	.form .row label{margin-right:10px;}
	.txt,.textarea{padding:4px;border:1px solid #EAEAEA;width:300px;border-radius:2px;}
	.textarea{height:200px;}
	.vtop{vertical-align:top;}
	
	.bt-save{padding:10px 30px;background-color:#F60;cursor:pointer;border-radius:4px;border:none;color:#FFF;margin-left:40px;}
	.bt-save:hover{background-color:#E4620B;}
</style> 
</head>
<body> 
<center><a href='javascript:void(0)'onclick='ways3(3)'><?php echo ($ways3); ?></a>&nbsp;&nbsp;&nbsp;
		<a href='javascript:void(0)'onclick='ways2(2)'><?php echo ($ways2); ?></a>&nbsp;&nbsp;&nbsp;
		<a href='javascript:void(0)'onclick='ways1(1)'><?php echo ($ways1); ?></a>
		
			<div id="wrap">
	<form action="/index.php/Home/Gouwuche/addorder/" method="post">
		<div class="form">
			<h2>工单测试DEMO</h2>
			<div class="row">
				<label>手机:</label>
				<span><?php echo ($username); ?></span>
			</div>
			<div class="row">
				<label>名字:</label>
				<span><input type="text" class="txt" name="uname" value='<?php echo ($user_username); ?>'/></span>
			</div>
			
			<div class="row">
				<label class="vtop">购买的产品配件:</label>
			<?php if(is_array($arr6)): foreach($arr6 as $key=>$vv): echo ($vv["cpk_name"]); ?>&nbsp;&nbsp;&nbsp;<?php echo ($vv["gw_pricee"]); ?>&nbsp;&nbsp;&nbsp;*<?php echo ($vv["nums"]); ?>&nbsp;&nbsp;<?php echo ($vv["gw_price"]); ?> <br /><br /><?php endforeach; endif; ?>
			</div>
			<div class="row">
				<label class="vtop">备注:</label>
				<span><textarea class="textarea" name="u_note" id="u_note"></textarea></span>
			</div>
			<div class="row">
				<label>总价格:</label>
				<span><?php echo ($price); ?>元</span>
			</div>
			  <div class="row" id='ff'>
					<span style=''id='f'>
					<select name="sheng" id='sheng' onchange='ajaxsheng()'>
						<option value="省">
							省
						</option>
						<?php if(is_array($arr4)): foreach($arr4 as $key=>$vv): ?><option value="<?php echo ($vv["region_id"]); ?>">
								<?php echo ($vv["region_name"]); ?>
							</option><?php endforeach; endif; ?>
					</select>
				</span>
			
			
		
				<span id='s'>
					
				</span>
				<span id='ss'>
					
				</span><br />
				<label>详细地址:</label>
				<span><input type="text" class="txt" name="address" id="address"/></span>
				<span style=''id='f'>
					<select name="wxzx_id" id='wxzx_id'>
						<?php if(is_array($arr5)): foreach($arr5 as $key=>$gf): ?><option value="<?php echo ($gf["wxzx_id"]); ?>">
								<?php echo ($gf["wxzx_name"]); endforeach; endif; ?>
					</select>
				</span>
				<input type="hidden" name="ways_id" id='ways_id' value='3'>
				</div>
			<div class="row bts">
				<label></label>
				<button type="submit" name="submit" class="bt-save">提交</button>
			</div>
		</div>
		</form>
	</div>
</center>
	
</body>
</html>
<script type="text/javascript">
function ways3(ways_id){
		//alert(ways_id);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/index.php/Home/Gouwuche/youji/id/"+ways_id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('ff').innerHTML=ajax.responseText
				}
}
	}
	function ways2(ways_id){
		//alert(ways_id);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/index.php/Home/Gouwuche/daodian/id/"+ways_id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('ff').innerHTML=ajax.responseText
				}
}
	}
	function ways1(ways_id){
		//alert(ways_id);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/index.php/Home/Gouwuche/shangmen/id/"+ways_id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('ff').innerHTML=ajax.responseText
				}
}
	}
function ajaxsheng(){
	document.getElementById('ss').style.display='none';
		var sheng=document.getElementById('sheng').value;
		var ajax=new XMLHttpRequest()
			ajax.open("get","/index.php/Home/Gouwuche/shi/id/"+sheng,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('s').innerHTML=ajax.responseText
				}
			}
	}
	function ajaxshi(){
		document.getElementById('ss').style.display='block';
		var shi=document.getElementById('shi').value;
		var ajax=new XMLHttpRequest()
			ajax.open("get","/index.php/Home/Gouwuche/qu/id/"+shi,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('ss').innerHTML=ajax.responseText
				}
			}
	}


</script>