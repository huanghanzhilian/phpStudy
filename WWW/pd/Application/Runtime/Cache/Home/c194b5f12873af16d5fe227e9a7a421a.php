<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
<title>维百士-手机维修-确认付款</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<!--<script src="//cdn.bootcss.com/jquery/2.2.0/jquery.min.js"></script>-->
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/pingpp-pc.js" type="text/javascript"></script>
<script type="text/javascript">

	function pay(id,type){
		$.post("<?php echo U('payyyy');?>",{id:id,type:type},function(data){
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
		$.post("<?php echo U('payyyy');?>",{id:id,type:type},function(data){
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
<style>
.zhifu_top{ height:110px;  line-height:110px; text-align:center; background: url(../../../../Public/img/shifu_duan/mkiuy_1.png)0px 94px repeat-x;}
.project_boc_spalml{display: inline-block; vertical-align: middle; }
.project_boc_spalml>strong {
    font-size: 14px;
    display: block;
    line-height: 22px;
    color: #808080;
    font-weight: normal;}
	
.project_boc_spalml>em {
    font-size: 20px;
    display: block;
    font-style: normal;
    line-height: 24px;
    color: #ff7e00;
}	
.zhifu_neir{ padding:0 24px; }
.zhifu_neir li{ border-bottom:1px solid #e5e5e5; height:50px; line-height:50px; padding:0 6px; position:relative;}
.zhifu_neir li:last-child { border:none;}
.zhifu_neir li i{ width:35px; height:35px; background:url(../../../../Public/img/shifu_duan/mkhdfg.png) no-repeat;  background-size:375px; display:inline-block; vertical-align:middle;}
.zhifu_neir li i.bbctin1{ background-position:-200px -218px;}
.zhifu_neir li i.bbctin2{ background-position:-200px -271px;}
.zhifu_neir li i.bbctin3{ background-position:-200px -324px;}
.zhifu_neir li i.bbctin4{ background-position:-200px -378px;}
.zhifu_neir li span{ margin-left:10px; font-size:15px; color:#4c4c4c;}
.zhifu_neir li span b{ color:#b2b2b2; font-weight:normal;}
.zhifu_neir li em {
    background: url(../../../../Public/img/images/qrdg_2_03.png) center center no-repeat; position:absolute; right:0px; top:50%; margin-top:-9px;
    background-size: 100%;
    width: 18px;
    height: 18px;
    display: inline-block;
    vertical-align: middle;
    
}
.zhifu_neir li em.on{ background: url(../../../../Public/img/images/qrdg_1_03.png); background-size: 100%;}
.dibu_th{ padding:0 12px;}
.tijfsn{ display:none;}
</style>
</head>
<body>
<div class="header">
    <span onclick="window.history.back()"></span>
    <h1>确认付款</h1>
    	
</div><!--头-->
<div class="content">
    <div class="content_con">
        <div class="zhifu_top">
            <span class="project_boc_spalml">
                <strong>订单总额:</strong>
                <em>¥<?php echo ($good['amount']); ?></em>
            </span>
        </div>
        <form id="form_bbd" method="post" action="/Home/Payy/tousuadd" >
        <div class="zhifu_neir">
            
            <ul>
                <!-- <li>
                    <i class="bbctin1"></i><span>支付宝在线支付</span><input class="tijfsn" type="radio" name="tijfsn" value="服务投诉" id="fwts1" checked="checked" /><em></em>
                </li>
                <li>
                    <i class="bbctin2"></i><span>微信在线支付</span><input class="tijfsn" type="radio" name="tijfsn" value="服务投诉" id="fwts2"  /><em></em>
                </li> -->
                <li>
                    <i class="bbctin3"></i><span>余额支付<b>（当前可用<?php echo ($yuemoney); ?>元）</b></span><input class="tijfsn" type="radio" name="tijfsn" value="服务投诉" id="fwts3"  /><em></em>
                </li>
                <li>
                    <i class="bbctin4"></i><span>信用支付<b>（当前可用<?php echo ($xinyong); ?>元）</b></span><input class="tijfsn" type="radio" name="tijfsn" value="服务投诉" id="fwts4" /><em></em>
                </li>
            </ul>
            
            
        </div>
            <div class="dibu_th">
                <button class="submit_sd" type="submit" >提交</button>
            </div>
        </form>
        
        
        
<script>
$(function(){
    $( ".tijfsn" ).each(function(){
		if($(this).attr('checked')){
			$(this).next().addClass('on')
			$("#form_bbd").attr("action", "javascript:pay(<?php echo ($good['id']); ?>,'alipay_pc_direct');")
		}
	})
	$(".zhifu_neir li").click(function(){
			$(this).find('input').attr("checked",true);
			$( ".tijfsn" ).each(function(){
				if($(this).attr('checked')){
					$(this).next().addClass('on')
				}else{
					$(this).next().removeClass('on')
				}
			})
			
			if($("#fwts1").attr('checked')){
				$("#form_bbd").attr("action", "javascript:pay(<?php echo ($good['id']); ?>,'alipay_pc_direct');")
			}else if($("#fwts2").attr('checked')){
				$("#form_bbd").attr("action", "javascript:wap_pay(<?php echo ($good['id']); ?>,'alipay_wap');")
			}else if($("#fwts3").attr('checked')){
				$("#form_bbd").attr("action", "/Home/Gouwuche/maichuyuequfukuan/id/<?php echo ($good["id"]); ?>")
			}else{
				$("#form_bbd").attr("action", "/Home/Gouwuche/maichufukuan/id/<?php echo ($good["id"]); ?>")
			}
	})
	
})
</script> 
    <!-- <a href="/Home/Wxpay/index/id/<?php echo ($good["ddh"]); ?>">微信手机购买</a></li> -->
</body>
</html>