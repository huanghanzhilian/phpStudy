<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理</title>
	<link rel="stylesheet" type="text/css" href="/DEMO/think/Public/style/public.css">
	<link rel="stylesheet" type="text/css" href="/DEMO/think/Public/style/admin_index.css">
	<script type="text/javascript" src="/DEMO/think/Public/script/admin_index.js"></script>
</head>
<body class="flex-wrap flex-vertical">
	<div class="header">
		<a href="index.html" class="logo" title="后台管理"></a>
        <ul class="head_text fr">
	        <li class="head_text_li">
	        	<img class="avatar" src="/DEMO/think/Public/image/head portrait.png">
	        	<span class="dropdown-toggle">超级管理员</span>
	        	<ul>
	        		<li></li>
	        		<li></li>
	        	</ul>
	        </li>
        </ul>
	</div>
	<!-- <div class="headers"></div> -->
	<div class="content flex-con flex-wrap">
		<div class="main-left">
			<div class="tabs tabs1" id="tabs">
				<ul class="nav">
					<h2><span></span>导入订单</h2>
					<li data_type="chuli" class="active"><a href="javascript:;">需处理</a></li>
					<li data_type="daixia"><a href="javascript:;">待下单</a></li>
					<li data_type="quanbhu"><a href="javascript:;">全部订单</a></li>
					<h2><span></span>订单管理 </h2>
					<li data_type="yixia"><a href="javascript:;">已下单</a></li>
					<li data_type="daijie"><a href="javascript:;">待接单</a></li>
					<li data_type="quanbu2"><a href="javascript:;">全部订单</a></li>
				</ul>
			</div>
		</div>
		<div class="main-center flex-con" id="main-center">
			<!--表格-->

		</div>
	</div>
    <div class="attr-overlay" id="attr-overlay"></div>
    <div class="attr-content" id="attr-content">
        <div class="widget-close" id="closed">
            关闭
        </div>
        <div id="widget-title" class="widget-title"></div>
        <div id="content_sd"></div>
    </div>
    <script type="text/javascript">

    </script>
</body>
</html>