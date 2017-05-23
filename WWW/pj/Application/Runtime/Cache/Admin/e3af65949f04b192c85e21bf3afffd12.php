<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>产品库管理</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/Admin_modify.css" rel="stylesheet" type="text/css">
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js" type="text/javascript"></script>
<style>
.zhuti_rom li a.bvbawe{ width:600px; display: inline-block; }
.zhuti_romaa li a{ vertical-align:baseline;}
.bvbawennb{ font-weight:normal; color:#3e7edb;}
.vbcxv_pp{ display:block;}
.zhuti_romaa li .vbcxv_pp a{ vertical-align:middle;}


</style>
</head>
<body class="body1_color">
<div class="header public_width">
    <h1 class="header_h1">产品库 &gt; 手机维修
    <a class="youb_mk" href="/Admin/Shangpin/brandhs/type_id/<?php echo ($type_id); ?>">回收</a></h1>
</div>
<div class="container public_width">
    <!--公共返回-->
    <div class="Return">
        <!--<span class="Return_button cursor" onClick="window.history.back()">返回</span>-->
        <a class="Return_button" href="/Admin/Shangpin/chanpinku">返回</a>
    </div>
    <!--公共返回-->
    <div class="append_cp">
        <div class="append_cp_box clearfix">
            <form method="post" action="/Admin/Shangpin/brandup">
                <input class="append_cp_text fl" type="text" name="brand_name" placeholder="请添加维修种类"/>
                <input type="hidden" name="type_id" value='<?php echo ($type_id); ?>'>
                <input class="append_cp_anniu fl cursor" type="submit" value='添加'>
            </form>
        </div>
    </div>
    
    <div class="container_modify">
        <ul class="zhuti_rom zhuti_romaa">
		<div id='p'>
            <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li class="clearfix" id="<?php echo ($kk["pai"]); ?>">
                    
                    
					 
                     
                     
                     
                     
                     
                     <div class="zhuti_rom_list_r fr" style="width:130px;">
                         <a class="zjnmk_pp" href="/Admin/Shangpin/brandshanchu/brand_id/<?php echo ($kk["brand_id"]); ?>" onclick="if(confirm('确定删除?')==false)return false;"><span class="zhkkbn"></span></a>
                         <span class="vbcxv vbcxv_pp">
                             <a class="shang_up" href='javascript:void(0)'onclick='as1(<?php echo ($kk["pai"]); ?>,this)'></a>
                             <a class="xia_up" href='javascript:void(0)'onclick='as2(<?php echo ($kk["pai"]); ?>,this)'></a>
                         </span>
                         <input type="hidden" name="type_id" value='<?php echo ($type_id); ?>' id='type_id'>
                     </div>
                     
                     <a class="bvbawe" href="/Admin/Shangpin/model/brand_id/<?php echo ($kk["brand_id"]); ?>">
                        <!-- <strong class="buctrese"><?php echo ($kk["brand_name"]); ?></strong><b class="buctrese_lian bvbawennb">修改</b>-->
                        
                         <form class="" style="display:inline-block;" method="post" action="/Admin/Shangpin/brand_upp">
                            <strong class="buctrese">
                                
                                <input readonly="true" class="xiubuttce xiubuttce_as1 bvbaw" style="text-align:left; width:80px;" type="text" name="brand_name" value='<?php echo ($kk["brand_name"]); ?>'>
                            
                                <span class="mzsaw mzsaw_cc1">
                                    <input style="display:none; background:#fff;" class="Return_button_a1" type="submit" value='确定'>
                                    <span class="btn_xiuga btrui cursor bvbawennb bvbaw">修改</span>
                                    <input class="nnbbbv Return_button_a1" style=" display:none; background:#fff;" type="reset" value="取消" />
                                </span>
                            </strong>
                            <input type="hidden" name="type_id" value='<?php echo ($type_id); ?>'>
                           <!-- <input type="hidden" name="model_id" value='<?php echo ($model_id); ?>'>-->
                            <input type="hidden" name="brand_id" id='brand_id' value='<?php echo ($kk["brand_id"]); ?>'>
                        </form>
                        
                         
                         
                         
                     </a>
                     
                </li><?php endforeach; endif; ?>
		</div>
        </ul>
    </div>
</div>


<!--<a href="/Admin/Shangpin/chanpinku">返回</a><br /><br />
<div id='f'>
	<a href='javascript:void(0)'onclick='ass(1)'>添加维修品牌</a><br /><br />
	<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><a href="/Admin/Shangpin/model/brand_id/<?php echo ($kk["brand_id"]); ?>"><?php echo ($kk["brand_name"]); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="/Admin/Shangpin/brandshanchu/brand_id/<?php echo ($kk["brand_id"]); ?>" onclick="if(confirm('确定删除?')==false)return false;"></a><br /><br /><?php endforeach; endif; ?>
</div>
<div id='e' style='display:none'>
	<form method="post" action="/Admin/Shangpin/brandup">
	<input type="text" name="brand_name">
	<input type="hidden" name="type_id" value='<?php echo ($type_id); ?>'>
	<input type="submit" value='添加'>
	</form>
</div>-->
</body>
</html>
<script type="text/javascript">
    eibur()
	function as1(id,thise){
		
		var shang_id=$(thise).parents('li').prev();
        var brandid=shang_id.attr('id');
	    var type_id=document.getElementById('type_id').value;
	  console.log(id);
	  console.log(shang_id.attr('id'));
	  console.log(brand_id);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Admin/Shangpin/brandpai/brand_id/"+id+"/brandid/"+brandid+"/type_id/"+type_id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('p').innerHTML=ajax.responseText;
					eibur()
					
				}
			}

	}

	function as2(id,thise){
		
	   var shang_id=$(thise).parents('li').next();
       var brandid=shang_id.attr('id');
		var type_id=document.getElementById('type_id').value;
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Admin/Shangpin/brandpai/brand_id/"+id+"/brandid/"+brandid+"/type_id/"+type_id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('p').innerHTML=ajax.responseText
					eibur()
				}
			}

	}
	
	function eibur(){
		var uu=$("#p li").eq(0).find('.vbcxv a').eq(0);
		var uui=$("#p li").length-1;
		var bbv=$("#p li").eq(uui).find('.vbcxv a').eq(1);
		uu.hide();
		bbv.hide();
		console.log(uu)
		
	}

$(function(){
	$(".bvbaw").click(function(event){
		event.preventDefault();     //取消默认事件
		event.stopPropagation()
		
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

</script>