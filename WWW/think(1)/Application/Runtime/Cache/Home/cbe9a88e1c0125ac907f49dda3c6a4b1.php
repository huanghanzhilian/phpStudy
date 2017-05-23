<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
	<link rel="stylesheet" type="text/css" href="/ceshi/DEMO/think/Public/style/public.css">
	<link rel="stylesheet" type="text/css" href="/ceshi/DEMO/think/Public/style/gaode-map.css">
	<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=d2cc2979e70a846f16cbfa5605c8be7d&plugin=AMap.Geocoder"></script>
</head>
<body class="flex-wrap flex-vertical">
	<div class="container flex-con" id="container"></div>
	<div class="footer flex-wrap flex-vertical">
		<div class="footer-con flex-con">
			<h1 class="footer-con-title">订单信息</h1>
			<ul class="footer-con-service" id="service">
				<li class="footer-service-list">
					  
					
					<?php echo ($arr["goods_name"]); ?> 
				

				</li>
				<li class="footer-service-list">
						<?php echo ($arr["address"]); ?> 
				</li>
				<li class="footer-service-list">
					客户姓名:  <?php echo ($arr["username"]); ?>  电话: <?php echo ($arr["phone"]); ?>
				</li>
			</ul>
		</div>
		<div class="footer-but">
			<strong class="footer-but-price">价格:<?php echo ($sku_money); ?></strong>
			<span class="footer-but-lder">安装成功后付款</span>
			<button class="footer-but-button" id="but-button" data="<?php echo ($rt); ?>" dingdan="<?php echo ($arr["order_number"]); ?> ">
				立即下单
			</button>
		</div>
	</div>
	<div class="widget-overlay" id="overlay"></div>
	<div class="widget-container" id="widget-container">
		<div class="widget-close" id="closed">
			关闭
		</div>
		<div class="widget-title">订单详情</div>
		<div class="widget-content">
			<ul>
				<li>
					<span>服务项目</span>
					<div class="comk">
						<?php echo ($arr["goods_name"]); ?> 
					</div>
				</li>
				<li>
					<span>服务地址</span>
					<div class="comk">
						<?php echo ($arr["address"]); ?> 
					</div>
				</li>
				<li>
					<span>客户姓名</span>
					<div class="comk">
						<?php echo ($arr["username"]); ?>
					</div>
				</li>
				<li>
					<span>客户电话</span>
					<div class="comk">
						<?php echo ($arr["phone"]); ?>
					</div>
				</li>
			</ul>
		</div>
		<div class="widget-buttons">订单价格:<span>¥65.00</span></div>
	</div>
	<div class="widget-container" id="dfghsa">
		<div class="widget-title">下单成功！</div>
		<div class="widget-content">
			维百士已收到您的订单，您签收包
裹后，工程师将为您上门安装。
		</div>
		<div class="widget-buttons" id="bonsdfg">知道了</div>
	</div>
	<script type="text/javascript" src="/ceshi/DEMO/think/Public/script/gaode-map.js"></script>
	<script type="text/javascript">
		if(but_button.getAttribute("data")=="1"){
			but_button.classList.add("huohu");
		}
		but_button.onclick = function() {
			var datahg = but_button.getAttribute("data");
			var order_number = but_button.getAttribute("dingdan");
			if (datahg == "1") {
				return;
			}
			but_button.setAttribute("disabled", true)
			but_button.classList.add("huohu");

			var request = new XMLHttpRequest();
			request.open("POST", "/ceshi/DEMO/think/Home/Index/khxd");
			var data = "order_number=" + order_number;
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			request.send(data);
			request.onreadystatechange = function() {
				if (request.readyState === 4) {
					if (request.status === 200) {
						if(request.responseText=="1"){
							but_button.setAttribute("data",1);
						}
					} else {
						alert("发生错误：" + request.status);
					}
				}
			}

			// open1();
			// resize();
		}
	</script>
</body>
</html>