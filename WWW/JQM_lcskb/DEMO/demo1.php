<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="style/public.css">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<style type="text/css">
		/*#btn{position: fixed; right: 10px; top: 10px; background-color: red; cursor: pointer;}*/
		main{ border-bottom: 1px solid #ccc; padding: 10px 0; }
		#container{height: 0px; width: 100%;}
		
		.fuhe{
			position: fixed; left: 10px; bottom: 10px; background-color: red; cursor: pointer; z-index: 1000;
		}
	</style>
	<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=d2cc2979e70a846f16cbfa5605c8be7d&plugin=AMap.Geocoder"></script>
</head>
<body>

<div class="main">
	<div class="header" id="header">
		<h1>订单管理</h1>
		<div class="con-nav">
			<span class="oper" id="btn">导入</span>
			<span class="">设置</span>
		</div>
	</div>
	<div class="containers" id="containers">
		<div class="con-left" id="con-left">
			<div class="conleft-list active">
				需处理
			</div>
			<div class="conleft-list" id="fuhe">
				符合
			</div>
		</div>
		<div class="con-right" id="con-right">
			<ul>
				<li id="xuchuli" style="display:block"></li>
				<li id="fuhesd">
					<ul id="fuhrlopo" class="pubcvt">
						<li class="pubcvt_v active" data="a">等待下单</li>
						<li class="pubcvt_v " data="b">已下单未发货</li>
						<li class="pubcvt_v " data="c">已下单已发货</li>
					</ul>
					<div id="shugu"></div>
				</li>
			</ul>
		</div>
	</div>

</div>
<div class="attr-overlay" id="attr-overlay"></div>
<div class="attr-content" id="attr-content"></div>
<div id='container'></div>
<script type="text/javascript" src="script/main.js"></script>
<script type="text/javascript" src="script/gramajax.js"></script>
<!-- <div id='container'></div>
<div id="btn">转化</div>

	

<div class="fuhe" id="fuhe">符合</div> -->

<?php
@
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
@
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
die;

if($i<2){
  echo "对不起，数据表为空！ ";
}

?>


</body>
</html>
