<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>产品库管理_关联小问题</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/Admin_modify.css" rel="stylesheet" type="text/css">
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js" type="text/javascript"></script>
</head>
<body class="body1_color">
<div class="header public_width">
    <h1 class="header_h1">产品库 &gt; 手机维修 &gt; 关联小问题</h1>
</div>
<div class="container public_width">
    <!--公共返回-->
    <div class="Return">
        <a class="Return_button" href="/Admin/Shangpin/wtku/brand_id/<?php echo ($brand_id); ?>">返回</a>
        <!--<span class="Return_button cursor" onClick="window.history.back()">返回</span>-->
    </div>
    <!--公共返回-->
    <div class="append_cp">
        <div class="append_cp_box clearfix">
            <form method="post" action="/Admin/Shangpin/xwtadd">
                <input class="append_cp_text fl" type="text" name="xwt_name" placeholder="请填写您要添加的小问题"/>
                <input type="hidden" name="questiontype_id" value='<?php echo ($questiontype_id); ?>'>
		        <input type="hidden" name="brand_id" value='<?php echo ($brand_id); ?>'>     
                <input class="append_cp_anniu fl cursor" type="submit" value='添加'>
            </form>
        </div>
    </div>
    
    <div class="container_modify" id="xgpinpan">
        <ul class="zhuti_rom zhuti_rom_ll">
            <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li class="">
                    <form method="post" action="/Admin/Shangpin/questionup">
                        <div class=" fr ">
                                            
                            
                            <span class="mzsaw mzsaw_cc1">
                                <input style="display:none; background:#fff;" class="Return_button_a1" type="submit" value='确定'>
                                <b class="Return_button_a1 btn_xiuga">修改</b>
                                <input class="nnbbbv Return_button_a1" style=" display:none; background:#fff;" type="reset" value="取消" />
                            </span>
                        </div>
                        
                        
                        <a class="zjnmk_pp" style="float:none; display:inline-block;" href="/Admin/Shangpin/xwtshanchu/questiontype_id/<?php echo ($kk["questiontype_id"]); ?>/brand_id/<?php echo ($brand_id); ?>/xwt_id/<?php echo ($kk["xwt_id"]); ?>" onclick="if(confirm('确定删除?')==false)return false;"><span class="zhkkbn"></span></a>
                        <strong class="buctrese" style="width:500px; display:inline-block;">
                            <input style="width:100%; text-align:left;" readonly="true" class="xiubuttce xiubuttce_as1" type="text" name="xwt_name" value='<?php echo ($kk["xwt_name"]); ?>'>
                        </strong>
                        <input type="hidden" name="xwt_id" value='<?php echo ($kk["xwt_id"]); ?>'>
                        <input type="hidden" name="model_id" value='<?php echo ($model_id); ?>'>
                        <input type="hidden" name="brand_id" value='<?php echo ($brand_id); ?>'>
                        <input type="hidden" name="questiontype_id" value='<?php echo ($questiontype_id); ?>'>
                        
                    </form> 
                </li><?php endforeach; endif; ?>
            
            
            
        </ul>
        
        
    </div>
    

</div>

<script>
$(function(){
	$(".btn_xiuga").click(function(){
		$(this).hide().prev().show();
		$(this).next().show();
		$(this).parents('li').find('input.xiubuttce,select.xiubuttce').removeAttr("disabled").removeAttr("readonly").addClass('on');
		                   //阻止 <span> 的 click 事件冒泡
		$(this).parents('li').siblings().find("input[type='submit']").hide().next().show();
		$(this).parents('li').siblings().find("input[type='reset']").hide()
		$(this).parents('li').siblings().find('input.xiubuttce,select.xiubuttce').attr("readonly", "true").removeClass('on');
		
		
		$(".nnbbbv").click(function(){
			$(this).hide().prevAll("input[type='submit']").hide();
		    $(this).prevAll('b').show();
			$(this).parents('li').find('input.xiubuttce,select.xiubuttce').attr("readonly", "true").removeClass('on');
		})
		
		$(".xiubuttce.on").click(function(event){
			$(this).next('ul').show();
			$(".mmbucts ul li").hover(function(){
				  $(this).css({'background-color':'#f1f1f1'})
			  },function(){
				  $(this).css({'background-color':''})
			  });
			  $(".mmbucts ul li").click(function(){
				  $(this).parents('.mmbucts').find('input').val($.trim($(this).text()));
				  $(this).parents('li').find('.bbvcx').val($(this).attr('data'))
		      })
			  
			event.stopPropagation(); 
		})
		
	})
})
</script>



</body>
</html>