<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>产品库管理_机型添加/创建</title>
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
    <h1 class="header_h1">产品库 &gt; 手机维修 &gt; <?php echo ($brand_name); ?>
    <a class="youb_mk" href="/Admin/Shangpin/modelhs/brand_id/<?php echo ($brand_id); ?>">回收</a></h1>
</div>
<div class="container public_width">
    <!--公共返回-->
    <div class="Return">
        <!--<span class="Return_button cursor" onClick="window.history.back()">返回</span>-->
        <a class="Return_button" href="/Admin/Shangpin/brand/type_id/<?php echo ($type_id); ?>">返回</a>
    </div>
    <!--公共返回-->
    <div class="append_cp_butcin">
        <a class="Return_button_a1" href="/Admin/Shangpin/ysku/brand_id/<?php echo ($brand_id); ?>">颜色库</a>
        <a class="Return_button_a1" href="/Admin/Shangpin/wtku/brand_id/<?php echo ($brand_id); ?>">问题库</a>
        <a class="Return_button_a1" href="/Admin/Shangpin/faku/brand_id/<?php echo ($brand_id); ?>">解决方案库</a>
        <a class="Return_button_a1" href="/Admin/Shangpin/smku/brand_id/<?php echo ($brand_id); ?>">维修说明库</a>
    </div>
    <div class="append_cp">
        <div class="append_cp_box clearfix">
            <button class="append_cp_anniu_but" id="tianco">添加产品</button>
            <form method="post" action="/Admin/Shangpin/modelup">
                
                <!--<input class="append_cp_text fl" type="text" name="model_name" placeholder="请填写您要添加的机型名称"/>-->
                <!--<input type="hidden" name="type_id" value='<?php echo ($type_id); ?>'>-->
                <input type="hidden" name="type_id" value='<?php echo ($type_id); ?>'>
	            <input type="hidden" name="brand_id" value='<?php echo ($brand_id); ?>'>
                <!--<input class="append_cp_anniu fl cursor" type="submit" value='添加'>-->
            </form>
        </div>
    </div>
    
    <div class="container_modify" id="xgpinpan">
        <ul id="p" class="zhuti_rom">
            <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li class="" id="<?php echo ($kk["model_id"]); ?>">
                    <div style="width:395px;" class="zhuti_rom_list_r fr">
                        <a class="Return_button_a1" href="/Admin/Shangpin/yanse/model_id/<?php echo ($kk["model_id"]); ?>/brand_id/<?php echo ($brand_id); ?>">颜色</a>
                        <a class="Return_button_a1" href="/Admin/Shangpin/xiaowenti/model_id/<?php echo ($kk["model_id"]); ?>/brand_id/<?php echo ($brand_id); ?>">问题</a>
                        <a class="Return_button_a1" href="/Admin/Shangpin/fangan/model_id/<?php echo ($kk["model_id"]); ?>/brand_id/<?php echo ($brand_id); ?>">解决方案</a>
                        <a class="Return_button_a1" href="/Admin/Shangpin/chanpinkua/model_id/<?php echo ($kk["model_id"]); ?>/brand_id/<?php echo ($brand_id); ?>">产品库</a>
                        <!--<a id="<?php echo ($kk["model_id"]); ?>" class="Return_button_a1" href="/Admin/Shangpin/paixu/model_id/<?php echo ($kk["model_id"]); ?>/brand_id/<?php echo ($brand_id); ?>">排序</a>-->
                        <span class="vbcxv">
                            <a class="shang_up" href='javascript:void(0)'onclick='as1(<?php echo ($kk["model_id"]); ?>,this)'></a>
                            <a class="xia_up" href='javascript:void(0)'onclick='as2(<?php echo ($kk["model_id"]); ?>,this)'></a>
                        </span>
                        <a class="zjnmk_pp" href="/Admin/Shangpin/modelshanchu/model_id/<?php echo ($kk["model_id"]); ?>/brand_id/<?php echo ($brand_id); ?>" onclick="if(confirm('确定删除?')==false)return false;"><span class="zhkkbn"></span></a>
                    </div>
                    
                        <form style="display:inline-block;" method="post" action="/Admin/Shangpin/model_nameup">
                            <strong class="buctrese">
                                
                                <input readonly="true" class="xiubuttce xiubuttce_as1" style="text-align:left; width:180px;" type="text" name="model_name" value='<?php echo ($kk["model_name"]); ?>'>
                            
                                <span class="mzsaw mzsaw_cc1">
                                    <input style="display:none; background:#fff;" class="Return_button_a1" type="submit" value='确定'>
                                    <span class="btn_xiuga btrui cursor">修改</span>
                                    <input class="nnbbbv Return_button_a1" style=" display:none; background:#fff;" type="reset" value="取消" />
                                </span>
                            </strong>
                            <input type="hidden" name="model_id" value='<?php echo ($kk["model_id"]); ?>'>
                           <!-- <input type="hidden" name="model_id" value='<?php echo ($model_id); ?>'>-->
                            <input type="hidden" name="brand_id" id='brand_id' value='<?php echo ($brand_id); ?>'>
                        </form>
                    
                   
                </li><?php endforeach; endif; ?>
        </ul>
    </div>
    
    <div class="bikuss" id="bikuss">
        <ul class="zhuti_rom zhuti_rom_a1">
            <form method="post" action="/Admin/Shangpin/modelup" onSubmit="return Checked();">
                <h2 class="erji_h2">添加维修机型</h2>
                <li class="li_list_conm">
                    <input class="append_cp_text" type="text" name="model_name" id="model_name" placeholder="添加维修机型" autocomplete="off"/>
                </li>
                <h2 class="erji_h2">请选择颜色</h2>
                <li class="">
                    <?php if(is_array($arr2)): foreach($arr2 as $key=>$kk): ?><span class="Return_button_a1 Return_button_a2 color_ya"><?php echo ($kk["color_name"]); ?></span><input class="color_ya_input" type="checkbox" name="color_id[]" value='<?php echo ($kk["color_id"]); ?>' autocomplete="off"><?php endforeach; endif; ?>
                </li>
                <h2 class="erji_h2">请选择问题</h2>
                <li class="">
                    <?php if(is_array($arr4)): foreach($arr4 as $key=>$k): ?><span class="Return_button_a1 Return_button_a2 color_ya1"><?php echo ($k["questiontype_name"]); ?></span><input class="color_ya1_input" type="checkbox" name="questiontype_id[]" value='<?php echo ($k["questiontype_id"]); ?>' autocomplete="off"><?php endforeach; endif; ?>
                </li>
                <input type="hidden" name="type_id" value='<?php echo ($type_id); ?>'>
	            <input type="hidden" name="brand_id" value='<?php echo ($brand_id); ?>'>
                <li class="li_list_conm">
                <input class="append_cp_anniu_but" type="submit" value='添加'>
                </li>
	        </form>
        </ul>
    </div>
    
</div>



</body>
</html>

<script type="text/javascript">
eibur()
	function as1(id,thise){
		
	   var shang_id=$(thise).parents('li').prev();
	   //console.log(shang_id)
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
		
	   var shang_id=$(thise).parents('li').next();
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
		/*var pp=document.getElementById("p").getElementsByTagName("li");
		var pp1=pp[0].getElementsByTagName("a")[0];
		var pp=$()
		var lcus=pp.length-1;
		var pp2=pp[lcus].getElementsByTagName("a")[1];
		
		pp1.style.display="none";
		pp2.style.display="none";
		console.log(lcus)*/
		var uu=$("#p li").eq(0).find('.vbcxv a').eq(0);
		var uui=$("#p li").length-1;
		var bbv=$("#p li").eq(uui).find('.vbcxv a').eq(1);
		uu.hide();
		bbv.hide();
		//console.log(uu)
		
	}

</script>

<script>
$(function(){
	$("#tianco").click(function(){
		var my_text=$(this).text();
		if(my_text=='添加产品'){
			$(this).text('返回');
			$("#xgpinpan").hide();
		    $("#bikuss").show();
		}else{
			$(this).text('添加产品');
			$("#xgpinpan").show();
		    $("#bikuss").hide();
		}
	})
	
	$(".color_ya").click(function(){
		if($(this).hasClass('on')){
			$(this).removeClass('on')
			$(this).next('input').attr("checked",false);
		}else{
		    $(this).addClass('on')
		    $(this).next('input').attr("checked",true);
		};
	})
	
	$(".color_ya1").click(function(){
		if($(this).hasClass('on')){
			$(this).removeClass('on')
			$(this).next('input').attr("checked",false);
		}else{
		    $(this).addClass('on')
		    $(this).next('input').attr("checked",true);
		};
	});
	
	
	$(".btn_xiuga").click(function(){
		$(this).hide().prev().show();
		$(this).next().show();
		$(this).parents('li').find('input.xiubuttce,select.xiubuttce').removeAttr("disabled").removeAttr("readonly").addClass('on');
		                   //阻止 <span> 的 click 事件冒泡
		$(this).parents('li').siblings().find("input.Return_button_a1[type='submit']").hide().next().show();
		$(this).parents('li').siblings().find("input[type='reset']").hide()
		$(this).parents('li').siblings().find('input.xiubuttce,select.xiubuttce').attr("readonly", "true").removeClass('on');
		
		
		$(".nnbbbv").click(function(){
			$(this).hide().prevAll("input.Return_button_a1[type='submit']").hide();
		    $(this).prevAll('span').show();
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

function Checked(){
	var tutle_n=$("#model_name").val();
    if(tutle_n =='' || tutle_n == null){
		$("#model_name").focus().addClass("tips");
		return false;
	}
	
	var nnmuo=$("input.color_ya_input[type='checkbox'][checked]").length;
	if(nnmuo<1){
		alert('您还没选择颜色')
		return false;
	}
	
	var nnmuo1=$("input.color_ya1_input[type='checkbox'][checked]").length
	if(nnmuo1<1){
		alert('您还没选择问题')
		return false;
	}
	return true;
}
</script>




<script type="text/javascript">
function ass(id){
	document.getElementById('e').style.display="block";
	}
function ass1(id){
	document.getElementById('r').style.display="block";
	}
function a2(id){
	document.getElementById('r').style.display="none";
	}
function ass2(id){
	document.getElementById('c').style.display="block";
	}
function a1(id){
	document.getElementById('c').style.display="none";
	}
</script>