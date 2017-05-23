<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js" type="text/javascript"></script>
</head>
<body>
<a href="/Admin/Shangpin/model/brand_id/<?php echo ($brand_id); ?>">返回</a><br /><br />
<div id='p'>

	<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><div id="<?php echo ($kk["model_id"]); ?>">
    <?php echo ($kk["model_name"]); ?>
        <a href='javascript:void(0)'onclick='as1(<?php echo ($kk["model_id"]); ?>,this)'>上</a>
        <a href='javascript:void(0)'onclick='as2(<?php echo ($kk["model_id"]); ?>,this)'>下</a>
    </div><?php endforeach; endif; ?>
	<input type="hidden" name="brand_id" id='brand_id' value='<?php echo ($brand_id); ?>'>
</div>
</body>
</html>
<script type="text/javascript">
eibur()
	function as1(id,thise){
		
		var shang_id=$(thise).parent().prev();
       var modelid=shang_id.attr('id');
	   var brandid=document.getElementById('brand_id').value;
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Admin/Shangpin/pai/model_id/"+id+"/modelid/"+modelid+"/brand_id/"+brandid,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('p').innerHTML=ajax.responseText
					eibur()
				}
			}

	}

	function as2(id,thise){
		
	   var shang_id=$(thise).parent().next();
       var modelid=shang_id.attr('id');
		var brandid=document.getElementById('brand_id').value;
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Admin/Shangpin/pai/model_id/"+id+"/modelid/"+modelid+"/brand_id/"+brandid,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('p').innerHTML=ajax.responseText
					eibur()
				}
			}

	}
	
    function eibur(){
		var pp=document.getElementById("p").getElementsByTagName("div");
		var pp1=pp[0].getElementsByTagName("a")[0];
		var lcus=pp.length-1;
		var pp2=pp[lcus].getElementsByTagName("a")[1];
		
		pp1.style.display="none";
		pp2.style.display="none";
		console.log(lcus)
		
	}

</script>