<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>维百士-工程师-还款</title>
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


</style>
</head>

<body>


    <div class="toamu_xho" style="display:none;">
        
    </div>



<div class="header">
      <a href="/Home/Gouwuche/my_wallet"><span></span></a>
    <h1>还款</h1>
</div><!--头-->
<div class="content">
    <div class="content_con">
        <div class="buttcmk buttcmk1">
            <h2 class="fhuop_name"><?php echo ($user_username); ?></h2>
            <strong class="fhuop_yeu">信用透支(元)</strong>
            <h1 class="fhuop_jucan">-<?php echo ($yixiaofei); ?></h1>
        </div>
        <div class="buttcmk_com">
            <form class="fankuan_ll" method="post" action="/Home/Gouwuche/quhuankuan" onSubmit="return Checkedr()">
                <ul class="hcoompe hcoompe1">
                    <li>
                        <div class="omkkcti">还款金额(元)</div>
                        <div class="omkkcti">
                            <div class="omkkcti_inp_box">
                                <input class="money" id="money" name="money" placeholder="请输入还款金额" type="tel" autocomplete="off"/>
								<input type="hidden" name="yixiaofei" value='<?php echo ($yixiaofei); ?>'>
                            </div>
                        </div>
                        
                    </li>
                </ul>
                <button  class="submit_sd submit_sd_tx" type="submit">提交申请</button>
            </form>
        </div>
    </div>
</div>
<script>
function Checkedr(){
	var reg = /^[0-9]*$/
	var qxzdz=$("#money").val();
	if(qxzdz =='' || qxzdz == null || !reg.test(qxzdz)){
		$("#money").val('')
		$("#money").focus().addClass("tips");
		$("#money").attr("placeholder", "请输入金额");
		return false;
	}
	return true;
}
</script>
</body>
</html>