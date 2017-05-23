<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
<title>维百士-手机维修-支付</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="//cdn.bootcss.com/jquery/2.2.0/jquery.min.js"></script>
<script src="/Public/js/pingpp-pc.js" type="text/javascript"></script>
<script type="text/javascript">

	function pay(id,type){
		$.post("<?php echo U('payy');?>",{id:id,type:type},function(data){
			if(data != "error"){
				pingppPc.createPayment(data, function(result, err) {
				    console.log(result);
				    console.log(err.msg);
				    console.log(err.extra);
				});
			}
		});
	}

</script>
<script src="/Public/js/pingpp.js" type="text/javascript"></script>
<script type="text/javascript">

	function wap_pay(id,type){
		$.post("<?php echo U('payy');?>",{id:id,type:type},function(data){
			if(data != "error"){
				pingpp.createPayment(data, function(result, err) {
				    console.log(result);
				    console.log(err.msg);
				    console.log(err.extra);
				});
			}
		});
	}
$(function(){
	var p_nall=$(".zt_ico>ul>li>span").text();
	$(".zf_top1 ul li a").each(function(){
		if($(this).text()==""){
			$(this).parent().remove();
		}
		//console.log(p_nall.parent().html());
	})
})
</script>
</head>
<body>
<div class="header">
    <span onclick="window.history.back()"></span>
    <h1>支付</h1>
    	
</div><!--头-->
<div class="content">
    <div class="content_con">
        <div class="zf_top">
            <ul>
                <!--<li>id:<?php echo ($good['id']); ?></li>-->
                <li>名称：<?php echo ($good['u_title']); ?></li>
                <li class="Price_1">价格：<?php echo ($good['amount']); ?> 元</li>
                <!--<li>描述:<?php echo ($good['u_title']); ?></li>-->
            </ul>
        </div>
        <div class="zf_top1">
            <ul>
                <li><a href="javascript:pay(<?php echo ($good['id']); ?>,'alipay_pc_direct');">支付宝电脑购买</a></li>
                <li><a href="javascript:wap_pay(<?php echo ($good['id']); ?>,'alipay_wap');">支付宝手机购买</a></li>
                <li><a href="/index.php/Home/Gouwuche/xinyongedu/id/<?php echo ($good["id"]); ?>"><?php echo ($b); ?></a></li>
                <li><a href="/index.php/Home/Gouwuche/yuefk/id/<?php echo ($good["id"]); ?>"><?php echo ($h); ?></a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>