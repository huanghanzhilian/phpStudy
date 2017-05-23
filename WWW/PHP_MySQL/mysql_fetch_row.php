<?php
//设置页面内容是html编码格式是utf-8
//header("Content-Type: text/plain;charset=utf-8"); 
header("Content-Type: text/html;charset=utf-8");
if ($con=mysql_connect('localhost','root','root')) { 
   // echo 'Mysql扩展已经安装';
    }else{
	//echo '失败';
	}
	
if (mysql_select_db('weibaishi')) { 
    //echo '选择数据库成功';
    }else{
	//echo '选择数据库失败';
	}
	
	mysql_query("set names 'utf8'");
//	if(mysql_query('insert into text3(f_name) values("黄鸡棚")')){
//	echo "成功插入";
//	}else{echo "插入失败";
//	}
    $query=mysql_query('select f_name,f_num from text3');
	while($row=mysql_fetch_row($query)){
	   //print_r($row);
	   echo $row[0].$row[1].'个'.'<br/>';
	   //echo '<br/>';
	}
?>
