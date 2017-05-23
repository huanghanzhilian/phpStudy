<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>维百士-工程师-配件详情</title>
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
     <a href="/Home/Gouwuche/peijiandingdan"><span></span></a>
    <h1>订单详情</h1>
    
</div><!--头-->

<!--内容-->
<div class="content">
    <div class="content_con">
        <div class="sjio_dhnu">
            <h1 class="bumkpo">购买的配件产品</h1>
            <div class="sjio_dhnu_top">
                <ul>
                    <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li>
                            <span class="molpp">
                                <?php echo ($kk["cpk_name"]); ?>
                            </span>
                            <span class="molpp2">
                                <?php echo ($kk["cpk_price"]); ?>*1
                            </span>
                        </li><?php endforeach; endif; ?>
                    <li>
                        <span class="molpp2">总价格：<em class="huancore"><?php echo ($arr2["amount"]); ?>元</em></span>
                    </li>
                </ul>
            </div>
            
            <h1 class="bumkpo">个人信息</h1>
            <div class="sjio_dhnu_top">
                <ul>
                    <li>
                        <div class="molpp2">姓名：<span class="muvha"><?php echo ($arr2["user_username"]); ?></span><!--<i class="xiykk"></i>--></div>
                    </li>
                    <li>
                        <div class="molpp2">手机：<span class="muvha"><?php echo ($arr2["user_name"]); ?></span></div>
                    </li>
                    <!--<li>
                        <div class="molpp2">配件获取方式：<span class="xxmuo on">邮寄</span><span class="xxmuo">自取</span><span class="xxmuo">上门</span></div>
                    </li>-->
                </ul>
            </div>
            

            
        </div>
        
    </div>
</div>
<!--内容-->

<!--nav固定-->
<div class="nav_gd">
    <div class="nudt_1a cunmgy">
        
        <li class="nudt_1_rc nudt_1_rc1">
            <a id="qunfur_fk" href="/Home/Payy/peijian/ddh/<?php echo ($arr2["ddh"]); ?>"><?php echo ($qfk); ?></a>
        </li>
    </div>
</div>

<!--nav固定-->

<script>
$(function(){
	//师傅订单详情价格
	var qunfur_fk=$("#qunfur_fk")
	console.log(qunfur_fk);
	if(qunfur_fk.text()==''){
		qunfur_fk.parents('.nav_gd').remove()
	}
	
	$( ".tf_null" ).each(function() {
		
		var tf_null=$(this).text();
		var tf_nullr = $.trim(tf_null)
		
		if(tf_nullr==""){
			$(this).parent().remove()
		}
		//console.log($(this).text());
	})
    //师傅订单详情价格
})
</script>
</body>
</html>