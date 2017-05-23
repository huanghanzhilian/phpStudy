<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-工程师-订单详情</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<style>
body{font-size:14px;font-family:'microsoft yahei';background:#FAFAFA}
.r{font-size:30px;color:back;}
h2{text-align:center;font-size:16px;}
.form{margin:200px auto;background:#FFF;border:1px solid #EAEAEA;padding:10px 20px;}
.form .row{margin:10px 0;}
.form .row label{margin-right:10px;}
.txt,.textarea{padding:4px;border:1px solid #EAEAEA;width:300px;border-radius:2px;}
.textarea{height:200px;}
.vtop{vertical-align:top;}








</style> 
</head>
<body style=" background:#f0f0f0;"> 
<div class="header">
    <span onclick="window.history.back()"></span>
    <h1>订单详情</h1>
    
</div><!--头-->
<!--内容-->
<div class="content">
    <div class="content_con">
        <div class="sjio_dhnu">
            <h1 class="bumkpo">购买的配件产品</h1>
            <div class="sjio_dhnu_top">
                <ul> <?php if(is_array($arr6)): foreach($arr6 as $key=>$kk): ?><li>
                        <span class="molpp"> <?php echo ($kk["cpk_name"]); ?></span>
                        <span class="molpp2"><?php echo ($kk["cpk_price"]); ?>*1</span>
                    </li><?php endforeach; endif; ?>
                    <li>
                        <span class="molpp2">总价格：<em class="huancore"><?php echo ($price); ?>元</em></span>
                    </li>
                </ul>
            </div>
            
            <h1 class="bumkpo">个人信息</h1>
            <div class="sjio_dhnu_top">
                <ul>
                    <li>
                        <div class="molpp2">姓名：<span class="muvha"><?php echo ($user_username); ?></span><!--<i class="xiykk"></i>--></div>
                    </li>
                    <li>
                        <div class="molpp2">手机：<span class="muvha"><?php echo ($username); ?></span></div>
                    </li>
                    <!--<li>
                        <div class="molpp2">配件获取方式：<span class="xxmuo on">邮寄</span><span class="xxmuo">自取</span><span class="xxmuo">上门</span></div>
                    </li>-->
                </ul>
            </div>
            
            <!--<h1 class="bumkpo">邮寄地址</h1>
            <div class="sjio_dhnu_top">
                <ul>
                    <li>
                        <div class="molpp2">姓名：<span class="muvha">晋级赛</span><i class="xiykk"></i></div>
                    </li>
                    <li>
                        <div class="molpp2">手机：<span class="muvha">13333333333</span></div>
                    </li>
                    <li>
                        <div class="molpp2">手机：<span class="muvha">13333333333</span></div>
                    </li>
                    <li>
                        <div class="molpp2">手机：<span class="muvha">13333333333</span></div>
                    </li>
                </ul>
            </div>-->
            
            
        </div>
	
			<div id="wrap">
	<form action="/Home/Gouwuche/addorder/" method="post" onSubmit="return Checked();">
	<!--	<div class="form">
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
					<select name="jxzx_id" id='jxzx_id'>
						<?php if(is_array($arr5)): foreach($arr5 as $key=>$gf): ?><option value="<?php echo ($gf["jxzx_id"]); ?>">
								<?php echo ($gf["jxzx_name"]); endforeach; endif; ?>
					</select>
				</span>
				<input type="hidden" name="ways_id" id='ways_id' value='3'>
				</div>
			<div class="row bts">
				<label></label>
				
			</div>
		</div>  -->
        
        
<!--nav固定-->
<div class="nav_gd">
    <div class="nudt_1a cunmgy">
        <li class="nudt_1_lb">
            
            <div class="dinbbbu">
                订单总额:<span id="abc"><?php echo ($price); ?></span>元
            </div>
        </li>
        <li class="nudt_1_rc nudt_1_rc1">
           <!-- <a href="/Home/Gouwuche/querendingdan">1<?php echo ($qr); ?></a>-->
            <button type="submit" name="submit" class="bt-save">提交</button>
        </li>
    </div>
</div>

<!--nav固定-->
        
        
        
        
		</form>
	</div>

	
    
    </div>
</div>
<!--内容-->

</body>
</html>
<script type="text/javascript">
var checkSubmitFlg = false;
function Checked(){
	if (!checkSubmitFlg) {
		checkSubmitFlg = true;
		return true;
	}else{
		alert("抱歉不能反复提交");
		return false;
	}
}




function ways3(ways_id){
		//alert(ways_id);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Gouwuche/youji/id/"+ways_id,true)
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
			ajax.open("get","/Home/Gouwuche/daodian/id/"+ways_id,true)
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
			ajax.open("get","/Home/Gouwuche/shangmen/id/"+ways_id,true)
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
			ajax.open("get","/Home/Gouwuche/shi/id/"+sheng,true)
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
			ajax.open("get","/Home/Gouwuche/qu/id/"+shi,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('ss').innerHTML=ajax.responseText
				}
			}
	}


</script>