<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>维百士-工程师-我的钱包</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<style>
/*320px布局*/
html{font-size: 100px;}
body{ font-size: 0.12rem;/*实际相当于12px*/ }

/* iphone 6 */
@media (min-device-width : 375px) and (max-device-width : 667px) and (-webkit-min-device-pixel-ratio : 2){
    html{font-size: 117.1875px;}
}
/* iphone6 plus */
@media (min-device-width : 414px) and (max-device-width : 736px) and (-webkit-min-device-pixel-ratio : 3){
    html{font-size: 129.375px;}
}
.quzryut{ width:90%; height:50%; background:#fff; margin:auto;}



</style>
</head>

<body>
<div class="header">
   <a href="/Home/Shifu/index"><span></span></a>
    <h1>我的钱包</h1>
</div><!--头-->

<div class="content">
    <div class="content_con">
        <ul class="my_wallet">
            <li class="my_wallet_bg_img1 ">
                <div class="my_wallet_list">
                    <div class="my_wallet_list_mm pubcvt">
                        <div class="my_wallet_logo_list pubcvt_v">
                            
                            <img src="../../../../Public/img/banner_1.png">
                            <strong class="mml_jz_mma"><?php echo ($user_username); ?></strong>
                            
                        </div>
                        <div class="my_wallet_logo_list_r pubcvt_v2">
                            <div class="my_wallet_logo_list_r_top">
                                近期收入变化（元/月)
                            </div>
                            <!--<div class="quzryut">
                                <canvas id="can" width="100px" height="100px"></canvas>
                            </div>-->
                        </div>
                    </div>
                </div> 
            </li>
            <li class="my_wallet_bg_img2">
                <div class="my_wallet_list">
                    <div class="my_wallet_list2_r fr">
                        <span><a href="/Home/Gouwuche/balail_a">明细</a></span> 
                        <span><a href="/Home/Gouwuche/yuer_tixian">提现</a></span> 
                    </div>
                    <div class="my_wallet_list2_l">
                        <strong>余额(元)</strong>
                        <h2><?php echo ($yuemoney); ?>.00</h2>
                    </div>
                </div>
            </li>
            <li class="my_wallet_bg_img3">
                <div class="my_wallet_list">
                    <div class="my_wallet_list2_r fr">
                        <span><a href="/Home/Gouwuche/balail_b">明细</a></span> 
                        <span><a href="/Home/Gouwuche/huankuan_tixian">还款</a></span> 
                    </div>
                    <div class="my_wallet_list2_l">
                        <strong>信用透支(元)</strong><span class="erop_er">额度:<?php echo ($xyed); ?>.00</span>
                        <h2>-<?php echo ($yue); ?>.00</h2>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>


<!--<script>
$(function(){

var num=[350,400,300,700,250,500,190];
var num1=[30,45,30,50,60,40,62];
var week=['星期一','星期二','星期三','星期四','星期五','星期六','星期日'];
var canv=document.getElementById("can");
var ctx=canv.getContext("2d");
var col=["red","blue","green"]
var j=0,j1=0,j2=0,jiao=0;
var sun=0;
var xnum=1000/10;
var ynum=300/10;
for(var i=0; i<num.length;i++){
sun=sun+num[i];
//alert(sun)
}
for(var i=1; i<=10;i++){
	//ctx.lineWidth=0.5;
	ctx.beginPath();
	ctx.strokeStyle="#88c0f2";
	ctx.fillStyle="#188618";
	ctx.moveTo(50,i*35+50)
	ctx.lineTo(canv.width-60,i*35+50)
	//alert(i*35+50)
	ctx.stroke();
	ctx.fillText(1000-i*xnum,20,i*35+50);
	//ctx.fillText(100-i*ynum,canv.width-50,i*35+50);
	ctx.fill();
	}
for(var i=1; i<=10;i++){
	ctx.fillStyle="#e04b39";
	ctx.fillText(300-i*ynum,canv.width-50,i*35+50);
	ctx.fill();
	}
for(var i=1; i<=7;i++){
	//ctx.lineWidth=0.5;
	ctx.beginPath();
	ctx.strokeStyle="#88c0f2";
	ctx.moveTo(i*100,50)
	ctx.lineTo(i*100,canv.height-100)
	ctx.stroke();
	ctx.fillStyle="#000";
	ctx.fillText(week[i-1],i*100-10,canv.height-80);
	ctx.fill();
	}
for(var i=0; i<10;i++){
	ctx.beginPath();
	ctx.strokeStyle="#188618";
	ctx.fillStyle="#188618";
	if(i==0){
	ctx.moveTo(100,400-num[i]/100*35)	
		}
		else{
		ctx.moveTo(i*100,400-num[i-1]/100*35)		
			}
	ctx.lineTo(100+i*100,400-num[i]/100*35)
	ctx.fillText(num[i],100+i*100,400-num[i]/100*35);
	ctx.stroke();
	}
for(var i=0; i<10;i++){
	ctx.beginPath();
	ctx.strokeStyle="#e04b39";
	ctx.fillStyle="#e04b39";
	if(i==0){
	ctx.moveTo(100,400-num1[i]/30*35)	
		}
		else{
		ctx.moveTo(i*100,400-num1[i-1]/30*35)		
			}
	ctx.lineTo(100+i*100,400-num1[i]/30*35)
	ctx.fillText(num1[i],100+i*100,400-num1[i]/30*35);
	ctx.stroke();
	}

})
</script>-->


</body>
</html>