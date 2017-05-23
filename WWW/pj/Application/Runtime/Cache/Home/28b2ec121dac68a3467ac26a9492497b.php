<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
<title>维百士-手机维修-价目查询</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
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
#models_lis{  height: 490px; overflow: auto;}
#models_lis_c{ height:auto;   position:relative; top:0; }



.lili_c_cv{ bottom:47px; z-index:214;}
.lili_c_ico_dv{ padding-bottom:0px !important;}
.models>.models_lis>ul> li>em{ font-style:normal;}
.nudt_1{ padding:0 10px; 
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;}
.nudt_1_l{ text-align:left;
	-webkit-box-flex: 1;
    -webkit-flex: 1;
    flex: 1;}
.nudt_1_r{ text-align:right;
	-webkit-box-flex: 1;
    -webkit-flex: 1;
    flex: 1;}
.my_bu_x{ border-bottom:1px solid #f0f0f0; }
	
</style>
</head>
<body>
<div class="header">
    <span onclick="window.history.back()"></span>
    <h1>价目查询</h1>
    
</div><!--头-->
<div class="Maskc"></div>
    <div class="content">
        <div class="product_sx_box clearfix">
            <div class="brands fl">
                <div class="title">品牌</div>
                <div class="brands_lis">
                    <ul id="cccx">
                        
                            <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k): $mod = ($i % 5 );++$i;?><li onclick='p(<?php echo ($k["brand_id"]); ?>)'>
                                    <?php echo ($k["brand_name"]); ?>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
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
    <ul>
        <li>
            <a class="on" href="tel:400-9911-906">
                <img src="../../../../Public/img/images/dbcc_1_19.png">
                <p>电话</p>
            </a>
        </li>
        <li>
            <a class="on" href="https://weibaishi.kf5.com/kchat/19026?from=%E5%9C%A8%E7%BA%BF%E6%94%AF%E6%8C%81&group=22684">
                <img src="../../../../Public/img/images/dbcc_2_19.png">
                <p>在线</p>
            </a>
        </li>
        <li>
            <a class="on" href="/Home/Index/login">
                <img src="../../../../Public/img/images/dbcc_3_19.png">
                <p>订单</p>
            </a>
        </li>	
        <li>
            <a class="on" href="/Home/Index/ksxd">
                <img src="../../../../Public/img/images/dbcc_4_19.png">
                <p>快速下单</p>
            </a>
        </li>
    </ul>
</div>
<!--nav固定-->
</body>
</html>
<script type="text/javascript">
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
	function p(id){
		document.getElementById('li').style.display='none';
		/*var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Index/jixing/brand_id/"+id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
				document.getElementById('models_lis_c').innerHTML=ajax.responseText
			}
		}*/
		
		$.ajax({
			url: "/Home/Index/jixing",
			data:{'brand_id':id},
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
	
	
	
	
function m(id){
		document.getElementById('li').style.display='block';
		/*var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Index/jiejuefangan/model_id/"+id,true)
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
				    document.getElementById('li').innerHTML=ajax.responseText
			    }
		    }*/
			
		$.ajax({
			url: "/Home/Index/jiejuefangan",
			data:{'model_id':id},
			dataType: "html",
			type:'get',
			success: function (data) {
			    $("#li").html( data);
				$("html,body").height($(window).height()).css({"overflow-y": "hidden"});
				$(".Maskc").css({'display':'block'})
				$(".lili_c_ico>p").text(skj +' 价目表')
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