<?php
header("Content-Type:text/html; charset=utf-8");
$dsn="DRIVER=Microsoft Access Driver (*.mdb);DBQ=".realpath("ee.mdb");
$conn=odbc_connect($dsn,"","jjwangxing0523",SQL_CUR_USE_ODBC );
$pid=$_POST['pid'];
$query=odbc_do($conn,"select * from dingdan where p_id={$pid}");
$qw=iconv('gb2312','utf-8',odbc_result($query,1));
$qe=iconv('gb2312','utf-8',odbc_result($query,4));
$qr=iconv('gb2312','utf-8',odbc_result($query,9));
$link=mysql_connect('127.0.0.1','root','root');
mysql_select_db('user',$link);
$sql="insert into dingdan(qw,qe,qr)values('$qw','$qe','$qr')";
		//echo $sql;die;
		$re=mysql_query($sql);
		if($re){
		echo "1";
		}else{
		echo "2";
		}






?>