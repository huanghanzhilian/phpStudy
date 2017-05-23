<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-工程师-修改密码</title>
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

</style>
</head>
<body>
<div class="header header1">
   
    <span onclick="window.history.back()"></span>
    <h1>修改密码<!--<?php echo ($my); ?>--></h1>
    
</div><!--头-->


<div class="content">
    <div class="content_con" style=" padding-bottom:0px;">
        <div class="neupom">


            <form method="post" action="/Home/Shifu/savepaswd"  onsubmit='return check_all();'>
                <div class="biao_top">
                    <label>旧密码：</label>
                    <input type="text" name="pwd" onkeyup="check_pwd();" id='pwd' autocomplete="off">
                </div>
                <span id='pwd_f'></span>
                
                <div class="biao_top">
                    <label>新密码：</label>
                    <input type="text" name="pass" onkeyup="check_pass();" id='pass' autocomplete="off">
                </div>
                <span id="pass_f"></span>
                
                <div class="biao_top">
                    <label>确认新密码：</label>
                    <input type="text" name="passw" onkeyup="check_passw();" id='passw' autocomplete="off">
                </div>
                <span id="passw_f"></span>
                <input class="dengr dengr1 " type="submit" value='确认修改'>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
function check_all(){	
			if(check_pass() && check_passw()){
				
					return true;
			}else{
					return false;
			}
	}
function check_pass(){
	var pass=document.getElementById('pass').value;
	//alert(psd);
	var psd_reg=/^.{6,15}$/i;
	if(psd_reg.test(pass)){
		document.getElementById('pass_f').innerHTML="ok";
		return true;
	}else{
		document.getElementById('pass_f').innerHTML="6-15位";
		document.getElementById('pass_f').style.color="red"
		return false;
	}
}
//验证确认新密码
function check_passw(){
	var passw=document.getElementById('passw').value;
	var pass=document.getElementById('pass').value;
	if(passw===pass){
		document.getElementById('passw_f').innerHTML="ok";
		return true;
	}else{
		document.getElementById('passw_f').innerHTML="和密码保持一致";
		document.getElementById('passw_f').style.color="red"
		return false;
	}
}


</script>