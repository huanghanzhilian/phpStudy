<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>小旗子标注设置</title>
	<link rel="stylesheet" type="text/css" href="/ceshi/DEMO/think/Public/style/public.css">
	<link rel="stylesheet" type="text/css" href="/ceshi/DEMO/think/Public/style/style.css">
	<link rel="stylesheet" type="text/css" href="/ceshi/DEMO/think/Public/style/qizhi.css">
</head>
<body>
	<div class="main">
		<div class="header" id="header">
			<h1 class="qizi-title">小旗子标注设置
			<a class="pull-right" href="javascript:;">退出登录</a>
			</h1>
			<div class="con-nav"></div>
		</div>
		<div class="containers conta-qz" id="containers">
			<div class="qizi-log-con">
				<div class="qizhi-bsar clearfix" id="qizhi-bsar">
					<div class="row flex-wrap" >
						<label class="bdhu">下单</label>
						<ul class="rootu flex-wrap flex-con" id="xd">
							<li class="flex-con hong" data="1">
								<span></span>
							</li>
							<li class="flex-con huang" data="2">
								<span></span>
							</li>
							<li class="flex-con lu" data="3">
								<span></span>
							</li>
							<li class="flex-con lan" data="4">
								<span></span>
							</li>
							<li class="flex-con zhi" data="5">
								<span></span>
							</li>
						</ul>
					</div>
					<div class="row flex-wrap" >
						<label class="bdhu">刷单</label>
						<ul class="rootu flex-wrap flex-con" id="sd">
							<li class="flex-con hong" data="1">
								<span></span>
							</li>
							<li class="flex-con huang" data="2">
								<span></span>
							</li>
							<li class="flex-con lu" data="3">
								<span></span>
							</li>
							<li class="flex-con lan" data="4">
								<span></span>
							</li>
							<li class="flex-con zhi" data="5">
								<span></span>
							</li>
						</ul>
					</div>
				</div>
				<button class="qizi-login shyuji">确定</button>
			</div>
			<div class="qizi-log-con" style="display: none;">
				<div class="qizhi-bsar clearfix">
					<div class="row flex-wrap" >
						<label class="bdhu">刷单</label>
						<ul class="rootu rootu2 flex-wrap flex-con">
							<li class="flex-con on hong">

							</li>
							<li class="flex-con hong">

							</li>
							<li class="flex-con hong">

							</li>
							<li class="flex-con hong">

							</li>
							<li class="flex-con hong">

							</li>
						</ul>
					</div>
				</div>
				<button class="qizi-login shyuji">确定</button>
			</div>
		</div>

	</div>
	<script type="text/javascript" src="/ceshi/DEMO/think/Public/script/qizhi.js"></script>
</body>
</html>