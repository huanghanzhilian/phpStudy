<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-选择维修机型</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<style>
#models_lis{  height: 490px; overflow: auto;}
#models_lis_c{ height:auto;   position:relative; top:0; }
</style>
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<script type="text/javascript" src="/Public/js/iscroll.js"></script>
<script type="text/javascript" charset="utf-8"> 
/*window.onload=function(){
    console.log($(".models>.models_lis >ul").height());
	loaded1()	
} */
	$(function() {   		
		
		var lkj=$(document).height();
		var cdkd=lkj-105;
		
		$(".brands_lis,.models_lis").height(cdkd);
		
		var sid = location.search.slice(1);
		if(sid){
			$(".brands>.brands_lis ul li").eq(sid-1).click()
			$( ".brands>.brands_lis ul li" ).each(function( index,daa) {
				if($(this).hasClass('on')){
					var duanzh=$(this).position().top;
					var uyffiio=$(".brands_lis").height()
					var uyffikl=$("#cccx").height()
					var bughu=uyffiio-uyffikl;
					
					if(duanzh>uyffiio){
						$("#cccx").css("top", bughu);
					}
				}
			});
		
		}
		
		
	});


	
	/*function loaded () {
		//tcj= new IScroll('.tcj', { mouseWheel: true, click: true });
		cccx= new IScroll('.brands_lis', { mouseWheel: true, click: true });
		
	}*/
	
	/*function loaded1 () {
		models_lis= new IScroll('.models_lis', { mouseWheel: true, click: true });
		
	}*/
	//document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
	
	//document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
	
/*//初始化显示结果层的高度,iScroll渲染 
function initScroll() { 
    intervalTime = setInterval(function () { 
        var resultContentH = $(".models>.models_lis >ul").height(); 
		console.log(zhisu); 
        if (resultContentH > 0) { 
            //判断数据加载完成的条件 
            console.log("此时showResult的高度是:" + resultContentH); 
            $(".models>.models_lis").height(resultContentH); 
            setTimeout(function () {
                clearInterval(intervalTime); 
				models_lis= new IScroll('.models_lis', { mouseWheel: true, click: true });
            },100);
        } 
    }, 10);
}*/
	
	

</script>



	<style type="text/css">
	html{ height:100%;}
	    body{ height:100%; overflow:hidden;}
		#le{float:left;}
		#list{float:left;margin-left:30px;}
		#r{float:right;margin-right:30px;}
		
		.header>h1>b{ font-weight:normal; vertical-align:middle;}
	</style>
</head>
<body>
<div class="header header_a1">
     <a href="/Home/Index/index"><span></span></a><a class="dianko_r" href="tel:400-9911-906"></a>
    <h1><em class="top_ico"></em><b>选择维修机型</b></h1>
    
</div>
<div class="progressd progressd1">
    <i></i><i></i><i></i><i></i>
    <div class="yansheng_a"></div>
</div>

<div class="content">
<span style="display:none;" id='r'></span>
<center style="display:none;"><br /><br /></center>



    
   <?php if(strtoupper ($tu == 1)): ?><div class="product_sx_box  clearfix">
        <div class="brands fl">
            <div class="title">品牌</div>
            <div class="brands_lis" id="brands_lis_c">
                <ul id="cccx">
                    
                    
                        <?php if(is_array($arr3)): foreach($arr3 as $key=>$kk): ?><li id='u' onclick='ajaxppp(<?php echo ($kk["brand_id"]); ?>);' ><?php echo ($kk["brand_name"]); ?></li><?php endforeach; endif; ?>
						<input type="hidden" id='gid' name="gid" value='<?php echo ($id); ?>'>
                </ul>
            </div>
        </div><!-- 品牌 -->
        <div class="models fr">
            <div class="title">型号</div>
            <div class="models_lis" id="models_lis">
                <ul id="models_lis_c">
                        <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li><!--<span><i></i><em></em></span>--><b></b><?php echo ($kk["model_name"]); ?>
                            <ul>
                             <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><li>
                                    <a href="/Home/Index/wenti/model_id/<?php echo ($kk["model_id"]); ?>/color_id/<?php echo ($ee["color_id"]); ?>/id/<?php echo ($id); ?>"><?php echo ($ee["color_name"]); ?></a>
                                    </li><?php endforeach; endif; ?> 
                            </ul>
                            </li><?php endforeach; endif; ?>
                </ul>
            </div>
        </div><!--型号-->
    </div>                           
  <?php else: ?>
          <div class="product_sx_box product_sx_box_api_1 clearfix ">
        <div class="brands fl">
            <div class="title">品牌</div>
            <div class="brands_lis" id="brands_lis_c">
                <ul id="cccx">
                    
                    
                        <?php if(is_array($arr3)): foreach($arr3 as $key=>$kk): ?><li id='u' onclick='ajaxpp(<?php echo ($kk["brand_id"]); ?>);' ><?php echo ($kk["brand_name"]); ?></li><?php endforeach; endif; ?>
                </ul>
            </div>
        </div><!-- 品牌 -->
        <div class="models fr">
            <div class="title">型号<span><a href="http://m.weibaishi.com/search"><em></em>搜索</a></span></div>
            <div class="models_lis" id="models_lis">
                <ul id="models_lis_c">
                        <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li><!--<span><i></i><em></em></span>--><b></b><?php echo ($kk["model_name"]); ?>
                            <ul>
                             <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><li>
                                    <a href="http://m.weibaishi.com/model/<?php echo ($kk["model_id"]); ?>/<?php echo ($ee["color_id"]); ?>"><?php echo ($ee["color_name"]); ?></a>
                                    </li><?php endforeach; endif; ?> 
                            </ul>
                            </li><?php endforeach; endif; ?>
                </ul>
            </div>
        </div><!--型号-->
    </div><?php endif; ?>






</div>
    
</div>
<div class="Maskc1"></div>
</body>
</html>
<script type="text/javascript">
       function fengcorel(){
		   $('.brands_lis').unbind("touchstart");
		   $('.brands_lis').unbind("touchmove");
		   $('.brands_lis').unbind("touchend");
		  //$("#cccx").css("top", '0px');
            var start_x, start_y, end_x, end_y, move_num;
            var aboveY=0; // 设一个全局变量记录上一次内部块滑动的位置
			var uyiio=$(".brands_lis").height()/2;
          var documentHeight1=$("#cccx").height()+uyiio;
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
				console.log(aboveY);
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
		  //$("#models_lis_c").css("top", '0px');
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
	function ajaxpp(brand_id){
		
		
         //loaded ()
		/*//alert(brand_id)
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Index/ajaxp/brand_id/"+brand_id,true)
			//alert(brand_id);
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('list').innerHTML=ajax.responseText
				}
				
				$(".header>h1").ajaxStart(function(){ 
					$(this).html("正在请求数据...");
				});
				$(".header>h1").ajaxStop(function(){
					$(this).html("数据请求完成！");
				});
				
				
				
				
		    $(".models>.models_lis>#list >ul> li").click(function(){
				if($(this).hasClass('on')){
					$(this).removeClass('on')
				}else{
				$(this).addClass('on').siblings().removeClass('on');
				};
			});
			
			
			} */
			
			
			    $("body").ajaxStart(function(){ 
                    $(this).append('<div class="jztp"><img src="/Public/img/jz.gif"/></div>');
					$(".Maskc1").show();
					$(".models>.models_lis>ul> li").remove();
                });
                $("body").ajaxStop(function(){
                    $(".jztp").remove();
					$(".Maskc1").hide();
                });
                
                    var $this = $(this);
                    $.ajax({
                        url: "/Home/Index/ajaxp",
						data:{'brand_id':brand_id},
                        dataType: "html",
						type:'get',
                        success: function (data) {
                            //$this.attr("disabled", "true");
                        $(".models>.models_lis>ul").html( data);
							fengcore()
							$(".models>.models_lis>ul> li").click(function(){
								
								if($(this).hasClass('on')){
									$(this).removeClass('on')
									$(this).find('b').css({'background-color':'#e6e6e6'})
								}else{
								$(this).addClass('on').siblings().removeClass('on').find('b').css({'background-color':'#e6e6e6'});
								$(this).find('b').css({'background-color':'#3e7edb'})
								//loaded1()
								};
								
								
								
							});
							
							$( ".models>.models_lis>ul> li" ).each(function( index ) {
							    $(this).find('b').text(index+1)
							});

							
							
						}
						
                    });	
					
					
	}
	function ajaxppp(brand_id){
		
		
         //loaded ()
		/*//alert(brand_id)
		var ajax=new XMLHttpRequest()
			ajax.open("get","/Home/Index/ajaxp/brand_id/"+brand_id,true)
			//alert(brand_id);
			ajax.send()
			ajax.onreadystatechange=function(){
				if(ajax.readyState==4 && ajax.status==200){
					document.getElementById('list').innerHTML=ajax.responseText
				}
				
				$(".header>h1").ajaxStart(function(){ 
					$(this).html("正在请求数据...");
				});
				$(".header>h1").ajaxStop(function(){
					$(this).html("数据请求完成！");
				});
				
				
				
				
		    $(".models>.models_lis>#list >ul> li").click(function(){
				if($(this).hasClass('on')){
					$(this).removeClass('on')
				}else{
				$(this).addClass('on').siblings().removeClass('on');
				};
			});
			
			
			} */
				var id=document.getElementById("gid").value; 
			
			    $("body").ajaxStart(function(){ 
                    $(this).append('<div class="jztp"><img src="/Public/img/jz.gif"/></div>');
					$(".Maskc1").show();
					$(".models>.models_lis>ul> li").remove();
                });
                $("body").ajaxStop(function(){
                    $(".jztp").remove();
					$(".Maskc1").hide();
                });
                
                    var $this = $(this);
                    $.ajax({
                        url: "/Home/Index/ajaxp",
						data:{'brand_id':brand_id,'id':id},
                        dataType: "html",
						type:'get',
                        success: function (data) {
                            //$this.attr("disabled", "true");
                        $(".models>.models_lis>ul").html( data);
							fengcore()
							$(".models>.models_lis>ul> li").click(function(){
								
								if($(this).hasClass('on')){
									$(this).removeClass('on')
									$(this).find('b').css({'background-color':'#e6e6e6'})
								}else{
								$(this).addClass('on').siblings().removeClass('on').find('b').css({'background-color':'#e6e6e6'});
								$(this).find('b').css({'background-color':'#3e7edb'})
								//loaded1()
								};
								
								
								
							});
							
							$( ".models>.models_lis>ul> li" ).each(function( index ) {
							    $(this).find('b').text(index+1)
							});

							
							
						}
						
                    });	
					
					
	}
</script>

<!--<script>
$(function(){
function huazj(){ 
            var start_x, start_y, end_x, end_y, move_num;
            var aboveY=0; // 设一个全局变量记录上一次内部块滑动的位置
          documentHeight=$("#models_lis_c").height();//内部滑动模块的高度
          wapperHeight=$("#models_lis").height(); //外部框架的高度
          console.log(documentHeight);
		  console.log(wapperHeight);

         var inner=document.getElementById("models_lis_c");  
			
			$("#models_lis").on("touchstart", function(e) {
			   // e.preventDefault();
				start_Y = e.originalEvent.targetTouches[0].clientY;
			});

			
			$("#models_lis").on("touchmove", function(e) {
				//e.preventDefault();
				end_y = e.originalEvent.targetTouches[0].clientY;
				move_num = parseInt(end_y - start_Y)//.toFixed(0);
				console.log(move_num);
				var tf_num = parseInt(move_num+aboveY)
				
				$("#models_lis_c").css("top", tf_num+'px');
		
			}); 
			
			

      
             
			$("#models_lis").on("touchend", function() {
                aboveY=$('#models_lis_c').position().top;  //touch结束后记录内部滑块滑动的位置 在全局变量中体现 一定要用parseInt()将其转化为整数字;
				console.log(aboveY);
				if(move_num>0&&aboveY>0),200);
                       aboveY=0;
                    } 
                  
                  if(move_num<0&&(aboveY<(-(documentHeight-wapperHeight)))),200);
                     aboveY=-(documentHeight-wapperHeight);
					 
                  } 
		  });

	}
	huazj()
})
</script>-->