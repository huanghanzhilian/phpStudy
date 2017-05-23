<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
<title>维百士-工程师入口</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
</head>
<body style=" background:#f1f1f1;">
<div class="header">
    <!--<span onclick="window.history.back()"></span>-->
    <h1>财务入口</h1>
</div><!--头-->
<div class="content">
    <div class="content_con">
        <form method="post" action="">
            <div class="dr_logo"></div>
            <div id='tt'>
                <div class="row row_dr">
                    <label class="bqf">账 号</label>
                    <div class="rootu">
                        <input placeholder="请输入您的账号" type="tel" name="username" id='username' autocomplete="off"/><span id='sp_username'></span>
                    </div>
                </div>
                <div class="row row_dr">
                    <label class="bqf">密 码</label>
                    <div class="rootu">
                        <input placeholder="请输密码"  type="password" name="pwd" id='pwd' autocomplete="off"/>
                    </div>
                </div>
            </div>	
        
        
        <button type="button" id="dengr" class="dengr dengr1"  onclick="chem()">登录</button>
 
        </form>
    

<!--<form method="post" action="">
	账号:<input type="text" name="username" id='username'><span id='sp_username'></span><br /><br />
	密码:<input type="text" name="pwd" id='pwd'><br /><br />
	<input type="button" value="登陆" onclick="chem()">
</form>-->
	
    
    </div>
</div>
</body>
</html>
<script type="text/javascript">
		function chem(){
		var username=document.getElementById('username').value
//alert(username);
		var pwn=document.getElementById('pwd').value
		var pwd=pwn.toString()
		
	console.log(pwn);
		var ajax = new XMLHttpRequest();  

		//ajax.open("get","/Admin/Caiwu/chem/username/"+username+"/pwd/"+pwd,true);
		ajax.open("GET","/Admin/Caiwu/chem?username="+username+"&pwd="+pwd)
		//uest.open("GET", "server.php?number=" + document.getElementById("keyword").value);
		ajax.send();
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4 && ajax.status==200){
				if(ajax.responseText==1){
					$("#pwd").val("");
					$("#pwd").focus().addClass("tips");
					$("#pwd").attr("placeholder", "您的密码有误请重新填写");
					//document.getElementById('sp_username').innerHTML="账号或密码错误"
					//document.getElementById('sp_username').style.color="red"
				}else if(ajax.responseText==2){
					$("#username").val("");
					$("#username").focus().addClass("tips");
					$("#username").attr("placeholder", "您的账号有误请重新填写");
					//document.getElementById('sp_username').innerHTML="111111账号或密码错误"
					//document.getElementById('sp_username').style.color="red"
				}else{
		
			location.href="/Admin/Caiwu/index";
				}
			}
		}

}


</script>