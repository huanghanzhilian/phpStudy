<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php 
	$fruit=array('apple'=>'a'=>1,'banana'=>"香蕉",'pineapple'=>"菠萝");  
    foreach($fruit as $k=>$v){  
        echo '水果的英文键名：'.$k.'，对应的值是：'.$v.'<br/>';  
    } 
?>
</body>
</html>