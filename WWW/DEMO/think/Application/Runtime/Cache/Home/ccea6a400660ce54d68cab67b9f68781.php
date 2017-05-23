<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>旗子-登入</title>
	<link rel="stylesheet" type="text/css" href="/DEMO/think/Public/style/public.css">
	<link rel="stylesheet" type="text/css" href="/DEMO/think/Public/style/style.css">
	<link rel="stylesheet" type="text/css" href="/DEMO/think/Public/style/qizhi.css">
</head>
<body>
	<div class="main">
		<div class="header" id="header">
			<h1 class="qizi-title">小旗子标注设置-登入</h1>
			<div class="con-nav"></div>
		</div>
		<div class="containers conta-qz" id="containers">
			<div class="qizi-log-con">
				<input class="qizi-shuru" id="username" type="text" name="" placeholder="店铺名称">
				<button class="qizi-login" onclick="chem()">登录</button>
			</div>
		</div>

	</div>
	<!-- <script type="text/javascript" src="/DEMO/think/Public/script/qizhi.js"></script> -->
	<script>
		var containers=document.getElementById("containers");
		var header=document.getElementById("header").offsetHeight*2;
		var heru=document.documentElement.clientHeight;
		containers.style.height=(heru-header)+"px";
		function chem() {
			var username = document.getElementById('username').value;
			var ajax = new XMLHttpRequest();
			//ajax.open("get","/Home/Shifu/chem/username/"+username+"/pwd/"+pwd);
			ajax.open("get","/DEMO/think/Home/Index/chem?username="+username)
			ajax.send();

			// ajax.open("POST", "/DEMO/think/Home/Index/chem/");
			// var data = "username="+username;
			//ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			// ajax.send(data);


			ajax.onreadystatechange = function() {
				if (ajax.readyState == 4 && ajax.status == 200) {
					if (ajax.responseText == 1) {
						console.log(ajax.responseText)
						location.href = "/DEMO/think/Home/Index/qz";
					} else if (ajax.responseText == 2) {
						console.log(ajax.responseText)
						alert("账号不存在")
					}
				}
			}

		}
	</script>
</body>
</html>