<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css">
		#f{float:left; }
		#l{float:right; margin-right:20px}
	</style>
</head>
<body>
<a href="/Admin/Shangpin/index">返回</a><br /><br />
	<div id='f'>
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): echo ($kk["questiontype_name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img id="iopmg" src="/Public/<?php echo ($kk["imgg"]); ?>" width=50 height=50 />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img id="iopmg" src="/Public/<?php echo ($kk["imggg"]); ?>" width=50 height=50 /><a href='javascript:void(0)'onclick='ass(<?php echo ($kk["questiontype_id"]); ?>)'>添加图片</a>&nbsp;&nbsp;&nbsp;修改<br /><br />
	<div id='first<?php echo ($kk["questiontype_id"]); ?>' >
	
	</div><?php endforeach; endif; ?>
	</div>
	
</body>
</html>
<script type="text/javascript">
function ass(id){
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Admin/Shangpin/tupian/questiontype_id/"+id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('first'+id).innerHTML=ajax.responseText
				}
			}
	}
</script>