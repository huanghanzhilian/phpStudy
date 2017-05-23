<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-工程师-卖出</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<style>
.row_cr li label.tell_c_r{  width:78px;}
.row_cr li span.nuyyhto{ margin-left: 78px;}
.row_cr li span.nuyyhto{ color:#4c4c4c;}
</style>
</head>
<body>
<div class="header">
    <span onclick="window.history.back()"></span>
    <h1>请填写买方信息</h1>
</div><!--头-->

	<!--<form method="post" action="/Home/Gouwuche/maichuadd">
		配件:<?php echo ($cpk_name); ?><br /><br />
		电话:<input type="text" name="tell"><br /><br />
		价格:<input type="text" name="amount"><br /><br />
		<input type="hidden" name="user_name" value='<?php echo ($user_name); ?>'>
		<input type="hidden" name="cangku_id" value='<?php echo ($cangku_id); ?>'>
		<input type="hidden" name="cpk_id" value='<?php echo ($cpk_id); ?>'>
		<input type="hidden" name="user_id" value='<?php echo ($user_id); ?>'>
		<input type="submit" value='卖出'>
	</form>-->
    
<div class="content">
    <div class="content_con">
        <form method="post" action="/Home/Gouwuche/maichuadd" onSubmit="return Checkedr()">
            <div class="row_cr">
                <ul>
                    <li>
                        <label class="tell_c_r">配件名称：</label>
                        <span class="nuyyhto nuyyhto2"><?php echo ($cpk_name); ?></span>
                    </li>
                    <li>
                        <label class="tell_c_r">配件编号：</label>
                        <span class="nuyyhto nuyyhto2"><?php echo ($cangku_name); ?></span>
                    </li>
                    <li>
                        <label class="tell_c_r">配件价格：</label>
                        <span class="nuyyhto nuyyhto2"><?php echo ($cpk_price); ?></span>
                    </li>
                    <li>
                        <label class="tell_c_r" for="tell_c">买方电话：</label>
                        <span class="nuyyhto"><input id="tell_c" name="tell" placeholder="请填写买方手机号" type="text" autocomplete="off"/></span>
                    </li>
                    <li>
                        <label class="tell_c_r" for="amount_c">卖出价格：</label>
                        <span class="nuyyhto"><input id="amount_c" name="amount" placeholder="请填写您要买出的价格" type="tel" autocomplete="off"/></span>
						<input type="hidden" name="user_name" value='<?php echo ($user_name); ?>'>
						<input type="hidden" name="cangku_id" value='<?php echo ($cangku_id); ?>'>
						<input type="hidden" name="cpk_id" value='<?php echo ($cpk_id); ?>'>
						<input type="hidden" name="user_id" value='<?php echo ($user_id); ?>'>
						<input type="hidden" name="cangku_name" value='<?php echo ($cangku_name); ?>'>
                    </li>
                </ul>
                <button class="submit_sd" type="submit">确认卖出</button>
            </div>
	</form>
        </form>
    </div>
</div>
</body>
</html>