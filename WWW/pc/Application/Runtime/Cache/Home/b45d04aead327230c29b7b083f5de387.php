<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-手机维修</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>

</head>
<body>
<div class="header" >
    <span onClick="window.history.back()"></span>
    <h1>仓库</h1>
    
</div><!--头-->
    <div class="content" >
        <div class="content_con">
    
    
            <a href="/index.php/Home/Gouwuche/peijiandingdan">返回</a>
            
            <?php if(is_array($arr4)): foreach($arr4 as $key=>$k): ?><a href='javascript:void(0)'onclick='j()'><?php echo ($k["brand_name"]); ?></a><?php endforeach; endif; ?><br /> 
            
            <div id='le' class="fl" style="width:100px; background:red;">
                <a href='javascript:void(0)'onclick='quanbu(0)'>全部</a>
                <?php if(is_array($arr3)): foreach($arr3 as $key=>$k): ?><a href='javascript:void(0)'onclick='jixing(<?php echo ($k["model_id"]); ?>)'><?php echo ($k["model_name"]); ?></a><?php endforeach; endif; ?>
            </div>
            
            
            <div id='list1' class="fr" style="width:200px; background:#ccc;">
                <ul>
                <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li>
                        <?php echo ($kk["cpk_name"]); ?>
                        <ul>
                            <li>
                                <?php echo ($kk["cpp_price"]); ?>元 总数量(<?php echo ($numss); ?>)
                            </li>
                        <ul>
                    </li>
                    <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): echo ($ee["cangku_name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp; 数量(<?php echo ($ee["numss"]); ?>)&nbsp;&nbsp;&nbsp;<br /><?php endforeach; endif; ?><br /><br /><?php endforeach; endif; ?>
                </ul>
            </div>
        
        
        
    </div>
</div>
</body>
</html>
<script type="text/javascript">
	function jixing(model_id){
		var ajax=new XMLHttpRequest()
			ajax.open("get","/index.php/Home/Gouwuche/peijian/model_id/"+model_id,true)
			//alert(model_id);/* style='display:none'*/
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('list1').innerHTML=ajax.responseText
				}
			}
	}
function quanbu(model_id){
		var ajax=new XMLHttpRequest()
			ajax.open("get","/index.php/Home/Gouwuche/quan/model_id/"+model_id,true)
			//alert(model_id);/* style='display:none'*/
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('list1').innerHTML=ajax.responseText
				}
			}
	}


</script>