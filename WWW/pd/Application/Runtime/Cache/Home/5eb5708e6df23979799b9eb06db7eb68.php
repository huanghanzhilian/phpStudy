<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
<title>维百士-手机维修-服务评价</title>
<meta name="description" content="维百士-专注于手机维修行业的O2O服务类平台。为您提供一键下单、网上诊断、透明报价、免费上门、免费检测、邮寄维修、免费质保等服务方案。半小时快速换屏、全程录像更安心、价格更透明，维百士官网">
<meta name="Keywords" content="维百士,苹果手机维修,iPhone维修,电脑维修,数码维修,手机上门维修">
<link rel="shortcut icon" href="/Public/img/ioc/16.ico" type="images/x-icon"/>
<link rel="icon" href="/Public/img/ioc/16.png" type="images/png"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<meta name="format-detection" content="telephone=no" />
<link href="/Public/styles/style.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<style>
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
</style>
<script type="text/javascript">
$(function(){
	$(".taidu_box span").click(function(){
		$(this).prev('input').attr("checked",true);
		$( ".tijfscc" ).each(function(){
			if($(this).attr('checked')){
				$(this).nextAll('span').addClass('on')
			}else{
				$(this).nextAll('span').removeClass('on')
			}
		})
	})
	
	$(".pj_daix>span").click(function(){
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
	
	    
	
})
function Checked(){
	var nnmuo=$("input.tijfscc_a[type='radio'][checked]").length
	if(nnmuo<1){
		alert('您还没有对本次消费打分')
		return false;
	}
	var nnmuo=$("input.tijfscc[type='radio'][checked]").length
	var taidu_box_l=$(".taidu_box").length
	if(nnmuo<taidu_box_l){
		alert('您还没有对工程师打分')
		return false;
	}
    var tutle_n=$("#tiao_text").val();
    if(tutle_n =='' || tutle_n == null){
		$("#tiao_text").focus().addClass("tips");
		return false;
	}
	return true;
}
</script>
</head>
<body style="background:#eee;">
<div class="header">
    <span onclick="window.history.back()"></span>
    <h1>服务评价</h1>
    
</div><!--头-->
<div class="content">
    <div class="content_con">
    <form method="post" action="/Home/Index/padd" onSubmit="return Checked();">
	<input type="hidden" name="k_userid" value='<?php echo ($k_userid); ?>'>
        <div class="pingjcrt_top">
            <ul>
                <li>
				
                    <span class="gc_nazc">工程师：</span><img class="imgdds" src="/Public/<?php echo ($avatar); ?>"><span class="gc_name"></span>
                </li>
                <li>
                    机型：<span><?php echo ($modelname); ?></span>
                </li>
                <li>
                    问题：<span><?php if(is_array($question_name)): foreach($question_name as $key=>$k): echo ($k["question_name"]); ?>&nbsp;<?php endforeach; endif; ?> </span>
                </li>
                <div class="pj_daix">
					
                    <input class="tijfscc_a" data="非常差" type="radio" name="pingjia_l" value='0'>
                    <span></span>
                    <input class="tijfscc_a" data="很差" type="radio" name="pingjia_l" value='1'>
                    <span></span>
                    <input class="tijfscc_a" data="一般" type="radio" name="pingjia_l" value='2'>
                    <span></span>
                    <input class="tijfscc_a" data="很好" type="radio" name="pingjia_l" value='3'>
                    <span></span>
                    <input class="tijfscc_a" data="非常好" type="radio" name="pingjia_l" value='4'>
                    <span></span>
                </div>
                <strong id="huikkp">满意</strong>
            </ul>
        </div>
        
        <div class="pingjcrt_top">
            <ul>
                <?php if(is_array($arr)): foreach($arr as $key=>$kk): ?><li>
                        <span><?php echo ($kk["ping_name"]); ?></span>
                    </li>
                    <div class="taidu_box">
                        <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><input class="tijfscc" type="radio" name="pingjia_1" value='<?php echo ($ee["pingjia_id"]); ?>'>
                            <span><?php echo ($ee["pingjia_name"]); ?></span><?php endforeach; endif; ?> 
                    </div><?php endforeach; endif; ?> 
            </ul>
        </div>
        
        
        <div class="pingjcrt_top">
            <ul>
                <?php if(is_array($arr1)): foreach($arr1 as $key=>$kk): ?><li>
                        <span><?php echo ($kk["ping_name"]); ?></span>
                    </li>
                    <div class="taidu_box">
                        <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><input class="tijfscc" type="radio" name="pingjia_2" value='<?php echo ($ee["pingjia_id"]); ?>'>
                            <span><?php echo ($ee["pingjia_name"]); ?></span><?php endforeach; endif; ?> 
                    </div><?php endforeach; endif; ?> 
            </ul>
        </div>

        <div class="pingjcrt_top">
            <ul>
                <?php if(is_array($arr2)): foreach($arr2 as $key=>$kk): ?><li>
                        <span><?php echo ($kk["ping_name"]); ?></span>
                    </li>
                    <div class="taidu_box">
                        <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><input class="tijfscc" type="radio" name="pingjia_3" value='<?php echo ($ee["pingjia_id"]); ?>'>
                            <span><?php echo ($ee["pingjia_name"]); ?></span><?php endforeach; endif; ?> 
                    </div><?php endforeach; endif; ?> 
            </ul>
        </div>
        
        <div class="pingjcrt_top">
            <ul>
                <?php if(is_array($arr3)): foreach($arr3 as $key=>$kk): ?><li>
                        <span><?php echo ($kk["ping_name"]); ?></span>
                    </li>
                    <div class="taidu_box">
                        <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><input class="tijfscc" type="radio" name="pingjia_4" value='<?php echo ($ee["pingjia_id"]); ?>'>
                            <span><?php echo ($ee["pingjia_name"]); ?></span><?php endforeach; endif; ?> 
                    </div><?php endforeach; endif; ?> 
            </ul>
        </div>
        

		<!--<?php if(is_array($arr)): foreach($arr as $key=>$kk): echo ($kk["ping_name"]); ?> <br /> <br />      
              <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><input type="radio" name="pingjia_1" value='<?php echo ($ee["pingjia_id"]); ?>'><?php echo ($ee["pingjia_name"]); ?>   <br /><?php endforeach; endif; endforeach; endif; ?> 
			
			
			<?php if(is_array($arr1)): foreach($arr1 as $key=>$kk): echo ($kk["ping_name"]); ?>  <br /> <br />          
              <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><input type="radio" name="pingjia_2" value='<?php echo ($ee["pingjia_id"]); ?>'><?php echo ($ee["pingjia_name"]); ?>   <br /><?php endforeach; endif; endforeach; endif; ?><br /> <br />  
			
			
			<?php if(is_array($arr2)): foreach($arr2 as $key=>$kk): echo ($kk["ping_name"]); ?>    <br /> <br />        
              <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><input type="radio" name="pingjia_3" value='<?php echo ($ee["pingjia_id"]); ?>'><?php echo ($ee["pingjia_name"]); ?>    <br /><?php endforeach; endif; endforeach; endif; ?><br /> <br />  
			
			
			<?php if(is_array($arr3)): foreach($arr3 as $key=>$kk): echo ($kk["ping_name"]); ?>   <br /> <br />         
              <?php if(is_array($kk['data'])): foreach($kk['data'] as $key=>$ee): ?><input type="radio" name="pingjia_4" value='<?php echo ($ee["pingjia_id"]); ?>'><?php echo ($ee["pingjia_name"]); ?>    <br /><?php endforeach; endif; endforeach; endif; ?> <br /> -->
            
            
			<input type="hidden" name="goods_id" value='<?php echo ($id); ?>'>
			<input type="hidden" name="user_id" value='<?php echo ($user_id); ?>'>
		<div class="but_tijia">
            <div class="but_tijia_com">
                <input class="trxt_nnm" id="tiao_text" type="text" name="pingjiacontent" placeholder="点此可留言给我们" /> 
		        <input class="anniu_nnm fr" type="submit" value='提交评价'>
            </div>
        </div>
	</form>


    </div>
</div>
</body>
</html>