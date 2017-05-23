<?php
require_once('config.php');
//连接，择库，设定字符集
if(!($conev = mysql_connect(HOST,USERNAME,PASSWORD))){
	echo mysql_error();
};
if(!mysql_select_db('weibaishi')){
	echo mysql_error();
};
if(!mysql_query("set names utf8")){
	echo mysql_error();
};
?>