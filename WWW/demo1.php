<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		#btn{position: fixed; right: 10px; top: 10px; background-color: red; cursor: pointer;}
	</style>
</head>
<body>
<div id="btn">转化</div>
<script type="text/javascript">
	window.onload = function() {
		var btn=document.getElementById("btn");
		var a = document.getElementsByTagName("a");
		btn.onclick=function(){
			cunhup();
		}
		function cunhup(){
			var a = document.getElementsByTagName("a");
			for (var i = 0; i < a.length; i++) {
				// a[i].onclick = function(e) {
				// 	e.preventDefault();
				// 	ajaxs(this.getAttribute("data"))
				// }
				ajaxs(a[i].getAttribute("data"))
				//console.log(a[i])
			}
		}
		function ajaxs(pia) {
			var request = new XMLHttpRequest();
			request.open("POST", "demo2.php");
			var data = "pid="+pia;
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			request.send(data);
			request.onreadystatechange = function() {
				if (request.readyState === 4) {
					if (request.status === 200) {
						console.log(request.responseText)//document.getElementById("createResult").innerHTML = request.responseText;
					} else {
						alert("发生错误：" + request.status);
					}
				}
			}
		}
	}
</script>
<?php
header("Content-Type:text/html; charset=utf-8");
$dsn="DRIVER=Microsoft Access Driver (*.mdb);DBQ=".realpath("ee.mdb");
$conn=odbc_connect($dsn,"
","
jjwangxing0523",SQL_CUR_USE_ODBC );
$query=odbc_do($conn,"select * from dingdan");
$i=1;
//odbc_fetch_array($query);
while(odbc_fetch_row($query)){
//转码（防止乱码）

echo $r=iconv('gb2312','utf-8',odbc_result($query,25));
echo "<br/>";
echo "<a href='javascript:;' data={$r}>转化</a>";
//echo $r=iconv('gb2312','utf-8',odbc_field_name($query,4));
//echo $r=iconv('gb2312','utf-8',);
echo "<br/>";
echo $t=iconv('gb2312','utf-8',odbc_result($query,4));
 echo "<br/>"; echo "编号:".iconv('gb2312','utf-8',odbc_result($query,8));
echo "<br/>";
echo $y=iconv('gb2312','utf-8',odbc_result($query,9));
 echo "<br/>";
 echo "<hr/>";
$i++;
}
die;

if($i<2){
  echo "对不起，数据表为空！ ";
}

?>


</body>
</html>
