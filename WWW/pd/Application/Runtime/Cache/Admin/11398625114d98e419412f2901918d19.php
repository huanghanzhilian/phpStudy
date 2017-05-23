<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>产品库管理_产品库</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/Admin_modify.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<style type="text/css">

</style>
</head>
<body class="body1_color">
<div class="header public_width">
    <h1 class="header_h1">产品库 &gt; 手机维修 &gt; 苹果 &gt; 产品库
    <a class="youb_mk" href="/Admin/Shangpin/chanpinhs/model_id/<?php echo ($model_id); ?>/brand_id/<?php echo ($brand_id); ?>">回收</a></h1>
</div>

<div class="container public_width">
    <!--公共返回-->
    <div class="Return">
        <!--<span class="Return_button cursor" onClick="window.history.back()">返回</span>-->
        <a class="Return_button" href="/Admin/Shangpin/model/brand_id/<?php echo ($brand_id); ?>">返回</a>
    </div>
    <!--公共返回-->
   
    
    <div class="container_modify" id="xgpinpan">
        <ul id="p" class="zhuti_rom zhuti_rom_ll">
            <li class="">
                <div class="zhuti_rom_list_r fr zhuti_rom_list_r_a1c" style="width:405px;">
                    <span class="mzsaw">
                        师傅价格
                    </span>
                    <span class="mzsaw">
                       用户价格
                    </span>
                    <span class="mzsaw">
                        是否回收
                    </span>
                    <span class="mzsaw">
                        维修说明
                    </span>
                </div>
                <strong class="buctrese">产品名称</strong>
            </li>
            <?php if(is_array($arr)): foreach($arr as $key=>$v): ?><li id="<?php echo ($v["cpk_id"]); ?>" class="">
                    <form method="post" action="/Admin/Shangpin/chanpinupp">
                        <div class="zhuti_rom_list_r fr zhuti_rom_list_r_a1c" style="width:405px;">
                                            
                        <span class="mzsaw">
                            <input readonly="true" class="xiubuttce" type="text" name="cpk_price" value='<?php echo ($v["cpk_price"]); ?>' autocomplete="off">
                        </span>
                        <span class="mzsaw">
                            <input readonly="true" class="xiubuttce" type="text" name="cpp_price" value='<?php echo ($v["cpp_price"]); ?>' autocomplete="off">
                        </span>
                        <span class="mzsaw mmbucts">
                            <input readonly="true" class="xiubuttce" type="text" name="sf" value='<?php echo ($v["sf"]); ?>' autocomplete="off">
                        </span>
                        <span class="mzsaw mzsaw_cc1">
                            <input style="display:none; background:#fff;" class="Return_button_a1" type="submit" value='确定'>
                            <b class="Return_button_a1 btn_xiuga">修改</b>
                            <input class="nnbbbv Return_button_a1" style=" display:none; background:#fff;" type="reset" value="取消" />
                        </span>
                        <span class="vbcxv">
                            <a class="shang_up" href='javascript:void(0)'onclick='as1(<?php echo ($v["cpk_id"]); ?>,this)'></a>
                            <a class="xia_up" href='javascript:void(0)'onclick='as2(<?php echo ($v["cpk_id"]); ?>,this)'></a>
                        </span>
                        </div>
                        <a class="zjnmk_pp" style="float:none; display:inline-block;" href="/Admin/Shangpin/chanpinshanchu/cpk_id/<?php echo ($v["cpk_id"]); ?>/model_id/<?php echo ($model_id); ?>/brand_id/<?php echo ($brand_id); ?>" onclick="if(confirm('确定删除?')==false)return false;"><span class="zhkkbn"></span></a>
                        <strong class="buctrese">
                            <input readonly="true" class="xiubuttce xiubuttce_as1" style="text-align:left; width:260px;" type="text" name="cpk_name" value='<?php echo ($v["cpk_name"]); ?>' autocomplete="off">
                        </strong>
                      <input type="hidden" name="cpk_id" value='<?php echo ($v["cpk_id"]); ?>'>
                        <input type="hidden" name="model_id" id="model_id" value='<?php echo ($model_id); ?>'>
                        <input type="hidden" name="brand_id" id="brand_id" value='<?php echo ($brand_id); ?>'>
                        
                    </form> 
                </li><?php endforeach; endif; ?>
            
            
            
        </ul>
        <ul class="zhuti_rom">
            <li class="cdfgd">
                <form method="post" action="/Admin/Shangpin/chanpinup">
                <div class="zhuti_rom_list_r fr zhuti_rom_list_r_a1c">
                    <span class="mzsaw">
                        <input class="xiubuttce on" type="text" name="cpk_price" autocomplete="off">
                    </span>
                    <span class="mzsaw">
                        <input class="xiubuttce on" type="text" name="cpp_price" autocomplete="off">
                    </span>
                    <span class="mzsaw">
                        <input class="xiubuttce on" type="text" name="sf" autocomplete="off">
                    </span>
                    
                    <span class="mzsaw mzsaw_cc1">
                        <button style=" background:#fff;" class="Return_button_a1">确定</button>
                        <input class="nnbbbv Return_button_a1" style=" display:none; background:#fff;" type="reset" value="取消" />
                    </span>
                </div>
                <a id="chexiao" class="zjnmk_pp" style="float:none; display:inline-block;" href="javascript:;">
                    <span class=""></span>
                </a>
                <strong class="buctrese">
                    <input class="xiubuttce xiubuttce_as1 on" type="text" name="cpk_name" value='' autocomplete="off">
                </strong>
                <input type="hidden" name="model_id" value='<?php echo ($model_id); ?>'>
	            <input type="hidden" name="brand_id" value='<?php echo ($brand_id); ?>'>
                </form>
            </li>
            <button id="nnb" class="nnb">添加</button>
        </ul>
        
    </div>
    
    
    
    
</div>
<script type="text/javascript">
eibur()
	function as1(id,thise){
		
	   var shang_id=$(thise).parents('li').prev();
	   
       var cpkid=shang_id.attr('id');
	   console.log(shang_id)
	   var brandid=document.getElementById('brand_id').value;
	   var model_id=document.getElementById('model_id').value;
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Admin/Shangpin/chanpinkupai/cpk_id/"+id+"/model_id/"+model_id+"/brand_id/"+brandid+"/cpkid/"+cpkid,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('p').innerHTML=ajax.responseText
					eibur()
				}
			}

	}

	function as2(id,thise){
		
	   var shang_id=$(thise).parents('li').next();
        var cpkid=shang_id.attr('id');
		var brandid=document.getElementById('brand_id').value;
	   var model_id=document.getElementById('model_id').value;
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Admin/Shangpin/chanpinkupai/cpk_id/"+id+"/model_id/"+model_id+"/brand_id/"+brandid+"/cpkid/"+cpkid,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('p').innerHTML=ajax.responseText
					eibur()
				}
			}

	}
	
    function eibur(){
		var uu=$("#p li").eq(1).find('.vbcxv a').eq(0);
		var uui=$("#p li").length-1;
		var bbv=$("#p li").eq(uui).find('.vbcxv a').eq(1);
		uu.hide();
		bbv.hide();
		//console.log(uu)
		
	}

</script>
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
	
	$("#nnb").click(function(event){
		$(".zhuti_rom li.cdfgd").show();
		event.stopPropagation();
	})
	$("#chexiao").click(function(){
		$(".zhuti_rom li.cdfgd").hide();
	})
})
</script>






</body>
</html>
<script type="text/javascript">
function ass(id){
	document.getElementById('e').style.display="block";
	document.getElementById('ky').style.display="none";
	}
function as(){
	document.getElementById('e').style.display="none";
	}
function a(){
	document.getElementById('ky').style.display="none";
	}
	function xiu(id){
	
		document.getElementById('e').style.display="none";
		document.getElementById('ky').style.display="block";
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Admin/Shangpin/chanpinxiugai/cpk_id/"+id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('ky').innerHTML=ajax.responseText
				}
			}
	}
</script>