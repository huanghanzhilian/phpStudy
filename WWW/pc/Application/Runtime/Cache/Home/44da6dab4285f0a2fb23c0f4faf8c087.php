<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-手机维修</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
</head>
<body>
<div class="header">
    <span onclick="window.history.back()"></span>
    <h1>个人中心</h1>
    
</div><!--头-->
<div class="content">
    <div class="content_con">
        <div class="grdzx">
            <ul>
                <li>
                    <a href="#">
                    <span></span>
                    账号:<?php echo ($username); ?>
                    </a>
                </li>
                <li>
                    <a href="/Home/Index/dingdan">
                        <span class="me_2"></span>
                        订单详情
                    </a>
                </li>
                <li>
                <a href="/Home/Index/index">
                    <span  class="me_3"></span>
                    维修下单
                </a>
                </li>
                <li>
                <a href="/Home/Index/youhuiquan">
                    <span class="me_4"></span>
                    优惠券
                </a>
                </li>
            </ul>
        </div>
       <!-- <a href="/Home/Index/index">维修下单</a>
        <center><?php echo ($my); ?></center>
        <a href="/Home/Index/dingdan">订单详情</a>
        <a href="/Home/Index/youhuiquan">优惠券</a>-->
    </div>
</div>
<div class="footer_4">
      <div class="tuichudr">
		<a href="/Home/Index/tuichu">退出登录</a>
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
                <span class="one_2 "></span>
                <p>订单</p>
            </a>
        </li>
        <li>
            <a href="/Home/Index/membercentent">
                <span class="one_3 on"></span>
                <p class="on">个人中心</p>
            </a>
        </li>
    </ul>
</div><!--底部固定-->
</body>
</html>