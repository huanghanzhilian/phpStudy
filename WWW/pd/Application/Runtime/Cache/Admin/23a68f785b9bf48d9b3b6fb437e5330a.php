<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
<title>产品库管理_问题库</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/Admin_modify.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<style type="text/css">
.bccdrefd{ width:40px; height:40px;  vertical-align:middle; padding:0; position:relative;}
.inh_iconnm{ position:absolute; left:0; top:0; background:#f1f1f1; width:100%; height:100%;}
.bccdrefd input[type="file"]{ background:red; width:100%; height:100%; position:absolute; left:0; top:0; z-index:33;
flter:alpha(opacity:0);
opacity:0;
}
input.bcbza[type="submit"]{ background:#fff; width:35px; height:25px; display:inline-block; margin-left:10px;
border: 1px solid #3e7edb;
    border-radius: 4px;}
	
.btrui{ color:#3e7edb;}
</style>


</head>
<body class="body1_color">
<div class="header public_width">
    <h1 class="header_h1">产品库 &gt; 手机维修 &gt; 问题库 
    <a class="youb_mk"  href="/Admin/Shangpin/wtkuhs/brand_id/<?php echo ($brand_id); ?>">回收</a></h1>
</div>
<div class="container public_width">
    <!--公共返回-->
    <div class="Return">
        <!--<span class="Return_button cursor" onClick="window.history.back()">返回</span>-->
        <a class="Return_button" href="/Admin/Shangpin/model/brand_id/<?php echo ($brand_id); ?>">返回</a>
    </div>
    <!--公共返回-->
    
    <div class="append_cp">
        <div class="append_cp_box clearfix">
            <form method="post" action="/Admin/Shangpin/questiontypeadd">
                <input class="append_cp_text fl" type="text" name="questiontype_name" placeholder="请填写您要添加的大问题"/>
                <input type="hidden" name="brand_id" value='<?php echo ($brand_id); ?>'>
                <input class="append_cp_anniu fl cursor" type="submit" value='添加'>
            </form>
        </div>
    </div>
    
    <div class="container_modify" id="xgpinpan">
        <ul id="p" class="zhuti_rom">
            <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li class="" id="<?php echo ($kk["questiontype_id"]); ?>">
                    <div class="zhuti_rom_list_r fr">
                        <form style="display:inline-block; margin-right:35px;" method="post" action="/Admin/Shangpin/upadd" enctype="multipart/form-data">
                        <span class="Return_button_a1 bccdrefd">
                            
                                <input type="file" name="imgg">
                                <input type="hidden" name="brand_id" value='<?php echo ($brand_id); ?>'>
                                <input type="hidden" name="questiontype_id" value='<?php echo ($kk["questiontype_id"]); ?>'>
                                
                            
                            <img class="inh_iconnm"src="/Public/<?php echo ($kk["imgg"]); ?>" alt="无" width=50 height=50 />
                        </span>
                        <input class="bcbza" type="submit"  value='上传'>
                        </form>
                        
                        <form style="display:inline-block; margin-right:35px;" method="post" action="/Admin/Shangpin/upaddd" enctype="multipart/form-data">
                        <span class="Return_button_a1 bccdrefd">
                            
                                <input type="file" name="imgg">
                                <input type="hidden" name="brand_id" value='<?php echo ($brand_id); ?>'>
                                <input type="hidden" name="questiontype_id" value='<?php echo ($kk["questiontype_id"]); ?>'>
                                
                            
                            <img class="inh_iconnm"src="/Public/<?php echo ($kk["imggg"]); ?>" alt="无" width=50 height=50 />
                        </span>
                        <input class="bcbza" type="submit"  value='上传'>
                        </form>
                        
                        
                        
                        <a class="Return_button_a1" href="/Admin/Shangpin/xwt/questiontype_id/<?php echo ($kk["questiontype_id"]); ?>/brand_id/<?php echo ($brand_id); ?>">关联小问题</a>
                        <span class="vbcxv">
                            <a class="shang_up" href='javascript:void(0)'onclick='as1(<?php echo ($kk["questiontype_id"]); ?>,this)'></a>
                            <a class="xia_up" href='javascript:void(0)'onclick='as2(<?php echo ($kk["questiontype_id"]); ?>,this)'></a>
                        </span>
                        
                    </div>
                        <a class="zjnmk_pp" style="float:none; display:inline-block;" href="/Admin/Shangpin/wtshanchu/questiontype_id/<?php echo ($kk["questiontype_id"]); ?>/brand_id/<?php echo ($brand_id); ?>" onclick="if(confirm('确定删除?')==false)return false;"><span class="zhkkbn"></span></a>
                        
                        <form style="display:inline-block;" method="post" action="/Admin/Shangpin/questiontypeup">
                            <strong class="buctrese">
                                
                                <input style="width:90px;" readonly="true" class="xiubuttce xiubuttce_as1" type="text" name="questiontype_name" value='<?php echo ($kk["questiontype_name"]); ?>'>
                            
                                <span class="mzsaw mzsaw_cc1">
                                    <input style="display:none; background:#fff;" class="Return_button_a1" type="submit" value='确定'>
                                    <span class="btn_xiuga btrui cursor">修改</span>
                                    <input class="nnbbbv Return_button_a1" style=" display:none; background:#fff;" type="reset" value="取消" />
                                </span>
                            </strong>
                            <input type="hidden" name="questiontype_id" value='<?php echo ($kk["questiontype_id"]); ?>'>
                            <input type="hidden" name="model_id" value='<?php echo ($model_id); ?>'>
                            <input type="hidden" name="brand_id" value='<?php echo ($brand_id); ?>'>
                            <input type="hidden" name="brand_id" id='brand_id' value='<?php echo ($brand_id); ?>'>
                        </form>
                        
                   
                </li><?php endforeach; endif; ?>
        </ul>
    </div>
</div>
<script type="text/javascript">
eibur()
	function as1(id,thise){
		
	   var shang_id=$(thise).parents('li').prev();
	   
       var modelid=shang_id.attr('id');
	   console.log(shang_id)
	   var brandid=document.getElementById('brand_id').value;
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Admin/Shangpin/questiontypepai/model_id/"+id+"/modelid/"+modelid+"/brand_id/"+brandid,true)
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
			ajax.open("get","/Admin/Shangpin/questiontypepai/model_id/"+id+"/modelid/"+modelid+"/brand_id/"+brandid,true)
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