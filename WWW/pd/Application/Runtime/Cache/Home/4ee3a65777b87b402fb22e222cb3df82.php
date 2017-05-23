<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>维百士-工程师-我的</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/index.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<style>

</style>




</head>

<body  style="background:#f5f5f5">
<div class="shiff_banner shiff_bannerc">
    <div class="shiff_banner_top">
	<a id="weixian_renz" class="weixian_renz" href="/Home/index/wxlogin"><img id="iopmg" src="<?php echo ($avatar); ?>" width=50 height=50 /></a>
      
    </div> 
	
    <h1 class="shji_name shji_namec"><?php echo ($user_username); ?></h1>
    <div class="fpnm_zhua fpnm_zhuac">
        <?php echo ($username); ?>
    </div>
</div>

<div class="content">
    <div class="content_con content_con_c">
        <ul class="pubcvt mubbuut">
            <li class="pubcvt_v">
                <a href="#">
                    <span class="img_lodf img_lodf1"></span>
                    <p>个人资料</p>
                </a>
            </li>
            <li class="pubcvt_v">
                <a href="#">
                    <span class="img_lodf img_lodf2"></span>
                    <p>个人技能</p>
                </a>
            </li>
            <li class="pubcvt_v">
                <a href="/Home/Shifu/xiugaimima">
                    <span class="img_lodf img_lodf3"></span>
                    <p>修改密码</p>
                </a>
            </li>
        </ul>
        <ul class="pubcvt mubbuut">
            <li class="pubcvt_v">
                <a href="#">
                    <span class="img_lodf img_lodf4"></span>
                    <p>我的用户</p>
                </a>
            </li>
            <li class="pubcvt_v">
                    <?php echo ($lianjie); ?>
                    <span class="img_lodf img_lodf5"></span>
                    <p><?php echo ($yaoqing); ?></p>
                </a>
                    
                    <!--<p>邀请有礼</p>-->
                </a>
            </li>
			
            <li class="pubcvt_v">
                <a href="#">
                    <span class="img_lodf img_lodf6"></span>
                    <p>地址管理</p>
                </a>
            </li>
        </ul>
        <ul class="pubcvt mubbuut">
            <li class="pubcvt_v">
                <a href="/Home/Shifu/tuichua">
                    <span class="img_lodf img_lodf7"></span>
                    <p>退出登录</p>
                </a>
            </li>
            <li class="pubcvt_v">
                
            </li>
            <li class="pubcvt_v">
                
            </li>
        </ul>
        
    </div>
</div>




<!--底部-->
<div class="footer footer1">
    <div class="bot">
      <ul class=" pubcvt">
          
          <li class="pubcvt_v">
              <a href="/Home/Shifu/index" >
                  <span class="sh_icon2"></span>
                  <p>首页</p>
              </a>
          </li>
          <li class="pubcvt_v">
              <a href="/Home/Shifu/shifu" >
                  <span class="sh_icon3"></span>
                  <p>订单</p>
              </a>
          </li>
          <li class="pubcvt_v">
              <a href="/Home/Shifu/daiwancheng" >
                  <span class="sh_icon5"></span>
                  <p>服务</p>
              </a>
          </li>
          <li class="pubcvt_v">
              <a class="on" href="/Home/Shifu/my_wode" >
                  <span class="sh_icon4"></span>
                  <p>我的</p>
              </a>
          </li>
         
      </ul>
    </div>
</div>
<!--底部-->

<script>
$(function(){
	var iopmg=$("#iopmg").attr('src')
	if(iopmg==''){
		$("#iopmg").attr('src','../../../../Public/img/shifu_duan/mubercta_3_ll_03.png')
		$("#weixian_renz").append('<div class="ssyuipo">微信认证</div>')
	}
	//console.log(iopmg)
})
</script>
</body>
</html>