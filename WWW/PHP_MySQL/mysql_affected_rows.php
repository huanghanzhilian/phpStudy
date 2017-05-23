<?php
//设置页面内容是html编码格式是utf-8
//header("Content-Type: text/plain;charset=utf-8"); 
header("Content-Type: text/html;charset=utf-8");
//连接，择库，设定字符集
$cone = mysql_connect('localhost','root','root');
mysql_select_db('weibaishi');
mysql_query("set names 'utf8'");

//mysql的增删改
//通过mysql_query向mysql数据库传递insert update delete 语句
/*if(mysql_query('update text3 set f_num=5 where id=4')){
	echo '修改成功';
	echo mysql_affected_rows($cone);//连接标识符，当修改的数据和之前一样影响条数为0；
}else{
	echo '修改失败';
}*/
if(mysql_query('insert into text3(f_name,f_num,f_price) values(\'离开\',9,5);')){
	echo '插入成功';
	echo mysql_affected_rows($cone);//连接标识符，当修改的数据和之前一样影响条数为0；
}else{
	echo '插入失败';
}
	
?>
