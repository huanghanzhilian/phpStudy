<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-工程师-我的仓库</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<script type="text/javascript" charset="utf-8"> 
/*window.onload=function(){
    console.log($(".models>.models_lis >ul").height());
	loaded1()	
} */
	$(function() {   		
		
		var lkj=$(document).height();
		var cdkd=lkj-146;
		
		$(".brands_lis,.models_lis").height(cdkd);
        $("#models_lis_c").css({'min-height':cdkd+200})
	});
</script>
<style type="text/css">
a{text-decoration:none;}
#le{float:left;}
#list{float:left;margin-left:30px;}

html{ height:100%; }
body{ height:100%; overflow:hidden; }
#le{float:left;}
#list{float:left;margin-left:30px;}
#r{float:right;margin-right:30px;}
#models_lis{  height: 490px; overflow: hidden;}
#models_lis_c{ height:auto; position:relative; top:0; }



.lili_c_cv{ bottom:47px; z-index:214;}
.lili_c_ico_dv{ padding-bottom:0px !important;}
.models>.models_lis>ul> li>em{ font-style:normal;}
.nudt_1_rc2>a{ background:#3e7edb; border-right:1px solid #b2b2b2;}
.nudt_1_rc2:last-child>a{ border:none;}
.nav_gddd{ z-index:212111;}



.Maskc_box ul form>li {
    line-height: 34px;
    font-size: 15px;
    color: #666;
    padding: 6px 15px;
	position:relative;
}

.zhiem {
    background: url(../../../../Public/img/images/qrdg_2_03.png) center center no-repeat;
    position: absolute;
    right: 12px;
    top: 50%;
    margin-top: -9px;
    background-size: 100%;
    width: 18px;
    height: 18px;
    display: inline-block;
    vertical-align: middle;
}
.zhiem.on {
    background: url(../../../../Public/img/images/qrdg_1_03.png);
    background-size: 100%;
}
.chmn_dmk{ display:none;}
.Maskc_box ul form>li .nudt_1_r{ padding-right:18px;}

</style>
</head>
<body>
<div class="header">
    <a href="/Home/Shifu/index"><span></span></a>
    <h1>我的仓库</h1>
    <em class="lsycrd"><a href="/Home/Gouwuche/rciwse">回收的仓库</a></em>
</div><!--头-->
<div class="Maskc"></div>
    <div class="content">
        <div class="product_sx_box clearfix">
            <div class="brands fl">
                <div class="title">品牌</div>
                <div class="brands_lis">
                    <ul id="cccx">
                        
                            <?php if(is_array($arr4)): foreach($arr4 as $key=>$k): ?><li onclick='j(<?php echo ($k["brand_id"]); ?>)'>
                                    <?php echo ($k["brand_name"]); ?>
                                </li><?php endforeach; endif; ?>
                            <!--<?php if(is_array($arr3)): foreach($arr3 as $key=>$kk): ?><li id='u' onclick='ajaxpp(<?php echo ($kk["brand_id"]); ?>);' ><?php echo ($kk["brand_name"]); ?></li><?php endforeach; endif; ?>-->
                    </ul>
                </div>
            </div><!-- 品牌 -->
            <div class="models fr">
                <div class="title">型号</div>
                <div class="models_lis" id="models_lis">
                    <ul id="models_lis_c">
                            
                    </ul>
                </div>
            </div><!--型号-->
        </div>

        <!--<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k): $mod = ($i % 5 );++$i;?><a style='font-size:14px;' href='javascript:void(0)'onclick='p(<?php echo ($k["brand_id"]); ?>)'><?php echo ($k["brand_name"]); ?></a>&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>-->
        
	    <div id='listc'>
	
        </div><br /><br /><br />
        
        <div id='li' class="lili_c lili_c_cv">
        
        </div>
    
    
    </div>
    
<!--nav固定-->
<div class="nav_gd">
    <div class="nudt_1a cunmgy">
        <li class="nudt_1_rc nudt_1_rc2">
            <a href="/Home/Gouwuche/baosun">报损单</a>
        </li>
        <li class="nudt_1_rc nudt_1_rc2">
            <a href="/Home/Gouwuche/maichu_list">卖出单</a>
        </li>
        <li class="nudt_1_rc nudt_1_rc2">
            <a href="/Home/Gouwuche/tuihuo_list">退货单</a>
        </li>
    </div>
</div>
<!--nav固定-->
    
<script type="text/javascript">



function bbmut(emc){
	//alert(emc)
	$("#chuannko").attr("action","/Home/Gouwuche/"+emc)
	$(".submit_sd").click();
}
function bbmut1(emc){
	//alert(emc)
	$("#chuannko").attr("action","/Home/Gouwuche/"+emc)
	$(".submit_sd").click();
}
function bbmut2(emc){
	//alert(emc)
	$("#chuannko").attr("action","/Home/Gouwuche/"+emc)
	$(".submit_sd").click();
}

function Checkedr(){
	$("html,body").height($(window).height()).css({"overflow-y": "hidden"});
	$(window.document.body).append('<div class="f_bz"><div class="f_bz_top f_bz_top_a">您确定此次操作吗</div><ul class="pubcvt"><li id="qberc1" class="pubcvt_v eryv" data="no确定">确定</li><li id="xqux" class="pubcvt_v">取消</li></ul></div><div class="Maskc3" style="display:block"></div>');
	$("#qberc1").click(function(){
		$(this).attr('data','确定')
		$('.submit_sd').click()
		$("html,body").css({"overflow-y": "auto",'height':'auto'});
		$(".f_bz").remove();
		$(".Maskc3").remove();
	})
	
	$("#xqux").click(function(){
	    $("html,body").css({"overflow-y": "auto",'height':'auto'});
		$(".f_bz").remove();
		$(".Maskc3").remove();
		$('input:radio[name="cangku_id"]:checked').attr("checked",false);
		$('.zhiem').removeClass('on')
	})
	
	
	var val=$('input:radio[name="cangku_id"]:checked').val();
	if(val==null){
		$(".f_bz_top_a").text('请选择配件')
	
		//alert('请选择产品')
		return false;
	}
	/*else{
		$(".f_bz_top_a").text('您确认执行吗')
		//return false;
		if($("#qberc1").click())
		{
			//alert(55)
			return true;
		}else{
			$('input:radio[name="cangku_id"]:checked').attr("checked",false);
			$('.zhiem').removeClass('on')
		    return false; 
	    }
	}*/
	
	if($("#qberc1").attr('data')=='no确定')
	{
		return false;
	}else{
		return true;
	}
	//return true;
	return false;		
}
/*$(".submit_sd").click(function(){
	alert(1)
})*/



$("body").ajaxStart(function(){ 
	$(this).append('<div class="jztp"><img src="/Public/img/jz.gif"/></div>');
	$(".Maskc1").show();
	$(".Maskc_box").remove();
	$("#li").css({'opacity':'0'})
});
$("body").ajaxStop(function(){
	$(".jztp").remove();
	$(".Maskc1").hide();
	$("#li").css({'opacity':'1'})
});

function fengcorel(){
		   $('.brands_lis').unbind("touchstart");
		   $('.brands_lis').unbind("touchmove");
		   $('.brands_lis').unbind("touchend");
		  $("#cccx").css("top", '0px');
            var start_x, start_y, end_x, end_y, move_num;
            var aboveY=0; // 设一个全局变量记录上一次内部块滑动的位置
          var documentHeight1=$("#cccx").height()+100//内部滑动模块的高度
          var wapperHeight1=$(".brands_lis").height(); //外部框架的高度

         var inner=document.getElementById("cccx");  
			
			$(".brands_lis").on("touchstart", function(e) {
			    //e.preventDefault();
				start_Y = e.originalEvent.targetTouches[0].clientY;
			});

			
			$(".brands_lis").on("touchmove", function(e) {
				e.preventDefault();
				end_y = e.originalEvent.targetTouches[0].clientY;
				move_num = parseInt(end_y - start_Y)//.toFixed(0);
				//console.log(move_num);
				var tf_num = parseInt(move_num+aboveY)
				
				$("#cccx").css("top", tf_num+'px');
		
			}); 
			$(".brands_lis").on("touchend", function(e) {
				//e.preventDefault(); 
				var nbgd=$('#cccx').position().top;
                aboveY=$('#cccx').position().top;  //touch结束后记录内部滑块滑动的位置 在全局变量中体现 一定要用parseInt()将其转化为整数字;
				//console.log(aboveY);
				if(move_num>0&&aboveY>0
				){
                    $("#cccx").animate({'top':'0'},200);
                       aboveY=0;
                } 
                  
                   else if(move_num<0&&(aboveY<(-(documentHeight1-wapperHeight1)))){
                    // inner.style.top=-(documentHeight1-wapperHeight1)+"px";
                      $("#cccx").animate({'top':-(documentHeight1-wapperHeight1)},200);
                     aboveY=-(documentHeight1-wapperHeight1);
					 console.log(aboveY);
                  } 
				  else if(move_num % 53!=0){
					  var gdsdc=Math.round(nbgd/53)
					  $("#cccx").animate({'top':gdsdc*53},500);
					  aboveY=gdsdc*53;
				  }
		  });
	  }
      fengcorel()
	  
	  
      function fengcore(){
		   $('#models_lis').unbind("touchstart");
		   $('#models_lis').unbind("touchmove");
		   $('#models_lis').unbind("touchend");
		  $("#models_lis_c").css("top", '0px');
            var start_x, start_y, end_x, end_y, move_num;
            var aboveY=0; // 设一个全局变量记录上一次内部块滑动的位置
          var documentHeight=$("#models_lis_c").height();//内部滑动模块的高度
          var wapperHeight=$("#models_lis").height(); //外部框架的高度
         var inner=document.getElementById("models_lis_c");  
			
			$("#models_lis").on("touchstart", function(e) {
			    //e.preventDefault();
				start_Y = e.originalEvent.targetTouches[0].clientY;
			});

			
			$("#models_lis").on("touchmove", function(e) {
				e.preventDefault();
				end_y = e.originalEvent.targetTouches[0].clientY;
				move_num = parseInt(end_y - start_Y)//.toFixed(0);
				//console.log(move_num);
				var tf_num = parseInt(move_num+aboveY)
				
				$("#models_lis_c").css("top", tf_num+'px');
		
			}); 
			$("#models_lis").on("touchend", function(e) {
				//e.preventDefault(); 
				var nbgd=$('#models_lis_c').position().top;
                aboveY=$('#models_lis_c').position().top;  //touch结束后记录内部滑块滑动的位置 在全局变量中体现 一定要用parseInt()将其转化为整数字;
				//console.log(aboveY);
				if(move_num>0&&aboveY>0){
                    $("#models_lis_c").animate({'top':'0'},200);
                       aboveY=0;
                } 
                  
                   else if(move_num<0&&(aboveY<(-(documentHeight-wapperHeight)))){
                    // inner.style.top=-(documentHeight-wapperHeight)+"px";
                      $("#models_lis_c").animate({'top':-(documentHeight-wapperHeight)},200);
                     aboveY=-(documentHeight-wapperHeight);
					 console.log(move_num);
                  } 
				  else if(move_num % 53!=0){
					  var gdsdc=Math.round(nbgd/53)
					  $("#models_lis_c").animate({'top':gdsdc*53},500);
					  aboveY=gdsdc*53;
				  }
		  });
	  }
	  
	  fengcore()




$(function(){
	$(".brands>.brands_lis ul li").eq(0).click()
})
	function j(brand_id){
		document.getElementById('li').style.display='none';
		/*var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Gouwuche/jixing/brand_id/"+id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
				document.getElementById('models_lis_c').innerHTML=ajax.responseText
			}
		}*/
		
		$.ajax({
			url: "/Home/Gouwuche/pingpai/brand_id/",
			data:{'brand_id':brand_id},
			dataType: "html",
			type:'get',
			success: function (data) {
				//$this.attr("disabled", "true");
			$("#models_lis_c").html( data);
			fengcore()
			    $(".models>.models_lis>ul> li").click(function(){
							
					if($(this).hasClass('on')){
						$(this).removeClass('on')
						$(this).find('b').css({'background-color':'#e6e6e6'})
					}else{
					$(this).addClass('on').siblings().removeClass('on').find('b').css({'background-color':'#e6e6e6'});
					$(this).find('b').css({'background-color':'#3e7edb'})
					};
					
					
					
				});
				
				$(".models>.models_lis>ul> li a").click(function(){
					skj=($(this).text())	
				})
				
				
				
				$( ".models>.models_lis>ul> li" ).each(function( index ) {
					$(this).find('b').text(index+1)
				});
			}
			
		});	
		
	
	}
	
	
	
	
function cpkajax(cpk_id){
	//alert(cpk_id);
		document.getElementById('li').style.display='block';
		/*var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Gouwuche/changk_xq/model_id/"+model_id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
				    document.getElementById('li').innerHTML=ajax.responseText
			    }
		    }*/
			
		$.ajax({
			url: "/Home/Gouwuche/changk_xq",
			data:{'cpk_id':cpk_id},
			dataType: "html",
			type:'get',
			success: function (data) {
			    $("#li").html( data);
				//$("html,body").height($(window).height()).css({"overflow-y": "hidden"});
				$(".Maskc").css({'display':'block'})
				$(".lili_c_ico>p").text(skj)
				//收回
				$(".lili_c_ico>span").click(function(){
					$("#li").fadeOut(100);
					$(".Maskc").fadeOut(100);
					//$("html,body").css({"overflow-y": "auto",'height':'auto'});
					//$("#kk").show();
					//event.stopPropagation();
				})
				 //收回
				 
				 $(".Maskc_box ul form>li").click(function(){
					 $(this).find('input').attr("checked",true);
					 $('input:radio[name="cangku_id"]').each(function(){
						if($(this).attr('checked')){
							$(this).next().addClass('on')
						}else{
							$(this).next().removeClass('on')
						}
	             	})
				 })
								  
			}
			
		});
		
}

</script>




</body>
</html>
<script type="text/javascript">
/*	function jixing(model_id){
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Gouwuche/peijian/model_id/"+model_id,true)
			
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('list').innerHTML=ajax.responseText
				}
			}
	}
function quanbu(model_id){
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Gouwuche/quan/model_id/"+model_id,true)
			
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('list').innerHTML=ajax.responseText
				}
			}
	}*/

/*function j(brand_id){
	//alert(brand_id);
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Gouwuche/pingpai/brand_id/"+brand_id,true)
			
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('brand').innerHTML=ajax.responseText
				}
			}
	}*/
</script>