<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>MiniCheckout</title>
    <link rel="stylesheet" type="text/css" href="/ceshi/yuzuo/Public/styles/pinus.css">
</head>
<body>
<header>
    <div class="h_content">
        <span></span>
    </div>
</header>
<section class="block">
    <div class="content2">
        <div class="app">
            <span class="iphone"><img src="/ceshi/yuzuo/Public/img/bgpic.jpg" width="100%" height="auto"></span>
            <label class="text_amount">
				<!-- <input id="amount" type="text" placeholder="id:<?php echo ($oredr); ?>"/> -->
                <input id="amount" type="text" placeholder="金 额<?php echo ($result['field_7964']); ?>"/>
				<!-- <input id="amount" type="text" placeholder="名称:<?php echo ($title); ?>"/> -->	
            </label>
            <div class="ch">
                <span class="up" onclick="wap_pay('upacp_wap')">银联 WAP</span>
                <span class="up" onclick="wap_pay('alipay_wap')">支付宝 WAP</span>
                <span class="up" onclick="wap_pay('bfb_wap')">百度钱包 WAP</span>
                <span class="up" onclick="wap_pay('jdpay_wap')">京东支付 WAP</span>
                <span class="up" onclick="wap_pay('yeepay_wap')">易宝支付 WAP</span>
                <span class="up" onclick="wap_pay('wx_pub')">微信浏览器内公众号支付 WAP</span>
            </div>
        </div>
    </div>
</section>
<script src="/ceshi/yuzuo/Public/js/pingpp.js" type="text/javascript"></script>
<script>
    function wap_pay(channel) {
        var amount = document.getElementById('amount').value * 100;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "YOUR-URL", true);
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.send(JSON.stringify({
            channel: channel,
            amount: amount
        }));

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
                pingpp.createPayment(xhr.responseText, function(result, err) {
                    console.log(result);
                    console.log(err.msg);
                    console.log(err.extra);
                });
            }
        }
    }
</script>
</body>
</html>