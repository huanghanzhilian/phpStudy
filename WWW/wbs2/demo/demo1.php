<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		#btn{position: fixed; right: 10px; top: 10px; background-color: red; cursor: pointer;}
		main{ border-bottom: 1px solid #ccc; padding: 10px 0; }
	</style>
</head>
<body>
<div id="btn">转化</div>
<center><a href=""></a></center>
<script type="text/javascript">
	window.onload = function() {
		var btn=document.getElementById("btn");
		var a = document.getElementsByTagName("a");
		// btn.onclick=function(){
		// 	cunhup();
		// }
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
		cunhup();
		function ajaxs(pia) {
			var request = new XMLHttpRequest();
			request.open("POST", "demo2.php");
			//var data = "pid="+pia;
			var data = "name=" + "洪七"
	                  + "&number=" + "105"
	                  + "&sex=" + "男"
	                  + "&job=" + "dddd";
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			request.send(data);
			request.onreadystatechange = function() {
				if (request.readyState === 4) {
					if (request.status === 200) {
						//var jsonObj = eval("("+request.responseText+")");
						console.log(request.responseText)//document.getElementById("createResult").innerHTML = request.responseText;
						//console.log(pia)
						// if(pia){
						// 	//console.log(getdata(pia))
						// 	//移除
						// 	var el=getdata(pia)[0].parentNode;
						// 	el.parentNode.removeChild(el);
						// }
					} else {
						alert("发生错误：" + request.status);
					}
				}
			}
		}
	}
	function getdata(data) {
		var aEle = document.getElementsByTagName('*');
		var aResult = [];
		var len = aEle.length;
		for (var i = 0; i < len; i++) {
			if (aEle[i].getAttribute("data") ===data) {
				aResult.push(aEle[i]);
			}
		}
		return aResult;
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

$r=iconv('gb2312','utf-8',odbc_result($query,25));

//echo "<a href='javascript:;' data={$r}>转化</a>";
//echo $r=iconv('gb2312','utf-8',odbc_field_name($query,4));
//echo $r=iconv('gb2312','utf-8',);

$t=iconv('gb2312','utf-8',odbc_result($query,4));

$c=iconv('gb2312','utf-8',odbc_result($query,8));

$y=iconv('gb2312','utf-8',odbc_result($query,9));

  echo "<main>
  <a href='javascript:;' data={$r}>转化</a>
  <div>{$t}</div>
  <div>{$y}</div>
  <div>{$c}</div>
  </main>";
$i++;
}




// $link=mysql_connect('127.0.0.1','root','root');
// mysql_select_db('user',$link);
// $arr="select count(*) from dingdan where zt='1'";
// $t=mysql_query($arr);
// $row = mysql_fetch_array($t);
// echo $int=$row[0];
// $arr1="select count(*) from dingdan where zt='1'";
// $tt=mysql_query($arr1);
// $row = mysql_fetch_array($tt);
// echo $intt=$row[0];
// $li="select*from dingdan where zt='1' or zt='3'";
// $art=mysql_query($li);

// while($arr2=mysql_fetch_assoc($art)){

// 		echo $arr2['p_id']."</br>";
// 		echo $arr2['username']."</br>";
// 		echo $arr2['phone']."</br>";
//         echo $arr2['address']."</br>";
		

// };
?>
 

</body>
</html>
