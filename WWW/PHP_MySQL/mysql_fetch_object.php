<?php
//设置页面内容是html编码格式是utf-8
//header("Content-Type: text/plain;charset=utf-8"); 
header("Content-Type: text/html;charset=utf-8");
//连接，择库，设定字符集
mysql_connect('localhost','root','root');
mysql_select_db('weibaishi');
mysql_query("set names 'utf8'");

//发指令，取数据
$query=mysql_query('select * from text3');
//$row=mysql_fetch_object($query);
   //print_r($row);
   //echo $row -> f_name;
   //echo $row['f_num'];
   while($row=mysql_fetch_object($query)){
	   echo $row -> f_name.'<br/>';
   }
	
?>
