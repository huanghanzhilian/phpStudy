<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理</title>
	<link rel="stylesheet" type="text/css" href="/think(1)/Public/style/public.css">
	<link rel="stylesheet" type="text/css" href="/think(1)/Public/style/admin_index.css">
	<script type="text/javascript" src="/think(1)/Public/script/admin_index.js"></script>
</head>
<body class="flex-wrap flex-vertical">
	<div class="header">
		<a href="index.html" class="logo" title="后台管理"></a>
        <ul class="head_text fr">
	        <li class="head_text_li">
	        	<img class="avatar" src="/think(1)/Public/image/head portrait.png">
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
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="80">序号</th>
                                <th width="300">货品名称</th>
                                <th width="165">颜色</th>
                                <th width="130">客户姓名</th>
                                <th width="165">客户电话</th>
                                <th width="165">订单编号</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>适用vivo x6/x7/plus/x5/pro/max换屏幕手机维修触摸外屏北京上门
									<div class="anniu">
										<span>匹配SKU</span>
										<span>匹配SKU</span>
										<span>匹配SKU</span>
									</div>
                                </td>
                                <td>【x5 max】屏碎/显示正常/带框</td>
                                <td align="center">张某某</td>
                                <td>136 9316 0580</td>
                                <td>1254896235784526
                                <div class="xianghu">
                                	<span class="fr">订单详情</span>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>适用vivo x6/x7/plus/x5/pro/max换屏幕手机维修触摸外屏北京上门
									<div class="anniu">
										<span>匹配SKU</span>
										<span>匹配SKU</span>
										<span>匹配SKU</span>
									</div>
                                </td>
                                <td>【x5 max】屏碎/显示正常/带框</td>
                                <td align="center">张某某</td>
                                <td>136 9316 0580</td>
                                <td>1254896235784526
                                <div class="xianghu">
                                	<span class="fr">订单详情</span>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>适用vivo x6/x7/plus/x5/pro/max换屏幕手机维修触摸外屏北京上门
									<div class="anniu">
										<span>匹配SKU</span>
										<span>匹配SKU</span>
										<span>匹配SKU</span>
									</div>
                                </td>
                                <td>【x5 max】屏碎/显示正常/带框</td>
                                <td align="center">张某某</td>
                                <td>136 9316 0580</td>
                                <td>1254896235784526
                                <div class="xianghu">
                                	<span class="fr">订单详情</span>
                                </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
		</div>
	</div>
</body>
</html>