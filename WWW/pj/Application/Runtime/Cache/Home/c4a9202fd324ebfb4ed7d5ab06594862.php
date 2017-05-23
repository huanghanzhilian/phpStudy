<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>维百士-工程师-新订单</title>
<link rel="shortcut icon" href="/Public/img/ioc/16.ioc"><!--图标-->
<link rel="icon" href="/Public/img/ioc/16.png"><!--图标-->
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link href="/Public/styles/style_jiem.css" rel="stylesheet" type="text/css">
<link href="/Public/styles/public.css" rel="stylesheet" type="text/css">
<script src="/Public/js/jquery-1.7.1.min.js"></script>
<script src="/Public/js/script.js"></script>
<style>
.inde_hbre {
	background-color: #3e7edb; display: inline-block; min-width: 9px; height: 15px; line-height: 15px; padding:0 4px; border-radius: 3px; color:#fff; font-weight:normal; margin-right:12px;
}
</style>
</head>
<body style="background:#f5f5f5">
<div class="header header1">
    <span class="shuaxin" onClick="reloadPage()">刷新</span>
    <h1>新订单<!--<?php echo ($my); ?>--></h1>
    <em class="lsycrd"><a href="/Home/Shifu/shifu_map">订单地图</a></em>
</div><!--头-->
<div class="content">
    <div class="content_con">
       <!-- 
        <div class="shifudu_top">
            <ul class="pubcvt shifudu_top_ul">
                <li class="pubcvt_v shifudu_top_li shifudu_top_li_1">
                    <a href="/Home/Shifu/shifu">待接单<span>(<?php echo ($nums1); ?>)</span></a>
                </li>
                <li class="pubcvt_v shifudu_top_li">
                    <a href="/Home/Shifu/daiwancheng">进行中<span>(<?php echo ($nums2); ?>)</span></a>
                </li>
                <li class="pubcvt_v shifudu_top_li">
                    <a href="/Home/Shifu/yiwancheng">待评价<span>(<?php echo ($nums3); ?>)</span></a>
                </li>
            </ul>
        </div>
        -->
        <!--内容-->
        <div class="ceomer_com">
            <?php if(is_array($arr)): foreach($arr as $key=>$vv): ?><a class="shifu_aclc" href="/Home/Shifu/shifuxiangqing/id/<?php echo ($vv["id"]); ?>">
                    <div class="rnmbur">
                        <ul>
                            <li>
                                 方式：<span class="chuangmbr">
                                          <?php if(strtoupper($vv['ways_id']) == 1): ?>上门服务
                                             <?php elseif(strtoupper($vv['ways_id']) == 2): ?> 
                                             到店服务
                                             <?php elseif(strtoupper($vv['ways_id']) == 3): ?>
                                             寄修服务<?php endif; ?>
                                      </span>
                                      <span class="bimnb fr"><?php echo ($vv["ddh"]); ?></span>
                            </li>
                            <li>
                                 时间：<span class="chuangmbr"><?php echo ($vv["xo_time"]); ?></span>
                            </li>
                            <li>
                                 机型：<span class="chuangmbr"><?php echo ($vv["model_name"]); ?></span>
                            </li>
                            <li>
                                 问题：<span class="chuangmbr"><?php echo ($vv["question_name"]); ?></span>
                            </li>
                            <li>
                                 地址：<span class="chuangmbr"><?php echo ($vv["shangmen"]); ?></span>
                            </li>
                            <li>
                                 <b class="inde_hbre"></b><span data_l="<?php echo ($vv["dasj"]); ?>" data_r="<?php echo ($vv["dasjc"]); ?>" class="chuangmbr panduan_a"></span>
                            </li>
                        </ul>
                    </div>
                </a><?php endforeach; endif; ?>
        </div>
        <!--内容-->
        
        

    </div>
</div>

<!--底部-->
<div class="footer footer1">
    <div class="bot">
      <ul class=" pubcvt">
          
          <li class="pubcvt_v">
              <a href="/Home/Shifu/index" >
                  <span class="sh_icon2"></span>
                  <p>首页</p>
              </a>
          </li>
          <li class="pubcvt_v">
              <a href="/Home/Shifu/shifu" class="on" >
                  <span class="sh_icon3"></span>
                  <p>订单</p>
              </a>
          </li>
          <li class="pubcvt_v">
              <a href="/Home/Shifu/daiwancheng" >
                  <span class="sh_icon5"></span>
                  <p>服务</p>
              </a>
          </li>
          <li class="pubcvt_v">
              <a href="/Home/Shifu/my_wode" >
                  <span class="sh_icon4"></span>
                  <p>我的</p>
              </a>
          </li>
         
      </ul>
    </div>
</div>
<!--底部-->
<script>
$( ".inde_hbre" ).each(function( index ) {
	$(this).text(index+1);
});
function FreshTime(){
	$(".panduan_a").each(function(index,kku) {
		var cdata=$(this).attr('data_l')*1000;    //预约时间
		var ddata=$(this).attr('data_r')*1000;    //停止时间
		var nowtime = new Date().getTime();    //当前时间
		var lefttime=parseInt((cdata - nowtime)/1000);    //预约时间-当前
		var lefttimevv=parseInt((ddata - nowtime)/1000);  //预约结束时间-当前
		//console.log(lefttime);
		//console.log(lefttimevv);
		d=parseInt(lefttime/(60*60*24));//parseInt求整数(lefttime/(60*60*24));剩余时间毫秒除以（24小时*60分钟*60秒）等于天数
		h=parseInt(lefttime/(60*60)%24);//parseInt求整数(lefttime/(60*60)%24)剩余时间毫秒除以(60*60)%24)求天剩下的小时数
		m=parseInt(lefttime/60%60);//parseInt求整数(lefttime/60%60);剩余时间毫秒除以60秒再求除60余数
		s=parseInt(lefttime%60);//求秒余数
		
		
		if(lefttime<=0&&lefttimevv>=0){
			$(this).text('已到预约时间').css({'color':'#ff830b'});
		}else if(lefttime<=0 && lefttimevv<=0){
			$(this).text('订单已超时').css({'color':'#e35b5c'});
		}else{
			$(this).text("还剩"+d+"天"+h+"小时"+m+"分"+s+"秒").css({'color':'#4ab679'});
		}
	});
}
FreshTime()
var sh;
sh=setInterval(FreshTime,1000);//变动秒数
</script>
</body>
</html>