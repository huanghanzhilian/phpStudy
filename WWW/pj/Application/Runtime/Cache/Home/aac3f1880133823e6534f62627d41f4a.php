<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>维百士-工程师-我的评价</title>
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
			    console.log(wsfgf);
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
	    
	
})
</script>
</head>

<body>
<div class="header">
   <a href="/Home/Shifu/index"><span></span></a>
    <h1>我的评价</h1>
</div><!--头-->

<div class="content">
    <div class="content_con">
    
    
    
    
        <div class="my_evaluate_top">
            <div class="my_evaluate_top_com">
                <img src="/Public/<?php echo ($avatar); ?>" width=50 height=50 />
                <span class="prohgf">
                    <strong><?php echo ($user_username); ?></strong>
                    <em></em>
                </span>
            </div>
        </div> 
        
        
           
        <div class="combutut_box_top_con pubcvt obbvm">
            <li class="pubcvt_v">
                 <span id="chenggl" data="<?php echo ($lv); ?>">100%</span>
                <p>维修成功率</p>
            </li>
            <li class="pubcvt_v">
               <span data="<?php echo ($xingji); ?>" id="fenshu"><?php echo ($xingji); ?></span>
                <p>平均评分</p>
            </li>
            <li class="pubcvt_v">
                <span>--</span>
                <p>售后率</p>
            </li>
        </div>
        
        
            
        <div class="my_evaluate_com">
            <?php if(is_array($arr9)): foreach($arr9 as $key=>$k): ?><div class="my_evaluate_nnu_list">
                    <div class="my_evaluate_list_top">
                        
                        <div class="pingjir fl">
                            <!--<?php echo ($k["pjx"]); ?>-->
                            <span class="name_mypj"><?php echo ($k["yonghuname"]); ?></span>
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
                </div><?php endforeach; endif; ?>         
        </div>
        
    </div>
</div>
</body>
</html>