<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<form method="post" action="">
	账号:<input type="text" name="username" id='username'><span id='sp_username'></span><br /><br />
	密码:<input type="text" name="pwd" id='pwd'><br /><br />
	<input type="button" value="登陆" onclick="chem()">
</form>
	
</body>
</html>
<script type="text/javascript">
		function chem(){
		var username=document.getElementById('username').value
//alert(username);
		var pwd=document.getElementById('pwd').value
	///	alert(pwd);
		var ajax = new XMLHttpRequest();  

		ajax.open("get","/ceshi/www/index.php/Home/Index/chem/username/"+username+"/pwd/"+pwd,true);
		ajax.send();
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4 && ajax.status==200){
				if(ajax.responseText==1){
					document.getElementById('sp_username').innerHTML="账号或密码错误"
					document.getElementById('sp_username').style.color="red"
				}else if(ajax.responseText==2){
						document.getElementById('sp_username').innerHTML="账号或密码错误"
					document.getElementById('sp_username').style.color="red"
				}else{
		
			location.href="/ceshi/www/index.php/Home/Index/shifu";
				}
			}
		}

}


</script>