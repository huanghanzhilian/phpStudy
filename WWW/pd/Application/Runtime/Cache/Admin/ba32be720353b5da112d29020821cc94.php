<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	
                    <a href="javascript:void(0)" onclick='tui_a(0)'>退货中</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="javascript:void(0)" onclick='tui_a(1)'>已退货</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="javascript:void(0)" onclick='tui_a(2)'>退货失败</a><br /><br /> <br />
<div id='ff'>
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?>订单号:<?php echo ($kk["ddh"]); ?><br /> <br />
			退货人: <?php echo ($kk["tuihuouser"]); ?><br /> <br />
			退货编号:<?php echo ($kk["cangku_name"]); ?><br /> <br />
			退货产品:<?php echo ($kk["cpk_name"]); ?><br /> <br />
			退货价格:<?php echo ($kk["cpk_price"]); ?><br /> <br />
	
<?php if(strtoupper($kk['zt']) == 0): ?><a href="/Admin/Guanlishifu/tuihuotg/tuihuo_id/<?php echo ($kk["tuihuo_id"]); ?>"><?php echo ($tg); ?></a><br /><br />
<a href="/Admin/Guanlishifu/tuihuobtg/tuihuo_id/<?php echo ($kk["tuihuo_id"]); ?>"><?php echo ($btg); ?></a><?php elseif(strtoupper($kk['zt']) == 1): ?> 		
				
				<?php echo ($ywc); ?>
<?php elseif(strtoupper($kk['zt']) == 2): ?> 
			<?php echo ($sb); ?>
            <?php else: endif; ?><br /> <br /><br /> <br /><?php endforeach; endif; ?>
</div>
</body>
</html>
<script type="text/javascript">
function tui_a(zt){
	//alert(ways_id);
	var ajax=new XMLHttpRequest()
		ajax.open("get","/Admin/Guanlishifu/tuihuoajax/zt/"+zt,true)
		ajax.send()
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4 && ajax.status==200){
				document.getElementById('ff').innerHTML=ajax.responseText
			}
		}
}


</script>