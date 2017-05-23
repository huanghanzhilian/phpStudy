<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-我的订单</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<meta name="format-detection" content="telephone=no" />
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
</head>
<body style="background:#eee;">
<div class="header">
    <span><a href="/Home/Index/index"></a></span>
    <h1>我的订单</h1>
    
</div><!--头-->
<div class="content">
    <div class="content_con">
        <a style="display:none;" href="/Home/Index/index/">返回首页</a><center style="display:none;"><?php echo ($my); ?></center>
	<!--<div class="dingdan">
        <ul class="clearfix">
             <li>
                <a href="/Home/Index/dingdan">订单</a>
             </li>
             <li>
                <a href="/Home/Index/membercentent">用户中心</a>
             </li>
        </ul>
    </div>-->
    
<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><a class="my_aduc" href="/Home/Index/zhuangtai/id/<?php echo ($kk["id"]); ?>.html"><!--<?php echo ($c); ?>-->
        <div class="jixing">
            <div class="jixing_title">
                <!--<span class="pb"></span>-->
                <!--机型：<?php echo ($kk["model_name"]); ?>-->
                订单编号：<?php echo ($kk["ddh"]); ?>
                <em>
			<?php if(strtoupper($kk['fk']) == 110): ?>已取消
                 <?php elseif((strtoupper($kk['stau']) == 0) or (strtoupper($kk['stau']) == 1)): ?>
                        等待接单 
                <?php elseif(strtoupper($kk['stau']) == 2): ?> 
                        等待维修
				<?php elseif(strtoupper($kk['stau']) == 3): ?> 
						 维修中
				<?php elseif(strtoupper($kk['stau']) == 4): ?> 
						等待付款
				<?php elseif(strtoupper($kk['stau']) == 5): ?> 
						已付款<?php endif; ?>             
                </em>
            </div>
            
            <div class="jixing_con">
                <ul>
                    <li>服务方式：<?php echo ($kk["ways_name"]); ?></li>
                    <li>创建时间：<?php echo ($kk["xo_time"]); ?></li>
                    <li>维修机型：<?php echo ($kk["model_name"]); ?></li>
                    <!--<li>手机号：<?php echo ($kk["u_phone"]); ?></li>
                    <li>问题：<?php echo ($kk["question_name"]); ?></li>
                    <li>解决方案：<?php echo ($kk["plan_name"]); ?></li>-->
                  
                </ul>
            </div>
            
            <div class="jixing_btn">
                 <div class="jixing_btn_nec">
                     <span class="ousc">预留按钮</span>
                <!--<h1>订单编号：<?php echo ($kk["ddh"]); ?><span><?php echo ($kk["xo_time"]); ?></span></h1>-->
                 </div>
            </div>
        </div>
    </a><?php endforeach; endif; ?>    
    </div>  	
</div>	



<div class="xq_gd">
    <ul class="clearfix">
        <li>
            <a href="/Home/Index/index">
                <span class="one_1"></span>
                <p>首页</p>
            </a>
        </li>
        <li>
            <a href="/Home/Index/dingdan">
                <span class="one_2 on"></span>
                <p class="on">订单</p>
            </a>
        </li>
        <li>
            <a href="/Home/Index/membercentent">
                <span class="one_3"></span>
                <p>个人中心</p>
            </a>
        </li>
    </ul>
</div><!--底部固定-->
</body>

<script type="text/javascript">
	/*function fukuan(fk){
			//alert(fk);
			var ajax=new XMLHttpRequest()
				ajax.open("get","/Home/Index/fuku/fk/"+fk,true)
				ajax.send()
				ajax.onreadystatechange=function(){
					if(ajax.readyState==4 && ajax.status==200){
						document.getElementById('e').innerHTML=ajax.responseText
					}
				}
	} */

</script>
</html>