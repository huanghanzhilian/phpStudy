<?php
//设置页面内容是html编码格式是utf-8
header("Content-Type: text/plain;charset=utf-8"); 
if ($con=mysql_connect('localhost','root','root')) { 
    echo 'Mysql扩展已经安装';
    }else{
	echo '失败';
	}
	
if (mysql_select_db('weibaishi')) { 
    echo '选择数据库成功';
    }else{
	echo '选择数据库失败';
	}
?>