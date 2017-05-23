<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
<title>维百士-手机维修-配件订单</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<style>
.muucdrt_con{ background:; overflow:hidden; height:25px; margin-top:-35px; padding-bottom:10px; position:relative; z-index:2333;}
.muucdrt{ display:block;  padding:2px 15px; float:right; height:15px;  background:url(../../../../Public/img/shifu_duan/shanchu_nn_1.png) center center no-repeat; background-size: 12px; }
</style>
</head>
<body style="background:#f5f5f5">
<div class="header ">
    <a href="/Home/Shifu/index"><span></span></a>
    <h1>配件订单<!--<?php echo ($my); ?>--></h1>
    <!-- <em>去购买</em> -->
</div><!--头-->
<div class="content">
    <div class="content_con">
        <!--tab头-->
        <div class="shifudu_top">
            <ul class="pubcvt shifudu_top_ul shifudu_top_ul_gd">
                <li class="pubcvt_v shifudu_top_li shifudu_top_li_1">
                    <a href="javascript:void(0)" onclick='wei(0)'>未付款<span>(<?php echo ($nums1); ?>)</span></a>
                </li>
                <li class="pubcvt_v shifudu_top_li">
                    <a href="javascript:void(0)" onclick='wei(1)'>已付款<span>(<?php echo ($nums2); ?>)</span></a>
                </li>
                <li class="pubcvt_v shifudu_top_li">
                    <a href="javascript:void(0)" onclick='wei(2)'>已完成<span>(<?php echo ($nums3); ?>)</span></a>
                </li>
            </ul>
        </div>
        <!--tab头-->


<!--<a href="/Home/Gouwuche/goumaichanpin">购买商品</a>
<center><?php echo ($my); ?></center>
<center><a href="/Home/Gouwuche/cangkua">仓库</a></center>
	 <center><a href='javascript:void(0)'onclick='wei(0)'>未付款</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='javascript:void(0)'onclick='yifk(1)'>已付款</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='javascript:void(0)'onclick='yi(2)'>已完成</a></center>-->
     
     
	<div id='ff'>
    
    
	<div class="ceomer_com">
    <?php if(is_array($arr)): foreach($arr as $aa=>$kk): ?><div class="rnmbur rnmbur_cm">
            <ul>
                <li>
                     <span class="chuangmbr">
                        
                     
						  
                    
                          </span>
                          <span class="bimnb fr"><?php echo ($aa); ?></span>
                </li>
                <li>
                     商品：<span class="chuangmbr">
                             
                          </span>
                </li>
                <li>
                    <span class="desc">
                        <?php if(is_array($kk)): foreach($kk as $key=>$cc): echo ($cc["cpk_name"]); ?> <br /><?php endforeach; endif; ?>
                    </span>
                </li>
                
                <li>
                     <span class="bimnb fr"><?php echo ($cc["xd_time"]); ?> </span>
					 <span class="chuangmbrmo">总价格：<?php echo ($cc["amount"]); ?> 元 </span>
                </li>
            </ul>
            <a class="shifu_aclc nubbc_nu" href="/Home/Gouwuche/peijian_xiangq/id/<?php echo ($cc["id"]); ?>"></a>
        </div>
        <div class="muucdrt_con">
			<a data="<?php echo ($shanchu); ?>" class="muucdrt" href='javascript:void(0)'onclick='de(<?php echo ($cc["id"]); ?>)'><!--<?php echo ($shanchu); ?>--></a>
        </div><?php endforeach; endif; ?>
    </div>
    
    
	</div>
    
    
    
    </div>
</div>
</body>
</html>
<script type="text/javascript">

function ahelf(){
	$( ".rnmbur_cm" ).each(function(ing,suop){
		var get_rnmbur_cm=($(this).height());
		$(this).find('a').height(get_rnmbur_cm)
		//console.log(get_rnmbur_cm)
	})
}
ahelf()

function uhoip(){
	$( ".muucdrt" ).each(function(){
		if($(this).attr('data')==''){
			$(this).parent().remove();
		}else{
			
		}
	})
}
uhoip()

$(function(){
	
	
	
	
	$(".shifudu_top_li").click(function(){
		if($(this).hasClass('shifudu_top_li_1')){
			//$(this).removeClass('shifudu_top_li_1')
			//$(this).find('b').css({'background-color':'#e6e6e6'})
		}else{
		$(this).addClass('shifudu_top_li_1').siblings().removeClass('shifudu_top_li_1')
		
		};
	})
	//$(".shifudu_top_li").eq(1).click()
	//$(".shifudu_top_li>a").eq(1).click()
	
})



/*	function yifk(fkzt){
		//alert(fkzt);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Gouwuche/yifukuan/fkzt/"+fkzt,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('ff').innerHTML=ajax.responseText;
					ahelf()
				}
        }
}
*/



function wei(fkzt){
		//alert(fkzt);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Gouwuche/wfk/fkzt/"+fkzt,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('ff').innerHTML=ajax.responseText;
					ahelf()
					uhoip()
				}
        }
}


/*function yi(fkzt){
		//alert(fkzt);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Gouwuche/yiwancheng/fkzt/"+fkzt,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('ff').innerHTML=ajax.responseText;
					ahelf()
				}
        }
}*/
function de(id){
	 if(window.confirm('您确定要删除吗')){
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Gouwuche/peijianshanchu/id/"+id)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('ff').innerHTML=ajax.responseText
				}
			}
			window.location.reload()
	 }
}
</script>