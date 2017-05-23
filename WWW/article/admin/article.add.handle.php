<?php
	require_once('../connect.php');
    //把传递数据入数据库,在入库之前对信息校验
	if (!(isset($_POST["title"]) && (!empty($_POST["title"])))) {
		echo "<script>alert('标题不为空');window.location.href='article.add.php'</script>";
	}
    //print_r($_POST);
	$title=$_POST['title'];
    $author=$_POST['author'];
    $description=$_POST['description'];
    $content=$_POST['content'];
	$dateline= time();
	$ijnm="insert into text4(title,author,description,content,dateline) values('$title','$author','$description','$content',$dateline)";
	//echo $ijnm;
	if(mysql_query($ijnm)){
		echo "<script>alert('发布文章成功');window.location.href='article.add.php'</script>";
	}else{
		echo "<script>alert('发布失败');window.location.href='article.add.php'</script>";
	}
?>