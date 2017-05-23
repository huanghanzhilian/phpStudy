<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>维百士-工程师-用户评价</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="format-detection" content="telephone=no" />
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<style>
/*320px布局*/
html{font-size: 100px;}
body{ font-size: 0.12rem;/*实际相当于12px*/ }

/* iphone 6 */
@media (min-device-width : 375px) and (max-device-width : 667px) and (-webkit-min-device-pixel-ratio : 2){
    html{font-size: 117.1875px;}
}
/* iphone6 plus */
@media (min-device-width : 414px) and (max-device-width : 736px) and (-webkit-min-device-pixel-ratio : 3){
    html{font-size: 129.375px; }
}


/*服务评价*/
.pingjcrt_top{ background:#fff; border-bottom:1px solid #e5e5e5; margin-bottom:12px;}
.pingjcrt_top>ul{ padding:0 12px; }
.pingjcrt_top>ul>li{ border-bottom: 1px solid #e5e5e5; color:#808080; line-height:35px;}
.pingjcrt_top>ul>li span{ color:#4c4c4c; vertical-align:middle; display:inline-block;}
.imgdds{ width:40px; height:40px; border-radius: 100%; vertical-align:middle; margin:4px;}
.pj_daix{ text-align:center; line-height:60px;}
.pj_daix span{ width:35px; height:35px; display:inline-block; background:url(../../../../Public/img/shifu_duan/mubercta_3.png) -220px -220px no-repeat; background-size:750px; vertical-align: middle; margin:0 7px;}
.pj_daix span.on{ background-position: -174px -220px;}
#huikkp{ font-size:15px; color:#4c4c4c; text-align:center; line-height:28px; display:block; font-weight:normal; margin-bottom:10px;}
.pingjcrt_top>ul>li span.gc_nazc{ vertical-align:middle; color:#808080;}
.taidu_box{ padding-bottom:15px;}
.taidu_box span{ height:28px; display:inline-block; border:1px solid #e5e5e5; border-radius: 4px; padding:0 15px; line-height:28px; color:#808080; margin:15px 15px 0px 0;}
.taidu_box span.on{ border-color:#3e7edb; color:#3e7edb;}
.but_tijia{ height:45px; background:#3e7edb; position:fixed; bottom:0px; width:100%;}
.but_tijia_com{ padding:0 12px; line-height:45px;}
.trxt_nnm{ width:75%; background:#fff; height:32px; line-height:32px; border-radius: 4px; text-indent:10px; vertical-align:middle;}
.anniu_nnm{ width:20%;  background:#fff; height:32px; line-height:32px; color:#3e7edb; border-radius: 4px; vertical-align:middle; margin-top:8px;}
.tijfscc_a,.tijfscc{ display:none;}
/*服务评价*/


/*显示评价*/
.hundi_li{ background:#f5f5f5; height:50px; line-height:50px; }
.nubby_kp{ height:100%; line-height:50px; width:100px; text-align:right; padding-right:12px;}
.nubby_kp b{ font-weight:normal; color:#ff7e00; margin-left:2px; vertical-align:middle; }
.nubby_kp span{ background-image:url(../../../../Public/img/shifu_duan/mubercta_3_0p.png); margin-top:-5px;}
.my_evaluate_list_top_2{ background:none; border-bottom: 1px solid #e5e5e5;}
.heing2{ background:red; height:15px; border-bottom:1px solid #e5e5e5; border-top:1px solid #e5e5e5; background:#f0f0f0; margin-bottom:15px;}

.shuaxin{ position:fixed;  bottom:0px; width:100%; height:50px; line-height:50px; text-align:center; color:#808080; font-size:16px;}


.shuaxin>span{ margin-right:10px; background:red; width:40px; height:40px; display:inline-block; background:url(../../../../Public/img/pull-icon2x.png) center -40px no-repeat; background-size:40px 80px; vertical-align:middle; 
animation:music_disc 3s linear infinite;
-webkit-animation:music_disc 3s linear infinite;
-moz-animation:music_disc 3s linear infinite;
-ms-animation:music_disc 3s linear infinite;
-o-animation:music_disc 3s linear infinite;
}
@-o-keyframes music_disc{
	0%{
	-webkit-transform:rotate(0deg);
	-moz-transform:rotate(0deg);
	-ms-transform:rotate(0deg);
	-o-transform:rotate(0deg);
	}
	100%{
	-webkit-transform:rotate(360deg);
	-moz-transform:rotate(360deg);
	-ms-transform:rotate(360deg);
	-o-transform:rotate(360deg);
	}
}
@-webkit-keyframes music_disc{
	0%{
	-webkit-transform:rotate(0deg);
	-moz-transform:rotate(0deg);
	-ms-transform:rotate(0deg);
	-o-transform:rotate(0deg);
	}
	100%{
	-webkit-transform:rotate(360deg);
	-moz-transform:rotate(360deg);
	-ms-transform:rotate(360deg);
	-o-transform:rotate(360deg);
	}
}
@keyframes music_disc{
	0%{
	-webkit-transform:rotate(0deg);
	-moz-transform:rotate(0deg);
	-ms-transform:rotate(0deg);
	-o-transform:rotate(0deg);
	}
	100%{
	-webkit-transform:rotate(360deg);
	-moz-transform:rotate(360deg);
	-ms-transform:rotate(360deg);
	-o-transform:rotate(360deg);
	}
}

</style>
<script type="text/javascript">
$(function(){
	
	var chenggl= parseFloat($("#chenggl").attr('data'))
	var chenggl2=chenggl.toFixed(2)
	
	var fenshu= parseFloat($("#fenshu").attr('data'))
	var fenshu2=fenshu.toFixed(2)
	
	//console.log(fenshu2);
	$("#fenshu").text(fenshu2)
	$("#chenggl").text(chenggl2+'%')
	
	
	
	
	
	
	
	
	
	
	
	
	//$(".taidu_box span").click(function(){
		//$(this).prev('input').attr("checked",true);
			$( ".xingjinu" ).each(function(ing,suop){
			    var punnl= $(this).attr('data');
				$(this).find('span').eq(punnl).addClass('on').prevAll('span').addClass('on')
			    //console.log(punnl);
			})
			
			/*if($(this).attr('data')==punnl){
				$(this).addClass('on').prevAll('span').addClass('on')
			}else{
				//$(this).nextAll('span').removeClass('on')
			}*/
			
			
			$( ".chundup" ).each(function(ing,suop){
			    var chundupn= $(this).attr('data');
				//$(this).find('span').eq(punnl).addClass('on').prevAll('span').addClass('on')
				var wsfgf= chundupn.split(",");
			   // console.log(wsfgf);
				var mmb1=wsfgf[0]
		        var mmb2=wsfgf[1]
		        var mmb3=wsfgf[2]
				var mmb4=wsfgf[3]
				$( ".pingjiaxp>span" ).each(function(){
					//var pucl= $("#xingjinu").attr('data')
					if($(this).attr('data')==mmb1||$(this).attr('data')==mmb2||$(this).attr('data')==mmb3||$(this).attr('data')==mmb4){
						$(this).siblings('span').remove();
					}else{
						//$(this).nextAll('span').removeClass('on')
					}
				})
						
			})
			
			
			
		/*var chuanz=$("#buttcur").text();
		var wsfgf= chuanz.split(",");
		
		var mmb1=wsfgf[0]
		var mmb2=wsfgf[1]
		var mmb3=wsfgf[2]
		//console.log(mmb1);
		//console.log(wsfgf);
		
		$( ".pingjiaxp>span" ).each(function(){
			//var pucl= $("#xingjinu").attr('data')
			if($(this).attr('data')==mmb1||$(this).attr('data')==mmb2||$(this).attr('data')==mmb3){
				$(this).siblings('span').remove();
			}else{
				//$(this).nextAll('span').removeClass('on')
			}
		})*/
		
		
		
	//})
	
	/*$(".pj_daix>span").click(function(){
		$(this).prev('input').attr("checked",true);
		var selValue = $(this).index();
		
	    $( ".tijfscc_a" ).each(function(index){
			if($(this).attr('checked')){
				$(".pj_daix span").eq(index).addClass('on').prevAll('span').addClass('on')
				$(".pj_daix span").eq(index).addClass('on').nextAll('span').removeClass('on')
				var ccl=$(this).attr('data');
				$("#huikkp").text(ccl)
			}
			
		})
		
	})
	*/
	$( ".kehu_name" ).each(function(ing,suop){
	    var kehu_name=$(this).text()
		var kehu_chuli= kehu_name.split("");
	   // console.log(kehu_chuli);
		$(this).text(kehu_chuli[0]+"**")
	})
	
	
	$( ".xiang_list" ).each(function(ingc,suopc){
		if(ingc>=3){
			$(this).hide()
		}
	})
	var ppnb=3
	function oopui(){
		$(".shuaxin").remove();
		ppnb+=3
		$( ".xiang_list" ).each(function(ingc,suopc){
			if(ingc<=ppnb){
				$(this).show()
			}
		})
	}
	
	
	$(window).scroll(function(){
       var top=$(window).scrollTop();                     //top等于窗口滚动与顶部的距离
	   var ym_h=$(window).height()
	   var ppl=top+ym_h
	   var ym_hd=$("body").height()
	   console.log(ppl);
	   if(ppl>=ym_hd){
		   $(window.document.body).append('<div class="shuaxin"><span></span>加载中...</div>');
		   setTimeout(oopui,2000);
		   
	   }
	   /*if (top !=0){
	       alert(1)
	   }else{
		   $(".pc-head").removeClass('oncel')
		   $(".pc-banner").removeClass('pc-banner_c')
	   }
	   var dlm2=$("#dlm2").height()/2;
	   var dlm3=$("#dlm3").height()/2;
	   var dlm4=$("#dlm4").height()/2;
	   var dlm5=$("#dlm5").height()/2;
	   if (top >= $("#dlm2").offset().top - ym_h+dlm2){
		   $("#dlm2").addClass('gundu_a')
	   }
	   if (top >= $("#dlm3").offset().top - ym_h+dlm3){
		   $("#dlm3").addClass('gundu_a')
	   }
	   if (top >= $("#dlm4").offset().top - ym_h+dlm4){
		   $("#dlm4").addClass('gundu_a')
	   }
	   if (top >= $("#dlm5").offset().top - ym_h+dlm5){
		   $("#dlm5").addClass('gundu_a')
	   }*/
	   
	   
	   //console.log(dlm2);
   })
	//console.log($(".xiang_list").length)
	
})
</script>
</head>

<div class="header">
   <a href="/Home/Index/index"><span></span></a>
    <h1>用户评价</h1>
</div><!--头-->

<div class="content">
    <div class="content_con">
    
    
    
    
        
        
            
        <div class="my_evaluate_com">
            <?php if(is_array($arr9)): foreach($arr9 as $key=>$k): ?><div class="xiang_list">
                <div class="my_evaluate_nnu_list">
                    <div class="my_evaluate_list_top my_evaluate_list_top_2">
                        
                        <div class="pingjir fl">
                            <!--<?php echo ($k["pjx"]); ?>-->
                            <span class="name_mypj kehu_name"><?php echo ($k["yonghuname"]); ?></span>
                            <span>
							<?php if(strtoupper($k['ways_id']) == 1): ?>上门维修
							<?php elseif(strtoupper($k['ways_id']) == 2): ?> 
								 到店维修
							<?php elseif(strtoupper($k['ways_id']) == 3): ?> 
								 全国邮寄
							 <?php else: endif; ?>
							
							
							
							</span>
                            <span><?php echo ($k["time"]); ?></span>
                        </div>
                        <div class="xingji fr xingjinu" data='<?php echo ($k["pjx"]); ?>'>
                            <span data="1"></span><span data="2"></span><span data="3"></span><span data="4"></span><span data="5"></span>
                        </div>
                    </div><!--内容头-->
                    
                    <!--<div id="buttcur"><?php echo ($k["pingjiaa"]); ?></div>-->
                    
                        <div class="my_evaluate_list_mmuo">
                            <ul class="chundup" data="<?php echo ($k["pingjiaa"]); ?>">
                                <li>
                                 <?php echo ($k["pingjiacontent"]); ?>
                                </li>
                                <li>
                                <?php if(strtoupper($k['ways_id']) == 1): ?><div class="pingjiaxp">
                                        <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><p><?php echo ($kk["ping_name"]); ?></p>
                                            <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><span data="<?php echo ($ee["pingjia_id"]); ?>"><?php echo ($ee["pingjia_name"]); ?></span><?php endforeach; endif; endforeach; endif; ?> 
                                    </div>
                                    
                                    <div class="pingjiaxp">
                                        <?php if(is_array($arr1)): foreach($arr1 as $key=>$kk): ?><p><?php echo ($kk["ping_name"]); ?></p>
                                            <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><span data="<?php echo ($ee["pingjia_id"]); ?>"><?php echo ($ee["pingjia_name"]); ?></span><?php endforeach; endif; endforeach; endif; ?> 
                                    </div>
                                    
                                    
                                    <div class="pingjiaxp">
                                        <?php if(is_array($arr2)): foreach($arr2 as $key=>$kk): ?><p><?php echo ($kk["ping_name"]); ?></p>
                                            <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><span data="<?php echo ($ee["pingjia_id"]); ?>"><?php echo ($ee["pingjia_name"]); ?></span><?php endforeach; endif; endforeach; endif; ?> 
                                    </div>
                                    
                                    
                                   <div class="pingjiaxp">
                                        <?php if(is_array($arr3)): foreach($arr3 as $key=>$kk): ?><p><?php echo ($kk["ping_name"]); ?></p>
                                            <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><span data="<?php echo ($ee["pingjia_id"]); ?>"><?php echo ($ee["pingjia_name"]); ?></span><?php endforeach; endif; endforeach; endif; ?> 
                                    </div>
                                    
                                    
                                <?php elseif(strtoupper($k['ways_id']) == 2): ?> 
                                    <div class="pingjiaxp">
                                        <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><p><?php echo ($kk["ping_name"]); ?></p>
                                            <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><span data="<?php echo ($ee["pingjia_id"]); ?>"><?php echo ($ee["pingjia_name"]); ?></span><?php endforeach; endif; endforeach; endif; ?> 
                                    </div>
                                    
                                    
                                   <div class="pingjiaxp">
                                        <?php if(is_array($arr2)): foreach($arr2 as $key=>$kk): ?><p><?php echo ($kk["ping_name"]); ?></p>
                                            <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><span data="<?php echo ($ee["pingjia_id"]); ?>"><?php echo ($ee["pingjia_name"]); ?></span><?php endforeach; endif; endforeach; endif; ?> 
                                   </div>
                                   
                                <?php elseif(strtoupper($k['ways_id']) == 3): ?> 
                                    <div class="pingjiaxp">
                                        <?php if(is_array($arr4)): foreach($arr4 as $key=>$kk): ?><p><?php echo ($kk["ping_name"]); ?></p>
                                            <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><span data="<?php echo ($ee["pingjia_id"]); ?>"><?php echo ($ee["pingjia_name"]); ?></span><?php endforeach; endif; endforeach; endif; ?> 
                                    </div>
                                    
                                    <div class="pingjiaxp">
                                        <?php if(is_array($arr5)): foreach($arr5 as $key=>$kk): ?><p><?php echo ($kk["ping_name"]); ?></p>
                                            <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><span data="<?php echo ($ee["pingjia_id"]); ?>"><?php echo ($ee["pingjia_name"]); ?></span><?php endforeach; endif; endforeach; endif; ?> 
                                    </div>
                                  
                                   <div class="pingjiaxp">
                                        <?php if(is_array($arr6)): foreach($arr6 as $key=>$kk): ?><p><?php echo ($kk["ping_name"]); ?></p>
                                            <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><span data="<?php echo ($ee["pingjia_id"]); ?>" class="nubbr"><?php echo ($ee["pingjia_name"]); ?></span><?php endforeach; endif; endforeach; endif; ?> 
                                   </div><?php endif; ?>
                              </li>
                              <li>
                                <div class="xinghh">
                                    <span>设备：</span><span><?php echo ($k["model_name"]); ?></span>
                                </div>
                                <div class="xinghh">
                                    <span>故障：</span><span><?php echo ($k["wenti"]); ?></span>
                                </div>
                             </li>
                              
                          </ul>
                      </div>
                </div>
                <div class="hundi_li">
                     <!-- <div class="xingji nubby_kp fr">
                         <span></span><b><?php echo ($k["pjx"]); ?></b>
                     </div> -->
				     <img class="imgdds" src="/Public/<?php echo ($k["img"]); ?>" width=50 height=50 />
                     <span class="gc_nazc">工程师：</span><span class="gc_name"><?php echo ($k["user_username"]); ?></span>
                     
                 </div>
                 <div class="heing2"></div>
                </div><?php endforeach; endif; ?>         
        </div>
        
    </div>
</div>
</body>
</html>