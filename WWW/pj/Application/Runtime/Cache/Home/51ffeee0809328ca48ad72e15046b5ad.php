<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-填写发票信息</title>
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
    html{font-size: 129.375px; }
}
form{ font-size:0.14rem;}
form span{ line-height:0.3rem; display:block;}
.neupom{ padding:10px 20px;}
.biao_top{}
.biao_top>label{ display:block; color:#808080; line-height:0.3rem; font-size:0.14rem;}
.biao_top>input{ display:block;  width:100%; height:0.35rem; line-height:0.35rem; border:1px solid #e5e5e5; padding:0 0.08rem; font-size:0.14rem;
box-sizing:border-box;
-moz-box-sizing:border-box; /* Firefox */
-webkit-box-sizing:border-box; /* Safari */
}

/*客户后加*/
.jinger_poi{ padding:20px 0px; color:#808080;}
.jinger_poi span{ color:#4c4c4c; display:inline-block}
.jinger_beiz{ color:#808080; font-size:0.13rem; line-height:0.2rem;}
/*客户后加*/
</style>
</head>
<body>
<div class="header header1">
   
    <span onclick="window.history.back()"></span>
    <h1>填写发票信息<!--<?php echo ($my); ?>--></h1>
    
</div><!--头-->


<div class="content">
    <div class="content_con" style=" padding-bottom:0px;">
        <div class="neupom">


            <form method="post" action="/Home/Index/fapiaoadd"  onSubmit="return Checked()">
                <div class="biao_top">
                    <label>发票抬头：</label>
                    <input type="text" name="fptt" id='fptt'  autocomplete="off">
                </div>
                <span id='pwd_f'></span>
                
                <div class="biao_top">
                    <label>收件人：</label>
                    <input type="text" name="username"  id='username' autocomplete="off">
                </div>
                <span id="pass_f"></span>
                
                <div class="biao_top">
                    <label>发票邮寄地址：</label>
                    <input type="text" name="dizhi"  id='dizhi' autocomplete="off">
                </div>
                <span id="passw_f"></span>
                
                <div class="jinger_poi">
                    发票金额： <span><?php echo ($amount); ?></span>
					<input type="hidden" name="id" value='<?php echo ($id); ?>'>
					<input type="hidden" name="u_phone" value='$u_phone'>
                </div>
                <div class="jinger_beiz">
                    说明：发票会在2-3个工作日内以邮寄的形式寄出，内容只能开具"维修费"，以实际付款金额开具，优惠券及其它抵用卷不含在开具金额内，如有其它问题请咨询客服。
                </div>
                <input class="dengr dengr1 " type="submit" value='提 交'>
            </form>
        </div>
    </div>
</div>
<script>
var checkSubmitFlg = false;
function Checked(){
	var tutle_n=$("#fptt").val();
	if(tutle_n =='' || tutle_n == null){
		$("#fptt").focus().addClass("tips");
		$("#fptt").attr("placeholder", "请输入您的发票抬头");
		return false;
	}
	var tutle_n=$("#username").val();
	if(tutle_n =='' || tutle_n == null){
		$("#username").focus().addClass("tips");
		$("#username").attr("placeholder", "请输入您的姓名");
		return false;
	}
	
	var tutle_n=$("#dizhi").val();
	if(tutle_n =='' || tutle_n == null){
		$("#dizhi").focus().addClass("tips");
		$("#dizhi").attr("placeholder", "请输入您的发票邮寄地址");
		return false;
	}
	
   if (!checkSubmitFlg) {
	   checkSubmitFlg = true;
	   return true;
   }else{
	   alert("抱歉不能反复提交");
	   return false;
   }
			
	
	//return true;
	//return false;
}
		
</script>
</body>
</html>