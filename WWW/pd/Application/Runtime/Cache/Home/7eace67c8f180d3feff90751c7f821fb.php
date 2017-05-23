<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
<title>维百士-工程师-手机配件</title>
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

	});
</script>
<style type="text/css">
html{ height:100%; }
body{ height:100%; overflow:hidden; }
#le{float:left;}
#list{float:left;margin-left:30px;}
#r{float:right;margin-right:30px;}
#models_lis{  height: 490px; overflow: hidden;}
#models_lis_c{ height:auto;   position:relative; top:0; }



.lili_c_cv{ bottom:47px; z-index:110;}
.lili_c_ico_dv{ padding-bottom:0px !important;}
.models>.models_lis>ul> li>em{ font-style:normal;}




a{text-decoration:none;}
#le{float:left;}
#list{float:left;margin-left:30px;}
#gw{float:right;margin-right:300px;}



/*手机配件*/
.mobbuet{ line-height:30px;}
.nudt_2cunb{ margin-right:80px; }
.nubbppac{ background:red; width:18px; height:18px; background:}
.nudt_1_rcc{ vertical-align:middle;}


/*手机配件*/


</style>
</head>
<body>
<div class="header">
  <a href="/Home/Shifu/index"><span></span></a>
    <h1>手机配件</h1>
    
</div><!--头-->
<div class="Maskc"></div>
    <div class="content">
        <div class="product_sx_box clearfix">
            <div class="brands fl">
                <div class="title">品牌</div>
                <div class="brands_lis">
                    <ul id="cccx">
                        
                            <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li onclick='brandajax(<?php echo ($kk["brand_id"]); ?>)'>
                                    <?php echo ($kk["brand_name"]); ?>
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
        <li class="nudt_1_lb">
            <div class="fkun_l">
                <div class="goubujk">
                    
                    <span id="fi"><?php echo ($nums); ?></span>
                </div>
            </div>
            <div class="dinbbbu">
                有<span id="zongre"><?php echo ($nums); ?></span>件商品等待付款
            </div>
        </li>
        <li id="dupun_ct" class="nudt_1_rc">
            <a id="buttnmute" href="/Home/Gouwuche/gouwuche">查看购物车</a>
        </li>
    </div>
</div>
<!--nav固定-->



<script type="text/javascript">
    function mkous(){
		if($("#fi").text()=='0'){
			$("#buttnmute").attr('href','javascript:void(0);')
			$("#dupun_ct").removeClass('nudt_1_rc1');
		}else{
			$("#dupun_ct").addClass('nudt_1_rc1');
			$("#buttnmute").attr('href','/Home/Gouwuche/gouwuche')
		}
	}
	mkous()
	
	






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
          var documentHeight=$("#models_lis_c").height()+230;//内部滑动模块的高度
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
				if(move_num>0&&aboveY>0
				){
                    $("#models_lis_c").animate({'top':'0'},200);
                       aboveY=0;
                } 
                  
                   else if(move_num<0&&(aboveY<(-(documentHeight-wapperHeight)))){
                    // inner.style.top=-(documentHeight-wapperHeight)+"px";
                      $("#models_lis_c").animate({'top':-(documentHeight-wapperHeight)},200);
                     aboveY=-(documentHeight-wapperHeight);
					 console.log(aboveY);
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
	function brandajax(brand_id){
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
			url: "/Home/Gouwuche/branda/brand_id",
			data:{'brand_id':brand_id},
			dataType: "html",
			type:'get',
			success: function (data) {
				//$this.attr("disabled", "true");
			$("#models_lis_c").html( data);
			fengcore()
			    $(".models>.models_lis>ul> li").click(function(){
					skj=($(this).find('em').text())			
					if($(this).hasClass('on')){
						$(this).removeClass('on')
						$(this).find('b').css({'background-color':'#e6e6e6'})
					}else{
					$(this).addClass('on').siblings().removeClass('on').find('b').css({'background-color':'#e6e6e6'});
					$(this).find('b').css({'background-color':'#3e7edb'})
					};
					
					
					
				});
				
				$( ".models>.models_lis>ul> li" ).each(function( index ) {
					$(this).find('b').text(index+1)
				});
			}
			
		});	
		
	
	}
	
	
	
	
function cpkajax(model_id){
		document.getElementById('li').style.display='block';
		/*var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Gouwuche/jiejuefangan/model_id/"+id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
				    document.getElementById('li').innerHTML=ajax.responseText
			    }
		    }*/
			
		$.ajax({
			url: "/Home/Gouwuche/tianjiacm",
			data:{'model_id':model_id},
			dataType: "html",
			type:'get',
			success: function (data) {
			    $("#li").html( data);
				$("html,body").height($(window).height()).css({"overflow-y": "hidden"});
				$(".Maskc").css({'display':'block'})
				$(".lili_c_ico>p").text(skj +' 配件列表')
				//收回
				$(".lili_c_ico>span").click(function(){
					$("#li").fadeOut(100);
					$(".Maskc").fadeOut(100);
					$("html,body").css({"overflow-y": "auto",'height':'auto'});
					//$("#kk").show();
					//event.stopPropagation();
				})
				 //收回
				
			}
			
		});
		
}

</script>












<!--	<a href="/Home/Index/index">返回</a>
	<center><?php echo ($my); ?><span id='gw'><a href="/Home/Gouwuche/gouwuche">购物车(<span id='fi'><?php echo ($nums); ?></span>)</a></span></center>&nbsp;&nbsp;&nbsp;&nbsp;<br /><br />
		<?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><a href='javascript:void(0)'onclick='brandajax(<?php echo ($kk["brand_id"]); ?>);'><?php echo ($kk["brand_name"]); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<?php endforeach; endif; ?>                                                       
<br /><br />
		<div id='brand_list'>
		<div id='le'>
		<?php if(is_array($arr1)): foreach($arr1 as $key=>$v): ?><a href='javascript:void(0)'onclick='cpkajax(<?php echo ($v["model_id"]); ?>);'/><?php echo ($v["model_name"]); ?> </a><br /><br /><?php endforeach; endif; ?>
		</div>
 <br /><br />
 <div id='li'>
<?php if(is_array($arr2)): foreach($arr2 as $key=>$h): echo ($h["cpk_name"]); ?>&nbsp;&nbsp;<span><?php echo ($h["cpk_price"]); ?>元</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onclick='tjgwc(<?php echo ($h["cpk_id"]); ?>);'>+</a><br />	<br /><?php endforeach; endif; ?>
 

 </div>
 </div>-->
 
 
 
 
 
	</body>
</html>

<script type="text/javascript">

/*function cpkajax(model_id){
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Gouwuche/chanpinkuajax/model_id/"+model_id,true)
			
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('li').innerHTML=ajax.responseText
				}
			}
	}*/
function tjgwc(obj,id){
	        
			var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Gouwuche/gwc/id/"+id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('fi').innerHTML=ajax.responseText
					document.getElementById('zongre').innerHTML=ajax.responseText
					mkous()
				}
			}
			var zongrt=($(obj).prevAll('span').text())
			
	        //$("#zongre").text(zongrt)
	}
		/*function brandajax(brand_id){
			var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Gouwuche/branda/brand_id/"+brand_id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('models_lis_c').innerHTML=ajax.responseText
				}
			}
	
	}*/
</script>