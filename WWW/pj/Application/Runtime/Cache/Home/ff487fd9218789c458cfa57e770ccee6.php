<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>维百士-工程师-卖出单</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<style>

</style>
</head>

<body style=" background:#f0f0f0;"> 
<div class="header">
<a href="/Home/Gouwuche/cangkua"><span></span></a>
    <h1>卖出单</h1>
</div><!--头-->
<!--内容-->
<div class="content">
    <div class="content_con">
        <!--tab头-->
        <div class="shifudu_top">
            <ul class="pubcvt shifudu_top_ul">
                <li class="pubcvt_v shifudu_top_li shifudu_top_li_1">
                    <a href="javascript:void(0)" onclick='wei(0)'>卖出中<span>(<?php echo ($nums1); ?>)</span></a>
                </li>
                <li class="pubcvt_v shifudu_top_li">
                    <a href="javascript:void(0)" onclick='yifk(1)'>已卖出<span>(<?php echo ($nums2); ?>)</span></a>
                </li>
                <li class="pubcvt_v shifudu_top_li">
                    <a href="javascript:void(0)" onclick='yi(2)'>买入订单<span>(<?php echo ($nums3); ?>)</span></a>
                </li>
            </ul>
        </div>
        <!--tab头-->


<!--<a href="/Home/Gouwuche/goumaichanpin">购买商品</a>
<center><?php echo ($my); ?></center>
<center><a href="/Home/Gouwuche/cangkua">仓库</a></center>
	 <center><a href='javascript:void(0)'onclick='wei(0)'>未付款</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='javascript:void(0)'onclick='yifk(1)'>已付款</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='javascript:void(0)'onclick='yi(2)'>已完成</a></center>-->
     
     
	<div id='ff'>
		
    <div class="ceomer_com">
        <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><h1 class="da_con_ce">订单编号：<?php echo ($kk["ddh"]); ?>
		<span class="shifu_qx">
         <a href="/Home/Gouwuche/quxiaomaichu/id/<?php echo ($kk["id"]); ?>/cangku_id/<?php echo ($kk["cangku_id"]); ?> "onclick="if(confirm('确定取消?')==false)return false;">取消订单</a>
          
       </span>
	   </h1>
        <div class="rnmbur rnmbur_c">
            <ul>
                <li>
                     买方：<span class="chuangmbr">
                              <?php echo ($kk["maifang"]); ?>
                          </span>
                          <span class="bimnb fr"></span>
                </li>
                <li>
                     金额：<span class="chuangmbr">
                             <?php echo ($kk["amount"]); ?>元  
                          </span>
                </li>
                <li>
                     <span class="chuangmbr">
                             <?php echo ($kk["cpk_name"]); ?>
                          </span>
                </li>
                <li>
                    <span class="desc">
                       
                    </span>
                </li>
                
                <li>
                     <span class="chuangmbr"><?php echo ($kk["cangku_name"]); ?></span><span class="bimnb fr">成本:<?php echo ($kk["cpk_price"]); ?>元</span>
                </li>
				
            </ul>
        </div><?php endforeach; endif; ?>
    
	    
	</div>
    </div>
    
    </div>
</div>
<!--内容-->
</body>
</html>

<script type="text/javascript">
$(function(){
	$(".shifudu_top_li").click(function(){
		if($(this).hasClass('shifudu_top_li_1')){
			//$(this).removeClass('shifudu_top_li_1')
			//$(this).find('b').css({'background-color':'#e6e6e6'})
		}else{
		$(this).addClass('shifudu_top_li_1').siblings().removeClass('shifudu_top_li_1')
		
		};
	})
})



	function yifk(){
		//alert(ways_id);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Gouwuche/maichu_b",true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('ff').innerHTML=ajax.responseText
				}
}
	}
function wei(zt){
		//alert(zt);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Gouwuche/maichu_a/zt/"+zt,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('ff').innerHTML=ajax.responseText
				}
}
	}
function yi(){
		//alert(ways_id);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Gouwuche/maichu_c",true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('ff').innerHTML=ajax.responseText
				}
}
	}
</script>