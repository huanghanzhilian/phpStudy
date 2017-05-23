<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
<title>维百士-工程师-修后检测</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>

</head>
<body  style=" background:#f0f0f0;">
<div class="header">
    <span><a href="/Home/Shifu/daiwancheng"></a></span>
    <h1>修后检测</h1>
</div><!--头-->
<div class="content">
    <div class="content_con">

<!--	修完检测：	
<form method="post" action="/Home/Shifu/tjj">
	<div id='t'>
	<?php if(is_array($arr2)): foreach($arr2 as $key=>$kk): echo ($kk["jc_name"]); ?>:&nbsp;&nbsp;<?php echo ($kk["jc_content"]); ?><input type="checkbox" name="jc_id[]" value='<?php echo ($kk["jc_id"]); ?>'>正常<br /><br /><?php endforeach; endif; ?><br /><br />
	</div>
	<div id='f'>
	<?php if(is_array($arr3)): foreach($arr3 as $key=>$kk): ?><input type="checkbox" name="jc_id[]" value='<?php echo ($kk["jc_id"]); ?>'>不正常<br /><br /><?php endforeach; endif; ?>
	</div>
	
	<input type="hidden" name="id" value='<?php echo ($id); ?>'>
	<input type="submit" value='提交确认'>
</form>
-->



<form method="post" action="/Home/Shifu/tjj">
	<div id='t'>
	
	</div>
    
    <div class="mnucthb_box">
        <div class="mncfg">
            <ul class="mnucthb_box_ul bnutbh3">
                <?php if(is_array($arr2)): foreach($arr2 as $key=>$kk): ?><li>
                        <?php echo ($kk["jc_name"]); ?>:<input class="biaodm" type="checkbox" name="jc_id[]" value='<?php echo ($kk["jc_id"]); ?>'><span>正常</span>
                        <div class="miaoshu"><?php echo ($kk["jc_content"]); ?></div>
                    </li><?php endforeach; endif; ?>
            </ul>
            
            <ul class="mnucthb_box_ul bnutbh1 bntgaib">
                <?php if(is_array($arr3)): foreach($arr3 as $key=>$kk): ?><li>
                        <input class="biaodm1" type="checkbox" name="jc_id[]" value='<?php echo ($kk["jc_id"]); ?>'><em>异常</em>
                    </li><?php endforeach; endif; ?>
            </ul>
            
        </div>
    </div>
    
    
	<!--<div id='f'>
	<?php if(is_array($arr3)): foreach($arr3 as $key=>$kk): ?><input type="checkbox" name="jc_id[]" value='<?php echo ($kk["jc_id"]); ?>'>不正常<br /><br /><?php endforeach; endif; ?>
	</div>-->
	
	<input type="hidden" name="id" value='<?php echo ($id); ?>'>
	
    <div class="jiedan">
        <div class="jiedan_box">
            <input class="mkburt" type="submit" value='提交确认'>
        </div>
    </div>
</form>














    </div>
</div>

<script>
//alert(2)
$(function(){
	$(".biaodm" ).each(function(){
		if($(this).attr("checked")){
			$(this).addClass('on')
			$(this).next().text(index)
		}
	})
	$(".mnucthb_box_ul>li>span").click(function(){
		var selValue = $(this).parent().index();
		//console.log(selValue)
		$(this).prev('input').attr("checked",true);
		$(this).addClass('on');
		if($(this).prev('input').attr("checked")){
			$('.biaodm1').eq(selValue).attr("checked",false);
			$('.biaodm1').eq(selValue).next().removeClass('on');
		}
		$(".mkburt").css({'display':'block'})
		$(this).parent().css({'margin-bottom':'0px'})
		$('.biaodm1').eq(selValue).parent().css({'margin-bottom':'0px'})
		$(this).next('.miaoshu').remove();
	})
	
	$(".mnucthb_box_ul>li>em").click(function(){
		var selValuebs = $(this).parent().index();
		$(this).addClass('on');
		//console.log(selValuebs)
		$(this).prev('input').attr("checked",true);
		if($(this).prev('input').attr("checked")){
			$('.biaodm').eq(selValuebs).attr("checked",false);
			$('.biaodm').eq(selValuebs).next().removeClass('on');
		}
		$(".mkburt").css({'display':'block'})
		$(this).parent().css({'margin-bottom':'0px'})
		$('.biaodm').eq(selValuebs).parent().css({'margin-bottom':'0px'})
		$('.biaodm').eq(selValuebs).nextAll('.miaoshu').remove();
	})
	    var lkjd=$(".mncfg").width();
		$(".miaoshu").width(lkjd);
	
})
</script>



</body>
</html>