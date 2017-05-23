<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<style>
.thinner-border { height:300px;

	position: relative;

}

.thinner-border:before{

	content: '';

	position: absolute;

	width: 200%;

	height: 200%;

	border: 1px solid red;

	-webkit-transform-origin: 0 0;

	-moz-transform-origin: 0 0;

	-ms-transform-origin: 0 0;

	-o-transform-origin: 0 0;

	transform-origin: 0 0;

	-webkit-transform: scale(0.5, 0.5);

	-ms-transform: scale(0.5, 0.5);

	-o-transform: scale(0.5, 0.5);

	transform: scale(0.5, 0.5);

	-webkit-box-sizing: border-box;

	-moz-box-sizing: border-box;

	box-sizing: border-box;

}5
</style>
</head>

<body>
<div class="thinner-border">
1
</div>
<br><br>
<div style=" border:1px solid red;">
1
</div>
</body>
</html>